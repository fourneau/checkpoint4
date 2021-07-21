<?php

namespace App\Controller\Admin;

use App\Controller\InvoiceController;
use App\Entity\Folder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use Symfony\Component\HttpFoundation\Request;

class FolderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Folder::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()
            ->addCssClass('adminfolder') ,
            FormField::addPanel('Général')

            ->setIcon('fas fa-user-edit'),
            AssociationField::new('Owner', 'Propriétaire'),
            AssociationField::new('customer', 'Client'),
            AssociationField::new('businessType', "type d'affaire"),
            FormField::addPanel('Facturation')
            ->setIcon('fas fa-euro-sign'),
            AssociationField::new('billingMethod', 'Methode de facturation')->hideOnIndex(),
            AssociationField::new('subFolder', 'Sous-dossier'),
            FormField::addPanel('Diligences')
            ->setIcon('fas fa-balance-scale'),
            AssociationField::new('diligence')->hideOnIndex(),
            AssociationField::new('presetDiligence', 'Diligence préétablie')->hideOnIndex(),
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
        ->setPageTitle('index', 'Dossiers')
        ->setPageTitle('edit', 'Dossiers')
        ->setPageTitle('new', 'Dossiers')
        ->setPageTitle('detail', 'Dossiers')
        ;
    }

    public function configureActions(Actions $actions): Actions
    {
        $invoiceAction = Action::new('invoice', '')
        ->setIcon('fas fa-file')
        ->setLabel('Facturation')
        ->linkToCrudAction('invoiceAction');


        return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->add(Crud::PAGE_NEW, Action::INDEX)
        ->add(Crud::PAGE_DETAIL, $invoiceAction)
        ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $actions) {
            return $actions->setLabel('Créer Dossier');
        });
    }

    public function invoiceAction(Request $request)
    {
        $idFolder = $request->query->get('entityId');
        return $this->redirectToRoute('invoice', [
            'folderId' => $idFolder
        ]);
    }
}
