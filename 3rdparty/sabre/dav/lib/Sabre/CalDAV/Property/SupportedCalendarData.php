<?php

namespace Sabre\CalDAV\Property;
use Sabre\DAV;
use Sabre\CalDAV\Plugin;

/**
 * Supported-calendar-data property
 *
 * This property is a representation of the supported-calendar-data property
 * in the CalDAV namespace. SabreDAV only has support for text/calendar;2.0
 * so the value is currently hardcoded.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class SupportedCalendarData extends DAV\Property {

    /**
     * Serializes the property in a DOMDocument
     *
     * @param DAV\Server $server
     * @param \DOMElement $node
     * @return void
     */
    public function serialize(DAV\Server $server,\DOMElement $node) {

        $doc = $node->ownerDocument;

        $prefix = isset($server->xmlNamespaces[Plugin::NS_CALDAV])?$server->xmlNamespaces[Plugin::NS_CALDAV]:'cal';

        $caldata = $doc->createElement($prefix . ':calendar-data');
        $caldata->setAttribute('content-type','text/calendar');
        $caldata->setAttribute('version','2.0');

        $node->appendChild($caldata);
    }

}
