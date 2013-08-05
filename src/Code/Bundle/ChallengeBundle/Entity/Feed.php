<?php

namespace Code\Bundle\ChallengeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feed
 *
 * @ORM\Table(name="feed",uniqueConstraints={@ORM\UniqueConstraint(name="feed_idx", columns={"feed_id"})})
 * @ORM\Entity(repositoryClass="Code\Bundle\ChallengeBundle\Entity\FeedRepository")
 */
class Feed
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
     * @ORM\Column(name="feed_id", type="string", length=32)
     */
    private $feedId;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime")
     */
    private $createdDate;

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
     * Set feedId
     *
     * @param string $feedId
     * @return Feed
     */
    public function setFeedId($feedId)
    {
        $this->feedId = $feedId;
    
        return $this;
    }

    /**
     * Get feedId
     *
     * @return string 
     */
    public function getFeedId()
    {
        return $this->feedId;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Feed
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return Feed
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    
        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }
}
