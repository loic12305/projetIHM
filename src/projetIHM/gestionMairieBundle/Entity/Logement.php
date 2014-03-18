<?php

namespace projetIHM\gestionMairieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Logement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="projetIHM\gestionMairieBundle\Entity\LogementRepository")
 */
class Logement
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
     * @ORM\Column(name="numRue", type="integer")
     */
    private $numRue;

    /**
     * @var string
     *
     * @ORM\Column(name="nomRue", type="string", length=30)
     */
    private $nomRue;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=40)
     */
    private $ville;

    /**
     * @var integer
     *
     * @ORM\Column(name="cp", type="integer")
     */
    private $cp;


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
     * Set numRue
     *
     * @param integer $numRue
     * @return Logement
     */
    public function setNumRue($numRue)
    {
        $this->numRue = $numRue;

        return $this;
    }

    /**
     * Get numRue
     *
     * @return integer 
     */
    public function getNumRue()
    {
        return $this->numRue;
    }

    /**
     * Set nomRue
     *
     * @param string $nomRue
     * @return Logement
     */
    public function setNomRue($nomRue)
    {
        $this->nomRue = $nomRue;

        return $this;
    }

    /**
     * Get nomRue
     *
     * @return string 
     */
    public function getNomRue()
    {
        return $this->nomRue;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Logement
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     * @return Logement
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return integer 
     */
    public function getCp()
    {
        return $this->cp;
    }
}
