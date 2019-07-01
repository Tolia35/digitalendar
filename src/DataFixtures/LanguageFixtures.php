<?php

namespace App\DataFixtures;

use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LanguageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $language1 = new Language();
        $language1->setName("Français");
        $manager->persist($language1);
        $this->setReference("language-Français", $language1);

        $language2 = new Language();
        $language2->setName("English");
        $manager->persist($language2);
        $this->setReference("language-English", $language2);

        $language3 = new Language();
        $language3->setName("Deutsch");
        $manager->persist($language3);
        $this->setReference("language-Deutsch", $language3);

        $manager->flush();
    }
}
