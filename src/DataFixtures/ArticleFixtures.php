<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        
        for($i=1;$i<=10;$i++){
            //extensier une articles
            $article = new Article();
            $article->setTitle("Titre de l'article n°$i")
                    ->setContent("<p>Contenu de l'article n°$i</p>")
                    ->setImage("http://placehold.it/350x150")
                    ->setCreatedAt(new \dateTime());

            //demande au manager de faire persister l'article dans le temps
            $manager->persist($article);

        }
        //la commande flush() permet de balancer la requete sql concernant les elements de l'aticle
        $manager->flush();
    }
}
