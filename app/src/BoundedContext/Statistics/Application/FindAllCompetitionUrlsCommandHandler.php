<?php

declare(strict_types=1);

namespace App\BoundedContext\Statistics\Application;

use App\Repository\CompetitionUrlRepository;

final class FindAllCompetitionUrlsCommandHandler
{
    public function __construct(
        private readonly CompetitionUrlRepository $competitionUrlRepository,
    ) {
    }

    public function __invoke(FindAllCompetitionUrlsCommand $command): CompetitionUrlsResponse
    {
        $competitionUrls = $this->competitionUrlRepository->findBy(['enabled' => true]);

        $competitionUrlsResponse = [];

        foreach ($competitionUrls as $competitionUrl) {
            $competitionUrlsResponse[] = new CompetitionUrlResponse(
                $competitionUrl->competition()->id(),
                $competitionUrl->competition()->name(),
                $competitionUrl->url(),
            );
        }

        return new CompetitionUrlsResponse($competitionUrlsResponse);
    }
}