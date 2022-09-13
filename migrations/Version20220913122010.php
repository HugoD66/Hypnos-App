<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220913122010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manager DROP FOREIGN KEY FK_FA2425B94FFCB518');
        $this->addSql('DROP INDEX UNIQ_FA2425B94FFCB518 ON manager');
        $this->addSql('ALTER TABLE manager DROP suite_id');
        $this->addSql('ALTER TABLE suite ADD manager_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE suite ADD CONSTRAINT FK_153CE426783E3463 FOREIGN KEY (manager_id) REFERENCES manager (id)');
        $this->addSql('CREATE INDEX IDX_153CE426783E3463 ON suite (manager_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manager ADD suite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE manager ADD CONSTRAINT FK_FA2425B94FFCB518 FOREIGN KEY (suite_id) REFERENCES suite (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FA2425B94FFCB518 ON manager (suite_id)');
        $this->addSql('ALTER TABLE suite DROP FOREIGN KEY FK_153CE426783E3463');
        $this->addSql('DROP INDEX IDX_153CE426783E3463 ON suite');
        $this->addSql('ALTER TABLE suite DROP manager_id');
    }
}
