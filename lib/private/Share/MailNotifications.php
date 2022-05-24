<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author scolebrook <scolebrook@mac.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
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

namespace OC\Share;

use OCP\Files\IRootFolder;
use OCP\Files\Node;
use OCP\Files\NotFoundException;
use OCP\IConfig;
use OCP\IL10N;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\Mail\IMailer;
use OCP\ILogger;
use OCP\Defaults;
use OCP\Share\Exceptions\GenericShareException;
use OCP\Share\Exceptions\ShareNotFound;
use OCP\Share\IManager;
use OCP\Share\IShare;
use OCP\Util;
use OC\Share\Filters\MailNotificationFilter;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class MailNotifications
 *
 * @package OC\Share
 */
class MailNotifications {
	/** @var IManager */
	private $shareManager;
	/** @var IL10N */
	private $l;
	/** @var IMailer */
	private $mailer;
	/** @var IConfig */
	private $config;
	/** @var Defaults */
	private $defaults;
	/** @var ILogger */
	private $logger;
	/** @var IURLGenerator */
	private $urlGenerator;
	/** @var EventDispatcher */
	private $eventDispatcher;
	/** @var \OCP\Activity\IManager */
	private $activityManager;
	/** @var IRootFolder */
	private $rootFolder;

	/**
	 * @param IManager $shareManager
	 * @param IL10N $l10n
	 * @param IMailer $mailer
	 * @param IConfig $config
	 * @param ILogger $logger
	 * @param Defaults $defaults
	 * @param IURLGenerator $urlGenerator
	 * @param EventDispatcher $eventDispatcher
	 * @param \OCP\Activity\IManager $activityManager
	 */
	public function __construct(
		IManager $shareManager,
		IL10N $l10n,
		IMailer $mailer,
		IConfig $config,
		ILogger $logger,
		Defaults $defaults,
		IURLGenerator $urlGenerator,
		EventDispatcher $eventDispatcher,
		\OCP\Activity\IManager $activityManager,
		IRootFolder $rootFolder
	) {
		$this->shareManager = $shareManager;
		$this->l = $l10n;
		$this->mailer = $mailer;
		$this->config = $config;
		$this->logger = $logger;
		$this->defaults = $defaults;
		$this->urlGenerator = $urlGenerator;
		$this->eventDispatcher = $eventDispatcher;
		$this->activityManager = $activityManager;
		$this->rootFolder = $rootFolder;
	}

	/**
	 * inform users if a file was shared with them
	 *
	 * @param IUser $sender
	 * @param Node shared node
	 * @param string $shareType share type
	 * @param IUser[] $recipientList list of recipients
	 * @return array list of user to whom the mail send operation failed
	 * @throws \OCP\Files\NotFoundException
	 * @throws GenericShareException
	 */
	public function sendInternalShareMail($sender, $node, $shareType, $recipientList): array {
		if ($this->config->getAppValue('core', 'shareapi_allow_mail_notification', 'no') !== 'yes') {
			$message_t = $this->l->t('Internal mail notification for shared files is not allowed');
			throw new GenericShareException($message_t, $message_t, 403);
		}
		$noMail = [];

		foreach ($recipientList as $recipient) {
			$recipientDisplayName = $recipient->getDisplayName();
			$to = $recipient->getEMailAddress();

			if ($to === null || $to === '') {
				$noMail[] = $recipientDisplayName;
				continue;
			}

			$items = $this->shareManager->getSharedWith($recipient->getUID(), $shareType, $node);
			if (\count($items) === 0) {
				$noMail[] = $recipientDisplayName;
				continue;
			}
			/** @var IShare $firstItem */
			$firstItem = $items[0];

			$filename = \trim($firstItem->getTarget(), '/');
			$expiration = null;
			if ($firstItem->getExpirationDate() instanceof \DateTime) {
				try {
					$date = $firstItem->getExpirationDate();
					$expiration = $date->getTimestamp();
				} catch (\Exception $e) {
					$this->logger->error("Couldn't read date: ".$e->getMessage(), ['app' => 'sharing']);
				}
			}

			$link = $this->urlGenerator->linkToRouteAbsolute(
				'files.viewcontroller.showFile',
				['fileId' => $firstItem->getNodeId()]
			);

			$filter = new MailNotificationFilter([
				'link' => $link,
				'file' => $filename,
				'senderDisplayName' => $sender->getDisplayName()
			]);

			$unescapedFilename = $filename;
			$link = $filter->getLink();

			$defaultLang = $this->config->getSystemValue('default_language', 'en');
			$recipientLanguageCode = $this->config->getUserValue($recipient->getUID(), 'core', 'lang', $defaultLang);
			$recipientL10N = \OC::$server->getL10N('lib');
			if ($this->l->getLanguageCode() !== $recipientLanguageCode) {
				$recipientL10N = \OC::$server->getL10N('lib', $recipientLanguageCode);
				$subject = (string)$recipientL10N->t('%s shared »%s« with you', [$filter->getSenderDisplayName(), $unescapedFilename]);
			} else {
				$subject = (string)$this->l->t('%s shared »%s« with you', [$filter->getSenderDisplayName(), $unescapedFilename]);
			}

			list($htmlBody, $textBody) = $this->createMailBody(
				$unescapedFilename,
				$link,
				$expiration,
				$filter->getSenderDisplayName(),
				null,
				'internal',
				$recipientL10N
			);
			$replyTo = $this->getReplyTo($sender->getEMailAddress());

			// send it out now
			try {
				$message = $this->mailer->createMessage();
				$message->setSubject($subject);
				$message->setTo([$to => $recipientDisplayName]);
				$message->setHtmlBody($htmlBody);
				$message->setPlainBody($textBody);
				$message->setFrom($this->getFrom($this->l, $filter->getSenderDisplayName()));
				$message->setReplyTo([$replyTo]);

				$this->mailer->send($message);
			} catch (\Exception $e) {
				$this->logger->error("Can't send mail to inform the user about an internal share: ".$e->getMessage(), ['app' => 'sharing']);
				$noMail[] = $recipientDisplayName;
			}
		}

		return $noMail;
	}

