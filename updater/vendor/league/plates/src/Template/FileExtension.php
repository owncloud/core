<?php

namespace League\Plates\Template;

/**
 * Template file extension.
 */
class FileExtension
{
    /**
     * Template file extension.
     * @var string
     */
    protected $fileExtension;

    /**
     * Create new FileExtension instance.
     * @param null|string $fileExtension
     */
    public function __construct($fileExtension = 'php')
    {
        $this->set($fileExtension);
    }

    /**
     * Set the template file extension.
     * @param  null|string   $fileExtension
     * @return FileExtension
     */
    public function set($fileExtension)
    {
        $this->fileExtension = $fileExtension;

        return $this;
    }

    /**
     * Get the template file extension.
     * @return string
     */
    public function get()
    {
        return $this->fileExtension;
    }
}
