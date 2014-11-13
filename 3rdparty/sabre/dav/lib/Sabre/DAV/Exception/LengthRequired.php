<?php

namespace Sabre\DAV\Exception;

use Sabre\DAV;

/**
 * LengthRequired
 *
 * This exception is thrown when a request was made that required a
 * Content-Length header, but did not contain one.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class LengthRequired extends DAV\Exception {

    /**
     * Returns the HTTP statuscode for this exception
     *
     * @return int
     */
    public function getHTTPCode() {

        return 411;

    }

}