	/**
	 *
	 * @param IUser $sender
	 * @param string[] $recipients recipient email addresses
	 * @param string $link the share link
	 * @param string $personalNote sender note
	 * @throws GenericShareException
	 * @throws NotFoundException
	 * @return string[] $result of failed recipients
	 */
	public function sendLinkShareMail($sender, $recipients, $link, $personalNote = null) {
		if ($this->config->getAppValue('core', 'shareapi_allow_public_notification', 'no') !== 'yes') {
			$message_t = $this->l->t('Public link mail notification is not allowed');
			throw new GenericShareException($message_t, $message_t, 403);
		}
		$recipientsAsString = \implode(', ', $recipients);
		$currentUser = $sender->getUID();
		$notificationLang = $this->config->getAppValue(
			'core',
			'shareapi_public_notification_lang',
			null
		);
		$linkParts = \explode('/', $link);
		$token = \array_pop($linkParts);
		try {
			$share = $this->shareManager->getShareByToken($token);
			if ($share->getShareOwner() !== $currentUser && $share->getSharedBy() !== $currentUser) {
				return $recipients;
			}
		} catch (ShareNotFound $e) {
			return $recipients;
		}
		$l10n = \OC::$server->getL10N('lib', $notificationLang);
		$expirationDate = null;
		if ($share->getExpirationDate()) {
			$expirationDate = $share->getExpirationDate()->getTimestamp();
		}
		$shareNode = $share->getNode();
		$filter = new MailNotificationFilter([
			'link' => $link,
			'file' => $shareNode->getName(),
			'expirationDate' => $expirationDate,
			'personalNote' => $personalNote,
			'senderDisplayName' => $sender->getDisplayName()
		]);
		$subject = (string)$l10n->t('%s shared »%s« with you', [$filter->getSenderDisplayName(), $filter->getFile(true)]);
		list($htmlBody, $textBody) = $this->createMailBody(
			$filter->getFile(),
			$filter->getLink(),
			$filter->getExpirationDate(),
			$filter->getSenderDisplayName(),
			$filter->getPersonalNote(),
			'',
			$l10n
		);
		$from = $this->getFrom($l10n, $filter->getSenderDisplayName());
		$replyTo = $this->getReplyTo($sender->getEMailAddress());

		$event = new GenericEvent(null, ['link' => $link, 'to' => $recipientsAsString]);
		$this->eventDispatcher->dispatch($event, 'share.sendmail');
		$failedRecipients =  $this->sendLinkShareMailFromBody($recipients, $subject, $htmlBody, $textBody, $from, $replyTo);
		if (empty($failedRecipients)) {
			$event = $this->activityManager->generateEvent();
			// it can be a re-share, get actual share file node
			$userFolder = $this->rootFolder->getUserFolder($sender->getUID());
			$shareFileNodes = $userFolder->getById($shareNode->getId(), true);
			$shareFileNode = $shareFileNodes[0] ?? null;
			$path = $userFolder->getRelativePath($shareFileNode->getPath());
			$event->setApp(\OCA\Files_Sharing\Activity::FILES_SHARING_APP)
				->setType(\OCA\Files_Sharing\Activity::TYPE_SHARED)
				->setAuthor($currentUser)
				->setAffectedUser($currentUser)
				->setObject('files', $share->getNodeId(), $path)
				->setSubject(\OCA\Files_Sharing\Activity::SUBJECT_SHARED_EMAIL, [$path, $recipientsAsString]);
			$this->activityManager->publish($event);
		}
		return $failedRecipients;
	}

