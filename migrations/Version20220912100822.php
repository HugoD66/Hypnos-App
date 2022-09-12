<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220912100822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE suite (id INT AUTO_INCREMENT NOT NULL, hotel_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price INT NOT NULL, INDEX IDX_153CE4263243BB18 (hotel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE suite ADD CONSTRAINT FK_153CE4263243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE manager ADD suite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE manager ADD CONSTRAINT FK_FA2425B94FFCB518 FOREIGN KEY (suite_id) REFERENCES suite (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FA2425B94FFCB518 ON manager (suite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manager DROP FOREIGN KEY FK_FA2425B94FFCB518');
        $this->addSql('ALTER TABLE suite DROP FOREIGN KEY FK_153CE4263243BB18');
        $this->addSql('DROP TABLE suite');
        $this->addSql('DROP INDEX UNIQ_FA2425B94FFCB518 ON manager');
        $this->addSql('ALTER TABLE manager DROP suite_id');
    }
}
