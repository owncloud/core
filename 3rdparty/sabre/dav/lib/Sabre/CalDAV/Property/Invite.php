<?php

namespace Sabre\CalDAV\Property;

use Sabre\CalDAV\SharingPlugin as SharingPlugin;
use Sabre\DAV;
use Sabre\CalDAV;

/**
 * Invite property
 *
 * This property encodes the 'invite' property, as defined by
 * the 'caldav-sharing-02' spec, in the http://calendarserver.org/ns/
 * namespace.
 *
 * @see https://trac.calendarserver.org/browser/CalendarServer/trunk/doc/Extensions/caldav-sharing-02.txt
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Invite extends DAV\Property {

    /**
     * The list of users a calendar has been shared to.
     *
     * @var array
     */
    protected $users;

    /**
     * The organizer contains information about the person who shared the
     * object.
     *
     * @var array
     */
    protected $organizer;

    /**
     * Creates the property.
     *
     * Users is an array. Each element of the array has the following
     * properties:
     *
     *   * href - Often a mailto: address
     *   * commonName - Optional, for example a first and lastname for a user.
     *   * status - One of the SharingPlugin::STATUS_* constants.
     *   * readOnly - true or false
     *   * summary - Optional, description of the share
     *
     * The organizer key is optional to specify. It's only useful when a
     * 'sharee' requests the sharing information.
     *
     * The organizer may have the following properties:
     *   * href - Often a mailto: address.
     *   * commonName - Optional human-readable name.
     *   * firstName - Optional first name.
     *   * lastName - Optional last name.
     *
     * If you wonder why these two structures are so different, I guess a
     * valid answer is that the current spec is still a draft.
     *
     * @param array $users
     */
    public function __construct(array $users, array $organizer = null) {

        $this->users = $users;
        $this->organizer = $organizer;

    }

    /**
     * Returns the list of users, as it was passed to the constructor.
     *
     * @return array
     */
    public function getValue() {

        return $this->users;

    }

    /**
     * Serializes the property in a DOMDocument
     *
     * @param DAV\Server $server
     * @param \DOMElement $node
     * @return void
     */
    public function serialize(DAV\Server $server,\DOMElement $node) {

       $doc = $node->ownerDocument;

       if (!is_null($this->organizer)) {

           $xorganizer = $doc->createElement('cs:organizer');

           $href = $doc->createElement('d:href');
           $href->appendChild($doc->createTextNode($this->organizer['href']));
           $xorganizer->appendChild($href);

           if (isset($this->organizer['commonName']) && $this->organizer['commonName']) {
               $commonName = $doc->createElement('cs:common-name');
               $commonName->appendChild($doc->createTextNode($this->organizer['commonName']));
               $xorganizer->appendChild($commonName);
           }
           if (isset($this->organizer['firstName']) && $this->organizer['firstName']) {
               $firstName = $doc->createElement('cs:first-name');
               $firstName->appendChild($doc->createTextNode($this->organizer['firstName']));
               $xorganizer->appendChild($firstName);
           }
           if (isset($this->organizer['lastName']) && $this->organizer['lastName']) {
               $lastName = $doc->createElement('cs:last-name');
               $lastName->appendChild($doc->createTextNode($this->organizer['lastName']));
               $xorganizer->appendChild($lastName);
           }

           $node->appendChild($xorganizer);


       }

       foreach($this->users as $user) {

           $xuser = $doc->createElement('cs:user');

           $href = $doc->createElement('d:href');
           $href->appendChild($doc->createTextNode($user['href']));
           $xuser->appendChild($href);

           if (isset($user['commonName']) && $user['commonName']) {
               $commonName = $doc->createElement('cs:common-name');
               $commonName->appendChild($doc->createTextNode($user['commonName']));
               $xuser->appendChild($commonName);
           }

           switch($user['status']) {

               case SharingPlugin::STATUS_ACCEPTED :
                   $status = $doc->createElement('cs:invite-accepted');
                   $xuser->appendChild($status);
                   break;
               case SharingPlugin::STATUS_DECLINED :
                   $status = $doc->createElement('cs:invite-declined');
                   $xuser->appendChild($status);
                   break;
               case SharingPlugin::STATUS_NORESPONSE :
                   $status = $doc->createElement('cs:invite-noresponse');
                   $xuser->appendChild($status);
                   break;
               case SharingPlugin::STATUS_INVALID :
                   $status = $doc->createElement('cs:invite-invalid');
                   $xuser->appendChild($status);
                   break;

           }

           $xaccess = $doc->createElement('cs:access');

           if ($user['readOnly']) {
                $xaccess->appendChild(
                    $doc->createElement('cs:read')
                );
           } else {
                $xaccess->appendChild(
                    $doc->createElement('cs:read-write')
                );
           }
           $xuser->appendChild($xaccess);

           if (isset($user['summary']) && $user['summary']) {
               $summary = $doc->createElement('cs:summary');
               $summary->appendChild($doc->createTextNode($user['summary']));
               $xuser->appendChild($summary);
           }

           $node->appendChild($xuser);

       }


    }

    /**
     * Unserializes the property.
     *
     * This static method should return a an instance of this object.
     *
     * @param \DOMElement $prop
     * @return DAV\IProperty
     */
    static function unserialize(\DOMElement $prop) {

        $xpath = new \DOMXPath($prop->ownerDocument);
        $xpath->registerNamespace('cs', CalDAV\Plugin::NS_CALENDARSERVER);
        $xpath->registerNamespace('d',  'urn:DAV');

        $users = array();

        foreach($xpath->query('cs:user', $prop) as $user) {

            $status = null;
            if ($xpath->evaluate('boolean(cs:invite-accepted)', $user)) {
                $status = SharingPlugin::STATUS_ACCEPTED;
            } elseif ($xpath->evaluate('boolean(cs:invite-declined)', $user)) {
                $status = SharingPlugin::STATUS_DECLINED;
            } elseif ($xpath->evaluate('boolean(cs:invite-noresponse)', $user)) {
                $status = SharingPlugin::STATUS_NORESPONSE;
            } elseif ($xpath->evaluate('boolean(cs:invite-invalid)', $user)) {
                $status = SharingPlugin::STATUS_INVALID;
            } else {
                throw new DAV\Exception('Every cs:user property must have one of cs:invite-accepted, cs:invite-declined, cs:invite-noresponse or cs:invite-invalid');
            }
            $users[] = array(
                'href' => $xpath->evaluate('string(d:href)', $user),
                'commonName' => $xpath->evaluate('string(cs:common-name)', $user),
                'readOnly' => $xpath->evaluate('boolean(cs:access/cs:read)', $user),
                'summary' => $xpath->evaluate('string(cs:summary)', $user),
                'status' => $status,
            );

        }

        return new self($users);

    }

}
