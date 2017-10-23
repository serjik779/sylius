<?php

namespace Sylius\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171019122908 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sylius_authors_books DROP FOREIGN KEY FK_C15A97E5F675F31B');
        $this->addSql('ALTER TABLE sylius_authors_books DROP FOREIGN KEY FK_C15A97E516A2B381');
        $this->addSql('ALTER TABLE sylius_libraries_books DROP FOREIGN KEY FK_D9B2D6AF16A2B381');
        $this->addSql('ALTER TABLE sylius_libraries_books DROP FOREIGN KEY FK_D9B2D6AFFE2541D7');
        $this->addSql('CREATE TABLE sylius_book (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, year_issue DATETIME NOT NULL, UNIQUE INDEX UNIQ_10EC46B82B36786B (title), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_library (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_library_book (library_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_A9EC619DFE2541D7 (library_id), INDEX IDX_A9EC619D16A2B381 (book_id), PRIMARY KEY(library_id, book_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_author (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, year_birth DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_author_book (author_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_88485217F675F31B (author_id), INDEX IDX_8848521716A2B381 (book_id), PRIMARY KEY(author_id, book_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sylius_library_book ADD CONSTRAINT FK_A9EC619DFE2541D7 FOREIGN KEY (library_id) REFERENCES sylius_library (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_library_book ADD CONSTRAINT FK_A9EC619D16A2B381 FOREIGN KEY (book_id) REFERENCES sylius_book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_author_book ADD CONSTRAINT FK_88485217F675F31B FOREIGN KEY (author_id) REFERENCES sylius_author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_author_book ADD CONSTRAINT FK_8848521716A2B381 FOREIGN KEY (book_id) REFERENCES sylius_book (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE sylius_authors');
        $this->addSql('DROP TABLE sylius_authors_books');
        $this->addSql('DROP TABLE sylius_books');
        $this->addSql('DROP TABLE sylius_libraries');
        $this->addSql('DROP TABLE sylius_libraries_books');
        $this->addSql('ALTER TABLE sylius_slider_images CHANGE type type VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_channel_pricing CHANGE original_price original_price INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bitbag_cms_block_translation CHANGE name name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE bitbag_cms_image CHANGE type type VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE bitbag_cms_page_translation CHANGE slug slug VARCHAR(255) DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE metaKeywords metaKeywords VARCHAR(1000) DEFAULT NULL, CHANGE metaDescription metaDescription VARCHAR(2000) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_adjustment CHANGE order_id order_id INT DEFAULT NULL, CHANGE order_item_id order_item_id INT DEFAULT NULL, CHANGE order_item_unit_id order_item_unit_id INT DEFAULT NULL, CHANGE `label` `label` VARCHAR(255) DEFAULT NULL, CHANGE origin_code origin_code VARCHAR(255) DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_exchange_rate CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_currency CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_locale CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_attribute CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_association CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_variant_translation CHANGE name name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_attribute_value CHANGE boolean_value boolean_value TINYINT(1) DEFAULT NULL, CHANGE integer_value integer_value INT DEFAULT NULL, CHANGE float_value float_value DOUBLE PRECISION DEFAULT NULL, CHANGE datetime_value datetime_value DATETIME DEFAULT NULL, CHANGE date_value date_value DATE DEFAULT NULL, CHANGE json_value json_value LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json_array)\'');
        $this->addSql('ALTER TABLE sylius_product_association_type CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_option CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_association_type_translation CHANGE name name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_tax_category CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_shipping_category CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_shipping_method_translation CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_promotion_action CHANGE promotion_id promotion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_promotion_rule CHANGE promotion_id promotion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_zone_member CHANGE belongs_to belongs_to INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_province CHANGE abbreviation abbreviation VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_address_log_entries CHANGE object_id object_id VARCHAR(64) DEFAULT NULL, CHANGE username username VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_zone CHANGE scope scope VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_user_oauth CHANGE user_id user_id INT DEFAULT NULL, CHANGE access_token access_token VARCHAR(255) DEFAULT NULL, CHANGE refresh_token refresh_token VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_order CHANGE shipping_address_id shipping_address_id INT DEFAULT NULL, CHANGE billing_address_id billing_address_id INT DEFAULT NULL, CHANGE channel_id channel_id INT DEFAULT NULL, CHANGE promotion_coupon_id promotion_coupon_id INT DEFAULT NULL, CHANGE customer_id customer_id INT DEFAULT NULL, CHANGE number number VARCHAR(255) DEFAULT NULL, CHANGE checkout_completed_at checkout_completed_at DATETIME DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE token_value token_value VARCHAR(255) DEFAULT NULL, CHANGE customer_ip customer_ip VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_payment CHANGE method_id method_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_shop_user CHANGE username username VARCHAR(255) DEFAULT NULL, CHANGE username_canonical username_canonical VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE password_reset_token password_reset_token VARCHAR(255) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL, CHANGE email_verification_token email_verification_token VARCHAR(255) DEFAULT NULL, CHANGE verified_at verified_at DATETIME DEFAULT NULL, CHANGE expires_at expires_at DATETIME DEFAULT NULL, CHANGE credentials_expire_at credentials_expire_at DATETIME DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE email_canonical email_canonical VARCHAR(255) DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_translation CHANGE meta_keywords meta_keywords VARCHAR(255) DEFAULT NULL, CHANGE meta_description meta_description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_address CHANGE customer_id customer_id INT DEFAULT NULL, CHANGE phone_number phone_number VARCHAR(255) DEFAULT NULL, CHANGE company company VARCHAR(255) DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE province_code province_code VARCHAR(255) DEFAULT NULL, CHANGE province_name province_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_promotion_coupon CHANGE promotion_id promotion_id INT DEFAULT NULL, CHANGE usage_limit usage_limit INT DEFAULT NULL, CHANGE expires_at expires_at DATETIME DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE per_customer_usage_limit per_customer_usage_limit INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_channel CHANGE default_tax_zone_id default_tax_zone_id INT DEFAULT NULL, CHANGE color color VARCHAR(255) DEFAULT NULL, CHANGE hostname hostname VARCHAR(255) DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE theme_name theme_name VARCHAR(255) DEFAULT NULL, CHANGE contact_email contact_email VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_tax_rate CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_promotion CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE usage_limit usage_limit INT DEFAULT NULL, CHANGE starts_at starts_at DATETIME DEFAULT NULL, CHANGE ends_at ends_at DATETIME DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_taxon_image CHANGE type type VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product CHANGE main_taxon_id main_taxon_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_taxon CHANGE tree_root tree_root INT DEFAULT NULL, CHANGE parent_id parent_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_customer CHANGE customer_group_id customer_group_id INT DEFAULT NULL, CHANGE default_address_id default_address_id INT DEFAULT NULL, CHANGE first_name first_name VARCHAR(255) DEFAULT NULL, CHANGE last_name last_name VARCHAR(255) DEFAULT NULL, CHANGE birthday birthday DATETIME DEFAULT NULL, CHANGE gender gender VARCHAR(1) DEFAULT \'u\' NOT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE phone_number phone_number VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_review CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_variant CHANGE tax_category_id tax_category_id INT DEFAULT NULL, CHANGE shipping_category_id shipping_category_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE width width DOUBLE PRECISION DEFAULT NULL, CHANGE height height DOUBLE PRECISION DEFAULT NULL, CHANGE depth depth DOUBLE PRECISION DEFAULT NULL, CHANGE weight weight DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_shipping_method CHANGE category_id category_id INT DEFAULT NULL, CHANGE tax_category_id tax_category_id INT DEFAULT NULL, CHANGE archived_at archived_at DATETIME DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_order_item_unit CHANGE shipment_id shipment_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_shipment CHANGE tracking tracking VARCHAR(255) DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_admin_user CHANGE username username VARCHAR(255) DEFAULT NULL, CHANGE username_canonical username_canonical VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE password_reset_token password_reset_token VARCHAR(255) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL, CHANGE email_verification_token email_verification_token VARCHAR(255) DEFAULT NULL, CHANGE verified_at verified_at DATETIME DEFAULT NULL, CHANGE expires_at expires_at DATETIME DEFAULT NULL, CHANGE credentials_expire_at credentials_expire_at DATETIME DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE email_canonical email_canonical VARCHAR(255) DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE first_name first_name VARCHAR(255) DEFAULT NULL, CHANGE last_name last_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_image CHANGE type type VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_payment_method CHANGE gateway_config_id gateway_config_id INT DEFAULT NULL, CHANGE environment environment VARCHAR(255) DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_payment_security_token CHANGE details details LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:object)\'');
        $this->addSql('ALTER TABLE sylius_admin_api_refresh_token CHANGE client_id client_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE expires_at expires_at INT DEFAULT NULL, CHANGE scope scope VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_admin_api_access_token CHANGE client_id client_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE expires_at expires_at INT DEFAULT NULL, CHANGE scope scope VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_admin_api_auth_code CHANGE client_id client_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE expires_at expires_at INT DEFAULT NULL, CHANGE scope scope VARCHAR(255) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sylius_library_book DROP FOREIGN KEY FK_A9EC619D16A2B381');
        $this->addSql('ALTER TABLE sylius_author_book DROP FOREIGN KEY FK_8848521716A2B381');
        $this->addSql('ALTER TABLE sylius_library_book DROP FOREIGN KEY FK_A9EC619DFE2541D7');
        $this->addSql('ALTER TABLE sylius_author_book DROP FOREIGN KEY FK_88485217F675F31B');
        $this->addSql('CREATE TABLE sylius_authors (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, lastname VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, year_birth DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_authors_books (author_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_C15A97E5F675F31B (author_id), INDEX IDX_C15A97E516A2B381 (book_id), PRIMARY KEY(author_id, book_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_books (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, description LONGTEXT NOT NULL COLLATE utf8_unicode_ci, year_issue DATETIME NOT NULL, UNIQUE INDEX UNIQ_DEA418F32B36786B (title), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_libraries (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, address VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_libraries_books (library_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_D9B2D6AFFE2541D7 (library_id), INDEX IDX_D9B2D6AF16A2B381 (book_id), PRIMARY KEY(library_id, book_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sylius_authors_books ADD CONSTRAINT FK_C15A97E516A2B381 FOREIGN KEY (book_id) REFERENCES sylius_books (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_authors_books ADD CONSTRAINT FK_C15A97E5F675F31B FOREIGN KEY (author_id) REFERENCES sylius_authors (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_libraries_books ADD CONSTRAINT FK_D9B2D6AF16A2B381 FOREIGN KEY (book_id) REFERENCES sylius_books (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_libraries_books ADD CONSTRAINT FK_D9B2D6AFFE2541D7 FOREIGN KEY (library_id) REFERENCES sylius_libraries (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE sylius_book');
        $this->addSql('DROP TABLE sylius_library');
        $this->addSql('DROP TABLE sylius_library_book');
        $this->addSql('DROP TABLE sylius_author');
        $this->addSql('DROP TABLE sylius_author_book');
        $this->addSql('ALTER TABLE bitbag_cms_block_translation CHANGE name name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE bitbag_cms_image CHANGE type type VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE bitbag_cms_page_translation CHANGE slug slug VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE name name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE metaKeywords metaKeywords VARCHAR(1000) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE metaDescription metaDescription VARCHAR(2000) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_address CHANGE customer_id customer_id INT DEFAULT NULL, CHANGE phone_number phone_number VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE company company VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\', CHANGE province_code province_code VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE province_name province_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_address_log_entries CHANGE object_id object_id VARCHAR(64) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE username username VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_adjustment CHANGE order_id order_id INT DEFAULT NULL, CHANGE order_item_id order_item_id INT DEFAULT NULL, CHANGE order_item_unit_id order_item_unit_id INT DEFAULT NULL, CHANGE `label` `label` VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE origin_code origin_code VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_admin_api_access_token CHANGE client_id client_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE expires_at expires_at INT DEFAULT NULL, CHANGE scope scope VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_admin_api_auth_code CHANGE client_id client_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE expires_at expires_at INT DEFAULT NULL, CHANGE scope scope VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_admin_api_refresh_token CHANGE client_id client_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE expires_at expires_at INT DEFAULT NULL, CHANGE scope scope VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_admin_user CHANGE username username VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE username_canonical username_canonical VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE password_reset_token password_reset_token VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\', CHANGE email_verification_token email_verification_token VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE verified_at verified_at DATETIME DEFAULT \'NULL\', CHANGE expires_at expires_at DATETIME DEFAULT \'NULL\', CHANGE credentials_expire_at credentials_expire_at DATETIME DEFAULT \'NULL\', CHANGE email email VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE email_canonical email_canonical VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\', CHANGE first_name first_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE last_name last_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_channel CHANGE default_tax_zone_id default_tax_zone_id INT DEFAULT NULL, CHANGE color color VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE hostname hostname VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\', CHANGE theme_name theme_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE contact_email contact_email VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_channel_pricing CHANGE original_price original_price INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_currency CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_customer CHANGE customer_group_id customer_group_id INT DEFAULT NULL, CHANGE default_address_id default_address_id INT DEFAULT NULL, CHANGE first_name first_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE last_name last_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE birthday birthday DATETIME DEFAULT \'NULL\', CHANGE gender gender VARCHAR(1) DEFAULT \'\'u\'\' NOT NULL COLLATE utf8_unicode_ci, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\', CHANGE phone_number phone_number VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_exchange_rate CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_locale CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_order CHANGE shipping_address_id shipping_address_id INT DEFAULT NULL, CHANGE billing_address_id billing_address_id INT DEFAULT NULL, CHANGE channel_id channel_id INT DEFAULT NULL, CHANGE promotion_coupon_id promotion_coupon_id INT DEFAULT NULL, CHANGE customer_id customer_id INT DEFAULT NULL, CHANGE number number VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE checkout_completed_at checkout_completed_at DATETIME DEFAULT \'NULL\', CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\', CHANGE token_value token_value VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE customer_ip customer_ip VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_order_item_unit CHANGE shipment_id shipment_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_payment CHANGE method_id method_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_payment_method CHANGE gateway_config_id gateway_config_id INT DEFAULT NULL, CHANGE environment environment VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_payment_security_token CHANGE details details LONGTEXT DEFAULT \'NULL\' COLLATE utf8_unicode_ci COMMENT \'(DC2Type:object)\'');
        $this->addSql('ALTER TABLE sylius_product CHANGE main_taxon_id main_taxon_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_product_association CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_product_association_type CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_product_association_type_translation CHANGE name name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_product_attribute CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_product_attribute_value CHANGE boolean_value boolean_value TINYINT(1) DEFAULT \'NULL\', CHANGE integer_value integer_value INT DEFAULT NULL, CHANGE float_value float_value DOUBLE PRECISION DEFAULT \'NULL\', CHANGE datetime_value datetime_value DATETIME DEFAULT \'NULL\', CHANGE date_value date_value DATE DEFAULT \'NULL\', CHANGE json_value json_value LONGTEXT DEFAULT \'NULL\' COLLATE utf8_unicode_ci COMMENT \'(DC2Type:json_array)\'');
        $this->addSql('ALTER TABLE sylius_product_image CHANGE type type VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_product_option CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_product_review CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_product_translation CHANGE meta_keywords meta_keywords VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE meta_description meta_description VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_product_variant CHANGE tax_category_id tax_category_id INT DEFAULT NULL, CHANGE shipping_category_id shipping_category_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\', CHANGE width width DOUBLE PRECISION DEFAULT \'NULL\', CHANGE height height DOUBLE PRECISION DEFAULT \'NULL\', CHANGE depth depth DOUBLE PRECISION DEFAULT \'NULL\', CHANGE weight weight DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_product_variant_translation CHANGE name name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_promotion CHANGE description description VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE usage_limit usage_limit INT DEFAULT NULL, CHANGE starts_at starts_at DATETIME DEFAULT \'NULL\', CHANGE ends_at ends_at DATETIME DEFAULT \'NULL\', CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_promotion_action CHANGE promotion_id promotion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_promotion_coupon CHANGE promotion_id promotion_id INT DEFAULT NULL, CHANGE usage_limit usage_limit INT DEFAULT NULL, CHANGE expires_at expires_at DATETIME DEFAULT \'NULL\', CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\', CHANGE per_customer_usage_limit per_customer_usage_limit INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_promotion_rule CHANGE promotion_id promotion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_province CHANGE abbreviation abbreviation VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_shipment CHANGE tracking tracking VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_shipping_category CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_shipping_method CHANGE category_id category_id INT DEFAULT NULL, CHANGE tax_category_id tax_category_id INT DEFAULT NULL, CHANGE archived_at archived_at DATETIME DEFAULT \'NULL\', CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_shipping_method_translation CHANGE description description VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_shop_user CHANGE username username VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE username_canonical username_canonical VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE password_reset_token password_reset_token VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\', CHANGE email_verification_token email_verification_token VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE verified_at verified_at DATETIME DEFAULT \'NULL\', CHANGE expires_at expires_at DATETIME DEFAULT \'NULL\', CHANGE credentials_expire_at credentials_expire_at DATETIME DEFAULT \'NULL\', CHANGE email email VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE email_canonical email_canonical VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_slider_images CHANGE type type VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_tax_category CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_tax_rate CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_taxon CHANGE tree_root tree_root INT DEFAULT NULL, CHANGE parent_id parent_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sylius_taxon_image CHANGE type type VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_user_oauth CHANGE user_id user_id INT DEFAULT NULL, CHANGE access_token access_token VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE refresh_token refresh_token VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_zone CHANGE scope scope VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_zone_member CHANGE belongs_to belongs_to INT DEFAULT NULL');
    }
}
