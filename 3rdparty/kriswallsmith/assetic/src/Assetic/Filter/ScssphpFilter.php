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
use Assetic\Util\CssUtils;
use Leafo\ScssPhp\Compiler;

/**
 * Loads SCSS files using the PHP implementation of scss, scssphp.
 *
 * Scss files are mostly compatible, but there are slight differences.
 *
 * @link http://leafo.net/scssphp/
 *
 * @author Bart van den Burg <bart@samson-it.nl>
 */
class ScssphpFilter implements DependencyExtractorInterface
{
    private $compass = false;
    private $importPaths = array();
    private $customFunctions = array();
    private $formatter;
    private $variables = array();

    public function enableCompass($enable = true)
    {
        $this->compass = (Boolean) $enable;
    }

    public function isCompassEnabled()
    {
        return $this->compass;
    }

    public function setFormatter($formatter)
    {
        $this->formatter = $formatter;
    }

    public function setVariables(array $variables)
    {
        $this->variables = $variables;
    }

    public function addVariable($variable)
    {
        $this->variables[] = $variable;
    }

    public function setImportPaths(array $paths)
    {
        $this->importPaths = $paths;
    }

    public function addImportPath($path)
    {
        $this->importPaths[] = $path;
    }

    public function registerFunction($name,$callable)
    {
        $this->customFunctions[$name] = $callable;
    }

    public function filterLoad(AssetInterface $asset)
    {
        $sc = new Compiler();

        if ($this->compass) {
            new \scss_compass($sc);
        }

        if ($dir = $asset->getSourceDirectory()) {
            $sc->addImportPath($dir);
        }

        foreach ($this->importPaths as $path) {
            $sc->addImportPath($path);
        }

        foreach ($this->customFunctions as $name => $callable) {
            $sc->registerFunction($name, $callable);
        }

        if ($this->formatter) {
            $sc->setFormatter($this->formatter);
        }

        if (!empty($this->variables)) {
            $sc->setVariables($this->variables);
        }

        $asset->setContent($sc->compile($asset->getContent()));
    }

    public function filterDump(AssetInterface $asset)
    {
    }

    public function getChildren(AssetFactory $factory, $content, $loadPath = null)
    {
        $sc = new Compiler();
        $sc->addImportPath($loadPath);
        foreach ($this->importPaths as $path) {
            $sc->addImportPath($path);
        }

        $children = array();
        foreach (CssUtils::extractImports($content) as $match) {
            $file = $sc->findImport($match);
            if ($file) {
                $children[] = $child = $factory->createAsset($file, array(), array('root' => $loadPath));
                $child->load();
                $children = array_merge($children, $this->getChildren($factory, $child->getContent(), $loadPath));
            }
        }

        return $children;
    }
}
