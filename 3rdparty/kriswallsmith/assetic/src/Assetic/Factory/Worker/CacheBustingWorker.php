<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Factory\Worker;

use Assetic\Asset\AssetCollectionInterface;
use Assetic\Asset\AssetInterface;
use Assetic\Factory\AssetFactory;

/**
 * Adds cache busting code
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class CacheBustingWorker implements WorkerInterface
{
    private $separator;

    public function __construct($separator = '-')
    {
        $this->separator = $separator;
    }

    public function process(AssetInterface $asset, AssetFactory $factory)
    {
        if (!$path = $asset->getTargetPath()) {
            // no path to work with
            return;
        }

        if (!$search = pathinfo($path, PATHINFO_EXTENSION)) {
            // nothing to replace
            return;
        }

        $replace = $this->separator.$this->getHash($asset, $factory).'.'.$search;
        if (preg_match('/'.preg_quote($replace, '/').'$/', $path)) {
            // already replaced
            return;
        }

        $asset->setTargetPath(
            preg_replace('/\.'.preg_quote($search, '/').'$/', $replace, $path)
        );
    }

    protected function getHash(AssetInterface $asset, AssetFactory $factory)
    {
        $hash = hash_init('sha1');

        hash_update($hash, $factory->getLastModified($asset));

        if ($asset instanceof AssetCollectionInterface) {
            foreach ($asset as $i => $leaf) {
                $sourcePath = $leaf->getSourcePath();
                hash_update($hash, $sourcePath ?: $i);
            }
        }

        return substr(hash_final($hash), 0, 7);
    }
}
