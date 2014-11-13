<?php

namespace Sabre\DAV\Property;

use Sabre\DAV;

/**
 * HrefList property
 *
 * This property contains multiple {DAV:}href elements, each containing a url.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class HrefList extends DAV\Property {

    /**
     * hrefs
     *
     * @var array
     */
    private $hrefs;

    /**
     * Automatically prefix the url with the server base directory
     *
     * @var bool
     */
    private $autoPrefix = true;

    /**
     * __construct
     *
     * @param array $hrefs
     * @param bool $autoPrefix
     */
    public function __construct(array $hrefs, $autoPrefix = true) {

        $this->hrefs = $hrefs;
        $this->autoPrefix = $autoPrefix;

    }

    /**
     * Returns the uris
     *
     * @return array
     */
    public function getHrefs() {

        return $this->hrefs;

    }

    /**
     * Serializes this property.
     *
     * It will additionally prepend the href property with the server's base uri.
     *
     * @param DAV\Server $server
     * @param \DOMElement $dom
     * @return void
     */
    public function serialize(DAV\Server $server,\DOMElement $dom) {

        $prefix = $server->xmlNamespaces['DAV:'];

        foreach($this->hrefs as $href) {

            $elem = $dom->ownerDocument->createElement($prefix . ':href');
            if ($this->autoPrefix) {
                $value = $server->getBaseUri() . DAV\URLUtil::encodePath($href);
            } else {
                $value = $href;
            }
            $elem->appendChild($dom->ownerDocument->createTextNode($value));

            $dom->appendChild($elem);
        }

    }

    /**
     * Unserializes this property from a DOM Element
     *
     * This method returns an instance of this class.
     * It will only decode {DAV:}href values.
     *
     * @param \DOMElement $dom
     * @return DAV\Property\HrefList
     */
    static function unserialize(\DOMElement $dom) {

        $hrefs = array();
        foreach($dom->childNodes as $child) {
            if (DAV\XMLUtil::toClarkNotation($child)==='{DAV:}href') {
                $hrefs[] = $child->textContent;
            }
        }
        return new self($hrefs, false);

    }

}
