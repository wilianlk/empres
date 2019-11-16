<?php

namespace AppBundle\Controller;



use AppBundle\Form\ClienteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;;
use Symfony\Component\HttpFoundation\Request;
use BackendBundle\Entity\Cliente;

class ClienteController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT c.idCliente,c.nombre,c.apellido,c2.nombre AS tipo,
                g.nombre AS ciudadestado,g2.nombre AS ciudad,c.empresa,c.email,c.createdAt AS created_at
                FROM BackendBundle:Cliente c
                JOIN BackendBundle:SfGuardUser s WITH (s.id = c.createdBy)
                LEFT JOIN BackendBundle:GeoCiudad g WITH (g.idCiudad = c.idCiudad)
                LEFT JOIN BackendBundle:GeoPaisEstado g2 WITH (g2.idPaisEstado = g.idEstado)
                LEFT JOIN BackendBundle:GeoPais g3 WITH (g3.idPais = g2.idPais)
                LEFT JOIN BackendBundle:CliTipo c2 WITH (c2.idTipoCliente = c.idTipoCliente)
                WHERE c.mayorista = :mayorista";
        $query = $em->createQuery($dql)
            ->setParameter('mayorista', true);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('AppBundle:Cliente:cliente_list.html.twig',
            array('pagination' => $pagination));

    }

    public function createAction(Request $request)
    {
        $cliente = new Cliente();
        $form = $this->createForm(ClienteType::class, $cliente);

        return $this->render('AppBundle:Cliente:cliente_create.html.twig',['form'=>$form->createView()]);
    }
}
