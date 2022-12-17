<?php

declare(strict_types=1);

namespace App\Command\Statistics;

use App\BoundedContext\Statistics\Application\FindAllCompetitionUrlsCommand;
use App\BoundedContext\Statistics\Application\FindAllCompetitionUrlsCommandHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class AnalyseCompetitionSeasonsCommand extends Command
{
    public function __construct(
        private readonly FindAllCompetitionUrlsCommandHandler $findAllCompetitionUrlsCommandHandler,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('app:competitions:analyse')
            ->setDescription('Enqueue a job for each active competition url to FetchAndSaveSeasons');
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // @TODO command bus
        $command = new FindAllCompetitionUrlsCommand();
        $competitionUrls = $this->findAllCompetitionUrlsCommandHandler->__invoke($command);

        // @TODO create job for each url

        return Command::SUCCESS;
    }
}