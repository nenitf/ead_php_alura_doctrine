<?php

declare(strict_types=1);

namespace Alura\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210305012530 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE Aluno_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE Curso_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE Telefone_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE Aluno (id INT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE Curso (id INT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE curso_aluno (curso_id INT NOT NULL, aluno_id INT NOT NULL, PRIMARY KEY(curso_id, aluno_id))');
        $this->addSql('CREATE INDEX IDX_6F96721A87CB4A1F ON curso_aluno (curso_id)');
        $this->addSql('CREATE INDEX IDX_6F96721AB2DDF7F4 ON curso_aluno (aluno_id)');
        $this->addSql('CREATE TABLE Telefone (id INT NOT NULL, aluno_id INT DEFAULT NULL, numero VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D8448137B2DDF7F4 ON Telefone (aluno_id)');
        $this->addSql('ALTER TABLE curso_aluno ADD CONSTRAINT FK_6F96721A87CB4A1F FOREIGN KEY (curso_id) REFERENCES Curso (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE curso_aluno ADD CONSTRAINT FK_6F96721AB2DDF7F4 FOREIGN KEY (aluno_id) REFERENCES Aluno (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE Telefone ADD CONSTRAINT FK_D8448137B2DDF7F4 FOREIGN KEY (aluno_id) REFERENCES Aluno (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE curso_aluno DROP CONSTRAINT FK_6F96721AB2DDF7F4');
        $this->addSql('ALTER TABLE Telefone DROP CONSTRAINT FK_D8448137B2DDF7F4');
        $this->addSql('ALTER TABLE curso_aluno DROP CONSTRAINT FK_6F96721A87CB4A1F');
        $this->addSql('DROP SEQUENCE Aluno_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE Curso_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE Telefone_id_seq CASCADE');
        $this->addSql('DROP TABLE Aluno');
        $this->addSql('DROP TABLE Curso');
        $this->addSql('DROP TABLE curso_aluno');
        $this->addSql('DROP TABLE Telefone');
    }
}
