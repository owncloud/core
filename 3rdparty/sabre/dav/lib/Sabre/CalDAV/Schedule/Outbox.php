<?php

namespace Sabre\CalDAV\Schedule;
use Sabre\DAV;
use Sabre\CalDAV;
use Sabre\DAVACL;

/**
 * The CalDAV scheduling outbox
 *
 * The outbox is mainly used as an endpoint in the tree for a client to do
 * free-busy requests. This functionality is completely handled by the
 * Scheduling plugin, so this object is actually mostly static.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Outbox extends DAV\Collection implements IOutbox {

    /**
     * The principal Uri
     *
     * @var string
     */
    protected $principalUri;

    /**
     * Constructor
     *
     * @param string $principalUri
     */
    public function __construct($principalUri) {

        $this->principalUri = $principalUri;

    }

    /**
     * Returns the name of the node.
     *
     * This is used to generate the url.
     *
     * @return string
     */
    public function getName() {

        return 'outbox';

    }

    /**
     * Returns an array with all the child nodes
     *
     * @return \Sabre\DAV\INode[]
     */
    public function getChildren() {

        return array();

    }

    /**
     * Returns the owner principal
     *
     * This must be a url to a principal, or null if there's no owner
     *
     * @return string|null
     */
    public function getOwner() {

        return $this->principalUri;

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
                'privilege' => '{' . CalDAV\Plugin::NS_CALDAV . '}schedule-query-freebusy',
                'principal' => $this->getOwner(),
                'protected' => true,
            ),
            array(
                'privilege' => '{' . CalDAV\Plugin::NS_CALDAV . '}schedule-post-vevent',
                'principal' => $this->getOwner(),
                'protected' => true,
            ),
            array(
                'privilege' => '{DAV:}read',
                'principal' => $this->getOwner(),
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

        throw new DAV\Exception\MethodNotAllowed('You\'re not allowed to update the ACL');

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

        $default = DAVACL\Plugin::getDefaultSupportedPrivilegeSet();
        $default['aggregates'][] = array(
            'privilege' => '{' . CalDAV\Plugin::NS_CALDAV . '}schedule-query-freebusy',
        );
        $default['aggregates'][] = array(
            'privilege' => '{' . CalDAV\Plugin::NS_CALDAV . '}schedule-post-vevent',
        );

        return $default;

    }

}
