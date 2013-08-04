<?php
namespace Code\ChallengeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Code\Bundle\ChallengeBundle\Entity\App;
use Code\Bundle\ChallengeBundle\Entity\Build;
use Code\Bundle\ChallengeBundle\Entity\Developer;

class LoadData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $developer = new Developer();
        $developer->setName("Tadeusz+1");
        $developer->setEmail("tadeusz.magiera+1@gmail.com");

        $app = new App();
        $app->setName("Prod1");
        $app->setDevelopers(array($developer));
        $app->setReleased(1);

        $build = new Build();
        $build->setCurrent(true);
        $build->setVersion("0.1");
        $build->setApp($app);

        $manager->persist($build);
        $manager->persist($app);
        $manager->persist($developer);
        $manager->flush();

        $build = new Build();
        $build->setCurrent(true);
        $build->setVersion("0.2");
        $build->setApp($app);
        $manager->persist($build);
        $manager->flush();

        $app = new App();
        $app->setName("Prod2");
        $app->setDevelopers(array($developer));
        $app->setReleased(1);

        $build = new Build();
        $build->setCurrent(true);
        $build->setVersion("0.1");
        $build->setApp($app);

        $manager->persist($app);
        $manager->persist($developer);
        $manager->persist($build);
        $manager->flush();
    }
}