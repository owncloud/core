<?php

namespace Sabre\CalDAV;

use Sabre\DAVACL;

/**
 * This object represents a CalDAV calendar that is shared by a different user.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class SharedCalendar extends Calendar implements ISharedCalendar {

    /**
     * Constructor
     *
     * @param Backend\BackendInterface $caldavBackend
     * @param array $calendarInfo
     */
    public function __construct(Backend\BackendInterface $caldavBackend, $calendarInfo) {

        $required = array(
            '{http://calendarserver.org/ns/}shared-url',
            '{http://sabredav.org/ns}owner-principal',
            '{http://sabredav.org/ns}read-only',
        );
        foreach($required as $r) {
            if (!isset($calendarInfo[$r])) {
                throw new \InvalidArgumentException('The ' . $r . ' property must be specified for SharedCalendar(s)');
            }
        }

        parent::__construct($caldavBackend, $calendarInfo);

    }

    /**
     * This method should return the url of the owners' copy of the shared
     * calendar.
     *
     * @return string
     */
    public function getSharedUrl() {

        return $this->calendarInfo['{http://calendarserver.org/ns/}shared-url'];

    }

    /**
     * Returns the owner principal
     *
     * This must be a url to a principal, or null if there's no owner
     *
     * @return string|null
     */
    public function getOwner() {

        return $this->calendarInfo['{http://sabredav.org/ns}owner-principal'];

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

        // The top-level ACL only contains access information for the true
        // owner of the calendar, so we need to add the information for the
        // sharee.
        $acl = parent::getACL();
        $acl[] = array(
            'privilege' => '{DAV:}read',
            'principal' => $this->calendarInfo['principaluri'],
            'protected' => true,
        );
        if (!$this->calendarInfo['{http://sabredav.org/ns}read-only']) {
            $acl[] = array(
                'privilege' => '{DAV:}write',
                'principal' => $this->calendarInfo['principaluri'],
                'protected' => true,
            );
        }
        return $acl;

    }

    /**
     * Returns the list of people whom this calendar is shared with.
     *
     * Every element in this array should have the following properties:
     *   * href - Often a mailto: address
     *   * commonName - Optional, for example a first + last name
     *   * status - See the Sabre\CalDAV\SharingPlugin::STATUS_ constants.
     *   * readOnly - boolean
     *   * summary - Optional, a description for the share
     *
     * @return array
     */
    public function getShares() {

        return $this->caldavBackend->getShares($this->calendarInfo['id']);

    }

}
