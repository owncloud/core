<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Filter\Yui;

use Assetic\Asset\AssetInterface;

/**
 * Javascript YUI compressor filter.
 *
 * @link http://developer.yahoo.com/yui/compressor/
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class JsCompressorFilter extends BaseCompressorFilter
{
    private $nomunge;
    private $preserveSemi;
    private $disableOptimizations;

    public function setNomunge($nomunge = true)
    {
        $this->nomunge = $nomunge;
    }

    public function setPreserveSemi($preserveSemi)
    {
        $this->preserveSemi = $preserveSemi;
    }

    public function setDisableOptimizations($disableOptimizations)
    {
        $this->disableOptimizations = $disableOptimizations;
    }

    public function filterDump(AssetInterface $asset)
    {
        $options = array();

        if ($this->nomunge) {
            $options[] = '--nomunge';
        }

        if ($this->preserveSemi) {
            $options[] = '--preserve-semi';
        }

        if ($this->disableOptimizations) {
            $options[] = '--disable-optimizations';
        }

        $asset->setContent($this->compress($asset->getContent(), 'js', $options));
    }
}
