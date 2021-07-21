<?php

namespace App\Controller\Admin;

use App\Entity\Diligence;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class DiligenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Diligence::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextareaField::new('description', 'Description'),
            IntegerField::new('duration', 'Durée'),
        ];
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('build/admin.css')
        ;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle('index', 'Diligences')
        ->setPageTitle('edit', 'Diligences')
        ->setPageTitle('new', 'Diligences')
        ->setPageTitle('detail', 'Diligences')
        ;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->remove(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE)
        ->add(Crud::PAGE_NEW, Action::INDEX)
        ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $actions) {
            return $actions->setLabel('Créer Diligence');
            });
    }
}