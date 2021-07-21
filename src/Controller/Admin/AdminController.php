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
            ->setTitle('PUCHLINER FOURNEAU Julien')
            ->renderContentMaximized()
            ;
            
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Accueil', 'fa fa-home');
        yield MenuItem::linkToCrud('Compétences', 'fas fa-balance-scale', Expertise::class);
        yield MenuItem::linkToCrud('Actualités', 'fas fa-book-reader', News::class);
        yield MenuItem::linkToCrud('Catégories d\'actualités', 'fa fa-book fa-fw', NewsCategory::class);
        yield MenuItem::section('Reglages');
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
