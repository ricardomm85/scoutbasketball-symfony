<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Domain\Enum\Role;
use App\Factory\CompetitionUrlFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->users();
        $this->competitions();

        $manager->flush();
    }

    private function users(): void
    {
        UserFactory::createOne([
            'email' => 'ricardo@scoutbasketball.com',
            'plainPassword' => 'a',
            'roles' => [Role::ADMIN->value],
        ]);
        UserFactory::createOne([
            'email' => 'ricardo2@scoutbasketball.com',
        ]);
        UserFactory::createMany(9);
    }

    private function competitions(): void
    {
        CompetitionUrlFactory::createMany(10);
    }
}
