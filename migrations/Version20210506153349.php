<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210506153349 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE environnement ADD options_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE environnement ADD CONSTRAINT FK_A2D30A213ADB05F1 FOREIGN KEY (options_id) REFERENCES options (id)');
        $this->addSql('CREATE INDEX IDX_A2D30A213ADB05F1 ON environnement (options_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE environnement DROP FOREIGN KEY FK_A2D30A213ADB05F1');
        $this->addSql('DROP INDEX IDX_A2D30A213ADB05F1 ON environnement');
        $this->addSql('ALTER TABLE environnement DROP options_id');
    }
}
