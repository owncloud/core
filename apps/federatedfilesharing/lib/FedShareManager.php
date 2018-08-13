<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\FederatedFileSharing;

use OCA\Files_Sharing\Activity;
use OCP\Activity\IManager as ActivityManager;
use OCP\Files\NotFoundException;
use OCP\IUserManager;
use OCP\Notification\IManager as NotificationManager;
use OCP\Share\IShare;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class FedShareManager holds the share logic
 *
 * @package OCA\FederatedFileSharing
 */
class FedShareManager {
	const ACTION_URL = 'ocs/v1.php/apps/files_sharing/api/v1/remote_shares/pending/';

	/**
	 * @var FederatedShareProvider
	 */
	private $federatedShareProvider;

	/**
	 * @var Notifications
	 */
	private $notifications;

	/**
	 * @var IUserManager
	 */
	private $userManager;

	/**
	 * @var ActivityManager
	 */
	private $activityManager;

	/**
	 * @var NotificationManager
	 */
	private $notificationManager;

	/**
	 * @var AddressHandler
	 */
	private $addressHandler;

	/**
	 * @var EventDispatcherInterface
	 */
	private $eventDispatcher;

	/**
	 * FedShareManager constructor.
	 *
	 * @param FederatedShareProvider $federatedShareProvider
	 * @param Notifications $notifications
	 * @param IUserManager $userManager
	 * @param ActivityManager $activityManager
	 * @param NotificationManager $notificationManager
	 * @param AddressHandler $addressHandler
	 * @param EventDispatcherInterface $eventDispatcher
	 */
	public function __construct(FederatedShareProvider $federatedShareProvider,
								Notifications $notifications,
								IUserManager $userManager,
								ActivityManager $activityManager,
								NotificationManager $notificationManager,
								AddressHandler $addressHandler,
								EventDispatcherInterface $eventDispatcher
	) {
		$this->federatedShareProvider = $federatedShareProvider;
		$this->notifications = $notifications;
		$this->userManager = $userManager;
		$this->activityManager = $activityManager;
		$this->notificationManager = $notificationManager;
		$this->addressHandler = $addressHandler;
		$this->eventDispatcher = $eventDispatcher;
	}

	/**
	 * Create an incoming share
	 *
	 * @param Address $ownerAddress
	 * @param Address $sharedByAddress
	 * @param string $shareWith
	 * @param int $remoteId
	 * @param string $name
	 * @param string $token
	 *
	 * @return void
	 */
	public function createShare(Address $ownerAddress,
								Address $sharedByAddress,
								$shareWith,
								$remoteId,
								$name,
								$token
	) {
		$owner = $ownerAddress->getUserId();
		$shareId = $this->federatedShareProvider->addShare(
			$ownerAddress->getHostName(), $token, $name, $owner, $shareWith, $remoteId
		);

		$this->eventDispatcher->dispatch(
			'\OCA\FederatedFileSharing::remote_shareReceived',
			new GenericEvent(
				null,
				[
					'name' => $name,
					'targetuser' => $sharedByAddress->getCloudId(),
					'owner' => $owner,
					'sharewith' => $shareWith,
					'sharedby' => $sharedByAddress->getUserId(),
					'remoteid' => $remoteId
				]
			)
		);
		$this->publishActivity(
			$shareWith,
			Activity::SUBJECT_REMOTE_SHARE_RECEIVED,
			[$ownerAddress->getCloudId(), \trim($name, '/')],
			'files',
			'',
			'',
			''
		);
		$link = $this->getActionLink($shareId);
		$params = [
			$ownerAddress->getCloudId(),
			$sharedByAddress->getCloudId(),
			\trim($name, '/')
		];
		$notification = $this->createNotification($shareWith);
		$notification->setDateTime(new \DateTime())
			->setObject('remote_share', $shareId)
			->setSubject('remote_share', $params)
			->setMessage('remote_share', $params);
		$declineAction = $notification->createAction();
		$declineAction->setLabel('decline')
			->setLink($link, 'DELETE');
		$notification->addAction($declineAction);
		$acceptAction = $notification->createAction();
		$acceptAction->setLabel('accept')
			->setLink($link, 'POST');
		$notification->addAction($acceptAction);
		$this->notificationManager->notify($notification);
	}

	/**
	 * @param IShare $share
	 * @param int $remoteId
	 * @param string $shareWith
	 * @param int $permissions
	 *
	 * @return IShare
	 *
	 * @throws \OCP\Share\Exceptions\ShareNotFound
	 */
	public function reShare(IShare $share, $remoteId, $shareWith, $permissions) {
		$share->setPermissions($share->getPermissions() & $permissions);
		// the recipient of the initial share is now the initiator for the re-share
		$share->setSharedBy($share->getSharedWith());
		$share->setSharedWith($shareWith);
		$result = $this->federatedShareProvider->create($share);
		$this->federatedShareProvider->storeRemoteId(
			(int)$result->getId(),
			$remoteId
		);
		return $result;
	}

	/**
	 *
	 *
	 * @param IShare $share
	 *
	 * @throws \OCP\Files\InvalidPathException
	 * @throws \OCP\Files\NotFoundException
	 */
	public function acceptShare(IShare $share) {
		$uid = $this->getCorrectUid($share);
		$fileId = $share->getNode()->getId();
		list($file, $link) = $this->getFile($uid, $fileId);
		$this->publishActivity(
			$uid,
			Activity::SUBJECT_REMOTE_SHARE_ACCEPTED,
			[$share->getSharedWith(), \basename($file)],
			'files',
			$fileId,
			$file,
			$link
		);
		$this->notifyRemote($share, [$this->notifications, 'sendAcceptShare']);
	}

