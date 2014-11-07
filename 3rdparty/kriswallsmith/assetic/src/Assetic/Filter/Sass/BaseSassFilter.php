<?php

namespace Assetic\Filter\Sass;

use Assetic\Asset\AssetInterface;
use Assetic\Factory\AssetFactory;
use Assetic\Filter\BaseProcessFilter;
use Assetic\Filter\DependencyExtractorInterface;
use Assetic\Util\CssUtils;

abstract class BaseSassFilter extends BaseProcessFilter implements DependencyExtractorInterface
{
    protected $loadPaths = array();

    public function setLoadPaths(array $loadPaths)
    {
        $this->loadPaths = $loadPaths;
    }

    public function addLoadPath($loadPath)
    {
        $this->loadPaths[] = $loadPath;
    }

    public function getChildren(AssetFactory $factory, $content, $loadPath = null)
    {
        $loadPaths = $this->loadPaths;
        if ($loadPath) {
            array_unshift($loadPaths, $loadPath);
        }

        if (!$loadPaths) {
            return array();
        }

        $children = array();
        foreach (CssUtils::extractImports($content) as $reference) {
            if ('.css' === substr($reference, -4)) {
                // skip normal css imports
                // todo: skip imports with media queries
                continue;
            }

            // the reference may or may not have an extension or be a partial
            if (pathinfo($reference, PATHINFO_EXTENSION)) {
                $needles = array(
                    $reference,
                    self::partialize($reference),
                );
            } else {
                $needles = array(
                    $reference.'.scss',
                    $reference.'.sass',
                    self::partialize($reference).'.scss',
                    self::partialize($reference).'.sass',
                );
            }

            foreach ($loadPaths as $loadPath) {
                foreach ($needles as $needle) {
                    if (file_exists($file = $loadPath.'/'.$needle)) {
                        $coll = $factory->createAsset($file, array(), array('root' => $loadPath));
                        foreach ($coll as $leaf) {
                            /** @var $leaf AssetInterface */
                            $leaf->ensureFilter($this);
                            $children[] = $leaf;
                            goto next_reference;
                        }
                    }
                }
            }

            next_reference:
        }

        return $children;
    }

    private static function partialize($reference)
    {
        $parts = pathinfo($reference);

        if ('.' === $parts['dirname']) {
            $partial = '_'.$parts['filename'];
        } else {
            $partial = $parts['dirname'].DIRECTORY_SEPARATOR.'_'.$parts['filename'];
        }

        if (isset($parts['extension'])) {
            $partial .= '.'.$parts['extension'];
        }

        return $partial;
    }
}
