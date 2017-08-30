<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\bookRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @Assert\NotBlank (message="Le titre ne peut être vide")
     * @Assert\Length(min="3", max="80",
     *      minMessage="Le titre doit comporter plus de {{limit}}",
     *      maxMessage="le titre doit comporter moins de {{limit}}")
     * @ORM\Column(name="title", type="string", length=80)
     */
    private $title;

    /**
     * @var DateTime
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var DateTime
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;



    /**
     * @var string
     * @Assert\Range(min="2", max="80",
     *      invalidMessage="le prix doit etre compris entre {{min}} et {{max}}")
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
     * @Assert\Count(min="1", max="4")
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

    /**
     * @ORM\PrePersist()
     */
    public function prePersistEvent(){
        $this->createdAt= new \DateTime();
        $this->updatedAt=new  \DateTime();


    }
}
