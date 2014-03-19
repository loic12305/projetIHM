<?php

namespace projetIHM\gestionMairieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mariage
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="projetIHM\gestionMairieBundle\Entity\MariageRepository")
 */
class Mariage
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
     * @ORM\OneToOne(targetEntity="Personne", cascade={"persist"})
     */

    private $personne1;

    /**
     * @ORM\OneToOne(targetEntity="Personne", cascade={"persist"})
     */
    private $personne2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateMariage", type="date")
     */
    private $dateMariage;

    /**
     * @var string
     *
     * @ORM\Column(name="villeMairie", type="string", length=30)
     */
    private $villeMairie;



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
     * Set dateMariage
     *
     * @param \DateTime $dateMariage
     * @return Mariage
     */
    public function setDateMariage($dateMariage)
    {
        $this->dateMariage = $dateMariage;

        return $this;
    }

    /**
     * Get dateMariage
     *
     * @return \DateTime 
     */
    public function getDateMariage()
    {
        return $this->dateMariage;
    }

    /**
     * Set villeMairie
     *
     * @param string $villeMairie
     * @return Mariage
     */
    public function setVilleMairie($villeMairie)
    {
        $this->villeMairie = $villeMairie;

        return $this;
    }

    /**
     * Get villeMairie
     *
     * @return string 
     */
    public function getVilleMairie()
    {
        return $this->villeMairie;
    }

    /**
     * Set personne1
     *
     * @param \projetIHM\gestionMairieBundle\Entity\Personne $personne1
     * @return Mariage
     */
    public function setPersonne1(\projetIHM\gestionMairieBundle\Entity\Personne $personne1 = null)
    {
        $this->personne1 = $personne1;

        return $this;
    }

    /**
     * Get personne1
     *
     * @return \projetIHM\gestionMairieBundle\Entity\Personne 
     */
    public function getPersonne1()
    {
        return $this->personne1;
    }

    /**
     * Set personne2
     *
     * @param \projetIHM\gestionMairieBundle\Entity\Personne $personne2
     * @return Mariage
     */
    public function setPersonne2(\projetIHM\gestionMairieBundle\Entity\Personne $personne2 = null)
    {
        $this->personne2 = $personne2;

        return $this;
    }

    /**
     * Get personne2
     *
     * @return \projetIHM\gestionMairieBundle\Entity\Personne 
     */
    public function getPersonne2()
    {
        return $this->personne2;
    }
}
