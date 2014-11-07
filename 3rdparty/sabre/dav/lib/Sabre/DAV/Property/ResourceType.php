<?php

namespace Sabre\DAV\Property;

use Sabre\DAV;

/**
 * This class represents the {DAV:}resourcetype property
 *
 * Normally for files this is empty, and for collection {DAV:}collection.
 * However, other specs define different values for this.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class ResourceType extends DAV\Property {

    /**
     * resourceType
     *
     * @var array
     */
    public $resourceType = array();

    /**
     * __construct
     *
     * @param mixed $resourceType
     */
    public function __construct($resourceType = array()) {

        if ($resourceType === DAV\Server::NODE_FILE)
            $this->resourceType = array();
        elseif ($resourceType === DAV\Server::NODE_DIRECTORY)
            $this->resourceType = array('{DAV:}collection');
        elseif (is_array($resourceType))
            $this->resourceType = $resourceType;
        else
            $this->resourceType = array($resourceType);

    }

    /**
     * serialize
     *
     * @param DAV\Server $server
     * @param \DOMElement $prop
     * @return void
     */
    public function serialize(DAV\Server $server, \DOMElement $prop) {

        $propName = null;
        $rt = $this->resourceType;

        foreach($rt as $resourceType) {
            if (preg_match('/^{([^}]*)}(.*)$/',$resourceType,$propName)) {

                if (isset($server->xmlNamespaces[$propName[1]])) {
                    $prop->appendChild($prop->ownerDocument->createElement($server->xmlNamespaces[$propName[1]] . ':' . $propName[2]));
                } else {
                    $prop->appendChild($prop->ownerDocument->createElementNS($propName[1],'custom:' . $propName[2]));
                }

            }
        }

    }

    /**
     * Returns the values in clark-notation
     *
     * For example array('{DAV:}collection')
     *
     * @return array
     */
    public function getValue() {

        return $this->resourceType;

    }

    /**
     * Checks if the principal contains a certain value
     *
     * @param string $type
     * @return bool
     */
    public function is($type) {

        return in_array($type, $this->resourceType);

    }

    /**
     * Adds a resourcetype value to this property
     *
     * @param string $type
     * @return void
     */
    public function add($type) {

        $this->resourceType[] = $type;
        $this->resourceType = array_unique($this->resourceType);

    }

    /**
     * Unserializes a DOM element into a ResourceType property.
     *
     * @param \DOMElement $dom
     * @return DAV\Property\ResourceType
     */
    static public function unserialize(\DOMElement $dom) {

        $value = array();
        foreach($dom->childNodes as $child) {

            $value[] = DAV\XMLUtil::toClarkNotation($child);

        }

        return new self($value);

    }

}
