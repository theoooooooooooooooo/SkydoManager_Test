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

    public function getPrixEcom(): ?string
    {
        return $this->prixEcom;
    }

    public function setPrixEcom(?string $prixEcom): static
    {
        $this->prixEcom = $prixEcom;

        return $this;
    }

    public function getPrixVitrine(): ?string
    {
        return $this->prixVitrine;
    }

    public function setPrixVitrine(?string $prixVitrine): static
    {
        $this->prixVitrine = $prixVitrine;

        return $this;
    }
    
    public function getPrixCustom(): ?string
    {
        return $this->prixCustom;
    }

    public function setPrixCustom(?string $prixCustom): static
    {
        $this->prixCustom = $prixCustom;

        return $this;
    }

    public function getPrixMaintenance(): ?string
    {
        return $this->prixMaintenance;
    }

    public function setPrixMaintenance(?string $prixMaintenance): static
    {
        $this->prixMaintenance = $prixMaintenance;

        return $this;
    }

    public function getPrixLogo(): ?string
    {
        return $this->print;
    }

    public function setPrixLogo(?string $prixLogo): static
    {
        $this->prixLogo = $prixLogo;

        return $this;
    }

    public function getPrixIdVisuelle(): ?string
    {
        return $this->prixIdVisuelle;
    }

    public function setPrixIdVisuelle(?string $prixIdVisuelle): static
    {
        $this->prixIdVisuelle = $prixIdVisuelle;

        return $this;
    }

    public function getPrixPrint(): ?string
    {
        return $this->prixPrint;
    }

    public function setPrixPrint(?string $prixPrint): static
    {
        $this->prixPrint = $prixPrint;

        return $this;
    }

    public function getPrixShooting(): ?string
    {
        return $this->print;
    }

    public function setPrixShooting(?string $prixShooting): static
    {
        $this->prixShooting = $prixShooting;

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
