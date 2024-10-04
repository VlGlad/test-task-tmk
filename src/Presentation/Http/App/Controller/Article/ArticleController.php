<?php

declare(strict_types=1);

namespace App\Presentation\Http\App\Controller\Article;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Domain\Service\Article\ArticleServiceInterface;

#[Route(path: '/article', name: 'app_article')]
class ArticleController extends AbstractController
{
    private ArticleServiceInterface $articleService;

    public function __construct(ArticleServiceInterface $articleService) {
        $this->articleService = $articleService;
    }

    #[Route(path: '/{slug}', name: 'app_article', methods: ["GET"])]
    public function __invoke(string $slug): Response
    {
        $article = $this->articleService->getBySlug($slug);

        return $this->render('app/page/article/article.html.twig', ['article' => $article]);
    }
}
