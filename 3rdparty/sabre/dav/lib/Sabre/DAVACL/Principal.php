<?php

namespace Sabre\DAVACL;

use Sabre\DAV;

/**
 * Principal class
 *
 * This class is a representation of a simple principal
 *
 * Many WebDAV specs require a user to show up in the directory
 * structure.
 *
 * This principal also has basic ACL settings, only allowing the principal
 * access it's own principal.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Principal extends DAV\Node implements IPrincipal, DAV\IProperties, IACL {

    /**
     * Struct with principal information.
     *
     * @var array
     */
    protected $principalProperties;

    /**
     * Principal backend
     *
     * @var PrincipalBackend\BackendInterface
     */
    protected $principalBackend;

    /**
     * Creates the principal object
     *
     * @param IPrincipalBackend $principalBackend
     * @param array $principalProperties
     */
    public function __construct(PrincipalBackend\BackendInterface $principalBackend, array $principalProperties = array()) {

        if (!isset($principalProperties['uri'])) {
            throw new DAV\Exception('The principal properties must at least contain the \'uri\' key');
        }
        $this->principalBackend = $principalBackend;
        $this->principalProperties = $principalProperties;

    }

    /**
     * Returns the full principal url
     *
     * @return string
     */
    public function getPrincipalUrl() {

        return $this->principalProperties['uri'];

    }

    /**
     * Returns a list of alternative urls for a principal
     *
     * This can for example be an email address, or ldap url.
     *
     * @return array
     */
    public function getAlternateUriSet() {

        $uris = array();
        if (isset($this->principalProperties['{DAV:}alternate-URI-set'])) {

            $uris = $this->principalProperties['{DAV:}alternate-URI-set'];

        }

        if (isset($this->principalProperties['{http://sabredav.org/ns}email-address'])) {
            $uris[] = 'mailto:' . $this->principalProperties['{http://sabredav.org/ns}email-address'];
        }

        return array_unique($uris);

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

        return $this->principalBackend->getGroupMemberSet($this->principalProperties['uri']);

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

        return $this->principalBackend->getGroupMemberShip($this->principalProperties['uri']);

    }


    /**
     * Sets a list of group members
     *
     * If this principal is a group, this method sets all the group members.
     * The list of members is always overwritten, never appended to.
     *
     * This method should throw an exception if the members could not be set.
     *
     * @param array $groupMembers
     * @return void
     */
    public function setGroupMemberSet(array $groupMembers) {

        $this->principalBackend->setGroupMemberSet($this->principalProperties['uri'], $groupMembers);

    }


    /**
     * Returns this principals name.
     *
     * @return string
     */
    public function getName() {

        $uri = $this->principalProperties['uri'];
        list(, $name) = DAV\URLUtil::splitPath($uri);
        return $name;

    }

    /**
     * Returns the name of the user
     *
     * @return string
     */
    public function getDisplayName() {

        if (isset($this->principalProperties['{DAV:}displayname'])) {
            return $this->principalProperties['{DAV:}displayname'];
        } else {
            return $this->getName();
        }

    }

    /**
     * Returns a list of properties
     *
     * @param array $requestedProperties
     * @return array
     */
    public function getProperties($requestedProperties) {

        $newProperties = array();
        foreach($requestedProperties as $propName) {

            if (isset($this->principalProperties[$propName])) {
                $newProperties[$propName] = $this->principalProperties[$propName];
            }

        }

        return $newProperties;

    }

    /**
     * Updates this principals properties.
     * 
     * @param array $mutations
     * @see Sabre\DAV\IProperties::updateProperties
     * @return bool|array
     */
    public function updateProperties($mutations) {

        return $this->principalBackend->updatePrincipal($this->principalProperties['uri'], $mutations);

    }

    /**
     * Returns the owner principal
     *
     * This must be a url to a principal, or null if there's no owner
     *
     * @return string|null
     */
    public function getOwner() {

        return $this->principalProperties['uri'];


    }

    /**
     * Returns a group principal
     *
     * This must be a url to a principal, or null if there's no owner
     *
     * @return string|null
     */
    public function getGroup() {

        return null;

    }

    /**
     * Returns a list of ACE's for this node.
     *
     * Each ACE has the following properties:
     *   * 'privilege', a string such as {DAV:}read or {DAV:}write. These are
     *     currently the only supported privileges
     *   * 'principal', a url to the principal who owns the node
     *   * 'protected' (optional), indicating that this ACE is not allowed to
     *      be updated.
     *
     * @return array
     */
    public function getACL() {

        return array(
            array(
                'privilege' => '{DAV:}read',
                'principal' => $this->getPrincipalUrl(),
                'protected' => true,
            ),
        );

    }

    /**
     * Updates the ACL
     *
     * This method will receive a list of new ACE's.
     *
     * @param array $acl
     * @return void
     */
    public function setACL(array $acl) {

        throw new DAV\Exception\MethodNotAllowed('Updating ACLs is not allowed here');

    }

    /**
     * Returns the list of supported privileges for this node.
     *
     * The returned data structure is a list of nested privileges.
     * See Sabre\DAVACL\Plugin::getDefaultSupportedPrivilegeSet for a simple
     * standard structure.
     *
     * If null is returned from this method, the default privilege set is used,
     * which is fine for most common usecases.
     *
     * @return array|null
     */
    public function getSupportedPrivilegeSet() {

        return null;

    }

}
