<?php

declare(strict_types=1);

namespace App\BoundedContext\Statistics\Application;

final readonly class AnalyzeCompetitionUrlCommand
{
    public function __construct(
        public string $url,
        public string $slug,
        public string $name,
    ) {
    }
}
