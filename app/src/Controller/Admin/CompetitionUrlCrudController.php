<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\CompetitionUrl;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class CompetitionUrlCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CompetitionUrl::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->onlyOnIndex();
        yield UrlField::new('url');
        yield BooleanField::new('enabled');
        yield AssociationField::new('competition');
    }
}
