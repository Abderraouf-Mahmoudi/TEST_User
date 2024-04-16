<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Arrivage
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "idA", type: "integer", nullable: false)]
    private ?int $ida = null;

    #[ORM\Column(name: "quantite", type: "integer", nullable: true)]
    private ?int $quantite = null;

    #[ORM\Column(name: "dateEntree", type: "date", nullable: true)]
    private ?\DateTimeInterface $dateentree = null;

    #[ORM\ManyToOne(targetEntity: Voiture::class)]
    #[ORM\JoinColumn(name: "idV", referencedColumnName: "idv")]
    private ?Voiture $idv = null;

    public function getIda(): ?int
    {
        return $this->ida;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getDateentree(): ?\DateTimeInterface
    {
        return $this->dateentree;
    }

    public function setDateentree(?\DateTimeInterface $dateentree): static
    {
        $this->dateentree = $dateentree;

        return $this;
    }

    public function getIdv(): ?Voiture
    {
        return $this->idv;
    }

    public function setIdv(?Voiture $idv): static
    {
        $this->idv = $idv;

        return $this;
    }
}
