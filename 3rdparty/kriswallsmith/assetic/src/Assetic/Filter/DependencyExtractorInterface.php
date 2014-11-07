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
use Assetic\Factory\AssetFactory;

/**
 * A filter that knows how to extract dependencies.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
interface DependencyExtractorInterface extends FilterInterface
{
    /**
     * Returns child assets.
     *
     * @param AssetFactory $factory  The asset factory
     * @param string       $content  The asset content
     * @param string       $loadPath An optional load path
     *
     * @return AssetInterface[] Child assets
     */
    public function getChildren(AssetFactory $factory, $content, $loadPath = null);
}
