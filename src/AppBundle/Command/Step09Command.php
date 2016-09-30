<?php

declare (strict_types = 1);

namespace AppBundle\Command;

use AppBundle\Spec\Baby;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Entity\Unicorn;

class Step09Command extends AbstractTutorialCommand
{
    public function run(InputInterface $input, OutputInterface $output)
    {
        $rulerz = $this->getRulerZ();

        $qb = $this->getContainer()->get('doctrine')
            ->getRepository('AppBundle:Unicorn')
            ->createQueryBuilder('u');

        $spec1 = new Baby();
        $babyUnicorns1 = $rulerz->filterSpec($qb, $spec1);

        $this->showEntitiesTable('Baby unicorns', iterator_to_array($babyUnicorns1), $output);
    }
}
