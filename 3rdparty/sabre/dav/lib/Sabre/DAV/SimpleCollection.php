<?php

namespace Sabre\DAV;

/**
 * SimpleCollection
 *
 * The SimpleCollection is used to quickly setup static directory structures.
 * Just create the object with a proper name, and add children to use it.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class SimpleCollection extends Collection {

    /**
     * List of childnodes
     *
     * @var array
     */
    protected $children = array();

    /**
     * Name of this resource
     *
     * @var string
     */
    protected $name;

    /**
     * Creates this node
     *
     * The name of the node must be passed, child nodes can also be passed.
     * This nodes must be instances of INode
     *
     * @param string $name
     * @param array $children
     */
    public function __construct($name,array $children = array()) {

        $this->name = $name;
        foreach($children as $child) {

            if (!($child instanceof INode)) throw new Exception('Only instances of Sabre\DAV\INode are allowed to be passed in the children argument');
            $this->addChild($child);

        }

    }

    /**
     * Adds a new childnode to this collection
     *
     * @param INode $child
     * @return void
     */
    public function addChild(INode $child) {

        $this->children[$child->getName()] = $child;

    }

    /**
     * Returns the name of the collection
     *
     * @return string
     */
    public function getName() {

        return $this->name;

    }

    /**
     * Returns a child object, by its name.
     *
     * This method makes use of the getChildren method to grab all the child nodes, and compares the name.
     * Generally its wise to override this, as this can usually be optimized
     *
     * This method must throw Sabre\DAV\Exception\NotFound if the node does not
     * exist.
     *
     * @param string $name
     * @throws Exception\NotFound
     * @return INode
     */
    public function getChild($name) {

        if (isset($this->children[$name])) return $this->children[$name];
        throw new Exception\NotFound('File not found: ' . $name . ' in \'' . $this->getName() . '\'');

    }

    /**
     * Returns a list of children for this collection
     *
     * @return array
     */
    public function getChildren() {

        return array_values($this->children);

    }


}

