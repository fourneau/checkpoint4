<?php

namespace App\DataFixtures;

use App\Entity\About;
use App\Entity\NewsCategory;
use App\Entity\News;
use App\Entity\Expertise;
use App\Entity\ExpertiseList;
use App\Entity\Footer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $abo = new About();
        $abo->setTitle('FOURNEAU Julien')
            ->setSubtitle('- Développeur & Punchliner -')
            ->setDescription("Développeur Web et Spécialiste en Punchline, je peux réaliser vos site ou vous faire rire toute la journée,
             je peux me rendre partout dans le monde du moment que je ne paye rien et je n'accepte que les hotels 5 étoiles, Formé par John Doe, je suis aimable et courtois mais faut pas me casser les pieds.")
            ->setAvatar('https://ibb.co/frrKJvB');
        $manager->persist($abo);

        $newscategories = [$faker->word, $faker->word];
        $arrayNewsCategories = [];
        foreach ($newscategories as $newscategory) {
            $newscat = new NewsCategory();
            $newscat->setName($newscategory)
                ->setLogo("https://i.ibb.co/d2hh67r/marteau.png");
            $manager->persist($newscat);
            array_push($arrayNewsCategories, $newscat);
        }

        //for ($i = 0; $i < 4; $i++) {
            //$new = new News();
            //$new->setTitle($faker->words(3, true))
            //->setSubtitle($faker->words(5, true))
            //->setDescription($faker->paragraph(30, true))
            //->setDate($faker->dateTime())
            //->setImportance($faker->numberBetween(0.1))
            //->setNewsCategory($faker->randomElement($arrayNewsCategories));
            //$manager->persist($new);
        //}


        $foot = new Footer();
        $foot->setPhone('06.21.80.77.41')
            ->setCity('Angerville')
            ->setEmail('cathyjulien14@orange.fr')
            ->setYearCopyright(new \DateTime('now'));
        $manager->persist($foot);

        $manager->flush();
    }
}