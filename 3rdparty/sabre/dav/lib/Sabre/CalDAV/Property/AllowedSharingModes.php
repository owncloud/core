<?php

namespace Sabre\CalDAV\Property;

use Sabre\DAV;

/**
 * AllowedSharingModes
 *
 * This property encodes the 'allowed-sharing-modes' property, as defined by
 * the 'caldav-sharing-02' spec, in the http://calendarserver.org/ns/
 * namespace.
 *
 * This property is a representation of the supported-calendar_component-set
 * property in the CalDAV namespace. It simply requires an array of components,
 * such as VEVENT, VTODO
 *
 * @see https://trac.calendarserver.org/browser/CalendarServer/trunk/doc/Extensions/caldav-sharing-02.txt
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class AllowedSharingModes extends DAV\Property {

    /**
     * Whether or not a calendar can be shared with another user
     *
     * @var bool
     */
    protected $canBeShared;

    /**
     * Whether or not the calendar can be placed on a public url.
     *
     * @var bool
     */
    protected $canBePublished;

    /**
     * Constructor
     *
     * @param bool $canBeShared
     * @param bool $canBePublished
     * @return void
     */
    public function __construct($canBeShared, $canBePublished) {

        $this->canBeShared = $canBeShared;
        $this->canBePublished = $canBePublished;

    }

    /**
     * Serializes the property in a DOMDocument
     *
     * @param DAV\Server $server
     * @param \DOMElement $node
     * @return void
     */
    public function serialize(DAV\Server $server, \DOMElement $node) {

       $doc = $node->ownerDocument;
       if ($this->canBeShared) {
            $xcomp = $doc->createElement('cs:can-be-shared');
            $node->appendChild($xcomp);
       }
       if ($this->canBePublished) {
            $xcomp = $doc->createElement('cs:can-be-published');
            $node->appendChild($xcomp);
       }

    }

}
