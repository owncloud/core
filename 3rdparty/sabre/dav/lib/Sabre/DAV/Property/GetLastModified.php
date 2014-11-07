<?php

namespace Sabre\DAV\Property;

use Sabre\DAV;
use Sabre\HTTP;

/**
 * This property represents the {DAV:}getlastmodified property.
 *
 * Although this is normally a simple property, windows requires us to add
 * some new attributes.
 *
 * This class uses unix timestamps internally, and converts them to RFC 1123 times for
 * serialization
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class GetLastModified extends DAV\Property {

    /**
     * time
     *
     * @var int
     */
    public $time;

    /**
     * __construct
     *
     * @param int|DateTime $time
     */
    public function __construct($time) {

        if ($time instanceof \DateTime) {
            $this->time = $time;
        } elseif (is_int($time) || ctype_digit($time)) {
            $this->time = new \DateTime('@' . $time);
        } else {
            $this->time = new \DateTime($time);
        }

        // Setting timezone to UTC
        $this->time->setTimezone(new \DateTimeZone('UTC'));

    }

    /**
     * serialize
     *
     * @param DAV\Server $server
     * @param \DOMElement $prop
     * @return void
     */
    public function serialize(DAV\Server $server, \DOMElement $prop) {

        $doc = $prop->ownerDocument;
        //$prop->setAttribute('xmlns:b','urn:uuid:c2f41010-65b3-11d1-a29f-00aa00c14882/');
        //$prop->setAttribute('b:dt','dateTime.rfc1123');
        $prop->nodeValue = HTTP\Util::toHTTPDate($this->time);

    }

    /**
     * getTime
     *
     * @return \DateTime
     */
    public function getTime() {

        return $this->time;

    }

}

