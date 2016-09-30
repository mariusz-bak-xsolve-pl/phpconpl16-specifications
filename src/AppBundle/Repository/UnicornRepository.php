<?php

declare(strict_types = 1);

namespace AppBundle\Repository;

use AppBundle\Entity\Unicorn;
use Doctrine\ORM\EntityRepository;
use RulerZ\RulerZ;
use RulerZ\Spec\Specification;

class UnicornRepository extends EntityRepository
{
    /** @var RulerZ */
    protected $rulerz;

    /**
     * @param RulerZ $rulerz
     */
    public function setRulerZ(RulerZ $rulerz)
    {
        $this->rulerz = $rulerz;
    }

    /**
     * @param Specification $spec
     * @return Unicorn[]|array
     */
    public function match(Specification $spec) : array
    {
        $queryBuilder = $this->createQueryBuilder('u');

        // However this would be problematic if some custom joins are needed - maybe an array or some callback
        // can be provided along with specifications to deal with this.

        return iterator_to_array($this->rulerz->filterSpec($queryBuilder, $spec));
    }
}
