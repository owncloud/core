<?php

namespace Sabre\DAV;

/**
 * Abstract tree object
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
abstract class Tree {

    /**
     * This function must return an INode object for a path
     * If a Path doesn't exist, thrown a Exception_NotFound
     *
     * @param string $path
     * @throws Exception\NotFound
     * @return INode
     */
    abstract function getNodeForPath($path);

    /**
     * This function allows you to check if a node exists.
     *
     * Implementors of this class should override this method to make
     * it cheaper.
     *
     * @param string $path
     * @return bool
     */
    public function nodeExists($path) {

        try {

            $this->getNodeForPath($path);
            return true;

        } catch (Exception\NotFound $e) {

            return false;

        }

    }

    /**
     * Copies a file from path to another
     *
     * @param string $sourcePath The source location
     * @param string $destinationPath The full destination path
     * @return void
     */
    public function copy($sourcePath, $destinationPath) {

        $sourceNode = $this->getNodeForPath($sourcePath);

        // grab the dirname and basename components
        list($destinationDir, $destinationName) = URLUtil::splitPath($destinationPath);

        $destinationParent = $this->getNodeForPath($destinationDir);
        $this->copyNode($sourceNode,$destinationParent,$destinationName);

        $this->markDirty($destinationDir);

    }

    /**
     * Moves a file from one location to another
     *
     * @param string $sourcePath The path to the file which should be moved
     * @param string $destinationPath The full destination path, so not just the destination parent node
     * @return int
     */
    public function move($sourcePath, $destinationPath) {

        list($sourceDir, $sourceName) = URLUtil::splitPath($sourcePath);
        list($destinationDir, $destinationName) = URLUtil::splitPath($destinationPath);

        if ($sourceDir===$destinationDir) {
            $renameable = $this->getNodeForPath($sourcePath);
            $renameable->setName($destinationName);
        } else {
            $this->copy($sourcePath,$destinationPath);
            $this->getNodeForPath($sourcePath)->delete();
        }
        $this->markDirty($sourceDir);
        $this->markDirty($destinationDir);

    }

    /**
     * Deletes a node from the tree
     *
     * @param string $path
     * @return void
     */
    public function delete($path) {

        $node = $this->getNodeForPath($path);
        $node->delete();

        list($parent) = URLUtil::splitPath($path);
        $this->markDirty($parent);

    }

    /**
     * Returns a list of childnodes for a given path.
     *
     * @param string $path
     * @return array
     */
    public function getChildren($path) {

        $node = $this->getNodeForPath($path);
        return $node->getChildren();

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


    }

    /**
     * copyNode
     *
     * @param INode $source
     * @param ICollection $destinationParent
     * @param string $destinationName
     * @return void
     */
    protected function copyNode(INode $source,ICollection $destinationParent,$destinationName = null) {

        if (!$destinationName) $destinationName = $source->getName();

        if ($source instanceof IFile) {

            $data = $source->get();

            // If the body was a string, we need to convert it to a stream
            if (is_string($data)) {
                $stream = fopen('php://temp','r+');
                fwrite($stream,$data);
                rewind($stream);
                $data = $stream;
            }
            $destinationParent->createFile($destinationName,$data);
            $destination = $destinationParent->getChild($destinationName);

        } elseif ($source instanceof ICollection) {

            $destinationParent->createDirectory($destinationName);

            $destination = $destinationParent->getChild($destinationName);
            foreach($source->getChildren() as $child) {

                $this->copyNode($child,$destination);

            }

        }
        if ($source instanceof IProperties && $destination instanceof IProperties) {

            $props = $source->getProperties(array());
            $destination->updateProperties($props);

        }

    }

}

