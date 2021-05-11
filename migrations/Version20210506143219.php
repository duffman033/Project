<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210506143219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE host DROP FOREIGN KEY FK_CF2713FD3ADB05F1');
        $this->addSql('DROP INDEX IDX_CF2713FD3ADB05F1 ON host');
        $this->addSql('ALTER TABLE host DROP options_id');
        $this->addSql('ALTER TABLE options ADD host_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE options ADD CONSTRAINT FK_D035FA871FB8D185 FOREIGN KEY (host_id) REFERENCES host (id)');
        $this->addSql('CREATE INDEX IDX_D035FA871FB8D185 ON options (host_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE host ADD options_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE host ADD CONSTRAINT FK_CF2713FD3ADB05F1 FOREIGN KEY (options_id) REFERENCES options (id)');
        $this->addSql('CREATE INDEX IDX_CF2713FD3ADB05F1 ON host (options_id)');
        $this->addSql('ALTER TABLE options DROP FOREIGN KEY FK_D035FA871FB8D185');
        $this->addSql('DROP INDEX IDX_D035FA871FB8D185 ON options');
        $this->addSql('ALTER TABLE options DROP host_id');
    }
}
