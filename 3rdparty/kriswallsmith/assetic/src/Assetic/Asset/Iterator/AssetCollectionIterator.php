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

use Assetic\Asset\AssetCollectionInterface;

/**
 * Iterates over an asset collection.
 *
 * The iterator is responsible for cascading filters and target URL patterns
 * from parent to child assets.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class AssetCollectionIterator implements \RecursiveIterator
{
    private $assets;
    private $filters;
    private $vars;
    private $output;
    private $clones;

    public function __construct(AssetCollectionInterface $coll, \SplObjectStorage $clones)
    {
        $this->assets  = $coll->all();
        $this->filters = $coll->getFilters();
        $this->vars    = $coll->getVars();
        $this->output  = $coll->getTargetPath();
        $this->clones  = $clones;

        if (false === $pos = strrpos($this->output, '.')) {
            $this->output .= '_*';
        } else {
            $this->output = substr($this->output, 0, $pos).'_*'.substr($this->output, $pos);
        }
    }

    /**
     * Returns a copy of the current asset with filters and a target URL applied.
     *
     * @param Boolean $raw Returns the unmodified asset if true
     *
     * @return \Assetic\Asset\AssetInterface
     */
    public function current($raw = false)
    {
        $asset = current($this->assets);

        if ($raw) {
            return $asset;
        }

        // clone once
        if (!isset($this->clones[$asset])) {
            $clone = $this->clones[$asset] = clone $asset;

            // generate a target path based on asset name
            $name = sprintf('%s_%d', pathinfo($asset->getSourcePath(), PATHINFO_FILENAME) ?: 'part', $this->key() + 1);

            $name = $this->removeDuplicateVar($name);

            $clone->setTargetPath(str_replace('*', $name, $this->output));
        } else {
            $clone = $this->clones[$asset];
        }

        // cascade filters
        foreach ($this->filters as $filter) {
            $clone->ensureFilter($filter);
        }

        return $clone;
    }

    public function key()
    {
        return key($this->assets);
    }

    public function next()
    {
        return next($this->assets);
    }

    public function rewind()
    {
        return reset($this->assets);
    }

    public function valid()
    {
        return false !== current($this->assets);
    }

    public function hasChildren()
    {
        return current($this->assets) instanceof AssetCollectionInterface;
    }

    /**
     * @uses current()
     */
    public function getChildren()
    {
        return new self($this->current(), $this->clones);
    }

    private function removeDuplicateVar($name)
    {
        foreach ($this->vars as $var) {
            $var = '{'.$var.'}';
            if (false !== strpos($name, $var) && false !== strpos($this->output, $var)) {
                $name = str_replace($var, '', $name);
            }
        }

        return $name;
    }
}
