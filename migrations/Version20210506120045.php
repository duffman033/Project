<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210506120045 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE options (id INT AUTO_INCREMENT NOT NULL, animals TINYINT(1) DEFAULT NULL, barbecue TINYINT(1) DEFAULT NULL, electricity TINYINT(1) DEFAULT NULL, swimming_pool TINYINT(1) DEFAULT NULL, washing_machine TINYINT(1) DEFAULT NULL, dryer TINYINT(1) DEFAULT NULL, wardrobe TINYINT(1) DEFAULT NULL, toilet_1 TINYINT(1) DEFAULT NULL, toilet_2 TINYINT(1) DEFAULT NULL, independent_shower TINYINT(1) DEFAULT NULL, shower_at_home TINYINT(1) DEFAULT NULL, kitchen_at_home TINYINT(1) DEFAULT NULL, independent_kitchen TINYINT(1) DEFAULT NULL, independent_refrigerator TINYINT(1) DEFAULT NULL, refrigerator_at_home TINYINT(1) DEFAULT NULL, permitted_naturism TINYINT(1) DEFAULT NULL, private_parking TINYINT(1) DEFAULT NULL, garden_table TINYINT(1) DEFAULT NULL, permitted_campfire TINYINT(1) DEFAULT NULL, enclosed_terrain TINYINT(1) DEFAULT NULL, train_or_bus TINYINT(1) DEFAULT NULL, shops TINYINT(1) DEFAULT NULL, water_discharges TINYINT(1) DEFAULT NULL, childrens_games TINYINT(1) DEFAULT NULL, handicapped_access TINYINT(1) DEFAULT NULL, independent_access TINYINT(1) DEFAULT NULL, drinking_water TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE host ADD options_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE host ADD CONSTRAINT FK_CF2713FD3ADB05F1 FOREIGN KEY (options_id) REFERENCES options (id)');
        $this->addSql('CREATE INDEX IDX_CF2713FD3ADB05F1 ON host (options_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE host DROP FOREIGN KEY FK_CF2713FD3ADB05F1');
        $this->addSql('DROP TABLE options');
        $this->addSql('DROP INDEX IDX_CF2713FD3ADB05F1 ON host');
        $this->addSql('ALTER TABLE host DROP options_id');
    }
}
