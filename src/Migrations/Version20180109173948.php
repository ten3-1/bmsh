<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180109173948 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE allergene (id INT AUTO_INCREMENT NOT NULL, nom_allergene VARCHAR(128) NOT NULL, description VARCHAR(256) NOT NULL, icone VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boutique (id INT AUTO_INCREMENT NOT NULL, nom_boutique VARCHAR(150) NOT NULL, adress_boutique VARCHAR(500) NOT NULL, horaires VARCHAR(300) NOT NULL, telephone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, nom_produit VARCHAR(128) NOT NULL, description VARCHAR(256) NOT NULL, categorie INT NOT NULL, allergene INT NOT NULL, photo VARCHAR(64) NOT NULL, label INT NOT NULL, active INT NOT NULL, url_prod VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom_contact VARCHAR(200) NOT NULL, email_contact VARCHAR(200) NOT NULL, message_contact VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE allergenes');
        $this->addSql('DROP TABLE boutiques');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE produits');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE allergenes (id INT AUTO_INCREMENT NOT NULL, allergene VARCHAR(128) NOT NULL COLLATE utf8_unicode_ci, description VARCHAR(256) NOT NULL COLLATE utf8_unicode_ci, icone VARCHAR(64) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boutiques (id INT AUTO_INCREMENT NOT NULL, nom_boutique VARCHAR(150) NOT NULL COLLATE utf8_unicode_ci, adress_boutique VARCHAR(500) NOT NULL COLLATE utf8_unicode_ci, horaires VARCHAR(300) NOT NULL COLLATE utf8_unicode_ci, telephone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, cat VARCHAR(128) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, produit VARCHAR(128) NOT NULL COLLATE utf8_unicode_ci, description VARCHAR(256) NOT NULL COLLATE utf8_unicode_ci, cat INT NOT NULL, photo VARCHAR(64) NOT NULL COLLATE utf8_unicode_ci, label INT NOT NULL, active INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE allergene');
        $this->addSql('DROP TABLE boutique');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE contact');
    }
}
