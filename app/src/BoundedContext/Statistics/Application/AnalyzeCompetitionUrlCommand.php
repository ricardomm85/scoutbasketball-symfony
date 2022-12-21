<?php

declare(strict_types=1);

namespace App\BoundedContext\Statistics\Application;

final class AnalyzeCompetitionUrlCommand
{
    public function __construct(
        public readonly string $url,
        public readonly string $slug,
        public readonly string $name,
    ) {
    }
}
