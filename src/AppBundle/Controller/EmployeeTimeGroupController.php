<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\DayScheduleGroup;
use BackendBundle\Entity\Employees;
use BackendBundle\Entity\EmployeeTimeGroup;
use BackendBundle\Entity\Groups;
use BackendBundle\Entity\Offices;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class EmployeeTimeGroupController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $dayScheduleGroup = new EmployeeTimeGroup();
        $form = $this->createForm('AppBundle\Form\EmployeeTimeGroupType', $dayScheduleGroup);

        if ($request->isXmlHttpRequest()) {
            $employeeTimeGro = 'SELECT e.idEmployeeTimeGroup,em.empfullname,gr.name grupo,e.startDate
                                FROM BackendBundle:EmployeeTimeGroup e
                                LEFT JOIN BackendBundle:GroupSchedule gr WITH (e.idGroupSchedule = gr.idGroupschedule)
                                LEFT JOIN BackendBundle:Employees em WITH (e.idEmployee = em.idEmployee)';
            $query = $em->createQuery($employeeTimeGro);
            $employeeTimeGroups = $query->getResult();

            foreach ($employeeTimeGroups as $employeeTimeGro) {
                $encoders = array(new JsonEncoder());
                $normalizers = array(new ObjectNormalizer());
                $serializer = new Serializer($normalizers, $encoders);

                $response = new JsonResponse();
                $response->setStatusCode(200);
                $response->setData(array(
                    'response' => 'success',
                    'data' => $serializer->serialize($employeeTimeGroups, 'json')
                ));
                return $response;
            }
        }

        return $this->render('@App/TimeClock/empleadohorariogrupo/index.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * Creates a new employeeTimeGroup entity.
     *
     * @throws \Exception
     */
    public function newAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $idemployee = $request->get('empleado');
            $idGroupSchedule = $request->get('idGroupSchedule');
            $start_date = $request->get('start_date');

            $employeeTimeGroup = new Employeetimegroup();
            $employeeTimeGroup->setIdEmployee($idemployee);
            $employeeTimeGroup->setIdGroupSchedule($idGroupSchedule);
            $employeeTimeGroup->setStartDate(new \DateTime($start_date));
            $em = $this->getDoctrine()->getManager();
            $em->persist($employeeTimeGroup);
            $em->flush();

            return new JsonResponse('insertado');
        }
    }

    public function groupAction(Request $request)
    {
        $employeeTimeGroup = new EmployeeTimeGroup();
        $form = $this->createForm('AppBundle\Form\EmployeeTimeGroupType', $employeeTimeGroup);

        $office = new Offices();
        $offices = $this->createForm('AppBundle\Form\OfficesType', $office);

        $group = new Groups();
        $groups = $this->createForm('AppBundle\Form\GroupsType', $group);

        $em = $this->getDoctrine()->getManager();
        $e2 = $em->getRepository('BackendBundle:Employees');
        $employees2 = $e2->createQueryBuilder('e')
            ->select('e.empfullname')
            ->where('e.groups = :groups')
            ->setParameter('groups', 'Sistemas')
            ->getQuery()
            ->getResult();


        if ($request->isXmlHttpRequest()) {
            $empfullname = $request->get('officename');
            $grop = $request->get('grupos');
            $shedul = $request->get('shedul');

            if (isset($empfullname) && !empty($empfullname)) {
                $em = $this->getDoctrine()->getManager();
                $e = $em->getRepository('BackendBundle:Employees');
                $employees = $e->createQueryBuilder('e');
                $employees->select('e.empfullname,e.idEmployee');
                $employees->where('e.office = :office');
                $employees->setParameter('office', $empfullname);
                $result = $employees->getQuery()->getResult();

                if ($grop == 1) {
                    $em2 = $this->getDoctrine()->getManager();
                    $e2 = $em2->getRepository('BackendBundle:Employees');
                    $employees2 = $e2->createQueryBuilder('e')
                        ->select('e.empfullname,e.idEmployee')
                        ->where('e.groups = :groups')
                        ->andWhere('e.office = :office')
                        ->setParameter('office', $empfullname)
                        ->setParameter('groups', $shedul)
                        ->getQuery()
                        ->getResult();
                }

                $encoders = array(new JsonEncoder());
                $normalizers = array(new ObjectNormalizer());
                $serializer = new Serializer($normalizers, $encoders);

                $response = new JsonResponse();
                $response->setStatusCode(200);
                $response->setData(array(
                    'response' => 'success',
                    'data' => $serializer->serialize($result, 'json'),
                    'data2' => $serializer->serialize($employees2, 'json')
                ));
                return $response;
            }
        }

        return $this->render('@App/TimeClock/grupohorarioempleado/index.twig', array
        (
            'employeeTimeGroup' => $form->createView(),
            'offices' => $offices->createView(),
            'groups' => $groups->createView(),
        ));
    }

    public function editAction(Request $request, EmployeeTimeGroup $employeeTimeGroup)
    {
        $editForm = $this->createForm('AppBundle\Form\EmployeeTimeGroupType', $employeeTimeGroup);
        $editForm->handleRequest($request);

        $idEmployeeTimeGroup = $request->query->get('id');

        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $e = $em->getRepository('BackendBundle:GroupSchedule');
            $qb = $e->createQueryBuilder('g')
                ->select('et.idEmployeeTimeGroup,g.name grupo,e.empfullname,et.startDate')
                ->innerJoin(DayScheduleGroup::class, 'd', 'WITH', "g.idGroupschedule = d.idGroupSchedule")
                ->innerJoin(EmployeeTimeGroup::class, 'et', 'WITH', "d.idGroupSchedule = et.idGroupSchedule")
                ->innerJoin(Employees::class, 'e', 'WITH', "et.idEmployee = e.idEmployee")
                ->where('et.idEmployeeTimeGroup = :idEmployeeTimeGroup')
                ->setParameter('idEmployeeTimeGroup', $idEmployeeTimeGroup)
                ->getQuery()
                ->getResult();

            return new JsonResponse($qb);
        }
    }

    public function asignacionAction(Request $request)
    {
        $initial_date = $request->get('initial_date');
        $final_date = $request->get('final_date');
        $hourIn = $request->get('hourIn');
        $hourOut = $request->get('hourOut');
        $dayOfweek = $request->get('dayOfweek');
        $groupSchedule = $request->get('groupSchedule');
        $idemployeess = $request->get('idemployeess');
        $idGroupScheduletime = $request->get('idGroupSchedule');

        if ($request->isXmlHttpRequest()) {

            $dates = [];
            for ($i = $initial_date; $i <= $final_date; $i = date("Y-m-d", strtotime($i . "+ 1 days"))) {
                $dates[] = $a1 = array('working_day' => $i, 'name_day' => date('D', strtotime($i)));
            }

            $dayw = explode(',', $dayOfweek);
            $lk = [];

            foreach ($dayw as $cdayw) {
                foreach ($dates as $dname) {
                    for ($j = 0; $j < count($dname['working_day']); ++$j) {

                        $em = $this->getDoctrine()->getManager();
                        $e = $em->getRepository('BackendBundle:EmployeeTimeGroup');
                        $emplos = $e->createQueryBuilder('e')
                            ->select('e.idEmployee,e.startDate')
                            ->where('e.idEmployee = :idEmployee')
                            ->andWhere('e.startDate = :startDate')
                            ->setParameter('idEmployee', $idemployeess)
                            ->setParameter('startDate', new \DateTime($dname['working_day']))
                            ->getQuery()
                            ->getResult();

                        if (!$emplos) {
                            $employeeTimeGroup = new Employeetimegroup();
                            $employeeTimeGroup->setIdEmployee($idemployeess);
                            $employeeTimeGroup->setIdGroupSchedule($groupSchedule);
                            $employeeTimeGroup->setHourIn($hourIn);
                            $employeeTimeGroup->setHourOut($hourOut);
                            $employeeTimeGroup->setStartDate(new \DateTime($dname['working_day']));
                            $em = $this->getDoctrine()->getManager();
                            $em->persist($employeeTimeGroup);
                            $em->flush();
                        } else {
                            $em = $this->getDoctrine()->getManager();
                            $emplostime = $em->getRepository('BackendBundle:EmployeeTimeGroup');
                            $qb = $emplostime->createQueryBuilder('e')->update();
                            $qb->set('e.hourIn', '?1');
                            $qb->set('e.hourOut', '?2');
                            $qb->where('e.idEmployee = ?3');
                            $qb->andWhere('e.startDate = ?4');
                            $qb->setParameter(1, $hourIn);
                            $qb->setParameter(2, $hourOut);
                            $qb->setParameter(3, $idemployeess);
                            $qb->setParameter(4, new \DateTime($dname['working_day']));
                            $qb->getQuery()->execute();

                        }
                    }
                }
            }

            if ($request->isXmlHttpRequest()) {
                if (!empty($idGroupScheduletime)) {
                    $em = $this->getDoctrine()->getManager();
                    $obj = $em->getRepository('BackendBundle:DayScheduleGroup')->findBy(array("idGroupSchedule" => $idGroupScheduletime));
                    $normalizer = new ObjectNormalizer();
                    $encoder = new JsonEncoder();
                    $serializer = new Serializer(array($normalizer), array($encoder));
                    $responses = $serializer->serialize($obj, 'json');
                    return new JsonResponse($responses);
                }
            }

            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);

            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'initial_date' => $serializer->serialize($lk, 'json'),
                'final_date' => $serializer->serialize($final_date, 'json'),
                'hourIn' => $serializer->serialize($hourIn, 'json'),
            ));

            return $response;
        }
    }

    public function edicionAction(Request $request)
    {
        $idEmployee = $request->get('id_employ');

        if ($request->isXmlHttpRequest()) {
            $employeetime = "SELECT e.start_date,e.hour_in hourIn,e.hour_out hourOut
                             FROM employee_time_group e
                             WHERE e.id_employee = :id_employee
                             GROUP BY e.id_employee_time_group";

            $em = $this->getDoctrine()->getManager();
            $statement = $em->getConnection()->prepare($employeetime);
            $statement->bindValue('id_employee', $idEmployee);
            $statement->execute();
            $emplotime = $statement->fetchAll();

            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);

            $response = new JsonResponse();
            $response->setData(array(
                'response' => 'success',
                'employeetime' => $serializer->serialize($emplotime, 'json'),
            ));
            return $response;
        }
    }

    public function edicionupdateAction(Request $request)
    {
        $idEmployee = $request->get('idEmployee');
        $hourInupdate = $request->get('hourInupdate');
        $hourOutupdate = $request->get('hourOutupdate');
        $startdate = $request->get('startdate');

        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $e = $em->getRepository('BackendBundle:EmployeeTimeGroup');
            $qb = $e->createQueryBuilder('e')
                ->update()
                ->set('e.hourIn', '?1')
                ->set('e.hourOut', '?2')
                ->where('e.idEmployee = :idEmployee')
                ->andWhere('e.startDate = :startDate')
                ->setParameter('1', $hourInupdate)
                ->setParameter('2', $hourOutupdate)
                ->setParameter('idEmployee', $idEmployee)
                ->setParameter('startDate', new \DateTime($startdate))
                ->getQuery();
            $p = $qb->execute();
            return new JsonResponse('Actualizado');
        }

    }

    public function asignacionmultipleAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $Employeemultiple = $request->get('datamultiple');
        $initial_date = $request->get('initial_date_multiple');
        $final_date = $request->get('final_date_multiple');

        if ($request->isXmlHttpRequest()) {

            $value = array();
            foreach ($Employeemultiple as $Employeemultiples) {

                $dayw = explode(',', $Employeemultiples['dayOfweek']);

                $dates = [];
                for ($i = $initial_date; $i <= $final_date; $i = date("Y-m-d", strtotime($i . "+ 1 days"))) {
                    $a1 = array('working_day' => $i, 'name_day' => date('D', strtotime($i)));
                    foreach ($dayw as $daws) {
                        if ($a1['name_day'] == $daws) {
                            $dates[] = $a1['working_day'];
                        }
                    }
                }

                $mldates = [];
                for ($j = 0; $j < count($dates); ++$j) {

                    $em3 = $this->getDoctrine()->getManager();
                    $e3 = $em3->getRepository('BackendBundle:EmployeeTimeGroup');
                    $emplos = $e3->createQueryBuilder('e')
                        ->select('e.idEmployee,e.startDate')
                        ->where('e.idEmployee = :idEmployee')
                        ->andWhere('e.startDate = :startDate')
                        ->setParameter('idEmployee', $Employeemultiples['idemployee'])
                        ->setParameter('startDate', new \Datetime($dates[$j]))
                        ->getQuery()
                        ->getResult();

                    if (!$emplos) {
                        $employeeTimeGroup = new Employeetimegroup();
                        $employeeTimeGroup->setIdEmployee($Employeemultiples['idemployee']);
                        $employeeTimeGroup->setIdGroupSchedule($Employeemultiples['idGroupSchedulemultiple']);
                        $employeeTimeGroup->setHourIn($Employeemultiples['hourIn_multiple']);
                        $employeeTimeGroup->setHourOut($Employeemultiples['hourOut_multiple']);
                        $employeeTimeGroup->setStartDate(new \DateTime($dates[$j]));
                        $em->persist($employeeTimeGroup);
                        $em->flush();
                    } else {
                        $em = $this->getDoctrine()->getManager();
                        $emplostime = $em->getRepository('BackendBundle:EmployeeTimeGroup');
                        $qb = $emplostime->createQueryBuilder('e')
                            ->update()
                            ->set('e.hourIn', '?1')
                            ->set('e.hourOut', '?2')
                            ->set('e.idGroupSchedule', '?3')
                            ->where('e.idEmployee = :idEmployee')
                            ->setParameter(1, $Employeemultiples['hourIn_multiple'])
                            ->setParameter(2, $Employeemultiples['hourOut_multiple'])
                            ->setParameter(3, $Employeemultiples['idGroupSchedulemultiple'])
                            ->setParameter('idEmployee', $Employeemultiples['idemployee'])
                            ->getQuery();
                        $p = $qb->execute();
                    }
                }

                $value[] = $Employeemultiples;
            }
            return new JsonResponse($value);
        }
    }

    public function grupoasignacionmultipleAction(Request $request)
    {
        $Employeemultiple = $request->get('datamultiple');
        $initial_date = $request->get('initial_date_multiple');
        $final_date = $request->get('final_date_multiple');

        $timeMongroupSchedule = $request->get('timeMongroupSchedule');
        $timeTuegroupSchedule = $request->get('timeTuegroupSchedule');
        $timeWedgroupSchedule = $request->get('timeWedgroupSchedule');
        $timeThugroupSchedule = $request->get('timeThugroupSchedule');
        $timeFrigroupSchedule = $request->get('timeFrigroupSchedule');
        $timeSatgroupSchedule = $request->get('timeSatgroupSchedule');
        $timeSungroupSchedule = $request->get('timeSungroupSchedule');

        $OuttimeMongroupSchedule = $request->get('OuttimeMongroupSchedule');
        $OuttimeTuegroupSchedule = $request->get('OuttimeTuegroupSchedule');
        $OuttimeWedgroupSchedule = $request->get('OuttimeWedgroupSchedule');
        $OuttimeThugroupSchedule = $request->get('OuttimeThugroupSchedule');
        $OuttimeFrigroupSchedule = $request->get('OuttimeFrigroupSchedule');
        $OuttimeSatgroupSchedule = $request->get('OuttimeSatgroupSchedule');
        $OuttimeSungroupSchedule = $request->get('OuttimeSungroupSchedule');

        if ($request->isXmlHttpRequest()) {
            $lk = [];

            foreach ($Employeemultiple as $Employeemultiples) {
                $dates = [];
                for ($i = $initial_date; $i <= $final_date; $i = date("Y-m-d", strtotime($i . "+ 1 days"))) {
                    $dates[] = $a1 = array('working_day' => $i, 'name_day' => date('D', strtotime($i)));
                }

                foreach ($dates as $dname) {
                    for ($j = 0; $j < count($dname['working_day']); ++$j) {

                        $em = $this->getDoctrine()->getManager();
                        $e = $em->getRepository('BackendBundle:EmployeeTimeGroup');
                        $emplos = $e->createQueryBuilder('e')
                            ->select('e.idEmployee,e.startDate')
                            ->where('e.idEmployee = :idEmployee')
                            ->andWhere('e.startDate = :startDate')
                            ->setParameter('idEmployee', $Employeemultiples['idemployee'])
                            ->setParameter('startDate', new \Datetime($dname['working_day']))
                            ->getQuery()
                            ->getResult();

                        if (!$emplos) {
                            $employeeTimeGroup = new Employeetimegroup();
                            $employeeTimeGroup->setIdGroupSchedule($Employeemultiples['idGroupSchedulemultiple']);
                            $employeeTimeGroup->setIdEmployee($Employeemultiples['idemployee']);

                            switch ($dname['name_day']) {
                                case 'Mon':
                                    $employeeTimeGroup->setHourIn($timeMongroupSchedule);
                                    $employeeTimeGroup->setHourOut($OuttimeMongroupSchedule);
                                    break;
                                case 'Tue':
                                    $employeeTimeGroup->setHourIn($timeTuegroupSchedule);
                                    $employeeTimeGroup->setHourOut($OuttimeTuegroupSchedule);
                                    break;
                                case 'Wed':
                                    $employeeTimeGroup->setHourIn($timeWedgroupSchedule);
                                    $employeeTimeGroup->setHourOut($OuttimeWedgroupSchedule);
                                    break;
                                case 'Thu':
                                    $employeeTimeGroup->setHourIn($timeThugroupSchedule);
                                    $employeeTimeGroup->setHourOut($OuttimeThugroupSchedule);
                                    break;
                                case 'Fri':
                                    $employeeTimeGroup->setHourIn($timeFrigroupSchedule);
                                    $employeeTimeGroup->setHourOut($OuttimeFrigroupSchedule);
                                    break;
                                case 'Sat':
                                    $employeeTimeGroup->setHourIn($timeSatgroupSchedule);
                                    $employeeTimeGroup->setHourOut($OuttimeSatgroupSchedule);
                                    break;
                                case 'Sun':
                                    $employeeTimeGroup->setHourIn($timeSungroupSchedule);
                                    $employeeTimeGroup->setHourOut($OuttimeSungroupSchedule);
                                    break;
                            }

                            $employeeTimeGroup->setStartDate(new \DateTime($dname['working_day']));
                            $em = $this->getDoctrine()->getManager();
                            $em->persist($employeeTimeGroup);
                            $em->flush();
                        } else {
                            $em = $this->getDoctrine()->getManager();
                            $emplostime = $em->getRepository('BackendBundle:EmployeeTimeGroup');
                            $qb = $emplostime->createQueryBuilder('e')->update();

                            switch ($dname['name_day']) {
                                case 'Mon':
                                    $qb->set('e.hourIn', '?1');
                                    $qb->set('e.hourOut', '?2');
                                    $qb->where('e.idEmployee = ?3');
                                    $qb->andWhere('e.startDate = ?4');
                                    $qb->setParameter(1, $timeMongroupSchedule);
                                    $qb->setParameter(2, $OuttimeMongroupSchedule);
                                    $qb->setParameter(3, $Employeemultiples['idemployee']);
                                    $qb->setParameter(4, new \DateTime($dname['working_day']));
                                    $qb->getQuery()->execute();
                                    break;
                                case 'Tue':
                                    $qb->set('e.hourIn', '?1');
                                    $qb->set('e.hourOut', '?2');
                                    $qb->where('e.idEmployee = ?3');
                                    $qb->andWhere('e.startDate = ?4');
                                    $qb->setParameter(1, $timeTuegroupSchedule);
                                    $qb->setParameter(2, $OuttimeTuegroupSchedule);
                                    $qb->setParameter(3, $Employeemultiples['idemployee']);
                                    $qb->setParameter(4, new \DateTime($dname['working_day']));
                                    $qb->getQuery()->execute();
                                    break;
                                case 'Wed':
                                    $qb->set('e.hourIn', '?1');
                                    $qb->set('e.hourOut', '?2');
                                    $qb->where('e.idEmployee = ?3');
                                    $qb->andWhere('e.startDate = ?4');
                                    $qb->setParameter(1, $timeWedgroupSchedule);
                                    $qb->setParameter(2, $OuttimeWedgroupSchedule);
                                    $qb->setParameter(3, $Employeemultiples['idemployee']);
                                    $qb->setParameter(4, new \DateTime($dname['working_day']));
                                    $qb->getQuery()->execute();
                                    break;
                                case 'Thu':
                                    $qb->set('e.hourIn', '?1');
                                    $qb->set('e.hourOut', '?2');
                                    $qb->where('e.idEmployee = ?3');
                                    $qb->andWhere('e.startDate = ?4');
                                    $qb->setParameter(1, $timeThugroupSchedule);
                                    $qb->setParameter(2, $OuttimeThugroupSchedule);
                                    $qb->setParameter(3, $Employeemultiples['idemployee']);
                                    $qb->setParameter(4, new \DateTime($dname['working_day']));
                                    $qb->getQuery()->execute();
                                    break;
                                case 'Fri':
                                    $qb->set('e.hourIn', '?1');
                                    $qb->set('e.hourOut', '?2');
                                    $qb->where('e.idEmployee = ?3');
                                    $qb->andWhere('e.startDate = ?4');
                                    $qb->setParameter(1, $timeFrigroupSchedule);
                                    $qb->setParameter(2, $OuttimeFrigroupSchedule);
                                    $qb->setParameter(3, $Employeemultiples['idemployee']);
                                    $qb->setParameter(4, new \DateTime($dname['working_day']));

                                    $qb->getQuery()->execute();
                                    break;
                                case 'Sat':
                                    $qb->set('e.hourIn', '?1');
                                    $qb->set('e.hourOut', '?2');
                                    $qb->where('e.idEmployee = ?3');
                                    $qb->andWhere('e.startDate = ?4');
                                    $qb->setParameter(1, $timeSatgroupSchedule);
                                    $qb->setParameter(2, $OuttimeSatgroupSchedule);
                                    $qb->setParameter(3, $Employeemultiples['idemployee']);
                                    $qb->setParameter(4, new \DateTime($dname['working_day']));
                                    $qb->getQuery()->execute();
                                    break;
                                case 'Sun':
                                    $qb->set('e.hourIn', '?1');
                                    $qb->set('e.hourOut', '?2');
                                    $qb->where('e.idEmployee = ?3');
                                    $qb->andWhere('e.startDate = ?4');
                                    $qb->setParameter(1, $timeSungroupSchedule);
                                    $qb->setParameter(2, $OuttimeSungroupSchedule);
                                    $qb->setParameter(3, $Employeemultiples['idemployee']);
                                    $qb->setParameter(4, new \DateTime($dname['working_day']));
                                    $qb->getQuery()->execute();
                                    break;
                            }
                        }
                    }
                }
            }

            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);
            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'initial_date' => $serializer->serialize($lk, 'json'),
            ));
            return $response;
        }
    }

    public function grupoasignacionAction(Request $request)
    {
        $groupSchedule = $request->get('groupSchedule');
        $idemployeess = $request->get('idemployeess');
        $initial_date = $request->get('initial_date');
        $final_date = $request->get('final_date');

        $timeMongroupSchedule = $request->get('timeMongroupSchedule');
        $timeTuegroupSchedule = $request->get('timeTuegroupSchedule');
        $timeWedgroupSchedule = $request->get('timeWedgroupSchedule');
        $timeThugroupSchedule = $request->get('timeThugroupSchedule');
        $timeFrigroupSchedule = $request->get('timeFrigroupSchedule');
        $timeSatgroupSchedule = $request->get('timeSatgroupSchedule');
        $timeSungroupSchedule = $request->get('timeSungroupSchedule');

        $OuttimeMongroupSchedule = $request->get('OuttimeMongroupSchedule');
        $OuttimeTuegroupSchedule = $request->get('OuttimeTuegroupSchedule');
        $OuttimeWedgroupSchedule = $request->get('OuttimeWedgroupSchedule');
        $OuttimeThugroupSchedule = $request->get('OuttimeThugroupSchedule');
        $OuttimeFrigroupSchedule = $request->get('OuttimeFrigroupSchedule');
        $OuttimeSatgroupSchedule = $request->get('OuttimeSatgroupSchedule');
        $OuttimeSungroupSchedule = $request->get('OuttimeSungroupSchedule');

        if ($request->isXmlHttpRequest()) {
            $dates = [];
            for ($i = $initial_date; $i <= $final_date; $i = date("Y-m-d", strtotime($i . "+ 1 days"))) {
                $dates[] = $a1 = array('working_day' => $i, 'name_day' => date('D', strtotime($i)));
            }

            $lk = [];
            foreach ($dates as $dname) {
                for ($j = 0; $j < count($dname['working_day']); ++$j) {

                    $em = $this->getDoctrine()->getManager();
                    $e = $em->getRepository('BackendBundle:EmployeeTimeGroup');
                    $emplos = $e->createQueryBuilder('e')
                        ->select('e.idEmployee,e.startDate')
                        ->where('e.idEmployee = :idEmployee')
                        ->andWhere('e.startDate = :startDate')
                        ->setParameter('idEmployee', $idemployeess)
                        ->setParameter('startDate', new \DateTime($dname['working_day']))
                        ->getQuery()
                        ->getResult();

                    if (!$emplos) {

                        $employeeTimeGroup = new Employeetimegroup();
                        $employeeTimeGroup->setIdGroupSchedule($groupSchedule);
                        $employeeTimeGroup->setIdEmployee($idemployeess);

                        switch ($dname['name_day']) {
                            case 'Mon':
                                $employeeTimeGroup->setHourIn($timeMongroupSchedule);
                                $employeeTimeGroup->setHourOut($OuttimeMongroupSchedule);
                                break;
                            case 'Tue':
                                $employeeTimeGroup->setHourIn($timeTuegroupSchedule);
                                $employeeTimeGroup->setHourOut($OuttimeTuegroupSchedule);
                                break;
                            case 'Wed':
                                $employeeTimeGroup->setHourIn($timeWedgroupSchedule);
                                $employeeTimeGroup->setHourOut($OuttimeWedgroupSchedule);
                                break;
                            case 'Thu':
                                $employeeTimeGroup->setHourIn($timeThugroupSchedule);
                                $employeeTimeGroup->setHourOut($OuttimeThugroupSchedule);
                                break;
                            case 'Fri':
                                $employeeTimeGroup->setHourIn($timeFrigroupSchedule);
                                $employeeTimeGroup->setHourOut($OuttimeFrigroupSchedule);
                                break;
                            case 'Sat':
                                $employeeTimeGroup->setHourIn($timeSatgroupSchedule);
                                $employeeTimeGroup->setHourOut($OuttimeSatgroupSchedule);
                                break;
                            case 'Sun':
                                $employeeTimeGroup->setHourIn($timeSungroupSchedule);
                                $employeeTimeGroup->setHourOut($OuttimeSungroupSchedule);
                                break;
                        }

                        $employeeTimeGroup->setStartDate(new \DateTime($dname['working_day']));
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($employeeTimeGroup);
                        $em->flush();
                    } else {
                        $em = $this->getDoctrine()->getManager();
                        $emplostime = $em->getRepository('BackendBundle:EmployeeTimeGroup');
                        $qb = $emplostime->createQueryBuilder('e')->update();


                        switch ($dname['name_day']) {
                            case 'Mon':
                                $qb->set('e.hourIn', '?1');
                                $qb->set('e.hourOut', '?2');
                                $qb->where('e.idEmployee = ?3');
                                $qb->andWhere('e.startDate = ?4');
                                $qb->setParameter(1, $timeMongroupSchedule);
                                $qb->setParameter(2, $OuttimeMongroupSchedule);
                                $qb->setParameter(3, $idemployeess);
                                $qb->setParameter(4, new \DateTime($dname['working_day']));
                                $qb->getQuery()->execute();
                                break;
                            case 'Tue':
                                $qb->set('e.hourIn', '?1');
                                $qb->set('e.hourOut', '?2');
                                $qb->where('e.idEmployee = ?3');
                                $qb->andWhere('e.startDate = ?4');
                                $qb->setParameter(1, $timeTuegroupSchedule);
                                $qb->setParameter(2, $OuttimeTuegroupSchedule);
                                $qb->setParameter(3, $idemployeess);
                                $qb->setParameter(4, new \DateTime($dname['working_day']));
                                $qb->getQuery()->execute();
                                break;
                            case 'Wed':
                                $qb->set('e.hourIn', '?1');
                                $qb->set('e.hourOut', '?2');
                                $qb->where('e.idEmployee = ?3');
                                $qb->andWhere('e.startDate = ?4');
                                $qb->setParameter(1, $timeWedgroupSchedule);
                                $qb->setParameter(2, $OuttimeWedgroupSchedule);
                                $qb->setParameter(3, $idemployeess);
                                $qb->setParameter(4, new \DateTime($dname['working_day']));
                                $qb->getQuery()->execute();
                                break;
                            case 'Thu':
                                $qb->set('e.hourIn', '?1');
                                $qb->set('e.hourOut', '?2');
                                $qb->where('e.idEmployee = ?3');
                                $qb->andWhere('e.startDate = ?4');
                                $qb->setParameter(1, $timeThugroupSchedule);
                                $qb->setParameter(2, $OuttimeThugroupSchedule);
                                $qb->setParameter(3, $idemployeess);
                                $qb->setParameter(4, new \DateTime($dname['working_day']));
                                $qb->getQuery()->execute();
                                break;
                            case 'Fri':
                                $qb->set('e.hourIn', '?1');
                                $qb->set('e.hourOut', '?2');
                                $qb->where('e.idEmployee = ?3');
                                $qb->andWhere('e.startDate = ?4');
                                $qb->setParameter(1, $timeFrigroupSchedule);
                                $qb->setParameter(2, $OuttimeFrigroupSchedule);
                                $qb->setParameter(3, $idemployeess);
                                $qb->setParameter(4, new \DateTime($dname['working_day']));

                                $qb->getQuery()->execute();
                                break;
                            case 'Sat':
                                $qb->set('e.hourIn', '?1');
                                $qb->set('e.hourOut', '?2');
                                $qb->where('e.idEmployee = ?3');
                                $qb->andWhere('e.startDate = ?4');
                                $qb->setParameter(1, $timeSatgroupSchedule);
                                $qb->setParameter(2, $OuttimeSatgroupSchedule);
                                $qb->setParameter(3, $idemployeess);
                                $qb->setParameter(4, new \DateTime($dname['working_day']));
                                $qb->getQuery()->execute();
                                break;
                            case 'Sun':
                                $qb->set('e.hourIn', '?1');
                                $qb->set('e.hourOut', '?2');
                                $qb->where('e.idEmployee = ?3');
                                $qb->andWhere('e.startDate = ?4');
                                $qb->setParameter(1, $timeSungroupSchedule);
                                $qb->setParameter(2, $OuttimeSungroupSchedule);
                                $qb->setParameter(3, $idemployeess);
                                $qb->setParameter(4, new \DateTime($dname['working_day']));
                                $qb->getQuery()->execute();
                                break;
                        }
                    }
                }
            }

            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);

            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'initial_date' => $serializer->serialize($lk, 'json'),
            ));

            return $response;

        }
    }
}
