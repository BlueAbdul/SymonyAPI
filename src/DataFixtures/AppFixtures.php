<?php

// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\Articles;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class AppFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
            
           for ($i = 0; $i < 4; $i++) {
               $article = new Articles();
               $article->setTitre($faker->catchPhrase);
               $article->setDescription($faker->text($maxNbChars = 200) );

               $manager->persist($article);
           }

           $manager->flush();
    }
}