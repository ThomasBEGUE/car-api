<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Car;

class CarFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        
        $car1 = new Car();
        $car1->setBrands("Peugeot")
            ->setModel("2008")
            ->setRegistration("ER7652PO")
            ->setFuel("Diesel")
            ->setNumberOfPlaces(5)
            ->setNumberOfDoors(5)
            ->setDescription("Belle voiture, en bon état.")
            ->setPrice(50)
            ->setStars(4);
        $manager->persist($car1);

        $car2 = new Car();
        $car2->setBrands("Land Rover")
            ->setModel("Evoque")
            ->setRegistration("LI123NE")
            ->setFuel("Diesel")
            ->setNumberOfPlaces(5)
            ->setNumberOfDoors(5)
            ->setDescription("Belle voiture.")
            ->setPrice(120)
            ->setStars(5);
        $manager->persist($car2);

        $manager->flush();
    }
}
