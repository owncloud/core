<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Asset\Iterator;

/**
 * Asset collection filter iterator.
 *
 * The filter iterator is responsible for de-duplication of leaf assets based
 * on both strict equality and source URL.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class AssetCollectionFilterIterator extends \RecursiveFilterIterator
{
    private $visited;
    private $sources;

    /**
     * Constructor.
     *
     * @param AssetCollectionIterator $iterator The inner iterator
     * @param array                   $visited  An array of visited asset objects
     * @param array                   $sources  An array of visited source strings
     */
    public function __construct(AssetCollectionIterator $iterator, array $visited = array(), array $sources = array())
    {
        parent::__construct($iterator);

        $this->visited = $visited;
        $this->sources = $sources;
    }

    /**
     * Determines whether the current asset is a duplicate.
     *
     * De-duplication is performed based on either strict equality or by
     * matching sources.
     *
     * @return Boolean Returns true if we have not seen this asset yet
     */
    public function accept()
    {
        $asset = $this->getInnerIterator()->current(true);
        $duplicate = false;

        // check strict equality
        if (in_array($asset, $this->visited, true)) {
            $duplicate = true;
        } else {
            $this->visited[] = $asset;
        }

        // check source
        $sourceRoot = $asset->getSourceRoot();
        $sourcePath = $asset->getSourcePath();
        if ($sourceRoot && $sourcePath) {
            $source = $sourceRoot.'/'.$sourcePath;
            if (in_array($source, $this->sources)) {
                $duplicate = true;
            } else {
                $this->sources[] = $source;
            }
        }

        return !$duplicate;
    }

    /**
     * Passes visited objects and source URLs to the child iterator.
     */
    public function getChildren()
    {
        return new self($this->getInnerIterator()->getChildren(), $this->visited, $this->sources);
    }
}
