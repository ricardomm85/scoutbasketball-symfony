<?php

declare(strict_types=1);

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
