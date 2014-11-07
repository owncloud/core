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
 * Adds expiration to a cache backend.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class ExpiringCache implements CacheInterface
{
    private $cache;
    private $lifetime;

    public function __construct(CacheInterface $cache, $lifetime)
    {
        $this->cache = $cache;
        $this->lifetime = $lifetime;
    }

    public function has($key)
    {
        if ($this->cache->has($key)) {
            if (time() < $this->cache->get($key.'.expires')) {
                return true;
            }

            $this->cache->remove($key.'.expires');
            $this->cache->remove($key);
        }

        return false;
    }

    public function get($key)
    {
        return $this->cache->get($key);
    }

    public function set($key, $value)
    {
        $this->cache->set($key.'.expires', time() + $this->lifetime);
        $this->cache->set($key, $value);
    }

    public function remove($key)
    {
        $this->cache->remove($key.'.expires');
        $this->cache->remove($key);
    }
}
