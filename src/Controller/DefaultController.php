<?php

namespace App\Controller;

use App\Entity\News;
use App\Entity\About;
use App\Entity\Footer;
use App\Entity\Contact;
use App\Entity\Expertise;
use App\Form\ContactType;
use App\Entity\NewsCategory;
use App\Entity\UploadCarrousel;
use App\Entity\UploadBackground;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\ContactRepository;
use App\Repository\NewsRepository;
use App\Repository\AboutRepository;
use App\Repository\FooterRepository;
use App\Repository\ExpertiseRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\NewsCategoryRepository;
use Symfony\Component\Validator\Validation;
use App\Repository\UploadCarrouselRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UploadBackgroundRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(
        UploadBackgroundRepository $uploadBackgroundRepository,
        UploadCarrouselRepository $uploadCarrouselRepository,
        Request $request,
        EntityManagerInterface $manager,
        AboutRepository $aboutRepository,
        ExpertiseRepository $expertiseRepository,
        NewsRepository $newsRepository,
        NewsCategoryRepository $newsCategoryRepository
    ): Response {
        $contact = new Contact();
        $contactForm = $this->createForm(ContactType::class, $contact);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($contact);
            $manager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('default/index.html.twig', [
            'background' => $uploadBackgroundRepository->findAll([], ['id' => 'DESC'], 1),
            'carousel' => $uploadCarrouselRepository
            ->findBy([], $orderBy = ['id' => 'DESC'], $limit = 3, $offset = null),
            'about' => $aboutRepository->findAll()[0],
            'expertises' => $expertiseRepository->findAll(),
            'form' => $contactForm->createView(),
            'news' => $newsRepository->findBy([], ['id' => 'DESC'], 4),
            'newscategory' => $newsCategoryRepository->findOneBy([], ['id' => 'ASC']),
            ]);
    }

    /**
     * @Route("/recent", name="recent")
     */
    public function recent(
        NewsRepository $newsRepository,
        AboutRepository $aboutRepository
    ): Response {
        return $this->render('default/recent.html.twig', [
        'abouts' => $aboutRepository->findAll(),
        'news' => $newsRepository->findBy([], ['id' => 'DESC'], 2),
            ]);
    }


    /**
     * @Route("/journal", name="journal")
     */
    public function journal(
        NewsRepository $newsRepository,
        AboutRepository $aboutRepository,
        NewsCategoryRepository $newsCategoryRepository
    ): Response {
        return $this->render('default/journal.html.twig', [
        'abouts' => $aboutRepository->findAll(),
        'news' => $newsRepository->findAll(),
        'newscategory' => $newsCategoryRepository->findAll(),
        ]);
    }
    /**
     * @Route("/importante", name="importante")
     */
    public function importante(
        NewsRepository $newsRepository,
        AboutRepository $aboutRepository,
        NewsCategoryRepository $newsCategoryRepository
    ): Response {
        return $this->render('default/importante.html.twig', [
        'abouts' => $aboutRepository->findAll(),
        'news' => $newsRepository->findAll(),
        'newscategory' => $newsCategoryRepository->findAll(),
        ]);
    }
     /**
     * @Route("/actualites", name="actualites")
     */
    public function actualites(
        NewsRepository $newsRepository,
        AboutRepository $aboutRepository,
        NewsCategoryRepository $newsCategoryRepository
    ): Response {
        return $this->render('default/actualites.html.twig', [
        'abouts' => $aboutRepository->findAll(),
        'news' => $newsRepository->findAll(),
        'newscategory' => $newsCategoryRepository->findAll(),
        ]);
    }
}
