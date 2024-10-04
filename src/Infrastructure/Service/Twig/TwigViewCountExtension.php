<?php

declare(strict_types=1);

namespace App\Infrastructure\Service\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TwigViewCountExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('viewsFormat', [$this, 'formatViews']),
        ];
    }

    public function formatViews(int $viewCount): int|string
    {
        if ($viewCount >= 1000000000) {
            return round($viewCount / 1000000000) . 'B';
        } elseif ($viewCount >= 1000000) {
            return round($viewCount / 1000000) . 'M';
        } elseif ($viewCount >= 1000) {
            return round($viewCount / 1000) . 'K';
        } elseif ($viewCount > 50) {
            return intval(round($viewCount / 50)) * 50;
        }
    
        return $viewCount;
    }
}