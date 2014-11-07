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
use Assetic\Asset\FileAsset;
use Assetic\Asset\HttpAsset;
use Assetic\Factory\AssetFactory;

/**
 * Inlines imported stylesheets.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class CssImportFilter extends BaseCssFilter implements DependencyExtractorInterface
{
    private $importFilter;

    /**
     * Constructor.
     *
     * @param FilterInterface $importFilter Filter for each imported asset
     */
    public function __construct(FilterInterface $importFilter = null)
    {
        $this->importFilter = $importFilter ?: new CssRewriteFilter();
    }

    public function filterLoad(AssetInterface $asset)
    {
        $importFilter = $this->importFilter;
        $sourceRoot = $asset->getSourceRoot();
        $sourcePath = $asset->getSourcePath();

        $callback = function ($matches) use ($importFilter, $sourceRoot, $sourcePath) {
            if (!$matches['url'] || null === $sourceRoot) {
                return $matches[0];
            }

            $importRoot = $sourceRoot;

            if (false !== strpos($matches['url'], '://')) {
                // absolute
                list($importScheme, $tmp) = explode('://', $matches['url'], 2);
                list($importHost, $importPath) = explode('/', $tmp, 2);
                $importRoot = $importScheme.'://'.$importHost;
            } elseif (0 === strpos($matches['url'], '//')) {
                // protocol-relative
                list($importHost, $importPath) = explode('/', substr($matches['url'], 2), 2);
                $importRoot = '//'.$importHost;
            } elseif ('/' == $matches['url'][0]) {
                // root-relative
                $importPath = substr($matches['url'], 1);
            } elseif (null !== $sourcePath) {
                // document-relative
                $importPath = $matches['url'];
                if ('.' != $sourceDir = dirname($sourcePath)) {
                    $importPath = $sourceDir.'/'.$importPath;
                }
            } else {
                return $matches[0];
            }

            $importSource = $importRoot.'/'.$importPath;
            if (false !== strpos($importSource, '://') || 0 === strpos($importSource, '//')) {
                $import = new HttpAsset($importSource, array($importFilter), true);
            } elseif ('css' != pathinfo($importPath, PATHINFO_EXTENSION) || !file_exists($importSource)) {
                // ignore non-css and non-existant imports
                return $matches[0];
            } else {
                $import = new FileAsset($importSource, array($importFilter), $importRoot, $importPath);
            }

            $import->setTargetPath($sourcePath);

            return $import->dump();
        };

        $content = $asset->getContent();
        $lastHash = md5($content);

        do {
            $content = $this->filterImports($content, $callback);
            $hash = md5($content);
        } while ($lastHash != $hash && $lastHash = $hash);

        $asset->setContent($content);
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
