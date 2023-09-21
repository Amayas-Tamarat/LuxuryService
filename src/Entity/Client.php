<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $companieName = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $typeActivity = null;

    #[ORM\Column(length: 255)]
    private ?string $contactName = null;

    #[ORM\Column(length: 255)]
    private ?string $position = null;

    #[ORM\Column]
    private ?int $numContact = null;

    #[ORM\Column(length: 255)]
    private ?string $emailContact = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $note = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanieName(): ?string
    {
        return $this->companieName;
    }

    public function setCompanieName(string $companieName): static
    {
        $this->companieName = $companieName;

        return $this;
    }

    public function getTypeActivity(): ?string
    {
        return $this->typeActivity;
    }

    public function setTypeActivity(string $typeActivity): static
    {
        $this->typeActivity = $typeActivity;

        return $this;
    }

    public function getContactName(): ?string
    {
        return $this->contactName;
    }

    public function setContactName(string $contactName): static
    {
        $this->contactName = $contactName;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getNumContact(): ?int
    {
        return $this->numContact;
    }

    public function setNumContact(int $numContact): static
    {
        $this->numContact = $numContact;

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->emailContact;
    }

    public function setEmailContact(string $emailContact): static
    {
        $this->emailContact = $emailContact;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): static
    {
        $this->note = $note;

        return $this;
    }
}
