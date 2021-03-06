<?php

namespace App\Application\Common\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Menu
 */
class Menu
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $parent;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \App\Application\Common\PageBundle\Entity\Page
     */
    private $page;

    /**
     * @var \App\Application\Common\PageBundle\Entity\TranslateMenu
     */
    private $translates;

    public function __construct()
    {
        $this->translates = new ArrayCollection();
    }

    /**
     * Represent object as string
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->name ?: '';
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
     * Set parent
     *
     * @param Menu $parent
     *
     * @return Menu
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return Parent
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Menu
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
     * Set page
     *
     * @param \App\Application\Common\PageBundle\Entity\Page $page
     * @return Page
     */
    public function setPage(\App\Application\Common\PageBundle\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \App\Application\Common\PageBundle\Entity\Page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set translate
     *
     * @param array $translates
     * @return Translates
     */
    public function setTranslate($translates)
    {
        $this->translates = $translates;

        return $this;
    }

    /**
     * Get translates
     *
     * @return string
     */
    public function getTranslate()
    {
        return $this->translates;
    }

}