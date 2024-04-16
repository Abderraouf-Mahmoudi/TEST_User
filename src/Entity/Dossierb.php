<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
class Dossierb
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "id_dossier", type: "integer", nullable: false)]
    private $idDossier;

    #[ORM\Column(name: "cin", type: "integer", nullable: false)]
    private $cin;

    #[ORM\Column(name: "nom", type: "string", length: 20, nullable: false)]
    private $nom;

    #[ORM\Column(name: "prenom", type: "string", length: 20, nullable: false)]
    private $prenom;

    #[ORM\Column(name: "region", type: "string", length: 20, nullable: false)]
    private $region;

    #[ORM\Column(name: "date", type: "date", nullable: false)]
    private $date;

    #[ORM\Column(name: "MONTANT", type: "integer", nullable: false)]
    private $montant;

    public function getIdDossier(): ?int
    {
        return $this->idDossier;
    }

    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin(int $cin): static
    {
        $this->cin = $cin;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): static
    {
        $this->region = $region;

        return
        $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): static
    {
        $this->montant = $montant;

        return $this;
    }
}

