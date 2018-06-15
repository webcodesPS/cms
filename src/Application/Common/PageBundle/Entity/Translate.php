<?php

namespace App\Application\Common\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Translate
 */
class Translate
{

    const LOCALE_EN = 'en';
    const LOCALE_PL = 'pl';
    const LOCALE_FR = 'fr';
    const LOCALE_DE = 'de';

    /**
     * @var int
     */
    private $id;

    /**
     * @var \App\Application\Common\PageBundle\Entity\Page
     */
    private $page;

    /**
     * @var string
     */
    private $name;

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
        return $this->name ?: '';
    }

    /**
     * Return frequency list
     *
     * @return array
     */
    public static function getLocaleList(): array
    {
        return [
            self::LOCALE_EN => 'en',
            self::LOCALE_PL => 'pl',
            self::LOCALE_FR => 'fr',
            self::LOCALE_DE => 'de',
        ];
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
     * Set name
     *
     * @param string $name
     * @return Page
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
     * @return Translate
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
