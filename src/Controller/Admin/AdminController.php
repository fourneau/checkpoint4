<?php

namespace App\Controller\Admin;


use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Entity\Contact;
use App\Entity\Expertise;
use App\Entity\NewsCategory;
use App\Entity\News;
use App\Entity\Bill;
use App\Entity\BillingMethod;
use App\Entity\BillStatus;
use App\Entity\Customer;
use App\Entity\Diligence;
use App\Entity\PresetDiligence;
use App\Entity\Folder;
use App\Entity\SubFolder;
use App\Entity\Owner;
use App\Entity\Rate;
use App\Entity\BusinessType;
use App\Entity\UploadBackground;
use App\Entity\UploadCarrousel;
use App\Entity\PaymentTerms;
use Symfony\Component\Translation\Translator;


class AdminController extends AbstractDashboardController
{

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(AboutCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Maître Thibaud BÉJAT')
            ->renderContentMaximized()
            ;
            
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Accueil', 'fa fa-home');
        yield MenuItem::subMenu('PERSONNALISATION', 'fa fa-pencil')->setSubItems([
            MenuItem::linkToCrud('Compétences', 'fas fa-balance-scale', Expertise::class),
            MenuItem::linkToCrud('Actualités', 'fas fa-book-reader', News::class),
            MenuItem::linkToCrud('Catégories d\'actualités', 'fa fa-book fa-fw', NewsCategory::class),
        ]);
        
       
        yield MenuItem::section('Facturation');
        yield MenuItem::linkToCrud('Dossiers', 'fas fa-folder-minus', Folder::class);
        yield MenuItem::linkToCrud('SousDossiers', 'fas fa-folder-minus', SubFolder::class);
        yield MenuItem::linkToCrud('Clients', 'fas fa-handshake', Customer::class);
        yield MenuItem::linkToCrud('Type Procédure', 'fas fa-euro-sign', BusinessType::class);
        yield MenuItem::linkToCrud('Diligences', 'fas fa-user-check', Diligence::class);
        yield MenuItem::linkToCrud('Diligences préétablies', 'fas fa-user-check', PresetDiligence::class);
        yield MenuItem::linkToCrud('Facture', 'fas fa-file-pdf', Bill::class);
        yield MenuItem::linkToCrud('Méthode Facturation', 'fas fa-file-pdf', BillingMethod::class);
        yield MenuItem::linkToCrud('Status Factures', 'fas fa-file-pdf', BillStatus::class);
        yield MenuItem::linkToCrud('Elements de Facture', 'fas fa-file-pdf', PaymentTerms::class);
        yield MenuItem::linkToCrud('Propriétaire', 'fas fa-landmark', Owner::class);
        yield MenuItem::linkToCrud('Tarification', 'fas fa-percent', Rate::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-headset', Contact::class);
        yield MenuItem::linkToCrud('Carrousel', 'fas fa-parachute-box', UploadCarrousel::class);
        yield MenuItem::linkToCrud('Background', 'far fa-images', UploadBackground::class);
        yield MenuItem::linkToLogout('Deconnexion', 'fa fa-sign-out');
    }


    /**
     * @Route("/logout", name="app_logout", methods={"GET"})
     */
    public function logout(): void
    {
         // controller can be blank: it will never be executed!
         throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }
}
