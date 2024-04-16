<?php

namespace App\Entity;

use App\Repository\MessagerieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass:MessagerieRepository::class)]
class Messagerie
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "idMessage", type: "integer", nullable: false)]
    private ?int $idmessage;

    #[ORM\Column(name: "contenu", type: "string", length: 255, nullable: false)]
    private ?string $contenu;

    #[ORM\Column(name: "dateEnvoie", type: "date", nullable: false)]
    private ?\DateTimeInterface $dateenvoie;

    #[ORM\Column(name: "vu", type: "boolean", nullable: false)]
    private bool $vu;

    #[ORM\Column(name: "deleted", type: "boolean", nullable: false)]
    private bool $deleted;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "Sender", referencedColumnName: "idU")]
    private ?User $sender;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "Receiver", referencedColumnName: "idU")]
    private ?User $receiver;

    public function getIdmessage(): ?int
    {
        return $this->idmessage;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDateenvoie(): ?\DateTimeInterface
    {
        return $this->dateenvoie;
    }

    public function setDateenvoie(\DateTimeInterface $dateenvoie): static
    {
        $this->dateenvoie = $dateenvoie;

        return $this;
    }

    public function isVu(): ?bool
    {
        return $this->vu;
    }

    public function setVu(bool $vu): static
    {
        $this->vu = $vu;

        return $this;
    }

    public function isDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): static
    {
        $this->deleted = $deleted;

        return $this;
    }

    public function getSender(): ?User
    {
        return $this->sender;
    }

    public function setSender(?User $sender): static
    {
        $this->sender = $sender;

        return $this;
    }

    public function getReceiver(): ?User
    {
        return $this->receiver;
    }

    public function setReceiver(?User $receiver): static
    {
        $this->receiver = $receiver;

        return $this;
    }
}
