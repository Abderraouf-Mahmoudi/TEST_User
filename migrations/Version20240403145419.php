<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240403145419 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actualite (idAct INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, rating DOUBLE PRECISION NOT NULL, contenue VARCHAR(255) NOT NULL, date_pub DATE NOT NULL, PRIMARY KEY(idAct)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arrivage (idA INT AUTO_INCREMENT NOT NULL, quantite INT DEFAULT NULL, dateEntree DATE DEFAULT NULL, idV INT DEFAULT NULL, INDEX IDX_C07931583BDE73DF (idV), PRIMARY KEY(idA)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (idComnt INT AUTO_INCREMENT NOT NULL, Contenuec VARCHAR(255) NOT NULL, date_pubc DATE NOT NULL, idU INT NOT NULL, idAct INT DEFAULT NULL, INDEX IDX_67F068BC8EA4E8C3 (idAct), PRIMARY KEY(idComnt)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demandedossier (id_demande INT AUTO_INCREMENT NOT NULL, urlcin VARCHAR(500) NOT NULL, urlCerRetenu VARCHAR(500) NOT NULL, urlAttTravail VARCHAR(500) NOT NULL, urlDecRevenu VARCHAR(500) NOT NULL, urlExtNaissance VARCHAR(500) NOT NULL, PRIMARY KEY(id_demande)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dossierb (id_dossier INT AUTO_INCREMENT NOT NULL, cin INT NOT NULL, nom VARCHAR(20) NOT NULL, prenom VARCHAR(20) NOT NULL, region VARCHAR(20) NOT NULL, date DATE NOT NULL, MONTANT INT NOT NULL, PRIMARY KEY(id_dossier)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etatdossier (id_etat INT AUTO_INCREMENT NOT NULL, etat VARCHAR(50) NOT NULL, id_dossier INT DEFAULT NULL, PRIMARY KEY(id_etat)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messagerie (idMessage INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(255) NOT NULL, dateEnvoie DATE NOT NULL, vu TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, Sender INT DEFAULT NULL, Receiver INT DEFAULT NULL, INDEX IDX_14E8F60C58AC4FF9 (Sender), INDEX IDX_14E8F60CC4CEEEC0 (Receiver), PRIMARY KEY(idMessage)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (idR INT AUTO_INCREMENT NOT NULL, sujet VARCHAR(255) NOT NULL, description TEXT NOT NULL, dateReclamation DATE NOT NULL, emailUser VARCHAR(255) NOT NULL, idU INT DEFAULT NULL, INDEX IDX_CE606404A2D72265 (idU), PRIMARY KEY(idR)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse (idR INT AUTO_INCREMENT NOT NULL, Date_Rep DATE NOT NULL, ContenueR VARCHAR(255) NOT NULL, idComnt INT DEFAULT NULL, idU INT NOT NULL, PRIMARY KEY(idR)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponsereclamation (idReponseR INT AUTO_INCREMENT NOT NULL, contenuReponse VARCHAR(255) NOT NULL, DateReponseR DATE NOT NULL, idR INT DEFAULT NULL, INDEX IDX_B052BA703CB3B7C6 (idR), PRIMARY KEY(idReponseR)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (idU INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT \'NULL\', prenom VARCHAR(255) DEFAULT \'NULL\', DateNaissance DATE DEFAULT NULL, numTel INT DEFAULT NULL, eMAIL VARCHAR(255) DEFAULT \'NULL\', roles VARCHAR(255) DEFAULT \'NULL\', role VARCHAR(255) DEFAULT NULL, imageUser VARCHAR(255) DEFAULT NULL, passwd VARCHAR(255) DEFAULT \'NULL\', status TINYINT(1) DEFAULT NULL, PRIMARY KEY(idU)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voiture (idV INT AUTO_INCREMENT NOT NULL, marque VARCHAR(50) DEFAULT \'NULL\', modele VARCHAR(50) DEFAULT \'NULL\', couleur VARCHAR(20) DEFAULT \'NULL\', prix NUMERIC(10, 2) DEFAULT \'NULL\', img VARCHAR(255) NOT NULL, description TEXT DEFAULT \'NULL\', PRIMARY KEY(idV)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE arrivage ADD CONSTRAINT FK_C07931583BDE73DF FOREIGN KEY (idV) REFERENCES voiture (idv)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC8EA4E8C3 FOREIGN KEY (idAct) REFERENCES actualite (idAct)');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60C58AC4FF9 FOREIGN KEY (Sender) REFERENCES user (idU)');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60CC4CEEEC0 FOREIGN KEY (Receiver) REFERENCES user (idU)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404A2D72265 FOREIGN KEY (idU) REFERENCES user (idU)');
        $this->addSql('ALTER TABLE reponsereclamation ADD CONSTRAINT FK_B052BA703CB3B7C6 FOREIGN KEY (idR) REFERENCES reclamation (idR)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE arrivage DROP FOREIGN KEY FK_C07931583BDE73DF');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC8EA4E8C3');
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60C58AC4FF9');
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60CC4CEEEC0');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404A2D72265');
        $this->addSql('ALTER TABLE reponsereclamation DROP FOREIGN KEY FK_B052BA703CB3B7C6');
        $this->addSql('DROP TABLE actualite');
        $this->addSql('DROP TABLE arrivage');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE demandedossier');
        $this->addSql('DROP TABLE dossierb');
        $this->addSql('DROP TABLE etatdossier');
        $this->addSql('DROP TABLE messagerie');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE reponsereclamation');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE voiture');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
