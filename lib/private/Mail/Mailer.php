<?php
/**
 * @author Lukas Reschke <lukas@statuscode.ch>
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

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use OCP\IConfig;
use OCP\Mail\IMailer;
use OCP\ILogger;
use Symfony\Component\Mailer\Transport\Smtp\Auth;
use Symfony\Component\Mailer as CoreMailer;

/**
 * Class Mailer provides some basic functions to create a mail message that can be used in combination with
 * \OC\Mail\Message.
 *
 * Example usage:
 *
 * 	$mailer = \OC::$server->getMailer();
 * 	$message = $mailer->createMessage();
 * 	$message->setSubject('Your Subject');
 * 	$message->setFrom(array('cloud@domain.org' => 'ownCloud Notifier');
 * 	$message->setTo(array('recipient@domain.org' => 'Recipient');
 * 	$message->setBody('The message text');
 * 	$mailer->send($message);
 *
 * This message can then be passed to send() of \OC\Mail\Mailer
 *
 * @package OC\Mail
 */
class Mailer implements IMailer {
	/** @var CoreMailer\Mailer Cached mailer */
	private $instance = null;
	/** @var IConfig */
	private $config;
	/** @var ILogger */
	private $logger;
	/** @var \OC_Defaults */
	private $defaults;

	/**
	 * @param IConfig $config
	 * @param ILogger $logger
	 * @param \OC_Defaults $defaults
	 */
	public function __construct(
		IConfig $config,
		ILogger $logger,
		\OC_Defaults $defaults
	) {
		$this->config = $config;
		$this->logger = $logger;
		$this->defaults = $defaults;
	}

	/**
	 * Creates a new message object that can be passed to send()
	 *
	 * @return Message
	 */
	public function createMessage() {
		return new Message(new \Symfony\Component\Mime\Email());
	}

	/**
	 * Send the specified message. Also sets the from address to the value defined in config.php
	 * if no-one has been passed.
	 *
	 * @param Message $message Message to send
	 * @return string[] Array with failed recipients. ! No Longer Supported and always empty!
	 * @throws \Exception In case it was not possible to send the message. (for example if an invalid mail address
	 * has been supplied.)
	 */
	public function send(Message $message) {
		if (!\is_array($message->getFrom()) || \count($message->getFrom()) === 0) {
			$message->setFrom([\OCP\Util::getDefaultEmailAddress($this->defaults->getName())]);
		}

		$failedRecipients = [];

		$mailer = $this->getInstance();

		$mailer->send($message->getMessage());

		$allRecipients = [];
		if (!empty($message->getTo())) {
			$allRecipients = \array_merge($allRecipients, $message->getTo());
		}
		if (!empty($message->getCc())) {
			$allRecipients = \array_merge($allRecipients, $message->getCc());
		}
		if (!empty($message->getBcc())) {
			$allRecipients = \array_merge($allRecipients, $message->getBcc());
		}

		// Debugging logging
		$logMessage = 'Sent mail from "{from}" to "{recipients}" with subject "{subject}"';
		$this->logger->debug($logMessage, [
			'app' => 'core',
			'from' => \json_encode($message->getFrom()),
			'recipients' => \json_encode($allRecipients),
			'subject' => $message->getSubject()
		]);

		return $failedRecipients;
	}

	/**
	 * Checks if an e-mail address is valid
	 *
	 * @param string $email Email address to be validated
	 * @return bool True if the mail address is valid, false otherwise
	 */
	public function validateMailAddress($email) {
		$validator = new EmailValidator();
		return $validator->isValid($this->convertEmail($email), new RFCValidation());
	}

