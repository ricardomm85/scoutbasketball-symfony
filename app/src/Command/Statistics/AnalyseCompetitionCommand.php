<?php

declare(strict_types=1);

namespace App\Command\Statistics;

use App\BoundedContext\Statistics\Application\AnalyzeCompetitionUrlCommand;
use App\BoundedContext\Statistics\Application\FindAllCompetitionUrlsCommand;
use App\BoundedContext\Statistics\Application\FindAllCompetitionUrlsCommandHandler;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(name: 'app:competitions:analyse')]
final class AnalyseCompetitionCommand extends Command
{
    public function __construct(
        private readonly FindAllCompetitionUrlsCommandHandler $findAllCompetitionUrlsCommandHandler,
        private readonly MessageBusInterface $bus,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('Enqueue a job for each active competition url');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $command = new FindAllCompetitionUrlsCommand();
        $competitionUrls = $this->findAllCompetitionUrlsCommandHandler->__invoke($command);

        foreach ($competitionUrls->responses as $competitionUrl) {
            $command = new AnalyzeCompetitionUrlCommand(
                url: $competitionUrl->url,
                slug: $competitionUrl->slug,
                name: $competitionUrl->name,
            );
            $this->bus->dispatch($command);
        }

        return Command::SUCCESS;
    }
}
