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
class DirectoryResource implements IteratorResourceInterface
{
    private $path;
    private $pattern;

    /**
     * Constructor.
     *
     * @param string $path    A directory path
     * @param string $pattern A filename pattern
     */
    public function __construct($path, $pattern = null)
    {
        if (DIRECTORY_SEPARATOR != substr($path, -1)) {
            $path .= DIRECTORY_SEPARATOR;
        }

        $this->path = $path;
        $this->pattern = $pattern;
    }

    public function isFresh($timestamp)
    {
        if (!is_dir($this->path) || filemtime($this->path) > $timestamp) {
            return false;
        }

        foreach ($this as $resource) {
            if (!$resource->isFresh($timestamp)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Returns the combined content of all inner resources.
     */
    public function getContent()
    {
        $content = array();
        foreach ($this as $resource) {
            $content[] = $resource->getContent();
        }

        return implode("\n", $content);
    }

    public function __toString()
    {
        return $this->path;
    }

    public function getIterator()
    {
        return is_dir($this->path)
            ? new DirectoryResourceIterator($this->getInnerIterator())
            : new \EmptyIterator();
    }

    protected function getInnerIterator()
    {
        return new DirectoryResourceFilterIterator(new \RecursiveDirectoryIterator($this->path, \RecursiveDirectoryIterator::FOLLOW_SYMLINKS), $this->pattern);
    }
}

/**
 * An iterator that converts file objects into file resources.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 * @access private
 */
class DirectoryResourceIterator extends \RecursiveIteratorIterator
{
    public function current()
    {
        return new FileResource(parent::current()->getPathname());
    }
}

/**
 * Filters files by a basename pattern.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 * @access private
 */
class DirectoryResourceFilterIterator extends \RecursiveFilterIterator
{
    protected $pattern;

    public function __construct(\RecursiveDirectoryIterator $iterator, $pattern = null)
    {
        parent::__construct($iterator);

        $this->pattern = $pattern;
    }

    public function accept()
    {
        $file = $this->current();
        $name = $file->getBasename();

        if ($file->isDir()) {
            return '.' != $name[0];
        }

        return null === $this->pattern || 0 < preg_match($this->pattern, $name);
    }

    public function getChildren()
    {
        return new self(new \RecursiveDirectoryIterator($this->current()->getPathname(), \RecursiveDirectoryIterator::FOLLOW_SYMLINKS), $this->pattern);
    }
}
