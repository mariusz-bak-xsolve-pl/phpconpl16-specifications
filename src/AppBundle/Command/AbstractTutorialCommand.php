<?php

declare(strict_types = 1);

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use RulerZ\Compiler\FileCompiler;
use RulerZ\Compiler\Target;
use RulerZ\Parser\HoaParser;
use RulerZ\RulerZ;
use AppBundle\Spec\Operator\ArrayAgeOperator;

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
            $this->getContainer()->getParameter('kernel.cache_dir') . '/rulerz'
        );

        // RulerZ engine
        $rulerz = new RulerZ(
            $compiler, [
                new Target\ArrayVisitor([
                    'age' => new ArrayAgeOperator(), // One can use here a function callback, or an object with __invoke method implemented and returning some value.
                ]),
//                new Target\Sql\DoctrineQueryBuilderVisitor(),
            ]
        );

        return $rulerz;
    }
}
