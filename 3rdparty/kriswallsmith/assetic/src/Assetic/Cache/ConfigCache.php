<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Cache;

/**
 * A config cache stores values using var_export() and include.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class ConfigCache
{
    private $dir;

    /**
     * Construct.
     *
     * @param string $dir The cache directory
     */
    public function __construct($dir)
    {
        $this->dir = $dir;
    }

    /**
     * Checks of the cache has a file.
     *
     * @param string $resource A cache key
     *
     * @return Boolean True if a file exists
     */
    public function has($resource)
    {
        return file_exists($this->getSourcePath($resource));
    }

    /**
     * Writes a value to a file.
     *
     * @param string $resource A cache key
     * @param mixed  $value    A value to cache
     */
    public function set($resource, $value)
    {
        $path = $this->getSourcePath($resource);

        if (!is_dir($dir = dirname($path)) && false === @mkdir($dir, 0777, true)) {
            // @codeCoverageIgnoreStart
            throw new \RuntimeException('Unable to create directory '.$dir);
            // @codeCoverageIgnoreEnd
        }

        if (false === @file_put_contents($path, sprintf("<?php\n\n// $resource\nreturn %s;\n", var_export($value, true)))) {
            // @codeCoverageIgnoreStart
            throw new \RuntimeException('Unable to write file '.$path);
            // @codeCoverageIgnoreEnd
        }
    }

    /**
     * Loads and returns the value for the supplied cache key.
     *
     * @param string $resource A cache key
     *
     * @return mixed The cached value
     */
    public function get($resource)
    {
        $path = $this->getSourcePath($resource);

        if (!file_exists($path)) {
            throw new \RuntimeException('There is no cached value for '.$resource);
        }

        return include $path;
    }

    /**
     * Returns a timestamp for when the cache was created.
     *
     * @param string $resource A cache key
     *
     * @return integer A UNIX timestamp
     */
    public function getTimestamp($resource)
    {
        $path = $this->getSourcePath($resource);

        if (!file_exists($path)) {
            throw new \RuntimeException('There is no cached value for '.$resource);
        }

        if (false === $mtime = @filemtime($path)) {
            // @codeCoverageIgnoreStart
            throw new \RuntimeException('Unable to determine file mtime for '.$path);
            // @codeCoverageIgnoreEnd
        }

        return $mtime;
    }

    /**
     * Returns the path where the file corresponding to the supplied cache key can be included from.
     *
     * @param string $resource A cache key
     *
     * @return string A file path
     */
    private function getSourcePath($resource)
    {
        $key = md5($resource);

        return $this->dir.'/'.$key[0].'/'.$key.'.php';
    }
}
