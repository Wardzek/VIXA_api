<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250325103024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE itinerary (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, duration INT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_FF2238F6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE itinerary_poi (itinerary_id INT NOT NULL, poi_id INT NOT NULL, INDEX IDX_331552D215F737B2 (itinerary_id), INDEX IDX_331552D27EACE855 (poi_id), PRIMARY KEY(itinerary_id, poi_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poi (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, description LONGTEXT DEFAULT NULL, external_id VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, preferences JSON DEFAULT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE itinerary ADD CONSTRAINT FK_FF2238F6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE itinerary_poi ADD CONSTRAINT FK_331552D215F737B2 FOREIGN KEY (itinerary_id) REFERENCES itinerary (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE itinerary_poi ADD CONSTRAINT FK_331552D27EACE855 FOREIGN KEY (poi_id) REFERENCES poi (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE itinerary DROP FOREIGN KEY FK_FF2238F6A76ED395');
        $this->addSql('ALTER TABLE itinerary_poi DROP FOREIGN KEY FK_331552D215F737B2');
        $this->addSql('ALTER TABLE itinerary_poi DROP FOREIGN KEY FK_331552D27EACE855');
        $this->addSql('DROP TABLE itinerary');
        $this->addSql('DROP TABLE itinerary_poi');
        $this->addSql('DROP TABLE poi');
        $this->addSql('DROP TABLE user');
    }
}
