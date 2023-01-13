<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\HomeController;
use App\Domain\Enum\Role;
use App\Entity\Competition;
use App\Entity\CompetitionUrl;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class DashboardController extends AbstractDashboardController
{
    public function __construct(
    ) {
    }

    #[IsGranted(Role::ADMIN->value)]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('scoutBasketball <br> Admin Panel')
            ->setFaviconPath('favicon-96x96.png');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Homepage', 'fas fa-home', $this->generateUrl(HomeController::ROUTE));
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Competitions', 'fas fa-sitemap', Competition::class);
        yield MenuItem::linkToCrud('Competitions Urls', 'fas fa-link', CompetitionUrl::class);
        yield MenuItem::linkToCrud('Users', 'fas fa-users', User::class);
    }
}
