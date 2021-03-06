<?php

namespace Code\Bundle\ChallengeBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * AppRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AppRepository extends EntityRepository
{
    /**
     * Return order list of Apps
     *
     * @return array
     */
    public function getApps() {
        $query = $this->createQueryBuilder('a')
            ->orderBy('a.name', 'ASC')
            ->getQuery();

        return $query->getResult();
    }
}
