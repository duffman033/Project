<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;
use Twig\Environment;

/**
 * @ORM\Entity(repositoryClass=ImagesRepository::class)
 */
class Images
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Blogpost", inversedBy="images")
     */
    private $blogpost;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Host", inversedBy="images")
     */
    private $host;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Environnement", inversedBy="images")
     */
    private $environnement;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBlogpost(): ?Blogpost
    {
        return $this->blogpost;
    }

    public function setBlogpost(?Blogpost $blogpost): self
    {
        $this->blogpost = $blogpost;

        return $this;
    }

    public function getHost(): ?Host
    {
        return $this->host;
    }

    public function setHost(?Host $host): self
    {
        $this->host = $host;

        return $this;
    }

    public function getEnvironnement(): ?Environnement
    {
        return $this->environnement;
    }

    public function setEnvironnement(?Environnement $environnement): self
    {
        $this->environnement = $environnement;

        return $this;
    }
}
