<?php

namespace LFDPP\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PagesTexte
 *
 * @ORM\Table(name="lilou_pages_texte")
 * @ORM\Entity(repositoryClass="LFDPP\AdminBundle\Repository\PagesTexteRepository")
 */
class PagesTexte
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
     * @ORM\ManyToOne(targetEntity="LFDPP\AdminBundle\Entity\Pages", cascade={"persist"})
     * @ORM\Column(name="page_id", type="integer", unique=true)
     * @ORM\JoinColumn(nullable=false)
     */
    private $pageId;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=180)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="text")
     */
    private $texte;

    /**
     * @var int
     *
     * @ORM\OneToOne(targetEntity="LFDPP\AdminBundle\Entity\Lang", cascade={"persist"})
     * @ORM\Column(name="lang_id", type="integer", unique=true)
     * @ORM\JoinColumn(nullable=false)
     */
    private $langId;


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
     * Set pageId
     *
     * @param integer $pageId
     *
     * @return PagesTexte
     */
    public function setPageId($pageId)
    {
        $this->pageId = $pageId;

        return $this;
    }

    /**
     * Get pageId
     *
     * @return int
     */
    public function getPageId()
    {
        return $this->pageId;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return PagesTexte
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set texte
     *
     * @param string $texte
     *
     * @return PagesTexte
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set langId
     *
     * @param integer $langId
     *
     * @return PagesTexte
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
