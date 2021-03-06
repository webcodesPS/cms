<?php

namespace App\Application\Common\PageBundle\Entity;

use App\Application\Sonata\MediaBundle\Entity\Gallery;
use Doctrine\Common\Collections\Collection;
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
     * @var \App\Application\Common\PageBundle\Entity\Menu
     */
    private $menus;

    /**
     * @var \App\Application\Common\PageBundle\Entity\TranslatePage
     */
    private $translates;

    /**
     * @var \App\Application\Sonata\MediaBundle\Entity\Gallery
     */
    private $galleries;

    public function __construct()
    {
        $this->menus = new ArrayCollection();
        
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
     * Set menu
     *
     * @param array $menus
     * @return Menus
     */
    public function setMenu($menus)
    {
        $this->menus = $menus;

        return $this;
    }

    /**
     * Get menus
     *
     * @return string
     */
    public function getMenu()
    {
        return $this->menus;
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

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection|Menu[]
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menus->contains($menu)) {
            $this->menus[] = $menu;
            $menu->setPage($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menus->contains($menu)) {
            $this->menus->removeElement($menu);
            // set the owning side to null (unless already changed)
            if ($menu->getPage() === $this) {
                $menu->setPage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TranslatePage[]
     */
    public function getTranslates(): Collection
    {
        return $this->translates;
    }

    public function addTranslate(TranslatePage $translate): self
    {
        if (!$this->translates->contains($translate)) {
            $this->translates[] = $translate;
            $translate->setPage($this);
        }

        return $this;
    }

    public function removeTranslate(TranslatePage $translate): self
    {
        if ($this->translates->contains($translate)) {
            $this->translates->removeElement($translate);
            // set the owning side to null (unless already changed)
            if ($translate->getPage() === $this) {
                $translate->setPage(null);
            }
        }

        return $this;
    }

    public function addGallery(Gallery $gallery): self
    {
        if (!$this->galleries->contains($gallery)) {
            $this->galleries[] = $gallery;
        }

        return $this;
    }

    public function removeGallery(Gallery $gallery): self
    {
        if ($this->galleries->contains($gallery)) {
            $this->galleries->removeElement($gallery);
        }

        return $this;
    }

}
