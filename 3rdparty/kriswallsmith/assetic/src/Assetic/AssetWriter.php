<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic;

use Assetic\Asset\AssetInterface;
use Assetic\Util\VarUtils;

/**
 * Writes assets to the filesystem.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
class AssetWriter
{
    private $dir;
    private $values;

    /**
     * Constructor.
     *
     * @param string $dir    The base web directory
     * @param array  $values Variable values
     *
     * @throws \InvalidArgumentException if a variable value is not a string
     */
    public function __construct($dir, array $values = array())
    {
        foreach ($values as $var => $vals) {
            foreach ($vals as $value) {
                if (!is_string($value)) {
                    throw new \InvalidArgumentException(sprintf('All variable values must be strings, but got %s for variable "%s".', json_encode($value), $var));
                }
            }
        }

        $this->dir = $dir;
        $this->values = $values;
    }

    public function writeManagerAssets(AssetManager $am)
    {
        foreach ($am->getNames() as $name) {
            $this->writeAsset($am->get($name));
        }
    }

    public function writeAsset(AssetInterface $asset)
    {
        foreach (VarUtils::getCombinations($asset->getVars(), $this->values) as $combination) {
            $asset->setValues($combination);

            static::write(
                $this->dir.'/'.VarUtils::resolve(
                    $asset->getTargetPath(),
                    $asset->getVars(),
                    $asset->getValues()
                ),
                $asset->dump()
            );
        }
    }

    protected static function write($path, $contents)
    {
        if (!is_dir($dir = dirname($path)) && false === @mkdir($dir, 0777, true)) {
            throw new \RuntimeException('Unable to create directory '.$dir);
        }

        if (false === @file_put_contents($path, $contents)) {
            throw new \RuntimeException('Unable to write file '.$path);
        }
    }

    /**
     * Not used.
     *
     * This method is provided for backward compatibility with certain versions
     * of AsseticBundle.
     */
    private function getCombinations(array $vars)
    {
        return VarUtils::getCombinations($vars, $this->values);
    }
}
