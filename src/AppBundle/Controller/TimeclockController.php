<?php

namespace AppBundle\Controller;

use AppBundle\Form\EmployeesType;
use AppBundle\Controller\BaseController;
use BackendBundle\Entity\Employees;
use BackendBundle\Entity\Info;
use BackendBundle\Entity\SupervisorNotification;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class TimeclockController extends BaseController
{
    public function indexAction(Request $request)
    {
        $employe = new Employees();
        $form = $this->createForm(EmployeesType::class, $employe);
        date_default_timezone_set('America/bogota');
        $horaponchada = date('Y-m-d H:i:00');

        if ($request->isXmlHttpRequest()) {
            $id_employees = $request->get('employees');
            $emplo = $this->getManager($id_employees);

            $lk = [];
            foreach ($emplo as $employ) {
                $attempts = $employ['attempts'];

                $currenttime = $employ['currenttime'];
                $current = strtotime('+5 minute', strtotime($currenttime));
                $newcurrent = date('Y-m-d H:i:s', $current);

                $rem = (strtotime($newcurrent) - strtotime($horaponchada));
                if ($rem > 0) {
                    $day = floor($rem / 86400);
                    $hr = floor(($rem % 86400) / 3600);
                    $min = floor(($rem % 3600) / 60);
                    $sec = ($rem % 60);
                    if ($day) {
                        $lk[] = "$day Dias";
                    }
                    if ($hr) {
                        $lk[] = "$hr Hora";
                    }
                    if ($min) {
                        $lk[] = "$min Minutos";
                    }
                    if ($sec) {
                        $lk[] = "$sec Segundos";
                    }
                } else {
                    $em = $this->getDoctrine()->getManager();
                    $e = $em->getRepository('BackendBundle:Employees');
                    $qb = $e->createQueryBuilder('e')
                        ->update()
                        ->set('e.attempts', '0')
                        ->where('e.idEmployee = :idEmployee')
                        ->setParameter('idEmployee', $id_employees)
                        ->getQuery();
                    $p = $qb->execute();
                }
            }

            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);

            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'emplo' => $serializer->serialize($attempts, 'json'),
                'difftime' => $serializer->serialize($lk, 'json'),
            ));

            return $response;
        }

        return $this->render('@App/TimeClock/timeclock_create.html.twig',
            [
                'form' => $form->createView(),
                'get_ipaddress' => $this->get_ipaddress(),
                'device' => $this->detectDevice(),
            ]);
    }

    public function attemptAction(Request $request)
    {
        $idEmployee = $request->get('idEmployee');
        $attempt = $request->get('attempt');

        $em = $this->getDoctrine()->getManager();
        $e = $em->getRepository('BackendBundle:Employees');

        if ($request->isXmlHttpRequest()) {
            date_default_timezone_set('America/bogota');
            $hour = date('H:i:00');

            $employees = $e->createQueryBuilder('e')
                ->select('e.attempts')
                ->where('e.idEmployee = :idEmployee')
                ->setParameter('idEmployee', $idEmployee)
                ->getQuery()
                ->getResult();

            foreach ($employees as $employe) {
                if ($employe['attempts'] <= 3 && $attempt == false) {
                    $qb = $e->createQueryBuilder('e')
                        ->update()
                        ->set('e.attempts', 'e.attempts +1')
                        ->set('e.currenttime', '?1')
                        ->where('e.idEmployee = :idEmployee')
                        ->setParameter('idEmployee', $idEmployee)
                        ->setParameter(1, $hour)
                        ->getQuery();
                    $p = $qb->execute();
                }

                if ($attempt == 1) {
                    $qb = $e->createQueryBuilder('e')
                        ->update()
                        ->set('e.attempts', '0')
                        ->where('e.idEmployee = :idEmployee')
                        ->setParameter('idEmployee', $idEmployee)
                        ->getQuery();
                    $p = $qb->execute();
                }

                $encoders = array(new JsonEncoder());
                $normalizers = array(new ObjectNormalizer());
                $serializer = new Serializer($normalizers, $encoders);

                $response = new JsonResponse();
                $response->setStatusCode(200);
                $response->setData(array(
                    'response' => 'success',
                    'id_employee' => $serializer->serialize($attempt, 'json'),

                ));

                return $response;
            }

        }
    }

    public function listemployeeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest()) {

            $id_employee = $request->query->get('employeselect');
            $empfullname = $request->get('emplofullname');
            $employeePasswd = $request->get('employepassword');
            $employee_passwd1 = crypt($employeePasswd, 'xy');

            $e = $em->getRepository('BackendBundle:Employees');
            $employesss = $e->createQueryBuilder('e')
                ->select('e.empfullname,e.idEmployee,e.employeePasswd')
                ->where('e.idEmployee = :idEmployee')
                ->setParameter('idEmployee', $id_employee)
                ->getQuery()
                ->getResult();

            foreach ($employesss as $emplotim) {
            }

            $employee = "
                  SELECT e.empfullname,DATE_FORMAT(DATE_ADD(FROM_UNIXTIME(i.timestamp),'-4', 'hour'),'%H:%i:%s') as time,i.inout,
                  p.color
                  FROM BackendBundle:Info i
                  JOIN BackendBundle:Employees e WITH (e.idEmployee = i.idEmployee)
                  JOIN BackendBundle:Punchlist p WITH (p.punchitems = i.inout)
                  WHERE e.idEmployee = :idEmployee
                  AND DATE(FROM_UNIXTIME(i.timestamp)) = CURRENT_DATE()
                  AND i.inout = p.punchitems
                  AND e.empfullname <> 'admin' 
                  ORDER BY i.timestamp DESC";

            $query = $em->createQuery($employee);
            $query->setParameter('idEmployee', $id_employee);
            $employees = $query->getResult();

            $state = "
                  SELECT inf.times,i.inout
                  FROM info i
                  INNER JOIN employees e ON e.id_employee = i.id_employee
                  INNER JOIN punchlist p ON p.punchitems = i.inout
                  INNER JOIN
                  (
                   SELECT MAX(DATE_ADD(FROM_UNIXTIME(i.timestamp),INTERVAL -4 HOUR)) times,em.id_employee
                   FROM info i
                   INNER JOIN employees em ON em.id_employee = i.id_employee
                   INNER JOIN punchlist p  ON p.punchitems = i.inout
                   WHERE em.id_employee = :id_employee
                   AND i.inout = p.punchitems
                   LIMIT 1
                  ) AS inf ON inf.id_employee = e.id_employee
                  WHERE e.id_employee = :id_employee
                  AND i.inout = p.punchitems
                  AND e.empfullname <> 'admin'
                  ORDER BY i.timestamp DESC
                  LIMIT 1";

            $statement = $em->getConnection()->prepare($state);
            $statement->bindValue('id_employee', $id_employee);
            $statement->execute();
            $states = $statement->fetchAll();

            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);

            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'id_employee' => $serializer->serialize($id_employee, 'json'),
                'empfullname' => $serializer->serialize($empfullname, 'json'),
                'employeePasswd' => $serializer->serialize($employee_passwd1, 'json'),
                'employees' => $serializer->serialize($employees, 'json'),
                'datasvalidation' => $serializer->serialize($emplotim, 'json'),
                'states' => $serializer->serialize($states, 'json')
            ));

            return $response;
        }
    }

    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest()) {
            $empfullname = $request->get('empfullname');
            $employeePasswd = $request->get('employeePasswd');
            $employee_passwd1 = crypt($employeePasswd, 'xy');

            $id_employee = $request->get('id_employee');
            $inout = $request->get('inout');
            $notes = $request->get('notes');
            $get_ipaddress = $request->get('get_ipaddress');
            $os = $request->get('os');
            $browser = $request->get('browser');
            $screen_resolu = $request->get('screen_resolu');
            $device = $request->get('device');

            $time = time();
            $time_hour = gmdate('H', $time);
            $time_min = gmdate('i', $time);
            $time_sec = gmdate('s', $time);
            $time_month = gmdate('m', $time);
            $time_day = gmdate('d', $time);
            $time_year = gmdate('Y', $time);
            $time_tz_stamp = mktime($time_hour, $time_min, $time_sec, $time_month, $time_day, $time_year);

            $e = $em->getRepository('BackendBundle:Employees');
            $employesss = $e->createQueryBuilder('e')
                ->select('e.empfullname,e.idEmployee,e.employeePasswd')
                ->getQuery()
                ->getResult();

            $al = [];
            $validateinsertIn = "";
            $validateinsertOut = "";

            foreach ($employesss as $employ) {
                if ($employ['empfullname'] == $empfullname && $employ['employeePasswd'] == $employee_passwd1) {

                    $sql = "INSERT INTO `info` (`id_info`, `id_employee`, `fullname`, `inout`, `timestamp`, `notes`, `ipaddress`, `os`, `browser`, `screen_resolu`, `device`) 
                    VALUES (NULL, '" . $id_employee . "', '" . $empfullname . "','" . $inout . "','" . $time_tz_stamp . "'
                    ,'" . $notes . "','" . $this->get_ipaddress() . "', '" . $os . "', '" . $browser . "', '" . $screen_resolu . "', '" . $device . "');";
                    $stmt = $em->getConnection()->prepare($sql);
                    $stmt->execute();

                    $emplotime = $em->getRepository('BackendBundle:Employees')->find($employ['idEmployee']);
                    $emplotime->setTstamp($time_tz_stamp);
                    $em->flush();

                    date_default_timezone_set('America/bogota');
                    $hour = date('H:i:s');


                    $entry = "
                      SELECT i.inout,MIN(DATE_FORMAT(DATE_ADD(FROM_UNIXTIME(i.timestamp),'-4', 'hour'),'%H:%i:%s')) primero,
                      MAX(DATE_FORMAT(DATE_ADD(FROM_UNIXTIME(i.timestamp),'-4', 'hour'),'%H:%i:%s')) ultimo
                      FROM BackendBundle:Info i
                      JOIN BackendBundle:Employees e WITH (e.idEmployee = i.idEmployee)
                      WHERE e.idEmployee = :idEmployee
                      AND DATE(FROM_UNIXTIME(i.timestamp)) = CURRENT_DATE()
                      AND i.inout IN (:miarray)
                      AND e.empfullname <> 'admin' 
                      GROUP BY i.inout";

                    $query4 = $em->createQuery($entry);
                    $query4->setParameter('idEmployee', $id_employee);
                    $query4->setParameter('miarray', array('in', 'out'));
                    $entry_validation = $query4->getResult();

                    $times = "SELECT g.name,
                        g.toleranceBeforeIn,g.toleranceAfterIn,g.toleranceBeforeOut,g.toleranceAfterOut,
                        e.idEmployee,e.empfullname,d.dayOfWeek,d.hourIn,d.hourOut
                  FROM BackendBundle:GroupSchedule g
                  INNER JOIN BackendBundle:DayScheduleGroup  d  WITH (g.idGroupschedule = d.idGroupSchedule)
                  INNER JOIN BackendBundle:EmployeeTimeGroup em WITH (d.idGroupSchedule = em.idGroupSchedule)
                  INNER JOIN BackendBundle:Employees e WITH (em.idEmployee = e.idEmployee)
                  WHERE e.idEmployee = :idEmployee
                  GROUP BY d.dayOfWeek";
                    $query3 = $em->createQuery($times);
                    $query3->setParameter('idEmployee', $id_employee);
                    $emplotime = $query3->getResult();


                    $newDate = strtotime ( '+1 hour' , strtotime ($hour) ) ; 
                    $hour = date('H:i:s',$newDate);
                    $horaponchada = $hour;
                    
                    $al[] = $horaponchada;

                    foreach ($entry_validation as $entry_valida) {

                        if ($entry_valida['inout'] == 'in') {

                            if (!$emplotime) {
                                $date = date_create("08:00:00");

                                if ($date == $date) {
                                    $al[] = 'noy datos';
                                }
                            } else {

                                $name_day = [];
                                foreach ($emplotime as $emplot) {

                                    switch ($emplot['dayOfWeek']) {
                                        case 'Mon':
                                            $name_day[] = array('day' => $emplot['dayOfWeek'], 'hourIn' => $emplot['hourIn'], 'hourOut' => $emplot['hourOut']);
                                            break;
                                        case 'Tue':
                                            $name_day[] = array('day' => $emplot['dayOfWeek'], 'hourIn' => $emplot['hourIn'], 'hourOut' => $emplot['hourOut']);
                                            break;
                                        case 'Wed':
                                            $name_day[] = array('day' => $emplot['dayOfWeek'], 'hourIn' => $emplot['hourIn'], 'hourOut' => $emplot['hourOut']);
                                            break;
                                        case 'Thu':
                                            $name_day[] = array('day' => $emplot['dayOfWeek'], 'hourIn' => $emplot['hourIn'], 'hourOut' => $emplot['hourOut']);
                                            break;
                                        case 'Fri':
                                            $name_day[] = array('day' => $emplot['dayOfWeek'], 'hourIn' => $emplot['hourIn'], 'hourOut' => $emplot['hourOut']);
                                            break;
                                        case 'Sat':
                                            $name_day[] = array('day' => $emplot['dayOfWeek'], 'hourIn' => $emplot['hourIn'], 'hourOut' => $emplot['hourOut']);
                                            break;
                                        case 'Sun':
                                            $name_day[] = array('day' => $emplot['dayOfWeek'], 'hourIn' => $emplot['hourIn'], 'hourOut' => $emplot['hourOut']);
                                            break;
                                    }

                                    foreach ($name_day as $name_days => $hourInEmplo) {
                                        if ($inout == 'in') {
                                            if ($entry_valida['primero'] == $horaponchada) {
                                                if (date('D') == $hourInEmplo['day']) {
                                                    $hora_limite_antes_de_entra = strtotime('-' . $toleranceBeforeIn = $emplot['toleranceBeforeIn'] . 'minute', strtotime($hourInEmplo['hourIn']));
                                                    $hora_limite_antes_de_entrar = date('H:i:s', $hora_limite_antes_de_entra);

                                                    $hora_limite_despues_de_entra = strtotime('+' . $toleranceBeforeIn = $emplot['toleranceAfterIn'] . 'minute', strtotime($hourInEmplo['hourIn']));
                                                    $hora_limite_despues_de_entrar = date('H:i:s', $hora_limite_despues_de_entra);

                                                    if ($hourInEmplo['hourIn'] >= $hora_limite_antes_de_entrar && $hourInEmplo['hourIn'] <= $hora_limite_despues_de_entrar) {
                                                        $validateinsertIn .= '1';
                                                        $al[] = 'entro';
                                                    } else {
                                                    }
                                                }
                                            }
                                        }
//                                        if ($inout == 'out') {
//                                            if ($entry_valida['ultimo'] == $entry_valida['ultimo']) {
//                                                if (date('D') == $hourInEmplo['day']) {
//
//                                                    $hora_limite_antes_de_salir = strtotime('-' . $toleranceBeforeIn = $emplot['toleranceBeforeIn'] . 'minute', strtotime($hourInEmplo['hourOut']));
//                                                    $hora_limite_antes_de_sali = date('H:i:s', $hora_limite_antes_de_salir);
//
//                                                    $hora_limite_despues_de_salir = strtotime('+' . $toleranceBeforeIn = $emplot['toleranceAfterIn'] . 'minute', strtotime($hourInEmplo['hourOut']));
//                                                    $hora_limite_despues_de_sali = date('H:i:s', $hora_limite_despues_de_salir);
//
//                                                    if ($horaponchada >= $hora_limite_antes_de_sali && $horaponchada <= $hora_limite_despues_de_sali) {
//                                                        $validateinsertOut .= '1';
//                                                    } else {
//
//                                                    }
//                                                }
//                                            }
//                                        }
                                    }
                                }
                            }
                        }

                        if ($entry_valida['inout'] == 'out') {

                        }
                    }

                    if (!empty($validateinsertIn)) {
                        $sql2 = "INSERT INTO `supervisor_notification`(`id_supervisor_notification`, `id_employee`, `state`, `nota`, `inout`, `type_of_permit`)
                        VALUES (null ,'" . $id_employee . "',0,null,'" . $inout . "',null)";
                        $stmt2 = $em->getConnection()->prepare($sql2);
                        $stmt2->execute();
                    }

                    if (!empty($validateinsertOut)) {
                        $sql2 = "INSERT INTO `supervisor_notification`(`id_supervisor_notification`, `id_employee`, `state`, `nota`, `inout`, `type_of_permit`)
                        VALUES (null ,'" . $id_employee . "',0,null,'" . $inout . "',null)";
                        $stmt2 = $em->getConnection()->prepare($sql2);
                        $stmt2->execute();
                    }
                }
            }

            $state = "
                  SELECT inf.times,i.inout
                  FROM info i
                  INNER JOIN employees e ON e.id_employee = i.id_employee
                  INNER JOIN punchlist p ON p.punchitems = i.inout
                  INNER JOIN
                  (
                   SELECT MAX(DATE_ADD(FROM_UNIXTIME(i.timestamp),INTERVAL -4 HOUR)) times,em.id_employee
                   FROM info i
                   INNER JOIN employees em ON em.id_employee = i.id_employee
                   INNER JOIN punchlist p  ON p.punchitems = i.inout
                   WHERE em.id_employee = :id_employee
                   AND i.inout = p.punchitems
                   LIMIT 1
                  ) AS inf ON inf.id_employee = e.id_employee
                  WHERE e.id_employee = :id_employee
                  AND i.inout = p.punchitems
                  AND e.empfullname <> 'admin'
                  AND (DATE(FROM_UNIXTIME(i.timestamp)) = CURRENT_DATE())
                  ORDER BY i.timestamp DESC
                  LIMIT 1";

            $statement = $em->getConnection()->prepare($state);
            $statement->bindValue('id_employee', $id_employee);
            $statement->execute();
            $states = $statement->fetchAll();

            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);

            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'id_employee' => $serializer->serialize($id_employee, 'json'),
                'empfullname' => $serializer->serialize($empfullname, 'json'),
                'employeePasswd' => $serializer->serialize($employee_passwd1, 'json'),
                'inout' => $serializer->serialize($inout, 'json'),
                'get_ipaddress' => $serializer->serialize($get_ipaddress, 'json'),
                'notes' => $serializer->serialize($notes, 'json'),
                'os' => $serializer->serialize($os, 'json'),
                'browser' => $serializer->serialize($browser, 'json'),
                'screen_resolu' => $serializer->serialize($screen_resolu, 'json'),
                'device' => $serializer->serialize($device, 'json'),
                'state' => $serializer->serialize($states, 'json'),
                'test' => $serializer->serialize($al, 'json'),
            ));
            return $response;
        }
    }

    public function beneficioAction(Request $request)
    {
        return $this->render('@App/TimeClock/admin/timeclock_admin.html.twig');
    }

    public function configuracion_indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $configuracions = $em->getRepository('BackendBundle:Configuracion')->findAll();

        return $this->render('AppBundle:TimeClock/configuracion:index.html.twig', array(
            'configuracions' => $configuracions,
        ));
    }

    function get_ipaddress()
    {

        if (empty($REMOTE_ADDR)) {
            if (!empty($_SERVER) && isset($_SERVER['REMOTE_ADDR'])) {
                $REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
            } else if (!empty($_ENV) && isset($_ENV['REMOTE_ADDR'])) {
                $REMOTE_ADDR = $_ENV['REMOTE_ADDR'];
            } else if (@getenv('REMOTE_ADDR')) {
                $REMOTE_ADDR = getenv('REMOTE_ADDR');
            }
        }
        if (empty($HTTP_X_FORWARDED_FOR)) {
            if (!empty($_SERVER) && isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $HTTP_X_FORWARDED_FOR = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else if (!empty($_ENV) && isset($_ENV['HTTP_X_FORWARDED_FOR'])) {
                $HTTP_X_FORWARDED_FOR = $_ENV['HTTP_X_FORWARDED_FOR'];
            } else if (@getenv('HTTP_X_FORWARDED_FOR')) {
                $HTTP_X_FORWARDED_FOR = getenv('HTTP_X_FORWARDED_FOR');
            }
        }
        if (empty($HTTP_X_FORWARDED)) {
            if (!empty($_SERVER) && isset($_SERVER['HTTP_X_FORWARDED'])) {
                $HTTP_X_FORWARDED = $_SERVER['HTTP_X_FORWARDED'];
            } else if (!empty($_ENV) && isset($_ENV['HTTP_X_FORWARDED'])) {
                $HTTP_X_FORWARDED = $_ENV['HTTP_X_FORWARDED'];
            } else if (@getenv('HTTP_X_FORWARDED')) {
                $HTTP_X_FORWARDED = getenv('HTTP_X_FORWARDED');
            }
        }
        if (empty($HTTP_FORWARDED_FOR)) {
            if (!empty($_SERVER) && isset($_SERVER['HTTP_FORWARDED_FOR'])) {
                $HTTP_FORWARDED_FOR = $_SERVER['HTTP_FORWARDED_FOR'];
            } else if (!empty($_ENV) && isset($_ENV['HTTP_FORWARDED_FOR'])) {
                $HTTP_FORWARDED_FOR = $_ENV['HTTP_FORWARDED_FOR'];
            } else if (@getenv('HTTP_FORWARDED_FOR')) {
                $HTTP_FORWARDED_FOR = getenv('HTTP_FORWARDED_FOR');
            }
        }
        if (empty($HTTP_FORWARDED)) {
            if (!empty($_SERVER) && isset($_SERVER['HTTP_FORWARDED'])) {
                $HTTP_FORWARDED = $_SERVER['HTTP_FORWARDED'];
            } else if (!empty($_ENV) && isset($_ENV['HTTP_FORWARDED'])) {
                $HTTP_FORWARDED = $_ENV['HTTP_FORWARDED'];
            } else if (@getenv('HTTP_FORWARDED')) {
                $HTTP_FORWARDED = getenv('HTTP_FORWARDED');
            }
        }
        if (empty($HTTP_VIA)) {
            if (!empty($_SERVER) && isset($_SERVER['HTTP_VIA'])) {
                $HTTP_VIA = $_SERVER['HTTP_VIA'];
            } else if (!empty($_ENV) && isset($_ENV['HTTP_VIA'])) {
                $HTTP_VIA = $_ENV['HTTP_VIA'];
            } else if (@getenv('HTTP_VIA')) {
                $HTTP_VIA = getenv('HTTP_VIA');
            }
        }
        if (empty($HTTP_X_COMING_FROM)) {
            if (!empty($_SERVER) && isset($_SERVER['HTTP_X_COMING_FROM'])) {
                $HTTP_X_COMING_FROM = $_SERVER['HTTP_X_COMING_FROM'];
            } else if (!empty($_ENV) && isset($_ENV['HTTP_X_COMING_FROM'])) {
                $HTTP_X_COMING_FROM = $_ENV['HTTP_X_COMING_FROM'];
            } else if (@getenv('HTTP_X_COMING_FROM')) {
                $HTTP_X_COMING_FROM = getenv('HTTP_X_COMING_FROM');
            }
        }
        if (empty($HTTP_COMING_FROM)) {
            if (!empty($_SERVER) && isset($_SERVER['HTTP_COMING_FROM'])) {
                $HTTP_COMING_FROM = $_SERVER['HTTP_COMING_FROM'];
            } else if (!empty($_ENV) && isset($_ENV['HTTP_COMING_FROM'])) {
                $HTTP_COMING_FROM = $_ENV['HTTP_COMING_FROM'];
            } else if (@getenv('HTTP_COMING_FROM')) {
                $HTTP_COMING_FROM = getenv('HTTP_COMING_FROM');
            }
        }

        if (!empty($REMOTE_ADDR)) {
            $direct_ip = $REMOTE_ADDR;
        }


        $proxy_ip = '';
        if (!empty($HTTP_X_FORWARDED_FOR)) {
            $proxy_ip = $HTTP_X_FORWARDED_FOR;
        } else if (!empty($HTTP_X_FORWARDED)) {
            $proxy_ip = $HTTP_X_FORWARDED;
        } else if (!empty($HTTP_FORWARDED_FOR)) {
            $proxy_ip = $HTTP_FORWARDED_FOR;
        } else if (!empty($HTTP_FORWARDED)) {
            $proxy_ip = $HTTP_FORWARDED;
        } else if (!empty($HTTP_VIA)) {
            $proxy_ip = $HTTP_VIA;
        } else if (!empty($HTTP_X_COMING_FROM)) {
            $proxy_ip = $HTTP_X_COMING_FROM;
        } else if (!empty($HTTP_COMING_FROM)) {
            $proxy_ip = $HTTP_COMING_FROM;
        }

        if (empty($proxy_ip)) {
            return $direct_ip;
        } else {
            $is_ip = preg_match('|^([0-9]{1,3}\.){3,3}[0-9]{1,3}|', $proxy_ip, $regs);
            if ($is_ip && (count($regs) > 0)) {
                return $regs[0];
            } else {
                return FALSE;
            }
        }
    }

    public function detectDevice()
    {
        $userAgent = $_SERVER["HTTP_USER_AGENT"];
        $devicesTypes = array(
            "computer" => array("msie 10", "msie 9", "msie 8", "windows.*firefox", "windows.*chrome", "x11.*chrome", "x11.*firefox", "macintosh.*chrome", "macintosh.*firefox", "opera"),
            "tablet" => array("tablet", "android", "ipad", "tablet.*firefox"),
            "mobile" => array("mobile ", "android.*mobile", "iphone", "ipod", "opera mobi", "opera mini"),
            "bot" => array("googlebot", "mediapartners-google", "adsbot-google", "duckduckbot", "msnbot", "bingbot", "ask", "facebook", "yahoo", "addthis")
        );
        foreach ($devicesTypes as $deviceType => $devices) {
            foreach ($devices as $device) {
                if (preg_match("/" . $device . "/i", $userAgent)) {
                    $deviceName = $deviceType;
                }
            }
        }
        return ucfirst($deviceName);
    }

    public function validateAction(Request $request)
    {
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT i.fullname,i.inout,DATE_FORMAT(FROM_UNIXTIME(i.timestamp),'%H:%i:%s') as time,
                DATE_FORMAT(FROM_UNIXTIME(i.timestamp),'%d:%m:%y') as date
                FROM BackendBundle:Info i,BackendBundle:Employees e,BackendBundle:Punchlist p
                WHERE i.timestamp = e.tstamp 
                AND i.fullname = e.empfullname
                AND i.inout = p.punchitems
                AND e.disabled <> 1
                AND e.empfullname <> 'admin' 
                ORDER BY i.fullname ASC";

        $query = $em->createQuery($dql);
        $employees = $query->getResult();

        $response = new JsonResponse();
        $response->setStatusCode(200);
        $response->setData(array(
            'response' => 'success',
            'cliente' => $serializer->serialize($employees, 'json')
        ));

        return $response;
    }
}
