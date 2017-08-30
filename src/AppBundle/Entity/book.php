<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\bookRepository")
 */
class book
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=80)
     */
    private $title;



    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=4, scale=2)
     */
    private $price;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publishedAt", type="date")
     */
    private $publishedAt;

    /**
     * @var  Publisher
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Publisher", inversedBy="books", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $publisher;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Author", inversedBy="books", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $authors;

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
     * @return book
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
     * Set price
     *
     * @param string $price
     *
     * @return book
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set publishedAt
     *
     * @param \DateTime $publishedAt
     *
     * @return book
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    /**
     * Get publishedAt
     *
     * @return \DateTime
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * Set publisher
     *
     * @param \AppBundle\Entity\Publisher $publisher
     *
     * @return book
     */
    public function setPublisher(\AppBundle\Entity\Publisher $publisher)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher
     *
     * @return \AppBundle\Entity\Publisher
     */
    public function getPublisher()
    {
        return $this->publisher;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->authors = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add author
     *
     * @param \AppBundle\Entity\Author $author
     *
     * @return book
     */
    public function addAuthor(\AppBundle\Entity\Author $author)
    {
        $this->authors[] = $author;

        return $this;
    }

    /**
     * Remove author
     *
     * @param \AppBundle\Entity\Author $author
     */
    public function removeAuthor(\AppBundle\Entity\Author $author)
    {
        $this->authors->removeElement($author);
    }

    /**
     * Get authors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAuthors()
    {
        return $this->authors;
    }
}
