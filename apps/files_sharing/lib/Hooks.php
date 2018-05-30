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
use OCA\FederatedFileSharing\DiscoveryManager;
use OCP\IURLGenerator;
use OCP\Files\IRootFolder;
use Symfony\Component\EventDispatcher\EventDispatcher;
use OCP\Share\IShare;
use Symfony\Component\EventDispatcher\GenericEvent;
use OCA\Files_Sharing\Service\NotificationPublisher;
use OCP\Share\Exceptions\ShareNotFound;

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

	public function __construct(
		IRootFolder $rootFolder,
		IUrlGenerator $urlGenerator,
		EventDispatcher $eventDispatcher,
		\OCP\Share\IManager $shareManager,
		NotificationPublisher $notificationPublisher
	) {
		$this->rootFolder = $rootFolder;
		$this->urlGenerator = $urlGenerator;
		$this->eventDispatcher = $eventDispatcher;
		$this->shareManager = $shareManager;
		$this->notificationPublisher = $notificationPublisher;
	}

	public static function deleteUser($params) {
		$discoveryManager = new DiscoveryManager(
			\OC::$server->getMemCacheFactory(),
			\OC::$server->getHTTPClientService()
		);
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
