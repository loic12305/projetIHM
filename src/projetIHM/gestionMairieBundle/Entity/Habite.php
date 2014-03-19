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
     * @ORM\OneToOne(targetEntity="Personne", cascade={"persist"})
     */

    private $personne;


    /**
     * @ORM\OneToOne(targetEntity="Logement", cascade={"persist"})
     */
    private $logement;


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
     * Set personne
     *
     * @param \projetIHM\gestionMairieBundle\Entity\Personne $personne
     * @return Habite
     */
    public function setPersonne(\projetIHM\gestionMairieBundle\Entity\Personne $personne = null)
    {
        $this->personne = $personne;

        return $this;
    }

    /**
     * Get personne
     *
     * @return \projetIHM\gestionMairieBundle\Entity\Personne 
     */
    public function getPersonne()
    {
        return $this->personne;
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
