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
 * UglifyJs filter.
 *
 * @link https://github.com/mishoo/UglifyJS
 * @author André Roaldseth <andre@roaldseth.net>
 */
class UglifyJsFilter extends BaseNodeFilter
{
    private $uglifyjsBin;
    private $nodeBin;

    private $noCopyright;
    private $beautify;
    private $unsafe;
    private $mangle;
    private $defines;

    /**
     * @param string $uglifyjsBin Absolute path to the uglifyjs executable
     * @param string $nodeBin     Absolute path to the folder containg node.js executable
     */
    public function __construct($uglifyjsBin = '/usr/bin/uglifyjs', $nodeBin = null)
    {
        $this->uglifyjsBin = $uglifyjsBin;
        $this->nodeBin = $nodeBin;
    }

    /**
     * Removes the first block of comments as well
     * @param bool $noCopyright True to enable
     */
    public function setNoCopyright($noCopyright)
    {
        $this->noCopyright = $noCopyright;
    }

    /**
     * Output indented code
     * @param bool $beautify True to enable
     */
    public function setBeautify($beautify)
    {
        $this->beautify = $beautify;
    }

    /**
     * Enable additional optimizations that are known to be unsafe in some situations.
     * @param bool $unsafe True to enable
     */
    public function setUnsafe($unsafe)
    {
        $this->unsafe = $unsafe;
    }

    /**
     * Safely mangle variable and function names for greater file compress.
     * @param bool $mangle True to enable
     */
    public function setMangle($mangle)
    {
        $this->mangle = $mangle;
    }

    public function setDefines(array $defines)
    {
        $this->defines = $defines;
    }

    /**
     * @see Assetic\Filter\FilterInterface::filterLoad()
     */
    public function filterLoad(AssetInterface $asset)
    {
    }

    /**
     * Run the asset through UglifyJs
     *
     * @see Assetic\Filter\FilterInterface::filterDump()
     */
    public function filterDump(AssetInterface $asset)
    {
        $pb = $this->createProcessBuilder(
            $this->nodeBin
            ? array($this->nodeBin, $this->uglifyjsBin)
            : array($this->uglifyjsBin)
        );

        if ($this->noCopyright) {
            $pb->add('--no-copyright');
        }

        if ($this->beautify) {
            $pb->add('--beautify');
        }

        if ($this->unsafe) {
            $pb->add('--unsafe');
        }

        if (false === $this->mangle) {
            $pb->add('--no-mangle');
        }

        if ($this->defines) {
            foreach ($this->defines as $define) {
                $pb->add('-d')->add($define);
            }
        }

        // input and output files
        $input = tempnam(sys_get_temp_dir(), 'input');
        $output = tempnam(sys_get_temp_dir(), 'output');

        file_put_contents($input, $asset->getContent());
        $pb->add('-o')->add($output)->add($input);

        $proc = $pb->getProcess();
        $code = $proc->run();
        unlink($input);

        if (0 !== $code) {
            if (file_exists($output)) {
                unlink($output);
            }

            if (127 === $code) {
                throw new \RuntimeException('Path to node executable could not be resolved.');
            }

            throw FilterException::fromProcess($proc)->setInput($asset->getContent());
        }

        if (!file_exists($output)) {
            throw new \RuntimeException('Error creating output file.');
        }

        $uglifiedJs = file_get_contents($output);
        unlink($output);

        $asset->setContent($uglifiedJs);
    }
}
