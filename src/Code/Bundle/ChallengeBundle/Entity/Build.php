<?php

namespace Code\Bundle\ChallengeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Code\Bundle\ChallengeBundle\Entity\App;

/**
 * Build
 *
 * @ORM\Table(name="build")
 * @ORM\Entity(repositoryClass="Code\Bundle\ChallengeBundle\Entity\BuildRepository")
 */
class Build
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
     * @Assert\Regex("/\d+\.\d+/")
     *
     * @ORM\Column(name="version", type="string", length=16)
     */
    private $version;

    /**
     * @var boolean
     *
     * @ORM\Column(name="current", type="boolean")
     */
    private $current;

    /**
     * @ORM\ManyToOne(targetEntity="App")
     */
    private $app;

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
     * Set version
     *
     * @param string $version
     * @return Build
     */
    public function setVersion($version)
    {
        $this->version = $version;
    
        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set current
     *
     * @param boolean $current
     * @return Build
     */
    public function setCurrent($current)
    {
        
        $this->current = $current;
    
        return $this;
    }

    /**
     * Get current
     *
     * @return boolean 
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * Set app
     *
     * @param \Code\Bundle\ChallengeBundle\Entity\App $app
     * @return Build
     */
    public function setApp(App $app = null)
    {
        $this->app = $app;
    
        return $this;
    }

    /**
     * Get app
     *
     * @return \Code\Bundle\ChallengeBundle\Entity\App 
     */
    public function getApp()
    {
        return $this->app;
    }
}