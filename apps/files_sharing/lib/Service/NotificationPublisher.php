<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
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
namespace OCA\Files_Sharing\Service;

use OCP\IURLGenerator;
use OCP\IUserManager;
use OCP\IGroupManager;
use OCP\Share\IShare;

class NotificationPublisher {

	/** @var \OCP\Notification\IManager */
	private $notificationManager;
	/** @var IGroupManager */
	private $groupManager;
	/** @var IUserManager */
	private $userManager;
	/** @var IURLGenerator */
	private $urlGenerator;

	public function __construct(
		\OCP\Notification\IManager $notificationManager,
		IUserManager $userManager,
		IGroupManager $groupManager,
		IURLGenerator $urlGenerator
	) {
		$this->notificationManager = $notificationManager;
		$this->userManager = $userManager;
		$this->groupManager = $groupManager;
		$this->urlGenerator = $urlGenerator;
	}

	private function getAffectedUsers(IShare $share) {
		$users = [];
		if ($share->getShareType() === \OCP\Share::SHARE_TYPE_GROUP) {
			// notify all group members
			$group = $this->groupManager->get($share->getSharedWith());
			// TODO: scale / chunk / ...
			foreach ($group->getUsers() as $user) {
				yield $user->getUID();
			}
		} else if ($share->getShareType() === \OCP\Share::SHARE_TYPE_USER) {
			yield $share->getSharedWith();
		}
	}

	/**
	 * Send notification for accepting share
	 *
	 * @param IShare $share share
	 */
	public function sendNotification(IShare $share) {
		$autoAccept = true;
		if ($share->getState() === \OCP\Share::STATE_PENDING) {
			$autoAccept = false;
		}

		$fileLink = $this->urlGenerator->linkToRouteAbsolute('files.viewcontroller.showFile', ['fileId' => $share->getNode()->getId()]);
		$endpointUrl = $this->urlGenerator->getAbsoluteURL(
			$this->urlGenerator->linkTo('', 'ocs/v1.php/apps/files_sharing/api/v1/shares/pending/' . $share->getId())
		);

		foreach ($this->getAffectedUsers($share) as $userId) {
			$notification = $this->notificationManager->createNotification();
			$notification->setApp('files_sharing')
				->setUser($userId)
				->setDateTime(new \DateTime())
				->setObject('local_share', $share->getId());

			$notification->setIcon(
				$this->urlGenerator->imagePath('core', 'actions/shared.svg')
			);
			if ($autoAccept) {
				$notification->setSubject('local_share_accepted', [$share->getShareOwner(), $share->getSharedBy(), $share->getNode()->getName()]);
				$notification->setLink($fileLink);
			} else {
				$notification->setSubject('local_share', [$share->getShareOwner(), $share->getSharedBy(), $share->getNode()->getName()]);

				$acceptAction = $notification->createAction();
				$acceptAction->setLabel('accept');
				$acceptAction->setLink($endpointUrl, 'POST');
				$notification->addAction($acceptAction);

				$declineAction = $notification->createAction();
				$declineAction->setLabel('decline');
				$declineAction->setLink($endpointUrl, 'DELETE');
				$notification->addAction($declineAction);
			}

			$this->notificationManager->notify($notification);
		}
	}

}
