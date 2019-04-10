<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="text", length=500)
     */
    private $description;

    /**
     * @ORM\Column(type="text", length=500)
     */
    private $tags;

    /**
     * @ORM\Column(type="text", length=500, nullable=true)
     */
    private $imgURL;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creationDate;

    // Getter & Setter
    public function getId()
    {
        return $this->id;
    }

    public function getImgURL()
    {
        return $this->imgURL;
    }
    public function setImgURL($imgURL)
    {
        $this->imgURL = $imgURL;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getTags()
    {
        return $this->tags;
    }
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }
}
