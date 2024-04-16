<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "idU", type: "integer", nullable: false)]
    private ?int $idu = null;
    
    #[ORM\Column(name: "nom", type: "string", length: 255, nullable: true, options: ["default" => "NULL"])]
    private ?string $nom = null;

    #[ORM\Column(name: "prenom", type: "string", length: 255, nullable: true, options: ["default" => "NULL"])]
    private ?string $prenom = null;

    #[ORM\Column(name: "DateNaissance", type: Types::DATE_MUTABLE, nullable: true, options: ["default" => null])]
private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\Column(name: "numTel", type: "integer", nullable: true, options: ["default" => "NULL"])]
    private ?int $numTel = null;

    #[ORM\Column(name: "eMAIL", type: "string", length: 255, nullable: true, options: ["default" => "NULL"])]
    private ?string $email = null;

    #[ORM\Column(name: "roles", type: "string", length: 0, nullable: true, options: ["default" => "NULL"])]
    private ?string $roles = null;

    #[ORM\Column(name: "role", type: "string", length: 255, nullable: true)]
    private ?string $role = null;

    #[ORM\Column(name: "imageUser", type: "string", length: 255, nullable: true)]
    private ?string $imageUser = null;

    /**
     * @var string The hashed password
     */
    #[ORM\Column(name: "passwd", type: "string", length: 255, nullable: true, options: ["default" => "NULL"])]
    private ?string $passwd = null;

    #[ORM\Column(nullable: true)]
    private ?bool $status = null;

    public function getIdu(): ?int
    {
        return $this->idu;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }


    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getNumTel(): ?int
    {
        return $this->numTel;
    }

    public function setNumTel(?int $numTel): static
    {
        $this->numTel = $numTel;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;
        return $this;
    }
    
    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        // Always return an array of roles, even if it's just one.
        return [$this->role ?? 'Client'];
    }

    /**
     * Accepts an array of roles, only the first role is considered.
     * The setter is still compatible with Symfony's security component.
     */
    public function setRoles(array $roles): self
    {
        $this->role = !empty($roles) ? $roles[0] : null;
        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->passwd;
    }

    public function setPassword(string $passwd): static
    {
        $this->passwd = $passwd;

        return $this;
    }

    

    public function getImageUser(): ?string
    {
        return $this->imageUser;
    }

    public function setImageUser(string $imageUser): static
    {
        $this->imageUser = $imageUser;

        return $this;
    }





    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): static
    {
        $this->status = $status;

        return $this;
    }
}
