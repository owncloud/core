<?php

namespace Sabre\CalDAV\Notifications;

use Sabre\DAV;
use Sabre\CalDAV;
use Sabre\DAVACL;

/**
 * This node represents a single notification.
 *
 * The signature is mostly identical to that of Sabre\DAV\IFile, but the get() method
 * MUST return an xml document that matches the requirements of the
 * 'caldav-notifications.txt' spec.

 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Node extends DAV\File implements INode, DAVACL\IACL {

    /**
     * The notification backend
     *
     * @var Sabre\CalDAV\Backend\NotificationSupport
     */
    protected $caldavBackend;

    /**
     * The actual notification
     *
     * @var Sabre\CalDAV\Notifications\INotificationType
     */
    protected $notification;

    /**
     * Owner principal of the notification
     *
     * @var string
     */
    protected $principalUri;

    /**
     * Constructor
     *
     * @param CalDAV\Backend\NotificationSupport $caldavBackend
     * @param string $principalUri
     * @param CalDAV\Notifications\INotificationType $notification
     */
    public function __construct(CalDAV\Backend\NotificationSupport $caldavBackend, $principalUri, INotificationType $notification) {

        $this->caldavBackend = $caldavBackend;
        $this->principalUri = $principalUri;
        $this->notification = $notification;

    }

    /**
     * Returns the path name for this notification
     *
     * @return id
     */
    public function getName() {

        return $this->notification->getId() . '.xml';

    }

    /**
     * Returns the etag for the notification.
     *
     * The etag must be surrounded by litteral double-quotes.
     *
     * @return string
     */
    public function getETag() {

        return $this->notification->getETag();

    }

    /**
     * This method must return an xml element, using the
     * Sabre\CalDAV\Notifications\INotificationType classes.
     *
     * @return INotificationType
     */
    public function getNotificationType() {

        return $this->notification;

    }

    /**
     * Deletes this notification
     *
     * @return void
     */
    public function delete() {

        $this->caldavBackend->deleteNotification($this->getOwner(), $this->notification);

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
                'principal' => $this->getOwner(),
                'privilege' => '{DAV:}read',
                'protected' => true,
            ),
            array(
                'principal' => $this->getOwner(),
                'privilege' => '{DAV:}write',
                'protected' => true,
            )
        );

    }

    /**
     * Updates the ACL
     *
     * This method will receive a list of new ACE's as an array argument.
     *
     * @param array $acl
     * @return void
     */
    public function setACL(array $acl) {

        throw new DAV\Exception\NotImplemented('Updating ACLs is not implemented here');

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
