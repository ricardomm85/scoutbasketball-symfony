<?php

declare(strict_types=1);

namespace App\BoundedContext\Statistics\Application;

use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class AnalyzeCompetitionUrlCommandHandler
{
    public function __invoke(AnalyzeCompetitionUrlCommand $command): void
    {
        // @TODO
        var_dump(
            $command->url,
            $command->slug,
            $command->name,
        );
    }
}
