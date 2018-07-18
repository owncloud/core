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
use OCP\Activity\IManager;
use OCP\Files\NotFoundException;
use OCP\ILogger;
use OCP\IUserManager;
use OCP\Share\IShare;

/**
 * Class FedShareManager holds the share logic
 *
 * @package OCA\FederatedFileSharing
 */
class FedShareManager {
	/**
	 * @var FederatedShareProvider
	 */
	private $federatedShareProvider;

	/**
	 * @var IUserManager
	 */
	private $userManager;

	/**
	 * @var IManager
	 */
	private $activityManager;

	/**
	 * @var ILogger
	 */
	private $logger;

	/**
	 * FedShareManager constructor.
	 *
	 * @param FederatedShareProvider $federatedShareProvider
	 * @param IUserManager $userManager
	 * @param IManager $activityManager
	 * @param ILogger $logger
	 */
	public function __construct(FederatedShareProvider $federatedShareProvider,
								IUserManager $userManager,
								IManager $activityManager,
								ILogger $logger) {
		$this->federatedShareProvider = $federatedShareProvider;
		$this->userManager = $userManager;
		$this->activityManager = $activityManager;
		$this->logger = $logger;
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
