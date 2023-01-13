<?php

declare(strict_types=1);

namespace App\Domain\Enum;

enum Role: string
{
    use EnumToArray;

    case ADMIN = 'ROLE_ADMIN';
    case USER = 'ROLE_USER';
}
