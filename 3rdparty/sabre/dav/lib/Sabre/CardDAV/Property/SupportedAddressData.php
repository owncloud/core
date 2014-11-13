<?php

namespace Sabre\CardDAV\Property;

use Sabre\DAV;
use Sabre\CardDAV;

/**
 * Supported-address-data property
 *
 * This property is a representation of the supported-address-data property
 * in the CardDAV namespace.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class SupportedAddressData extends DAV\Property {

    /**
     * supported versions
     *
     * @var array
     */
    protected $supportedData = array();

    /**
     * Creates the property
     *
     * @param array|null $supportedData
     */
    public function __construct(array $supportedData = null) {

        if (is_null($supportedData)) {
            $supportedData = array(
                array('contentType' => 'text/vcard', 'version' => '3.0'),
                // array('contentType' => 'text/vcard', 'version' => '4.0'),
            );
        }

       $this->supportedData = $supportedData;

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

        $prefix =
            isset($server->xmlNamespaces[CardDAV\Plugin::NS_CARDDAV]) ?
            $server->xmlNamespaces[CardDAV\Plugin::NS_CARDDAV] :
            'card';

        foreach($this->supportedData as $supported) {

            $caldata = $doc->createElementNS(CardDAV\Plugin::NS_CARDDAV, $prefix . ':address-data-type');
            $caldata->setAttribute('content-type',$supported['contentType']);
            $caldata->setAttribute('version',$supported['version']);
            $node->appendChild($caldata);

        }

    }

}
