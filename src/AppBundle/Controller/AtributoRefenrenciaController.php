<?php
/**
 * Created by PhpStorm.
 * User: @jdperea59
 * PC: gerencia-ti
 * Date: 5/04/18
 * Time: 08:57 AM
 */

namespace AppBundle\Controller;

use BackendBundle\Entity\ProdDepartamento;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class AtributoRefenrenciaController extends Controller
{
    private $session;

    public function __construct()
    {
        $this->session = new Session();
    }
    public function indexAction(Request $request){
        //Se obtiene un objeto gestor de entidades de Doctrine, para persistir y recuperar objetos hacia y desde la BD.
        $em = $this->getDoctrine()->getManager();
        //Se solicitan los departamentos con estado activo ordenados ascendentemente
        $query = $em->createQuery("SELECT t FROM BackendBundle:ProdDepartamento t WHERE t.estado = 1 ORDER BY t.nombre ASC");
        $departamento = $query->getResult();
        $idDepSub = 1;
        $refSub = "";
        //Se valida que el id de departamento no este vacio
        if($request->get('idDepartamento') != "")
        {
            $idDepSub = $request->get('idDepartamento');
        }
        //Se valida que el nombre de la referencia no este vacia
        if($request->get('nombreRef') != "")
        {
            $refSub = $request->get('nombreRef');
        }

        $arrayRefs = array();

        if($refSub != "" AND $idDepSub != ""){
            $dql = "SELECT r.idProductoReferencia,r.referencia,r.descripcion,d.idDepartamento,d.nombre as deptonombre 
                FROM BackendBundle:ProdReferencia r
                JOIN BackendBundle:ProdDepartamento d WITH  (r.idDepartamento = d.idDepartamento)
                WHERE d.idDepartamento = :idDepartamento AND r.referencia LIKE :referencia";

            $query = $em->createQuery($dql)
                ->setParameter('idDepartamento', $idDepSub)
                ->setParameter('referencia', "%".$refSub."%");

        } elseif ($refSub == "" AND $idDepSub != ""){
            $dql = "SELECT r.idProductoReferencia,r.referencia,r.descripcion,d.idDepartamento,d.nombre as deptonombre 
                FROM BackendBundle:ProdReferencia r
                JOIN BackendBundle:ProdDepartamento d WITH  (r.idDepartamento = d.idDepartamento)
                WHERE d.idDepartamento = :idDepartamento";
            $query = $em->createQuery($dql)
                ->setParameter('idDepartamento', $idDepSub);
        } elseif ($refSub != "" AND $idDepSub == ""){
            $dql = "SELECT r.idProductoReferencia,r.referencia,r.descripcion,d.idDepartamento,d.nombre as deptonombre 
                FROM BackendBundle:ProdReferencia r
                JOIN BackendBundle:ProdDepartamento d WITH  (r.idDepartamento = d.idDepartamento)
                WHERE r.referencia LIKE :referencia";

            $query = $em->createQuery($dql)
                ->setParameter('referencia', "%".$refSub."%");
        } else {
            $dql = "SELECT r.idProductoReferencia,r.referencia,r.descripcion,d.idDepartamento,d.nombre as deptonombre 
                FROM BackendBundle:ProdReferencia r
                JOIN BackendBundle:ProdDepartamento d WITH  (r.idDepartamento = d.idDepartamento)
                WHERE d.idDepartamento = :idDepartamento";

            $query = $em->createQuery($dql)
                ->setParameter('idDepartamento', 0);
        }

        $paginator = $this->get('knp_paginator');
        $arrayRefs = $paginator->paginate($query,$request->query->getInt('page',1),10);

        return $this->render('AppBundle:AtributoReferencia:list.html.twig',array(
            'departamento' => $departamento,
            'deptoSub' => $idDepSub,
            'refSub' => $refSub,
            'referencias' => $arrayRefs,
        ));
    }

    public function editAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $idRef = (int)$request->get('id');
        $datosMostrar = [];

        $query = $em->createQuery("SELECT r FROM BackendBundle:ProdReferencia r WHERE r.idProductoReferencia = :idReferencia")
                                ->setParameter('idReferencia', $idRef);
        $datos = $query->getResult();

        $referencia = $datos[0];

        $depto = $referencia->getIdDepartamento();
        $departa = $depto->getIdDepartamento();
        //ES BUENA PRACTICA ELIMINAR LAS INSTRUCCIONES QUE SE ENCUENTRAN COMO COMENTARIOS
        /*
         * SELECT * FROM  prod_depto_tipo_atributo p1_ INNER JOIN prod_depto_orden_atributo p2_ ON ((p1_.id = p2_.id_tipo_atributo)) WHERE p2_.id_departamento = 7 ORDER BY  p2_.orden ASC;
         */
        $dql = "SELECT t , oa.orden FROM BackendBundle:ProdDeptoTipoAtributo t
                JOIN BackendBundle:ProdDeptoOrdenAtributo oa WITH  (t.id = oa.idTipoAtributo)
                WHERE oa.idDepartamento = :idDepartamento
                ORDER BY oa.orden ASC";

        $query = $em->createQuery($dql)->setParameter('idDepartamento', $departa);
        $tipos = $query->getResult();
        //ES BUENA PRACTICA ELIMINAR LAS INSTRUCCIONES QUE SE ENCUENTRAN COMO COMENTARIOS
        /*
         * SELECT a.id_atributo,pa.nombre,oa.id_tipo_atributo, oa.id_departamento FROM prod_atributo a
         * JOIN prod_depto_atributo pa ON (a.id_atributo = pa.id_atributo)
         * LEFT JOIN prod_depto_orden_atributo oa ON (pa.id_tipo = oa.id_tipo_atributo AND pa.id_departamento = oa.id_departamento AND pa.id_departamento = 5)
         * WHERE (a.id_producto_referencia = 11426) AND oa.id_tipo_atributo IS NULL;
         */
        $sql = "SELECT a.id_atributo,pa.nombre,oa.id_tipo_atributo, oa.id_departamento, t.nombre as nombreattipo FROM prod_atributo a 
                JOIN prod_depto_atributo pa ON (a.id_atributo = pa.id_atributo)
                LEFT JOIN prod_depto_orden_atributo oa ON (pa.id_tipo = oa.id_tipo_atributo AND pa.id_departamento = oa.id_departamento AND pa.id_departamento = :iddep)
                LEFT JOIN prod_depto_tipo_atributo t ON (pa.id_tipo = t.id)
                WHERE (a.id_producto_referencia = :idref) AND oa.id_tipo_atributo IS NULL;";
        //SE RECOMIENDA SER MAS DESCRIPTIVO CON EL NOMBRE DE LAS VARIABLES
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->bindValue('idref', (int)$idRef);
        $stmt->bindValue('iddep', (int)$departa);
        $stmt->execute();
        $atributosHuerfanos = $stmt->fetchAll();
        $atHuerfanos = array();
        $idsAtr = "";
        if(!empty($atributosHuerfanos)){
            $idsAtr = ",";
            foreach ($atributosHuerfanos as $huer){
                $arrTemp = array();
                $urlAt = $this->generateUrl('atributos_view',array('id' => $huer['id_atributo']));
                $arrTemp['id_atributo'] = $huer['id_atributo'];
                $arrTemp['nombre'] = $huer['nombre'];
                $arrTemp['nombreattipo'] = $huer['nombreattipo'];
                $arrTemp['url'] = $urlAt;
                $idsAtr .= ",".$huer['id_atributo'];
                //ES BUENA PRACTICA ELIMINAR LAS INSTRUCCIONES QUE SE ENCUENTRAN COMO COMENTARIOS
                /*
                dump($huer['nombreattipo']);
                dump($huer['nombre']);
                dump($huer['id_atributo']);
                dump($urlAt);
                */

                $atHuerfanos[] = $arrTemp;
            }
            $idsAtr = str_replace(",,", "", $idsAtr);
            $status['estado'] = "danger";
            $status['mensaje'] = "Hay atributos asociados a esta referencia de los que su tipo no esta asociado al departamento.";

            $this->session->getFlashBag()->add($status['estado'], $status['mensaje']);
            //ELIMINAR INSTRUCCION COMENTADA
            //dump($atHuerfanos);
        }
        //ELIMINAR INSTRUCCION COMENTADA
        /*
         * SELECT * FROM prod_depto_atributo a
         * WHERE a.id_tipo = 5 AND a.id_departamento = 11
         * ORDER BY a.orden_tipo ASC, a.nombre ASC
         */

        // se traen los atributos asociados a la referencia para poder mostralos como seleccionados en la interfaz
        $sql = "SELECT a.id_atributo FROM prod_atributo a 
                WHERE (a.id_producto_referencia = :idref)";

        $stmt = $em->getConnection()->prepare($sql);
        $stmt->bindValue('idref', (int)$idRef);
        $stmt->execute();
        $datosProds = $stmt->fetchAll();
        //ELIMINAR INSTRUCCION COMENTADA
        //dump($datosProds);
        $idChecked = array();
        foreach ($datosProds as $checked){
            //dump($checked['id_atributo']);// se pasan los valores en un arreglo de datos ordenados
            array_push($idChecked,$checked['id_atributo']);
        }
        //ELIMINAR INSTRUCCION COMENTADA
        /*
         * SELECT * FROM prod_atributo
         * WHERE id_producto_referencia = 2877
         */

        foreach ($tipos as $tip){
            //SE RECOMIENDA SER MAS DESCRIPTIVO EN LA DEFINICION DE VARIABLES
            $atr = $tip[0];
            $idTip = $atr->getId();
            $dql = "SELECT a FROM BackendBundle:ProdDeptoAtributo a
                    WHERE a.idDepartamento = :idDepartamento AND a.idTipo = :idTipo
                    ORDER BY a.ordenTipo ASC, a.nombre ASC";
            $query = $em->createQuery($dql)
                        ->setParameter('idDepartamento', $departa)
                        ->setParameter('idTipo', $idTip);
            $atributos = $query->getResult();
            //ELIMINAR INSTRUCCION COMENTADA ES UNA BUENA PRACTICA
            //dump($atributos);
            $datosMostrar[$idTip] =$atributos;
        }

        return $this->render('AppBundle:AtributoReferencia:edit.html.twig',array(
            'tipos' => $tipos,
            'atributos' => $datosMostrar,
            'referencia' => $referencia,
            'atributosproducto' => $idChecked,
            'huerfanos' => $atHuerfanos,
            'idshuerfanos' => $idsAtr
        ));
    }
    // obtener Descripciones
    protected function getDescription($id_ref)
    {
        $sql = 'SELECT z.id_producto_referencia,z.orden,z.nombre_tipo,z.nombre 
                  FROM Z_prod_atributo_descripcion z  
                  WHERE z.id_producto_referencia = "' . $id_ref . '"';

        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function ajaxAction(Request $request){
        //ELIMINAR LAS INSTRUCCIONES COMENTADAS ES UNA BUENA PRACTICA Y SE RECOMIENDA SER MAS DESCRIPTIVOS CON EL NOMBRE DE LAS VARIABLES
        /*return $this->render('AppBundle:Atributo:list_tipo.html.twig',array(

        ));*/
        //echo "Ajax";

        $operacion = $request->get('operacion');
        $em = $this->getDoctrine()->getManager();
        if($operacion == 'a'){
            $idRef = $request->get('id_referencia');
            $desc = $this->getDescription($idRef);
            $idAtt = $request->get('idAtt');
            $myuser = $this->getUser();
            //ELIMINAR INSTRUCCIONES COMENTADAS ES UNA BUENA PRACTICA
            // INSERT INTO `atributos`.`prod_atributo` (`id_atributo`, `id_producto_referencia`, `created_by`, `updated_by`, `created_at`, `updated_at`)
            // VALUES ('674', '11426', '1', '1', '2018-06-13 17:46:55', '2018-06-13 17:46:59');
            $sql = "INSERT INTO prod_atributo (id_atributo, id_producto_referencia, created_by, updated_by, created_at, updated_at) 
                    VALUES (:idatt, :idref, :useri, :user, :creado, :modificado)";

            $stmt = $em->getConnection()->prepare($sql);
            $stmt->bindValue('idref', (int)$idRef);
            $stmt->bindValue('idatt', (int)$idAtt);
            $stmt->bindValue('useri', (int)$myuser->getIdUser());
            $stmt->bindValue('user', (int)$myuser->getIdUser());
            $stmt->bindValue('creado', date("Y-m-d H:i:s"));
            $stmt->bindValue('modificado', date("Y-m-d H:i:s"));

            //dump($desc);
            //todo actualizar descripcion de la referencia

            if($stmt->execute()){
                //Le decimos a la vista que las cosas han ido bien
                echo "ok";
            }else{
                echo "no";
            }

        }elseif ($operacion == 'b'){
            $idRef = $request->get('id_referencia');
            $desc = $this->getDescription($idRef);
            $idAtt = $request->get('idAtt');
            //se borran los atributos
            $sql = "DELETE FROM prod_atributo WHERE id_producto_referencia = :idref AND id_atributo = :idatt";

            $stmt = $em->getConnection()->prepare($sql);
            $stmt->bindValue('idref', (int)$idRef);
            $stmt->bindValue('idatt', (int)$idAtt);
            dump($desc);
            //todo actualizar descripcion de la referencia
            if($stmt->execute()){
                //Le decimos a la vista que las cosas han ido bien
                echo "ok";
            }else{
                echo "no";
            }

        }elseif ($operacion == 'borrarHuerfanos'){
            //SI SE FUESE MAS DESCRIPTIVOS CON EL NOMBRE DE LAS VARIABLES NO HABRIA NECESIDAD DE TANTOS COMENTARIOS
            $idRef = $request->get('id_referencia');
            $idatrt = $request->get('idshuerfanos');
            // Se reciben como una cadena delimitada por ","
            $idAtt = explode(",", $idatrt);
            //Se carga en un array
            $idatt = array();
            // se crea otro array y se recorre validando que sean solo enteros evitando asi inyeccion de codigo
            foreach ($idAtt as $val){
                $idatt[] = (int)$val;
            }
            // se setean en la propia consulta, esto debido a que el bindValue no permite agregar los valores separados por ","
            $sql = "DELETE FROM prod_atributo WHERE id_producto_referencia = :idref AND id_atributo IN (".implode(",",$idatt).")";

            $stmt = $em->getConnection()->prepare($sql);
            $stmt->bindValue('idref', (int)$idRef);
            //ELIMINAR INSTRUCCION COMENTADA ES BUENA PRACTICA
            //$stmt->bindValue('idatt', $idatt);

            if($stmt->execute()){
                //si se ejecuta bien le decimos a la vista que borre la tabla que mostraba los errores
                echo "ok";
            }else{
                echo "no";
            }
        }else{
            $status['estado'] = "danger";
            $status['mensaje'] = "Error no se ha recibido el parametro de la operación.";

            $this->session->getFlashBag()->add($status['estado'], $status['mensaje']);
            die();
        }
        //ELIMINAR INSTRUCCION COMENTADA
        //var_dump($request);
        die();
    }
    public function createAction(Request $request){
        return $this->render('AppBundle:AtributoReferencia:create.html.twig',array(

        ));
    }
    public function showAction(Request $request){
        return $this->render('AppBundle:AtributoReferencia:show.html.twig',array(

        ));
    }
}