<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\ResourceInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Authors
 */
class Author implements ResourceInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var \DateTime
     */
    private $yearBirth;

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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Authors
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Authors
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set yearBirth
     *
     * @param \DateTime $yearBirth
     *
     * @return Authors
     */
    public function setYearBirth($yearBirth)
    {
        $this->yearBirth = $yearBirth;

        return $this;
    }

    /**
     * Get yearBirth
     *
     * @return \DateTime
     */
    public function getYearBirth()
    {
        return $this->yearBirth;
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

    public function __toString()
    {
        return $this->getFirstname() . ' ' . $this->getLastname();
    }

}

