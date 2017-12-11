<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Projet; 

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateurs")
 * @ORM\Entity
 */
class Utilisateur extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    protected $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    protected $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="classe_ou_fonction", type="string", length=255)
     */
    protected $classeOuFonction;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255, nullable=true)
     */
    protected $role;

    
    
    /**
     * @var int
     *
     * @ORM\Column(name="tel", type="integer")
     */
    protected $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_slack", type="string", length=255, nullable=true)
     */
    protected $nomSlack;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set classeOuFonction
     *
     * @param string $classeOuFonction
     *
     * @return Utilisateur
     */
    public function setClasseOuFonction($classeOuFonction)
    {
        $this->classeOuFonction = $classeOuFonction;

        return $this;
    }

    /**
     * Get classeOuFonction
     *
     * @return string
     */
    public function getClasseOuFonction()
    {
        return $this->classeOuFonction;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return Utilisateur
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return Utilisateur
     */
    public function setProjet($projet)
    {
        $this->projet[]= $projet;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * Set tel
     *
     * @param integer $tel
     *
     * @return Utilisateur
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return int
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set nomSlack
     *
     * @param string $nomSlack
     *
     * @return Utilisateur
     */
    public function setNomSlack($nomSlack)
    {
        $this->nomSlack = $nomSlack;

        return $this;
    }

    /**
     * Get nomSlack
     *
     * @return string
     */
    public function getNomSlack()
    {
        return $this->nomSlack;
    }

    
   

}