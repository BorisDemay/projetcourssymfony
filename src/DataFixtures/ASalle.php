<?php

namespace App\DataFixtures;

use App\Entity\Salle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ASalle extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $generator= Factory::create('fr_FR');
        for($i=0;$i<10;$i++)
        {
            $salle=new Salle();
            $salle->setNom($generator->numberBetween($min = 10, $max = 300));
            $salle->setBatiment($generator->numberBetween($min = 1, $max = 15));
            $manager->persist($salle);
        }
        $manager->flush();

    }
}
