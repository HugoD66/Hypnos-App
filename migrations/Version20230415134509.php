<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230415134509 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, suite_id INT DEFAULT NULL, did_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', start_date DATE NOT NULL, end_date DATE NOT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_E00CEDDE19EB6921 (client_id), INDEX IDX_E00CEDDE4FFCB518 (suite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_us (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, reason INT NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel (id INT AUTO_INCREMENT NOT NULL, gerant_admin_id INT DEFAULT NULL, manager_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_3535ED93E2F0AF0 (gerant_admin_id), UNIQUE INDEX UNIQ_3535ED9783E3463 (manager_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manager (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_FA2425B9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture_list (id INT AUTO_INCREMENT NOT NULL, suite_id INT DEFAULT NULL, pic_one VARCHAR(255) NOT NULL, pic_two VARCHAR(255) NOT NULL, pic_three VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_FB287D8D4FFCB518 (suite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suite (id INT AUTO_INCREMENT NOT NULL, manager_id INT DEFAULT NULL, hotel_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price INT NOT NULL, INDEX IDX_153CE426783E3463 (manager_id), INDEX IDX_153CE4263243BB18 (hotel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE19EB6921 FOREIGN KEY (client_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE4FFCB518 FOREIGN KEY (suite_id) REFERENCES suite (id)');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED93E2F0AF0 FOREIGN KEY (gerant_admin_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED9783E3463 FOREIGN KEY (manager_id) REFERENCES manager (id)');
        $this->addSql('ALTER TABLE picture_list ADD CONSTRAINT FK_FB287D8D4FFCB518 FOREIGN KEY (suite_id) REFERENCES suite (id)');
        $this->addSql('ALTER TABLE suite ADD CONSTRAINT FK_153CE426783E3463 FOREIGN KEY (manager_id) REFERENCES manager (id)');
        $this->addSql('ALTER TABLE suite ADD CONSTRAINT FK_153CE4263243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE19EB6921');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE4FFCB518');
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED93E2F0AF0');
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED9783E3463');
        $this->addSql('ALTER TABLE picture_list DROP FOREIGN KEY FK_FB287D8D4FFCB518');
        $this->addSql('ALTER TABLE suite DROP FOREIGN KEY FK_153CE426783E3463');
        $this->addSql('ALTER TABLE suite DROP FOREIGN KEY FK_153CE4263243BB18');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE contact_us');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE manager');
        $this->addSql('DROP TABLE picture_list');
        $this->addSql('DROP TABLE suite');
        $this->addSql('DROP TABLE user');
    }
}
