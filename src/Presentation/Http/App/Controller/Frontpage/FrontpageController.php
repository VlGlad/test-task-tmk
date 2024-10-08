<?php

declare(strict_types=1);

namespace App\Presentation\Http\App\Controller\Frontpage;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Domain\Service\Article\ArticleServiceInterface;

#[Route(path: '/', name: 'app_frontpage')]
class FrontpageController extends AbstractController
{
    private ArticleServiceInterface $articleService;

    public function __construct(ArticleServiceInterface $articleService) {
        $this->articleService = $articleService;
    }

    public function __invoke(): Response
    {
        $article = $this->articleService->getList();

        return $this->render('app/page/frontpage/page.html.twig', ['articles' => $article]);
    }
}
