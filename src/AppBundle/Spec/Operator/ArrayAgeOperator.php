<?php

declare(strict_types = 1);

namespace AppBundle\Spec\Operator;

class ArrayAgeOperator
{
    /**
     * @param int $ageYears
     * @return \DateTime
     */
    public function __invoke(int $ageYears) : \DateTime
    {
        return (new \DateTime())->sub(new \DateInterval('P2Y'));
    }

    // TODO Change this operator so that it gets birth date and age. This way rule would not be 'birthDate > 2', but 'younger(2, birthDate)'.
}
