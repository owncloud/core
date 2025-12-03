<?php

namespace League\Plates\Template;

use LogicException;

/**
 * Default template directory.
 */
class Directory
{
    /**
     * Template directory path.
     * @var string
     */
    protected $path;

    /**
     * Create new Directory instance.
     * @param string $path
     */
    public function __construct($path = null)
    {
        $this->set($path);
    }

    /**
     * Set path to templates directory.
     * @param  string|null $path Pass null to disable the default directory.
     * @return Directory
     */
    public function set($path)
    {
        if (!is_null($path) and !is_dir($path)) {
            throw new LogicException(
                'The specified path "' . $path . '" does not exist.'
            );
        }

        $this->path = $path;

        return $this;
    }

    /**
     * Get path to templates directory.
     * @return string
     */
    public function get()
    {
        return $this->path;
    }
}
