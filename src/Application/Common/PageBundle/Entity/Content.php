<?php

namespace App\Application\Common\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Content
 */
class Content
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
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var \App\Application\Common\PageBundle\Entity\Page
     */
    private $page;

    /**
     * @var string
     */
    private $description;

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
     * Set description
     *
     * @param string $description
     * @return Page
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

}
