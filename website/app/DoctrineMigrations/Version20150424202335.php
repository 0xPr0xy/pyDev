<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150424202335 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE kuma_nodes_search (id BIGINT AUTO_INCREMENT NOT NULL, node_id BIGINT DEFAULT NULL, boost DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_1560AF72460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pydev_websitebundle_search_page (id BIGINT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, page_title VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE kuma_nodes_search ADD CONSTRAINT FK_1560AF72460D9FD7 FOREIGN KEY (node_id) REFERENCES kuma_nodes (id)');
        $this->addSql('DROP INDEX idx_internal_name ON kuma_nodes');
        $this->addSql('CREATE INDEX idx_node_internal_name ON kuma_nodes (internal_name)');
        $this->addSql('DROP INDEX idx_ref_entity_name ON kuma_nodes');
        $this->addSql('CREATE INDEX idx_node_ref_entity_name ON kuma_nodes (ref_entity_name)');
        $this->addSql('DROP INDEX idx_lang_url ON kuma_node_translations');
        $this->addSql('CREATE INDEX idx__node_translation_lang_url ON kuma_node_translations (lang, url)');
        $this->addSql('DROP INDEX idx_kuma_lookup ON kuma_node_versions');
        $this->addSql('CREATE INDEX idx_node_version_lookup ON kuma_node_versions (ref_id, ref_entity_name)');
        $this->addSql('DROP INDEX idx_lookup ON kuma_seo');
        $this->addSql('CREATE INDEX idx_seo_lookup ON kuma_seo (ref_id, ref_entity_name)');
        $this->addSql('DROP INDEX idx_internal_name ON kuma_folders');
        $this->addSql('CREATE INDEX idx_folder_internal_name ON kuma_folders (internal_name)');
        $this->addSql('DROP INDEX idx_name ON kuma_folders');
        $this->addSql('CREATE INDEX idx_folder_name ON kuma_folders (name)');
        $this->addSql('DROP INDEX idx_deleted ON kuma_folders');
        $this->addSql('CREATE INDEX idx_folder_deleted ON kuma_folders (deleted)');
        $this->addSql('DROP INDEX idx_name ON kuma_media');
        $this->addSql('CREATE INDEX idx_media_name ON kuma_media (name)');
        $this->addSql('DROP INDEX idx_deleted ON kuma_media');
        $this->addSql('CREATE INDEX idx_media_deleted ON kuma_media (deleted)');
        $this->addSql('DROP INDEX idx_ref ON kuma_acl_changesets');
        $this->addSql('CREATE INDEX idx_acl_changeset_ref ON kuma_acl_changesets (ref_id, ref_entity_name)');
        $this->addSql('DROP INDEX idx_kuma_search ON kuma_page_part_refs');
        $this->addSql('CREATE INDEX idx_page_part_search ON kuma_page_part_refs (pageId, pageEntityname, context)');
        $this->addSql('DROP INDEX idx_kuma_search ON kuma_page_template_configuration');
        $this->addSql('CREATE INDEX idx_page_template_config_search ON kuma_page_template_configuration (page_id, page_entity_name)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE kuma_nodes_search');
        $this->addSql('DROP TABLE pydev_websitebundle_search_page');
        $this->addSql('DROP INDEX idx_acl_changeset_ref ON kuma_acl_changesets');
        $this->addSql('CREATE INDEX idx_ref ON kuma_acl_changesets (ref_id, ref_entity_name)');
        $this->addSql('DROP INDEX idx_folder_internal_name ON kuma_folders');
        $this->addSql('CREATE INDEX idx_internal_name ON kuma_folders (internal_name)');
        $this->addSql('DROP INDEX idx_folder_name ON kuma_folders');
        $this->addSql('CREATE INDEX idx_name ON kuma_folders (name)');
        $this->addSql('DROP INDEX idx_folder_deleted ON kuma_folders');
        $this->addSql('CREATE INDEX idx_deleted ON kuma_folders (deleted)');
        $this->addSql('DROP INDEX idx_media_name ON kuma_media');
        $this->addSql('CREATE INDEX idx_name ON kuma_media (name)');
        $this->addSql('DROP INDEX idx_media_deleted ON kuma_media');
        $this->addSql('CREATE INDEX idx_deleted ON kuma_media (deleted)');
        $this->addSql('DROP INDEX idx__node_translation_lang_url ON kuma_node_translations');
        $this->addSql('CREATE INDEX idx_lang_url ON kuma_node_translations (lang, url)');
        $this->addSql('DROP INDEX idx_node_version_lookup ON kuma_node_versions');
        $this->addSql('CREATE INDEX idx_kuma_lookup ON kuma_node_versions (ref_id, ref_entity_name)');
        $this->addSql('DROP INDEX idx_node_internal_name ON kuma_nodes');
        $this->addSql('CREATE INDEX idx_internal_name ON kuma_nodes (internal_name)');
        $this->addSql('DROP INDEX idx_node_ref_entity_name ON kuma_nodes');
        $this->addSql('CREATE INDEX idx_ref_entity_name ON kuma_nodes (ref_entity_name)');
        $this->addSql('DROP INDEX idx_page_part_search ON kuma_page_part_refs');
        $this->addSql('CREATE INDEX idx_kuma_search ON kuma_page_part_refs (pageId, pageEntityname, context)');
        $this->addSql('DROP INDEX idx_page_template_config_search ON kuma_page_template_configuration');
        $this->addSql('CREATE INDEX idx_kuma_search ON kuma_page_template_configuration (page_id, page_entity_name)');
        $this->addSql('DROP INDEX idx_seo_lookup ON kuma_seo');
        $this->addSql('CREATE INDEX idx_lookup ON kuma_seo (ref_id, ref_entity_name)');
    }
}
