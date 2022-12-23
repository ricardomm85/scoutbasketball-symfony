<?php

declare(strict_types=1);

namespace App\Tests\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use LogicException;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

abstract class DatabaseTestCase extends KernelTestCase
{
    protected EntityManagerInterface $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        if ($kernel->getEnvironment() !== 'test') {
            throw new LogicException(
                "Using '{$kernel->getEnvironment()}' environment, but 'test' environment is expected."
            );
        }

        $this->entityManager = $kernel->getContainer()->get('doctrine.orm.entity_manager');

        $this->initDatabase($this->entityManager);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
    }

    private function initDatabase(EntityManagerInterface $entityManager): void
    {
        $metaData = $entityManager->getMetadataFactory()->getAllMetadata();
        $schemaTool = new SchemaTool($entityManager);
        $schemaTool->updateSchema($metaData);
    }
}
