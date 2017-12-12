<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Utilisateur;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\StatusEvaluation;
use AppBundle\Entity\Entreprise;
use AppBundle\Entity\Salle;
use AppBundle\Entity\CompteRendu;
use AppBundle\Entity\Commentaire;
/**
 * projet
 *
 * @ORM\Table(name="projet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjetRepository")
 */
class Projet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\CompteRendu", mappedBy="idProjet")
     */
    private $id_projet;
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;
    /**
     * @var bool
     *
     * @ORM\Column(name="projet_ext_ou_int", type="boolean")
     */
    private $projetExtOuInt;
    /**
     * @var bool
     *
     * @ORM\Column(name="ydays_perso", type="boolean")
     */
    private $ydaysPerso;
    /**
     * Plusieurs groupes ont plusieurs users.
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Utilisateur", inversedBy="projets")
     * @ORM\JoinTable(name="users_projets")
     */
    private $utilisateurs;
    public function __construct() {
        $this->utilisateur = new \Doctrine\Common\Collections\ArrayCollection();

           $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * @var bool
     *
     * @ORM\Column(name="archiver", type="boolean")
     */
    private $archiver;
    /**
     * @var int
     * 
     * One projet a un Chef de projet.
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Utilisateur", inversedBy="id")
     * @ORM\JoinColumn(name="fk_chef_de_projet", referencedColumnName="id")
     */
    private $chefDeProjet;
    /**
     *@var int
     * One projet a un helper.
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Utilisateur", inversedBy="id")
     * @ORM\JoinColumn(name="fk_helper", referencedColumnName="id")
     */
    private $helper;

    /**
     * @var int
     *
     * One projet a une entreprise.
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Entreprise", inversedBy="id")
     * @ORM\JoinColumn(name="fk_entreprise", referencedColumnName="id")
     */
    private $idEntreprises;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\StatusEvaluation", inversedBy="projets")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
    */
    private $status;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Salle", inversedBy="projets")
     * @ORM\JoinColumn(name="fk_salle", referencedColumnName="id")
    */
    private $idSalle;
    /**
    * One projet has Many commentaires.
    * @ORM\OneToMany(targetEntity="AppBundle\Entity\Commentaire", mappedBy="id")
    */
    private $commentaires;   

      
       /**
     * Get id
     *
     * @return int
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }
    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return projet
     */
    public function setCommentaires($commentaires)
    {
        $this->commentaires = $commentaires;
        return $this;
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
     * @return projet
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
     * Set projetExtOuInt
     *
     * @param boolean $projetExtOuInt
     *
     * @return projet
     */
    public function setProjetExtOuInt($projetExtOuInt)
    {
        $this->projetExtOuInt = $projetExtOuInt;
        return $this;
    }
    /**
     * Get projetExtOuInt
     *
     * @return bool
     */
    public function getProjetExtOuInt()
    {
        return $this->projetExtOuInt;
    }
    /**
     * Set ydaysPerso
     *
     * @param boolean $ydaysPerso
     *
     * @return projet
     */
    public function setYdaysPerso($ydaysPerso)
    {
        $this->ydaysPerso = $ydaysPerso;
        return $this;
    }
    /**
     * Get ydaysPerso
     *
     * @return bool
     */
    public function getYdaysPerso()
    {
        return $this->ydaysPerso;
    }
    /**
     * Set statusEvaluations
     *
     * @param string $statusEvaluations
     *
     * @return projet
     */
    public function setStatusEvaluations($statusEvaluations)
    {
        $this->statusEvaluations = $statusEvaluations;
        return $this;
    }
    /**
     * Get statusEvaluations
     *
     * @return string
     */
    public function getStatusEvaluations()
    {
        return $this->statusEvaluations;
    }
    /**
     * Set archiver
     *
     * @param boolean $archiver
     *
     * @return projet
     */
    public function setArchiver($archiver)
    {
        $this->archiver = $archiver;
        return $this;
    }
    /**
     * Get archiver
     *
     * @return bool
     */
    public function getArchiver()
    {
        return $this->archiver;
    }
    /**
     * Set chefDeProjet
     *
     * @param integer $chefDeProjet
     *
     * @return projet
     */
    public function setIChefDeProjet($chefDeProjet)
    {
        $this->chefDeProjet = $chefDeProjet;
        return $this;
    }
    /**
     * Get chefDeProjet
     *
     * @return int
     */
    public function getChefDeProjet()
    {
        return $this->chefDeProjet;
    }
    /**
     * Set chefDeProjet
     *
     * @return int
     */
    public function setChefDeProjet($chefDeProjet)
    {
        $this->chefDeProjet=$chefDeProjet;
    }
    /**
     * Set Helper
     *
     * @param integer Helper
     *
     * @return projet
     */
    public function setHelper($helper)
    {
        $this->helper = $helper;
        return $this;
    }
    /**
     * Get Helper
     *
     * @return int
     */
    public function gethelper()
    {
        return $this->helper;
    }
    /**
     * Set idEntreprises
     *
     * @param integer $idEntreprises
     *
     * @return projet
     */
    public function setIdEntreprises($idEntreprises)
    {
        $this->idEntreprises = $idEntreprises;
        return $this;
    }
    /**
     * Get idEntreprises
     *
     * @return int
     */
    public function getIdEntreprises()
    {
        return $this->idEntreprises;
    }

    /**
     * Set statusId
     *
     * @param integer $statusId
     *
     * @return projet
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
    /**
     * Get idEntreprises
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set utilisateurs
     *
     * @param integer $utilisateurs
     *
     * @return projet
     */
    public function setUtilisateurs($utilisateurs)
    {
        $this->utilisateurs = $utilisateurs;
        return $this;
    }
    /**
     * Get utilisateurs
     *
     * @return int
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }

    /**
     * Set idSalle
     *
     * @param integer $idSalle
     *
     * @return projet
     */
    public function setIdSalle($idSalle)
    {
        $this->idSalle = $idSalle;
        return $this;
    }
    /**
     * Get idSalle
     *
     * @return int
     */
    public function getIdSalle()
    {
        return $this->idSalle;
    }
    public function __toString()
    {
        return $this->getNom();
    }
}
