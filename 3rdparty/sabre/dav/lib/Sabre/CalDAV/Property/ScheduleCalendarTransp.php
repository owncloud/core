<?php

namespace Sabre\CalDAV\Property;

use Sabre\DAV;
use Sabre\CalDAV;

/**
 * schedule-calendar-transp property.
 *
 * This property is a representation of the schedule-calendar-transp property.
 * This property is defined in RFC6638 (caldav scheduling).
 *
 * Its values are either 'transparent' or 'opaque'. If it's transparent, it
 * means that this calendar will not be taken into consideration when a
 * different user queries for free-busy information. If it's 'opaque', it will.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class ScheduleCalendarTransp extends DAV\Property {

    const TRANSPARENT = 'transparent';
    const OPAQUE = 'opaque';

    protected $value;

    /**
     * Creates the property
     *
     * @param string $value
     */
    public function __construct($value) {

        if ($value !== self::TRANSPARENT && $value !== self::OPAQUE) {
            throw new \InvalidArgumentException('The value must either be specified as "transparent" or "opaque"');
        }
        $this->value = $value;

    }

    /**
     * Returns the current value
     *
     * @return string
     */
    public function getValue() {

        return $this->value;

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
        switch($this->value) {
            case self::TRANSPARENT :
                $xval = $doc->createElement('cal:transparent');
                break;
            case self::OPAQUE :
                $xval = $doc->createElement('cal:opaque');
                break;
        }

        $node->appendChild($xval);

    }

    /**
     * Unserializes the DOMElement back into a Property class.
     *
     * @param \DOMElement $node
     * @return ScheduleCalendarTransp
     */
    static function unserialize(\DOMElement $node) {

        $value = null;
        foreach($node->childNodes as $childNode) {
            switch(DAV\XMLUtil::toClarkNotation($childNode)) {
                case '{' . CalDAV\Plugin::NS_CALDAV . '}opaque' :
                    $value = self::OPAQUE;
                    break;
                case '{' . CalDAV\Plugin::NS_CALDAV . '}transparent' :
                    $value = self::TRANSPARENT;
                    break;
            }
        }
        if (is_null($value))
           return null;

        return new self($value);

    }
}
