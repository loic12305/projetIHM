<?php

namespace projetIHM\gestionMairieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Habite
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="projetIHM\gestionMairieBundle\Entity\HabiteRepository")
 */
class Habite
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
     * @ORM\Column(name="numSecu", type="integer")
     */
    private $numSecu;

    /**
     * @var integer
     * @ORM\Column(name="adresse", type="integer")
     */
    private $adresse;





    /**
     * @ORM\OneToOne(targetEntity="Logement")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    protected $logement;





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
     * Set numSecu
     *
     * @param integer $numSecu
     * @return Habite
     */
    public function setNumSecu($numSecu)
    {
        $this->numSecu = $numSecu;

        return $this;
    }

    /**
     * Get numSecu
     *
     * @return integer 
     */
    public function getNumSecu()
    {
        return $this->numSecu;
    }

    /**
     * Set adresse
     *
     * @param integer $adresse
     * @return Habite
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return integer 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set logement
     *
     * @param \projetIHM\gestionMairieBundle\Entity\Logement $logement
     * @return Habite
     */
    public function setLogement(\projetIHM\gestionMairieBundle\Entity\Logement $logement = null)
    {
        $this->logement = $logement;

        return $this;
    }

    /**
     * Get logement
     *
     * @return \projetIHM\gestionMairieBundle\Entity\Logement 
     */
    public function getLogement()
    {
        return $this->logement;
    }
}
