<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150320192001 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE py_editable_image_page_parts (id BIGINT AUTO_INCREMENT NOT NULL, media_id BIGINT DEFAULT NULL, link VARCHAR(255) DEFAULT NULL, open_in_new_window TINYINT(1) DEFAULT NULL, alt_text VARCHAR(255) DEFAULT NULL, INDEX IDX_929A77BBEA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE py_editable_image_page_parts ADD CONSTRAINT FK_929A77BBEA9FDD75 FOREIGN KEY (media_id) REFERENCES kuma_media (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE py_editable_image_page_parts');
    }
}
