<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\Folder;
use App\Repository\AboutRepository;
use App\Repository\CustomerRepository;
use App\Repository\FolderRepository;
use App\Repository\OwnerRepository;
use App\Repository\PaymentTermsRepository;
use App\Repository\PresetDiligenceRepository;
use App\Repository\RateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Bundle\SnappyBundle\KnpSnappyBundle;
use Knp\Snappy\Pdf;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class InvoiceController extends AbstractController
{
    private $aboutRepository;
    private $customerRepository;
    private $folderRepository;
    private $ownerRepository;
    private $paymentTermsRepository;
    private $presetDiligenceRepository;
    private $rateRepository;

    public function __construct(
        AboutRepository $aboutRepository,
        CustomerRepository $customerRepository,
        FolderRepository $folderRepository,
        OwnerRepository $ownerRepository,
        PaymentTermsRepository $paymentTermsRepository,
        PresetDiligenceRepository $presetDiligenceRepository,
        RateRepository $rateRepository
    ) {
        $this->aboutRepository = $aboutRepository;
        $this->customerRepository = $customerRepository;
        $this->folderRepository = $folderRepository;
        $this->ownerRepository = $ownerRepository;
        $this->paymentTermsRepository = $paymentTermsRepository;
        $this->presetDiligenceRepository = $presetDiligenceRepository;
        $this->rateRepository = $rateRepository;
    }

    /**
     * @Route("/facturation/{folderId}", name="invoice")
     */
    public function index(int $folderId): Response
    {
        $folder = $this->folderRepository->find($folderId);
        //dd($folder);

        if ($folder->getBusinessType()->getName() == 'contentieux') {
            return $this->render('invoice/indexInvoice.html.twig', [
            'abouts' => $this->aboutRepository->findAll(),
            'customers' => $this->customerRepository->findAll(),
            'folders' => $this->folderRepository->findAll(),
            'owners' => $this->ownerRepository->findAll(),
            'paymentterms' => $this->paymentTermsRepository->findAll(),
            'presetdiligences' => $this->presetDiligenceRepository->findBy([], ['id' => 'ASC']),
            'rates' => $this->rateRepository->findAll(),
            ]);
        } else {
            return $this->render('invoice/socialCouncil.html.twig', [
            'abouts' => $this->aboutRepository->findAll(),
            'customers' => $this->customerRepository->findAll(),
            'folders' => $this->folderRepository->findAll(),
            'owners' => $this->ownerRepository->findAll(),
            'paymentterms' => $this->paymentTermsRepository->findAll(),
            'presetdiligences' => $this->presetDiligenceRepository->findBy([], ['id' => 'ASC']),
            'rates' => $this->rateRepository->findAll(),
            ]);
        }
    }
}
