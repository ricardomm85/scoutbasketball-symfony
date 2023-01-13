<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomeController
{
    public const ROUTE = 'homepage';

    #[Route('/', name: self::ROUTE)]
    public function __invoke(): Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<html lang="en"><body>Hello world! ' . $number . '</body></html>'
        );
    }
}
