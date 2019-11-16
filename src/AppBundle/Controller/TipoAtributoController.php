<?php
/**
 * Created by PhpStorm.
 * User: @jdperea59
 * PC: gerencia-ti
 * Date: 5/04/18
 * Time: 08:57 AM
 */

namespace AppBundle\Controller;

use AppBundle\Form\TipoatributoType;
use BackendBundle\BackendBundle;
use BackendBundle\Entity\ProdDepartamento;
use BackendBundle\Entity\ProdDeptoOrdenAtributo;
use BackendBundle\Entity\ProdDeptoTipoAtributo;
use BackendBundle\Entity\ProdDeptoAtributo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;

class TipoAtributoController extends Controller
{
    private $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    public function indexAction(Request $request){
        //Se obtiene un objeto gestor de entidades de Doctrine, para persistir y recuperar objetos hacia y desde la BD.
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT t FROM BackendBundle:ProdDeptoTipoAtributo t ORDER BY t.id DESC";
        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query,$request->query->getInt('page',1),10);

        $mostrar = array();

        foreach ($pagination as $dato){
            $entero = (int)$dato->getId();

            $dql2 = "SELECT count ( b.idTipo ) as cuenta FROM BackendBundle:ProdDeptoAtributo b WHERE b.idTipo = :idtipo GROUP BY b.idTipo";

            $data = $em->createQuery($dql2)->setParameter('idtipo', $entero);

            $midata = $data->getResult();
            $temp = 0;
            foreach ($midata as $key => $datocuenta){
                $temp = $datocuenta['cuenta'];
            }
            $mostrar[$entero] = $temp;
            //ELIMINAR CODIGO COMENTADO NO SE UTILIZA
            //var_dump($midata);
            //echo $dato[0]->getIdTipo() .'|'.$pda->getIdAtributo().'<br>';
            //var_dump($pda);
            //unset($pda);
        }


