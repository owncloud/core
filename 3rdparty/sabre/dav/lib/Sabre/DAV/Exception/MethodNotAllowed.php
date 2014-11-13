<?php

namespace Sabre\DAV\Exception;

/**
 * MethodNotAllowed
 *
 * The 405 is thrown when a client tried to create a directory on an already existing directory
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class MethodNotAllowed extends \Sabre\DAV\Exception {

    /**
     * Returns the HTTP statuscode for this exception
     *
     * @return int
     */
    public function getHTTPCode() {

        return 405;

    }

    /**
     * This method allows the exception to return any extra HTTP response headers.
     *
     * The headers must be returned as an array.
     *
     * @param \Sabre\DAV\Server $server
     * @return array
     */
    public function getHTTPHeaders(\Sabre\DAV\Server $server) {

        $methods = $server->getAllowedMethods($server->getRequestUri());

        return array(
            'Allow' => strtoupper(implode(', ',$methods)),
        );

    }

}
