<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150425001537 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pydev_websitebundle_news_authors (id BIGINT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pydev_websitebundle_news_overviewpages (id BIGINT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, page_title VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pydev_websitebundle_news_pages (id BIGINT AUTO_INCREMENT NOT NULL, news_author_id BIGINT DEFAULT NULL, date DATETIME NOT NULL, summary LONGTEXT DEFAULT NULL, title VARCHAR(255) NOT NULL, page_title VARCHAR(255) DEFAULT NULL, INDEX IDX_CFA0053BEA50ACDA (news_author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pydev_websitebundle_news_pages ADD CONSTRAINT FK_CFA0053BEA50ACDA FOREIGN KEY (news_author_id) REFERENCES pydev_websitebundle_news_authors (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pydev_websitebundle_news_pages DROP FOREIGN KEY FK_CFA0053BEA50ACDA');
        $this->addSql('DROP TABLE pydev_websitebundle_news_authors');
        $this->addSql('DROP TABLE pydev_websitebundle_news_overviewpages');
        $this->addSql('DROP TABLE pydev_websitebundle_news_pages');
    }
}
