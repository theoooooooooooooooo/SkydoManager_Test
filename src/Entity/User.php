<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface,  PasswordAuthenticatedUserInterface
{
    #[ORM\Id] 
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $username = null;

    #[ORM\Column]
    private ?string $password = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getRoles(): array
    {
        // Retournez les rôles de l'utilisateur sous forme de tableau
        return ['ROLE_ADMIN'];
    }

    public function getSalt(): ?string
    {
        // Cette méthode est nécessaire lorsque vous utilisez l'algorithme de hachage "bcrypt" pour les mots de passe.
        // Vous pouvez laisser cette méthode vide si vous utilisez un autre algorithme.
        return null;
    }

    public function eraseCredentials()
    {
        // Cette méthode est requise par l'interface UserInterface.
        // Vous pouvez laisser cette méthode vide si vous n'avez pas besoin de supprimer les informations sensibles de l'utilisateur.
    }

    public function getUserIdentifier(): string
{
    return $this->getUsername();
}

}
