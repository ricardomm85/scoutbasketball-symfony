<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Operator\NotOperatorWithSuccessorSpaceFixer;
use Symplify\CodingStandard\Fixer\ArrayNotation\ArrayListItemNewlineFixer;
use Symplify\CodingStandard\Fixer\ArrayNotation\ArrayOpenerAndCloserNewlineFixer;
use Symplify\CodingStandard\Fixer\ArrayNotation\StandaloneLineInMultilineArrayFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->paths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
        __DIR__ . '/public',
        __DIR__ . '/config',
        __DIR__ . '/ecs.php',
        __DIR__ . '/rector.php',
    ]);

    $ecsConfig->skip([
        __DIR__ . '/config/bundles.php',
        NotOperatorWithSuccessorSpaceFixer::class,
        StandaloneLineInMultilineArrayFixer::class => [
            __DIR__ . '/src/Infrastructure/Inflector.php',
        ],
        ArrayListItemNewlineFixer::class => [
            __DIR__ . '/src/Infrastructure/Inflector.php',
        ],
        ArrayOpenerAndCloserNewlineFixer::class,
    ]);

    $ecsConfig->sets(
        [
            SetList::PSR_12,
            SetList::CLEAN_CODE,
            // SetList::SYMPLIFY,
            SetList::ARRAY,
            SetList::COMMON,
            SetList::COMMENTS,
            SetList::CONTROL_STRUCTURES,
            SetList::DOCBLOCK,
            SetList::NAMESPACES,
            SetList::PHPUNIT,
            SetList::SPACES,
            SetList::STRICT,
            SetList::DOCTRINE_ANNOTATIONS,
        ]
    );
};
