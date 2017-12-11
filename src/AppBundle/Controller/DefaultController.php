<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Utilisateur;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Post;
use AppBundle\Form\UserType;

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
        //$succesfullyRegistered = $this->ajouterUtilisateur("oui", "kirian", "mail666@mail.com", "pass", "ROLE_USER", "Ingesup B1", "0652140142", "kiki");

        return $this->render('default/accueil.html.twig',[]);
    }

    /**
     * @Route("/utilisateurs", name="pageUtilisateurs")
     */    
    public function yoloAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->add('submit', SubmitType::class, array(
            'label' => 'Create',
            'attr'  => array('class' => 'btn btn-default pull-right')
        ));
         $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirect($this->generateUrl(
                'admin_post_show',
                array('id' => $post->getId())
        ));
        }
        return $request;
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




    private function ajouterUtilisateur($nom, $prenom, $mail, $password, $role, $classe, $tel, $slack){
        $em = $this->getDoctrine()->getManager();

        //Check si email existe
        $usersRepository = $em->getRepository("AppBundle:User");
        if($usersRepository->findOneBy(array('email' => $mail))){
            echo "L'adresse email est déja utilisée";
            return false;
        }

        $user = new User();
        $user->setUsername(substr($prenom,0,1).$nom);
        $user->setEmail($mail);
        $user->setEmailCanonical($mail);
        $user->setEnabled(1);
        $user->setPlainPassword($password);
        $user->addRole($role);

        $user->setNom($nom);
        $user->setPrenom($prenom);
        $user->setClasseOuFonction($classe);
        $user->setTel($tel); 
        $user->setNomSlack($slack);

        $em->persist($user);
        $em->flush();

        return true;
   }
}
