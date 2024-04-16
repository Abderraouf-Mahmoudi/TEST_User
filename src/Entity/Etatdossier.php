<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
class Etatdossier
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "id_etat", type: "integer", nullable: false)]
    private $idEtat;

    #[ORM\Column(name: "etat", type: "string", length: 50, nullable: false)]
    private $etat;

    #[ORM\Column(name: "id_dossier", type: "integer", nullable: true, options: ["default" => "NULL"])]
    private $idDossier = NULL;

    public function getIdEtat(): ?int
    {
        return $this->idEtat;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getIdDossier(): ?int
    {
        return $this->idDossier;
    }

    public function setIdDossier(?int $idDossier): static
    {
        $this->idDossier = $idDossier;

        return $this;
    }
}
