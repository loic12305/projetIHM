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
     * @var string
     *
     * @ORM\Column(name="numSecu1", type="string", length=15)
     */
    private $numSecu1;

    /**
     * @var string
     *
     * @ORM\Column(name="numSecu2", type="string", length=15)
     */
    private $numSecu2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateMariage", type="date")
     */
    private $dateMariage;

    /**
     * @var string
     *
     * @ORM\Column(name="villeMarie", type="string", length=30)
     */
    private $villeMarie;


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
     * Set numSecu1
     *
     * @param string $numSecu1
     * @return Mariage
     */
    public function setNumSecu1($numSecu1)
    {
        $this->numSecu1 = $numSecu1;

        return $this;
    }

    /**
     * Get numSecu1
     *
     * @return string 
     */
    public function getNumSecu1()
    {
        return $this->numSecu1;
    }

    /**
     * Set numSecu2
     *
     * @param string $numSecu2
     * @return Mariage
     */
    public function setNumSecu2($numSecu2)
    {
        $this->numSecu2 = $numSecu2;

        return $this;
    }

    /**
     * Get numSecu2
     *
     * @return string 
     */
    public function getNumSecu2()
    {
        return $this->numSecu2;
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
     * Set villeMarie
     *
     * @param string $villeMarie
     * @return Mariage
     */
    public function setVilleMarie($villeMarie)
    {
        $this->villeMarie = $villeMarie;

        return $this;
    }

    /**
     * Get villeMarie
     *
     * @return string 
     */
    public function getVilleMarie()
    {
        return $this->villeMarie;
    }
}
