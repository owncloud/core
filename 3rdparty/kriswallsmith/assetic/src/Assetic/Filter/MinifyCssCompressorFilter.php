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

/**
 * Filters assets through Minify_CSS_Compressor.
 *
 * All credit for the filter itself is mentioned in the file itself.
 *
 * @link https://raw.githubusercontent.com/mrclay/minify/master/min/lib/Minify/CSS/Compressor.php
 * @author Stephen Clay <steve@mrclay.org>
 * @author http://code.google.com/u/1stvamp/ (Issue 64 patch)
 */
class MinifyCssCompressorFilter implements FilterInterface
{
    public function filterLoad(AssetInterface $asset)
    {
    }

    public function filterDump(AssetInterface $asset)
    {
        $asset->setContent(\Minify_CSS_Compressor::process($asset->getContent()));
    }
}
