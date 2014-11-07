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
 * Precompiles Handlebars templates for use in the Ember.js framework. This filter
 * requires that the npm package ember-precompile be installed. You can find this
 * package at https://github.com/gabrielgrant/node-ember-precompile.
 *
 * @link http://www.emberjs.com/
 * @author Jarrod Nettles <jarrod.nettles@icloud.com>
 */
class EmberPrecompileFilter extends BaseNodeFilter
{
    private $emberBin;
    private $nodeBin;

    public function __construct($handlebarsBin = '/usr/bin/ember-precompile', $nodeBin = null)
    {
        $this->emberBin = $handlebarsBin;
        $this->nodeBin = $nodeBin;
    }

    public function filterLoad(AssetInterface $asset)
    {
        $pb = $this->createProcessBuilder($this->nodeBin
            ? array($this->nodeBin, $this->emberBin)
            : array($this->emberBin));

        $templateName = basename($asset->getSourcePath());

        $inputDirPath = sys_get_temp_dir().DIRECTORY_SEPARATOR.uniqid('input_dir');
        $inputPath = $inputDirPath.DIRECTORY_SEPARATOR.$templateName;
        $outputPath = tempnam(sys_get_temp_dir(), 'output');

        mkdir($inputDirPath);
        file_put_contents($inputPath, $asset->getContent());

        $pb->add($inputPath)->add('-f')->add($outputPath);

        $process = $pb->getProcess();
        $returnCode = $process->run();

        unlink($inputPath);
        rmdir($inputDirPath);

        if (127 === $returnCode) {
            throw new \RuntimeException('Path to node executable could not be resolved.');
        }

        if (0 !== $returnCode) {
            if (file_exists($outputPath)) {
                unlink($outputPath);
            }
            throw FilterException::fromProcess($process)->setInput($asset->getContent());
        }

        if (!file_exists($outputPath)) {
            throw new \RuntimeException('Error creating output file.');
        }

        $compiledJs = file_get_contents($outputPath);
        unlink($outputPath);

        $asset->setContent($compiledJs);
    }

    public function filterDump(AssetInterface $asset)
    {
    }
}
