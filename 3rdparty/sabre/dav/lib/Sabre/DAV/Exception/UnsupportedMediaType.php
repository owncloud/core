<?php

namespace Sabre\DAV\Exception;

/**
 * UnSupportedMediaType
 *
 * The 415 Unsupported Media Type status code is generally sent back when the client
 * tried to call an HTTP method, with a body the server didn't understand
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class UnsupportedMediaType extends \Sabre\DAV\Exception {

    /**
     * returns the http statuscode for this exception
     *
     * @return int
     */
    public function getHTTPCode() {

        return 415;

    }

}
