<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\CliSaldoAFavor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class saldoController extends Controller
{
    public function indexAction(Request $request)
    {
        $calcularMonto = $this->CalcularMonto();
        return $this->render('@App/saldo/saldo_list.html.twig', ['calcularMonto'=>$calcularMonto]);
    }

    public function createAction(Request $request)
    {
        $id_cliente = $request->get('id_cliente');
        $motivo = $request->get('motivo');
        $monto = $request->get('valor');
        $id_user = $this->getUser()->getIdUser();

        try {
            $datatime = new \DateTime();
        } catch (\Exception $e) {
        }

        $cli_saldo = new CliSaldoAFavor();
        $cli_saldo->setIdCliente($id_cliente);
        $cli_saldo->setMotivo($motivo);
        $cli_saldo->setMonto($monto);
        $cli_saldo->setCreatedBy($id_user);
        $cli_saldo->setUpdatedBy($id_user);
        $cli_saldo->setCreatedAt($datatime);
        $cli_saldo->setUpdatedAt($datatime);

        $em = $this->getDoctrine()->getManager();
        $em->persist($cli_saldo);
        $em->flush();

        return new Response('El saldo ha sido guardado.');
    }

    public function showAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $customer = $request->query->get('cliente');

            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);

            $em = $this->getDoctrine()->getManager()->getRepository('BackendBundle:Cliente');
            $cliente = $em->createQueryBuilder('c')
                ->where('c.idCliente = :id_cliente')
                ->setParameter('id_cliente',$customer)
                ->getQuery()->getResult();

            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'cliente' => $serializer->serialize($cliente, 'json')
            ));

            return $response;
        }
    }

    public function CalcularMonto()
    {
        $valor = 500;
        $monto = [
            [
                'valor'=>100
            ],
            [
                'valor'=>100
            ],
            [
                'valor'=>200
            ],
        ];

        $acumulador = 0;
        foreach ($monto as $mon)
        {
            $acumulador += $mon['valor'];
        }

        if ($acumulador > $valor)
        {
            echo "Te pasas del monto asignado";
        }else
            {
                if ($acumulador < 0)
                {
                    echo "el valor no puede ser negativo";
                }
                else
                {
                    echo $total = $valor - $acumulador ;
                }
            }
    }

}
