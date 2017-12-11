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
     * @Route("/acceuil", name="test")
     */
    public function nouvelleAction(){
        return $this->render('default/acceuil.html.twig',[]);
    }

    /**
     * @Route("/header", name="test")
     */
    public function nouvelleAction(){
        return $this->render('default/header.html.twig',[]);
    }

    /**
     * @Route("/barre", name="test")
     */
    public function nouvelleAction(){
        return $this->render('default/barre_gauche.html.twig',[]);
    }



}
