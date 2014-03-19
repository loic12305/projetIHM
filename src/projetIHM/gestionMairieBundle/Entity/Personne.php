<?php

namespace projetIHM\gestionMairieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personne
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="projetIHM\gestionMairieBundle\Entity\PersonneRepository")
 */
class Personne
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="Nsecu", type="integer")
     */
    private $nsecu;

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
     * @var \DateTime
     *
     * @ORM\Column(name="dateNai", type="date")
     */
    private $dateNai;

    /**
     * @var string
     *
     * @ORM\Column(name="villeNai", type="string", length=255)
     */
    private $villeNai;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=1)
     */
    private $sexe;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nsecu
     *
     * @param integer $nsecu
     * @return Personne
     */
    public function setNsecu($nsecu)
    {
        $this->nsecu = $nsecu;

        return $this;
    }

    /**
     * Get nsecu
     *
     * @return integer 
     */
    public function getNsecu()
    {
        return $this->nsecu;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Personne
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
     * @return Personne
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
     * Set dateNai
     *
     * @param \DateTime $dateNai
     * @return Personne
     */
    public function setDateNai($dateNai)
    {
        $this->dateNai = $dateNai;

        return $this;
    }

    /**
     * Get dateNai
     *
     * @return \DateTime 
     */
    public function getDateNai()
    {
        return $this->dateNai;
    }

    /**
     * Set villeNai
     *
     * @param string $villeNai
     * @return Personne
     */
    public function setVilleNai($villeNai)
    {
        $this->villeNai = $villeNai;

        return $this;
    }

    /**
     * Get villeNai
     *
     * @return string 
     */
    public function getVilleNai()
    {
        return $this->villeNai;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     * @return Personne
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe()
    {
        return $this->sexe;
    }


    public function __toString()
    {
      return (string) $this->getNom()." ".$this->getPrenom()." - Nsecu ".$this->getNsecu();
    }



}
