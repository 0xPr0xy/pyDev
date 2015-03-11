<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150311200155 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE kuma_nodes_search');
        $this->addSql('DROP TABLE kuma_redirects');
        $this->addSql('DROP TABLE kuma_translation');
        $this->addSql('ALTER TABLE pydev_websitebundle_home_pages ADD background_color VARCHAR(255) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE kuma_nodes_search (id BIGINT AUTO_INCREMENT NOT NULL, node_id BIGINT DEFAULT NULL, boost DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_1560AF72460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kuma_redirects (id BIGINT AUTO_INCREMENT NOT NULL, origin VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, target VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, permanent TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kuma_translation (id INT AUTO_INCREMENT NOT NULL, translation_id INT DEFAULT NULL, keyword VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, locale VARCHAR(5) DEFAULT NULL COLLATE utf8_unicode_ci, file VARCHAR(50) DEFAULT NULL COLLATE utf8_unicode_ci, text LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci, domain VARCHAR(30) DEFAULT NULL COLLATE utf8_unicode_ci, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, flag VARCHAR(20) DEFAULT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX keyword_per_locale (keyword, locale, domain), UNIQUE INDEX translation_id_per_locale (translation_id, locale), INDEX idx_locale_domain (locale, domain), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE kuma_nodes_search ADD CONSTRAINT FK_1560AF72460D9FD7 FOREIGN KEY (node_id) REFERENCES kuma_nodes (id)');
        $this->addSql('ALTER TABLE pydev_websitebundle_home_pages DROP background_color');
    }
}
