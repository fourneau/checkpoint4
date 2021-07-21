<?php

namespace App\Controller;

use App\Entity\Footer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\FooterRepository;
use Symfony\Component\HttpFoundation\Response;

class FooterController extends AbstractController
{

    public function displayFooter(FooterRepository $footerRepository): Response
    {
        return $this->render('_footer.html.twig', [
                'footers' => $footerRepository->findAll(),
            ]);
    }
}
