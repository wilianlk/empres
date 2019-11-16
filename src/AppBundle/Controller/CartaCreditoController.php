<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\ClienteAplicacionCredito;
use BackendBundle\Entity\ClienteAplicacionCreditoCompanyInformation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class CartaCreditoController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('@App/CartaCredito/carta_index.html.twig', array());
    }

    public function saveAction(Request $request)
    {
        $name = $request->get('name');
        $lastname = $request->get('lastname');
        $address = $request->get('address');
        $floor = $request->get('floor');
        $state = $request->get('state');
        $city = $request->get('city');
        $zip_code = $request->get('zip_code');
        $mobile = $request->get('mobile');
        $email = $request->get('email');
        $language = $request->get('language');
        $birthDate = $request->get('birthDate');
        $income = $request->get('income');
        $tipo_identificacion = $request->get('tipo_identificacion');

        $licencence_numer_licencence_state = $request->get('licencence_numer_licencence_state');
        $licencence_state = $request->get('licencence_state');
        $licence_due_date = $request->get('licence_due_date');

        $passport_number_passport = $request->get('passport_number_passport');
        $passport_country = $request->get('passport_country');
        $passport_due_date = $request->get('passport_due_date');

        $personal_reference_name = $request->get('personal_reference_name');
        $personal_reference_last_name = $request->get('personal_reference_last_name');
        $personal_reference_mobile = $request->get('personal_reference_mobile');
        $personal_reference_relation = $request->get('personal_reference_relation');

        $personal_reference_name2 = $request->get('personal_reference_name2');
        $personal_reference_last_name2 = $request->get('personal_reference_last_name2');
        $personal_reference_mobile2 = $request->get('personal_reference_mobile2');
        $personal_reference_relation2 = $request->get('personal_reference_relation2');

        $company = $request->get('business_type');
        $bussines_type = $request->get('business_type');
        $bussines_name = $request->get('business_name');
        $bussines_tax_id = $request->get('business_tax_id');
        $bussines_address = $request->get('business_address');
        $bussines_floor = $request->get('business_floor');
        $bussines_state = $request->get('business_state');
        $bussines_city = $request->get('business_city');
        $bussines_zip_code = $request->get('business_zip_code');
        $bussines_mobile = $request->get('business_mobile');
        $bussines_time_bussines = $request->get('business_time_business');
        $bussines_income = $request->get('business_income');
        $signaturepad_name = $request->get('signaturepad_name');

        $deal = (string) $request->get('deal');


        if ($request->isXmlHttpRequest()) {

            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);

            $creditoClientes = new ClienteAplicacionCredito();
            $creditoClientes->setName($name);
            $creditoClientes->setLastname($lastname);
            $creditoClientes->setAddress($address);
            $creditoClientes->setFloor($floor);
            $creditoClientes->setState($state);
            $creditoClientes->setCity($city);
            $creditoClientes->setZipCode($zip_code);
            $creditoClientes->setMobile($mobile);
            $creditoClientes->setEmail($email);
            $creditoClientes->setLanguage($language);
            try {
                $creditoClientes->setBirthdate(new \DateTime($birthDate));
            } catch (\Exception $e) {
            }
            $creditoClientes->setIncome(str_replace ( ".", "", $income));

            $creditoClientes->setTipoIdentificacion($tipo_identificacion);

            if ($tipo_identificacion === 'pasaporte')
            {
                $creditoClientes->setTipoIdentificacionNumber($passport_number_passport);
                $creditoClientes->setTipoIdentificacionStateCountry($passport_country);
                try {
                    $creditoClientes->setTipoIdentificacionDueDate(new \DateTime($passport_due_date));
                } catch (\Exception $e) {
                }
            }else if($tipo_identificacion === 'licencia')
            {
                $creditoClientes->setTipoIdentificacionNumber($licencence_numer_licencence_state);
                $creditoClientes->setTipoIdentificacionStateCountry($licencence_state);
                try {
                    $creditoClientes->setTipoIdentificacionDueDate(new \DateTime($licence_due_date));
                } catch (\Exception $e) {
                }
            }
//            $creditoClientes->setLicenceNumber($licencence_numer_licencence_state);
//            $creditoClientes->setLicencenceState($licencence_state);
//            try {
//                $creditoClientes->setLicenceDueDate(new \DateTime($licence_due_date));
//            } catch (\Exception $e) {
//            }
//
//            $creditoClientes->setPassportNumber($passport_number_passport);
//            $creditoClientes->setPassportCountry($passport_country);
//            try {
//                $creditoClientes->setPassportDueDate(new \DateTime($passport_due_date));
//            } catch (\Exception $e) {
//            }

            $creditoClientes->setPersonalReferenceName($personal_reference_name);
            $creditoClientes->setPersonalReferenceLastName($personal_reference_last_name);
            $creditoClientes->setPersonalReferenceMobile($personal_reference_mobile);
            $creditoClientes->setPersonalReferenceRelation($personal_reference_relation);

            $creditoClientes->setPersonalReferenceName2($personal_reference_name2);
            $creditoClientes->setPersonalReferenceLastName2($personal_reference_last_name2);
            $creditoClientes->setPersonalReferenceMobile2($personal_reference_mobile2);
            $creditoClientes->setPersonalReferenceRelation2($personal_reference_relation2);
            $creditoClientes->setSignatureRequired($signaturepad_name);
            $creditoClientes->setCreatedBy(1);
            $creditoClientes->setUpdatedBy(1);
            try {
                $creditoClientes->setCreatedAt(new \DateTime());
            } catch (\Exception $e) {
            }
            try {
                $creditoClientes->setUpdatedAt(new \DateTime());
            } catch (\Exception $e) {
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($creditoClientes);
            $em->flush();


            if ($deal === 'si') {

                $creditoClientescompany = new ClienteAplicacionCreditoCompanyInformation();
                $creditoClientescompany->setIdCreditoClientes($creditoClientes->getIdCreditoClientes());
                $creditoClientescompany->setBussinesType($bussines_type);
                $creditoClientescompany->setBussinesName($bussines_name);
                $creditoClientescompany->setTaxId($bussines_tax_id);
                $creditoClientescompany->setBusinessAddress($bussines_address);
                $creditoClientescompany->setFloor($bussines_floor);
                $creditoClientescompany->setState($bussines_state);
                $creditoClientescompany->setCity($bussines_city);
                $creditoClientescompany->setZipCode($bussines_zip_code);
                $creditoClientescompany->setBusinessPhoneNumber($bussines_mobile);
                $creditoClientescompany->setYearsInBussines($bussines_time_bussines);
                $creditoClientescompany->setBussinesAnnualNetIncome(str_replace ( ",", "", $bussines_income));
                $creditoClientescompany->setCreatedBy(1);
                $creditoClientescompany->setUpdatedBy(1);
                $creditoClientescompany->setUpdatedAt(new \DateTime());
                $creditoClientescompany->setCreatedAt(new \DateTime());

                $em2 = $this->getDoctrine()->getManager();
                $em2->persist($creditoClientescompany);
                $em2->flush();
            }

            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'name' => $serializer->serialize($name, 'json'),
                'lastname' => $serializer->serialize($lastname, 'json'),
                'address' => $serializer->serialize($address, 'json'),
                'floor' => $serializer->serialize($floor, 'json'),
                'state' => $serializer->serialize($state, 'json'),
                'city' => $serializer->serialize($city, 'json'),
                'zip_code' => $serializer->serialize($zip_code, 'json'),
                'mobile' => $serializer->serialize($mobile, 'json'),
                'email' => $serializer->serialize($email, 'json'),
                'language' => $serializer->serialize($language, 'json'),
                'birthDate' => $serializer->serialize($birthDate, 'json'),
                'income' => $serializer->serialize($income, 'json'),

                'tipo_identificacion' => $serializer->serialize($tipo_identificacion, 'json'),

                'licencence_numer_licencence_state' => $serializer->serialize($licencence_numer_licencence_state, 'json'),
                'licencence_state' => $serializer->serialize($licencence_state, 'json'),
                'licence_due_date' => $serializer->serialize($licence_due_date, 'json'),

                'passport_number_passport' => $serializer->serialize($passport_number_passport, 'json'),
                'passport_country' => $serializer->serialize($passport_country, 'json'),
                'passport_due_date' => $serializer->serialize($passport_due_date, 'json'),

                'personal_reference_name' => $serializer->serialize($personal_reference_name, 'json'),
                'personal_reference_last_name' => $serializer->serialize($personal_reference_last_name, 'json'),
                'personal_reference_mobile' => $serializer->serialize($personal_reference_mobile, 'json'),
                'personal_reference_relation' => $serializer->serialize($personal_reference_relation, 'json'),

                'personal_reference_name2' => $serializer->serialize($personal_reference_name2, 'json'),
                'personal_reference_last_name2' => $serializer->serialize($personal_reference_last_name2, 'json'),
                'personal_reference_mobile2' => $serializer->serialize($personal_reference_mobile2, 'json'),
                'personal_reference_relation2' => $serializer->serialize($personal_reference_relation2, 'json'),
                'id' => $serializer->serialize($creditoClientes->getIdCreditoClientes(), 'json'),
                'bussines_type' => $serializer->serialize($bussines_type, 'json'),
                'signaturepad_name' => $serializer->serialize($signaturepad_name, 'json'),
                'deal' => $serializer->serialize($deal, 'json'),
            ));

            return $response;
        }
    }


    public function showAction(Request $request)
    {
        return $this->render('AppBundle:CartaCredito/Default:contacto_credito.html.twig');
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
}
