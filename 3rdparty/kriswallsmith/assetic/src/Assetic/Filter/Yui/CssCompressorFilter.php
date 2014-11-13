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
 * CSS YUI compressor filter.
 *
 * @link http://developer.yahoo.com/yui/compressor/
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class CssCompressorFilter extends BaseCompressorFilter
{
    public function filterDump(AssetInterface $asset)
    {
        $asset->setContent($this->compress($asset->getContent(), 'css'));
    }
}
