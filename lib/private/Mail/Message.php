<?php
/**
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

use Symfony\Component\Mime\Email;

/**
 * Class Message provides a wrapper around SwiftMail
 *
 * @package OC\Mail
 */
class Message {
	private Email $message;

	public function __construct(Email $swiftMessage) {
		$this->message = $swiftMessage;
	}

	/**
	 * SwiftMailer does currently not work with IDN domains, this function therefore converts the domains
	 * FIXME: Remove this once SwiftMailer supports IDN
	 *
	 * @param array $addresses Array of mail addresses, key will get converted
	 * @return array Converted addresses if `idn_to_ascii` exists
	 */
	protected function convertAddresses(array $addresses): array {
		if (!\function_exists('idn_to_ascii')) {
			return $addresses;
		}

		$convertedAddresses = [];

		foreach ($addresses as $email => $readableName) {
			if (!\is_numeric($email)) {
				[$name, $domain] = \explode('@', $email, 2);
				if (\defined('INTL_IDNA_VARIANT_UTS46')) {
					$domain = \idn_to_ascii($domain, 0, INTL_IDNA_VARIANT_UTS46);
				} else {
					$domain = \idn_to_ascii($domain);
				}
				$convertedAddresses[$name.'@'.$domain] = $readableName;
			} else {
				[$name, $domain] = \explode('@', $readableName, 2);
				if (\defined('INTL_IDNA_VARIANT_UTS46')) {
					$domain = \idn_to_ascii($domain, 0, INTL_IDNA_VARIANT_UTS46);
				} else {
					$domain = \idn_to_ascii($domain);
				}
				$convertedAddresses[$email] = $name.'@'.$domain;
			}
		}

		return $convertedAddresses;
	}

	/**
	 * Set the from address of this message.
	 *
	 * If no "From" address is used \OC\Mail\Mailer will use mail_from_address and mail_domain from config.php
	 *
	 * @param array $addresses Example: array('sender@domain.org', 'other@domain.org' => 'A name')
	 */
	public function setFrom(array $addresses): Message {
		$addresses = $this->convertAddresses($addresses);

		$this->message->from(...$addresses);
		return $this;
	}

	/**
	 * Get the from address of this message.
	 *
	 * @return array
	 */
	public function getFrom(): array {
		return $this->message->getFrom();
	}

	/**
	 * Set the Reply-To address of this message
	 */
	public function setReplyTo(array $addresses): Message {
		$addresses = $this->convertAddresses($addresses);

		$this->message->replyTo(...$addresses);
		return $this;
	}

	/**
	 * Returns the Reply-To address of this message
	 */
	public function getReplyTo(): array {
		return $this->message->getReplyTo();
	}

	/**
	 * Set the to addresses of this message.
	 *
	 * @param array $recipients Example: array('recipient@domain.org', 'other@domain.org' => 'A name')
	 */
	public function setTo(array $recipients): Message {
		$recipients = $this->convertAddresses($recipients);

		$this->message->to(...$recipients);
		return $this;
	}

	/**
	 * Get the to address of this message.
	 *
	 * @return array
	 */
	public function getTo(): array {
		return $this->message->getTo();
	}

	/**
	 * Set the CC recipients of this message.
	 *
	 * @param array $recipients Example: array('recipient@domain.org', 'other@domain.org' => 'A name')
	 */
	public function setCc(array $recipients): Message {
		$recipients = $this->convertAddresses($recipients);

		$this->message->cc(...$recipients);
		return $this;
	}

	/**
	 * Get the cc address of this message.
	 */
	public function getCc(): array {
		return $this->message->getCc();
	}

	/**
	 * Set the BCC recipients of this message.
	 *
	 * @param array $recipients Example: array('recipient@domain.org', 'other@domain.org' => 'A name')
	 */
	public function setBcc(array $recipients): Message {
		$recipients = $this->convertAddresses($recipients);

		$this->message->bcc(...$recipients);
		return $this;
	}

	/**
	 * Get the Bcc address of this message.
	 */
	public function getBcc(): array {
		return $this->message->getBcc();
	}

	/**
	 * Set the subject of this message.
	 */
	public function setSubject(string $subject): Message {
		$this->message->subject($subject);
		return $this;
	}

	/**
	 * Get the from subject of this message.
	 */
	public function getSubject(): string {
		return $this->message->getSubject();
	}

	/**
	 * Set the plain-text body of this message.
	 */
	public function setPlainBody(string $body): Message {
		$this->message->text($body);
		return $this;
	}

	/**
	 * Get the plain body of this message.
	 *
	 * @return string
	 */
	public function getPlainBody(): string {
		return $this->message->getTextBody() ?? '';
	}

	/**
	 * Set the HTML body of this message. Consider also sending a plain-text body instead of only an HTML one.
	 *
	 * @param string $body
	 * @return $this
	 */
	public function setHtmlBody(string $body): Message {
		$this->message->html($body);
		return $this;
	}

	public function getMessage(): Email {
		return $this->message;
	}

	public function setBody(string $body, string $contentType): Message {
		if ($contentType === 'text/html') {
			$this->message->html($body);
		} else {
			$this->message->text($body);
		}

		return $this;
	}
}
