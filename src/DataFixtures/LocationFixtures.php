<?php

namespace App\DataFixtures;

use App\Entity\Location;
use App\Entity\Salle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class LocationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $generator= Factory::create('fr_FR');
        $salles = $manager->getRepository(Salle::class)->findAll();
        foreach ($salles as $salle)
        {
            for($i=0;$i<2;$i++)
            {
                $loc=new Location();
                $loc->setIdSalle($salle);
                $loc->setNom($generator->name);
                $loc->setMail($generator->email);
                $loc->setDateDebut($generator->dateTime);
                $loc->setDateFin($generator->dateTime);

                $manager->persist($loc);
            }
        }
        $manager->flush();
    }
}
