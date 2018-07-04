<?php

namespace App\Application\Common\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TranslateMenu
 */
class TranslateMenu
{

    /**
     * @var int
     */
    private $id;

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
     * @var \App\Application\Common\PageBundle\Entity\Menu
     */
    private $menu;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var string
     */
    private $translate;

    /**
     * Represent object as string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->translate ?: '';
    }

    /**
     * Set menu
     *
     * @param \App\Application\Common\PageBundle\Entity\Menu $menu
     * @return Menu
     */
    public function setMenu(\App\Application\Common\PageBundle\Entity\Menu $menu = null)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return \App\Application\Common\PageBundle\Entity\Menu
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return Locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }
    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set translate
     *
     * @param string $translate
     * @return TranslateMenu
     */
    public function setTranslate($translate)
    {
        $this->translate = $translate;

        return $this;
    }

    /**
     * Get translate
     *
     * @return string
     */
    public function getTranslate()
    {
        return $this->translate;
    }

}
