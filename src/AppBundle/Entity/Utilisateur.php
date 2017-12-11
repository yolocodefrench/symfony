<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Projet;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateurs")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UtilisateurRepository")
 */
class Utilisateur extends BaseUser

{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * One projet has One helper.
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Projet", mappedBy="helper")
     *
     * One projet has One chefDeProjet.
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Projet", mappedBy="chefDeProjet")
     */
    private $id;

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
     * Plusieurs users ont plusieurs groupes.
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Projet", mappedBy="projets")
     * @ORM\JoinTable(name="users_projets")
     */
    private $projets;

    public function __construct() {
        $this->projets = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @var int
     *
     * One projet a un Chef de projet.
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Entreprise", inversedBy="id")
     * @ORM\JoinColumn(name="fk_entreprise", referencedColumnName="id")
     */
    private $idEntreprise;


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

    /**
     * Set idEntreprise
     *
     * @param integer $idEntreprise
     *
     * @return Utilisateur
     */
    public function setIdEntreprise($idEntreprise)
    {
        $this->idEntreprise = $idEntreprise;

        return $this;
    }

    /**
     * Get idEntreprise
     *
     * @return int
     */
    public function getdEntreprise()
    {
        return $this->idEntreprise;
    }
}

