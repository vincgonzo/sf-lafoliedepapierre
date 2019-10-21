<?php

namespace LFDPP\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pages
 *
 * @ORM\Table(name="lilou_pages")
 * @ORM\Entity(repositoryClass="LFDPP\AdminBundle\Repository\PagesRepository")
 */
class Pages
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
     * @ORM\Column(name="name", type="string", length=120, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="title_page", type="string", length=255)
     */
    private $titlePage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="date")
     */
    private $creationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="link_", type="string", length=255)
     */
    private $link;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="textes", type="object")
     */
    private $textes;


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
     * Set name
     *
     * @param string $name
     *
     * @return Pages
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
     * Set titlePage
     *
     * @param string $titlePage
     *
     * @return Pages
     */
    public function setTitlePage($titlePage)
    {
        $this->titlePage = $titlePage;

        return $this;
    }

    /**
     * Get titlePage
     *
     * @return string
     */
    public function getTitlePage()
    {
        return $this->titlePage;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Pages
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
     * Set link
     *
     * @param string $link
     *
     * @return Pages
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set textes
     *
     * @param \stdClass $textes
     *
     * @return Pages
     */
    public function setTextes($textes)
    {
        $this->textes = $textes;

        return $this;
    }

    /**
     * Get textes
     *
     * @return \stdClass
     */
    public function getTextes()
    {
        return $this->textes;
    }
}
