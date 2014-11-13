<?php

namespace Sabre\DAV;

/**
 * The INode interface is the base interface, and the parent class of both ICollection and IFile
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
interface INode {

    /**
     * Deleted the current node
     *
     * @return void
     */
    function delete();

    /**
     * Returns the name of the node.
     *
     * This is used to generate the url.
     *
     * @return string
     */
    function getName();

    /**
     * Renames the node
     *
     * @param string $name The new name
     * @return void
     */
    function setName($name);

    /**
     * Returns the last modification time, as a unix timestamp
     *
     * @return int
     */
    function getLastModified();

}

