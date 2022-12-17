<?php

declare(strict_types=1);

namespace App\BoundedContext\Statistics\Application;

final class CompetitionUrlsResponse
{
    /**
     * @var CompetitionUrlResponse[] $competitionUrlsResponse
     */
    public function __construct(
        public readonly array $competitionUrlsResponse,
    ) {
    }
}
