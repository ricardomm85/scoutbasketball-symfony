<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

final class LandingController
{
    public function __invoke(): Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<html lang="en"><body>Hello world! ' . $number . '</body></html>'
        );
    }
}
