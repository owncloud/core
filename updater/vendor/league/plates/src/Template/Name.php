<?php

namespace League\Plates\Template;

use League\Plates\Engine;
use LogicException;

/**
 * A template name.
 */
class Name
{
    /**
     * Instance of the template engine.
     * @var Engine
     */
    protected $engine;

    /**
     * The original name.
     * @var string
     */
    protected $name;

    /**
     * The parsed template folder.
     * @var Folder
     */
    protected $folder;

    /**
     * The parsed template filename.
     * @var string
     */
    protected $file;

    /**
     * Create a new Name instance.
     * @param Engine $engine
     * @param string $name
     */
    public function __construct(Engine $engine, $name)
    {
        $this->setEngine($engine);
        $this->setName($name);
    }

    /**
     * Set the engine.
     * @param  Engine $engine
     * @return Name
     */
    public function setEngine(Engine $engine)
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * Get the engine.
     * @return Engine
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * Set the original name and parse it.
     * @param  string $name
     * @return Name
     */
    public function setName($name)
    {
        $this->name = $name;

        $parts = explode('::', $this->name);

        if (count($parts) === 1) {
            $this->setFile($parts[0]);
        } elseif (count($parts) === 2) {
            $this->setFolder($parts[0]);
            $this->setFile($parts[1]);
        } else {
            throw new LogicException(
                'The template name "' . $this->name . '" is not valid. ' .
                'Do not use the folder namespace separator "::" more than once.'
            );
        }

        return $this;
    }

    /**
     * Get the original name.
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the parsed template folder.
     * @param  string $folder
     * @return Name
     */
    public function setFolder($folder)
    {
        $this->folder = $this->engine->getFolders()->get($folder);

        return $this;
    }

    /**
     * Get the parsed template folder.
     * @return string
     */
    public function getFolder()
    {
        return $this->folder;
    }

    /**
     * Set the parsed template file.
     * @param  string $file
     * @return Name
     */
    public function setFile($file)
    {
        if ($file === '') {
            throw new LogicException(
                'The template name "' . $this->name . '" is not valid. ' .
                'The template name cannot be empty.'
            );
        }

        $this->file = $file;

        if (!is_null($this->engine->getFileExtension())) {
            $this->file .= '.' . $this->engine->getFileExtension();
        }

        return $this;
    }

    /**
     * Get the parsed template file.
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Resolve template path.
     * @return string
     */
    public function getPath()
    {
        if (is_null($this->folder)) {
            return "{$this->getDefaultDirectory()}/{$this->file}";
        }

        $path = "{$this->folder->getPath()}/{$this->file}";

        if (
            !is_file($path)
            && $this->folder->getFallback()
            && is_file("{$this->getDefaultDirectory()}/{$this->file}")
        ) {
            $path = "{$this->getDefaultDirectory()}/{$this->file}";
        }

        return $path;
    }

    /**
     * Check if template path exists.
     * @return boolean
     */
    public function doesPathExist()
    {
        return is_file($this->getPath());
    }

    /**
     * Get the default templates directory.
     * @return string
     */
    protected function getDefaultDirectory()
    {
        $directory = $this->engine->getDirectory();

        if (is_null($directory)) {
            throw new LogicException(
                'The template name "' . $this->name . '" is not valid. '.
                'The default directory has not been defined.'
            );
        }

        return $directory;
    }
}
