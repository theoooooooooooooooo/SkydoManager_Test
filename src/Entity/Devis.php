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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prixEcom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prixVitrine = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prixCustom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prixMaintenance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prixLogo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prixIdVisuelle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prixPrint = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prixShooting = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $quantiteEcom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $quantiteVitrine = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $quantiteCustom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $quantiteMaintenance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $quantiteLogo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $quantiteIdVisuelle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $quantitePrint = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $quantiteShooting = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prixTotal = null;

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
        return $this->print;
    }

    public function setShooting(?string $shooting): static
    {
        $this->shooting = $shooting;

        return $this;
    }

//Prix

    public function getPrixEcom(): ?int
    {
        return $this->prixEcom !== null ? (int) $this->prixEcom : null;
    }

    public function setPrixEcom(?int $prixEcom): static
    {
        $this->prixEcom = $prixEcom !== null ? (string) $prixEcom : null;

        return $this;
    }

    public function getPrixVitrine(): ?int
    {
        return $this->prixVitrine !== null ? (int) $this->prixVitrine : null;
    }

    public function setPrixVitrine(?int $prixVitrine): static
    {
        $this->prixVitrine = $prixVitrine !== null ? (string) $prixVitrine : null;

        return $this;
    }

    public function getPrixCustom(): ?int
    {
        return $this->prixCustom !== null ? (int) $this->prixCustom : null;
    }

    public function setPrixCustom(?int $prixCustom): static
    {
        $this->prixCustom = $prixCustom !== null ? (string) $prixCustom : null;

        return $this;
    }

    public function getPrixMaintenance(): ?int
    {
        return $this->prixMaintenance !== null ? (int) $this->prixMaintenance : null;
    }

    public function setPrixMaintenance(?int $prixMaintenance): static
    {
        $this->prixMaintenance = $prixMaintenance !== null ? (string) $prixMaintenance : null;

        return $this;
    }

    public function getPrixLogo(): ?int
    {
        return $this->prixLogo !== null ? (int) $this->prixLogo : null;
    }

    public function setPrixLogo(?int $prixLogo): static
    {
        $this->prixLogo = $prixLogo !== null ? (string) $prixLogo : null;

        return $this;
    }

    public function getPrixIdVisuelle(): ?int
    {
        return $this->prixIdVisuelle !== null ? (int) $this->prixIdVisuelle : null;
    }

    public function setPrixIdVisuelle(?int $prixIdVisuelle): static
    {
        $this->prixIdVisuelle = $prixIdVisuelle !== null ? (string) $prixIdVisuelle : null;

        return $this;
    }

    public function getPrixPrint(): ?int
    {
        return $this->prixPrint !== null ? (int) $this->prixPrint : null;
    }

    public function setPrixPrint(?int $prixPrint): static
    {
        $this->prixPrint = $prixPrint !== null ? (string) $prixPrint : null;

        return $this;
    }

    public function getPrixShooting(): ?int
    {
        return $this->prixShooting !== null ? (int) $this->prixShooting : null;
    }

    public function setPrixShooting(?int $prixShooting): static
    {
        $this->prixShooting = $prixShooting !== null ? (string) $prixShooting : null;

        return $this;
    }

    public function getPrixTotal(): ?string
    {
        return $this->prixTotal;
    }

    public function setPrixTotal(?string $prixTotal): static
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    //Quantite

    public function getQuantiteEcom(): ?string
    {
        return $this->quantiteEcom;
    }

    public function setQuantiteEcom(?string $quantiteEcom): static
    {
        $this->quantiteEcom = $quantiteEcom;

        return $this;
    }

    public function getQuantiteVitrine(): ?string
    {
        return $this->quantiteVitrine;
    }

    public function setQuantiteVitrine(?string $quantiteVitrine): static
    {
        $this->quantiteVitrine = $quantiteVitrine;

        return $this;
    }
    
    public function getQuantiteCustom(): ?string
    {
        return $this->quantiteCustom;
    }

    public function setQuantiteCustom(?string $quantiteCustom): static
    {
        $this->quantiteCustom = $quantiteCustom;

        return $this;
    }

    public function getQuantiteMaintenance(): ?string
    {
        return $this->quantiteMaintenance;
    }

    public function setQuantiteMaintenance(?string $quantiteMaintenance): static
    {
        $this->quantiteMaintenance = $quantiteMaintenance;

        return $this;
    }

    public function getQuantiteLogo(): ?string
    {
        return $this->quantiteLogo;
    }

    public function setQuantiteLogo(?string $quantiteLogo): static
    {
        $this->quantiteLogo = $quantiteLogo;

        return $this;
    }

    public function getQuantiteIdVisuelle(): ?string
    {
        return $this->quantiteIdVisuelle;
    }

    public function setQuantiteIdVisuelle(?string $quantiteIdVisuelle): static
    {
        $this->quantiteIdVisuelle = $quantiteIdVisuelle;

        return $this;
    }

    public function getQuantitePrint(): ?string
    {
        return $this->quantitePrint;
    }

    public function setQuantitePrint(?string $quantitePrint): static
    {
        $this->quantitePrint = $quantitePrint;

        return $this;
    }

    public function getQuantiteShooting(): ?string
    {
        return $this->quantiteShooting;
    }

    public function setQuantiteShooting(?string $quantiteShooting): static
    {
        $this->quantiteShooting = $quantiteShooting;

        return $this;
    }

}
