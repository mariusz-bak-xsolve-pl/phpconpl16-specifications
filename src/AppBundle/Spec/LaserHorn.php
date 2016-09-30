<?php

declare(strict_types = 1);

namespace AppBundle\Spec;

use RulerZ\Spec\AbstractSpecification;

class LaserHorn extends AbstractSpecification
{
    public function getRule(): string
    {
        return 'hasLaserHorn = true';
    }
}
