<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\ContractTypes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ContractTypesController extends Controller
{

    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $contractTypes = $em->getRepository('BackendBundle:ContractTypes')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $contractTypes,
            $request->query->getInt('page', 1),
            2
        );

        return $this->render('@App/TimeClock/tipoContracto/index.html.twig', array(
            'pagination' => $pagination
        ));
    }


    public function newAction(Request $request)
    {
        $contractType = new ContractTypes();
        $form = $this->createForm('AppBundle\Form\ContractTypesType', $contractType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contractType);
            $em->flush();

            return $this->redirectToRoute('timeclock_contracttypes_show', array('idTypeContract' => $contractType->getIdtypecontract()));
        }

        return $this->render('@App/TimeClock/tipoContracto/new.html.twig', array(
            'contractType' => $contractType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a contractType entity.
     *
     */
    public function showAction(ContractTypes $contractType)
    {
        $deleteForm = $this->createDeleteForm($contractType);

        return $this->render('@App/TimeClock/tipoContracto/show.html.twig', array(
            'contractType' => $contractType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing contractType entity.
     *
     */
    public function editAction(Request $request, ContractTypes $contractType)
    {
        $deleteForm = $this->createDeleteForm($contractType);
        $editForm = $this->createForm('AppBundle\Form\ContractTypesType', $contractType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('timeclock_contracttypes_edit', array('idTypeContract' => $contractType->getIdtypecontract()));
        }

        return $this->render('@App/TimeClock/tipoContracto/edit.html.twig', array(
            'contractType' => $contractType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a contractType entity.
     *
     */
    public function deleteAction(Request $request, ContractTypes $contractType)
    {
        $form = $this->createDeleteForm($contractType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contractType);
            $em->flush();
        }

        return $this->redirectToRoute('timeclock_contracttypes_index');
    }

    /**
     * Creates a form to delete a contractType entity.
     *
     * @param ContractTypes $contractType The contractType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ContractTypes $contractType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('timeclock_contracttypes_delete', array('idTypeContract' => $contractType->getIdtypecontract())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
