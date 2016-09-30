<?php

declare (strict_types = 1);

namespace AppBundle\Command;

use AppBundle\Entity\Unicorn;
use AppBundle\Spec\Operator\DoctrineAgeOperator;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use RulerZ\Compiler\FileCompiler;
use RulerZ\Compiler\Target;
use RulerZ\Parser\HoaParser;
use RulerZ\RulerZ;
use AppBundle\Spec\Operator\ArrayAgeOperator;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractTutorialCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $reflClass = new \ReflectionClass($this);
        $this->setName('step:'.substr(substr($reflClass->getShortName(), 0, -7), 4));
    }

    /**
     * @return RulerZ
     */
    public function getRulerZ()
    {
        // Compiler
        $compiler = new FileCompiler(
            new HoaParser(),
            $this->getContainer()->getParameter('kernel.cache_dir').'/rulerz'
        );

        $doctrineQueryBuilderVisitor = new Target\Sql\DoctrineQueryBuilderVisitor();
        $doctrineQueryBuilderVisitor->setInlineOperator('age', new DoctrineAgeOperator());

        // RulerZ engine
        $rulerz = new RulerZ(
            $compiler, [
                new Target\ArrayVisitor([
                    'age' => new ArrayAgeOperator(), // One can use here a function callback, or an object with __invoke method implemented and returning some value.
                ]),
                $doctrineQueryBuilderVisitor,
            ]
        );

        return $rulerz;
    }

    /**
     * @param string          $header
     * @param Unicorn[]|array $unicorns
     * @param OutputInterface $output
     */
    protected function showEntitiesTable(string $header, array $unicorns, OutputInterface $output)
    {
        $output->writeln('Baby unicorns');
        $table = new Table($output);
        $table->setHeaders(['Id', 'Name', 'Color', 'Birth date', 'Has laser horn?', 'Poops rainbows?', 'Can fly?', 'Fluffy?', 'Herd name']);
        /** @var Unicorn $unicorn */
        foreach ($unicorns as $unicorn) {
            $table->addRow($unicorn->toArray2());
        }
        $table->render();
        $output->writeln('');
    }
}
