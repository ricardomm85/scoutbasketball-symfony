<?php

declare(strict_types=1);

namespace App\BoundedContext\Statistics\Application;

final readonly class CompetitionUrlsResponse
{
    /**
     * @var CompetitionUrlResponse[] $competitionUrlsResponse
     */
    public function __construct(
        public array $responses,
    ) {
    }
}
