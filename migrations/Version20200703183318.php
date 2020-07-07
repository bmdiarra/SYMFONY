<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200703183318 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chambre (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT DEFAULT NULL, num_chambre VARCHAR(255) NOT NULL, num_batiment INT NOT NULL, type_chambre VARCHAR(255) NOT NULL, INDEX IDX_C509E4FFDDEAB1A3 (etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, matricule_etu VARCHAR(255) NOT NULL, nom_etu VARCHAR(255) NOT NULL, prenom_etu VARCHAR(255) NOT NULL, email_etu VARCHAR(255) NOT NULL, telephone_etu VARCHAR(255) NOT NULL, type_etu VARCHAR(255) NOT NULL, datenaiss_etu VARCHAR(255) DEFAULT NULL, loger VARCHAR(255) DEFAULT NULL, type_bourse VARCHAR(255) DEFAULT NULL, adresse_etu VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chambre ADD CONSTRAINT FK_C509E4FFDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambre DROP FOREIGN KEY FK_C509E4FFDDEAB1A3');
        $this->addSql('DROP TABLE chambre');
        $this->addSql('DROP TABLE etudiant');
    }
}
