<?php

namespace Code\Bundle\ChallengeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var integer
     *
     * @ORM\Column(name="app_id", type="integer")
     * @ORM\ManyToOne(targetEntity="App")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $app_id;

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
}
