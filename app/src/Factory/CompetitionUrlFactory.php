<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\CompetitionUrl;
use App\Repository\CompetitionUrlRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<CompetitionUrl>
 *
 * @method        CompetitionUrl|Proxy create(array|callable $attributes = [])
 * @method static CompetitionUrl|Proxy createOne(array $attributes = [])
 * @method static CompetitionUrl|Proxy find(object|array|mixed $criteria)
 * @method static CompetitionUrl|Proxy findOrCreate(array $attributes)
 * @method static CompetitionUrl|Proxy first(string $sortedField = 'id')
 * @method static CompetitionUrl|Proxy last(string $sortedField = 'id')
 * @method static CompetitionUrl|Proxy random(array $attributes = [])
 * @method static CompetitionUrl|Proxy randomOrCreate(array $attributes = [])
 * @method static CompetitionUrlRepository|RepositoryProxy repository()
 * @method static CompetitionUrl[]|Proxy[] all()
 * @method static CompetitionUrl[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static CompetitionUrl[]|Proxy[] createSequence(array|callable $sequence)
 * @method static CompetitionUrl[]|Proxy[] findBy(array $attributes)
 * @method static CompetitionUrl[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static CompetitionUrl[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class CompetitionUrlFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function getDefaults(): array
    {
        return [
            'competition' => CompetitionFactory::new(),
            'enabled' => true,
            'url' => self::faker()->url(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(CompetitionUrl $competitionUrl): void {})
        ;
    }

    protected static function getClass(): string
    {
        return CompetitionUrl::class;
    }
}
