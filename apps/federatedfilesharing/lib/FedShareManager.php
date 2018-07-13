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
use OCP\IDBConnection;
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
	 * @var IDBConnection
	 */
	private $connection;

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
	 * @var EventDispatcherInterface
	 */
	private $eventDispatcher;

	/**
	 * @var string
	 */
	private $shareTable = 'share';

	/**
	 * FedShareManager constructor.
	 *
	 * @param FederatedShareProvider $federatedShareProvider
	 * @param IDBConnection $connection
	 * @param IUserManager $userManager
	 * @param ActivityManager $activityManager
	 * @param NotificationManager $notificationManager
	 * @param EventDispatcherInterface $eventDispatcher
	 */
	public function __construct(FederatedShareProvider $federatedShareProvider,
								IDBConnection $connection,
								IUserManager $userManager,
								ActivityManager $activityManager,
								NotificationManager $notificationManager,
								EventDispatcherInterface $eventDispatcher) {
		$this->federatedShareProvider = $federatedShareProvider;
		$this->connection = $connection;
		$this->userManager = $userManager;
		$this->activityManager = $activityManager;
		$this->notificationManager = $notificationManager;
		$this->eventDispatcher = $eventDispatcher;
	}

	public function createShare($shareWith,
								$remote,
								$remoteId,
								$owner,
								$name,
								$ownerFederatedId,
								$sharedByFederatedId,
								$sharedBy,
								$token
	) {
		\OC_Util::setupFS($shareWith);

		$externalManager = new \OCA\Files_Sharing\External\Manager(
			\OC::$server->getDatabaseConnection(),
			\OC\Files\Filesystem::getMountManager(),
			\OC\Files\Filesystem::getLoader(),
			\OC::$server->getNotificationManager(),
			\OC::$server->getEventDispatcher(),
			$shareWith
		);

		$externalManager->addShare(
			$remote,
			$token,
			'',
			$name,
			$owner,
			false,
			$shareWith,
			$remoteId
		);
		$shareId = $this->connection
			->lastInsertId('*PREFIX*share_external');
		if ($ownerFederatedId === null) {
			$ownerFederatedId = $owner . '@' . $this->cleanupRemote($remote);
		}
		// if the owner of the share and the initiator are the same user
		// we also complete the federated share ID for the initiator
		if ($sharedByFederatedId === null && $owner === $sharedBy) {
			$sharedByFederatedId = $ownerFederatedId;
		}

		$this->eventDispatcher->dispatch(
			'\OCA\FederatedFileSharing::remote_shareReceived',
			new GenericEvent(
				null,
				[
					'name' => $name,
					'targetuser' => $sharedByFederatedId,
					'owner' => $owner,
					'sharewith' => $shareWith,
					'sharedby' => $sharedBy,
					'remoteid' => $remoteId
				]
			)
		);
		$this->publishActivity(
			$shareWith,
			Activity::SUBJECT_REMOTE_SHARE_RECEIVED,
			[$ownerFederatedId, \trim($name, '/')],
			'files',
			'',
			'',
			''
		);

		$link = $this->getActionLink($shareId);
		$params = [$ownerFederatedId, $sharedByFederatedId, \trim($name, '/')];

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
	 * @param $remoteId
	 * @param $shareWith
	 * @param $permissions
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

		return $share;
	}

	/**
	 * Unshare an item
	 *
	 * @param array $shareRow
	 *
	 * @return void
	 */
	public function unshare($shareRow) {
		$remote = $this->cleanupRemote($shareRow['remote']);
		$owner = $shareRow['owner'] . '@' . $remote;
		$mountpoint = $shareRow['mountpoint'];
		$user = $shareRow['user'];

		$query = $this->connection->getQueryBuilder();
		$query->delete('share_external')
			->where(
				$query->expr()->eq(
					'remote_id',
					$query->createNamedParameter($shareRow['remote_id'])
				)
			)
			->andWhere(
				$query->expr()->eq(
					'share_token',
					$query->createNamedParameter($shareRow['share_token'])
				)
			);
		$shareRow = $query->execute();

		if ($shareRow['accepted']) {
			$path = \trim($mountpoint, '/');
		} else {
			$path = \trim($shareRow['name'], '/');
		}

		$notification = $this->createNotification($shareRow['user']);
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
	 * Accept an incoming share and create an activity
	 *
	 * @param IShare $share
	 *
	 * @return void
	 *
	 * @throws \OCP\Files\InvalidPathException
	 * @throws \OCP\Files\NotFoundException
	 */
	public function acceptShare(IShare $share) {
		$uid = $this->getCorrectUid($share);
		list($file, $link) = $this->getFile(
			$uid,
			$share->getNode()->getId()
		);
		$this->publishActivity(
			$uid,
			Activity::SUBJECT_REMOTE_SHARE_ACCEPTED,
			[$share->getSharedWith(), \basename($file)],
			'files',
			$share->getNode()->getId(),
			$file,
			$link
		);
	}

	/**
	 * Delete declined share and create an activity
	 *
	 * @param IShare $share
	 *
	 * @return void
	 *
	 * @throws \OCP\Files\InvalidPathException
	 * @throws \OCP\Files\NotFoundException
	 */
	public function declineShare(IShare $share) {
		$uid = $this->getCorrectUid($share);
		$this->federatedShareProvider->removeShareFromTable($share);
		list($file, $link) = $this->getFile(
			$uid,
			$share->getNode()->getId()
		);
		$this->publishActivity(
			$uid,
			Activity::SUBJECT_REMOTE_SHARE_DECLINED,
			[$share->getSharedWith(), \basename($file)],
			'files',
			$share->getNode()->getId(),
			$file,
			$link
		);
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
		$query = $this->connection->getQueryBuilder();
		$query->update($this->shareTable)
			->where(
				$query->expr()->eq(
					'id',
					$query->createNamedParameter($share->getId())
				)
			)
			->set('permissions', $query->createNamedParameter($permissions))
			->execute();
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
		$notification->setApp('files_sharing')
			->setUser($uid);
		return $notification;
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
	 * Get file as a path and link for web UI
	 *
	 * @param string $user
	 * @param int $fileId
	 *
	 * @return array with internal path of the file and a absolute link to it
	 */
	protected function getFile($user, $fileId) {
		\OC_Util::setupFS($user);

		try {
			$file = \OC\Files\Filesystem::getPath($fileId);
		} catch (NotFoundException $e) {
			$file = null;
		}
		$args = \OC\Files\Filesystem::is_dir($file)
			? ['dir' => $file]
			: ['dir' => \dirname($file), 'scrollto' => $file];
		$link = \OCP\Util::linkToAbsolute('files', 'index.php', $args);

		return [$file, $link];
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

	/**
	 * Strip a protocol from the remote URL
	 *
	 * @param string $remote
	 *
	 * @return string
	 */
	protected function cleanupRemote($remote) {
		$remote = \substr($remote, \strpos($remote, '://') + 3);

		return \rtrim($remote, '/');
	}
}
