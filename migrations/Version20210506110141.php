<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210506110141 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE newsletter_mail (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE images ADD environnement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6ABAFB82A1 FOREIGN KEY (environnement_id) REFERENCES environnement (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6ABAFB82A1 ON images (environnement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE newsletter_mail');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6ABAFB82A1');
        $this->addSql('DROP INDEX IDX_E01FBE6ABAFB82A1 ON images');
        $this->addSql('ALTER TABLE images DROP environnement_id');
    }
}
