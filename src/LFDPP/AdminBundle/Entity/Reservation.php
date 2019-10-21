<?php

namespace LFDPP\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="lilou_reservation")
 * @ORM\Entity(repositoryClass="LFDPP\AdminBundle\Repository\ReservationRepository")
 */
class Reservation
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
     * @var int
     *
     * @ORM\Column(name="nbr_adlt", type="integer")
     */
    private $nbrAdlt;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_kids", type="integer")
     */
    private $nbrKids;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="arrival", type="date")
     */
    private $arrival;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="departure", type="date")
     */
    private $departure;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="date")
     */
    private $creationDate;

    /**
     * @var int
     *
     * @ORM\OneToOne(targetEntity="LFDPP\AdminBundle\Entity\Messages", cascade={"persist"})
     * @ORM\Column(name="message", type="integer")
     */
    private $message;


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
     * Set nbrAdlt
     *
     * @param integer $nbrAdlt
     *
     * @return Reservation
     */
    public function setNbrAdlt($nbrAdlt)
    {
        $this->nbrAdlt = $nbrAdlt;

        return $this;
    }

    /**
     * Get nbrAdlt
     *
     * @return int
     */
    public function getNbrAdlt()
    {
        return $this->nbrAdlt;
    }

    /**
     * Set nbrKids
     *
     * @param integer $nbrKids
     *
     * @return Reservation
     */
    public function setNbrKids($nbrKids)
    {
        $this->nbrKids = $nbrKids;

        return $this;
    }

    /**
     * Get nbrKids
     *
     * @return int
     */
    public function getNbrKids()
    {
        return $this->nbrKids;
    }

    /**
     * Set arrival
     *
     * @param \DateTime $arrival
     *
     * @return Reservation
     */
    public function setArrival($arrival)
    {
        $this->arrival = $arrival;

        return $this;
    }

    /**
     * Get arrival
     *
     * @return \DateTime
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * Set departure
     *
     * @param \DateTime $departure
     *
     * @return Reservation
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;

        return $this;
    }

    /**
     * Get departure
     *
     * @return \DateTime
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Reservation
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
     * Set message
     *
     * @param integer $message
     *
     * @return Reservation
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return int
     */
    public function getMessage()
    {
        return $this->message;
    }
}
