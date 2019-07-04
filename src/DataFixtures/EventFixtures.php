<?php

namespace App\DataFixtures;

use App\Entity\Event;
use App\Entity\Participant;
use App\Service\Slugger;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class EventFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugger;

    /**
     * EventFixtures constructor.
     * @param $slugger
     */
    public function __construct(Slugger $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager)
    {
        $event1 = new Event();
        $event1->setTitle("West Web Festival");
        $event1->setSlug($this->slugger->slugify($event1->getTitle()));
        $event1->setPicture("wwf.jpg");
        $event1->setCity($this->getReference("city-Rennes"));
        $event1->addLanguage($this->getReference("language-French"));
        $event1->setDescription("Lorem ipsum... ");
        $event1->setDateStart(new \DateTime("2019-06-30"));
        $event1->setDateEnd(new \DateTime("2019-07-02"));
        $event1->setUrl("https://www.west-web-festival.fr/");
        $event1->setPrice(500);
        $event1->setIsValid();
        $event1->setUser($this->getReference("utilisateur2"));
        $manager->persist($event1);
        $this->setReference("event1",$event1);

        $event2 = new Event();
        $event2->setTitle("Gen");
        $event2->setSlug($this->slugger->slugify($event1->getTitle()));
        $event2->setPicture("gen.jpg");
        $event2->setCity($this->getReference("city-Rennes"));
        $event2->addLanguage($this->getReference("language-English"));
        $event2->setDescription("Lorem ipsum... ");
        $event2->setDateStart(new \DateTime("2019-08-11"));
        $event2->setDateEnd(new \DateTime("2019-08-20"));
        $event2->setUrl("https://www.opensourcesummit.paris/");
        $event2->setPrice(0);
        $event2->setIsValid();
        $event2->setUser($this->getReference("utilisateur1"));
        $manager->persist($event2);
        $this->setReference("event2",$event2);

        $event3 = new Event();
        $event3->setTitle("Lengow");
        $event3->setSlug($this->slugger->slugify($event1->getTitle()));
        $event3->setPicture("lengow.jpg");
        $event3->setCity($this->getReference("city-Paris"));
        $event3->addLanguage($this->getReference("language-French"));
        $event3->addLanguage($this->getReference("language-English"));
        $event3->setDescription("Lorem ipsum... ");
        $event3->setDateStart(new \DateTime("2019-03-12"));
        $event3->setDateEnd(new \DateTime("2019-03-16"));
        $event3->setUrl("https://www.blogdumoderateur.com/evenements/big-data-paris/");
        $event3->setPrice(795);
        $event3->setIsValid();
        $event3->setUser($this->getReference("utilisateur3"));
        $manager->persist($event3);
        $this->setReference("event3",$event3);

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            UserFixtures::class,
            CityFixtures::class,
            LanguageFixtures::class
        ];
    }


}