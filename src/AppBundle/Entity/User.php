<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateurs")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="classe_ou_fonction", type="string", length=255)
     */
    private $classeOuFonction;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255, nullable=true)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;

    /**
     * @var int
     *
     * @ORM\Column(name="tel", type="integer")
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_slack", type="string", length=255, nullable=true)
     */
    private $nomSlack;

    /**
     * @var bool
     *
     * @ORM\Column(name="actif", type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @var int
     *
     * @ORM\Column(name="id_statuts", type="integer")
     */
    private $idStatuts;

    /**
     * @var int
     *
     * @ORM\Column(name="id_projets", type="integer")
     */
    private $idProjets;


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
     * Set mail
     *
     * @param string $mail
     *
     * @return Utilisateur
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
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

    /**
     * Set actif
     *
     * @param boolean $actif
     *
     * @return Utilisateur
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return bool
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set idStatuts
     *
     * @param integer $idStatuts
     *
     * @return Utilisateur
     */
    public function setIdStatuts($idStatuts)
    {
        $this->idStatuts = $idStatuts;

        return $this;
    }

    /**
     * Get idStatuts
     *
     * @return int
     */
    public function getIdStatuts()
    {
        return $this->idStatuts;
    }

    /**
     * Set idProjets
     *
     * @param integer $idProjets
     *
     * @return Utilisateur
     */
    public function setIdProjets($idProjets)
    {
        $this->idProjets = $idProjets;

        return $this;
    }

    /**
     * Get idProjets
     *
     * @return int
     */
    public function getIdProjets()
    {
        return $this->idProjets;
    }

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}