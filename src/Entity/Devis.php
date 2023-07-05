<?php

namespace App\Entity;

use App\Entity\Client;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\DevisRepository;

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
    private ?string $siteVitrine = null;

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

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $prixEcom = null;
    
    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $prixVitrine = null;
    
    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $prixCustom = null;
    
    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $prixMaintenance = null;
    
    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $prixLogo = null;
    
    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $prixIdVisuelle = null;
    
    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $prixPrint = null;
    
    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $prixShooting = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $quantiteEcom = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $quantiteVitrine = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $quantiteCustom = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $quantiteMaintenance = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $quantiteLogo = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $quantiteIdVisuelle = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $quantitePrint = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $quantiteShooting = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $prixTotal = null;

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

    public function getSiteVitrine(): ?string
    {
        return $this->siteVitrine;
    }

    public function setSiteVitrine(?string $siteVitrine): static
    {
        $this->siteVitrine = $siteVitrine;

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

    public function getPrixTotal(): ?int
    {
        return $this->prixTotal;
    }

    public function setPrixTotal(?int $prixTotal): static
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    //Quantite

    public function getQuantiteEcom(): ?int
{
    return $this->quantiteEcom;
}

public function setQuantiteEcom(?int $quantiteEcom): static
{
    $this->quantiteEcom = $quantiteEcom;

    return $this;
}

public function getQuantiteVitrine(): ?int
{
    return $this->quantiteVitrine;
}

public function setQuantiteVitrine(?int $quantiteVitrine): static
{
    $this->quantiteVitrine = $quantiteVitrine;

    return $this;
}

public function getQuantiteCustom(): ?int
{
    return $this->quantiteCustom;
}

public function setQuantiteCustom(?int $quantiteCustom): static
{
    $this->quantiteCustom = $quantiteCustom;

    return $this;
}

public function getQuantiteMaintenance(): ?int
{
    return $this->quantiteMaintenance;
}

public function setQuantiteMaintenance(?int $quantiteMaintenance): static
{
    $this->quantiteMaintenance = $quantiteMaintenance;

    return $this;
}

public function getQuantiteLogo(): ?int
{
    return $this->quantiteLogo;
}

public function setQuantiteLogo(?int $quantiteLogo): static
{
    $this->quantiteLogo = $quantiteLogo;

    return $this;
}

public function getQuantiteIdVisuelle(): ?int
{
    return $this->quantiteIdVisuelle;
}

public function setQuantiteIdVisuelle(?int $quantiteIdVisuelle): static
{
    $this->quantiteIdVisuelle = $quantiteIdVisuelle;

    return $this;
}

public function getQuantitePrint(): ?int
{
    return $this->quantitePrint;
}

public function setQuantitePrint(?int $quantitePrint): static
{
    $this->quantitePrint = $quantitePrint;

    return $this;
}

public function getQuantiteShooting(): ?int
{
    return $this->quantiteShooting;
}

public function setQuantiteShooting(?int $quantiteShooting): static
{
    $this->quantiteShooting = $quantiteShooting;

    return $this;
}


}
