<?php

declare (strict_types = 1);

namespace AppBundle\Command;

use AppBundle\Spec\Baby;
use AppBundle\Spec\Younger;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Entity\Unicorn;

class Step08Command extends AbstractTutorialCommand
{
    public function run(InputInterface $input, OutputInterface $output)
    {
        $rulerz = $this->getRulerZ();

        $babyUnicorn = new Unicorn('Elsie');
        $babyUnicorn->setBirthDate(new \DateTime('-1 year'));

        $teenageUnicorn = new Unicorn('Ryan');
        $teenageUnicorn->setBirthDate(new \DateTime('-16 year'));

        $unicorns = [$babyUnicorn, $teenageUnicorn];

        $spec1 = new Baby();
        $babyUnicorns1 = $rulerz->filterSpec($unicorns, $spec1);

        $this->showEntitiesTable('Baby unicorns', iterator_to_array($babyUnicorns1), $output);

        $spec2 = new Younger(2);
        $babyUnicorns2 = $rulerz->filterSpec($unicorns, $spec2);

        $this->showEntitiesTable('Unicorns younger than 2 days', iterator_to_array($babyUnicorns2), $output);
    }
}
