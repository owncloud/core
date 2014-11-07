<?php

namespace Sabre\DAV;

/**
 * Node class
 *
 * This is a helper class, that should aid in getting nodes setup.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
abstract class Node implements INode {

    /**
     * Returns the last modification time
     *
     * In this case, it will simply return the current time
     *
     * @return int
     */
    public function getLastModified() {

        return time();

    }

    /**
     * Deletes the current node
     *
     * @throws Sabre\DAV\Exception\Forbidden
     * @return void
     */
    public function delete() {

        throw new Exception\Forbidden('Permission denied to delete node');

    }

    /**
     * Renames the node
     *
     * @throws Sabre\DAV\Exception\Forbidden
     * @param string $name The new name
     * @return void
     */
    public function setName($name) {

        throw new Exception\Forbidden('Permission denied to rename file');

    }

}

