<?php

namespace AppBundle\Controller;

use AppBundle\Form\UseBenefitType;
use BackendBundle\Entity\UseBenefit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Usebenefit controller.
 *
 */
class UseBenefitController extends Controller
{
    /**
     * Lists all useBenefit entities.
     *
     */

    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $dql = 'SELECT u.idUseBenefit,u.quantity,u.unitMeasure,u.startDate,u.endDate,u.createdAt,
                e.empfullname,b.nombre namebenefit
                FROM BackendBundle:UseBenefit u
                INNER JOIN BackendBundle:Employees e WITH (u.idEmployee = e.idEmployee)
                INNER JOIN BackendBundle:Benefits b  WITH (u.idBeneficio = b.idBeneficio)';
        $query = $em->createQuery($dql);
        $useBenefits = $query->getResult();

        $useBenefit = new UseBenefit();
        $form = $this->createForm('AppBundle\Form\UseBenefitType', $useBenefit);

        return $this->render('@App/TimeClock/usobeneficio/index.html.twig', array(
            'useBenefits' => $useBenefits,
            'form' => $form->createView(),
            'user' => $this->getUser()->getIdUser(),
        ));
    }

    /**
     * Creates a new useBenefit entity.
     *
     */

    public function newAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $idEmployee = $request->get('idEmployee');
            $idBeneficio = $request->get('idBeneficio');
            $quantity = $request->get('quantity');
            $unitMeasure = $request->get('unitMeasure');
            $startDate = $request->get('startDate');
            $endDate = $request->get('endDate');
            $createdAt = $request->get('createdAt');

            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);

            $useBenefit = new Usebenefit();
            $useBenefit->setIdEmployee($idEmployee);
            $useBenefit->setIdBeneficio($idBeneficio);
            $useBenefit->setQuantity($quantity);
            $useBenefit->setUnitMeasure($unitMeasure);
            $useBenefit->setStartDate(new \DateTime(''));
            $useBenefit->setEndDate(new \DateTime(''));
            $useBenefit->setCreatedAt($createdAt);

            $em = $this->getDoctrine()->getManager();
            $em->persist($useBenefit);
            $em->flush();

            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'idEmployee' => $serializer->serialize($idEmployee, 'json'),
                'idBeneficio' => $serializer->serialize($idBeneficio, 'json'),
                'quantity' => $serializer->serialize($quantity, 'json'),
                'unitMeasure' => $serializer->serialize($unitMeasure, 'json'),
                'startDate' => $serializer->serialize($startDate, 'json'),
                'endDate' => $serializer->serialize($endDate, 'json'),
                'createdAt' => $serializer->serialize($createdAt, 'json'),
            ));

            return $response;
        }
    }

    /**
     * Finds and displays a useBenefit entity.
     *
     */
    public function showAction(UseBenefit $useBenefit)
    {
        $deleteForm = $this->createDeleteForm($useBenefit);

        return $this->render('@App/TimeClock/usobeneficio/show.html.twig', array(
            'useBenefit' => $useBenefit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing useBenefit entity.
     *
     */
    public function editAction(Request $request, UseBenefit $useBenefit)
    {
        $deleteForm = $this->createDeleteForm($useBenefit);
        $editForm = $this->createForm('AppBundle\Form\UseBenefitType', $useBenefit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('usebenefit_edit', array('idUseBenefit' => $useBenefit->getIdusebenefit()));
        }

        return $this->render('usebenefit/edit.html.twig', array(
            'useBenefit' => $useBenefit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a useBenefit entity.
     *
     */
    public function deleteAction(Request $request, UseBenefit $useBenefit)
    {
        $form = $this->createDeleteForm($useBenefit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($useBenefit);
            $em->flush();
        }

        return $this->redirectToRoute('usebenefit_index');
    }

    /**
     * Creates a form to delete a useBenefit entity.
     *
     * @param UseBenefit $useBenefit The useBenefit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(UseBenefit $useBenefit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('timeclock_usebenefit_delete', array('idUseBenefit' => $useBenefit->getIdusebenefit())))
            ->setMethod('DELETE')
            ->getForm();
    }

    public function ajaxBenefitAction()
    {
        return new Response('55');
    }
}
