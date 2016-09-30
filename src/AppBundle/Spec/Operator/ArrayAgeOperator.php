<?php

declare(strict_types = 1);

namespace AppBundle\Spec\Operator;

class ArrayAgeOperator
{
    /**
     * @param int $ageYears
     * @return \DateTime
     */
    public function __invoke(int $ageYears) {
        return (new \DateTime())->sub(new \DateInterval('P2Y'));
    }
}
