<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Utilisateur;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

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

    /**
     * @Route("/addUser", name="test")
     */
    public function formAction(Request $request){
        // On crée un objet Advert
        $utilisateur = new Utilisateur();
        $projets = $this->getDoctrine()
        ->getRepository('AppBundle:Projet')
        ->findAll();

        // On crée le FormBuilder grâce au service form factory
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $utilisateur);

        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $formBuilder
          ->add('nom',      TextType::class)
          ->add('prenom',     TextType::class)
          ->add('classe_ou_fonction',   TextType::class)
          ->add('role',    TextType::class)
          ->add('projet', ChoiceType::class, array(
            'choices'  => $projets))
          ->add('save',      SubmitType::class)
        ;
        // Pour l'instant, pas de candidatures, catégories, etc., on les gérera plus tard

        // À partir du formBuilder, on génère le formulaire
        $form = $formBuilder->getForm();

        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('default/add.html.twig', array(
          'form' => $form->createView(),
        ));
    }
    



}
