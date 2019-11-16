<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\ContractHistory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class ContractHistoryController extends Controller
{

    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $contractHistories = $em->getRepository('BackendBundle:ContractHistory')->findAll();

        $contractHistory = new Contracthistory();
        $form = $this->createForm('AppBundle\Form\ContractHistoryType', $contractHistory);

        return $this->render('@App/TimeClock/historialContracto/index.html.twig', array(
            'contractHistories' => $contractHistories,'form'=>$form->createView(),
        ));
    }

    public function newAction(Request $request)
    {
        $id_employee = $request->get('id_employee');
        $startDate = $request->get('startDate');
        $endDate = $request->get('endDate');
        $typecontract = $request->get('typecontract');

        $contractHistory = new Contracthistory();
        $contractHistory->setIdEmployee($id_employee);
        try {
            $contractHistory->setStartDate(new \DateTime($startDate));
            $contractHistory->setEndDate(new \DateTime($endDate));
        } catch (\Exception $e) {
        }
        $contractHistory->setIdTypeContract($typecontract);

        $em = $this->getDoctrine()->getManager();
        $em->persist($contractHistory);
        $em->flush();

        return new Response('');
    }

    public function showAction(ContractHistory $contractHistory)
    {
        $deleteForm = $this->createDeleteForm($contractHistory);

        return $this->render('@App/TimeClock/historialContracto/show.html.twig', array(
            'contractHistory' => $contractHistory,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function showIdClienteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest())
        {
            $searh = $request->query->get('search');

            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());

            $serializer = new Serializer($normalizers, $encoders);

            $employee = "SELECT e.idEmployee,e.empfullname,e.office,h.startDate,h.endDate,t.contractName 
                     FROM BackendBundle:Employees e 
                     JOIN BackendBundle:ContractHistory h WITH (e.idEmployee = h.idEmployee)
                     JOIN BackendBundle:ContractTypes   t WITH (h.idTypeContract = t.idTypeContract)
                     WHERE e.empfullname 
                     LIKE :fname 
                     OR e.idEmployee 
                     LIKE :id_employee";

            $query = $em->createQuery($employee);
            $query->setParameter('fname', '%'.$searh.'%');
            $query->setParameter('id_employee', $searh);
            $employees = $query->getResult();

            $response = new JsonResponse();
            $response->setData(array(
                'response' => 'success',
                'employees' => $serializer->serialize($employees, 'json')
            ));
            return $response;
        }
    }

    public function showSearchAction(Request $request)
    {
        if ($request->isXmlHttpRequest())
        {
            $search = $request->get('search');

        }
    }

    public function editAction(Request $request, ContractHistory $contractHistory)
    {
        $deleteForm = $this->createDeleteForm($contractHistory);
        $editForm = $this->createForm('AppBundle\Form\ContractHistoryType', $contractHistory);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('timeclock_contracthistory_edit', array('idContractHistory' => $contractHistory->getIdcontracthistory()));
        }

        return $this->render('@App/TimeClock/historialContracto/edit.html.twig', array(
            'contractHistory' => $contractHistory,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function deleteAction(Request $request, ContractHistory $contractHistory)
    {
        $form = $this->createDeleteForm($contractHistory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contractHistory);
            $em->flush();
        }

        return $this->redirectToRoute('timeclock_contracthistory_index');
    }

    /**
     * Creates a form to delete a contractHistory entity.
     *
     * @param ContractHistory $contractHistory The contractHistory entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ContractHistory $contractHistory)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('timeclock_contracthistory_delete', array('idContractHistory' => $contractHistory->getIdcontracthistory())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
