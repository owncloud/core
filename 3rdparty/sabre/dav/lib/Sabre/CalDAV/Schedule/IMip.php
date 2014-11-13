<?php

namespace Sabre\CalDAV\Schedule;

use Sabre\VObject;
use Sabre\DAV;

/**
 * iMIP handler.
 *
 * This class is responsible for sending out iMIP messages. iMIP is the
 * email-based transport for iTIP. iTIP deals with scheduling operations for
 * iCalendar objects.
 *
 * If you want to customize the email that gets sent out, you can do so by
 * extending this class and overriding the sendMessage method.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class IMip {

    /**
     * Email address used in From: header.
     *
     * @var string
     */
    protected $senderEmail;

    /**
     * Creates the email handler.
     *
     * @param string $senderEmail. The 'senderEmail' is the email that shows up
     *                             in the 'From:' address. This should
     *                             generally be some kind of no-reply email
     *                             address you own.
     */
    public function __construct($senderEmail) {

        $this->senderEmail = $senderEmail;

    }

    /**
     * Sends one or more iTip messages through email.
     *
     * @param string $originator Originator Email
     * @param array $recipients Array of email addresses
     * @param VObject\Component $vObject
     * @param string $principal Principal Url of the originator
     * @return void
     */
    public function sendMessage($originator, array $recipients, VObject\Component $vObject, $principal) {

        foreach($recipients as $recipient) {

            $to = $recipient;
            $replyTo = $originator;
            $subject = 'SabreDAV iTIP message';

            switch(strtoupper($vObject->METHOD)) {
                case 'REPLY' :
                    $subject = 'Response for: ' . $vObject->VEVENT->SUMMARY;
                    break;
                case 'REQUEST' :
                    $subject = 'Invitation for: ' .$vObject->VEVENT->SUMMARY;
                    break;
                case 'CANCEL' :
                    $subject = 'Cancelled event: ' . $vObject->VEVENT->SUMMARY;
                    break;
            }

            $headers = array();
            $headers[] = 'Reply-To: ' . $replyTo;
            $headers[] = 'From: ' . $this->senderEmail;
            $headers[] = 'Content-Type: text/calendar; method=' . (string)$vObject->method . '; charset=utf-8';
            if (DAV\Server::$exposeVersion) {
                $headers[] = 'X-Sabre-Version: ' . DAV\Version::VERSION . '-' . DAV\Version::STABILITY;
            }

            $vcalBody = $vObject->serialize();

            $this->mail($to, $subject, $vcalBody, $headers);

        }

    }

    // @codeCoverageIgnoreStart
    // This is deemed untestable in a reasonable manner

    /**
     * This function is reponsible for sending the actual email.
     *
     * @param string $to Recipient email address
     * @param string $subject Subject of the email
     * @param string $body iCalendar body
     * @param array $headers List of headers
     * @return void
     */
    protected function mail($to, $subject, $body, array $headers) {


        mail($to, $subject, $body, implode("\r\n", $headers));

    }

    // @codeCoverageIgnoreEnd

}
