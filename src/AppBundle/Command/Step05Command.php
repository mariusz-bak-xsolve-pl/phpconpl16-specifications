<?php

declare(strict_types = 1);

namespace AppBundle\Command;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Entity\Unicorn;
use AppBundle\Spec\AwesomeUnicorn;

class Step05Command extends AbstractTutorialCommand
{
    public function run(InputInterface $input, OutputInterface $output)
    {
        // Need to run ./bin/console rad:fixtures:load to populate database.
        $qb = $this->getContainer()->get('doctrine')
            ->getRepository('AppBundle:Unicorn')
            ->createQueryBuilder('u');

        $spec = new AwesomeUnicorn();
        $rulerz = $this->getRulerZ();
        $awesomeUnicorns = $rulerz->filterSpec($qb, $spec);

        $table = new Table($output);
        $table->setHeaders(['Name', 'Color', 'Has laser horn?', 'Poops rainbows?', 'Can fly?', 'Fluffy?']);

        /** @var Unicorn $awesomeUnicorn */
        foreach ($awesomeUnicorns as $awesomeUnicorn) {
            $table->addRow($awesomeUnicorn->toArray2());
        }

        $table->render();
    }
}
