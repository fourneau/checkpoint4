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
        $abo->setTitle('Thibaud Béjat')
            ->setSubtitle('- Avocat à la Cour de Paris -')
            ->setDescription("Avocat au Barreau de Paris, spécialisé en droit du travail et droit de la sécurité sociale.
            Clientèle se composant principalement de startups.
            
            Activité de Conseil et activité judiciaire devant le Conseil de prud'hommes, le Tribunal judiciaire et le Tribunal de Commerce.
            
            Grand adepte du Legal Design, afin de répondre au mieux aux besoins du client/utilisateur en utilisant un langage clair et une infographie intelligible et pertinente.
            
            Curieux, rigoureux, diplomate et doté d'une jolie plume.")
            ->setAvatar('https://fr.freepik.com
            /photos-gratuite/avocat-client_3357722.htm#page=1&query=avocat&position=29');
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

        for ($i = 0; $i < 4; $i++) {
            $new = new News();
            $new->setTitle($faker->words(3, true))
            ->setSubtitle($faker->words(5, true))
            ->setDescription($faker->paragraph(30, true))
            ->setDate($faker->dateTime())
            ->setImportance($faker->numberBetween(0.1))
            ->setNewsCategory($faker->randomElement($arrayNewsCategories));
            $manager->persist($new);
        }


        $foot = new Footer();
        $foot->setPhone('07.70.56.16.34')
            ->setCity('Paris')
            ->setEmail('tbejat.avocat@gmail.com')
            ->setYearCopyright(new \DateTime('now'));
        $manager->persist($foot);

        $manager->flush();
    }
}