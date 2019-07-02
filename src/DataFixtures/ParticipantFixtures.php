<?php

namespace App\DataFixtures;

use App\Entity\Event;
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
        $participant1->setEvent($this->getReference("event1","event2"));
        $manager->persist($participant1);
        $this->setReference("Participant1", $participant1);

        $participant2 = new Participant();
        $participant2->setCreatedAt(new \DateTime("2017-07-02"));
        $participant2->setUser($this->getReference("utilisateur2"));
        $participant2->setEvent($this->getReference("event1","event2","event3"));
        $manager->persist($participant2);
        $this->setReference("Participant2", $participant2);

        $participant3 = new Participant();
        $participant3->setCreatedAt(new \DateTime("2017-12-23"));
        $participant3->setUser($this->getReference("utilisateur3"));
        $participant3->setEvent($this->getReference("event3"));
        $manager->persist($participant3);
        $this->setReference("Participant3", $participant3);

        $participant4 = new Participant();
        $participant4->setCreatedAt(new \DateTime("2017-03--23"));
        $participant4->setUser($this->getReference("utilisateur4"));
        $participant4->setEvent($this->getReference("event2"));
        $manager->persist($participant4);
        $this->setReference("Participant4", $participant4);

        $participant5 = new Participant();
        $participant5->setCreatedAt(new \DateTime("2017-05-23"));
        $participant5->setUser($this->getReference("utilisateur5"));
        $participant5->setEvent($this->getReference("event1"));
        $manager->persist($participant5);
        $this->setReference("Participant5", $participant5);

        $participant6 = new Participant();
        $participant6->setCreatedAt(new \DateTime("2017-12-12"));
        $participant6->setUser($this->getReference("utilisateur6"));
        $participant6->setEvent($this->getReference("event1"));
        $manager->persist($participant6);
        $this->setReference("Participant6", $participant6);

        $manager->flush();
    }
}
