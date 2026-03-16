<?php
/**
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * Modified by BW-Tech GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OC\Mail;

use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Part\DataPart;

/**
 * Class Message provides a wrapper around SwiftMail
 *
 * @package OC\Mail
 */
class Message {
	/** @var Email */
	private $email;

	/**
	 * @param Email $email
	 */
	public function __construct(Email $email) {
		$this->email = $email;
	}

	/**
	 * SwiftMailer does currently not work with IDN domains, this function therefore converts the domains
	 * FIXME: Remove this once SwiftMailer supports IDN
	 *
	 * @param array $addresses Array of mail addresses, key will get converted
	 * @return array Converted addresses if `idn_to_ascii` exists
	 */
	protected function convertAddresses($addresses, bool $asAddressObjects = false) {
		$converter = function ($email, $name) {
			if(\is_int($email)) {
				return new Address($name);
			}

			if($name === null) {
				return new Address($email);
			}

			return new Address($email, $name);
		};

		if (!\function_exists('idn_to_ascii')) {
			return $asAddressObjects ? Address::createArray(array_map($converter, array_keys($addresses), array_values($addresses))) : $addresses;
		}

		$convertedAddresses = [];

		foreach ($addresses as $email => $readableName) {
			if (!\is_numeric($email)) {
				list($name, $domain) = \explode('@', $email, 2);
				if (\defined('INTL_IDNA_VARIANT_UTS46')) {
					$domain = \idn_to_ascii($domain, 0, INTL_IDNA_VARIANT_UTS46);
				} else {
					$domain = \idn_to_ascii($domain);
				}
				$convertedAddresses[$name.'@'.$domain] = $readableName;
			} else {
				list($name, $domain) = \explode('@', $readableName, 2);
				if (\defined('INTL_IDNA_VARIANT_UTS46')) {
					$domain = \idn_to_ascii($domain, 0, INTL_IDNA_VARIANT_UTS46);
				} else {
					$domain = \idn_to_ascii($domain);
				}
				$convertedAddresses[$email] = $name.'@'.$domain;
			}
		}

		return $asAddressObjects ? Address::createArray(array_map($converter, array_keys($convertedAddresses), array_values($convertedAddresses))) : $convertedAddresses;
	}

	/**
	 * Set the from address of this message.
	 *
	 * If no "From" address is used \OC\Mail\Mailer will use mail_from_address and mail_domain from config.php
	 *
	 * @param array $addresses Example: array('sender@domain.org', 'other@domain.org' => 'A name')
	 * @return $this
	 */
	public function setFrom(array $addresses) {
		$addresses = $this->convertAddresses($addresses, true);
		$this->email->from(...$addresses);
		return $this;
	}

	/**
	 * Get the from address of this message.
	 *
	 * @return array
	 */
	public function getFrom() {
		return $this->email->getFrom();
	}

	/**
	 * Set the Reply-To address of this message
	 *
	 * @param array $addresses
	 * @return $this
	 */
	public function setReplyTo(array $addresses) {
		$addresses = $this->convertAddresses($addresses, true);

		$this->email->replyTo(...$addresses);
		return $this;
	}

	/**
	 * Returns the Reply-To address of this message
	 *
	 * @return array
	 */
	public function getReplyTo() {
		return $this->email->getReplyTo();
	}

	/**
	 * Set the to addresses of this message.
	 *
	 * @param array $recipients Example: array('recipient@domain.org', 'other@domain.org' => 'A name')
	 * @return $this
	 */
	public function setTo(array $recipients) {
		$recipients = $this->convertAddresses($recipients, true);

		$this->email->to(...$recipients);
		return $this;
	}

	/**
	 * Get the to address of this message.
	 *
	 * @return array
	 */
	public function getTo() {
		return $this->email->getTo();
	}

	/**
	 * Set the CC recipients of this message.
	 *
	 * @param array $recipients Example: array('recipient@domain.org', 'other@domain.org' => 'A name')
	 * @return $this
	 */
	public function setCc(array $recipients) {
		$recipients = $this->convertAddresses($recipients, true);

		$this->email->cc(...$recipients);
		return $this;
	}

	/**
	 * Get the cc address of this message.
	 *
	 * @return array
	 */
	public function getCc() {
		return $this->email->getCc();
	}

	/**
	 * Set the BCC recipients of this message.
	 *
	 * @param array $recipients Example: array('recipient@domain.org', 'other@domain.org' => 'A name')
	 * @return $this
	 */
	public function setBcc(array $recipients) {
		$recipients = $this->convertAddresses($recipients, true);

		$this->email->bcc(...$recipients);
		return $this;
	}

	/**
	 * Get the Bcc address of this message.
	 *
	 * @return array
	 */
	public function getBcc() {
		return $this->email->getBcc();
	}

	/**
	 * Set the subject of this message.
	 *
	 * @param $subject
	 * @return $this
	 */
	public function setSubject($subject) {
		$this->email->subject($subject);
		return $this;
	}

	/**
	 * Get the from subject of this message.
	 *
	 * @return string
	 */
	public function getSubject() {
		return $this->email->getSubject();
	}

	/**
	 * Set the plain-text body of this message.
	 *
	 * @param string $body
	 * @return $this
	 */
	public function setPlainBody($body) {
		$this->email->text($body);
		return $this;
	}

	/**
	 * Get the plain body of this message.
	 *
	 * @return string
	 */
	public function getPlainBody() {
		return $this->email->getBody();
	}

	/**
	 * Set the HTML body of this message. Consider also sending a plain-text body instead of only an HTML one.
	 *
	 * @param string $body
	 * @return $this
	 */
	public function setHtmlBody($body) {
		$this->email->addPart(new DataPart(body: $body, contentType: 'text/html'));
		return $this;
	}

	/**
	 * Get's the underlying SwiftMessage
	 * @deprecated Use getMessage() instead.
	 * @return Email
	 */
	public function getSwiftMessage() {
		return $this->getMessage();
	}

	/**
	 * Get's the underlying SwiftMessage
	 * @return Email
	 */
	public function getMessage() {
		return $this->email;
	}

	/**
	 * @param string $body
	 * @param string $contentType
	 * @return $this
	 */
	public function setBody($body, $contentType) {
		$this->email->text($body, $contentType);
		return $this;
	}
}
