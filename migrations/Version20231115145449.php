<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231115145449 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE material (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, quantity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, material_id INT NOT NULL, emprunt_date DATETIME NOT NULL, rendered DATETIME NOT NULL, is_rendered TINYINT(1) NOT NULL, student_id INT NOT NULL, INDEX IDX_42C84955E308AC6F (material_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955E308AC6F FOREIGN KEY (material_id) REFERENCES material (id)');
        $this->addSql('ALTER TABLE pret DROP FOREIGN KEY FK_52ECE9791E0AAD67');
        $this->addSql('ALTER TABLE pret DROP FOREIGN KEY FK_52ECE979DF7F20C7');
        $this->addSql('DROP TABLE materiel');
        $this->addSql('DROP TABLE pret');
        $this->addSql('DROP TABLE user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE materiel (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, quantity INT NOT NULL, date_ajout DATE NOT NULL, etat VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE pret (id INT AUTO_INCREMENT NOT NULL, materiel_emprunte_id INT DEFAULT NULL, user_emprunteur_id INT DEFAULT NULL, date_pret DATE NOT NULL, date_rendu_prevue DATE NOT NULL, date_rendu_user DATE DEFAULT NULL, statut VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_52ECE9791E0AAD67 (user_emprunteur_id), INDEX IDX_52ECE979DF7F20C7 (materiel_emprunte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE pret ADD CONSTRAINT FK_52ECE9791E0AAD67 FOREIGN KEY (user_emprunteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE pret ADD CONSTRAINT FK_52ECE979DF7F20C7 FOREIGN KEY (materiel_emprunte_id) REFERENCES materiel (id)');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955E308AC6F');
        $this->addSql('DROP TABLE material');
        $this->addSql('DROP TABLE reservation');
    }
}
