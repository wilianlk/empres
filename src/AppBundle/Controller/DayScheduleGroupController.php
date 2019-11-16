<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\DayScheduleGroup;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Dayschedulegroup controller.
 *
 */
class DayScheduleGroupController extends Controller
{

    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $dayScheduleGroup = new Dayschedulegroup();
        $form = $this->createForm('AppBundle\Form\DayScheduleGroupType', $dayScheduleGroup);

        if ($request->isXmlHttpRequest()) {

            $day_idGroupSchedule = $request->get('day_idGroupSchedule');

            $groupSchedul = "SELECT g.idDayScheduleGroup,
                             Replace(Replace(
                             Replace(Replace(
                             Replace(Replace(
                             Replace(g.dayOfWeek,'Sun','Domingo'),'Sat','Sabado'),'Fri','Viernes'),
                             'Thu','Jueves'),'Wed','Miercoles'),'Tue','Martes'),'Mon','Lunes') dayOfWeek,
                             gr.name,g.hourIn,g.hourOut
                             FROM BackendBundle:DayScheduleGroup g
                             LEFT JOIN BackendBundle:GroupSchedule gr WITH (g.idGroupSchedule = gr.idGroupschedule)
                             WHERE g.idGroupSchedule = :idGroupSchedule";

            $query = $em->createQuery($groupSchedul)
                ->setParameter('idGroupSchedule', $day_idGroupSchedule);
            $groupSchedules = $query->getResult();

            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);

            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'data' => $serializer->serialize($groupSchedules, 'json'),
            ));
            return $response;
        }

        return $this->render('@App/TimeClock/diahorariogrupo/index.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function newAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $dayOfweek = $request->get('dayOfweek');
            $idGroupSchedule = $request->get('idGroupSchedule');
            $hourIn = $request->get('hourIn');
            $hourOut = $request->get('hourOut');

            $days = explode(',', $dayOfweek);

            $ll = [];
            foreach ($days as $week) {

                for ($i = 0; $i < count($week); ++$i) {


                    $em = $this->getDoctrine()->getManager();
                    $e = $em->getRepository('BackendBundle:DayScheduleGroup');
                    $daySchedul = $e->createQueryBuilder('d')
                        ->select('d.dayOfWeek')
                        ->where('d.dayOfWeek = :dayOfWeek')
                        ->andWhere('d.idGroupSchedule = :idGroupSchedule')
                        ->setParameter('dayOfWeek', $week )
                        ->setParameter('idGroupSchedule', $idGroupSchedule )
                        ->getQuery()
                        ->getResult();

                    if (!$daySchedul) {

                        $ll[] = $week;

                        $dayScheduleGroup = new Dayschedulegroup();
                        $dayScheduleGroup->setIdGroupSchedule($idGroupSchedule);
                        $dayScheduleGroup->setDayOfWeek($week);
                        $dayScheduleGroup->setHourIn($hourIn);
                        $dayScheduleGroup->setHourOut($hourOut);
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($dayScheduleGroup);
                        $em->flush();
                    }else
                    {
                        $em3 = $this->getDoctrine()->getManager();
                        $dayScheduleG = $em3->getRepository('BackendBundle:DayScheduleGroup');
                        $qb = $dayScheduleG->createQueryBuilder('d')
                            ->update()
                            ->set('d.hourIn', '?1')
                            ->set('d.hourOut', '?2')
                            ->where('d.dayOfWeek = :dayOfWeek')
                            ->andWhere('d.idGroupSchedule = :idGroupSchedule')
                            ->setParameter(1,$hourIn)
                            ->setParameter(2,$hourOut)
                            ->setParameter('dayOfWeek', $week)
                            ->setParameter('idGroupSchedule', $idGroupSchedule)
                            ->getQuery();
                        $p = $qb->execute();
                    }
                }
            }
            return new JsonResponse($ll);
        }
    }

}
