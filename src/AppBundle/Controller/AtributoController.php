<?php
/**
 * Created by PhpStorm.
 * User: @jdperea59
 * PC: gerencia-ti
 * Date: 5/04/18
 * Time: 08:57 AM
 */

namespace AppBundle\Controller;

use AppBundle\Form\AtributoType;
use BackendBundle\Entity\ProdDeptoAtributo;
use BackendBundle\Entity\ProdDeptoAtributoLog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AtributoController extends Controller
{
    private $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    public function indexAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        //ES RECOMENDABLE UTILIZAR LAS BUENAS PRACTICAS EN LA DEFINICION DE LAS VARIABLES
        $selectipo=0;
        $selectdepto=0;
        $buscador='';
        $validacion = 0;

        if($request->get('tipo') and $request->get('tipo') != ''){
            $selectipo = $request->get('tipo');
            $validacion = 1;
        }
        if($request->get('departamento') and $request->get('departamento') != ''){
            $selectdepto = $request->get('departamento');
            $validacion = 1;
        }
        if($request->get('buscador') and $request->get('buscador') != ''){
            $buscador = $request->get('buscador');
            $validacion = 1;
        }
        $quer = "1 = 1";
        //ES CONVENIENTE QUE EL NOMBRE DE LAS VARIABLES SEAN MAS DESCRIPTIVOS
        // Variables temporales para saber si vamos a ordenar o a mostrar los atributos normales
        $dato = 0;
        $datoB = 0;
        $datoD = 0;
        $datoT = 0;

        if($validacion == 1){
            if($request->get('buscador') != ''){
                $quer .= " AND a.nombre LIKE '%".(string)$request->get('buscador')."%'";
                $datoB = 1;
            }
            if($request->get('departamento') != ''){
                $quer .= " AND d.idDepartamento = ".(int)$request->get('departamento');
                $datoD = 1;
            }
            if($request->get('tipo') != ''){
                $quer .= " AND t.id = ".(int)$request->get('tipo');
                $datoT = 1;
            }
        }
        //se valida que el buscador este vacio, y que el dato de tipos y departamento tengan un valor seleccionado, de esa manera se carga en la vista para ordenar
        if($datoB == 0 and $datoD == 1 and $datoT == 1){
            $dato = 1;
        }

        $dql = "SELECT a.idAtributo,a.nombre as atrib_nombre, t.id as idTipo,t.nombre as nombre_tipo,d.idDepartamento,d.nombre as depto_nombre FROM BackendBundle:ProdDeptoAtributo a
                JOIN BackendBundle:ProdDeptoTipoAtributo t WITH (a.idTipo = t.id)
                JOIN BackendBundle:ProdDepartamento d WITH  (a.idDepartamento = d.idDepartamento)
                WHERE ".$quer." 
                ORDER BY d.nombre ASC, t.nombre ASC,a.ordenTipo ASC,a.nombre";
        $query = $em->createQuery($dql);
        //ES CONVENIENTE ELIMINAR LA INSTRUCCION QUE ESTA COMO COMENTARIO
        //dump($query);
        $limite = 10; // Para la cantidad de registros a mostrar en el paginador
        if($dato ==1 ){
            $limite = 100;// se setea este valor... pensando en que no van a llegar hasta allá... pero aqui toodo puede suceder
        }

        //ES RECOMENDABLE UTILIZAR NOMBRES MAS DESCRIPTIVOS PARA LAS VARIABLES, ELLO FACILITARIA CON MAYOR RAPIDEZ LA COMPRENSION DEL CODIGO

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query,$request->query->getInt('page',1),$limite);

        $sql = "SELECT d.id_departamento,d.nombre FROM prod_departamento d WHERE 1 ORDER BY d.nombre ASC";

        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $departamentos = $stmt->fetchAll();

        $sql = "SELECT t.id,t.nombre FROM prod_depto_tipo_atributo t WHERE 1 ORDER BY t.nombre ASC";

        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $tipos = $stmt->fetchAll();

        //ES CONVENIENTE ELIMINAR LAS INSTRUCCIONES QUE SE ENCUENTRAN COMO COMENTARIOS
        /*$query = $em->createQuery("SELECT d FROM BackendBundle:ProdDepartamento d ORDER BY d.nombre ASC");

        $departamentos = $query->getResult();*/

        //Se invoca la plantilla
        return $this->render('AppBundle:Atributo:atributo_list.html.twig',array(
            'atributos' => $pagination,
            'departamentos' => $departamentos,
            'tipos' => $tipos,
            'selectipo' => $selectipo,
            'selectdepto'=> $selectdepto,
            'buscador'=>$buscador,
            'zdep' => $dato,
        ));
    }

    public function createAction(Request $request){

        $status = array();
        $departamento = array();
        //Se crea el objeto para que reciba los datos o cargue el formulario en blanco
        $atributo = new ProdDeptoAtributo();
        //Variables necesarias para la inserccion
        $myuser = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        // Se solicitan los departamentos para pasarlos a la vista y mostrarlos en un select
        $query = $em->createQuery("SELECT t FROM BackendBundle:ProdDepartamento t");
        $departamento = $query->getResult();
        //Se carga el formulario y se validan datos
        $form = $this->createForm(AtributoType::class, $atributo);

        $form->handleRequest($request);

        if( $form->isSubmitted() ){
            if( $form->isValid()){
                //EL COMENTARIO DE ABAJO NO PARECE NECESARIO
                //Si el formulario es Valido
                if($form->get('idTipo')->getData() == 0){
                    $status['estado'] = "danger";
                    $status['mensaje'] = "Este departamento no tiene tipos de atributos asociados. Primero asocie un tipo de atributo y despues intente nuevamente crear los atributos.";
                }else{
                    //EL COMENTARIO DE ABAJO NO PARECE NECESARIO Y SERIA RECOMENDABLE SER MAS DESCRIPTIVO EN LA DEFINICION DE LAS VARIABLES
                    //Este if permite validar que ya no exista el atributo
                    $cuenta = $this->validateExist((string)$form->get('nombre')->getData(),(string)$form->get('nombreIng')->getData(),(int)$form->get('idTipo')->getData(),(int)$form->get('idDepartamento')->getData(),$em);
                    if($cuenta > 0){
                        $status['estado'] = "danger";
                        $status['mensaje'] = "El atributo ya existe.";
                    }else{
                        // si vienen vacios seteamos unas comillas vacias
                        if(is_null($form->get('keywordsEsp')->getData())){
                            $atributo->setKeywordsEsp('');
                        }
                        if(is_null($form->get('keywordsIng')->getData())){
                            $atributo->setKeywordsIng('');
                        }

                        $atributo->setLinkFotoDescripcion('');
                        /* variables de nuestros usuarios */
                        $atributo->setCreatedBy($myuser->getIdUser());
                        $atributo->setUpdatedBy($myuser->getIdUser());
                        $atributo->setCreatedAt(new \DateTime());
                        $atributo->setUpdatedAt(new \DateTime());
                        /* variables de nuestros usuarios */
                        $em->persist($atributo);
                        $flush = $em->flush();
                        if ($flush == null) {
                            $status['estado'] = "success";
                            $status['mensaje'] = "Se ha registrado correctamente el tipo de atributo";
                        } else {
                            $status['estado'] = "danger";
                            $status['mensaje'] = "Ha ocurrido un error. No se ha registrado el tipo de atributo";
                        }
                    }
                }
                $this->session->getFlashBag()->add($status['estado'], $status['mensaje']);
            }
        }


        return $this->render('AppBundle:Atributo:atributo_create.html.twig',array(
            "form" => $form->createView(),
            "departamento" => $departamento
        ));
    }

    public function showAction(Request $request){
        // todo futuro
        //EL COMENTARIO DE ABAJO DEBERIA ESTAR ANTES DE LA DEFINICION DE ESTE METODO, SER MAS CONCISO.
        // para ordenar los atributos por tipo, esto es para que salgan en el orden que ellos prefieran
        return $this->render('AppBundle:Atributo:atributo_show.html.twig',array(
        ));
    }
    public function editAction(Request $request){
        // todo @wilianlk
        //ES RECOMENDABLE UTILIZAR UN NOMBRE MAS DESCRIPTIVO PARA LAS VARIABLES
        $atributo = $this->getDoctrine()
            ->getRepository('BackendBundle:ProdDeptoAtributo')
            ->find($request->get('id'));

        $query = $this->getDoctrine()->getRepository('BackendBundle:ProdDepartamento');
        $departamento = $query->findAll();

        $form = $this->createForm(AtributoType::class,$atributo);
        $form->handleRequest($request);

        if (!$atributo)
        {
            return $this->redirectToRoute('atributos_list');
        }

        if ($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
            $this->session->getFlashBag()->add('success', 'Se ha actualizado correctamente el atributo');
        }

        return $this->render('AppBundle:Atributo:atributo_edit.html.twig',['form'=>$form->createView(),'departamento'=>$departamento]);
    }
    public function deleteAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $atributo = $em
            ->getRepository(ProdDeptoAtributo::class)
            ->find($request->get('id'));

        $form = $this->createForm(AtributoType::class,$atributo);
        $form->handleRequest($request);

        $atributos = new ProdDeptoAtributoLog();

        if ($form)
        {
            $data = $atributos;

            if ($data == null)
            {

                return $this->redirectToRoute('atributos_list');
            }else{
                $date = date('Y-m-d');

                $data->setIdAtributo($atributo->getIdAtributo());
                $data->setIdDepartamento($atributo->getIdDepartamento());
                $data->setNombre($atributo->getNombre());
                $data->setNombreIng($atributo->getNombreIng());
                $data->setDescripcion($atributo->getDescripcion());
                $data->setDescripcionIng($atributo->getDescripcionIng());
                $data->setIdTipo($atributo->getIdTipo());
                $data->setLinkFotoDescripcion($atributo->getLinkFotoDescripcion());
                $data->setKeywordsEsp($atributo->getKeywordsEsp());
                $data->setKeywordsIng($atributo->getKeywordsIng());
                $data->setCreatedBy($atributo->getCreatedBy());
                $data->setUpdatedBy($atributo->getUpdatedBy());
                $data->setCreatedAt(\DateTime::createFromFormat('Y-m-d',$date));
                $data->setUpdatedAt(\DateTime::createFromFormat('Y-m-d',$date));
                $data->setOrdenTipo($atributo->getOrdenTipo());
                $em->persist($data);
                $em->flush();

                if ($atributo != null){
                    $em->remove($atributo);
                    $em->flush();
                }

                $response = new StreamedResponse();
                $response->setCallback(function () {
                    echo '<script>alert("Loading")</script>';
                    flush();
                    ob_flush();
                    for ($i=0; $i < 10; $i++) {
                        usleep(200000);
                        echo '.';
                        flush();
                        ob_flush();
                    }
                    echo '<script>alert("completado")</script>';
                    flush();
                    ob_flush();
                });

                return $response;
            }
        }

        //ES CONVENIENTE ELIMINAR LAS INSTRUCCIONES QUE ESTAN COMENTADAS
