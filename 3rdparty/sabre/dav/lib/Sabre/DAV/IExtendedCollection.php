<?php

namespace Sabre\DAV;

/**
 * The IExtendedCollection interface.
 *
 * This interface can be used to create special-type of collection-resources
 * as defined by RFC 5689.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
interface IExtendedCollection extends ICollection {

    /**
     * Creates a new collection
     *
     * @param string $name
     * @param array $resourceType
     * @param array $properties
     * @return void
     */
    function createExtendedCollection($name, array $resourceType, array $properties);

}

