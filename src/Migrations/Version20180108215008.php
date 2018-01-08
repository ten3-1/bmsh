<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180108215008 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE newsletter (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, nom_produit VARCHAR(128) NOT NULL, description VARCHAR(256) NOT NULL, categorie INT NOT NULL, photo VARCHAR(64) NOT NULL, label INT NOT NULL, active INT NOT NULL, url_prod VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE allergenes');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE produits');
        $this->addSql('ALTER TABLE allergene CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE boutique CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE categorie CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE allergenes (id INT AUTO_INCREMENT NOT NULL, allergene VARCHAR(128) NOT NULL COLLATE utf8_unicode_ci, description VARCHAR(256) NOT NULL COLLATE utf8_unicode_ci, icone VARCHAR(64) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, cat VARCHAR(128) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, produit VARCHAR(128) NOT NULL COLLATE utf8_unicode_ci, description VARCHAR(256) NOT NULL COLLATE utf8_unicode_ci, cat INT NOT NULL, photo VARCHAR(64) NOT NULL COLLATE utf8_unicode_ci, label INT NOT NULL, active INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE newsletter');
        $this->addSql('DROP TABLE produit');
        $this->addSql('ALTER TABLE allergene MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE allergene DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE allergene CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE boutique MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE boutique DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE boutique CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE categorie MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE categorie DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE categorie CHANGE id id INT NOT NULL');
    }
}
