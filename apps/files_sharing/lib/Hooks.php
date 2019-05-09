<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
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

use OC\Files\Filesystem;
use OCP\IURLGenerator;
use OCP\Files\IRootFolder;
use OCP\IUserSession;
use Symfony\Component\EventDispatcher\EventDispatcher;
use OCP\Share\IShare;
use Symfony\Component\EventDispatcher\GenericEvent;
use OCA\Files_Sharing\Service\NotificationPublisher;
use OCP\Activity\IManager as ActivityManager;

class Hooks {
	/**
	 * @var IURLGenerator
	 */
	private $urlGenerator;

	/**
	 * @var IRootFolder
	 */
	private $rootFolder;

	/**
	 * @var IUserSession|null
	 */
	private $userSession;

	/**
	 * @var EventDispatcher
	 */
	private $eventDispatcher;

	/**
	 * @var \OCP\Share\IManager
	 */
	private $shareManager;

	/**
	 * @var NotificationPublisher
	 */
	private $notificationPublisher;

	/**
	 * @var ActivityManager
	 */
	private $activityManager;

	/**
	 * Hooks constructor.
	 *
	 * @param IRootFolder $rootFolder
	 * @param IURLGenerator $urlGenerator
	 * @param EventDispatcher $eventDispatcher
	 * @param \OCP\Share\IManager $shareManager
	 * @param NotificationPublisher $notificationPublisher
	 * @param ActivityManager $activityManager
	 * @param IUserSession|null $userSession
	 */
	public function __construct(
		IRootFolder $rootFolder,
		IUrlGenerator $urlGenerator,
		EventDispatcher $eventDispatcher,
		\OCP\Share\IManager $shareManager,
		NotificationPublisher $notificationPublisher,
		ActivityManager $activityManager,
		$userSession
	) {
		$this->userSession = $userSession;
		$this->rootFolder = $rootFolder;
		$this->urlGenerator = $urlGenerator;
		$this->eventDispatcher = $eventDispatcher;
		$this->shareManager = $shareManager;
		$this->notificationPublisher = $notificationPublisher;
		$this->activityManager = $activityManager;
	}

	public static function deleteUser($params) {
		$manager = new External\Manager(
			\OC::$server->getDatabaseConnection(),
			\OC\Files\Filesystem::getMountManager(),
			\OC\Files\Filesystem::getLoader(),
			\OC::$server->getNotificationManager(),
			\OC::$server->getEventDispatcher(),
			$params['uid']);

		$manager->removeUserShares($params['uid']);
	}

	public static function unshareChildren($params) {
		$path = Filesystem::getView()->getAbsolutePath($params['path']);
		$view = new \OC\Files\View('/');

		// find share mount points within $path and unmount them
		$mountManager = \OC\Files\Filesystem::getMountManager();
		$mountedShares = $mountManager->findIn($path);
		foreach ($mountedShares as $mount) {
			if ($mount->getStorage()->instanceOfStorage('OCA\Files_Sharing\ISharedStorage')) {
				$mountPoint = $mount->getMountPoint();
				$view->unlink($mountPoint);
			}
		}
	}

	public function registerListeners() {
		$this->eventDispatcher->addListener(
			'files.resolvePrivateLink',
			function (GenericEvent $event) {
				$uid = $event->getArgument('uid');
				$fileId = $event->getArgument('fileid');

				$link = $this->resolvePrivateLink($uid, $fileId);

				if ($link !== null) {
					$event->setArgument('resolvedWebLink', $link);
				}
			}
		);

		$this->eventDispatcher->addListener(
			'share.afterCreate',
			function (GenericEvent $event) {
				$shareObject = $event->getArgument('shareObject');
				$this->notificationPublisher->sendNotification($shareObject);
			}
		);

		$this->eventDispatcher->addListener(
			'share.afterDelete',
			function (GenericEvent $event) {
				$shareObject = $event->getArgument('shareObject');
				$this->notificationPublisher->discardNotification($shareObject);
			}
		);

		$this->eventDispatcher->addListener(
			'file.beforeGetDirect',
			function (GenericEvent $event) {
				$pathsToCheck[] = $event->getArgument('path');

				// Check only for user/group shares. Don't restrict e.g. share links
				if ($uid = $this->getCurrentUserUid()) {
					$viewOnlyHandler = new ViewOnly(
						$this->rootFolder->getUserFolder($uid)
					);
					if (!$viewOnlyHandler->check($pathsToCheck)) {
						$event->setArgument('errorMessage', 'Access to this resource or one of its sub-items has been denied.');
					}
				}
			}
		);

		$this->eventDispatcher->addListener(
			'file.beforeCreateZip',
			function (GenericEvent $event) {
				$dir = $event->getArgument('dir');
				$files = $event->getArgument('files');

				$pathsToCheck = [];
				if (\is_array($files)) {
					foreach ($files as $file) {
						$pathsToCheck[] = $dir . '/' . $file;
					}
				} elseif (\is_string($files)) {
					$pathsToCheck[] = $dir . '/' . $files;
				}

				// Check only for user/group shares. Don't restrict e.g. share links
				$uid = $this->getCurrentUserUid();
				if ($uid !== null) {
					$viewOnlyHandler = new ViewOnly(
						$this->rootFolder->getUserFolder($uid)
					);
					if (!$viewOnlyHandler->check($pathsToCheck)) {
						$event->setArgument('errorMessage', 'Access to this resource or one of its sub-items has been denied.');
						$event->setArgument('run', false);
					} else {
						$event->setArgument('run', true);
					}
				} else {
					$event->setArgument('run', true);
				}
			}
		);

		$this->eventDispatcher->addListener(
			'fromself.unshare',
			function (GenericEvent $event) {
				$activityEvent = $this->activityManager->generateEvent();
				$activityEvent->setApp(Activity::FILES_SHARING_APP)
					->setType(Activity::TYPE_SHARED)
					->setAffectedUser($event->getArgument('shareRecipient'))
					->setSubject(
						Activity::SUBJECT_UNSHARED_FROM_SELF,
						[$event->getArgument('recipientPath'), $event->getArgument('shareOwner')]
					);
				$this->activityManager->publish($activityEvent);
			}
		);
	}

	private function getCurrentUserUid() {
		// User session can be null when installing oc and Hook is triggered, or
		// user is not logged in
		if ($this->userSession && $this->userSession->isLoggedIn()) {
			return $this->userSession->getUser()->getUID();
		}
		return null;
	}

	private function filterSharesByFileId($shares, $fileId) {
		return \array_filter($shares, function (IShare $share) use ($fileId) {
			return \strval($share->getNodeId()) === \strval($fileId);
		});
	}

	/**
	 * Resolves web URL that points to the "shared with you" view of the given file
	 *
	 * @param string $uid user id
	 * @param string $fileId file id
	 * @return string|null view URL or null if the file is not found or not accessible
	 */
	private function resolvePrivateLink($uid, $fileId) {
		// this is only here to verify that there is indeed such share
		$shares = $this->filterSharesByFileId($this->shareManager->getSharedWith($uid, \OCP\Share::SHARE_TYPE_USER), $fileId);
		if (empty($shares)) {
			$shares = $this->filterSharesByFileId($this->shareManager->getSharedWith($uid, \OCP\Share::SHARE_TYPE_GROUP), $fileId);
		}

		// if share exists, redirect to view
		if (!empty($shares)) {
			$params['view'] = 'sharingin';
			// scroll to the entry
			$params['scrollto'] = $fileId;
			return $this->urlGenerator->linkToRoute('files.view.index', $params);
		}

		return null;
	}
}
