<?php

namespace App\DataFixtures;

use App\Entity\Participant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ParticipantFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $participant1 = new Participant();
        $participant1->setCreatedAt( new \DateTime("2017-02-04"));
        $participant1->setUser($this->getReference("utilisateur1"));
        $manager->persist($participant1);
        $this->setReference("Participant1", $participant1);

        $participant2 = new Participant();
        $participant2->setCreatedAt(new \DateTime("2017-07-02"));
        $participant1->setUser($this->getReference("utilisateur2"));
        $manager->persist($participant2);
        $this->setReference("Participant2", $participant2);

        $participant3 = new Participant();
        $participant3->setCreatedAt(new \DateTime("2017-12-23"));
        $participant1->setUser($this->getReference("utilisateur3"));
        $manager->persist($participant3);
        $this->setReference("Participant3", $participant3);

        $participant4 = new Participant();
        $participant4->setCreatedAt(new \DateTime("2017-03--23"));
        $participant1->setUser($this->getReference("utilisateur4"));
        $manager->persist($participant4);
        $this->setReference("Participant4", $participant4);

        $participant5 = new Participant();
        $participant5->setCreatedAt(new \DateTime("2017-05-23"));
        $participant1->setUser($this->getReference("utilisateur5"));
        $manager->persist($participant5);
        $this->setReference("Participant5", $participant5);

        $participant6 = new Participant();
        $participant6->setCreatedAt(new \DateTime("2017-12-12"));
        $participant1->setUser($this->getReference("utilisateur6"));
        $manager->persist($participant6);
        $this->setReference("Participant6", $participant6);

        $manager->flush();
    }
}
