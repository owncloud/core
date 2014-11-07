<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Filter;

use Assetic\Asset\AssetInterface;
use Assetic\Exception\FilterException;

/**
 * Compiles Dart into Javascript.
 *
 * @link http://dartlang.org/
 */
class DartFilter extends BaseProcessFilter
{
    private $dartBin;

    public function __construct($dartBin = '/usr/bin/dart2js')
    {
        $this->dartBin = $dartBin;
    }

    public function filterLoad(AssetInterface $asset)
    {
        $input  = tempnam(sys_get_temp_dir(), 'assetic_dart');
        $output = tempnam(sys_get_temp_dir(), 'assetic_dart');

        file_put_contents($input, $asset->getContent());

        $pb = $this->createProcessBuilder()
            ->add($this->dartBin)
            ->add('-o'.$output)
            ->add($input)
        ;

        $proc = $pb->getProcess();
        $code = $proc->run();
        unlink($input);

        if (0 !== $code) {
            if (file_exists($output)) {
                unlink($output);
            }

            throw FilterException::fromProcess($proc)->setInput($asset->getContent());
        }

        if (!file_exists($output)) {
            throw new \RuntimeException('Error creating output file.');
        }

        $asset->setContent(file_get_contents($output));
        unlink($output);
    }

    public function filterDump(AssetInterface $asset)
    {
    }
}
