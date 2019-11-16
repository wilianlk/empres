<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\ManagerOffice;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Manageroffice controller.
 *
 */
class ManagerOfficeController extends Controller
{
    /**
     * Lists all managerOffice entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $managerOffices = $em->getRepository('BackendBundle:ManagerOffice')->findAll();

        $managerOffice = new Manageroffice();
        $form = $this->createForm('AppBundle\Form\ManagerOfficeType', $managerOffice);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $managerOffices,
            $request->query->getInt('page', 1),
            2
        );

        return $this->render('@App/TimeClock/administradores/index.html.twig', array(
            'managerOffices' => $pagination,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new managerOffice entity.
     *
     */
    public function newAction(Request $request)
    {
        $managerOffice = new Manageroffice();
        $form = $this->createForm('AppBundle\Form\ManagerOfficeType', $managerOffice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($managerOffice);
            $em->flush();

            return $this->redirectToRoute('manageroffice_show', array('idManagerOffice' => $managerOffice->getIdmanageroffice()));
        }

        return $this->render('manageroffice/new.html.twig', array(
            'managerOffice' => $managerOffice,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a managerOffice entity.
     *
     */
    public function showAction(ManagerOffice $managerOffice)
    {
        $deleteForm = $this->createDeleteForm($managerOffice);

        return $this->render('manageroffice/show.html.twig', array(
            'managerOffice' => $managerOffice,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing managerOffice entity.
     *
     */
    public function editAction(Request $request, ManagerOffice $managerOffice)
    {
        $deleteForm = $this->createDeleteForm($managerOffice);
        $editForm = $this->createForm('AppBundle\Form\ManagerOfficeType', $managerOffice);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('manageroffice_edit', array('idManagerOffice' => $managerOffice->getIdmanageroffice()));
        }

        return $this->render('manageroffice/edit.html.twig', array(
            'managerOffice' => $managerOffice,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a managerOffice entity.
     *
     */
    public function deleteAction(Request $request, ManagerOffice $managerOffice)
    {
        $form = $this->createDeleteForm($managerOffice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($managerOffice);
            $em->flush();
        }

        return $this->redirectToRoute('manageroffice_index');
    }

    /**
     * Creates a form to delete a managerOffice entity.
     *
     * @param ManagerOffice $managerOffice The managerOffice entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ManagerOffice $managerOffice)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('manageroffice_delete', array('idManagerOffice' => $managerOffice->getIdmanageroffice())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
