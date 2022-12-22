<?php

declare(strict_types=1);

namespace App\BoundedContext\Statistics\Application;

final readonly class CompetitionUrlResponse
{
    public function __construct(
        public string $slug,
        public string $name,
        public string $url,
    ) {
    }
}
