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

use Assetic\Asset\Iterator\AssetCollectionFilterIterator;
use Assetic\Asset\Iterator\AssetCollectionIterator;
use Assetic\Filter\FilterCollection;
use Assetic\Filter\FilterInterface;

/**
 * A collection of assets.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class AssetCollection implements \IteratorAggregate, AssetCollectionInterface
{
    private $assets;
    private $filters;
    private $sourceRoot;
    private $targetPath;
    private $content;
    private $clones;
    private $vars;
    private $values;

    /**
     * Constructor.
     *
     * @param array  $assets     Assets for the current collection
     * @param array  $filters    Filters for the current collection
     * @param string $sourceRoot The root directory
     * @param array  $vars
     */
    public function __construct($assets = array(), $filters = array(), $sourceRoot = null, array $vars = array())
    {
        $this->assets = array();
        foreach ($assets as $asset) {
            $this->add($asset);
        }

        $this->filters = new FilterCollection($filters);
        $this->sourceRoot = $sourceRoot;
        $this->clones = new \SplObjectStorage();
        $this->vars = $vars;
        $this->values = array();
    }

    public function __clone()
    {
        $this->filters = clone $this->filters;
        $this->clones = new \SplObjectStorage();
    }

    public function all()
    {
        return $this->assets;
    }

    public function add(AssetInterface $asset)
    {
        $this->assets[] = $asset;
    }

    public function removeLeaf(AssetInterface $needle, $graceful = false)
    {
        foreach ($this->assets as $i => $asset) {
            $clone = isset($this->clones[$asset]) ? $this->clones[$asset] : null;
            if (in_array($needle, array($asset, $clone), true)) {
                unset($this->clones[$asset], $this->assets[$i]);

                return true;
            }

            if ($asset instanceof AssetCollectionInterface && $asset->removeLeaf($needle, true)) {
                return true;
            }
        }

        if ($graceful) {
            return false;
        }

        throw new \InvalidArgumentException('Leaf not found.');
    }

    public function replaceLeaf(AssetInterface $needle, AssetInterface $replacement, $graceful = false)
    {
        foreach ($this->assets as $i => $asset) {
            $clone = isset($this->clones[$asset]) ? $this->clones[$asset] : null;
            if (in_array($needle, array($asset, $clone), true)) {
                unset($this->clones[$asset]);
                $this->assets[$i] = $replacement;

                return true;
            }

            if ($asset instanceof AssetCollectionInterface && $asset->replaceLeaf($needle, $replacement, true)) {
                return true;
            }
        }

        if ($graceful) {
            return false;
        }

        throw new \InvalidArgumentException('Leaf not found.');
    }

    public function ensureFilter(FilterInterface $filter)
    {
        $this->filters->ensure($filter);
    }

    public function getFilters()
    {
        return $this->filters->all();
    }

    public function clearFilters()
    {
        $this->filters->clear();
        $this->clones = new \SplObjectStorage();
    }

    public function load(FilterInterface $additionalFilter = null)
    {
        // loop through leaves and load each asset
        $parts = array();
        foreach ($this as $asset) {
            $asset->load($additionalFilter);
            $parts[] = $asset->getContent();
        }

        $this->content = implode("\n", $parts);
    }

    public function dump(FilterInterface $additionalFilter = null)
    {
        // loop through leaves and dump each asset
        $parts = array();
        foreach ($this as $asset) {
            $parts[] = $asset->dump($additionalFilter);
        }

        return implode("\n", $parts);
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getSourceRoot()
    {
        return $this->sourceRoot;
    }

    public function getSourcePath()
    {
    }

    public function getSourceDirectory()
    {
    }

    public function getTargetPath()
    {
        return $this->targetPath;
    }

    public function setTargetPath($targetPath)
    {
        $this->targetPath = $targetPath;
    }

    /**
     * Returns the highest last-modified value of all assets in the current collection.
     *
     * @return integer|null A UNIX timestamp
     */
    public function getLastModified()
    {
        if (!count($this->assets)) {
            return;
        }

        $mtime = 0;
        foreach ($this as $asset) {
            $assetMtime = $asset->getLastModified();
            if ($assetMtime > $mtime) {
                $mtime = $assetMtime;
            }
        }

        return $mtime;
    }

    /**
     * Returns an iterator for looping recursively over unique leaves.
     */
    public function getIterator()
    {
        return new \RecursiveIteratorIterator(new AssetCollectionFilterIterator(new AssetCollectionIterator($this, $this->clones)));
    }

    public function getVars()
    {
        return $this->vars;
    }

    public function setValues(array $values)
    {
        $this->values = $values;

        foreach ($this as $asset) {
            $asset->setValues(array_intersect_key($values, array_flip($asset->getVars())));
        }
    }

    public function getValues()
    {
        return $this->values;
    }
}
