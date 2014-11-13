<?php

namespace Sabre\DAVACL\Property;
use Sabre\DAV;

/**
 * Principal property
 *
 * The principal property represents a principal from RFC3744 (ACL).
 * The property can be used to specify a principal or pseudo principals.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Principal extends DAV\Property implements DAV\Property\IHref {

    /**
     * To specify a not-logged-in user, use the UNAUTHENTICATED principal
     */
    const UNAUTHENTICATED = 1;

    /**
     * To specify any principal that is logged in, use AUTHENTICATED
     */
    const AUTHENTICATED = 2;

    /**
     * Specific principals can be specified with the HREF
     */
    const HREF = 3;

    /**
     * Everybody, basically
     */
    const ALL = 4;

    /**
     * Principal-type
     *
     * Must be one of the UNAUTHENTICATED, AUTHENTICATED or HREF constants.
     *
     * @var int
     */
    private $type;

    /**
     * Url to principal
     *
     * This value is only used for the HREF principal type.
     *
     * @var string
     */
    private $href;

    /**
     * Creates the property.
     *
     * The 'type' argument must be one of the type constants defined in this class.
     *
     * 'href' is only required for the HREF type.
     *
     * @param int $type
     * @param string|null $href
     */
    public function __construct($type, $href = null) {

        $this->type = $type;

        if ($type===self::HREF && is_null($href)) {
            throw new DAV\Exception('The href argument must be specified for the HREF principal type.');
        }
        $this->href = $href;

    }

    /**
     * Returns the principal type
     *
     * @return int
     */
    public function getType() {

        return $this->type;

    }

    /**
     * Returns the principal uri.
     *
     * @return string
     */
    public function getHref() {

        return $this->href;

    }

    /**
     * Serializes the property into a DOMElement.
     *
     * @param DAV\Server $server
     * @param \DOMElement $node
     * @return void
     */
    public function serialize(DAV\Server $server, \DOMElement $node) {

        $prefix = $server->xmlNamespaces['DAV:'];
        switch($this->type) {

            case self::UNAUTHENTICATED :
                $node->appendChild(
                    $node->ownerDocument->createElement($prefix . ':unauthenticated')
                );
                break;
            case self::AUTHENTICATED :
                $node->appendChild(
                    $node->ownerDocument->createElement($prefix . ':authenticated')
                );
                break;
            case self::HREF :
                $href = $node->ownerDocument->createElement($prefix . ':href');
                $href->nodeValue = $server->getBaseUri() . DAV\URLUtil::encodePath($this->href);
                $node->appendChild($href);
                break;

        }

    }

    /**
     * Deserializes a DOM element into a property object.
     *
     * @param \DOMElement $dom
     * @return Principal
     */
    static public function unserialize(\DOMElement $dom) {

        $parent = $dom->firstChild;
        while(!DAV\XMLUtil::toClarkNotation($parent)) {
            $parent = $parent->nextSibling;
        }

        switch(DAV\XMLUtil::toClarkNotation($parent)) {

            case '{DAV:}unauthenticated' :
                return new self(self::UNAUTHENTICATED);
            case '{DAV:}authenticated' :
                return new self(self::AUTHENTICATED);
            case '{DAV:}href':
                return new self(self::HREF, $parent->textContent);
            case '{DAV:}all':
                return new self(self::ALL);
            default :
                throw new DAV\Exception\BadRequest('Unexpected element (' . DAV\XMLUtil::toClarkNotation($parent) . '). Could not deserialize');

        }

    }

}
