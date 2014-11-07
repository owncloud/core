<?php

namespace Sabre\DAV\Property;

/**
 * IHref interface
 *
 * Any property implementing this interface can expose a related url.
 * This is used by certain subsystems to aquire more information about for example
 * the owner of a file
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
interface IHref {

    /**
     * getHref
     *
     * @return string
     */
    function getHref();

}
