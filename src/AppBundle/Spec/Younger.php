<?php

declare(strict_types = 1);

namespace AppBundle\Spec;

use RulerZ\Spec\AbstractSpecification;

class Younger extends AbstractSpecification
{
    /** @var int */
    protected $age;

    /**
     * Baby constructor.
     * @param int $age
     */
    public function __construct(int $age)
    {
        $this->age = $age;
    }

    public function getRule(): string
    {
        return 'birthDate < age(:age)';
    }

    public function getParameters()
    {
        return [
            'age' => $this->age,
        ];
    }
}
