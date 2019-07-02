<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    /**
     * UserFixtures constructor.
     * @param $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setUsername("Bogoss123");
        $user1->setEmail("bogoss123@hotmail.com");
        $user1->setPassword($this->encoder->encodePassword($user1,"1234"));
        $user1->setRoles(["ROLE_ADMIN"]);
        $manager->persist($user1);
        $this->setReference("utilisateur1", $user1);

        $user2 = new User();
        $user2->setUsername("YannXx");
        $user2->setEmail("Yannou@hotmail.com");
        $user2->setPassword($this->encoder->encodePassword($user2,"holalalala"));
        $manager->persist($user2);
        $this->setReference("utilisateur2", $user2);

        $user3 = new User();
        $user3->setUsername("Jeronimo");
        $user3->setEmail("jeje@hotmail.fr");
        $user3->setPassword($this->encoder->encodePassword($user1,"unmotparfait"));
        $manager->persist($user3);
        $this->setReference("utilisateur3", $user3);

        $user4 = new User();
        $user4->setUsername("Bertrandlechauve");
        $user4->setEmail("bertraaaand@hotmail.com");
        $user4->setPassword($this->encoder->encodePassword($user1,"lachauverie"));
        $manager->persist($user4);
        $this->setReference("utilisateur4", $user4);

        $user5 = new User();
        $user5->setUsername("Phthebest");
        $user5->setEmail("Pchou@hotmail.com");
        $user5->setPassword($this->encoder->encodePassword($user5,"ph4everazerty"));
        $manager->persist($user5);
        $this->setReference("utilisateur5", $user5);

        $user6 = new User();
        $user6->setUsername("Nicojeparletropfort");
        $user6->setEmail("NicoNico@hotmail.com");
        $user1->setPassword($this->encoder->encodePassword($user1,"liouuuuuude"));
        $manager->persist($user6);
        $this->setReference("utilisateur6", $user6);

        $user7 = new User();
        $user7->setUsername("Dimitri3535");
        $user7->setEmail("Dimo@hotmail.com");
        $user7->setPassword($this->encoder->encodePassword($user1,"macheri123"));
        $manager->persist($user7);
        $this->setReference("utilisateur7", $user7);

        $user8 = new User();
        $user8->setUsername("PierreIlovephp");
        $user8->setEmail("nousnon@hotmail.com");
        $user8->setPassword($this->encoder->encodePassword($user1,"Jadorelephp"));
        $manager->persist($user8);
        $this->setReference("utilisateur8", $user8);

        $manager->flush();
    }
}
