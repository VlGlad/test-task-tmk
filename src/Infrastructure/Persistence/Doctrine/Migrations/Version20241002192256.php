<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241002192256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(36) NOT NULL, is_active TINYINT(1) NOT NULL, view_count INT NOT NULL, description LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql("
            INSERT INTO article (title, slug, is_active, view_count, description, created_at)
            VALUES
            ('Первая статья', '122ca8c4-9416-47fe-bf2d-eed39ab59150', 1, 10, 'Описание первой статьи', NOW()),
            ('Вторая статья', 'a09f7ed8-f532-452f-9d28-79222e63d2dc', 1, 1500, 'Описание второй статьи', NOW()),
            ('Третья статья', '5b92bfc9-1b26-4cd7-aa88-4efdce51ff4d', 0, 17000, 'Описание третьей статьи', NOW()),
            ('Четвёртая статья', '155690f5-536a-42c8-8b43-75a76df440ae', 1, 100300, 'Описание четвёртой статьи', NOW()),
            ('Пятая статья', 'd61635ed-adda-45aa-aac0-e341bcd5de12', 1, 500, 'Описание пятой статьи', NOW());
        ");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE article');
    }
}
