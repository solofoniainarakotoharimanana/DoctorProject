<?php

namespace App\Entity;

use App\Repository\AppointmentRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\Timestampable;

#[ORM\Entity(repositoryClass: AppointmentRepository::class)]
class Appointment
{
    use Timestampable;
    

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $reason = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $ApppointmentDate = null;

    #[ORM\Column(length: 255)]
    private ?string $hourly = null;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    private ?User $pratitioner = null;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    private ?User $patient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }

    public function getApppointmentDate(): ?\DateTimeImmutable
    {
        return $this->ApppointmentDate;
    }

    public function setApppointmentDate(\DateTimeImmutable $ApppointmentDate): static
    {
        $this->ApppointmentDate = $ApppointmentDate;

        return $this;
    }

    public function getHourly(): ?string
    {
        return $this->hourly;
    }

    public function setHourly(string $hourly): static
    {
        $this->hourly = $hourly;

        return $this;
    }

    public function getPratitioner(): ?User
    {
        return $this->pratitioner;
    }

    public function setPratitioner(?User $pratitioner): static
    {
        $this->pratitioner = $pratitioner;

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
}
