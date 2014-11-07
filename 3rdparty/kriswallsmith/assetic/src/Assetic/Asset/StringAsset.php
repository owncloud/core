<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Asset;

use Assetic\Filter\FilterInterface;

/**
 * Represents a string asset.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class StringAsset extends BaseAsset
{
    private $string;
    private $lastModified;

    /**
     * Constructor.
     *
     * @param string $content    The content of the asset
     * @param array  $filters    Filters for the asset
     * @param string $sourceRoot The source asset root directory
     * @param string $sourcePath The source asset path
     */
    public function __construct($content, $filters = array(), $sourceRoot = null, $sourcePath = null)
    {
        $this->string = $content;

        parent::__construct($filters, $sourceRoot, $sourcePath);
    }

    public function load(FilterInterface $additionalFilter = null)
    {
        $this->doLoad($this->string, $additionalFilter);
    }

    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;
    }

    public function getLastModified()
    {
        return $this->lastModified;
    }
}
