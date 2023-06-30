<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230629121246 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_legal_client ADD nom_site VARCHAR(255) DEFAULT NULL, ADD directeur_publication VARCHAR(255) DEFAULT NULL, ADD moyen_contact VARCHAR(255) DEFAULT NULL, ADD mode_paiement VARCHAR(255) DEFAULT NULL, ADD jours_horaire VARCHAR(255) NOT NULL, ADD delais_livraison VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE info_legal_client ADD CONSTRAINT FK_6AF098999DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_6AF098999DED506 ON info_legal_client (id_client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_legal_client DROP FOREIGN KEY FK_6AF098999DED506');
        $this->addSql('DROP INDEX IDX_6AF098999DED506 ON info_legal_client');
        $this->addSql('ALTER TABLE info_legal_client DROP nom_site, DROP directeur_publication, DROP moyen_contact, DROP mode_paiement, DROP jours_horaire, DROP delais_livraison');
    }
}
