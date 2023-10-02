<?php

namespace App\Controller\Admin;

use App\Entity\JobOffer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class JobOfferCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return JobOffer::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('reference'),
            TextEditorField::new('description'),
            BooleanField::new('isActivated'),
            AssociationField::new('jobCategory')->autocomplete(),
            AssociationField::new('jobType')->autocomplete(),
            AssociationField::new('client')->autocomplete(),
            TextField::new('note'),
            TextField::new('title'),
            TextField::new('location'),
            MoneyField::new('salary')->setCurrency('EUR'),
            DateField::new('creationDate'),
            DateField::new('closingDate'),
        ];
    }
    
}