	/**
	 * SwiftMailer does currently not work with IDN domains, this function therefore converts the domains
	 *
	 * FIXME: Remove this once SwiftMailer supports IDN
	 *
	 * @param string $email
	 * @return string Converted mail address if `idn_to_ascii` exists
	 */
	protected function convertEmail($email) {
		if (!\function_exists('idn_to_ascii') || \strpos($email, '@') === false) {
			return $email;
		}

		list($name, $domain) = \explode('@', $email, 2);
		try {
			if (\defined('INTL_IDNA_VARIANT_UTS46')) {
				$domain = \idn_to_ascii($domain, 0, INTL_IDNA_VARIANT_UTS46);
			} else {
				$domain = \idn_to_ascii($domain);
			}
		} catch (\ValueError $ex) {
			return $email;
		}

		return $name.'@'.$domain;
	}

	/**
	 * Returns whatever transport is configured within the config
	 *
	 * @return CoreMailer\Mailer
	 */
	protected function getInstance() {
		if ($this->instance !== null) {
			return $this->instance;
		}

		$mailMode = $this->config->getSystemValue('mail_smtpmode', 'php');
		if ($mailMode === 'smtp') {
			$transport = $this->getSmtpInstance();
			// Enable antiflood on smtp connection (defaults to 100 mails before reconnect)
			$transport->setRestartThreshold(100);
		} else {
			// FIXME: Move into the return statement but requires proper testing
			//       for SMTP and mail as well. Thus not really doable for a
			//       minor release.
			$transport = $this->getSendMailInstance();
		}

		$this->instance = new CoreMailer\Mailer($transport);

		return $this->instance;
	}

	/**
	 * Returns the SMTP transport
	 *
	 * @return CoreMailer\Transport\Smtp\EsmtpTransport
	 */
	protected function getSmtpInstance() {
		$initParams = [
			$this->config->getSystemValue('mail_smtphost', '127.0.0.1'),
			$this->config->getSystemValue('mail_smtpport', 25)
		];

		// Enable logger if debug mode is enabled
		if ($this->config->getSystemValue('mail_smtpdebug', false)) {
			$initParams['logger'] = $this->logger;
		}

		$transport = new CoreMailer\Transport\Smtp\EsmtpTransport(...$initParams);

		//		$transport->setTimeout($this->config->getSystemValue('mail_smtptimeout', 10));
		if ($this->config->getSystemValue('mail_smtpauth', false)) {
			$transport->setUsername($this->config->getSystemValue('mail_smtpname', ''));
			$transport->setPassword($this->config->getSystemValue('mail_smtppassword', ''));
			$transport->setAuthenticators([
				$this->getAuthenticator($this->config->getSystemValue('mail_smtpauthtype', 'LOGIN'))
			]);
		}
		$smtpSecurity = $this->config->getSystemValue('mail_smtpsecure', '');
		if (!empty($smtpSecurity)) {
			$transport->setRequireTls($smtpSecurity);
		}
		$transport->start();
		return $transport;
	}

	/**
	 * Returns the sendmail transport
	 *
	 * @return CoreMailer\Transport\SendmailTransport
	 */
	protected function getSendMailInstance() {
		switch ($this->config->getSystemValue('mail_smtpmode', 'sendmail')) {
			case 'qmail':
				$binaryPath = '/var/qmail/bin/sendmail';
				break;
			default:
				$binaryPath = '/usr/sbin/sendmail';
				break;
		}

		$initParams = [
			$binaryPath . ' -bs'
		];

		// Enable logger if debug mode is enabled
		if ($this->config->getSystemValue('mail_smtpdebug', false)) {
			$initParams['logger'] = $this->logger;
		}

		return new CoreMailer\Transport\SendmailTransport(...$initParams);
	}

	private function getAuthenticator(string $type): Auth\AuthenticatorInterface {
		$map = [
			'PLAIN' => Auth\PlainAuthenticator::class,
			'LOGIN' => Auth\LoginAuthenticator::class,
			'CRAM-MD5' => Auth\CramMd5Authenticator::class,
		];

		$type = \strtoupper($type);
		if(!isset($map[$type])) {
			throw new \Exception('Unknown authenticator type "'.$type.'"');
		}

		return new $map[$type]();
	}
}
