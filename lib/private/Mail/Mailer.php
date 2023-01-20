<?php
/**
 * @author Lukas Reschke <lukas@statuscode.ch>
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

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use OC_Defaults;
use OCP\IConfig;
use OCP\Mail\IMailer;
use OCP\ILogger;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Transport\SendmailTransport;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use Symfony\Component\Mailer\Transport\Smtp\Stream\SocketStream;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mime\Email;

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
	private ?TransportInterface $instance = null;
	private IConfig $config;
	private ILogger $logger;
	private OC_Defaults $defaults;

	public function __construct(
		IConfig $config,
		ILogger $logger,
		OC_Defaults $defaults
	) {
		$this->config = $config;
		$this->logger = $logger;
		$this->defaults = $defaults;
	}

	/**
	 * Creates a new message object that can be passed to send()
	 */
	public function createMessage(): Message {
		return new Message(new Email());
	}

	/**
	 * Send the specified message. Also sets the from address to the value defined in config.php
	 * if no-one has been passed.
	 *
	 * @param Message $message Message to send
	 * @return string[] Array with failed recipients. Be aware that this depends on the used mail backend and
	 * therefore should be considered
	 * @throws \Exception In case it was not possible to send the message. (for example if an invalid mail address
	 * has been supplied.)
	 */
	public function send(Message $message): array {
		if (!\is_array($message->getFrom()) || \count($message->getFrom()) === 0) {
			$message->setFrom([\OCP\Util::getDefaultEmailAddress($this->defaults->getName())]);
		}

		$debugMode = $this->config->getSystemValue('mail_smtpdebug', false);
		$logger = $debugMode ? new Logger() : null;

		try {
			$this->getInstance($logger ?? null)->send($message->getMessage());
		} catch (TransportExceptionInterface $e) {
			# in case of exception it is expected that none of the mails has been sent
			$failedRecipients = [];

			$recipients = array_merge($message->getTo(), $message->getCc(), $message->getBcc());
			array_walk($recipients, static function ($value, $key) use (&$failedRecipients) {
				if (is_numeric($key)) {
					$failedRecipients[] = $value;
				} else {
					$failedRecipients[] = $key;
				}
			});

			$this->logger->logException($e, ['failed-recipients' => $recipients]);

			# list of failed recipients is not added by intention to not accidentally disclose private data
			throw new \RuntimeException("Failed to deliver email", 0, $e);
		}

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
			'subject' => $message->getSubject(),
			'mail_log' => ($logger !== null) ? $logger->toJSON() : null,
		]);

		return [];
	}

	/**
	 * Checks if an e-mail address is valid
	 *
	 * @param string $email Email address to be validated
	 * @return bool True if the mail address is valid, false otherwise
	 */
	public function validateMailAddress(string $email): bool {
		return (new EmailValidator())
			->isValid($this->convertEmail($email), new RFCValidation());
	}

	/**
	 * SwiftMailer does currently not work with IDN domains, this function therefore converts the domains
	 *
	 * FIXME: Remove this once SwiftMailer supports IDN
	 *
	 * @param string $email
	 * @return string Converted mail address if `idn_to_ascii` exists
	 */
	protected function convertEmail(string $email): string {
		if (!\function_exists('idn_to_ascii') || \strpos($email, '@') === false) {
			return $email;
		}

		[$name, $domain] = \explode('@', $email, 2);
		if (\defined('INTL_IDNA_VARIANT_UTS46')) {
			$domain = \idn_to_ascii($domain, 0, INTL_IDNA_VARIANT_UTS46);
		} else {
			$domain = \idn_to_ascii($domain);
		}
		return $name.'@'.$domain;
	}

	protected function getInstance(?LoggerInterface $logger = null): TransportInterface {
		if ($this->instance !== null) {
			return $this->instance;
		}

		$mailMode = $this->config->getSystemValue('mail_smtpmode', 'php');
		if ($mailMode === 'smtp') {
			$transport = $this->getSmtpInstance($logger ?? null);
		} else {
			$transport = $this->getSendMailInstance($logger ?? null);
		}

		$this->instance = $transport;

		return $this->instance;
	}

	protected function getSmtpInstance(?LoggerInterface $logger): EsmtpTransport {
		$timeout = $this->config->getSystemValue('mail_smtptimeout', 10);
		$host = $this->config->getSystemValue('mail_smtphost', '127.0.0.1');
		$port = $this->config->getSystemValue('mail_smtpport', 25);
		$smtpSecurity = $this->config->getSystemValue('mail_smtpsecure', '');
		$tls = $smtpSecurity === 'ssl' ? true : null;
		$transport = new EsmtpTransport($host, $port, $tls, null, $logger);
		if ($this->config->getSystemValue('mail_smtpauth', false)) {
			$transport->setUsername($this->config->getSystemValue('mail_smtpname', ''));
			$transport->setPassword($this->config->getSystemValue('mail_smtppassword', ''));
		}
		$stream = $transport->getStream();
		if ($stream instanceof SocketStream) {
			$stream->setTimeout($timeout);
		}

		return $transport;
	}

	protected function getSendMailInstance(?LoggerInterface $logger = null): SendmailTransport {
		$i = $this->config->getSystemValue('mail_smtpmode', 'sendmail');
		if ($i === 'qmail') {
			$binaryPath = '/var/qmail/bin/sendmail';
		} else {
			$binaryPath = '/usr/sbin/sendmail';
		}

		return new SendmailTransport($binaryPath . ' -bs', null, $logger);
	}
}