	/**
	 * inform recipients about public link share
	 *
	 * @param string[] $recipients recipient list
	 * @param string $subject the shared file
	 * @param string $htmlBody the public link
	 * @param string $textBody the public link
	 * @param string[] $from From field of the mail
	 * @param string $replyTo sender user e-mail address
	 *
	 * @return string[] $result of failed recipients
	 */
	public function sendLinkShareMailFromBody($recipients, $subject, $htmlBody, $textBody, $from, $replyTo) {
		$failedRecipients = [];
		try {
			/**
			 * Send separate mail for all recipients
			 */
			foreach ($recipients as $recipient) {
				$message = $this->mailer->createMessage();
				$message->setSubject($subject);
				$message->setTo([$recipient]);
				$message->setHtmlBody($htmlBody);
				$message->setPlainBody($textBody);
				$message->setFrom($from);
				$message->setReplyTo([$replyTo]);
				$result = $this->mailer->send($message);
				if (!empty($result)) {
					$failedRecipients [] = $recipient;
				}
			}
		} catch (\Exception $e) {
			$allRecipients = \implode(',', $recipients);
			$this->logger->error(
				"Can't send mail with public link to $allRecipients: ".$e->getMessage(),
				['app' => 'sharing']
			);
			return $recipients;
		}
		return $failedRecipients;
	}

	/**
	 * create mail body for plain text and html mail
	 *
	 * @param string $filename the shared file
	 * @param string $link link to the shared file
	 * @param int $expiration expiration date (timestamp)
	 * @param string $senderDisplayName display name of the sender user
	 * @param string $personalNote optional personal note
	 * @param string $prefix prefix of mail template files
	 * @param IL10N|null $overrideL10n
	 *
	 * @return array an array of the html mail body and the plain text mail body
	 */
	protected function createMailBody(
		$filename,
		$link,
		$expiration,
		$senderDisplayName,
		$personalNote = null,
		$prefix = '',
		$overrideL10n = null
	) {
		$l10n = $overrideL10n === null ? $this->l : $overrideL10n;
		$formattedDate = $expiration ?  $l10n->l('date', $expiration) : null;

		$html = new \OC_Template(
			'core',
			$prefix . 'mail',
			'',
			true,
			$l10n->getLanguageCode()
		);
		$html->assign('link', $link);
		$html->assign('user_displayname', $senderDisplayName);
		$html->assign('filename', $filename);
		$html->assign('expiration', $formattedDate);
		if ($personalNote !== null && $personalNote !== '') {
			$html->assign('personal_note', \nl2br($personalNote));
		}
		$htmlMail = $html->fetchPage();

		$plainText = new \OC_Template(
			'core',
			$prefix . 'altmail',
			'',
			true,
			$l10n->getLanguageCode()
		);
		$plainText->assign('link', $link);
		$plainText->assign('user_displayname', $senderDisplayName);
		$plainText->assign('filename', $filename);
		$plainText->assign('expiration', $formattedDate);
		if ($personalNote !== null && $personalNote !== '') {
			$plainText->assign('personal_note', $personalNote);
		}
		$plainTextMail = $plainText->fetchPage();

		return [$htmlMail, $plainTextMail];
	}

	/**
	 * Get default sender details
	 *
	 * @param IL10N $l10n
	 * @param string $senderDisplayName
	 *
	 * @return string[]
	 */
	protected function getFrom($l10n, $senderDisplayName) {
		return [
			Util::getDefaultEmailAddress('sharing-noreply') => (string) $l10n->t(
				'%s via %s',
				[
					$senderDisplayName,
					$this->defaults->getName()
				]
			)
		];
	}

	/**
	 * @param string $senderMailAddress
	 * @return string
	 */
	protected function getReplyTo($senderMailAddress) {
		if (empty($senderMailAddress)) {
			return Util::getDefaultEmailAddress('sharing-noreply');
		}
		return $senderMailAddress;
	}
}
