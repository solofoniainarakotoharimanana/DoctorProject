<?php

namespace App\Entity;

use App\Repository\LikeRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\Timestampable;

#[ORM\Entity(repositoryClass: LikeRepository::class)]
#[ORM\Table(name: '`like`')]
class Like
{
    use Timestampable;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $isLike = null;

    #[ORM\ManyToOne(inversedBy: 'likes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $patient = null;

    #[ORM\ManyToOne(inversedBy: 'likes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $pratitionner = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isLike(): ?bool
    {
        return $this->isLike;
    }

    public function setLike(bool $isLike): static
    {
        $this->isLike = $isLike;

        return $this;
    }

    public function getPatient(): ?User
    {
        return $this->patient;
    }

    public function setPatient(?User $patient): static
    {
        $this->patient = $patient;

        return $this;
    }

    public function getPratitionner(): ?User
    {
        return $this->pratitionner;
    }

    public function setPratitionner(?User $pratitionner): static
    {
        $this->pratitionner = $pratitionner;

        return $this;
    }
}
