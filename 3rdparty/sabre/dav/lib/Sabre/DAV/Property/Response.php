<?php

namespace Sabre\DAV\Property;

use Sabre\DAV;

/**
 * Response property
 *
 * This class represents the {DAV:}response XML element.
 * This is used by the Server class to encode individual items within a multistatus
 * response.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Response extends DAV\Property implements IHref {

    /**
     * Url for the response
     *
     * @var string
     */
    private $href;

    /**
     * Propertylist, ordered by HTTP status code
     *
     * @var array
     */
    private $responseProperties;

    /**
     * The responseProperties argument is a list of properties
     * within an array with keys representing HTTP status codes
     *
     * @param string $href
     * @param array $responseProperties
     */
    public function __construct($href, array $responseProperties) {

        $this->href = $href;
        $this->responseProperties = $responseProperties;

    }

    /**
     * Returns the url
     *
     * @return string
     */
    public function getHref() {

        return $this->href;

    }

    /**
     * Returns the property list
     *
     * @return array
     */
    public function getResponseProperties() {

        return $this->responseProperties;

    }

    /**
     * serialize
     *
     * @param DAV\Server $server
     * @param \DOMElement $dom
     * @return void
     */
    public function serialize(DAV\Server $server, \DOMElement $dom) {

        $document = $dom->ownerDocument;
        $properties = $this->responseProperties;

        $xresponse = $document->createElement('d:response');
        $dom->appendChild($xresponse);

        $uri = DAV\URLUtil::encodePath($this->href);

        // Adding the baseurl to the beginning of the url
        $uri = $server->getBaseUri() . $uri;

        $xresponse->appendChild($document->createElement('d:href',$uri));

        // The properties variable is an array containing properties, grouped by
        // HTTP status
        foreach($properties as $httpStatus=>$propertyGroup) {

            // The 'href' is also in this array, and it's special cased.
            // We will ignore it
            if ($httpStatus=='href') continue;

            // If there are no properties in this group, we can also just carry on
            if (!count($propertyGroup)) continue;

            $xpropstat = $document->createElement('d:propstat');
            $xresponse->appendChild($xpropstat);

            $xprop = $document->createElement('d:prop');
            $xpropstat->appendChild($xprop);

            $nsList = $server->xmlNamespaces;

            foreach($propertyGroup as $propertyName=>$propertyValue) {

                $propName = null;
                preg_match('/^{([^}]*)}(.*)$/',$propertyName,$propName);

                // special case for empty namespaces
                if ($propName[1]=='') {

                    $currentProperty = $document->createElement($propName[2]);
                    $xprop->appendChild($currentProperty);
                    $currentProperty->setAttribute('xmlns','');

                } else {

                    if (!isset($nsList[$propName[1]])) {
                        $nsList[$propName[1]] = 'x' . count($nsList);
                    }

                    // If the namespace was defined in the top-level xml namespaces, it means
                    // there was already a namespace declaration, and we don't have to worry about it.
                    if (isset($server->xmlNamespaces[$propName[1]])) {
                        $currentProperty = $document->createElement($nsList[$propName[1]] . ':' . $propName[2]);
                    } else {
                        $currentProperty = $document->createElementNS($propName[1],$nsList[$propName[1]].':' . $propName[2]);
                    }
                    $xprop->appendChild($currentProperty);

                }

                if (is_scalar($propertyValue)) {
                    $text = $document->createTextNode($propertyValue);
                    $currentProperty->appendChild($text);
                } elseif ($propertyValue instanceof DAV\PropertyInterface) {
                    $propertyValue->serialize($server,$currentProperty);
                } elseif (!is_null($propertyValue)) {
                    throw new DAV\Exception('Unknown property value type: ' . gettype($propertyValue) . ' for property: ' . $propertyName);
                }

            }

            $xpropstat->appendChild($document->createElement('d:status',$server->httpResponse->getStatusMessage($httpStatus)));

        }

    }

}
