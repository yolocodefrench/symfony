<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="pageMenuPrincipale")
     */
    public function menu_principaleAction(){
        $this->denyAccessUnlessGranted('ROLE_USER');
        //$this->denyAccessUnlessGranted('ROLE_ADMIN');
       
        return $this->render('default/accueil.html.twig',[]);
    }

    /**
     * @Route("/projets", name="pageProjet")
     */
    public function projetsAction(){
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('default/accueil.html.twig',[]);
    }

    /**
     * @Route("/utilisateurs", name="pageUtilisateurs")
     */
    public function utilisateursAction(){
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('default/accueil.html.twig',[]);
    }

    /**
     * @Route("/messagerie", name="pageMessagerie")
     */
    public function messagerieAction(){
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('default/accueil.html.twig',[]);
    }

    /**
     * @Route("/entreprises", name="pageEntreprises")
     */
    public function entreprisesAction(){
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('default/accueil.html.twig',[]);
    }

    /**
     * @Route("/logs", name="pageLogs")
     */
    public function logsAction(){
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('default/accueil.html.twig',[]);
    }

}
