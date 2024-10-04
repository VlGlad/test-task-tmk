<?php

declare(strict_types=1);

namespace App\Application\Service\Article;

use App\Domain\Entity\Article\Article;
use App\Domain\Service\Article\ArticleServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Domain\Repository\Article\ArticleRepositoryInterface;
use App\Domain\RepositoryFilter\Article\ArticleFilter;

/**
 * @api
 * Interface ArticleServiceInterface
 * @package App\Domain\Service\Article
 *
 * Api service for articles management
 */
class ArticleService implements ArticleServiceInterface
{
    private EntityManagerInterface $em;

    private ArticleRepositoryInterface $repository;
    
    public function __construct(EntityManagerInterface $em, ArticleRepositoryInterface $repository) {
        $this->em = $em;
        $this->repository = $repository;
    }

    /**
     * @inheritDoc
     */
    public function getList(bool $state = true): array
    {
        $filter = new ArticleFilter($state);
        $res = $this->repository->findArticles($filter);
        return $res;
    }

    /**
     * @inheritDoc
     */
    public function getBySlug(string $slug): ?Article
    {
        return $this->repository->findBySlug($slug);
    }
}