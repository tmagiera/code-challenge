<?php
namespace Code\Bundle\ChallengeBundle\Event;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\Events;
use Code\Bundle\ChallengeBundle\Entity\App;
use Code\Bundle\ChallengeBundle\Entity\Build;

class BuildSubscriber implements EventSubscriber
{
    public function onFlush(OnFlushEventArgs $args)
    {
        $em  = $args->getEntityManager();
        $uow = $em->getUnitOfWork();

        foreach ($uow->getScheduledEntityInsertions() as $entity) {
            if ($entity instanceof Build) {
                foreach ($entity->getApp()->getBuilds() as $build) {
                    // @TODO: getBuilds() doesn't seem to work
                    $build->setCurrent(false);
                    $em->persist($build);
                }
            }
        }

        $uow->computeChangeSets();
    }

    public function getSubscribedEvents()
    {
        return array(Events::onFlush);
    }
}