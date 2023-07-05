<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230705122759 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C7440455F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devis (id INT AUTO_INCREMENT NOT NULL, id_client_id INT NOT NULL, site_ecom VARCHAR(255) DEFAULT NULL, site_vitrine VARCHAR(255) DEFAULT NULL, site_custom VARCHAR(255) DEFAULT NULL, maintenance VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, identite_visuelle VARCHAR(255) DEFAULT NULL, print VARCHAR(255) DEFAULT NULL, shooting VARCHAR(255) DEFAULT NULL, prix_ecom INT DEFAULT NULL, prix_vitrine INT DEFAULT NULL, prix_custom INT DEFAULT NULL, prix_maintenance INT DEFAULT NULL, prix_logo INT DEFAULT NULL, prix_id_visuelle INT DEFAULT NULL, prix_print INT DEFAULT NULL, prix_shooting INT DEFAULT NULL, quantite_ecom INT DEFAULT NULL, quantite_vitrine INT DEFAULT NULL, quantite_custom INT DEFAULT NULL, quantite_maintenance INT DEFAULT NULL, quantite_logo INT DEFAULT NULL, quantite_id_visuelle INT DEFAULT NULL, quantite_print INT DEFAULT NULL, quantite_shooting INT DEFAULT NULL, prix_total INT DEFAULT NULL, INDEX IDX_8B27C52B99DED506 (id_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info_legal_client (id INT AUTO_INCREMENT NOT NULL, id_client_id INT NOT NULL, raison_social VARCHAR(255) NOT NULL, siret VARCHAR(14) NOT NULL, adresse LONGTEXT NOT NULL, url_site VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(20) NOT NULL, nom_site VARCHAR(255) DEFAULT NULL, directeur_publication VARCHAR(255) DEFAULT NULL, moyen_contact VARCHAR(255) DEFAULT NULL, mode_paiement VARCHAR(255) DEFAULT NULL, jours_horaire VARCHAR(255) NOT NULL, delais_livraison VARCHAR(255) DEFAULT NULL, produit_service VARCHAR(255) DEFAULT NULL, personne_acontacter VARCHAR(255) DEFAULT NULL, INDEX IDX_6AF098999DED506 (id_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B99DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE info_legal_client ADD CONSTRAINT FK_6AF098999DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B99DED506');
        $this->addSql('ALTER TABLE info_legal_client DROP FOREIGN KEY FK_6AF098999DED506');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE info_legal_client');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
