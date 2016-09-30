<?php

declare (strict_types = 1);

namespace AppBundle\Command;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Step02Command extends AbstractTutorialCommand
{
    public function run(InputInterface $input, OutputInterface $output)
    {
        $unicorns = [
            ['name' => 'Klaus', 'fluffy' => false],
            ['name' => 'Michael', 'fluffy' => false],
            ['name' => 'Sandy', 'fluffy' => true],
        ];

        $rule = 'fluffy = true';

        $rulerz = $this->getRulerZ();
        $fluffyUnicorns = $rulerz->filter($unicorns, $rule);

        $table = new Table($output);
        $table
            ->setHeaders(['Name', 'Fluffy?'])
            ->setRows(iterator_to_array($fluffyUnicorns))
        ;
        $table->render();
    }
}
