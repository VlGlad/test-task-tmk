<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository\Article;

use App\Domain\Entity\Article\Article;
use App\Domain\Repository\Article\ArticleRepositoryInterface;
use App\Domain\RepositoryFilter\Article\ArticleFilter;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ObjectRepository;
use DomainException;

class ArticleRepository implements ArticleRepositoryInterface
{
    private ObjectRepository $repository;

    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repository = $em->getRepository(Article::class);
    }

    private function qbAll(ArticleFilter $filter): QueryBuilder
    {
        $ex = $this->em->getExpressionBuilder();
        $qb = $this->em->createQueryBuilder()
            ->select('a')
            ->from(Article::class, 'a');

        if ($filter->isActive !== null) {
            $qb->andWhere($ex->eq('a.isActive', ':isActive'))
                ->setParameter('isActive', $filter->isActive);
        }

        return $qb;
    }

    /**
     * @inheritDoc
     */
    public function findArticles(ArticleFilter $filter): array
    {
        return $this
            ->qbAll($filter)
            ->getQuery()
            ->getResult();
    }

    /**
     * @inheritDoc
     */
    public function findBySlug(string $slug): Article
    {
        $article = $this->repository->findOneBy(['slug' => $slug]);
        if (!$article instanceof Article) {
            throw new DomainException('Article not found.');
        }

        return $article;
    }
}
