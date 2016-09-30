<?php

declare(strict_types = 1);

namespace AppBundle\Spec\Operator;

class DoctrineAgeOperator
{
    /**
     * @param int $ageYears
     * @return string
     */
    public function __invoke(int $ageYears) : string
    {
        return sprintf('DATE_SUB(CURRENT_DATE(), %d, \'month\')', 12 * $ageYears);
    }

    // Very important! It's important to clear cache when defining new operators, even in dev mode!

    // TODO Change this operator so that it gets birth date and age. This way rule would not be 'birthDate > 2', but 'younger(2, birthDate)'.
}
