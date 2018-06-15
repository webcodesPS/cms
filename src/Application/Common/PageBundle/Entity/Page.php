<?php

namespace App\Application\Common\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Page
 */
class Page
{
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
    private $slug;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \App\Application\Common\PageBundle\Entity\Translate
     */
    private $translates;

    /**
     * @var \App\Application\Sonata\MediaBundle\Entity\Gallery
     */
    private $galleries;

    public function __construct()
    {
        $this->translates = new ArrayCollection();

        $this->galleries = new ArrayCollection();
    }

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
     * Get name
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Page
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Page
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
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

    /**
     * Add galleries
     *
     * @param \App\Application\Sonata\MediaBundle\Entity\Gallery $galleries
     * @return Gallery
     */
    public function addGalleries(\App\Application\Sonata\MediaBundle\Entity\Gallery $galleries)
    {
        $this->galleries[] = $galleries;

        return $this;
    }

    /**
     * Remove galleries
     *
     * @param \App\Application\Sonata\MediaBundle\Entity\Gallery $galleries
     */
    public function removeGalleries(\App\Application\Sonata\MediaBundle\Entity\Gallery $galleries)
    {
        $this->galleries->removeGallery($galleries);
    }

    /**
     * Get galleries
     *
     * @return \App\Application\Sonata\MediaBundle\Entity\Gallery
     */
    public function getGalleries()
    {
        return $this->galleries;
    }

}
