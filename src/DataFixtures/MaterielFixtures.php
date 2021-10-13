<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Materiel;
use Faker\Factory;
use App\Entity\Salle;




class MaterielFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $generator=Factory::create('fr_FR');

        $salles=$manager->getRepository(Salle::class)->findAll();
        foreach($salles as $salle)
        {
            for($i=0;$i<10;$i++)
            {
                $materiel=new Materiel();

                $materiel->setNumero($generator->randomNumber());
                $materiel->setDescription($generator->realText);
                $materiel->setType($generator->streetName);
                $materiel->setSalleId($salle);
                $manager->persist($materiel);
            }
        }


        $manager->flush();
    }
}
