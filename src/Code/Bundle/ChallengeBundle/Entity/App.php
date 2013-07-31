<?php

namespace Code\Bundle\ChallengeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * App
 *
 * @ORM\Table(name="app")
 * @ORM\Entity(repositoryClass="Code\Bundle\ChallengeBundle\Entity\AppRepository")
 */
class App
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
     * @ORM\Column(name="name", type="string", length=25)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="current_build", type="integer")
     */
    private $currentBuild;

    /**
     * @var boolean
     *
     * @ORM\Column(name="released", type="boolean")
     */
    private $released;

    /**
     * @ORM\ManyToMany(targetEntity="Developer")
     */
    private $developers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->developers = new ArrayCollection();
    }

    /**
     * Get associated Developers
     *
     * @return mixed
     */
    public function getDevelopers()
    {
        return $this->developers;
    }

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
     * Set name
     *
     * @param string $name
     * @return App
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set currentBuild
     *
     * @param integer $currentBuild
     * @return App
     */
    public function setCurrentBuild($currentBuild)
    {
        $this->currentBuild = $currentBuild;
    
        return $this;
    }

    /**
     * Get currentBuild
     *
     * @return integer 
     */
    public function getCurrentBuild()
    {
        return $this->currentBuild;
    }

    /**
     * Set released
     *
     * @param boolean $released
     * @return App
     */
    public function setReleased($released)
    {
        $this->released = $released;
    
        return $this;
    }

    /**
     * Get released
     *
     * @return boolean 
     */
    public function getReleased()
    {
        return $this->released;
    }
}
