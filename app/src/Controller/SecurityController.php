<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

final readonly class SecurityController
{
    public const LOGIN_ROUTE = 'login';

    public const LOGOUT_ROUTE = 'logout';

    public const LOGIN_CSRF = 'login_csrf';

    public function __construct(
        private Environment $twig,
        private RouterInterface $router,
    ) {
    }

    #[Route('/login', name: self::LOGIN_ROUTE)]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        return new Response(
            $this->twig->render(
                'security/login.html.twig',
                [
                    'error' => $authenticationUtils->getLastAuthenticationError(),
                    'last_email' => $authenticationUtils->getLastUsername(),
                ]
            )
        );
    }

    #[Route('/logout', name: self::LOGOUT_ROUTE)]
    public function logout(): Response
    {
        return new RedirectResponse(
            $this->router->generate(HomeController::ROUTE)
        );
    }
}
