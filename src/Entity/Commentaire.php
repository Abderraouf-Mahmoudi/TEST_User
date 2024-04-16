<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "idComnt", type: "integer", nullable: false)]
    private $idcomnt;

    #[ORM\Column(name: "Contenuec", type: "string", length: 255, nullable: false)]
    private $contenuec;

    #[ORM\Column(name: "date_pubc", type: "date", nullable: false)]
    private $datePubc;

    #[ORM\Column(name: "idU", type: "integer", nullable: false)]
    private $idu;

    #[ORM\ManyToOne(targetEntity: Actualite::class)]
    #[ORM\JoinColumn(name: "idAct", referencedColumnName: "idAct")]
    private $idact;

    public function getIdcomnt(): ?int
    {
        return $this->idcomnt;
    }

    public function getContenuec(): ?string
    {
        return $this->contenuec;
    }

    public function setContenuec(string $contenuec): static
    {
        $this->contenuec = $contenuec;

        return $this;
    }

    public function getDatePubc(): ?\DateTimeInterface
    {
        return $this->datePubc;
    }

    public function setDatePubc(\DateTimeInterface $datePubc): static
    {
        $this->datePubc = $datePubc;

        return $this;
    }

    public function getIdu(): ?int
    {
        return $this->idu;
    }

    public function setIdu(int $idu): static
    {
        $this->idu = $idu;

        return $this;
    }

    public function getIdact(): ?Actualite
    {
        return $this->idact;
    }

    public function setIdact(?Actualite $idact): static
    {
        $this->idact = $idact;

        return $this;
    }
}
