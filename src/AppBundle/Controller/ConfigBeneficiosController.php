<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\ConfigBeneficios;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class ConfigBeneficiosController extends Controller
{

    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $config = "SELECT c.idConfigBeneficios,c.idBeneficio,b.nombre,cc.nombreConfig,c.cantidad,c.unidadMedida
                     FROM BackendBundle:ConfigBeneficios c
                     JOIN BackendBundle:Benefits b WITH (c.idBeneficio = b.idBeneficio)
                     JOIN BackendBundle:Configuracion cc WITH (c.idConfig = cc.idConfig)";

        $query = $em->createQuery($config);
        $configBeneficios = $query->getResult();

        $paginator = $this->get('knp_paginator');
        $configBeneficio = $paginator->paginate(
            $configBeneficios,
            $request->query->getInt('page', 1),
            1
        );

        return $this->render('@App/TimeClock/configbeneficios/index.html.twig', array(
            'configBeneficios' => $configBeneficio,
        ));
    }

    public function newAction(Request $request)
    {
        $configBeneficio = new ConfigBeneficios();
        $form = $this->createForm('AppBundle\Form\ConfigBeneficiosType', $configBeneficio);

        if ($request->isXmlHttpRequest()) {
            $idBeneficio = $request->query->get('idBeneficio');
            $idConfig = $request->query->get('idConfig');
            $cantidad = $request->query->get('cantidad');
            $unidadMedida = $request->query->get('unidadMedida');

            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);

            $configBeneficio->setIdBeneficio($idBeneficio);
            $configBeneficio->setIdConfig($idConfig);
            $configBeneficio->setCantidad($cantidad);
            $configBeneficio->setUnidadMedida($unidadMedida);
            $em = $this->getDoctrine()->getManager();
            $em->persist($configBeneficio);
            $em->flush();

            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'conbenefits' => $serializer->serialize($idBeneficio, 'json')
            ));

            return $response;
        }

        return $this->render('@App/TimeClock/configbeneficios/new.html.twig', array(
            'configBeneficio' => $configBeneficio,
            'form' => $form->createView(),
        ));
    }

    public function showAction(ConfigBeneficios $configBeneficio)
    {
        $deleteForm = $this->createDeleteForm($configBeneficio);

        return $this->render('configbeneficios/show.html.twig', array(
            'configBeneficio' => $configBeneficio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function editAction(Request $request, ConfigBeneficios $configBeneficio)
    {
        $deleteForm = $this->createDeleteForm($configBeneficio);
        $editForm = $this->createForm('AppBundle\Form\ConfigBeneficiosType', $configBeneficio);
        $editForm->handleRequest($request);

        if ($request->isXmlHttpRequest())
        {
            return new JsonResponse('fff');
        }

        return $this->render('@App/TimeClock/configbeneficios/edit.html.twig', array(
            'configBeneficio' => $configBeneficio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function deleteAction(Request $request, ConfigBeneficios $configBeneficio)
    {
        $form = $this->createDeleteForm($configBeneficio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($configBeneficio);
            $em->flush();
        }

        return $this->redirectToRoute('timeclock_configbeneficios_index');
    }


    private function createDeleteForm(ConfigBeneficios $configBeneficio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('timeclock_configbeneficios_delete', array('idConfigBeneficios' => $configBeneficio->getIdconfigbeneficios())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
