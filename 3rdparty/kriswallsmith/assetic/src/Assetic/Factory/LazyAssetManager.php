<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Factory;

use Assetic\Asset\AssetInterface;
use Assetic\AssetManager;
use Assetic\Factory\Loader\FormulaLoaderInterface;
use Assetic\Factory\Resource\ResourceInterface;

/**
 * A lazy asset manager is a composition of a factory and many formula loaders.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class LazyAssetManager extends AssetManager
{
    private $factory;
    private $loaders;
    private $resources;
    private $formulae;
    private $loaded;
    private $loading;

    /**
     * Constructor.
     *
     * @param AssetFactory $factory The asset factory
     * @param array        $loaders An array of loaders indexed by alias
     */
    public function __construct(AssetFactory $factory, $loaders = array())
    {
        $this->factory = $factory;
        $this->loaders = array();
        $this->resources = array();
        $this->formulae = array();
        $this->loaded = false;
        $this->loading = false;

        foreach ($loaders as $alias => $loader) {
            $this->setLoader($alias, $loader);
        }
    }

    /**
     * Adds a loader to the asset manager.
     *
     * @param string                 $alias  An alias for the loader
     * @param FormulaLoaderInterface $loader A loader
     */
    public function setLoader($alias, FormulaLoaderInterface $loader)
    {
        $this->loaders[$alias] = $loader;
        $this->loaded = false;
    }

    /**
     * Adds a resource to the asset manager.
     *
     * @param ResourceInterface $resource A resource
     * @param string            $loader   The loader alias for this resource
     */
    public function addResource(ResourceInterface $resource, $loader)
    {
        $this->resources[$loader][] = $resource;
        $this->loaded = false;
    }

    /**
     * Returns an array of resources.
     *
     * @return array An array of resources
     */
    public function getResources()
    {
        $resources = array();
        foreach ($this->resources as $r) {
            $resources = array_merge($resources, $r);
        }

        return $resources;
    }

    /**
     * Checks for an asset formula.
     *
     * @param string $name An asset name
     *
     * @return Boolean If there is a formula
     */
    public function hasFormula($name)
    {
        if (!$this->loaded) {
            $this->load();
        }

        return isset($this->formulae[$name]);
    }

    /**
     * Returns an asset's formula.
     *
     * @param string $name An asset name
     *
     * @return array The formula
     *
     * @throws \InvalidArgumentException If there is no formula by that name
     */
    public function getFormula($name)
    {
        if (!$this->loaded) {
            $this->load();
        }

        if (!isset($this->formulae[$name])) {
            throw new \InvalidArgumentException(sprintf('There is no "%s" formula.', $name));
        }

        return $this->formulae[$name];
    }

    /**
     * Sets a formula on the asset manager.
     *
     * @param string $name    An asset name
     * @param array  $formula A formula
     */
    public function setFormula($name, array $formula)
    {
        $this->formulae[$name] = $formula;
    }

    /**
     * Loads formulae from resources.
     *
     * @throws \LogicException If a resource has been added to an invalid loader
     */
    public function load()
    {
        if ($this->loading) {
            return;
        }

        if ($diff = array_diff(array_keys($this->resources), array_keys($this->loaders))) {
            throw new \LogicException('The following loader(s) are not registered: '.implode(', ', $diff));
        }

        $this->loading = true;

        foreach ($this->resources as $loader => $resources) {
            foreach ($resources as $resource) {
                $this->formulae = array_replace($this->formulae, $this->loaders[$loader]->load($resource));
            }
        }

        $this->loaded = true;
        $this->loading = false;
    }

    public function get($name)
    {
        if (!$this->loaded) {
            $this->load();
        }

        if (!parent::has($name) && isset($this->formulae[$name])) {
            list($inputs, $filters, $options) = $this->formulae[$name];
            $options['name'] = $name;
            parent::set($name, $this->factory->createAsset($inputs, $filters, $options));
        }

        return parent::get($name);
    }

    public function has($name)
    {
        if (!$this->loaded) {
            $this->load();
        }

        return isset($this->formulae[$name]) || parent::has($name);
    }

    public function getNames()
    {
        if (!$this->loaded) {
            $this->load();
        }

        return array_unique(array_merge(parent::getNames(), array_keys($this->formulae)));
    }

    public function isDebug()
    {
        return $this->factory->isDebug();
    }

    public function getLastModified(AssetInterface $asset)
    {
        return $this->factory->getLastModified($asset);
    }
}
