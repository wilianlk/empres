<?php

namespace BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user_repo = $em->getRepository("BackendBundle:User");

        $user = $user_repo->find(1);

        echo $user->getName()." ".$user->getSurname();
        dump($user);
        //ELIMINAR CODIGO COMENTADO ES UNA BUENA PRACTICA
        
        /*foreach ($user as $u){
            //echo $u->id_user;
            //print_r($u);
        }*/
        die();

        return $this->render('BackendBundle:Default:index.html.twig');
    }
}
