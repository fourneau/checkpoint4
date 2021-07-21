<?php

namespace App\Controller;


use App\Repository\AboutRepository;
use App\Repository\CustomerRepository;
use App\Repository\FolderRepository;
use App\Repository\OwnerRepository;
use App\Repository\PaymentTermsRepository;
use App\Repository\RateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Bundle\SnappyBundle\KnpSnappyBundle;

class SocialCouncilController extends AbstractController
{
    /**
     * @Route("/facturation/conseil", name="social_council")
     */
    public function index(AboutRepository $aboutRepository, CustomerRepository $customerRepository,OwnerRepository $ownerRepository, PaymentTermsRepository $paymentTermsRepository, RateRepository $rateRepository): Response
    {
        return $this->render('invoice/socialCouncil.html.twig', [
            'abouts' => $aboutRepository->findAll(),
            'customers' => $customerRepository->findAll(),
            'owners' => $ownerRepository->findAll(),
            'paymentterms' => $paymentTermsRepository->findAll(),
            'rates'=>$rateRepository->findAll(),
            'controller_name' => 'SocialCouncilController',
        ]);
    }

    
}
