<?php

declare(strict_types=1);

namespace Alura\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210304232552 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE Aluno_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE Telefone_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE Aluno (id INT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE Telefone (id INT NOT NULL, aluno_id INT DEFAULT NULL, numero VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D8448137B2DDF7F4 ON Telefone (aluno_id)');
        $this->addSql('ALTER TABLE Telefone ADD CONSTRAINT FK_D8448137B2DDF7F4 FOREIGN KEY (aluno_id) REFERENCES Aluno (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE Telefone DROP CONSTRAINT FK_D8448137B2DDF7F4');
        $this->addSql('DROP SEQUENCE Aluno_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE Telefone_id_seq CASCADE');
        $this->addSql('DROP TABLE Aluno');
        $this->addSql('DROP TABLE Telefone');
    }
}
