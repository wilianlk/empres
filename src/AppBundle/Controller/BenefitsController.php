<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\Benefits;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class BenefitsController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $benefits = $em->getRepository('BackendBundle:Benefits')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $benefits,
            $request->query->getInt('page', 1),
            3
        );
        return $this->render('@App/TimeClock/beneficios/index.html.twig', array(
            'pagination' => $pagination
        ));
    }

    public function newAction(Request $request)
    {
        $benefit = new Benefits();
        $form = $this->createForm('AppBundle\Form\BenefitsType', $benefit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($benefit);
            $em->flush();

            return $this->redirectToRoute('timeclock_benefits_show', array('idBeneficio' => $benefit->getIdbeneficio()));
        }

        return $this->render('@App/TimeClock/beneficios/new.html.twig', array(
            'benefit' => $benefit,
            'form' => $form->createView(),
        ));
    }

    public function showAction(Benefits $benefit)
    {
        $deleteForm = $this->createDeleteForm($benefit);

        return $this->render('@App/TimeClock/beneficios/show.html.twig', array(
            'benefit' => $benefit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function editAction(Request $request, Benefits $benefit)
    {
        $deleteForm = $this->createDeleteForm($benefit);
        $editForm = $this->createForm('AppBundle\Form\BenefitsType', $benefit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('timeclock_benefits_edit', array('idBeneficio' => $benefit->getIdbeneficio()));
        }

        return $this->render('@App/TimeClock/beneficios/edit.html.twig', array(
            'benefit' => $benefit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function deleteAction(Request $request, Benefits $benefit)
    {
        $form = $this->createDeleteForm($benefit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($benefit);
            $em->flush();
        }

        return $this->redirectToRoute('timeclock_benefits_index');
    }

    private function createDeleteForm(Benefits $benefit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('timeclock_benefits_delete', array('idBeneficio' => $benefit->getIdbeneficio())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
