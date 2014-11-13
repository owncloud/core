<?php

namespace Sabre\DAV\Exception;

use Sabre\DAV;

/**
 * LockTokenMatchesRequestUri
 *
 * This exception is thrown by UNLOCK if a supplied lock-token is invalid
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class LockTokenMatchesRequestUri extends Conflict {

    /**
     * Creates the exception
     */
    public function __construct() {

        $this->message = 'The locktoken supplied does not match any locks on this entity';

    }

    /**
     * This method allows the exception to include additional information into the WebDAV error response
     *
     * @param DAV\Server $server
     * @param \DOMElement $errorNode
     * @return void
     */
    public function serialize(DAV\Server $server,\DOMElement $errorNode) {

        $error = $errorNode->ownerDocument->createElementNS('DAV:','d:lock-token-matches-request-uri');
        $errorNode->appendChild($error);

    }

}
