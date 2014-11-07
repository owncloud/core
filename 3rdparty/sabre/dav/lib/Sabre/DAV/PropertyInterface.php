<?php

namespace Sabre\DAV;

/**
 * PropertyInterface
 *
 * Implement this interface to create new complex properties
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
interface PropertyInterface {

    public function serialize(Server $server, \DOMElement $prop);

    static function unserialize(\DOMElement $prop);

}

