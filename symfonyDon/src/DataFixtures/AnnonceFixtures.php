<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Annonce;

class AnnonceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

         // Pour créer 10 annonces :
         for($i=1; $i<=10; $i++){

            $annonce = new Annonce(); // instancie la classe Article = créé 1 objet ($annonce)
            $annonce->setTitre("Titre de l'annonce n°$i")
                    ->setCategorie("Catégorie : $i")
                    ->setLieu("Lieu de retrait : $i")
                    ->setDescription("<p>Contenu de l'article n°$i</p>")
                    ->setImage("http://placehold.it/350x150");
                    

        //Préparation du manager pour faire persister/exister les annonces dans la bdd
            $manager->persist($annonce);
        }
        //Fonction flush excécute la requête sql pour mettre en place dans la bdd
            $manager->flush();
    }
}
