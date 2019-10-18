<?php

namespace LFDPP\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PriceType
 *
 * @ORM\Table(name="price_type")
 * @ORM\Entity(repositoryClass="LFDPP\AdminBundle\Repository\PriceTypeRepository")
 */
class PriceType
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
     * @ORM\Column(name="type", type="string", length=50, unique=true)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="days", type="integer")
     */
    private $days;


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
     * Set type
     *
     * @param string $type
     *
     * @return PriceType
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set days
     *
     * @param integer $days
     *
     * @return PriceType
     */
    public function setDays($days)
    {
        $this->days = $days;

        return $this;
    }

    /**
     * Get days
     *
     * @return int
     */
    public function getDays()
    {
        return $this->days;
    }
}

