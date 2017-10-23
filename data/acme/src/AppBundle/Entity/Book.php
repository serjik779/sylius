<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * Books
 */
class Book implements ResourceInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $yearIssue;

    /**
     * @var Collection|Authors[]
     */
    private $authors;

    /**
     * @var Collection|Libraries[]
     */
    private $libraries;

    public function __construct()
    {
        $this->libraries = new ArrayCollection();
        $this->authors = new ArrayCollection();
    }

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
     * Set title
     *
     * @param string $title
     *
     * @return Books
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Books
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

    /**
     * Set yearIssue
     *
     * @param \DateTime $yearIssue
     *
     * @return Books
     */
    public function setYearIssue($yearIssue)
    {
        $this->yearIssue = $yearIssue;

        return $this;
    }

    /**
     * Get yearIssue
     *
     * @return \DateTime
     */
    public function getYearIssue()
    {
        return $this->yearIssue;
    }

    /**
     * @return Collection
     */
    public function getAuthors(): Collection
    {
        return $this->authors;
    }

    /**
     * @return bool
     */
    public function hasAuthors(): bool
    {
        return !$this->authors->isEmpty();
    }

    /**
     * var Authors
     * @return bool
     */
    public function hasAuthor(Authors $author): bool
    {
        return $this->authors->contains($author);
    }

    /**
     * var Authors
     * @return void
     */
    public function addAuthor(Authors $author): void
    {
        if (!$this->hasAuthor($author)) {
            $this->authors->add($author);
        }
    }

    /**
     * var Author
     * @return void
     */
    public function removeAuthor(Authors $author): void
    {
        if ($this->hasAuthor($author)) {
            $this->authors->removeElement($author);
        }
    }

    /**
     * @return Collection
     */
    public function getLibraries(): Collection
    {
        return $this->libraries;
    }

    /**
     * @return bool
     */
    public function hasLibraries(): bool
    {
        return !$this->libraries->isEmpty();
    }

    /**
     * var Libraries
     * @return bool
     */
    public function hasLibrary(Libraries $library): bool
    {
        return $this->libraries->contains($library);
    }

    /**
     * var Libraries
     * @return void
     */
    public function addLibrary(Libraries $library): void
    {
        $this->libraries->add($library);
    }

    /**
     * var Libraries
     * @return void
     */
    public function removeLibrary(Libraries $library): void
    {
        if ($this->hasLibrary($library)) {
            $this->libraries->removeElement($library);
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getTitle()?: '';
    }
}

