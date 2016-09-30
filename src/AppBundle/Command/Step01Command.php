<?php

declare (strict_types = 1);

namespace AppBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Step01Command extends AbstractTutorialCommand
{
    public function run(InputInterface $input, OutputInterface $output)
    {
        $rulerz = $this->getRulerZ();

        var_dump($rulerz);
    }
}
