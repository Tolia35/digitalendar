<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setUsername("Bogoss123");
        $user1->setEmail("bogoss123@hotmail.com");
        $user1->setPassword("12345678");
        $user1->setRoles(true);
        $manager->persist($user1);
        $this->setReference("utilisateur1", $user1);

        $user2 = new User();
        $user2->setUsername("YannXx");
        $user2->setEmail("Yannou@hotmail.com");
        $user2->setPassword("lolzazerty");
        $user2->setRoles(false);
        $manager->persist($user2);
        $this->setReference("utilisateur2", $user2);

        $user3 = new User();
        $user3->setUsername("Jeronimo");
        $user3->setEmail("jeje@hotmail.fr");
        $user3->setPassword("unmotparfait");
        $user3->setRoles(false);
        $manager->persist($user3);
        $this->setReference("utilisateur3", $user3);

        $user4 = new User();
        $user4->setUsername("Bertrandlechauve");
        $user4->setEmail("bertraaaand@hotmail.com");
        $user4->setPassword("4ever4ever");
        $user4->setRoles(false);
        $manager->persist($user4);
        $this->setReference("utilisateur4", $user4);

        $user5 = new User();
        $user5->setUsername("Phthebest");
        $user5->setEmail("Pchou@hotmail.com");
        $user5->setPassword("azerty123");
        $user5->setRoles(false);
        $manager->persist($user5);
        $this->setReference("utilisateur5", $user5);

        $user6 = new User();
        $user6->setUsername("Nicojeparletropfort");
        $user6->setEmail("NicoNico@hotmail.com");
        $user6->setPassword("azerty123");
        $user6->setRoles(false);
        $manager->persist($user6);
        $this->setReference("utilisateur6", $user6);

        $user7 = new User();
        $user7->setUsername("Dimitri3535");
        $user7->setEmail("Dimo@hotmail.com");
        $user7->setPassword("azerty123");
        $user7->setRoles(false);
        $manager->persist($user7);
        $this->setReference("utilisateur7", $user7);

        $user8 = new User();
        $user8->setUsername("PierreIlovephp");
        $user8->setEmail("nousnon@hotmail.com");
        $user8->setPassword("php4ever");
        $user8->setRoles(false);
        $manager->persist($user8);
        $this->setReference("utilisateur8", $user8);

        $manager->flush();
    }
}
