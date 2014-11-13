<?php

namespace Sabre\DAV\Exception;

use Sabre\DAV;

/**
 * ConflictingLock
 *
 * Similar to  the Locked exception, this exception thrown when a LOCK request
 * was made, on a resource which was already locked
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class ConflictingLock extends Locked {

    /**
     * This method allows the exception to include additional information into the WebDAV error response
     *
     * @param DAV\Server $server
     * @param \DOMElement $errorNode
     * @return void
     */
    public function serialize(DAV\Server $server, \DOMElement $errorNode) {

        if ($this->lock) {
            $error = $errorNode->ownerDocument->createElementNS('DAV:','d:no-conflicting-lock');
            $errorNode->appendChild($error);
            if (!is_object($this->lock)) var_dump($this->lock);
            $error->appendChild($errorNode->ownerDocument->createElementNS('DAV:','d:href',$this->lock->uri));
        }

    }

}
