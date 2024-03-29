<?php

namespace LFDPP\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messages
 *
 * @ORM\Table(name="lilou_messages")
 * @ORM\Entity(repositoryClass="LFDPP\AdminBundle\Repository\MessagesRepository")
 */
class Messages
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=180)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="LFDPP\AdminBundle\Entity\Users", cascade={"persist"})
     * @ORM\Column(name="user_id", type="integer", unique=true)
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="LFDPP\AdminBundle\Entity\MessageType", cascade={"persist"})
     * @ORM\Column(name="object_id", type="integer", unique=true)
     * @ORM\JoinColumn(nullable=false)
     */
    private $objectId;

    /**
     * @var string
     *
     * @ORM\Column(name="text_message", type="text")
     */
    private $textMessage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="date", unique=true)
     */
    private $creationDate;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="LFDPP\AdminBundle\Entity\Lang", cascade={"persist"})
     * @ORM\Column(name="lang_id", type="integer", unique=true)
     * @ORM\JoinColumn(nullable=false)
     */
    private $langId;

    
    public function __construct()
    {
        $this->creationDate = new \DateTime();    
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Messages
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Messages
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set objectId
     *
     * @param integer $objectId
     *
     * @return Messages
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;

        return $this;
    }

    /**
     * Get objectId
     *
     * @return int
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Set textMessage
     *
     * @param string $textMessage
     *
     * @return Messages
     */
    public function setTextMessage($textMessage)
    {
        $this->textMessage = $textMessage;

        return $this;
    }

    /**
     * Get textMessage
     *
     * @return string
     */
    public function getTextMessage()
    {
        return $this->textMessage;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Messages
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set langId
     *
     * @param integer $langId
     *
     * @return Messages
     */
    public function setLangId($langId)
    {
        $this->langId = $langId;

        return $this;
    }

    /**
     * Get langId
     *
     * @return int
     */
    public function getLangId()
    {
        return $this->langId;
    }
}
