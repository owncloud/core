<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Extension\Twig;

use Assetic\Factory\Resource\ResourceInterface;

/**
 * A Twig template resource.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class TwigResource implements ResourceInterface
{
    private $loader;
    private $name;

    public function __construct(\Twig_LoaderInterface $loader, $name)
    {
        $this->loader = $loader;
        $this->name = $name;
    }

    public function getContent()
    {
        try {
            return $this->loader->getSource($this->name);
        } catch (\Twig_Error_Loader $e) {
            return '';
        }
    }

    public function isFresh($timestamp)
    {
        try {
            return $this->loader->isFresh($this->name, $timestamp);
        } catch (\Twig_Error_Loader $e) {
            return false;
        }
    }

    public function __toString()
    {
        return $this->name;
    }
}
