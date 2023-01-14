<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Competition;
use App\Infrastructure\Inflector;
use App\Repository\CompetitionRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Competition>
 *
 * @method        Competition|Proxy create(array|callable $attributes = [])
 * @method static Competition|Proxy createOne(array $attributes = [])
 * @method static Competition|Proxy find(object|array|mixed $criteria)
 * @method static Competition|Proxy findOrCreate(array $attributes)
 * @method static Competition|Proxy first(string $sortedField = 'id')
 * @method static Competition|Proxy last(string $sortedField = 'id')
 * @method static Competition|Proxy random(array $attributes = [])
 * @method static Competition|Proxy randomOrCreate(array $attributes = [])
 * @method static CompetitionRepository|RepositoryProxy repository()
 * @method static Competition[]|Proxy[] all()
 * @method static Competition[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Competition[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Competition[]|Proxy[] findBy(array $attributes)
 * @method static Competition[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Competition[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class CompetitionFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     */
    public function __construct(
        private readonly Inflector $inflector,
    ) {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function getDefaults(): array
    {
        $name = self::faker()->text(33);
        return [
            'name' => $name,
            'slug' => $this->inflector->toSlug($name),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Competition $competition): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Competition::class;
    }
}
