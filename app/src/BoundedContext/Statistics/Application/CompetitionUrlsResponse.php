<?php

declare(strict_types=1);

namespace App\BoundedContext\Statistics\Application;

final readonly class CompetitionUrlsResponse
{
    /**
     * @param CompetitionUrlResponse[] $responses
     */
    public function __construct(
        public array $responses,
    ) {
    }
}
