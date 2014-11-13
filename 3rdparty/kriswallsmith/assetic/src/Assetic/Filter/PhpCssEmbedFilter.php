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
use CssEmbed\CssEmbed;

/**
 * A filter that embed url directly into css
 *
 * @author Pierre Tachoire <pierre.tachoire@gmail.com>
 * @link https://github.com/krichprollsch/phpCssEmbed
 */
class PhpCssEmbedFilter implements DependencyExtractorInterface
{
    private $presets = array();

    public function setPresets(array $presets)
    {
        $this->presets = $presets;
    }

    public function filterLoad(AssetInterface $asset)
    {
        $pce = new CssEmbed();
        if ($dir = $asset->getSourceDirectory()) {
            $pce->setRootDir($dir);
        }

        $asset->setContent($pce->embedString($asset->getContent()));
    }

    public function filterDump(AssetInterface $asset)
    {
    }

    public function getChildren(AssetFactory $factory, $content, $loadPath = null)
    {
        // todo
        return array();
    }
}
