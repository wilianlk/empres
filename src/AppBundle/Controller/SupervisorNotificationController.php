<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\Employees;
use BackendBundle\Entity\SupervisorNotification;
use BackendBundle\Entity\TypeOfPermitsRequired;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Supervisornotification controller.
 *
 */
class SupervisorNotificationController extends Controller
{
    public function indexAction(Request $request)
    {

       $ref =  $request->get('ref');

       if ($ref > 0)
       {
           $em = $this->getDoctrine()->getManager();
           $supervisorNotifications = $em->getRepository('BackendBundle:SupervisorNotification');
           $qb = $supervisorNotifications->createQueryBuilder('s')
               ->select('s.idSupervisorNotification,s.state,s.nota,s.inout,t.name permiso,e.empfullname')
               ->innerJoin(Employees::class, 'e', 'WITH', "s.idEmployee = e.idEmployee")
               ->leftJoin (TypeOfPermitsRequired::class, 't', 'WITH', "s.typeOfPermit = t.idTypeOfPermits")
               ->getQuery()
               ->getResult();
       }else
       {
          $em = $this->getDoctrine()->getManager();
           $supervisorNotifications = $em->getRepository('BackendBundle:SupervisorNotification');
           $qb = $supervisorNotifications->createQueryBuilder('s')
               ->select('s.idSupervisorNotification,s.state,s.nota,s.inout,t.name permiso,e.empfullname')
               ->innerJoin(Employees::class, 'e', 'WITH', "s.idEmployee = e.idEmployee")
               ->leftJoin (TypeOfPermitsRequired::class, 't', 'WITH', "s.typeOfPermit = t.idTypeOfPermits")
               ->where('e.empfullname like :empfullname')
               ->setParameter('empfullname', '%'.$ref.'%')
               ->getQuery()
               ->getResult();
       }


        $paginator = $this->get('knp_paginator');
        $supervisorNotification = $paginator->paginate(
            $qb,
            $request->query->getInt('page', 1),
            1
        );



        return $this->render('@App/TimeClock/supervisornotificacion/index.html.twig', array(
            'supervisorNotifications' => $supervisorNotification,
            'ref' => $ref,
        ));

    }

    public function notificationAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest()) {
            $supervisorNotifications = $em->getRepository('BackendBundle:SupervisorNotification')->findBy(array('state' => 0));
            $response = array();
            foreach ($supervisorNotifications as $supervisor) {
                $response[] = array(
                    'IdSupervisorNotification' => $supervisor->getIdSupervisorNotification(),
                );
            }
            return new JsonResponse($response);
        }
    }

    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest()) {

            $supervisorNotifications = "
                SELECT s.idSupervisorNotification,DATE_FORMAT(DATE_ADD(FROM_UNIXTIME(i.timestamp),'-4', 'hour'),'%H:%i:%s') as poncha,s.idEmployee,
                e.empfullname,g.name grupo,i.inout,em.hourIn,em.hourOut
                FROM BackendBundle:SupervisorNotification s
                JOIN BackendBundle:Employees e WITH (e.idEmployee = s.idEmployee)
                JOIN BackendBundle:Info i WITH (e.idEmployee = i.idEmployee)
                JOIN BackendBundle:Punchlist p WITH (p.punchitems = i.inout)
                LEFT JOIN BackendBundle:EmployeeTimeGroup em WITH (em.idEmployee = e.idEmployee)
                JOIN BackendBundle:DayScheduleGroup d WITH (d.idGroupSchedule = em.idGroupSchedule)
                JOIN BackendBundle:GroupSchedule g WITH (g.idGroupschedule = d.idGroupSchedule)
                WHERE DATE(FROM_UNIXTIME(i.timestamp)) = CURRENT_DATE()
                AND i.inout = p.punchitems
                AND e.empfullname <> 'admin'
                GROUP BY s.idSupervisorNotification
                ORDER BY i.timestamp DESC";
            $query = $em->createQuery($supervisorNotifications)
                ->setMaxResults(5);
            $supervisorr = $query->getResult();

            $response = array();
            foreach ($supervisorr as $supervisorNotifications) {
                $response [] = $supervisorNotifications;
            }
            return new JsonResponse($response);
        }
    }

    public function edittAction(Request $request, SupervisorNotification $supervisorNotification)
    {
        $em = $this->getDoctrine()->getManager();
        $typeOfPermitsRequireds = $em->getRepository('BackendBundle:TypeOfPermitsRequired')->findAll();

        $type = array();
        foreach ($typeOfPermitsRequireds as $typepermits) {
            $type[$typepermits->getName()] = $typepermits->getIdTypeOfPermits();
        }

        $employee = $em->getRepository('BackendBundle:Employees')->findBy(array('idEmployee'=>$supervisorNotification->getIdEmployee()));

        $editForm = $this->createFormBuilder($supervisorNotification)
            ->add('typeOfPermit', ChoiceType::class,
                array(
                    'label' => '',
                    'required' => false,
                    'choices' => $type,
                    'data' => null,
                    'attr' => array('class' => 'form-control'),
                ))
            ->add('idEmployee', TextType::class,
                ['data' => $employee[0]->getEmpfullname(),
                 'disabled' => true,
                 'attr' => ['class' => 'form-control']])

            ->add('state', CheckboxType::class, array(
                'required' => false,
                'value' => 1,
            ))
            ->add('nota', TextareaType::class, ['attr' => ['class' => 'form-control', 'placeholder' => 'Ingresa una nota']])
            ->getForm();

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('timeclock_supervisornotification_index');
        }

        return $this->render('@App/TimeClock/supervisornotificacion/edit.html.twig', array(
            'supervisorNotification' => $supervisorNotification,
            'edit_form' => $editForm->createView(),
        ));

    }

    public function permitAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $typeOfPermitsRequireds = $em->getRepository('BackendBundle:TypeOfPermitsRequired')->findAll();

        $typeOfPermitsRequiredd = new Typeofpermitsrequired();
        $form = $this->createForm('AppBundle\Form\TypeOfPermitsRequiredType', $typeOfPermitsRequiredd);

        if ($request->isXmlHttpRequest()) {
            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);

            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'data' => $serializer->serialize($typeOfPermitsRequireds, 'json'),
            ));
            return $response;
        }

        return $this->render('@App/TimeClock/tipopermiso/index.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function permitnewAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $name = $request->get('name');

            $typeOfPermitsRequired = new Typeofpermitsrequired();
            $typeOfPermitsRequired->setName($name);
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeOfPermitsRequired);
            $em->flush();

            return new JsonResponse('Insertado');
        }
    }

    public function permiteditAction(Request $request, TypeOfPermitsRequired $typeOfPermitsRequired)
    {
        $editForm = $this->createForm('AppBundle\Form\TypeOfPermitsRequiredType', $typeOfPermitsRequired);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->render('@App/TimeClock/tipopermiso/edit.html.twig', array(
            'supervisorNotification' => $typeOfPermitsRequired,
            'edit_form' => $editForm->createView(),
        ));
    }
}
