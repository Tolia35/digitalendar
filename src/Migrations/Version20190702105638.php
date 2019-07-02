<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190702105638 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_D79F6B1171F7E88B');
        $this->addSql('DROP INDEX IDX_D79F6B11A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__participant AS SELECT id, user_id, event_id, created_at FROM participant');
        $this->addSql('DROP TABLE participant');
        $this->addSql('CREATE TABLE participant (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, event_id INTEGER NOT NULL, created_at DATETIME NOT NULL, CONSTRAINT FK_D79F6B11A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D79F6B1171F7E88B FOREIGN KEY (event_id) REFERENCES event (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO participant (id, user_id, event_id, created_at) SELECT id, user_id, event_id, created_at FROM __temp__participant');
        $this->addSql('DROP TABLE __temp__participant');
        $this->addSql('CREATE INDEX IDX_D79F6B1171F7E88B ON participant (event_id)');
        $this->addSql('CREATE INDEX IDX_D79F6B11A76ED395 ON participant (user_id)');
        $this->addSql('DROP INDEX IDX_3BAE0AA7A76ED395');
        $this->addSql('DROP INDEX IDX_3BAE0AA78BAC62AF');
        $this->addSql('CREATE TEMPORARY TABLE __temp__event AS SELECT id, city_id, user_id, title, slug, picture, description, date_start, date_end, url, price, is_valid FROM event');
        $this->addSql('DROP TABLE event');
        $this->addSql('CREATE TABLE event (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, city_id INTEGER NOT NULL, user_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, slug VARCHAR(255) NOT NULL COLLATE BINARY, picture VARCHAR(255) DEFAULT NULL COLLATE BINARY, description CLOB NOT NULL COLLATE BINARY, date_start DATETIME NOT NULL, date_end DATETIME NOT NULL, url VARCHAR(255) DEFAULT NULL COLLATE BINARY, price NUMERIC(10, 2) NOT NULL, is_valid BOOLEAN NOT NULL, CONSTRAINT FK_3BAE0AA78BAC62AF FOREIGN KEY (city_id) REFERENCES city (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_3BAE0AA7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO event (id, city_id, user_id, title, slug, picture, description, date_start, date_end, url, price, is_valid) SELECT id, city_id, user_id, title, slug, picture, description, date_start, date_end, url, price, is_valid FROM __temp__event');
        $this->addSql('DROP TABLE __temp__event');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7A76ED395 ON event (user_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA78BAC62AF ON event (city_id)');
        $this->addSql('DROP INDEX IDX_9237986582F1BAF4');
        $this->addSql('DROP INDEX IDX_9237986571F7E88B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__event_language AS SELECT event_id, language_id FROM event_language');
        $this->addSql('DROP TABLE event_language');
        $this->addSql('CREATE TABLE event_language (event_id INTEGER NOT NULL, language_id INTEGER NOT NULL, PRIMARY KEY(event_id, language_id), CONSTRAINT FK_9237986571F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9237986582F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO event_language (event_id, language_id) SELECT event_id, language_id FROM __temp__event_language');
        $this->addSql('DROP TABLE __temp__event_language');
        $this->addSql('CREATE INDEX IDX_9237986582F1BAF4 ON event_language (language_id)');
        $this->addSql('CREATE INDEX IDX_9237986571F7E88B ON event_language (event_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_3BAE0AA78BAC62AF');
        $this->addSql('DROP INDEX IDX_3BAE0AA7A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__event AS SELECT id, city_id, user_id, title, slug, picture, description, date_start, date_end, url, price, is_valid FROM event');
        $this->addSql('DROP TABLE event');
        $this->addSql('CREATE TABLE event (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, city_id INTEGER NOT NULL, user_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, description CLOB NOT NULL, date_start DATETIME NOT NULL, date_end DATETIME NOT NULL, url VARCHAR(255) DEFAULT NULL, price NUMERIC(10, 2) NOT NULL, is_valid BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO event (id, city_id, user_id, title, slug, picture, description, date_start, date_end, url, price, is_valid) SELECT id, city_id, user_id, title, slug, picture, description, date_start, date_end, url, price, is_valid FROM __temp__event');
        $this->addSql('DROP TABLE __temp__event');
        $this->addSql('CREATE INDEX IDX_3BAE0AA78BAC62AF ON event (city_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7A76ED395 ON event (user_id)');
        $this->addSql('DROP INDEX IDX_9237986571F7E88B');
        $this->addSql('DROP INDEX IDX_9237986582F1BAF4');
        $this->addSql('CREATE TEMPORARY TABLE __temp__event_language AS SELECT event_id, language_id FROM event_language');
        $this->addSql('DROP TABLE event_language');
        $this->addSql('CREATE TABLE event_language (event_id INTEGER NOT NULL, language_id INTEGER NOT NULL, PRIMARY KEY(event_id, language_id))');
        $this->addSql('INSERT INTO event_language (event_id, language_id) SELECT event_id, language_id FROM __temp__event_language');
        $this->addSql('DROP TABLE __temp__event_language');
        $this->addSql('CREATE INDEX IDX_9237986571F7E88B ON event_language (event_id)');
        $this->addSql('CREATE INDEX IDX_9237986582F1BAF4 ON event_language (language_id)');
        $this->addSql('DROP INDEX IDX_D79F6B11A76ED395');
        $this->addSql('DROP INDEX IDX_D79F6B1171F7E88B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__participant AS SELECT id, user_id, event_id, created_at FROM participant');
        $this->addSql('DROP TABLE participant');
        $this->addSql('CREATE TABLE participant (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, event_id INTEGER NOT NULL, created_at DATETIME NOT NULL)');
        $this->addSql('INSERT INTO participant (id, user_id, event_id, created_at) SELECT id, user_id, event_id, created_at FROM __temp__participant');
        $this->addSql('DROP TABLE __temp__participant');
        $this->addSql('CREATE INDEX IDX_D79F6B11A76ED395 ON participant (user_id)');
        $this->addSql('CREATE INDEX IDX_D79F6B1171F7E88B ON participant (event_id)');
    }
}
