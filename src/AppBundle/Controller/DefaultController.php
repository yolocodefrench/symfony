<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/multiplication/{numberA}/{numberB}", name="multiplication")
     */
    public function multiplication($numberA, $numberB) {
        return $this->render('default/number.html.twig', [
            'numberA' => $numberA,
            'numberB' => $numberB
        ]);
    }

    /**
     * @Route("/cdp", name="test")
     */
    public function nouvelleAction(){
        return $this->render('default/test.html.twig',[]);
    }

    /**
     * @Route("/login", name="test1")
     */
    public function nouvelleAction2(){
        return $this->render('default/login.html.twig',[]);
    }

    /**
     * @Route("/header", name="test2")
     */
    public function nouvelleAction3(){
        return $this->render('default/header.hmtl.twig',[]);
    }

    /**
     * @Route("/barre", name="test3")
     */
    public function nouvelleAction4(){
        return $this->render('default/barre_gauche.html.twig',[]);
    }

    /**
     * @Route("/acceuil", name="test4")
     */
    public function nouvelleAction5(){
        return $this->render('default/acceuil.html.twig',[]);
    }

    /**
     * @Route("/accepter", name="test5")
     */
    public function nouvelleAction6(){
        return $this->render('default/alerteaccepter.html.twig',[]);
    }

    /**
     * @Route("/delete", name="test6")
     */
    public function nouvelleAction7(){
        return $this->render('default/alertedelete.hmtl.twig',[]);
    }




}
