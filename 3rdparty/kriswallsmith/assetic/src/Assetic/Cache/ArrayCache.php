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
 * A simple array cache
 *
 * @author Michael Mifsud <xzyfer@gmail.com>
 */
class ArrayCache implements CacheInterface
{
    private $cache = array();

    /**
     * @see CacheInterface::has()
     */
    public function has($key)
    {
        return isset($this->cache[$key]);
    }

    /**
     * @see CacheInterface::get()
     */
    public function get($key)
    {
        if (!$this->has($key)) {
            throw new \RuntimeException('There is no cached value for '.$key);
        }

        return $this->cache[$key];
    }

    /**
     * @see CacheInterface::set()
     */
    public function set($key, $value)
    {
        $this->cache[$key] = $value;
    }

    /**
     * @see CacheInterface::remove()
     */
    public function remove($key)
    {
        unset($this->cache[$key]);
    }
}
