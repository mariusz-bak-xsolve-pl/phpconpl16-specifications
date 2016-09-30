<?php

namespace AppBundle\Spec;

use RulerZ\Spec\AbstractSpecification;

class InHerd extends AbstractSpecification
{
    /** @var string */
    protected $herdName;

    /**
     * @param string $herdName
     */
    public function __construct(string $herdName)
    {
        $this->herdName = $herdName;
    }

    public function getRule(): string
    {
        return 'herd.name = :herdName';
    }

    public function getParameters(): array
    {
        return [
            'herdName' => $this->herdName,
        ];
    }
}
