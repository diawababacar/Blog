<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\Commentaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class ArticleFictures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = \Faker\Factory::create('fr_FR');
        //Création de 3 Catégories fakéés

        for ($i =   1;$i    <=  3;$i++){
            $categorie  =   new Categorie();
            $categorie  ->setTitreCategorie($faker->sentence())
                        ->setDescriptionCategorie($faker->paragraph());
            $manager->persist($categorie);

            //Créer entre 4 et 6 articles pour chaque Catégorie

            for ($j =1;$j  <=   mt_rand(4,6);$j++){
                $article = new Article();

                $content    =   '<p>'.join($faker->paragraphs(5),'</p><p>').'</p>';

                $article    ->setTitreArticle($faker->sentence())
                            ->setContenuArticle($content)
                            ->setImageArticle($faker->imageUrl(450,300))
                            ->setDatePubArticle($faker->dateTimeBetween('-6 months'))
                            ->setCategorie($categorie);
                $manager->persist($article);

                //Ici je donne les commentaires à l'article

                for ($k =   1;$k    <=  mt_rand(4,10);$k++){
                    $commentaire = new Commentaire();

                    $content    =   '<p>'.join($faker->paragraphs(5),'</p><p>').'</p>';

                    $now    =   new \DateTime();
                    $interval   =   $now->diff($article->getDatePubArticle());
                    $days   =   $interval->days;
                    $minimum    =   '-' .$days. ' days';

                    $commentaire    ->setAuteurCommentaire($faker->name)
                                    ->setContenuCommentaire($content)
                                    ->setDatePubCommentaire($faker->dateTimeBetween($minimum))
                                    ->setArticleCommentaire($article);

                    $manager->persist($commentaire);
                }
            }

        }

        $manager->flush();



     /**   for ($i =1;$i  <=10;$i++){
            $article = new Article();
            $article    ->setTitreArticle("Titre de l'article n°$i")
                        ->setContenuArticle("<p>Contenu de l'article n°$i</p>")
                        ->setImageArticle("http://placehold.it/350x150")
                        ->setDatePubArticle(new \DateTime());
            $manager->persist($article);
        }
        $manager->flush();
      **/

    }
}
