<?php

declare(strict_types=1);

namespace App\BoundedContext\Statistics\Application;

final class CompetitionUrlResponse
{
    public function __construct(
        public readonly int $competitionId,
        public readonly string $name,
        public readonly string $url,
    ) {
    }
}
