<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;
use Doctrine\ORM\Mapping\Annotation;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\NamedArgumentConstructor;
use Doctrine\ORM\Mapping\Target;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Validator\Constraints\CssColor;


#[ORM\Entity]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "idR", type: "integer", nullable: false)]
    private ?int $idr = null;

    #[ORM\Column(name: "sujet", type: "string", length: 255, nullable: false)]
    #[Assert\NotBlank(message:" Remplissez le champ du sujet, s'il vous plaît.")]
    private ?string $sujet = null;

    #[ORM\Column(name: "description", type: "text", length: 65535, nullable: false)]
    #[Assert\NotBlank(message:"Remplissez le champ de description, s'il vous plaît.")]
    private ?string $description = null;

    #[ORM\Column(name: "dateReclamation", type: "date", nullable: false)]
    private ?\DateTimeInterface $dateReclamation = null;

    #[ORM\Column(name: "emailUser", type: "string", length: 255, nullable: false)]
    #[Assert\NotBlank(message:"remplir le champ d'email' s'il vous plait")]
    #[Assert\Email(message:"Le format de l'email est invalide.")]
    private ?string $emailUser = null;

   
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'idU', referencedColumnName: 'idU')]
    private ?User $user = null;



    public function getIdr(): ?int
    {
        return $this->idr;
    }

    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): static
    {
        $this->sujet = $sujet;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDateReclamation(): ?\DateTimeInterface
    {
        return $this->dateReclamation;
    }

    public function setDateReclamation(\DateTimeInterface $dateReclamation): static
    {
        $this->dateReclamation = $dateReclamation;

        return $this;
    }

    public function getEmailUser(): ?string
    {
        return $this->emailUser;
    }

    public function setEmailUser(string $emailUser): static
    {
        $this->emailUser = $emailUser;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}