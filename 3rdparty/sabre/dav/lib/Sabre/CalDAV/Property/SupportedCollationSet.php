<?php

namespace Sabre\CalDAV\Property;
use Sabre\DAV;

/**
 * supported-collation-set property
 *
 * This property is a representation of the supported-collation-set property
 * in the CalDAV namespace.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class SupportedCollationSet extends DAV\Property {

    /**
     * Serializes the property in a DOM document
     *
     * @param DAV\Server $server
     * @param \DOMElement $node
     * @return void
     */
    public function serialize(DAV\Server $server,\DOMElement $node) {

        $doc = $node->ownerDocument;

        $prefix = $node->lookupPrefix('urn:ietf:params:xml:ns:caldav');
        if (!$prefix) $prefix = 'cal';

        $node->appendChild(
            $doc->createElement($prefix . ':supported-collation','i;ascii-casemap')
        );
        $node->appendChild(
            $doc->createElement($prefix . ':supported-collation','i;octet')
        );
        $node->appendChild(
            $doc->createElement($prefix . ':supported-collation','i;unicode-casemap')
        );


    }

}
