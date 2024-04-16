<?php

namespace App\Entity;

use App\Repository\ReponseReclamationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReponseReclamationRepository::class)
 */

 #[ORM\Entity]
 #[ORM\Table(name: "reponsereclamation")]
class ReponseReclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "idReponseR", type: "integer", nullable: false)]
    private ?int $idReponseR;

    #[ORM\Column(name: "contenuReponse", type: "string", length: 255, nullable: false)]
    private ?string $contenuReponse;

    #[ORM\Column(name: "DateReponseR", type: "date", nullable: false)]
    private ?\DateTimeInterface $dateReponseR;

    #[ORM\ManyToOne(targetEntity: Reclamation::class)]
    #[ORM\JoinColumn(name: "idR", referencedColumnName: "idR")]
    private ?Reclamation $reclamation;

    public function getIdreponser(): ?int
    {
        return $this->idReponseR;
    }

    public function getContenureponse(): ?string
    {
        return $this->contenuReponse;
    }

    public function setContenureponse(?string $contenureponse): self
    {
        $this->contenuReponse = $contenureponse;

        return $this;
    }

    public function getDatereponser(): ?\DateTimeInterface
    {
        return $this->dateReponseR;
    }

    public function setDatereponser(?\DateTimeInterface $datereponser): self
    {
        $this->dateReponseR = $datereponser;

        return $this;
    }

    public function getReclamation(): ?Reclamation
    {
        return $this->reclamation;
    }

    public function setReclamation(?Reclamation $reclamation): self
    {
        $this->reclamation = $reclamation;

        return $this;
    }
}

