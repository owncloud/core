<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

namespace OCA\Files_Sharing;

use OC\BackgroundJob\QueuedJob;
use OC\Share\Filters\MailNotificationFilter;
use OC\Share\MailNotifications;
use OC\User\User;
use OCP\BackgroundJob\IJobList;
use OCP\IConfig;
use OCP\IGroupManager;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IUserManager;
use OCP\Mail\IMailer;
use DateTime;
use OCP\Util;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class MailDispatcher
 *
 * @package OCA\Files_Sharing
 */
class MailDispatcher extends QueuedJob {

	/** @var \OC\User\Manager|IUserManager */
	protected $userManager;

	/** @var \OC\Group\Manager|IGroupManager  */
	protected $groupManager;

	/** @var IURLGenerator  */
	protected $urlGenerator;

	/** @var IMailer  */
	protected $mailer;

	/** @var IL10N  */
	protected $l10n;

	/** @var IConfig  */
	protected $config;

	/** @var ILogger  */
	protected $logger;

	/** @var IJobList */
	protected $joblist;

	/** @var EventDispatcher|\Symfony\Component\EventDispatcher\EventDispatcherInterface  */
	protected $eventDispatcher;

	/** @var  String */
	protected $recipient;

	/** @var  String */
	protected $sender;

	/** @var  String */
	protected $shareType;

	/** @var  String */
	protected $itemSource;

	/** @var  String */
	protected $itemType;

	/**
	 * MailDispatcher constructor.
	 */
	public function __construct(IUserManager $userManager = null,
								IGroupManager $groupManager = null,
								IURLGenerator $urlGenerator = null,
								IMailer $mailer = null,
								IL10N $l10n = null,
								IConfig $config = null,
								ILogger $logger = null,
								IJobList $jobList = null,
								EventDispatcher $eventDispatcher = null) {
		$this->userManager = $userManager ? $userManager : \OC::$server->getUserManager();
		$this->groupManager = $groupManager ? $groupManager : \OC::$server->getGroupManager();
		$this->urlGenerator = $urlGenerator ? $urlGenerator : \OC::$server->getURLGenerator();
		$this->mailer = $mailer ? $mailer : \OC::$server->getMailer();
		$this->l10n = $l10n ? $l10n : \OC::$server->getL10N('lib');
		$this->config = $config ? $config : \OC::$server->getConfig();
		$this->logger = $logger ? $logger : \OC::$server->getLogger();
		$this->joblist = $jobList ? $jobList : \OC::$server->getJobList();
		$this->eventDispatcher = $eventDispatcher ? $eventDispatcher : \OC::$server->getEventDispatcher();
	}

	/**
	 * @return array|\OC\User\User[]
	 */
	protected function getRecipientList() {
		$recipient = $this->argument['recipient'];
		$shareType = $this->argument['shareType'];

		$recipientList = [];
		if ($shareType === \OCP\Share::SHARE_TYPE_GROUP) {
			$group = $this->groupManager->get($recipient);
			$recipientList = $group->searchUsers('');
		} elseif ($shareType === \OCP\Share::SHARE_TYPE_USER) {
			$recipientList[] = $this->userManager->get($this->argument['recipient']);
		}

		// don't send a mail to the user who shared the file
		$recipientList = \array_filter($recipientList, function ($user) {
			/** @var IUser $user */
			return $user->getUID() !== $this->userManager->get($this->argument['sender'])->getUID();
		});
		return $recipientList;
	}

