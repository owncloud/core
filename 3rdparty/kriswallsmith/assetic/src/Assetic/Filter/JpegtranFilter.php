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
 * Runs assets through jpegtran.
 *
 * @link http://jpegclub.org/jpegtran/
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class JpegtranFilter extends BaseProcessFilter
{
    const COPY_NONE = 'none';
    const COPY_COMMENTS = 'comments';
    const COPY_ALL = 'all';

    private $jpegtranBin;
    private $optimize;
    private $copy;
    private $progressive;
    private $restart;

    /**
     * Constructor.
     *
     * @param string $jpegtranBin Path to the jpegtran binary
     */
    public function __construct($jpegtranBin = '/usr/bin/jpegtran')
    {
        $this->jpegtranBin = $jpegtranBin;
    }

    public function setOptimize($optimize)
    {
        $this->optimize = $optimize;
    }

    public function setCopy($copy)
    {
        $this->copy = $copy;
    }

    public function setProgressive($progressive)
    {
        $this->progressive = $progressive;
    }

    public function setRestart($restart)
    {
        $this->restart = $restart;
    }

    public function filterLoad(AssetInterface $asset)
    {
    }

    public function filterDump(AssetInterface $asset)
    {
        $pb = $this->createProcessBuilder(array($this->jpegtranBin));

        if ($this->optimize) {
            $pb->add('-optimize');
        }

        if ($this->copy) {
            $pb->add('-copy')->add($this->copy);
        }

        if ($this->progressive) {
            $pb->add('-progressive');
        }

        if (null !== $this->restart) {
            $pb->add('-restart')->add($this->restart);
        }

        $pb->add($input = tempnam(sys_get_temp_dir(), 'assetic_jpegtran'));
        file_put_contents($input, $asset->getContent());

        $proc = $pb->getProcess();
        $code = $proc->run();
        unlink($input);

        if (0 !== $code) {
            throw FilterException::fromProcess($proc)->setInput($asset->getContent());
        }

        $asset->setContent($proc->getOutput());
    }
}
