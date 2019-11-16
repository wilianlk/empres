<?php
/**
 * Created by PhpStorm.
 * User: @jdperea59
 * PC: gerencia-ti
 * Date: 5/04/18
 * Time: 08:50 AM
 */

namespace AppBundle\Controller;

use AppBundle\Form\RegisterType;
use AppBundle\Form\UserType;
use BackendBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    private $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    public function loginAction(Request $request)
    {
        if(is_object($this->getUser())){
            return $this->redirect('home');
        }
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('AppBundle:User:login.html.twig',array(
            'last_username' => $lastUsername,
            'error' => $error
        ));
    }
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if( $form->isSubmitted() ){
            if( $form->isValid()){
                $em = $this->getDoctrine()->getManager();
                //ELIMINAR CODIGO QUE ESTA COMO COMENTARIO ES UNA BUENA PRACTICA
                //$user_repo = $em->getRepository("BackendBundle:User");
                $query = $em->createQuery("SELECT u FROM BackendBundle:User u WHERE u.email = :email or u.username = :username")
                    ->setParameter('email',$form->get('email')->getData())
                    ->setParameter('username',$form->get('username')->getData());
                $user_isset = $query->getResult();
                if(count($user_isset) == 0){
                    //RECUERDE LAS BUENAS PRACTICAS EN LA DEFINICION DE LAS VARIABLES 
                    $myuser = $this->getUser();
                    $factory = $this->get('security.encoder_factory');
                    $encoder = $factory->getEncoder($user);

                    $password =$encoder->encodePassword($form->get("password")->getData(),$user->getSalt());

                    $user->setPassword($password);
                    $user->setIdRole('1');
                    $user->setImage('');
                    /* variables de nuestros usuarios */
                    $user->setActive(1);
                    $user->setCreatedBy($myuser->getIdUser());
                    $user->setUpdatedBy($myuser->getIdUser());
                    $user->setCreatedAt(new \DateTime());
                    $user->setUpdatedAt(new \DateTime());
                    /* variables de nuestros usuarios */
                    $em->persist($user);
                    $flush = $em->flush();
                    if($flush == null){
                        $status = "Te has registrado correctamente";
                        $this->session->getFlashBag()->add("status", $status);
                        return $this->redirect("login");
                    }else{
                        $status['estado'] = "danger";
                        $status['mensaje'] = "Ha ocurrido un error. No te has registrado correctamente";
                    }
                }else{
                    $status['estado'] = "danger";
                    $status['mensaje'] = "El usuario ya Existe";
                }
            }else{
                $status['estado'] = "warning";
                $status['mensaje'] = "No se ha actualizado correctamente el usuario";
            }
            $this->session->getFlashBag()->add($status['estado'], $status['mensaje']);

        }
        return $this->render('AppBundle:User:register.html.twig',array(
            "titulo" => "Registrarse",
            "form" => $form->createView()
        ));
    }

    public function usernameTestAction(Request $request){
        /*RECUERDE LAS BUENAS PRACTICAS DE PROGRAMACION EN LA DEFINICION DE VARIABLES*/
        $username = $request->get('username');

        $em = $this->getDoctrine()->getManager();
        $user_repo = $em->getRepository("BackendBundle:User");

        $user_isset = $user_repo->findOneBy(array("username" => $username));
        if(count($user_isset)>=1 && is_object($user_isset) ){
            $result = "used";
        }else{
            $result = "unused";
        }
        return new Response($result);
    }

    public function homeAction(Request $request)
    {
        $status = array();
        $myuser = $this->getUser();

        if($myuser->getActive() == 0) {

            return new RedirectResponse($this->generateUrl('logout'));

//            $status['estado'] = "danger";
//            $status['mensaje'] = "Esta cuenta esta inactiva. Comuniquese con el departamento de Sistemas";
//            /* Todo mejor.... */
//            $this->session->getFlashBag()->add($status['estado'], $status['mensaje']);
//            return $this->redirectToRoute('logout');
        }

        return $this->render('AppBundle:User:home.html.twig',array(
        ));
    }

    public function logoutAction()
    {
        $status = array();
        $user = $this->getUser();

        $status['mensaje'] = "Esta cuenta esta inactiva. Comuniquese con el departamento de Sistemas";

        //$this->session->getFlashBag()->add($status['estado'], $status['mensaje']);

        if ($this->get('security.token_storage')->getToken()->getUser()) {
            //Se verifica si el estado del usuario es inactivo, se cierra la sesion y se pasa el mensaje.
            if ($user->getActive()==0)
            {
                $this->addFlash('logout', $status['mensaje']);
            }
            $this->get('security.token_storage')->setToken(null);

            return $this->redirectToRoute('login');
        }
    }

    public function listUserAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT u FROM BackendBundle:User u ORDER BY u.idUser DESC";

        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query,$request->query->getInt('page',1),2);

        return $this->render('AppBundle:User:list_users.html.twig',array(
            'users' => $pagination
        ));

    }

    public function viewUserAction(Request $request)
    {

        return $this->render('AppBundle:User:home.html.twig',array(
        ));
    }

    public function editUserAction(Request $request)
    {
        $status = array();
        $myuser = $this->getUser();
        /* ROLES POR DEFINIR, 5 lo voy a manejar como superadmin y 4 como admin */
        if($myuser->getIdRole() == 4 || $myuser->getIdRole() == 5){
            $user = $this->getDoctrine()
                ->getRepository(User::class)
                ->find($request->get('id'));
            $user_image = $user->getImage();
        } else {
            $user = $myuser;
            $user_image = $user->getImage();
            if($myuser->getIdUser() != $request->get('id')){
                $this->addFlash(
                    'warning',
                    'Tus permisos no permiten editar otro usuario.'
                );
            }
        }

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $query = $em->createQuery("SELECT u FROM BackendBundle:User u WHERE u.email = :email or u.username = :username")
                    ->setParameter('email', $form->get('email')->getData())
                    ->setParameter('username', $form->get('username')->getData());

                $user_isset = $query->getSingleResult();

                if (($user->getEmail() == $user_isset->getEmail() && $user->getUsername() == $user_isset->getUsername()) || count($user_isset) == 0) {
                    if($form['password'] != '') {

                        $factory = $this->get('security.encoder_factory');
                        $encoder = $factory->getEncoder($user);

                        $password = $encoder->encodePassword($form->get("password")->getData(), $user->getSalt());

                        $user->setPassword($password);
                    }

                    // upload file
                    $file = $form['image']->getData();
                    if(!empty($file) && $file != null){
                        $ext = $file->guessExtension();
                        if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif'){
                            $file_name = md5($user->getIdUser().time()).'.'.$ext;
                            $file->move("uploads/users",$file_name);
                            $user->setImage($file_name);
                        }

                    }else{
                        $user->setImage($user_image);
                    }
                    /* variables de nuestros usuarios */
                    $user->setUpdatedBy($user->getIdUser());
                    $user->setUpdatedAt(new \DateTime());
                    /* variables de nuestros usuarios */
                    $em->persist($user);
                    $flush = $em->flush();
                    if ($flush == null) {
                        $status['estado'] = "success";
                        $status['mensaje'] = "Se ha modificado correctamente";
                    } else {
                        $status['estado'] = "danger";
                        $status['mensaje'] = "Ha ocurrido un error. No te has registrado correctamente";
                    }
                } else {
                    $status['estado'] = "danger";
                    $status['mensaje'] = "El usuario ya Existe";
                }
            } else {
                $status['estado'] = "warning";
                $status['mensaje'] = "No se ha actualizado correctamente el usuario";
            }
            $this->session->getFlashBag()->add($status['estado'], $status['mensaje']);

            if($form->getErrors()){
             dump($form['name']->getErrors());
             dump($form['surname']->getErrors());
             dump($form['username']->getErrors());
             dump($form['email']->getErrors());
             dump($form['password']->getErrors());
             dump($form['image']->getErrors());
             dump($form['Guardar']->getErrors());
            }else{
                return $this->redirect('edit');
            }
        }

        return $this->render('AppBundle:User:edit_user.html.twig',array(
            'id'=>$request->get('id'),
            'form' => $form->createView(),
        ));
    }
}