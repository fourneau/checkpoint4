<?php

namespace App\Controller\Admin;

use App\Entity\BusinessType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BusinessTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BusinessType::class;
    }
    public function configureFields(string $pageName): iterable
    {
        return [

            Field::new('name', 'Nom'), 
            
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
        ->setPageTitle('index', 'Type de procédure')
        ->setPageTitle('edit', 'Type de procédure')
        ->setPageTitle('new', 'Type de procédure')
        ->setPageTitle('detail', 'Type de procédure')
        ;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->remove(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE)
        ->remove(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER)
        ->add(Crud::PAGE_NEW, Action::INDEX)
        ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $actions) {
            return $actions->setLabel('Créer Type de Procédure');
            });
    }

}