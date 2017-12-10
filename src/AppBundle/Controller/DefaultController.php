<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Utilisateur;

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
     * @Route("/test", name="test")
     */
    public function testAction(){

        $user = $this->getDoctrine()
        ->getRepository('AppBundle:Utilisateur')
        ->find(1);

        if (!$user) {
            throw $this->createNotFoundException(
                'No product found for id 1'
            );
        }

        return $this->render('default/test.html.twig',[
            'product' => $user->getPrenom()
        ]);
    }
    



}
