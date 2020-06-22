<?php
/**
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\Files_Sharing\Controller;

use OC\OCS\Result;
use OC\Share\MailNotifications;
use OCP\AppFramework\OCSController;
use OCP\Files\IRootFolder;
use OCP\Files\NotFoundException;
use OCP\IGroupManager;
use OCP\IL10N;
use OCP\IRequest;
use OCP\IUser;
use OCP\IUserManager;
use OCP\IUserSession;
use OCP\Share;
use OCP\Share\Exceptions\GenericShareException;

class NotificationController extends OCSController {
	/** @var MailNotifications */
	private $mailNotifications;
	/** @var IUserSession */
	private $userSession;
	/** @var IUserManager */
	private $userManager;
	/** @var IGroupManager */
	private $groupManager;
	/** @var IRootFolder */
	private $rootFolder;
	/** @var IL10N */
	private $l;
	public function __construct(
		string $appName,
		IRequest $request,
		MailNotifications $mailNotifications,
		IUserSession $userSession,
		IUserManager $userManager,
		IGroupManager $groupManager,
		IRootFolder $rootFolder,
		IL10N $l
	) {
		parent::__construct($appName, $request);
		$this->mailNotifications = $mailNotifications;
		$this->userSession = $userSession;
		$this->userManager = $userManager;
		$this->groupManager = $groupManager;
		$this->rootFolder = $rootFolder;
		$this->l = $l;
	}

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 *
	 * @param string $link URL of the shared link
	 * @param string[] $recipients
	 * @param string $personalNote Sender's personal note about share
	 * @return Result
	 */
	public function notifyPublicLinkRecipientsByEmail($link, $recipients, $personalNote) {
		$message = null;
		$code = 100;
		$sender = $this->userSession->getUser();
		$result = $recipients;
		if ($sender) {
			try {
				$result = $this->mailNotifications->sendLinkShareMail(
					$sender,
					$recipients,
					$link,
					$personalNote
				);
			} catch (GenericShareException | NotFoundException $e) {
				$code = $e->getCode() === 0 ? 403 : $e->getCode();
				return new Result(null, $code, $e->getHint());
			}
		}
		if (!empty($result)) {
			$message = $this->l->t("Couldn't send mail to following recipient(s): %s ",
				\implode(', ', $result)
			);
			$code = 400;
		}
		return new Result(null, $code, $message);
	}

	/**
	 * Send a notification to share recipient(s)
	 *
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 *
	 * @param int $itemSource
	 * @param string $itemType
	 * @param int $shareType
	 * @param string $recipient
	 *
	 * @return Result
	 */
	public function notifyRecipients($itemSource, $itemType, $shareType, $recipient) {
		$recipientList = [];
		$sender = $this->userSession->getUser();
		if ($shareType === Share::SHARE_TYPE_USER) {
			$recipientList[] = $this->userManager->get($recipient);
		} elseif ($shareType === Share::SHARE_TYPE_GROUP) {
			$group = $this->groupManager->get($recipient);
			$recipientList = $group->searchUsers('');
		}
		// don't send a mail to the user who shared the file
		$recipientList = \array_filter($recipientList, function ($user) {
			/** @var IUser $user */
			return $user->getUID() !== $this->userSession->getUser()->getUID();
		});

		$userFolder = $this->rootFolder->getUserFolder($sender->getUID());
		$nodes = $userFolder->getById($itemSource, true);
		$node = $nodes[0] ?? null;
		try {
			$result = $this->mailNotifications->sendInternalShareMail($sender, $node, $shareType, $recipientList);
		} catch (GenericShareException $e) {
			$code = $e->getCode() === 0 ? 403 : $e->getCode();
			return new Result(null, $code, $e->getHint());
		}

		// if we were able to send to at least one recipient, mark as sent
		// allowing the user to resend would spam users who already got a notification
		if (\count($result) < \count($recipientList)) {
			// FIXME: migrate to a new share API
			Share::setSendMailStatus($itemType, $itemSource, $shareType, $recipient, true);
		}

		if (empty($result)) {
			$message = null;
			$data = ['status' => 'success'];
		} else {
			$message = $this->l->t(
				"Couldn't send mail to following recipient(s): %s ",
				\implode(', ', $result)
			);
			$data = ['status' => 'error'];
		}
		return new Result($data, 200, $message);
	}

	/**
	 * Just mark a notification to share recipient(s) as sent
	 *
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 *
	 * @param int $itemSource
	 * @param string $itemType
	 * @param int $shareType
	 * @param string $recipient
	 *
	 * @return Result
	 */
	public function notifyRecipientsDisabled($itemSource, $itemType, $shareType, $recipient) {
		// FIXME: migrate to a new share API
		Share::setSendMailStatus($itemType, $itemSource, $shareType, $recipient, true);
		return new Result(['status' => 'success']);
	}
}
