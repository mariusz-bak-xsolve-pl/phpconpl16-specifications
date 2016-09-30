<?php

namespace AppBundle\Spec;

use RulerZ\Spec\AbstractSpecification;

class InHerd extends AbstractSpecification
{
    /** @var array */
    protected $herdNames;

    /**
     * @param array $herdNames
     */
    public function __construct(array $herdNames)
    {
        $this->herdNames = $herdNames;
    }

    public function getRule(): string
    {
        return 'herd.name IN :herdNames';
    }

    public function getParameters(): array
    {
        return [
            'herdNames' => $this->herdNames,
        ];
    }
}
