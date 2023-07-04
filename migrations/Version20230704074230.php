<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230704074230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE devis ADD prix_ecom VARCHAR(255) DEFAULT NULL, ADD prix_vitrine VARCHAR(255) DEFAULT NULL, ADD prix_custom VARCHAR(255) DEFAULT NULL, ADD prix_maintenance VARCHAR(255) DEFAULT NULL, ADD prix_logo VARCHAR(255) DEFAULT NULL, ADD prix_id_visuelle VARCHAR(255) DEFAULT NULL, ADD prix_print VARCHAR(255) DEFAULT NULL, ADD prix_shooting VARCHAR(255) DEFAULT NULL, ADD quantite_ecom VARCHAR(255) DEFAULT NULL, ADD quantite_vitrine VARCHAR(255) DEFAULT NULL, ADD quantite_custom VARCHAR(255) DEFAULT NULL, ADD quantite_maintenance VARCHAR(255) DEFAULT NULL, ADD quantite_logo VARCHAR(255) DEFAULT NULL, ADD quantite_id_visuelle VARCHAR(255) DEFAULT NULL, ADD quantite_print VARCHAR(255) DEFAULT NULL, ADD quantite_shooting VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE devis DROP prix_ecom, DROP prix_vitrine, DROP prix_custom, DROP prix_maintenance, DROP prix_logo, DROP prix_id_visuelle, DROP prix_print, DROP prix_shooting, DROP quantite_ecom, DROP quantite_vitrine, DROP quantite_custom, DROP quantite_maintenance, DROP quantite_logo, DROP quantite_id_visuelle, DROP quantite_print, DROP quantite_shooting');
    }
}
