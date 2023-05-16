<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230515213130 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F091A65C546');
        $this->addSql('DROP INDEX IDX_52EA1F091A65C546 ON order_item');
        $this->addSql('ALTER TABLE order_item ADD order_ref_id INT NOT NULL, DROP no_id');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F09E238517C FOREIGN KEY (order_ref_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_52EA1F09E238517C ON order_item (order_ref_id)');
        $this->addSql('ALTER TABLE product CHANGE description description LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09E238517C');
        $this->addSql('DROP INDEX IDX_52EA1F09E238517C ON order_item');
        $this->addSql('ALTER TABLE order_item ADD no_id INT DEFAULT NULL, DROP order_ref_id');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F091A65C546 FOREIGN KEY (no_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_52EA1F091A65C546 ON order_item (no_id)');
        $this->addSql('ALTER TABLE product CHANGE description description LONGTEXT DEFAULT NULL');
    }
}
