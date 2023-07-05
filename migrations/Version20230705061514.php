<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230705061514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE devis (id INT AUTO_INCREMENT NOT NULL, id_client_id INT NOT NULL, site_ecom VARCHAR(255) DEFAULT NULL, site_vitrine VARCHAR(255) DEFAULT NULL, site_custom VARCHAR(255) DEFAULT NULL, maintenance VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, identite_visuelle VARCHAR(255) DEFAULT NULL, print VARCHAR(255) DEFAULT NULL, shooting VARCHAR(255) DEFAULT NULL, prix_ecom INT DEFAULT NULL, prix_vitrine INT DEFAULT NULL, prix_custom INT DEFAULT NULL, prix_maintenance INT DEFAULT NULL, prix_logo INT DEFAULT NULL, prix_id_visuelle INT DEFAULT NULL, prix_print INT DEFAULT NULL, prix_shooting INT DEFAULT NULL, quantite_ecom INT DEFAULT NULL, quantite_vitrine INT DEFAULT NULL, quantite_custom INT DEFAULT NULL, quantite_maintenance INT DEFAULT NULL, quantite_logo INT DEFAULT NULL, quantite_id_visuelle INT DEFAULT NULL, quantite_print INT DEFAULT NULL, quantite_shooting INT DEFAULT NULL, prix_total INT DEFAULT NULL, INDEX IDX_8B27C52B99DED506 (id_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B99DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B99DED506');
        $this->addSql('DROP TABLE devis');
    }
}
