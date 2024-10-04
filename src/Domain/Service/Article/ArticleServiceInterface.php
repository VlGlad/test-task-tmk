<?php

declare(strict_types=1);

namespace App\Domain\Service\Article;

use App\Domain\Entity\Article\Article;

/**
 * @api
 * Interface ArticleServiceInterface
 * @package App\Domain\Service\Article
 *
 * Api service for articles management
 */
interface ArticleServiceInterface
{
    /**
     * @param array|null $criteria
     * @return array
     */
    public function getList(bool $state = true): array;

    /**
     * @param string $slug
     * @return Article|null
     */
    public function getBySlug(string $slug): ?Article;
}