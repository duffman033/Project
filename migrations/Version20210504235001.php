<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210504235001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE environnement (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, theme VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, adresse VARCHAR(255) DEFAULT NULL, number_phone VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE host (id INT AUTO_INCREMENT NOT NULL, superficy INT NOT NULL, number_of_people INT NOT NULL, price_for_options NUMERIC(6, 2) NOT NULL, for_tents TINYINT(1) NOT NULL, for_caravans TINYINT(1) NOT NULL, for_vans TINYINT(1) NOT NULL, for_cars TINYINT(1) NOT NULL, for_motorcycles TINYINT(1) NOT NULL, country TINYINT(1) NOT NULL, mountain TINYINT(1) NOT NULL, sea TINYINT(1) NOT NULL, city TINYINT(1) NOT NULL, lake TINYINT(1) NOT NULL, summarise VARCHAR(255) NOT NULL, the_setting VARCHAR(255) NOT NULL, the_sanitary_facilities VARCHAR(255) NOT NULL, the_equipement VARCHAR(255) NOT NULL, loan TINYINT(1) NOT NULL, other_remarks VARCHAR(255) NOT NULL, rules_of_the_field VARCHAR(255) NOT NULL, the_pitches VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, price_of_location NUMERIC(5, 2) NOT NULL, region VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE environnement');
        $this->addSql('DROP TABLE host');
    }
}
