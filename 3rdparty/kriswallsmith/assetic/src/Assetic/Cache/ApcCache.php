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
 * Uses APC to cache files
 *
 * @author André Roaldseth <andre@roaldseth.net>
 */
class ApcCache implements CacheInterface
{
    public $ttl = 0;

    /**
     * @see CacheInterface::has()
     */
    public function has($key)
    {
        return apc_exists($key);
    }

    /**
     * @see CacheInterface::get()
     */
    public function get($key)
    {
        $value = apc_fetch($key, $success);

        if (!$success) {
            throw new \RuntimeException('There is no cached value for '.$key);
        }

        return $value;
    }

    /**
     * @see CacheInterface::set()
     */
    public function set($key, $value)
    {
        $store = apc_store($key, $value, $this->ttl);

        if (!$store) {
            throw new \RuntimeException('Unable to store "'.$key.'" for '.$this->ttl.' seconds.');
        }

        return $store;
    }

    /**
     * @see CacheInterface::remove()
     */
    public function remove($key)
    {
        return apc_delete($key);
    }
}
