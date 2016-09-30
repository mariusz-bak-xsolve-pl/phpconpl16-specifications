<?php

declare (strict_types = 1);

namespace AppBundle\Command;

use AppBundle\Spec\Baby;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Step12Command extends AbstractTutorialCommand
{
    public function run(InputInterface $input, OutputInterface $output)
    {
        $babyUnicorns = $this
            ->getContainer()
            ->get('app.unicorn_repository')
            ->match(
                new Baby()
            );

        $this->showEntitiesTable('Baby unicorns', $babyUnicorns, $output);
    }
}
