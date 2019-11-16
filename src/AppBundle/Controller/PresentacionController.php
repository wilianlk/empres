<?php
/**
 * Created by PhpStorm.
 * User: @jdperea59 && wilianlk
 * PC: gerencia-ti
 * Date: 5/04/18
 * Time: 08:57 AM
 */

namespace AppBundle\Controller;

use AppBundle\Form\PresentacionType;
use BackendBundle\Entity\ColeccionDetalle;
use BackendBundle\Entity\Presentacion;
use BackendBundle\Entity\PresentacionDetalle;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\Shape\Drawing;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpPresentation\Style\Color;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class PresentacionController extends Controller
{
    private $session;
    private $objPHPPresentation;
    private $writers;
    private $colorBlack;
    private $colorGreen;
    private $Size;
    private $sizebreak;


    public function __construct()
    {
        $this->session = new Session();
    }

    public function indexAction(Request $request)
    {
        //SEA MAS DESCRIPTIVO CON EL NOMBRE DE LAS VARIABLES
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT p FROM BackendBundle:Presentacion p ORDER BY p.idPresentacion DESC";

        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $request->query->getInt('page', 1), 10);

        return $this->render('AppBundle:Presentacion:presentacion_list.html.twig', array(
            'presentaciones' => $pagination,
        ));
    }

    public function createAction(Request $request)
    {
        $status = array();
        $presentacion = new Presentacion();
        //RECUERDE LAS BUENAS PRACTICAS EN LA DEFINICION DE VARIABLES
        $myuser = $this->getUser();
        $form = $this->createForm(PresentacionType::class, $presentacion);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $query = $em->createQuery("SELECT u FROM BackendBundle:Presentacion u WHERE u.nombrePresentacion = :nombre")
                    ->setParameter('nombre', $form->get('nombre_presentacion')->getData());

                $presen = $query->getResult();
                if (count($presen) == 0) {
                    //ELIMINAR INSTRUCCIONES COMENTADAS ES UNA BUENA PRACTICA
                    //$presentacion
                    //$presentacion->setDescripcionPresentacion()
                    $presentacion->setCreatedBy($myuser->getIdUser());
                    $presentacion->setUpdatedBy($myuser->getIdUser());
                    $presentacion->setCreatedAt(new \DateTime());
                    $presentacion->setUpdateAt(new \DateTime());

                    $em->persist($presentacion);
                    $flush = $em->flush();
                    if ($flush == null) {
                        $status = "Se ha registrado correctamente la presentación";
                        $this->session->getFlashBag()->add("status", $status);
                        return $this->redirect("../presentacioneslist");
                    } else {
                        $status['estado'] = "danger";
                        $status['mensaje'] = "Ha ocurrido un error. No se ha registrado correctamente la presentación";
                        dump($form->getData());
                    }
                }
            }
        }
        if (count($status) > 0) {
            $this->session->getFlashBag()->add("status", $status);
        }

        return $this->render('AppBundle:Presentacion:presentacion_create.html.twig', array(
            "form" => $form->createView()
        ));
    }

    public function sizepositions($pp)
    {
        $position =
            [
                ['size' => 18, 'sizebreak' => 15], ['size' => 16, 'sizebreak' => 4],
                ['size' => 15],
                ['sizebreak' => 10], ['sizebreak' => 5], ['sizebreak' => 8],
                ['sizebreak' => 11]
            ];

        switch ($pp['nom_depa']) {
            case "BLUSAS SEXY":
                $this->Size = $position[0]['size'];
                $this->sizebreak = $position[0]['sizebreak'];
                break;
            case "JEANS LEVANTACOLA":
                $this->Size = $position[1]['size'];
                $this->sizebreak = $position[1]['sizebreak'];
                break;
            case "CALZADO":
                $this->Size = $position[1]['size'];
                $this->sizebreak = $position[3]['sizebreak'];
                break;
            case "LEGGINGS & JEGGINGS":
                $this->Size = $position[1]['size'];
                $this->sizebreak = $position[4]['sizebreak'];
                break;
            case "BODY BLUSA":
                $this->Size = $position[1]['size'];
                $this->sizebreak = $position[5]['sizebreak'];
                break;
            case "CAPRIS LEVANTACOLA":
                $this->Size = $position[2]['size'];
                $this->sizebreak = $position[3]['sizebreak'];
                break;
            default:
                $this->Size = $position[1]['size'];
                $this->sizebreak = $position[6]['sizebreak'];
        }
        return array($this->Size,$this->sizebreak);
    }

    public function showAction(Request $request)
    {
        $this->DownloadPorwerPointAction();

        $objPHPPresentation = $this->objPHPPresentation;

        $objPHPPresentation->removeSlideByIndex(0);

        $presentacion = $this->getDoctrine()
            ->getRepository(Presentacion::class)
            ->findOneBy(['idPresentacion' => $request->get('id')]);

        $detallepress = $this->getDoctrine()
            ->getRepository(PresentacionDetalle::class)
            ->findBy(['idPresentacion' => $request->get('id')], array('orden' => 'ASC'));
        $arrayProductos = array();
        $idsRef = "";

        foreach ($detallepress as $obj) {
            switch (1) {
                case is_null($obj->getIdColeccion()) :
                    // logica para referencias
                    $idsRef .= $obj->getIdReferencia() . ",";
                    $arrayProductos[$obj->getOrden()]['r'][$obj->getIdReferencia()] = $this->processDescription($obj->getIdReferencia());
                    $arrayCantidadesProductos[$obj->getOrden()] = 1;
                    break;
                case is_null($obj->getIdReferencia()) :
                    // logica para colecciones
                    $temp = array();
                    $detalleColeccion = $this->getDoctrine()
                        ->getRepository(ColeccionDetalle::class)
                        ->findBy(['idColeccion' => $obj->getIdColeccion()]);
                    //ELIMINAR INSTRUCCION COMENTADA ES UNA BUENA PRACTICA
                    //dump($detalleColeccion);
                    foreach ($detalleColeccion as $colecd) {
                        $temp[(int)$colecd->getIdProductoReferencia()] = array($this->processDescription((int)$colecd->getIdProductoReferencia()),);
                        $idsRef .= $colecd->getIdProductoReferencia() . ",";
                    }
                    $arrayProductos[$obj->getOrden()]['c'][$obj->getIdColeccion()] = $temp;
                    break;
                default:
            }
        }
        $idsRef .= ",";
        $idsRef = str_replace(',,', '', $idsRef);
        if($idsRef != '' AND $idsRef != ','){
        $datosproductos = $this->getProducts($idsRef);
        }else{
            $datosproductos = array();
        }

//        if ($request->request->get('generar') == 'generate') {
//            foreach ($datosproductos as $producto) {
//
//                $descript = $this->getDescription($producto['id_producto_referencia']);
//                $this->sizepositions($producto);
//
//                if ($producto['imagen1'] != null) {
//                    if ($producto['imagen1'][0] != "/") {
//                        $url = 'https://www.colmodausa.com/KRO/web/uploads/productos/' . $producto['imagen1'];
//                    } else {
//                        $url = 'https://www.colmodausa.com' . $producto['imagen1'];
//                    }
//                } else {
//                    $url = 'https://www.colmodausa.com/KRO/web/uploads/productos/notfound.jpg';
//                }
//
//                $currentSlide = $objPHPPresentation->createSlide();
//
//                if ($url != null) {
//                    $shape = new Drawing\Base64();
//                    $image_url = $url;
//                    $image2 = file_get_contents($image_url);
//                    $imageData = "data:image/jpeg;base64," . base64_encode($image2);
//                    //RECUERDE LAS BUENAS PRACTICAS EN LA DEFINICION DE LAS VARIABLES
//                    $detallesimagen2 = getimagesize($image_url);
//
//                    $ancho2 = $detallesimagen2[0];
//                    $alto2 = $detallesimagen2[1];
//                    $ratio = $ancho2 / $alto2;
//                    $alto = 720;
//                    $width = (int)round($ratio * $alto);
//
//                    $shape->setName('PHPPresentation logo')
//                        ->setDescription('PHPPresentation logo')
//                        ->setData($imageData, true)
//                        ->setResizeProportional(false)
//                        ->setHeight($alto)
//                        ->setWidth($width)
//                        ->setOffsetX(0)
//                        ->setOffsetY(0);
//                    $currentSlide->addShape($shape);
//                }
//
//                $posicionY = 0;
//                $shape = $currentSlide->createRichTextShape()
//                    ->setHeight(720)
//                    ->setWidth(246)
//                    ->setOffsetX(743)
//                    ->setOffsetY($posicionY += 0);
//                $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
//
//                $textRun = $shape->createTextRun($producto['nom_depa']);
//                $textRun->getFont()->setBold(false)
//                    ->setSize($this->Size)
//                    ->setColor($this->colorBlack);
//
//                foreach ($descript as $description) {
//
//                    $shape->createBreak();
//
//                    $textRun = $shape->createTextRun(" ");
//                    $textRun->getFont()->setBold(false)
//                        ->setSize($this->Size);
//                    $shape->createBreak();
//
//                    switch ($description['nombre_tipo']) {
//                        case 'BOLSILLO':
//                            $nombretipo = '';
//                            break;
//                        case 'MANGAS':
//                            $nombretipo = '';
//                            break;
//                        case 'INCLUYE ACCESORIO':
//                            $nombretipo = '';
//                            break;
//                        default:
//                            $nombretipo = $description['nombre_tipo'] . ' ';
//                    }
//
//                    $textRun = $shape->createTextRun($nombretipo);
//                    $textRun->getFont()->setBold(false)
//                        ->setSize($this->Size)
//                        ->setColor($this->colorBlack);
//
//                    switch ($description['nombre']) {
//                        case 'Pesada de Alta Elongacion, Piel de Durazno':
//                            $textRun = $shape->createTextRun(strtoupper($description['nombre']));
//                            $textRun->getFont()->setBold(true)
//                                ->setSize($this->Size)
//                                ->setColor($this->colorGreen);
//                            break;
//                        case 'Sintetico, Suela Antideslizante':
//                            $textRun = $shape->createTextRun(strtoupper($description['nombre']));
//                            $textRun->getFont()->setBold(true)
//                                ->setSize($this->Size)
//                                ->setColor($this->colorGreen);
//                            break;
//                        case 'SIN AJUSTES':
//                            break;
//                        default:
//                            $textRun = $shape->createTextRun(strtoupper($description['nombre']));
//                            $textRun->getFont()->setBold(true)
//                                ->setSize($this->Size)
//                                ->setColor($this->colorBlack);
//                    }
//                }
//
//                $shape->createBreak();
//
//                $textRun = $shape->createTextRun(" ");
//                $textRun->getFont()->setBold(false)
//                    ->setSize($this->sizebreak);
//                $shape->createBreak();
//
//                $textRun = $shape->createTextRun('COLOR');
//                $textRun->getFont()->setBold(false)
//                    ->setSize($this->Size)
//                    ->setColor($this->colorBlack);
//
//                $shape->createBreak();
//
//                $textRun = $shape->createTextRun(strtoupper($producto['color']));
//                $textRun->getFont()->setBold(true)
//                    ->setSize($this->Size)
//                    ->setColor($this->colorBlack);
//
//                $shape->createBreak();
//
//                $textRun = $shape->createTextRun(" ");
//                $textRun->getFont()->setBold(false)
//                    ->setSize($this->sizebreak);
//                $shape->createBreak();
//
//                $textRun = $shape->createTextRun('TALLA');
//                $textRun->getFont()->setBold(true)
//                    ->setSize($this->Size)
//                    ->setColor($this->colorBlack);
//                $shape->createBreak();
//
//                $textRun = $shape->createTextRun(strtoupper($producto['talla_min'] . ' A ' . $producto['talla_max']));
//                $textRun->getFont()->setBold(true)
//                    ->setSize($this->Size)
//                    ->setColor($this->colorBlack);
//
//                $shape->createBreak();
//
//                $textRun = $shape->createTextRun(" ");
//                $textRun->getFont()->setBold(false)
//                    ->setSize($this->sizebreak);
//                $shape->createBreak();
//
//                $textRun = $shape->createTextRun('PRECIO');
//                $textRun->getFont()->setBold(false)
//                    ->setSize($this->Size)
//                    ->setColor($this->colorBlack);
//
//                $textRun = $shape->createTextRun(" " . strtoupper($producto['precio']));
//                $textRun->getFont()->setBold(true)
//                    ->setSize($this->Size)
//                    ->setColor($this->colorBlack);
//
//                // se crea slide 2
//                $currentSlide = $objPHPPresentation->createSlide();
//
//                if ($producto['imagen2'] != null) {
//                    if ($producto['imagen2'][0] != "/") {
//                        $url = 'https://www.colmodausa.com/KRO/web/uploads/productos/' . $producto['imagen2'];
//                    } else {
//                        $url = 'https://www.colmodausa.com' . $producto['imagen2'];
//                    }
//                } else {
//                    $url = 'https://www.colmodausa.com/KRO/web/uploads/productos/notfound.jpg';
//                }
//                //se agrega imagen 2
//                if ($url != null) {
//                    $shape = new Drawing\Base64();
//                    $image_url = $url;
//                    $imageData = "data:image/jpeg;base64," . base64_encode(file_get_contents($image_url));
//                    $image2 = getimagesize($image_url);
//
//                    $ancho = $image2[0];
//                    $alto = $image2[1];
//
//                    $max = max($alto, $ancho);
//                    $min = min($alto, $ancho);
//
//                    $calculo = $min / $max;
//                    $ratio = $ancho / $alto;
//
//                    if ($calculo < 0.9) {
//                        $alto = 720;
//                        $width = (int)round($ratio * $alto);
//                        $shape->setName('PHPPresentation logo')
//                            ->setDescription('PHPPresentation logo')
//                            ->setData($imageData, true)
//                            ->setResizeProportional(false)
//                            ->setHeight($alto)
//                            ->setWidth($width)
//                            ->setOffsetY(0)
//                            ->setOffsetX(0);
//                        $currentSlide->addShape($shape);
//                    } else {
//                        $alto = 520;
//                        $width = (int)round($ratio * $alto);
//                        $shape->setName('PHPPresentation logo')
//                            ->setDescription('PHPPresentation logo')
//                            ->setData($imageData, true)
//                            ->setResizeProportional(false)
//                            ->setHeight($alto)
//                            ->setWidth($width)
//                            ->setOffsetY(69)
//                            ->setOffsetX(0);
//                        $currentSlide->addShape($shape);
//                    }
//                }
//
//                if ($producto['nom_depa'] == 'CALZADO') {
//                    if ($producto['imagen4'] != null) {
//                        if ($producto['imagen4'][0] != "/") {
//                            $url = 'https://www.colmodausa.com/KRO/web/uploads/productos/' . $producto['imagen4'];
//                        } else {
//                            $url = 'https://www.colmodausa.com' . $producto['imagen4'];
//                        }
//                    } else {
//                        $url = 'https://www.colmodausa.com/KRO/web/uploads/productos/notfound.jpg';
//                    }
//                } else if ($producto['imagen3'] != null) {
//                    if ($producto['imagen3'][0] != "/") {
//                        $url = 'https://www.colmodausa.com/KRO/web/uploads/productos/' . $producto['imagen3'];
//                    } else {
//                        $url = 'https://www.colmodausa.com' . $producto['imagen3'];
//                    }
//                } else {
//                    $url = 'https://www.colmodausa.com/KRO/web/uploads/productos/notfound.jpg';
//                }
//
//                // se crea imagen 3 al ppt
//                if ($url != null) {
//                    $shape = new Drawing\Base64();
//                    $image_url = $url;
//                    $imageData = "data:image/jpeg;base64," . base64_encode(file_get_contents($image_url));
//                    $image3 = getimagesize($image_url);
//
//                    $ancho = $image3[0];
//                    $alto = $image3[1];
//
//                    $max = max($alto, $ancho);
//                    $min = min($alto, $ancho);
//
//                    $calculo = $min / $max;
//                    $ratio = $ancho / $alto;
//
//                    if ($calculo < 0.9) {
//                        $alto = 720;
//                        $width = (int)round($ratio * $alto);
//                        $shape->setName('PHPPresentation logo')
//                            ->setDescription('PHPPresentation logo')
//                            ->setData($imageData, true)
//                            ->setResizeProportional(false)
//                            ->setHeight($alto)
//                            ->setWidth($width)
//                            ->setOffsetX(481)
//                            ->setOffsetY(0);
//                        $currentSlide->addShape($shape);
//                    } else {
//                        $alto = 520;
//                        $shape->setName('PHPPresentation logo')
//                            ->setDescription('PHPPresentation logo')
//                            ->setData($imageData, true)
//                            ->setResizeProportional(false)
//                            ->setHeight($alto)
//                            ->setWidth(411)
//                            ->setOffsetX(481)
//                            ->setOffsetY(0);
//                        $currentSlide->addShape($shape);
//                    }
//                }
//            }
//            echo $this->write($objPHPPresentation, basename(__FILE__, '.php'), $this->writers, $this->container->getParameter('file_directory'));
//        }

        $path = $this->container->getParameter('file_directory');
        if (file_exists($path)) {
            $result = 'true';
        } else {
            $result = 'false';
        }

        return $this->render('AppBundle:Presentacion:presentacion_show.html.twig', array(
            'presentacion' => $presentacion,
            'detallepress' => $detallepress,
            'productos' => $datosproductos,
            'colecciones' => $arrayProductos,
            'id' => $request->get('id'),
            'files' => $result,
        ));
    }

    public function DownloadPorwerPointAction()
    {
        $this->objPHPPresentation = new PhpPresentation();

        $this->objPHPPresentation->getDocumentProperties()->setCreator('PHPOffice')
            ->setLastModifiedBy('PHPPresentation Team')
            ->setTitle('Sample 01 Title')
            ->setSubject('Sample 01 Subject')
            ->setDescription('Sample 01 Description')
            ->setKeywords('office 2007 openxml libreoffice odt php')
            ->setCategory('Sample Category');

        $this->writers = array('PowerPoint2007' => 'pptx', 'ODPresentation' => 'odp');

        $this->colorBlack = new Color('FF000000');
        $this->colorGreen = new Color(Color::COLOR_GREEN);
    }

    protected function processDescription($id_ref)
    {
        $cont = 0;
        $desc = "";
        $descripcion = array();
        $resultado2 = $this->getDescription($id_ref);

        foreach ($resultado2 as $description) {
            $nombre = '';
            $nombretipo = '';

            switch ($description['nombre_tipo']) {
                case 'BOLSILLO':
                    $nombretipo = '';
                    break;
                case 'MANGAS':
                    $nombretipo = '';
                    break;
                case 'INCLUYE ACCESORIO':
                    $nombretipo = '';
                    break;
                default:
                    $nombretipo = $description['nombre_tipo'] . ' ';
            }
            // para usar el nombre tipo
            $descripcion[$cont . '-' . $id_ref]['nombretipo'] = $nombretipo;

            switch ($description['nombre']) {
                case 'Pesada de Alta Elongacion, Piel de Durazno':
                    $nombre = strtoupper($description['nombre']);
                    break;
                case 'SIN AJUSTES':
                    $nombre = "Sin Ajustes";
                    break;
                default:
                    $nombre = strtoupper($description['nombre']);
            }
            $descripcion[$cont . '-' . $id_ref]['nombre'] = $nombre;

            $desc .= ($nombretipo == '') ? $nombre . '<br>' : $nombretipo . ' ' . $nombre . '<br>';
            $cont += 1;
        }
        //ELIMINAR INSTRUCCION COMENTADA ES UNA BUENA PRACTICA
        //return $descripcion;
        return $desc;
    }

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

    protected function getProducts($idsRef)
    {
       /* $sql = "SELECT info_producto.id_producto_referencia,info_producto.referencia,info_producto.color, ptd.talla_ing talla_min, ptd2.talla_ing talla_max, info_producto.precio,info_producto.nom_depa,colecc.id_coleccion,colecc.numero_coleccion,info_producto.imagen1,info_producto.imagen2,info_producto.imagen3,info_producto.imagen4 from (
            SELECT pr.id_producto_referencia, pr.referencia,pc.nombre color,ptd.id_departamento
             ,min(ptd2.orden) as min_orden_talla, max(ptd.orden) as max_orden_talla , p.precio_detal as precio,pd.nombre as nom_depa,pr.imagen1,pr.imagen2,pr.imagen3,pr.imagen4, ifnull(co.posicion,0 ) as posicion
            FROM tienda_inventario_log til
            LEFT JOIN tienda_inventario ti on (til.id_tienda = ti.id_tienda and ti.id_producto = til.id_producto )
            JOIN producto p on (if( ti.inventario_stock >= 0 or ti.id_producto is null, til.id_producto ,0)  = p.id_producto)
            JOIN prod_referencia pr on (p.id_producto_referencia = pr.id_producto_referencia)
            JOIN prod_talla_departamento ptd on (ptd.id_departamento = pr.id_departamento and ptd.id_talla = p.id_talla)
            JOIN prod_talla_departamento ptd2 on (ptd2.id_departamento = pr.id_departamento and ptd2.id_talla = p.id_talla)
                JOIN prod_departamento pd on pd.id_departamento = pr.id_departamento
                LEFT JOIN coleccion_orden co ON (pd.id_departamento = co.id_departamento)
            JOIN prod_color pc on (p.id_color = pc.id_color)
            WHERE til.id_tienda = 1
            GROUP BY pr.id_producto_referencia
            ) info_producto 
            JOIN coleccion_detalle cod on (cod.id_producto_referencia = info_producto.id_producto_referencia AND cod.id_producto_referencia IN (\" . $idsRef . \"))
            JOIN coleccion colecc ON (cod.id_coleccion = colecc.id_coleccion)
            LEFT JOIN prod_talla_departamento ptd on (info_producto.id_departamento = ptd.id_departamento and info_producto.min_orden_talla = ptd.orden and  ptd.orden <> 0)
            LEFT JOIN prod_talla_departamento ptd2 on (info_producto.id_departamento = ptd2.id_departamento and info_producto.max_orden_talla = ptd2.orden and  ptd2.orden <> 0)
            ORDER BY info_producto.posicion ASC, cod.id_coleccion_detalle ASC 
            ";*/
       $sql="SELECT info_producto.id_producto_referencia,info_producto.referencia,info_producto.color, ptd.talla_ing talla_min, ptd2.talla_ing talla_max, 
            info_producto.precio,info_producto.nom_depa,colecc.id_coleccion,colecc.numero_coleccion,info_producto.imagen1,info_producto.imagen2,
            info_producto.imagen3,info_producto.imagen4 from (SELECT pr.id_producto_referencia, pr.referencia,pc.nombre color,ptd.id_departamento ,
            min(ptd2.orden) as min_orden_talla, max(ptd.orden) as max_orden_talla , p.precio_detal as precio,pd.nombre as nom_depa,pr.imagen1,pr.imagen2,
            pr.imagen3,pr.imagen4, ifnull(co.posicion,0 ) as posicion FROM tienda_inventario_log til LEFT JOIN tienda_inventario ti on 
            (til.id_tienda = ti.id_tienda and ti.id_producto = til.id_producto ) JOIN producto p on (if( ti.inventario_stock >= 0 or ti.id_producto is null,
             til.id_producto ,0) = p.id_producto) JOIN prod_referencia pr on (p.id_producto_referencia = pr.id_producto_referencia) JOIN prod_talla_departamento ptd on 
             (ptd.id_departamento = pr.id_departamento and ptd.id_talla = p.id_talla) JOIN prod_talla_departamento ptd2 on (ptd2.id_departamento = pr.id_departamento and 
             ptd2.id_talla = p.id_talla) JOIN prod_departamento pd on pd.id_departamento = pr.id_departamento LEFT JOIN coleccion_orden co ON (pd.id_departamento = co.id_departamento) 
             JOIN prod_color pc on (p.id_color = pc.id_color) WHERE til.id_tienda = 1 GROUP BY pr.id_producto_referencia) info_producto
            Left JOIN coleccion_detalle cod on (cod.id_producto_referencia = info_producto.id_producto_referencia AND cod.id_producto_referencia IN (\" . $idsRef . \")) 
            Left JOIN coleccion colecc ON (cod.id_coleccion = colecc.id_coleccion) LEFT JOIN prod_talla_departamento ptd on (info_producto.id_departamento = ptd.id_departamento 
            and info_producto.min_orden_talla = ptd.orden and ptd.orden <> 0) LEFT JOIN prod_talla_departamento ptd2 on (info_producto.id_departamento = ptd2.id_departamento and 
            info_producto.max_orden_talla = ptd2.orden and ptd2.orden <> 0) ORDER BY info_producto.posicion ASC, cod.id_coleccion_detalle ASC";

        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $datosProds = $stmt->fetchAll();
        $datos = array();
        foreach ($datosProds as $prods) {
            $datos[$prods['id_producto_referencia']] = $prods;
        }
        return $datos;
    }

    function write($phpPresentation, $filename, $writers, $path)
    {
        define('CLI', (PHP_SAPI == 'cli') ? true : false);
        define('EOL', CLI ? PHP_EOL : '<br />');
        define('SCRIPT_FILENAME', basename($_SERVER['SCRIPT_FILENAME'], '.php'));
        define('IS_INDEX', SCRIPT_FILENAME == 'index');

        $result = '';

        // Write documents
        foreach ($writers as $writer => $extension) {
            $result .= '';
            if (!is_null($extension)) {
                $xmlWriter = IOFactory::createWriter($phpPresentation, $writer);
                $xmlWriter->save($path . "/{$filename}.{$extension}");
                rename($path . "/{$filename}.{$extension}", $path . "/Coleccciones.{$extension}");
            } else {
                $result .= ' ... NOT DONE!';
            }
            $result .= EOL;
        }

        return $result;
    }

    public function downloadSlideAction()
    {
        $pdf_name = $this->container->getParameter('file_directory') . '/Coleccciones.odp';
        if (file_exists($pdf_name)) {
            header('Content-type: application/odp', true, 200);
            header("Content-Disposition: attachment; filename=Coleccciones.odp");
            header('Cache-Control: public');
            readfile($pdf_name);
            exit();
        }
    }

    public function editAction(Request $request)
    {
        $presentacion = $this->getDoctrine()
            ->getRepository(Presentacion::class)
            ->find($request->get('id'));

        $form = $this->createForm(PresentacionType::class, $presentacion);

        $form->handleRequest($request);

        return $this->render('AppBundle:Presentacion:presentacion_edit.html.twig', array(
            "form" => $form->createView()
        ));
    }

    public function deleteAction(Request $request)
    {
        //ELIMINAR INSTRUCCION COMENTADA ES BUENA PRACTICA
        /*return $this->render('AppBundle:Atributo:list_tipo.html.twig',array(
        ));*/
        echo "Eliminar";
        var_dump($request);
        die();
    }

    public function presentacionTestAction(Request $request)
    {
        //SE RECOMIENDA SER MAS DESCRIPTIVOS CON EL NOMBRE DE LAS VARIABLES
        $nombrepres = $request->get('nombre');

        $em = $this->getDoctrine()->getManager();
        $user_repo = $em->getRepository("BackendBundle:Presentacion");

        $user_isset = $user_repo->findOneBy(array("nombrePresentacion" => $nombrepres));
        if (count($user_isset) >= 1 && is_object($user_isset)) {
            $result = "used";
        } else {
            $result = "unused";
        }
        return new Response($result);
    }
    // Esta funcion se usará para gestionar las peticiones ajax
    public function ajaxAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        // Esta variable nos va a servir para validar las diferentes operaciones que se pueden hacer 
        $operacion = $request->get('operacion');
        // cargamos el usuario en contexto
        $myuser = $this->getUser();
        //Si es para agregar una referencia o una coleccion a la presentacion
        if($operacion == 'add'){
            $nombre = $request->get('nombre');
            $tipo = $request->get('tipo');
            $presentacion = (int)$request->get('presentacion');
            // se debe validar que el tipo este en 'c' o en 'r' sino debe ser un error en la peticion
            if($tipo == 'c' || $tipo == 'r'){
                //se debe tener relacion en los cambios que se hagan en una de estas funciones para evitar bugs en como procesa JS los resultados
                if($tipo == 'c'){
                    //se consulta las colecciones que en el inicio coincidan con el nombre ingresado
                    $query = $em->createQuery("SELECT c FROM BackendBundle:Coleccion c LEFT JOIN BackendBundle:PresentacionDetalle pd WITH (pd.idPresentacion = :presentacion AND c.idColeccion = pd.idColeccion) WHERE c.numeroColeccion LIKE :nombre AND pd.idPresentacionDetalle IS NULL  ORDER BY c.fechaLanzamiento DESC")
                        ->setParameter('nombre', $nombre.'%')
                        ->setParameter('presentacion', $presentacion);
                    $coleccioneslike = $query->getResult();
                    //la respuesta se da como json para compatibilidad con jquery
                    header('Content-type: application/json');
                    //se pinta el corchete para mostrarle a javascript que es un arreglo de JSON
                    echo "[";
                    foreach ($coleccioneslike as $objetoColeccion){
                        //despues de la primera iteraccion va a ser verdad, es para concatenar los resultados
                        if ($objetoColeccion !== reset($coleccioneslike)){
                            echo ",";
                        }
                        //Este valor es la cantidad de letras de la descripcion que vamos a mostrar en la vista
                        $lengthdesc = 15;
                        $desc = substr($objetoColeccion->getDescripcion(), 0, $lengthdesc);
                        // Si el largo del texto supera el largo de la variable $lengthdesc se concatenan los '...' sino se deja la cadena como esta
                        $desc = (strlen($desc)>$lengthdesc-1)?$desc.'...':$desc;
                        // el LABEL es lo que se va a mostrar al momento de buscar, El VALUE es el valor que va a quedar en el campo de texto, El ID es el valor que se va a guardar en el campo hidden
                        //pues si en la cadena dejamos el id el usuario se va a confundir, y el value se puede repetir asi que no es un dato unico en la base de datos
                        echo '{"label":"'.$objetoColeccion->getNumeroColeccion().'-'.$desc.'","value":"'.$objetoColeccion->getNumeroColeccion().'","id":"'.$objetoColeccion->getIdColeccion().'"}';
                    }
                    //se cierra el corchete para finalizar el arreglo de JSON
                    echo "]";
                }else{
                    //se consulta las referencias que en el inicio coincidan con el nombre ingresado
                    $query = $em->createQuery("SELECT r FROM BackendBundle:ProdReferencia r LEFT JOIN BackendBundle:PresentacionDetalle pd WITH (pd.idPresentacion = :presentacion AND r.idProductoReferencia = pd.idReferencia) WHERE r.referencia LIKE :nombre AND pd.idPresentacionDetalle IS NULL")
                        ->setParameter('nombre', $nombre.'%')
                        ->setParameter('presentacion', $presentacion);
                    $referencialike = $query->getResult();
                    //la respuesta se da como JSON para compatibilidad con jquery
                    header('Content-type: application/json');
                    //se pinta el corchete para mostrarle a javascript que es un arreglo de JSON
                    echo "[";
                    foreach ($referencialike as $objetoReferencia){
                        //despues de la primera iteraccion va a ser verdad, es para concatenar los resultados
                        if ($objetoReferencia !== reset($referencialike)){
                            echo ",";
                        }
                        echo '{"label":"'.$objetoReferencia->getReferencia().'","value":"'.$objetoReferencia->getReferencia().'","id":"'.$objetoReferencia->getIdProductoReferencia().'"}';
                    }
                    echo "]";
                }
            }else{
                //Aqui cargar un notice con el error
            }
        } elseif ($operacion == 'order'){
            $odenat = $request->get('orden');
            $presentacion = $request->get('presentacion');
            $orden = explode( ',', $odenat );
            $cont = 0;
            //var_dump($orden);
            //echo $orden;

            $sql = "UPDATE presentacion_detalle SET orden=NULL WHERE id_presentacion = :presentacion";
            $stmt = $em->getConnection()->prepare($sql);
            $stmt->bindValue('presentacion', (int)$presentacion);
            $stmt->execute();

            foreach ($orden as $ord){
                $cont+=1;
                $sql = "UPDATE presentacion_detalle SET orden=:orden,updated_by = :iduser, update_at = :actualizado  WHERE id_presentacion = :presentacion AND id_presentacion_detalle = :id_detalle";
                $stmt = $em->getConnection()->prepare($sql);
                $stmt->bindValue('presentacion', (int)$presentacion);
                $stmt->bindValue('id_detalle', $ord);
                $stmt->bindValue('orden', $cont);
                $stmt->bindValue('iduser', $myuser->getIdUser());
                $stmt->bindValue('actualizado', date("Y-m-d H:i:s"));
                $stmt->execute();
                //echo $ord."-".$cont."|".(int)$presentacion."<br>";
            }
            echo (string)$odenat;
        } elseif ($operacion == 'addobj'){
            $idbuscado = $request->get('idbuscado');
            $presentacion = $request->get('presentacion');
            $tipo = $request->get('tipo');
            //se valida si es coleccion o referencia
            if($tipo == 'c' || $tipo == 'r'){
                $pd = new PresentacionDetalle();
                if($tipo == 'c'){
                    $pd->setIdReferencia(null);
                    $pd->setIdColeccion($idbuscado);
                }else{
                    $pd->setIdReferencia($idbuscado);
                    $pd->setIdColeccion(null);
                }
                $pd->setOrden(null);
                $pd->setIdPresentacion($presentacion);
                $pd->setCreatedBy($myuser->getIdUser());
                $pd->setUpdatedBy($myuser->getIdUser());
                $pd->setCreatedAt(new \DateTime());
                $pd->setUpdateAt(new \DateTime());

                $em->persist($pd);
                $flush = $em->flush();
                if ($flush == null) {
                    echo 'ok';
                }else{
                    echo 'error';
                }

            }else{
                echo 'error';
            }

            //echo $idbuscado."-".$presentacion."|".$tipo;
        } elseif ($operacion == 'deleteobj'){
            /*
             * Este metodo es para borrar referencias o Colecciones de una presentacion
             * Recibe el tipo (para saber si es una referencia o una coleccion), el id de la presentacion
             */
            $idbuscado = $request->get('iddetalle');
            $presentacion = $request->get('presentacion');
            $tipo = $request->get('tipo');
            //se valida si es coleccion o referencia
            if($tipo == 'c' || $tipo == 'r'){
                //$pd = new PresentacionDetalle();
                if($tipo == 'c'){
                    $PressDetalle = $em->getRepository('BackendBundle:PresentacionDetalle')->findOneBy(array('idColeccion' => $idbuscado, 'idPresentacion' => $presentacion,));
                }else{
                    $PressDetalle = $em->getRepository('BackendBundle:PresentacionDetalle')->findOneBy(array('idReferencia' => $idbuscado, 'idPresentacion' => $presentacion,));
                }
                $em->remove($PressDetalle);

                $flush = $em->flush();
                if ($flush == null) {
                    echo 'ok';
                }else{
                    echo 'error';
                }

            }else{
                echo 'error';
            }

            //echo $idbuscado."-".$presentacion."|".$tipo;
        }


        return new Response("");
    }
}