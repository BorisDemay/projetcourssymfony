<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211027064753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, id_personne_id INT DEFAULT NULL, id_salle_id INT DEFAULT NULL, nom VARCHAR(200) NOT NULL, mail VARCHAR(200) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, INDEX IDX_5E9E89CBBA091CE5 (id_personne_id), INDEX IDX_5E9E89CB8CEBACA0 (id_salle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materiel (id INT AUTO_INCREMENT NOT NULL, salle_id_id INT NOT NULL, numero VARCHAR(100) NOT NULL, type VARCHAR(60) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_18D2B09192419D3E (salle_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, age INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(20) NOT NULL, batiment VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CBBA091CE5 FOREIGN KEY (id_personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB8CEBACA0 FOREIGN KEY (id_salle_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE materiel ADD CONSTRAINT FK_18D2B09192419D3E FOREIGN KEY (salle_id_id) REFERENCES salle (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CBBA091CE5');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB8CEBACA0');
        $this->addSql('ALTER TABLE materiel DROP FOREIGN KEY FK_18D2B09192419D3E');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE materiel');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE salle');
    }
}
