<?php

namespace Sabre\CalDAV\Principal;
use Sabre\DAVACL;
use Sabre\DAV;

/**
 * ProxyWrite principal
 *
 * This class represents a principal group, hosted under the main principal.
 * This is needed to implement 'Calendar delegation' support. This class is
 * instantiated by User.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class ProxyWrite implements IProxyWrite {

    /**
     * Parent principal information
     *
     * @var array
     */
    protected $principalInfo;

    /**
     * Principal Backend
     *
     * @var DAVACL\PrincipalBackend\BackendInterface
     */
    protected $principalBackend;

    /**
     * Creates the object
     *
     * Note that you MUST supply the parent principal information.
     *
     * @param DAVACL\PrincipalBackend\BackendInterface $principalBackend
     * @param array $principalInfo
     */
    public function __construct(DAVACL\PrincipalBackend\BackendInterface $principalBackend, array $principalInfo) {

        $this->principalInfo = $principalInfo;
        $this->principalBackend = $principalBackend;

    }

    /**
     * Returns this principals name.
     *
     * @return string
     */
    public function getName() {

        return 'calendar-proxy-write';

    }

    /**
     * Returns the last modification time
     *
     * @return null
     */
    public function getLastModified() {

        return null;

    }

    /**
     * Deletes the current node
     *
     * @throws DAV\Exception\Forbidden
     * @return void
     */
    public function delete() {

        throw new DAV\Exception\Forbidden('Permission denied to delete node');

    }

    /**
     * Renames the node
     *
     * @throws DAV\Exception\Forbidden
     * @param string $name The new name
     * @return void
     */
    public function setName($name) {

        throw new DAV\Exception\Forbidden('Permission denied to rename file');

    }


    /**
     * Returns a list of alternative urls for a principal
     *
     * This can for example be an email address, or ldap url.
     *
     * @return array
     */
    public function getAlternateUriSet() {

        return array();

    }

    /**
     * Returns the full principal url
     *
     * @return string
     */
    public function getPrincipalUrl() {

        return $this->principalInfo['uri'] . '/' . $this->getName();

    }

    /**
     * Returns the list of group members
     *
     * If this principal is a group, this function should return
     * all member principal uri's for the group.
     *
     * @return array
     */
    public function getGroupMemberSet() {

        return $this->principalBackend->getGroupMemberSet($this->getPrincipalUrl());

    }

    /**
     * Returns the list of groups this principal is member of
     *
     * If this principal is a member of a (list of) groups, this function
     * should return a list of principal uri's for it's members.
     *
     * @return array
     */
    public function getGroupMembership() {

        return $this->principalBackend->getGroupMembership($this->getPrincipalUrl());

    }

    /**
     * Sets a list of group members
     *
     * If this principal is a group, this method sets all the group members.
     * The list of members is always overwritten, never appended to.
     *
     * This method should throw an exception if the members could not be set.
     *
     * @param array $principals
     * @return void
     */
    public function setGroupMemberSet(array $principals) {

        $this->principalBackend->setGroupMemberSet($this->getPrincipalUrl(), $principals);

    }

    /**
     * Returns the displayname
     *
     * This should be a human readable name for the principal.
     * If none is available, return the nodename.
     *
     * @return string
     */
    public function getDisplayName() {

        return $this->getName();

    }

}
