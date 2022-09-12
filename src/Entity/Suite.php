<?php

namespace App\Entity;

use App\Repository\SuiteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuiteRepository::class)]
class Suite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\OneToOne(mappedBy: 'suite', cascade: ['persist', 'remove'])]
    private ?Manager $manager = null;

    #[ORM\ManyToOne(inversedBy: 'suites')]
    private ?Hotel $hotel = null;

    #[ORM\OneToOne(mappedBy: 'suite', cascade: ['persist', 'remove'])]
    private ?PictureList $pictureList = null;

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

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getManager(): ?Manager
    {
        return $this->manager;
    }

    public function setManager(?Manager $manager): self
    {
        // unset the owning side of the relation if necessary
        if ($manager === null && $this->manager !== null) {
            $this->manager->setSuite(null);
        }

        // set the owning side of the relation if necessary
        if ($manager !== null && $manager->getSuite() !== $this) {
            $manager->setSuite($this);
        }

        $this->manager = $manager;

        return $this;
    }

    public function getHotel(): ?Hotel
    {
        return $this->hotel;
    }

    public function setHotel(?Hotel $hotel): self
    {
        $this->hotel = $hotel;

        return $this;
    }

    public function getPictureList(): ?PictureList
    {
        return $this->pictureList;
    }

    public function setPictureList(?PictureList $pictureList): self
    {
        // unset the owning side of the relation if necessary
        if ($pictureList === null && $this->pictureList !== null) {
            $this->pictureList->setSuite(null);
        }

        // set the owning side of the relation if necessary
        if ($pictureList !== null && $pictureList->getSuite() !== $this) {
            $pictureList->setSuite($this);
        }

        $this->pictureList = $pictureList;

        return $this;
    }
}
