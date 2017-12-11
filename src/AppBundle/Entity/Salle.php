<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Projet;

/**
 * Salle
 *
 * @ORM\Table(name="salle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SalleRepository")
 */
class Salle
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
     * @var int
     *
     * @ORM\Column(name="etage", type="integer")
     */
    private $etage;

    /**
     * One Salle has Many projets.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Projet", mappedBy="id")
     */
    private $projets;

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
     * @return Salle
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
     * Set etage
     *
     * @param integer $etage
     *
     * @return Salle
     */
    public function setEtage($etage)
    {
        $this->etage = $etage;

        return $this;
    }

    /**
     * Get etage
     *
     * @return int
     */
    public function getEtage()
    {
        return $this->etage;
    }
}

