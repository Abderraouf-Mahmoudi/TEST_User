<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
class Reponse
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "idR", type: "integer", nullable: false)]
    private $idr;

    #[ORM\Column(name: "Date_Rep", type: "date", nullable: false)]
    private $dateRep;

    #[ORM\Column(name: "ContenueR", type: "string", length: 255, nullable: false)]
    private $contenuer;

    #[ORM\Column(name: "idComnt", type: "integer", nullable: true, options: ["default" => "NULL"])]
    private $idcomnt = NULL;

    #[ORM\Column(name: "idU", type: "integer", nullable: false)]
    private $idu;

    public function getIdr(): ?int
    {
        return $this->idr;
    }

    public function getDateRep(): ?\DateTimeInterface
    {
        return $this->dateRep;
    }

    public function setDateRep(\DateTimeInterface $dateRep): static
    {
        $this->dateRep = $dateRep;

        return $this;
    }

    public function getContenuer(): ?string
    {
        return $this->contenuer;
    }

    public function setContenuer(string $contenuer): static
    {
        $this->contenuer = $contenuer;

        return $this;
    }

    public function getIdcomnt(): ?int
    {
        return $this->idcomnt;
    }

    public function setIdcomnt(?int $idcomnt): static
    {
        $this->idcomnt = $idcomnt;

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
}
