<?php

namespace AppBundle\Repository;
use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\entreprise;

/**
 * EntrepriseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EntrepriseRepository extends \Doctrine\ORM\EntityRepository
{
	public function insertEntrepriseFull($nom, $ville, $typeBoie, $nomVoie, $numVoie, $codePostal, $siret, $idEntreprises){

		$user = new Utilisateur();
		$user->setNom($nom);
		$user->setVille($ville);
		$user->setYdaysPerso($typeBoie);
		$user->setStatusEvaluations($nomVoie);
		$user->setArchiver($numVoie);
		$user->setIdUtilisateurs($codePostal);
		$user->setIdUtilisateurs1($codePostal);


		$em = $this->getDoctrine()->getManager();
	    $em->persist($product);
	    $em->flush();
	    
	}



}