	/**
	 * Delete declined share and create a activity
	 *
	 * @param IShare $share
	 *
	 * @throws \OCP\Files\InvalidPathException
	 * @throws \OCP\Files\NotFoundException
	 */
	public function declineShare(IShare $share) {
		$this->notifyRemote($share, [$this->notifications, 'sendDeclineShare']);
		$uid = $this->getCorrectUid($share);
		$fileId = $share->getNode()->getId();
		$this->federatedShareProvider->removeShareFromTable($share);
		list($file, $link) = $this->getFile($uid, $fileId);
		$this->publishActivity(
			$uid,
			Activity::SUBJECT_REMOTE_SHARE_DECLINED,
			[$share->getSharedWith(), \basename($file)],
			'files',
			$fileId,
			$file,
			$link
		);
	}

	/**
	 * Unshare an item
	 *
	 * @param int $id
	 * @param string $token
	 *
	 * @return void
	 */
	public function unshare($id, $token) {
		$shareRow = $this->federatedShareProvider->unshare($id, $token);
		if ($shareRow === false) {
			return;
		}
		$remote = $this->addressHandler->normalizeRemote($shareRow['remote']);
		$owner = $shareRow['owner'] . '@' . $remote;
		$mountpoint = $shareRow['mountpoint'];
		$user = $shareRow['user'];
		if ($shareRow['accepted']) {
			$path = \trim($mountpoint, '/');
		} else {
			$path = \trim($shareRow['name'], '/');
		}
		$notification = $this->createNotification($user);
		$notification->setObject('remote_share', (int) $shareRow['id']);
		$this->notificationManager->markProcessed($notification);
		$this->publishActivity(
			$user,
			Activity::SUBJECT_REMOTE_SHARE_UNSHARED,
			[$owner, $path],
			'files',
			'',
			'',
			''
		);
	}

	/**
	 * @param IShare $share
	 *
	 * @return void
	 */
	public function revoke(IShare $share) {
		$this->federatedShareProvider->removeShareFromTable($share);
	}

	/**
	 * Update permissions
	 *
	 * @param IShare $share
	 * @param int $permissions
	 *
	 * @return void
	 */
	public function updatePermissions(IShare $share, $permissions) {
		$share->setPermissions($permissions);
		$this->federatedShareProvider->update($share);
	}

	/**
	 * @param IShare $share
	 * @param callable $callback
	 *
	 * @throws \OCP\Share\Exceptions\ShareNotFound
	 * @throws \OC\HintException
	 */
	protected function notifyRemote($share, $callback) {
		if ($share->getShareOwner() !== $share->getSharedBy()) {
			list(, $remote) = $this->addressHandler->splitUserRemote(
				$share->getSharedBy()
			);
			$remoteId = $this->federatedShareProvider->getRemoteId($share);
			$callback($remote, $remoteId, $share->getToken());
		}
	}

	/**
	 * Publish a new activity
	 *
	 * @param string $affectedUser
	 * @param string $subject
	 * @param array $subjectParams
	 * @param string $objectType
	 * @param int $objectId
	 * @param string $objectName
	 * @param string $link
	 *
	 * @return void
	 */
	protected function publishActivity($affectedUser,
									   $subject,
									   $subjectParams,
									   $objectType,
									   $objectId,
									   $objectName,
									   $link
	) {
		$event = $this->activityManager->generateEvent();
		$event->setApp(Activity::FILES_SHARING_APP)
			->setType(Activity::TYPE_REMOTE_SHARE)
			->setAffectedUser($affectedUser)
			->setSubject($subject, $subjectParams)
			->setObject($objectType, $objectId, $objectName)
			->setLink($link);
		$this->activityManager->publish($event);
	}

	/**
	 * Get a new notification
	 *
	 * @param string $uid
	 *
	 * @return \OCP\Notification\INotification
	 */
	protected function createNotification($uid) {
		$notification = $this->notificationManager->createNotification();
		$notification->setApp('files_sharing');
		$notification->setUser($uid);
		return $notification;
	}

	/**
	 * @param int $shareId
	 * @return string
	 */
	protected function getActionLink($shareId) {
		$urlGenerator = \OC::$server->getURLGenerator();
		$link = $urlGenerator->getAbsoluteURL(
			$urlGenerator->linkTo('', self::ACTION_URL . $shareId)
		);
		return $link;
	}

	/**
	 * Get file
	 *
	 * @param string $user
	 * @param int $fileSource
	 *
	 * @return array with internal path of the file and a absolute link to it
	 */
	protected function getFile($user, $fileSource) {
		\OC_Util::setupFS($user);

		try {
			$file = \OC\Files\Filesystem::getPath($fileSource);
		} catch (NotFoundException $e) {
			$file = null;
		}
		// FIXME:  use permalink here, see ViewController for reference
		$args = \OC\Files\Filesystem::is_dir($file)
			? ['dir' => $file]
			: ['dir' => \dirname($file), 'scrollto' => $file];
		$link = \OCP\Util::linkToAbsolute('files', 'index.php', $args);

		return [$file, $link];
	}

	/**
	 * Check if we are the initiator or the owner of a re-share
	 * and return the correct UID
	 *
	 * @param IShare $share
	 *
	 * @return string
	 */
	protected function getCorrectUid(IShare $share) {
		if ($this->userManager->userExists($share->getShareOwner())) {
			return $share->getShareOwner();
		}

		return $share->getSharedBy();
	}
}
