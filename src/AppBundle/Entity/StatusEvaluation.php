<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Projet;

/**
 * StatusEvaluation
 *
 * @ORM\Table(name="status_evaluation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StatusEvaluationRepository")
 */
class StatusEvaluation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * One status has Many projet.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Projet", mappedBy="status")
     * 
     */
    private $projets;
    // ...

    public function __construct() {
        $this->projets = new ArrayCollection();
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
     * @return StatusEvaluation
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
}

