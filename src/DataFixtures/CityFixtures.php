<?php

namespace App\DataFixtures;

use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $city1 = new City();
        $city1->setName("Angers");
        $manager->persist($city1);
        $this->setReference("city-Angers", $city1);

        $city2 = new City();
        $city2->setName("Rennes");
        $manager->persist($city2);
        $this->setReference("city-Rennes", $city2);

        $city3 = new City();
        $city3->setName("Laval");
        $manager->persist($city3);
        $this->setReference("city-Laval", $city3);

        $city4 = new City();
        $city4->setName("Noyal_Chatillon_sur_seiche");
        $manager->persist($city4);
        $this->setReference("city-Noyal_Chatillon_sur_seiche", $city4);

        $city5 = new City();
        $city5->setName("Paris");
        $manager->persist($city5);
        $this->setReference("city-Paris", $city5);

        $manager->flush();
    }
}
