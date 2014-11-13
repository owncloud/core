<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Factory\Resource;

/**
 * A resource is something formulae can be loaded from.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
interface ResourceInterface
{
    /**
     * Checks if a timestamp represents the latest resource.
     *
     * @param integer $timestamp A UNIX timestamp
     *
     * @return Boolean True if the timestamp is up to date
     */
    public function isFresh($timestamp);

    /**
     * Returns the content of the resource.
     *
     * @return string The content
     */
    public function getContent();

    /**
     * Returns a unique string for the current resource.
     *
     * @return string A unique string to identity the current resource
     */
    public function __toString();
}
