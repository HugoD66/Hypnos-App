<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220912110639 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE picture_list (id INT AUTO_INCREMENT NOT NULL, suite_id INT DEFAULT NULL, pic_one VARCHAR(255) NOT NULL, pic_two VARCHAR(255) NOT NULL, pic_three VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_FB287D8D4FFCB518 (suite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE picture_list ADD CONSTRAINT FK_FB287D8D4FFCB518 FOREIGN KEY (suite_id) REFERENCES suite (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture_list DROP FOREIGN KEY FK_FB287D8D4FFCB518');
        $this->addSql('DROP TABLE picture_list');
    }
}
