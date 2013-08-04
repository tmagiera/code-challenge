<?php

namespace Code\Bundle\ChallengeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Length(max="25")
     * @Assert\Regex("/[0-9a-zA-Z]+/")
     *
     * @ORM\Column(name="name", type="string", length=25)
     */
    private $name;

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
     * @ORM\OneToMany(targetEntity="Build", mappedBy="app")
     */
    protected $builds;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->builds = new ArrayCollection();
        $this->developers = new ArrayCollection();
    }

    public function setDevelopers(array $developers)
    {
        $this->developers = $developers;
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

    /**
     * Add developers
     *
     * @param \Code\Bundle\ChallengeBundle\Entity\Developer $developers
     * @return App
     */
    public function addDeveloper(\Code\Bundle\ChallengeBundle\Entity\Developer $developers)
    {
        $this->developers[] = $developers;
    
        return $this;
    }

    /**
     * Remove developers
     *
     * @param \Code\Bundle\ChallengeBundle\Entity\Developer $developers
     */
    public function removeDeveloper(\Code\Bundle\ChallengeBundle\Entity\Developer $developers)
    {
        $this->developers->removeElement($developers);
    }

    /**
     * Add builds
     *
     * @param \Code\Bundle\ChallengeBundle\Entity\Build $builds
     * @return App
     */
    public function addBuild(\Code\Bundle\ChallengeBundle\Entity\Build $builds)
    {
        $this->builds[] = $builds;
    
        return $this;
    }

    /**
     * Remove builds
     *
     * @param \Code\Bundle\ChallengeBundle\Entity\Build $builds
     */
    public function removeBuild(\Code\Bundle\ChallengeBundle\Entity\Build $builds)
    {
        $this->builds->removeElement($builds);
    }

    /**
     * Get builds
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBuilds()
    {
        return $this->builds;
    }
}