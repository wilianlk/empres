<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;


class BaseController extends Controller
{
    protected $_session;
    protected $_em;

    public function getManager($id)
    {
        $em = $this->getDoctrine()->getManager();
        $e = $em->getRepository('BackendBundle:Employees');
        $employees = $e->createQueryBuilder('e')
            ->select('e.attempts,e.currenttime')
            ->where('e.idEmployee = :idEmployee')
            ->setParameter('idEmployee', $id)
            ->getQuery()
            ->getResult();

        return $employees;
    }

    public function validate()
    {

    }

}
