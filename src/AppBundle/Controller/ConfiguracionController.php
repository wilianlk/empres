<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\Configuracion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ConfiguracionController extends Controller
{

    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $configuracions = $em->getRepository('BackendBundle:Configuracion')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $configuracions,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('@App/TimeClock/configuracion/index.html.twig', array(
            'pagination' => $pagination
        ));
    }

    public function newAction(Request $request)
    {
        $configuracion = new Configuracion();
        $form = $this->createForm('AppBundle\Form\ConfiguracionType', $configuracion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($configuracion);
            $em->flush();

            return $this->redirectToRoute('timeclock_configuracion_show', array('idConfig' => $configuracion->getIdconfig()));
        }

        return $this->render('@App/TimeClock/configuracion/new.html.twig', array(
            'configuracion' => $configuracion,
            'form' => $form->createView(),
        ));
    }

    public function showAction(Configuracion $configuracion)
    {
        $deleteForm = $this->createDeleteForm($configuracion);

        return $this->render('@App/TimeClock/configuracion/show.html.twig', array(
            'configuracion' => $configuracion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function editAction(Request $request, Configuracion $configuracion)
    {
        $deleteForm = $this->createDeleteForm($configuracion);
        $editForm = $this->createForm('AppBundle\Form\ConfiguracionType', $configuracion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('timeclock_configuracion_edit', array('idConfig' => $configuracion->getIdconfig()));
        }

        return $this->render('@App/TimeClock/configuracion/edit.html.twig', array(
            'configuracion' => $configuracion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function deleteAction(Request $request, Configuracion $configuracion)
    {
        $form = $this->createDeleteForm($configuracion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($configuracion);
            $em->flush();
        }

        return $this->redirectToRoute('timeclock_configuracion_index');
    }

    private function createDeleteForm(Configuracion $configuracion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('timeclock_configuracion_delete', array('idConfig' => $configuracion->getIdconfig())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
