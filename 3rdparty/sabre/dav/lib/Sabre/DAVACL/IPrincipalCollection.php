<?php

namespace Sabre\DAVACL;

use Sabre\DAV;

/**
 * Principal Collection interface.
 *
 * Implement this interface to ensure that your principal collection can be
 * searched using the principal-property-search REPORT.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
interface IPrincipalCollection extends DAV\INode {

    /**
     * This method is used to search for principals matching a set of
     * properties.
     *
     * This search is specifically used by RFC3744's principal-property-search
     * REPORT. You should at least allow searching on
     * http://sabredav.org/ns}email-address.
     *
     * The actual search should be a unicode-non-case-sensitive search. The
     * keys in searchProperties are the WebDAV property names, while the values
     * are the property values to search on.
     *
     * If multiple properties are being searched on, the search should be
     * AND'ed.
     *
     * This method should simply return a list of 'child names', which may be
     * used to call $this->getChild in the future.
     *
     * @param array $searchProperties
     * @return array
     */
    function searchPrincipals(array $searchProperties);

}
