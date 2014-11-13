<?php

namespace Sabre\DAV\FS;

use Sabre\DAV;

/**
 * Base node-class
 *
 * The node class implements the method used by both the File and the Directory classes
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
abstract class Node implements DAV\INode {

    /**
     * The path to the current node
     *
     * @var string
     */
    protected $path;

    /**
     * Sets up the node, expects a full path name
     *
     * @param string $path
     */
    public function __construct($path) {

        $this->path = $path;

    }



    /**
     * Returns the name of the node
     *
     * @return string
     */
    public function getName() {

        list(, $name)  = DAV\URLUtil::splitPath($this->path);
        return $name;

    }

    /**
     * Renames the node
     *
     * @param string $name The new name
     * @return void
     */
    public function setName($name) {

        list($parentPath, ) = DAV\URLUtil::splitPath($this->path);
        list(, $newName) = DAV\URLUtil::splitPath($name);

        $newPath = $parentPath . '/' . $newName;
        rename($this->path,$newPath);

        $this->path = $newPath;

    }



    /**
     * Returns the last modification time, as a unix timestamp
     *
     * @return int
     */
    public function getLastModified() {

        return filemtime($this->path);

    }

}

