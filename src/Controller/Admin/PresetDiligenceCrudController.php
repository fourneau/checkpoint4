<?php

namespace App\Controller\Admin;

use App\Entity\PresetDiligence;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class PresetDiligenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PresetDiligence::class;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextEditorField::new('description', 'Description'),
            Field::new('amount', 'Montant'),
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
        ->setPageTitle('index', 'diligences préétablies')
        ->setPageTitle('edit', 'diligences préétablies')
        ->setPageTitle('new', 'diligences préétablies')
        ->setPageTitle('detail', 'diligdiligences préétablies')
        ->setPaginatorPageSize(8)
        ;
    }
    
    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->add(Crud::PAGE_NEW, Action::INDEX)
        ->remove(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE)
        ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $actions) {
            return $actions->setLabel('Créer Diligence Préétablie');
            });
    }

}
