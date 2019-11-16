<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\GroupSchedule;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Groupschedule controller.
 *
 */
class GroupScheduleController extends Controller
{
    /**
     * Lists all groupSchedule entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $groupSchedulecrea = new Groupschedule();
        $form = $this->createForm('AppBundle\Form\GroupScheduleType', $groupSchedulecrea);

        if ($request->isXmlHttpRequest())
        {
            $groupSchedul = 'SELECT g
                         FROM BackendBundle:GroupSchedule g';
            $query = $em->createQuery($groupSchedul);
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

        return $this->render('@App/TimeClock/grupoHorario/index.html.twig', array('form' => $form->createView()));
    }

    /**
     * Creates a new groupSchedule entity.
     *
     */
    public function newAction(Request $request)
    {
        if ($request->isXmlHttpRequest())
        {
            $name = $request->get('name');
            $office = $request->get('office');
            $toleranceBeforeIn = $request->get('toleranceBeforeIn');
            $toleranceAfterIn = $request->get('toleranceAfterIn');
            $toleranceBeforeOut = $request->get('toleranceBeforeOut');
            $toleranceAfterOut = $request->get('toleranceAfterOut');

            $groupSchedule = new Groupschedule();
            $groupSchedule->setName($name);
            $groupSchedule->setToleranceBeforeIn($toleranceBeforeIn);
            $groupSchedule->setToleranceAfterIn($toleranceAfterIn);
            $groupSchedule->setToleranceBeforeOut($toleranceBeforeOut);
            $groupSchedule->setToleranceAfterOut($toleranceAfterOut);
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupSchedule);
            $em->flush();

            return new JsonResponse('Insertado');
        }
    }

    /**
     * Finds and displays a groupSchedule entity.
     *
     */
    public function showAction(GroupSchedule $groupSchedule)
    {
        $deleteForm = $this->createDeleteForm($groupSchedule);

        return $this->render('groupschedule/show.html.twig', array(
            'groupSchedule' => $groupSchedule,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing groupSchedule entity.
     *
     */
    public function editAction(Request $request, GroupSchedule $groupSchedule)
    {
        $deleteForm = $this->createDeleteForm($groupSchedule);
        $editForm = $this->createForm('AppBundle\Form\GroupScheduleType', $groupSchedule);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('groupschedule_edit', array('idGroupSchedule' => $groupSchedule->getIdgroupschedule()));
        }

        return $this->render('groupschedule/edit.html.twig', array(
            'groupSchedule' => $groupSchedule,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function deleteAction(Request $request, GroupSchedule $groupSchedule)
    {
        $form = $this->createDeleteForm($groupSchedule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($groupSchedule);
            $em->flush();
        }

        return $this->redirectToRoute('groupschedule_index');
    }

    /**
     * Creates a form to delete a groupSchedule entity.
     *
     * @param GroupSchedule $groupSchedule The groupSchedule entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(GroupSchedule $groupSchedule)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('groupschedule_delete', array('idGroupSchedule' => $groupSchedule->getIdgroupschedule())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
