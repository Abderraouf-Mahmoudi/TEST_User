<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name: "actualite")]
#[ORM\Entity]
class Actualite
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "idAct", type: "integer", nullable: false)]
    private ?int $idact = null;

    #[ORM\Column(name: "titre", type: "string", length: 255, nullable: false)]
    private ?string $titre = null;

    #[ORM\Column(name: "image", type: "string", length: 255, nullable: false)]
    private ?string $image = null;

    #[ORM\Column(name: "rating", type: "float", precision: 10, scale: 0, nullable: false)]
    private ?float $rating = null;

    #[ORM\Column(name: "contenue", type: "string", length: 255, nullable: false)]
    private ?string $contenue = null;

    #[ORM\Column(name: "date_pub", type: "date", nullable: false)]
    private ?\DateTimeInterface $datePub = null;

    public function getIdact(): ?int
    {
        return $this->idact;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(float $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getContenue(): ?string
    {
        return $this->contenue;
    }

    public function setContenue(string $contenue): static
    {
        $this->contenue = $contenue;

        return $this;
    }

    public function getDatePub(): ?\DateTimeInterface
    {
        return $this->datePub;
    }

    public function setDatePub(\DateTimeInterface $datePub): static
    {
        $this->datePub = $datePub;

        return $this;
    }
}