	/**
	 * @param User[] $recipientList
	 * @return array. An array which has the list of users who did not received email
	 */
	protected function sendInternalShareMail($recipientList) {
		$noMail = [];

		$itemSource = $this->argument['itemSource'];
		$itemType = $this->argument['itemType'];
		$sender = $this->argument['sender'];

		$senderDisplayName = $this->userManager->get($sender)->getDisplayName();
		$replyTo = $this->userManager->get($sender)->getEMailAddress();

		$sendMessages = [];

		foreach ($recipientList as $recipientUser) {
			$recipientDisplayName = $recipientUser->getDisplayName();
			$to = $recipientUser->getEMailAddress();
			if ($to === null || $to === '') {
				$noMail[] = $recipientDisplayName;
				continue;
			}

			$items = \OC\Share\Share::getItemSharedWithUser($itemType, $itemSource, $recipientUser->getUID());
			$filename = \trim($items[0]['file_target'], '/');
			$expiration = null;
			if (isset($items[0]['expiration'])) {
				try {
					$date = new DateTime($items[0]['expiration']);
					$expiration = $date->getTimestamp();
				} catch (\Exception $e) {
					$this->logger->error("Couldn't read date: ".$e->getMessage(), ['app' => 'sharing']);
				}
			}

			$link = $this->urlGenerator->linkToRouteAbsolute(
				'files.viewcontroller.showFile',
				['fileId' => $items[0]['item_source']]
			);

			$filter = new MailNotificationFilter([
				'link' => $link,
				'file' => $filename,
			]);

			$filename = $filter->getFile();
			$link = $filter->getLink();

			$subject = (string) $this->l10n->t('%s shared »%s« with you', [$filter->getSenderDisplayName($senderDisplayName), $filename]);
			$defaults = new \OCP\Defaults();
			$mailNotification = new MailNotifications(
				$this->userManager->get($sender),
				$this->l10n,
				$this->mailer,
				$this->config,
				$this->logger, new \OCP\Defaults(),
				$this->urlGenerator,
				$this->eventDispatcher);

			list($htmlBody, $textBody) = $mailNotification->createMailBody($filename, $link, $expiration, null, 'internal');

			try {
				$message = $this->mailer->createMessage();
				$message->setSubject($subject);
				$message->setTo([$to => $recipientDisplayName]);
				$message->setHtmlBody($htmlBody);
				$message->setPlainBody($textBody);
				$message->setFrom($this->getFrom($this->l10n, $senderDisplayName, $defaults));
				if ($replyTo !== null) {
					$message->setReplyTo([$replyTo]);
				}

				//get 100 messages to be sent
				if (\count($sendMessages) < 100) {
					$sendMessages[] = $message;
				} else {
					foreach ($sendMessages as $sendMessage) {
						$this->mailer->send($sendMessage);
					}
					$sendMessages = [$message];
				}
			} catch (\Exception $e) {
				$this->logger->error("Can't send mail to inform the user about an internal share: " . $e->getMessage(), ['app' => 'sharing']);
			}
		}

		if (\count($sendMessages) > 0) {
			foreach ($sendMessages as $sendMessage) {
				$this->mailer->send($sendMessage);
			}
		}

		return $noMail;
	}

	public function execute($jobList, ILogger $logger = null) {
		if (($this->argument['recipient'] === null) &&
			($this->argument['sender'] === null) &&
			($this->argument['shareType'] === null) &&
			($this->argument['itemSource']) === null &&
			($this->argument['itemType'] === null)) {
			return null;
		}

		$recipientList = $this->getRecipientList();

		$nonRecipients = $this->sendInternalShareMail($recipientList);

		if (\count($nonRecipients) > 0) {
			foreach ($nonRecipients as $nonRecipient) {
				$this->logger->warning($nonRecipient . ' did not receive email');
			}
		}

		$id = $this->getId();
		$this->joblist->removeById($id);
		//\OC::$server->getJobList()->removeById($id);
	}

	public function run($argument) {
		//$this->mailer = \OC::$server->getMailer();

		if (($this->argument['recipient'] === null) &&
			($this->argument['sender'] === null) &&
			($this->argument['shareType'] === null) &&
			($this->argument['itemSource']) === null &&
			($this->argument['itemType'] === null)) {
			return null;
		}

		$recipientList = $this->getRecipientList();

		$nonRecipients = $this->sendInternalShareMail($recipientList);

		if (\count($nonRecipients) > 0) {
			foreach ($nonRecipients as $nonRecipient) {
				$this->logger->warning($nonRecipient . ' did not receive email');
			}
		}
	}

	/**
	 * Get default sender details
	 *
	 * @param IL10N $l10n
	 * @param string $senderDisplayName
	 * @param \OCP\Defaults $defaults
	 *
	 * @return string[]
	 */
	protected function getFrom($l10n, $senderDisplayName, $defaults) {
		return [
			Util::getDefaultEmailAddress('sharing-noreply') => (string) $l10n->t(
				'%s via %s',
				[
					$senderDisplayName,
					$defaults->getName()
				]
			)
		];
	}
}
