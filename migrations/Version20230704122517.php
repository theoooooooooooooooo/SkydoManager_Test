<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230704122517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE devis CHANGE prix_ecom prix_ecom INT DEFAULT NULL, CHANGE prix_vitrine prix_vitrine INT DEFAULT NULL, CHANGE prix_custom prix_custom INT DEFAULT NULL, CHANGE prix_maintenance prix_maintenance INT DEFAULT NULL, CHANGE prix_logo prix_logo INT DEFAULT NULL, CHANGE prix_id_visuelle prix_id_visuelle INT DEFAULT NULL, CHANGE prix_print prix_print INT DEFAULT NULL, CHANGE prix_shooting prix_shooting INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE devis CHANGE prix_ecom prix_ecom VARCHAR(255) DEFAULT NULL, CHANGE prix_vitrine prix_vitrine VARCHAR(255) DEFAULT NULL, CHANGE prix_custom prix_custom VARCHAR(255) DEFAULT NULL, CHANGE prix_maintenance prix_maintenance VARCHAR(255) DEFAULT NULL, CHANGE prix_logo prix_logo VARCHAR(255) DEFAULT NULL, CHANGE prix_id_visuelle prix_id_visuelle VARCHAR(255) DEFAULT NULL, CHANGE prix_print prix_print VARCHAR(255) DEFAULT NULL, CHANGE prix_shooting prix_shooting VARCHAR(255) DEFAULT NULL');
    }
}
