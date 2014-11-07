<?php

namespace Sabre\CalDAV\Exception;

use Sabre\DAV;
use Sabre\CalDAV;

/**
 * InvalidComponentType
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class InvalidComponentType extends DAV\Exception\Forbidden {

    /**
     * Adds in extra information in the xml response.
     *
     * This method adds the {CALDAV:}supported-calendar-component as defined in rfc4791
     *
     * @param DAV\Server $server
     * @param \DOMElement $errorNode
     * @return void
     */
    public function serialize(DAV\Server $server, \DOMElement $errorNode) {

        $doc = $errorNode->ownerDocument;

        $np = $doc->createElementNS(CalDAV\Plugin::NS_CALDAV,'cal:supported-calendar-component');
        $errorNode->appendChild($np);

    }

}
