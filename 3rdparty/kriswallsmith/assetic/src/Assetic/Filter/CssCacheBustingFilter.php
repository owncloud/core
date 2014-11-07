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
 * Class CssCacheBustingFilter
 *
 * @package Assetic\Filter
 * @author Maximilian Reichel <info@phramz.com>
 */
class CssCacheBustingFilter extends BaseCssFilter
{
    private $version;
    private $format = '%s?%s';

    public function setVersion($version)
    {
        $this->version = $version;
    }

    public function setFormat($versionFormat)
    {
        $this->format = $versionFormat;
    }

    public function filterLoad(AssetInterface $asset)
    {
    }

    public function filterDump(AssetInterface $asset)
    {
        if (!$this->version) {
            return;
        }

        $version = $this->version;
        $format = $this->format;

        $asset->setContent($this->filterReferences(
            $asset->getContent(),
            function ($matches) use ($version,$format) {
                return str_replace(
                    $matches['url'],
                    sprintf($format, $matches['url'], $version),
                    $matches[0]
                );
            }
        ));
    }
}
