<?php

namespace AppBundle\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
/**
 * Libraries
 */
class Library implements ResourceInterface
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
    private $address;

    /**
     * @var Collection|Books[]
     */
    private $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
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
     * @return Libraries
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
     * Set address
     *
     * @param string $address
     *
     * @return Libraries
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return Collection
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    /**
     * @return bool
     */
    public function hasBooks(): bool
    {
        return !$this->books->isEmpty();
    }

    /**
     * var Books
     * @return bool
     */
    public function hasBook(Books $book): bool
    {
        return $this->books->contains($book);
    }

    /**
     * var Books
     * @return void
     */
    public function addBook(Books $book): void
    {
        $this->books->add($book);
    }

    /**
     * var Books
     * @return void
     */
    public function removeImage(Books $book): void
    {
        if ($this->hasBook($book)) {
            $this->books->removeElement($book);
        }
    }
}

