<?php

namespace Sabre\CalDAV\Property;

use Sabre\DAV;
use Sabre\CalDAV;

/**
 * Supported component set property
 *
 * This property is a representation of the supported-calendar_component-set
 * property in the CalDAV namespace. It simply requires an array of components,
 * such as VEVENT, VTODO
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class SupportedCalendarComponentSet extends DAV\Property {

    /**
     * List of supported components, such as "VEVENT, VTODO"
     *
     * @var array
     */
    private $components;

    /**
     * Creates the property
     *
     * @param array $components
     */
    public function __construct(array $components) {

       $this->components = $components;

    }

    /**
     * Returns the list of supported components
     *
     * @return array
     */
    public function getValue() {

        return $this->components;

    }

    /**
     * Serializes the property in a DOMDocument
     *
     * @param DAV\Server $server
     * @param \DOMElement $node
     * @return void
     */
    public function serialize(DAV\Server $server,\DOMElement $node) {

       $doc = $node->ownerDocument;
       foreach($this->components as $component) {

            $xcomp = $doc->createElement('cal:comp');
            $xcomp->setAttribute('name',$component);
            $node->appendChild($xcomp);

       }

    }

    /**
     * Unserializes the DOMElement back into a Property class.
     *
     * @param \DOMElement $node
     * @return Property_SupportedCalendarComponentSet
     */
    static function unserialize(\DOMElement $node) {

        $components = array();
        foreach($node->childNodes as $childNode) {
            if (DAV\XMLUtil::toClarkNotation($childNode)==='{' . CalDAV\Plugin::NS_CALDAV . '}comp') {
                $components[] = $childNode->getAttribute('name');
            }
        }
        return new self($components);

    }

}
