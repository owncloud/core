<?php

namespace Sabre\DAVACL;

use Sabre\DAV;

/**
 * IPrincipal interface
 *
 * Implement this interface to define your own principals
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
interface IPrincipal extends DAV\INode {

    /**
     * Returns a list of alternative urls for a principal
     *
     * This can for example be an email address, or ldap url.
     *
     * @return array
     */
    function getAlternateUriSet();

    /**
     * Returns the full principal url
     *
     * @return string
     */
    function getPrincipalUrl();

    /**
     * Returns the list of group members
     *
     * If this principal is a group, this function should return
     * all member principal uri's for the group.
     *
     * @return array
     */
    function getGroupMemberSet();

    /**
     * Returns the list of groups this principal is member of
     *
     * If this principal is a member of a (list of) groups, this function
     * should return a list of principal uri's for it's members.
     *
     * @return array
     */
    function getGroupMembership();

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
    function setGroupMemberSet(array $principals);

    /**
     * Returns the displayname
     *
     * This should be a human readable name for the principal.
     * If none is available, return the nodename.
     *
     * @return string
     */
    function getDisplayName();

}