        return $this->render('AppBundle:Atributo:list_tipo.html.twig',array(
            'tipos' => $pagination,
            'usos' =>$mostrar
        ));
    }

    public function createAction(Request $request){
        $status = array();
        //Se crea el objeto a utilizar
        $tipoatributo = new ProdDeptoTipoAtributo();
        $myuser = $this->getUser();
        $form = $this->createForm(TipoatributoType::class, $tipoatributo);

        $form->handleRequest($request);

        //Validaciones en la creacion de tipo atributo
        if( $form->isSubmitted() ){
            if( $form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $query = $em->createQuery("SELECT t FROM BackendBundle:ProdDeptoTipoAtributo t WHERE t.nombre = :nombre or t.nombreIng = :nombreIng")
                    ->setParameter('nombre', $form->get('nombre')->getData())
                    ->setParameter('nombreIng', $form->get('nombreIng')->getData());

                $tipo_isset = $query->getResult();
                //Se valida la NO existencia del tipo atributo
                if(count($tipo_isset) == 0){
                //Se asigna el usuario y la fecha de creacion
                $tipoatributo->setCreatedBy($myuser->getIdUser());
                $tipoatributo->setUpdatedBy($myuser->getIdUser());
                $tipoatributo->setCreatedAt(new \DateTime());
                $tipoatributo->setUpdatedAt(new \DateTime());
                //Se guarda el objeto para la inserccion
                $em->persist($tipoatributo);
                //Se solicita la inserccion
                $flush = $em->flush();
                    if ($flush == null) {
                        $status['estado'] = "success";
                        $status['mensaje'] = "Se ha registrado correctamente el tipo de atributo";
                    } else {
                        $status['estado'] = "danger";
                        $status['mensaje'] = "Ha ocurrido un error. No se ha registrado el tipo de atributo";
                    }
                }else{
                    $status['estado'] = "danger";
                    $status['mensaje'] = "El tipo de Atributo ya Existe";
                }
            }else{
                $status['estado'] = "warning";
                $status['mensaje'] = "No se ha actualizado correctamente el tipo de atributo";
            }
            $this->session->getFlashBag()->add($status['estado'], $status['mensaje']);
        }
        //se invoca la plantilla
        return $this->render('AppBundle:Atributo:create_tipo.html.twig',array(
            "form" => $form->createView()
        ));
    }

    public function showAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT t FROM BackendBundle:ProdDepartamento t WHERE t.estado = :estado ORDER BY t.nombre ASC";
        $query = $em->createQuery($dql)->setParameter('estado', 1);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query,$request->query->getInt('page',1),10);

        return $this->render('AppBundle:Atributo:show_tipo.html.twig',array(
            'departamento' => $pagination
        ));
    }

    public function ajaxasociartipoAction(Request $request){

        /* RECUERDE LAS BUENAS PRACTICAS EN LA DEFINICION DE LAS VARIABLES Y ES RECOMENDABLE UTILIZAR NOMBRES
        DESCRIPTIVOS PARA LAS VARIABLES */
        $arrayvista = array();
        switch ($request->get('operacion')){

            CASE 'mostrarTiposAtributosDeptos':
                //ELIMINAR INSTRUCCION COMENTADA
                //var_dump($request->get('departamento'));
                if((int)$request->get('departamento')){
                $em = $this->getDoctrine()->getManager();
                $sql = "SELECT pdta.id,pdta.nombre,pdta.nombre_ing, pdoa.id_departamento, pdoa.orden 
                        FROM prod_depto_tipo_atributo pdta
                        LEFT JOIN prod_depto_orden_atributo pdoa ON (pdoa.id_tipo_atributo = pdta.id AND pdoa.id_departamento = ".(int)$request->get('departamento').")
                        WHERE 1
                        ORDER BY nombre ASC";
                //ELIMINAR INSTRUCCION COMENTADA ES UNA BUENA PRACTICA
                //$query = $em->createQuery($dql)->setParameter('estado', $request->get('departamento'));
                $stmt = $em->getConnection()->prepare($sql);
                $stmt->execute();
                $datosProds = $stmt->fetchAll();

                $arrayvista = array(
                    'contexto' => "mostrarTipos",
                    'prod' => $datosProds
                );
                }else{
                    echo "no llego el departamento";
                }
                break;
            CASE 'mostrarOrdenTiposAtributos':
                if((int)$request->get('departamento')){
                    $em = $this->getDoctrine()->getManager();
                    $sql = "SELECT pdta.id,pdta.nombre,pdta.nombre_ing, pdoa.id_departamento, pdoa.orden 
                        FROM prod_depto_tipo_atributo pdta
                        JOIN prod_depto_orden_atributo pdoa ON (pdoa.id_tipo_atributo = pdta.id)
                        WHERE 1 AND pdoa.id_departamento = ".(int)$request->get('departamento')."
                        ORDER BY pdoa.orden ASC";

                    $stmt = $em->getConnection()->prepare($sql);
                    $stmt->execute();
                    $datosProds = $stmt->fetchAll();

                    $arrayvista = array(
                        'contexto' => "mostrarOrdenTipos",
                        'prod' => $datosProds
                    );
                }else{
                    echo "no llego el departamento";
                }
                break;
            CASE 'setTipoAtributo':
                //RECUERDE LAS BUENAS PRACTICAS EN LA DEFINICION DE LAS VARIABLES
                $iddepartamento = (int)$request->get('departamento');
                $activos = $request->get("tiposactivos");
                $inactivos = $request->get("tiposinactivos");
                $myuser = $this->getUser();

                $cont = 0;
                $orden = explode( ',', $activos );
                dump(count($orden));

                $em = $this->getDoctrine()->getManager();
                $q = $em->createQuery('delete from BackendBundle:ProdDeptoOrdenAtributo m where m.idDepartamento = '.$iddepartamento);
                $numDeleted = $q->execute();
                //ELIMINAR CODIGO COMENTADO ES UNA BUENA PRACTICA
                //echo "Borrados |".$numDeleted."|";
                if($activos != ""){

                foreach ($orden as $ord){
                    //ELIMINAR CODIGO COMENTADO ES UNA BUENA PRACTICA
                    //echo $iddepartamento.",".$ord.",".$cont+=1;
                    //$pdta = new ProdDeptoTipoAtributo($ord);

                    $tipoAt = new ProdDeptoOrdenAtributo();
                    $tipoAt->setIdDepartamento($iddepartamento);
                    $tipoAt->setIdTipoAtributo($ord);
                    $tipoAt->setOrden($cont+=1);
                    /* variables de nuestros usuarios */
                    $tipoAt->setCreatedBy($myuser->getIdUser());
                    $tipoAt->setUpdatedBy($myuser->getIdUser());
                    $tipoAt->setCreatedAt(new \DateTime());
                    $tipoAt->setUpdatedAt(new \DateTime());
                    /* variables de nuestros usuarios */
                    $em->persist($tipoAt);
                }
                $em->flush(); //Persist objects that did not make up an entire batch
                $em->clear();}

                $arrayvista = array(
                    'contexto' => "update",
                    'resultado' => "ok",
                );
                break;

            default:
                echo "error -".$request->get('operacion')."- Esta operacion no esta contemplada";
        }

        return $this->render('AppBundle:Atributo:ajaxAnswer.html.twig',
            $arrayvista
        );
    }

    public function editAction(Request $request){
        $status = array();
        //RECUERDE LAS BUENAS PRACTICAS AL DEFINIR LAS VARIABLES
        $myuser = $this->getUser();

        $tipoatributo = $this->getDoctrine()
            ->getRepository(ProdDeptoTipoAtributo::class)
            ->find($request->get('id'));

        $form = $this->createForm(TipoatributoType::class, $tipoatributo);

        $form->handleRequest($request);

        //Validaciones en la ediccion de tipo atributo
        if( $form->isSubmitted() ){
            if( $form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $query = $em->createQuery("SELECT t FROM BackendBundle:ProdDeptoTipoAtributo t WHERE t.nombre = :nombre or t.nombreIng = :nombreIng")
                    ->setParameter('nombre', $form->get('nombre')->getData())
                    ->setParameter('nombreIng', $form->get('nombreIng')->getData());

                $tipo_isset = $query->getResult();

                //Se asigna usuario y fecha de actualizacion
                $tipoatributo->setUpdatedBy($myuser->getIdUser());
                $tipoatributo->setUpdatedAt(new \DateTime());
                //Se guarda el objeto para la actualizacion
                $em->persist($tipoatributo);
                //Se solicita la actualizacion
                $flush = $em->flush();
                if ($flush == null) {
                    $status['estado'] = "success";
                    $status['mensaje'] = "Se ha registrado correctamente el tipo de atributo";
                } else {
                    $status['estado'] = "danger";
                    $status['mensaje'] = "Ha ocurrido un error. No se ha registrado el tipo de atributo";
                }

            }else{
                $status['estado'] = "warning";
                $status['mensaje'] = "No se ha actualizado correctamente el tipo de atributo";
            }
            $this->session->getFlashBag()->add($status['estado'], $status['mensaje']);
        }
        //Se invoca la plantilla
        return $this->render('AppBundle:Atributo:edit_tipo.html.twig',array(
            "form" => $form->createView()
        ));
    }
    public function deleteAction(Request $request){
        //ELIMINAR CODIGO QUE ESTA COMO COMENTARIO ES UNA BUENA PRACTICA
        /*return $this->render('AppBundle:Atributo:list_tipo.html.twig',array(

        ));*/
        echo "Eliminar";
        var_dump($request);
        die();
    }
    public function beforedeleteAction(Request $request){
        //ELIMINAR CODIGO QUE ESTA COMO COMENTARIO ES UNA BUENA PRACTICA
        /*return $this->render('AppBundle:Atributo:list_tipo.html.twig',array(

        ));*/
        echo "Before Eliminar";
        var_dump($request);
        die();
    }
}