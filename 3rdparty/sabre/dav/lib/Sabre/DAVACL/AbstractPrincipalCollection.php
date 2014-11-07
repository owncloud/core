<?php

namespace Sabre\DAVACL;
use Sabre\DAV;

/**
 * Principals Collection
 *
 * This is a helper class that easily allows you to create a collection that
 * has a childnode for every principal.
 *
 * To use this class, simply implement the getChildForPrincipal method.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
abstract class AbstractPrincipalCollection extends DAV\Collection implements IPrincipalCollection {

    /**
     * Node or 'directory' name.
     *
     * @var string
     */
    protected $path;

    /**
     * Principal backend
     *
     * @var PrincipalBackend\BackendInterface
     */
    protected $principalBackend;

    /**
     * If this value is set to true, it effectively disables listing of users
     * it still allows user to find other users if they have an exact url.
     *
     * @var bool
     */
    public $disableListing = false;

    /**
     * Creates the object
     *
     * This object must be passed the principal backend. This object will
     * filter all principals from a specified prefix ($principalPrefix). The
     * default is 'principals', if your principals are stored in a different
     * collection, override $principalPrefix
     *
     *
     * @param PrincipalBackend\BackendInterface $principalBackend
     * @param string $principalPrefix
     */
    public function __construct(PrincipalBackend\BackendInterface $principalBackend, $principalPrefix = 'principals') {

        $this->principalPrefix = $principalPrefix;
        $this->principalBackend = $principalBackend;

    }

    /**
     * This method returns a node for a principal.
     *
     * The passed array contains principal information, and is guaranteed to
     * at least contain a uri item. Other properties may or may not be
     * supplied by the authentication backend.
     *
     * @param array $principalInfo
     * @return IPrincipal
     */
    abstract function getChildForPrincipal(array $principalInfo);

    /**
     * Returns the name of this collection.
     *
     * @return string
     */
    public function getName() {

        list(,$name) = DAV\URLUtil::splitPath($this->principalPrefix);
        return $name;

    }

    /**
     * Return the list of users
     *
     * @return array
     */
    public function getChildren() {

        if ($this->disableListing)
            throw new DAV\Exception\MethodNotAllowed('Listing members of this collection is disabled');

        $children = array();
        foreach($this->principalBackend->getPrincipalsByPrefix($this->principalPrefix) as $principalInfo) {

            $children[] = $this->getChildForPrincipal($principalInfo);


        }
        return $children;

    }

    /**
     * Returns a child object, by its name.
     *
     * @param string $name
     * @throws DAV\Exception\NotFound
     * @return IPrincipal
     */
    public function getChild($name) {

        $principalInfo = $this->principalBackend->getPrincipalByPath($this->principalPrefix . '/' . $name);
        if (!$principalInfo) throw new DAV\Exception\NotFound('Principal with name ' . $name . ' not found');
        return $this->getChildForPrincipal($principalInfo);

    }

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
    public function searchPrincipals(array $searchProperties) {

        $result = $this->principalBackend->searchPrincipals($this->principalPrefix, $searchProperties);
        $r = array();

        foreach($result as $row) {
            list(, $r[]) = DAV\URLUtil::splitPath($row);
        }

        return $r;

    }

}
