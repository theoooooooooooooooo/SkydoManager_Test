<?php

namespace App\Entity;

use App\Entity\Client;
use App\Repository\InfoLegalClientRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InfoLegalClientRepository::class)]
class InfoLegalClient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name:"raison_social", length:255)]
    private ?string $raisonSociale = null;

    #[ORM\Column(length: 14)]
    private ?string $siret = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $urlSite = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 20)]
    private ?string $telephone = null;

    #[ORM\ManyToOne(inversedBy: 'idInfoLegalClient')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $idClient = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NomSite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $DirecteurPublication = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $MoyenContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ModePaiement = null;

    #[ORM\Column(length: 255)]
    private ?string $JoursHoraire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $delaisLivraison = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->raisonSociale;
    }

    public function setRaisonSociale(?string $raisonSociale): static
    {
        $this->raisonSociale = $raisonSociale;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): static
    {
        $this->siret = $siret;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getUrlSite(): ?string
    {
        return $this->urlSite;
    }

    public function setUrlSite(?string $urlSite): static
    {
        $this->urlSite = $urlSite;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getIdClient(): ?Client
    {
        return $this->idClient;
    }

    public function setIdClient(?Client $idClient): static
    {
        $this->idClient = $idClient;

        return $this;
    }

    public function getNomSite(): ?string
    {
        return $this->NomSite;
    }

    public function setNomSite(?string $NomSite): static
    {
        $this->NomSite = $NomSite;

        return $this;
    }

    public function getDirecteurPublication(): ?string
    {
        return $this->DirecteurPublication;
    }

    public function setDirecteurPublication(?string $DirecteurPublication): static
    {
        $this->DirecteurPublication = $DirecteurPublication;

        return $this;
    }

    public function getMoyenContact(): ?string
    {
        return $this->MoyenContact;
    }

    public function setMoyenContact(?string $MoyenContact): static
    {
        $this->MoyenContact = $MoyenContact;

        return $this;
    }

    public function getModePaiement(): ?string
    {
        return $this->ModePaiement;
    }

    public function setModePaiement(?string $ModePaiement): static
    {
        $this->ModePaiement = $ModePaiement;

        return $this;
    }

    public function getJoursHoraire(): ?string
    {
        return $this->JoursHoraire;
    }

    public function setJoursHoraire(string $JoursHoraire): static
    {
        $this->JoursHoraire = $JoursHoraire;

        return $this;
    }

    public function getDelaisLivraison(): ?string
    {
        return $this->delaisLivraison;
    }

    public function setDelaisLivraison(?string $delaisLivraison): static
    {
        $this->delaisLivraison = $delaisLivraison;

        return $this;
    }
}
