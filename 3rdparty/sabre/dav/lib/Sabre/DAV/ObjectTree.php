<?php

namespace Sabre\DAV;

/**
 * ObjectTree class
 *
 * This implementation of the Tree class makes use of the INode, IFile and ICollection API's
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class ObjectTree extends Tree {

    /**
     * The root node
     *
     * @var ICollection
     */
    protected $rootNode;

    /**
     * This is the node cache. Accessed nodes are stored here
     *
     * @var array
     */
    protected $cache = array();

    /**
     * Creates the object
     *
     * This method expects the rootObject to be passed as a parameter
     *
     * @param ICollection $rootNode
     */
    public function __construct(ICollection $rootNode) {

        $this->rootNode = $rootNode;

    }

    /**
     * Returns the INode object for the requested path
     *
     * @param string $path
     * @return INode
     */
    public function getNodeForPath($path) {

        $path = trim($path,'/');
        if (isset($this->cache[$path])) return $this->cache[$path];

        // Is it the root node?
        if (!strlen($path)) {
            return $this->rootNode;
        }

        // Attempting to fetch its parent
        list($parentName, $baseName) = URLUtil::splitPath($path);

        // If there was no parent, we must simply ask it from the root node.
        if ($parentName==="") {
            $node = $this->rootNode->getChild($baseName);
        } else {
            // Otherwise, we recursively grab the parent and ask him/her.
            $parent = $this->getNodeForPath($parentName);

            if (!($parent instanceof ICollection))
                throw new Exception\NotFound('Could not find node at path: ' . $path);

            $node = $parent->getChild($baseName);

        }

        $this->cache[$path] = $node;
        return $node;

    }

    /**
     * This function allows you to check if a node exists.
     *
     * @param string $path
     * @return bool
     */
    public function nodeExists($path) {

        try {

            // The root always exists
            if ($path==='') return true;

            list($parent, $base) = URLUtil::splitPath($path);

            $parentNode = $this->getNodeForPath($parent);
            if (!$parentNode instanceof ICollection) return false;
            return $parentNode->childExists($base);

        } catch (Exception\NotFound $e) {

            return false;

        }

    }

    /**
     * Returns a list of childnodes for a given path.
     *
     * @param string $path
     * @return array
     */
    public function getChildren($path) {

        $node = $this->getNodeForPath($path);
        $children = $node->getChildren();
        foreach($children as $child) {

            $this->cache[trim($path,'/') . '/' . $child->getName()] = $child;

        }
        return $children;

    }

    /**
     * This method is called with every tree update
     *
     * Examples of tree updates are:
     *   * node deletions
     *   * node creations
     *   * copy
     *   * move
     *   * renaming nodes
     *
     * If Tree classes implement a form of caching, this will allow
     * them to make sure caches will be expired.
     *
     * If a path is passed, it is assumed that the entire subtree is dirty
     *
     * @param string $path
     * @return void
     */
    public function markDirty($path) {

        // We don't care enough about sub-paths
        // flushing the entire cache
        $path = trim($path,'/');
        foreach($this->cache as $nodePath=>$node) {
            if ($nodePath == $path || strpos($nodePath,$path.'/')===0)
                unset($this->cache[$nodePath]);

        }

    }

}

