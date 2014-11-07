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
use Assetic\Util\LessUtils;

/**
 * Loads LESS files using the PHP implementation of less, lessphp.
 *
 * Less files are mostly compatible, but there are slight differences.
 *
 * @link http://leafo.net/lessphp/
 *
 * @author David Buchmann <david@liip.ch>
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class LessphpFilter implements DependencyExtractorInterface
{
    private $presets = array();
    private $formatter;
    private $preserveComments;
    private $customFunctions = array();

    /**
     * Lessphp Load Paths
     *
     * @var array
     */
    protected $loadPaths = array();

    /**
     * Adds a load path to the paths used by lessphp
     *
     * @param string $path Load Path
     */
    public function addLoadPath($path)
    {
        $this->loadPaths[] = $path;
    }

    /**
     * Sets load paths used by lessphp
     *
     * @param array $loadPaths Load paths
     */
    public function setLoadPaths(array $loadPaths)
    {
        $this->loadPaths = $loadPaths;
    }

    public function setPresets(array $presets)
    {
        $this->presets = $presets;
    }

    /**
     * @param string $formatter One of "lessjs", "compressed", or "classic".
     */
    public function setFormatter($formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * @param boolean $preserveComments
     */
    public function setPreserveComments($preserveComments)
    {
        $this->preserveComments = $preserveComments;
    }

    public function filterLoad(AssetInterface $asset)
    {
        $lc = new \lessc();
        if ($dir = $asset->getSourceDirectory()) {
            $lc->importDir = $dir;
        }

        foreach ($this->loadPaths as $loadPath) {
            $lc->addImportDir($loadPath);
        }

        foreach ($this->customFunctions as $name => $callable) {
            $lc->registerFunction($name, $callable);
        }

        if ($this->formatter) {
            $lc->setFormatter($this->formatter);
        }

        if (null !== $this->preserveComments) {
            $lc->setPreserveComments($this->preserveComments);
        }

        $asset->setContent($lc->parse($asset->getContent(), $this->presets));
    }

    public function registerFunction($name, $callable)
    {
        $this->customFunctions[$name] = $callable;
    }

    public function filterDump(AssetInterface $asset)
    {
    }

    public function getChildren(AssetFactory $factory, $content, $loadPath = null)
    {
        $loadPaths = $this->loadPaths;
        if (null !== $loadPath) {
            $loadPaths[] = $loadPath;
        }

        if (empty($loadPaths)) {
            return array();
        }

        $children = array();
        foreach (LessUtils::extractImports($content) as $reference) {
            if ('.css' === substr($reference, -4)) {
                // skip normal css imports
                // todo: skip imports with media queries
                continue;
            }

            if ('.less' !== substr($reference, -5)) {
                $reference .= '.less';
            }

            foreach ($loadPaths as $loadPath) {
                if (file_exists($file = $loadPath.'/'.$reference)) {
                    $coll = $factory->createAsset($file, array(), array('root' => $loadPath));
                    foreach ($coll as $leaf) {
                        $leaf->ensureFilter($this);
                        $children[] = $leaf;
                        goto next_reference;
                    }
                }
            }

            next_reference:
        }

        return $children;
    }
}