//        return new  Response('');

//        $dql = "SELECT count (a.idAtributo) as asociados,a.idAtributo
//                FROM BackendBundle:ProdDeptoAtributo a
//                INNER JOIN BackendBundle:ProdDeptoTipoAtributo t WITH (a.idTipo = t.id)
//                INNER JOIN BackendBundle:ProdDepartamento d WITH (a.idDepartamento = d.idDepartamento)
//                GROUP BY a.idTipo";
//        $query = $em->createQuery($dql);
//        $data = $query->getResult();
//        dump($data);
//        $atributos2 = 'SELECT p FROM BackendBundle:ProdDeptoAtributo p
//                       WHERE p.idAtributo = '.$id.' ';
//        $query = $em->createQuery($atributos2);
//        $data = $query->iterate();

        return $this->redirectToRoute('atributos_list');

    }
    public function ajaxAction(Request $request){
        $arrayvista = array();
        $em = $this->getDoctrine()->getManager();
        switch ($request->get('operacion')){
            //RECUERDE DAR SANGRIA AL CODIGO PARA MAYOR COMPRESION
            CASE 'mostrarTiposAtributosDeptos':
                $depto = (int)$request->get('departamento');
                if((int)$depto){
                $dql = "SELECT t FROM BackendBundle:ProdDeptoTipoAtributo t
                JOIN BackendBundle:ProdDeptoOrdenAtributo oa WITH  (t.id = oa.idTipoAtributo)
                WHERE oa.idDepartamento = ".$depto."
                ORDER BY oa.orden ASC";
                //RECOMENDABLE ELIMINAR LAS INSTRUCCION COMENTADA
                /*
                 * SELECT * FROM  prod_depto_tipo_atributo p1_ INNER JOIN prod_depto_orden_atributo p2_ ON ((p1_.id = p2_.id_tipo_atributo)) WHERE p2_.id_departamento = 7 ORDER BY  p2_.orden ASC;
                 */
                $query = $em->createQuery($dql);
                $tipos = $query->getResult();

                $arrayvista = array(
                    'contexto' => "mostrarTipos",
                    'resultado' => "ok",
                    'tiposAt' => $tipos,
                );
                }else{
                    //EL COMENTARIO DE ABAJO NO PARECE NECESARIO
                    // Si el departamento no es numerico entonces retornamos el mensaje a la vista para validarlo.
                    echo "error";
                    die;
                }
                break;
            CASE 'mostrarOrdenTiposAtributos':
                $arrayvista = array(
                    'contexto' => "update",
                    'resultado' => "ok",
                );
                break;
            CASE 'modificarOrdenAtributos':
                $odenat = $request->get('orden');
                $iddept = $request->get('iddept');
                $cont = 0;
                $orden = explode( ',', $request->get('orden') );

                //Se carga en un array
                $idatt = array();
                // se crea otro array y se recorre validando que sean solo enteros evitando asi inyeccion de codigo
                foreach ($orden as $val){
                    $idatt[] = (int)$val;
                }
                // se setean en la propia consulta, esto debido a que el bindValue no permite agregar los valores separados por ","
                $sql = "UPDATE prod_depto_atributo SET orden_tipo=NULL WHERE id_atributo IN (".implode(",",$idatt).") AND id_departamento = :id_departamento";

                $stmt = $em->getConnection()->prepare($sql);
                $stmt->bindValue('id_departamento', (int)$iddept);
                if($stmt->execute()){
                    foreach ($idatt as $ord){
                        $cont+=1;
                        //echo "cont ".$cont."|".$ord."<br>";
                        //echo "UPDATE prod_depto_atributo SET orden_tipo=".$cont." WHERE id_atributo = ".$ord." AND id_departamento = ".$iddept.";<br>";
                        $sql = "UPDATE prod_depto_atributo SET orden_tipo=:orden WHERE id_atributo = :idatt AND id_departamento = :id_departamento";
                        $stmt = $em->getConnection()->prepare($sql);
                        $stmt->bindValue('id_departamento', (int)$iddept);
                        $stmt->bindValue('idatt', $ord);
                        $stmt->bindValue('orden', $cont);
                        $stmt->execute();
                    }

                    $arrayvista = array(
                        'contexto' => "update",
                        'resultado' => "ok",
                    );
                }else{


                    $arrayvista = array(
                        'contexto' => "update",
                        'resultado' => "error",
                    );
                }



                break;
            default:
                echo "error -".$request->get('operacion')."- Esta operacion no esta contemplada";
                $arrayvista = array(
                    'contexto' => "ninguno",
                );
        }
        return $this->render('AppBundle:Atributo:ajax.html.twig',
            $arrayvista
        );
    }

    protected function validateExist($nombre, $nombreIng, $idTipo, $idDep, $em){

        $query = $em->createQuery("SELECT count ( t.idTipo ) as cuenta FROM BackendBundle:ProdDeptoAtributo t WHERE ((t.nombre = :nombre or t.nombreIng = :nombreIng)
                                   AND t.idTipo = :idTipo AND t.idDepartamento = :idDepartamento )")
            ->setParameter('nombre', $nombre)
            ->setParameter('nombreIng', $nombreIng)
            ->setParameter('idTipo', $idTipo)
            ->setParameter('idDepartamento', $idDep);

        $tipo_isset = $query->getResult();

        return $tipo_isset[0]['cuenta'];
    }
}