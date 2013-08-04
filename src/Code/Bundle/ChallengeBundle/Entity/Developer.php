<?php

namespace Code\Bundle\ChallengeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Developer
 *
 * @ORM\Table(name="developer")
 * @ORM\Entity(repositoryClass="Code\Bundle\ChallengeBundle\Entity\DeveloperRepository")
 */
class Developer
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
     * @Assert\Length(max="25")
     * @Assert\Regex("/[0-9a-zA-Z]+/")
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @Assert\Email
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @ORM\ManyToMany(targetEntity="App")
     */
    private $apps;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->apps = new ArrayCollection();
    }

    public function setApps(array $apps)
    {
        $this->apps = $apps;
    }

    public function getApps()
    {
        return $this->apps;
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
     * @return Developer
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
     * Set email
     *
     * @param string $email
     * @return Developer
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Add apps
     *
     * @param \Code\Bundle\ChallengeBundle\Entity\App $apps
     * @return Developer
     */
    public function addApp(\Code\Bundle\ChallengeBundle\Entity\App $apps)
    {
        $this->apps[] = $apps;
    
        return $this;
    }

    /**
     * Remove apps
     *
     * @param \Code\Bundle\ChallengeBundle\Entity\App $apps
     */
    public function removeApp(\Code\Bundle\ChallengeBundle\Entity\App $apps)
    {
        $this->apps->removeElement($apps);
    }
}