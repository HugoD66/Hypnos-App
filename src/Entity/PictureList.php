<?php

namespace App\Entity;

use App\Repository\PictureListRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\FormTypeInterface;

#[ORM\Entity(repositoryClass: PictureListRepository::class)]
class PictureList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pic_one = null;

    #[ORM\Column(length: 255)]
    private ?string $pic_two = null;

    #[ORM\Column(length: 255)]
    private ?string $pic_three = null;

    #[ORM\OneToOne(inversedBy: 'pictureList', cascade: ['persist', 'remove'])]
    private ?Suite $suite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicOne(): ?string
    {
        return $this->pic_one;
    }

    public function setPicOne(string $pic_one): self
    {
        $this->pic_one = $pic_one;

        return $this;
    }

    public function getPicTwo(): ?string
    {
        return $this->pic_two;
    }

    public function setPicTwo(string $pic_two): self
    {
        $this->pic_two = $pic_two;

        return $this;
    }

    public function getPicThree(): ?string
    {
        return $this->pic_three;
    }

    public function setPicThree(string $pic_three): self
    {
        $this->pic_three = $pic_three;

        return $this;
    }

    public function getSuite(): ?Suite
    {
        return $this->suite;
    }

    public function setSuite(?Suite $suite): self
    {
        $this->suite = $suite;

        return $this;
    }
}
