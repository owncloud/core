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
 * Compiles Handlebars templates into Javascript.
 *
 * @link http://handlebarsjs.com/
 * @author Keyvan Akbary <keyvan@funddy.com>
 */
class HandlebarsFilter extends BaseNodeFilter
{
    private $handlebarsBin;
    private $nodeBin;

    private $minimize = false;
    private $simple = false;

    public function __construct($handlebarsBin = '/usr/bin/handlebars', $nodeBin = null)
    {
        $this->handlebarsBin = $handlebarsBin;
        $this->nodeBin = $nodeBin;
    }

    public function setMinimize($minimize)
    {
        $this->minimize = $minimize;
    }

    public function setSimple($simple)
    {
        $this->simple = $simple;
    }

    public function filterLoad(AssetInterface $asset)
    {
        $pb = $this->createProcessBuilder($this->nodeBin
            ? array($this->nodeBin, $this->handlebarsBin)
            : array($this->handlebarsBin));

        $templateName = basename($asset->getSourcePath());

        $inputDirPath = sys_get_temp_dir().DIRECTORY_SEPARATOR.uniqid('input_dir');
        $inputPath = $inputDirPath.DIRECTORY_SEPARATOR.$templateName;
        $outputPath = tempnam(sys_get_temp_dir(), 'output');

        mkdir($inputDirPath);
        file_put_contents($inputPath, $asset->getContent());

        $pb->add($inputPath)->add('-f')->add($outputPath);

        if ($this->minimize) {
            $pb->add('--min');
        }

        if ($this->simple) {
            $pb->add('--simple');
        }

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
