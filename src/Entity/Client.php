<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $username = null;

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\OneToMany(mappedBy: 'idClient', targetEntity: InfoLegalClient::class)]
    private Collection $idInfoLegalClient;

    public function __construct()
    {
        $this->idInfoLegalClient = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        // Retournez les rôles de l'utilisateur sous forme de tableau
        return ['ROLE_USER'];
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, InfoLegalClient>
     */
    public function getIdInfoLegalClient(): Collection
    {
        return $this->idInfoLegalClient;
    }

    public function addIdInfoLegalClient(InfoLegalClient $idInfoLegalClient): static
    {
        if (!$this->idInfoLegalClient->contains($idInfoLegalClient)) {
            $this->idInfoLegalClient->add($idInfoLegalClient);
            $idInfoLegalClient->setIdClient($this);
        }

        return $this;
    }

    public function removeIdInfoLegalClient(InfoLegalClient $idInfoLegalClient): static
    {
        if ($this->idInfoLegalClient->removeElement($idInfoLegalClient)) {
            // set the owning side to null (unless already changed)
            if ($idInfoLegalClient->getIdClient() === $this) {
                $idInfoLegalClient->setIdClient(null);
            }
        }

        return $this;
    }
}
