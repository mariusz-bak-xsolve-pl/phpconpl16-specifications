<?php

declare (strict_types = 1);

namespace AppBundle\Command;

use AppBundle\Spec\Fluffy;
use AppBundle\Spec\InHerd;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Entity\Unicorn;

class Step07Command extends AbstractTutorialCommand
{
    public function run(InputInterface $input, OutputInterface $output)
    {
        $qb = $this->getContainer()->get('doctrine')
            ->getRepository('AppBundle:Unicorn')
            ->createQueryBuilder('u');

        $spec = new InHerd(['Adams', 'Steuber']);
        $rulerz = $this->getRulerZ();
        $awesomeUnicorns = $rulerz->filterSpec($qb, $spec);

        $table = new Table($output);
        $table->setHeaders(['Id', 'Name', 'Color', 'Birth date', 'Has laser horn?', 'Poops rainbows?', 'Can fly?', 'Fluffy?', 'Herd name']);

        /** @var Unicorn $awesomeUnicorn */
        foreach ($awesomeUnicorns as $awesomeUnicorn) {
            $table->addRow($awesomeUnicorn->toArray2());
        }

        $table->render();
    }
}
