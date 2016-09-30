<?php

declare(strict_types = 1);

namespace AppBundle\Spec;

use RulerZ\Spec\AbstractSpecification;

class Fluffy extends AbstractSpecification
{
    public function getRule(): string
    {
        return 'fluffy = true';
    }
}
