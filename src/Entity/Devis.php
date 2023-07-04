<?php

namespace App\Entity;

use App\Entity\Client;
use App\Repository\DevisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DevisRepository::class)]
class Devis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'Devis')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $idClient = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $siteEcom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $siret = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $siteCustom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $maintenance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $identiteVisuelle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $print = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $shooting = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSiteEcom(): ?string
    {
        return $this->siteEcom;
    }

    public function setSiteEcom(?string $siteEcom): static
    {
        $this->siteEcom = $siteEcom;

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

    public function getSiteCustom(): ?string
    {
        return $this->siteCustom;
    }

    public function setSiteCustom(?string $siteCustom): static
    {
        $this->siteCustom = $siteCustom;

        return $this;
    }

    public function getMaintenance(): ?string
    {
        return $this->maintenance;
    }

    public function setMaintenance(?string $maintenance): static
    {
        $this->maintenance = $maintenance;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getIdentiteVisuelle(): ?string
    {
        return $this->identiteVisuelle;
    }

    public function setIdentiteVisuelle(?string $identiteVisuelle): static
    {
        $this->identiteVisuelle = $identiteVisuelle;

        return $this;
    }

    public function getPrint(): ?string
    {
        return $this->print;
    }

    public function setPrint(?string $print): static
    {
        $this->print = $print;

        return $this;
    }

    public function getShooting(): ?string
    {
        return $this->shooting;
    }

    public function setShooting(?string $shooting): static
    {
        $this->shooting = $shooting;

        return $this;
    }
}
