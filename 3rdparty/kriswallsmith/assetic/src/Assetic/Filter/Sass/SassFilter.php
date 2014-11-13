<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Filter\Sass;

use Assetic\Asset\AssetInterface;
use Assetic\Exception\FilterException;

/**
 * Loads SASS files.
 *
 * @link http://sass-lang.com/
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class SassFilter extends BaseSassFilter
{
    const STYLE_NESTED     = 'nested';
    const STYLE_EXPANDED   = 'expanded';
    const STYLE_COMPACT    = 'compact';
    const STYLE_COMPRESSED = 'compressed';

    private $sassPath;
    private $rubyPath;
    private $unixNewlines;
    private $scss;
    private $style;
    private $quiet;
    private $debugInfo;
    private $lineNumbers;
    private $sourceMap;
    private $cacheLocation;
    private $noCache;
    private $compass;

    public function __construct($sassPath = '/usr/bin/sass', $rubyPath = null)
    {
        $this->sassPath = $sassPath;
        $this->rubyPath = $rubyPath;
        $this->cacheLocation = realpath(sys_get_temp_dir());
    }

    public function setUnixNewlines($unixNewlines)
    {
        $this->unixNewlines = $unixNewlines;
    }

    public function setScss($scss)
    {
        $this->scss = $scss;
    }

    public function setStyle($style)
    {
        $this->style = $style;
    }

    public function setQuiet($quiet)
    {
        $this->quiet = $quiet;
    }

    public function setDebugInfo($debugInfo)
    {
        $this->debugInfo = $debugInfo;
    }

    public function setLineNumbers($lineNumbers)
    {
        $this->lineNumbers = $lineNumbers;
    }

    public function setSourceMap($sourceMap)
    {
        $this->sourceMap = $sourceMap;
    }

    public function setCacheLocation($cacheLocation)
    {
        $this->cacheLocation = $cacheLocation;
    }

    public function setNoCache($noCache)
    {
        $this->noCache = $noCache;
    }

    public function setCompass($compass)
    {
        $this->compass = $compass;
    }

    public function filterLoad(AssetInterface $asset)
    {
        $sassProcessArgs = array($this->sassPath);
        if (null !== $this->rubyPath) {
            $sassProcessArgs = array_merge(explode(' ', $this->rubyPath), $sassProcessArgs);
        }

        $pb = $this->createProcessBuilder($sassProcessArgs);

        if ($dir = $asset->getSourceDirectory()) {
            $pb->add('--load-path')->add($dir);
        }

        if ($this->unixNewlines) {
            $pb->add('--unix-newlines');
        }

        if (true === $this->scss || (null === $this->scss && 'scss' == pathinfo($asset->getSourcePath(), PATHINFO_EXTENSION))) {
            $pb->add('--scss');
        }

        if ($this->style) {
            $pb->add('--style')->add($this->style);
        }

        if ($this->quiet) {
            $pb->add('--quiet');
        }

        if ($this->debugInfo) {
            $pb->add('--debug-info');
        }

        if ($this->lineNumbers) {
            $pb->add('--line-numbers');
        }

        if ($this->sourceMap) {
            $pb->add('--sourcemap');
        }

        foreach ($this->loadPaths as $loadPath) {
            $pb->add('--load-path')->add($loadPath);
        }

        if ($this->cacheLocation) {
            $pb->add('--cache-location')->add($this->cacheLocation);
        }

        if ($this->noCache) {
            $pb->add('--no-cache');
        }

        if ($this->compass) {
            $pb->add('--compass');
        }

        // input
        $pb->add($input = tempnam(sys_get_temp_dir(), 'assetic_sass'));
        file_put_contents($input, $asset->getContent());

        $proc = $pb->getProcess();
        $code = $proc->run();
        unlink($input);

        if (0 !== $code) {
            throw FilterException::fromProcess($proc)->setInput($asset->getContent());
        }

        $asset->setContent($proc->getOutput());
    }

    public function filterDump(AssetInterface $asset)
    {
    }
}
