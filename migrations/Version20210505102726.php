<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210505102726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images ADD host_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A1FB8D185 FOREIGN KEY (host_id) REFERENCES host (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6A1FB8D185 ON images (host_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A1FB8D185');
        $this->addSql('DROP INDEX IDX_E01FBE6A1FB8D185 ON images');
        $this->addSql('ALTER TABLE images DROP host_id');
    }
}
