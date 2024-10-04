<?php

declare(strict_types=1);

namespace App\Domain\Repository\Article;

use App\Domain\Entity\Article\Article;
use App\Domain\RepositoryFilter\Article\ArticleFilter;
use DomainException;

interface ArticleRepositoryInterface
{
    /**
     * Найти статью по фильтру
     *
     * @param ArticleFilter $filter
     *
     * @return array
     */
    public function findArticles(ArticleFilter $filter): array;

    /**
     * Найти статью по Slug
     *
     * @param int $id
     *
     * @return Article
     *
     * @throws DomainException
     */
    public function findBySlug(string $slug): Article;
}
