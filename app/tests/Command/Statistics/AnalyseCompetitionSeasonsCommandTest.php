<?php

declare(strict_types=1);

namespace App\Tests\Command\Statistics;

use App\Entity\Competition;
use App\Entity\CompetitionUrl;
use App\Tests\Repository\DatabaseTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class AnalyseCompetitionSeasonsCommandTest extends DatabaseTestCase
{

    public function testExecute(): void
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);


        $competition = new Competition();
        $competition->setName('Test');
        $this->entityManager->persist($competition);

        $competitionUrl = new CompetitionUrl();
        $competitionUrl->setUrl('https://example.com');
        $competitionUrl->setEnabled(true);
        $competitionUrl->setCompetition($competition);
        $this->entityManager->persist($competitionUrl);

        $competitionUrl = new CompetitionUrl();
        $competitionUrl->setUrl('https://example.com');
        $competitionUrl->setEnabled(false);
        $competitionUrl->setCompetition($competition);
        $this->entityManager->persist($competitionUrl);

        $this->entityManager->flush();

        $command = $application->find('app:competitions:analyse');
        $commandTester = new CommandTester($command);
        $commandTester->execute([]);
        $commandTester->assertCommandIsSuccessful();

        // @TODO assert jobs are being created
    }
}
