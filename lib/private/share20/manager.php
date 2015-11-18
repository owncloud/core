<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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
namespace OC\Share20;


use OCP\IConfig;
use OCP\IUserManager;
use OCP\IGroupManager;
use OCP\IUser;
use OCP\ILogger;
use OCP\Files\Folder;
use OCP\Security\IHasher;
use OCP\Security\ISecureRandom;

use OC\Share20\Exception\ShareNotFound;

/**
 * This class is the communication hub for all sharing related operations.
 */
class Manager {

	/**
	 * @var IShareProvider[]
	 */
	private $defaultProvider;

	/** @var IUser */
	private $currentUser;

	/** @var IUserManager */
	private $userManager;

	/** @var IGroupManager */
	private $groupManager;

	/** @var ILogger */
	private $logger;

	/** @var IConfig */
	private $config;

	/** @var Folder */
	private $userFolder;

	/** @var IHasher */
	private $hasher;

	/** @var ISecureRandom */
	private $secureRandom;

	public function __construct(IUser $user,
								IUserManager $userManager,
								IGroupManager $groupManager,
								ILogger $logger,
								IConfig $config,
								Folder $userFolder,
								IShareProvider $defaultProvider,
								IHasher $hasher,
								ISecureRandom $secureRandom) {
		$this->currentUser = $user;
		$this->userManager = $userManager;
		$this->groupManager = $groupManager;
		$this->logger = $logger;
		$this->config = $config;
		$this->userFolder = $userFolder;
		$this->hasher = $hasher;
		$this->secureRandom = $secureRandom;

		// TEMP SOLUTION JUST TO GET STARTED
		$this->defaultProvider = $defaultProvider;
	}

	/**
	 * Create a share
	 * 
	 * @param IShare $share
	 * @return IShare The share object
	 *
	 * @throws \Exception
	 */
	public function createShare(IShare $share) {
		$path = $share->getPath();

		// Only accept file/folder
		if ($path === null ||
			(!($path instanceOf \OCP\Files\Folder) &&
			 !($path instanceOf \OCP\Files\File))) {
			//TODO PROPER EXCEPTION
			throw new \Exception();
		}

		// Can we share?
		if (!$path->isShareable()) {
			//TODO PROPER EXCEPTION
			throw new \Exception();
		}

		// Try to share with more permissions
		if (($share->getPermissions() & ~$path->getPermissions()) > 0) {
			//TODO PRoper EXCEPTION
			throw new \Exception();
		}

		if ($share->getShareType() === \OCP\Share::SHARE_TYPE_LINK) {
			return $this->createLinkShare($share);
		}

		throw new \Exception();
	}

	/**
	 * Update a share
	 *
	 * @param Share $share
	 * @return Share The share object
	 */
	public function updateShare(Share $share) {
		throw new \Exception();
	}

	/**
	 * Delete all the children of this share
	 *
	 * @param IShare $share
	 * @return IShare[] List of deleted shares
	 */
	protected function deleteChildren(IShare $share) {
		$deletedShares = [];
		foreach($this->defaultProvider->getChildren($share) as $child) {
			$deletedChildren = $this->deleteChildren($child);
			$deletedShares = array_merge($deletedShares, $deletedChildren);

			$this->defaultProvider->delete($child);
			$deletedShares[] = $child;
		}

		return $deletedShares;
	}

	/**
	 * Delete a share
	 *
	 * @param IShare $share
	 * @throws ShareNotFound
	 * @throws \OC\Share20\Exception\BackendError
	 */
	public function deleteShare(IShare $share) {
		// Just to make sure we have all the info
		$share = $this->getShareById($share->getId());

		$formatHookParams = function(IShare $share) {
			// Prepare hook
			$shareType = $share->getShareType();
			$sharedWith = '';
			if ($shareType === \OCP\Share::SHARE_TYPE_USER) {
				$sharedWith = $share->getSharedWith()->getUID();
			} else if ($shareType === \OCP\Share::SHARE_TYPE_GROUP) {
				$sharedWith = $share->getSharedWith()->getGID();
			} else if ($shareType === \OCP\Share::SHARE_TYPE_REMOTE) {
				$sharedWith = $share->getSharedWith();
			}

			$hookParams = [
				'id'         => $share->getId(),
				'itemType'   => $share->getPath() instanceof \OCP\Files\File ? 'file' : 'folder',
				'itemSource' => $share->getPath()->getId(),
				'shareType'  => $shareType,
				'shareWith'  => $sharedWith,
				'itemparent' => $share->getParent(),
				'uidOwner'   => $share->getSharedBy()->getUID(),
				'fileSource' => $share->getPath()->getId(),
				'fileTarget' => $share->getTarget()
			];
			return $hookParams;
		};

		$hookParams = $formatHookParams($share);

		// Emit pre-hook
		\OC_Hook::emit('OCP\Share', 'pre_unshare', $hookParams);

		// Get all children and delete them as well
		$deletedShares = $this->deleteChildren($share);

		// Do the actual delete
		$this->defaultProvider->delete($share);

		// All the deleted shares caused by this delete
		$deletedShares[] = $share;

		//Format hook info
		$formattedDeletedShares = array_map(function($share) use ($formatHookParams) {
			return $formatHookParams($share);
		}, $deletedShares);

		$hookParams['deletedShares'] = $formattedDeletedShares;

		// Emit post hook
		\OC_Hook::emit('OCP\Share', 'post_unshare', $hookParams);
	}

	/**
	 * Retrieve all shares by the current user
	 *
	 * @param int $page
	 * @param int $perPage
	 * @return Share[]
	 */
	public function getShares($page=0, $perPage=50) {
		throw new \Exception();
	}

	/**
	 * Retrieve a share by the share id
	 *
	 * @param string $id
	 * @return IShare
	 *
	 * @throws ShareNotFound
	 */
	public function getShareById($id) {
		if ($id === null) {
			throw new ShareNotFound();
		}

		$share = $this->defaultProvider->getShareById($id);

		if ($share->getSharedWith() !== $this->currentUser &&
		    $share->getSharedBy()   !== $this->currentUser &&
			$share->getShareOwner() !== $this->currentUser) {
			throw new ShareNotFound();
		}

		return $share;
	}

	/**
	 * Get all the shares for a given path
	 *
	 * @param \OCP\Files\Node $path
	 * @param int $page
	 * @param int $perPage
	 *
	 * @return Share[]
	 */
	public function getSharesByPath(\OCP\Files\Node $path, $page=0, $perPage=50) {
		throw new \Exception();
	}

	/**
	 * Get all shares that are shared with the current user
	 *
	 * @param int $shareType
	 * @param int $page
	 * @param int $perPage
	 *
	 * @return Share[]
	 */
	public function getSharedWithMe($shareType = null, $page=0, $perPage=50) {
		throw new \Exception();
	}

	/**
	 * Get the share by token possible with password
	 *
	 * @param string $token
	 * @param string $password
	 *
	 * @return Share
	 *
	 * @throws ShareNotFound
	 */
	public function getShareByToken($token, $password=null) {
		return $this->defaultProvider->getShareByToken($token, $password);
	}

	/**
	 * Get access list to a path. This means
	 * all the users and groups that can access a given path.
	 *
	 * Consider:
	 * -root
	 * |-folder1
	 *  |-folder2
	 *   |-fileA
	 *
	 * fileA is shared with user1
	 * folder2 is shared with group2
	 * folder1 is shared with user2
	 *
	 * Then the access list will to '/folder1/folder2/fileA' is:
	 * [
	 * 	'users' => ['user1', 'user2'],
	 *  'groups' => ['group2']
	 * ]
	 *
	 * This is required for encryption
	 *
	 * @param \OCP\Files\Node $path
	 */
	public function getAccessList(\OCP\Files\Node $path) {
		throw new \Exception();
	}

	/**
	 * Creates a new share
	 *
	 * @return IShare
	 */
	public function newShare() {
		return new Share();
	}

	/**
	 * Share a path
	 * 
	 * @param IShare $share
	 * @return IShare The share object
	 */
	private function createLinkShare(IShare $share) {
		// Is public link sharing allowed?
		if (!$this->shareApiAllowLinks()) {
			//TODO proper exception
			throw new \Exception('Public link sharing disabled');
		}

		// Validate expiration date
		if ($share->getExpirationDate() !== null) {
			$date = new \DateTime();
			$date->setTime(0,0,0);

			if ($share->getExpirationDate() < $date) {
				//TODO proper exception
				throw new \Exception('Date in past');
			}

			if ($this->shareApiLinkDefaultExpireDateEnforced()) {
				$days = $this->shareApiLinkDefaultExpireDays();
				$date->add(new \DateInterval('P' . $days . 'D'));

				if ($date < $share->getExpirationDate()) {
					$share->setExpirationDate($date);
				}		
			}
		} else if ($this->shareApiLinkDefaultExpireDate()) {
			$date = new \DateTime();
			$date->setTime(0,0,0);
			$days = $this->shareApiLinkDefaultExpireDays();
			$date->add(new \DateInterval('P' . $days . 'D'));

			$share->setExpirationDate($date);
		}

		// Validate Password
		if ($share->getPassword() !== null) {
			$password = $this->hasher->hash($share->getPassword());
			$share->setPassword($password);
		} else if ($this->shareApiLinkEnforcePassword()) {
			//TODO proper exception
			throw new \Exception('Password is enforced for public links');
		}

		// Validate Permissions
		if (!$this->shareApiLinkAllowPublicUpload()) {
			// No public upload so only read permissions are allowed
			if ($share->getPermissions() & ~(\OCP\Constants::PERMISSION_READ)) {
				//TODO proper exception
				throw new \Exception('Share must be read only');
			}
		} else {
			// Public upload is allowed so only READ, CREATE, UPDATE permissions are allowed
			if ($share->getPermissions() & ~(\OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE | \OCP\Constants::PERMISSION_UPDATE)) {
				//TODO proper exception
				throw new \Exception('Invalid permissions for link share');
			}
		}

		/*
		 * We need to find a unique token
		 */
		$token = '';
		while(true) {
			$token = $this->secureRandom->getMediumStrengthGenerator()->generate(
				\OCP\Share::TOKEN_LENGTH,
				\OCP\Security\ISecureRandom::CHAR_LOWER.
				\OCP\Security\ISecureRandom::CHAR_UPPER.
				\OCP\Security\ISecureRandom::CHAR_DIGITS
			);

			try {
				$this->getShareByToken($token);
			} catch (ShareNotFound $e) {
				break;
			}
		}

		$share->setToken($token);

		// Generate token
		$this->defaultProvider->create($share);
	}

	/**
	 * Is the share API enabled
	 *
	 * @return bool
	 */
	public function shareApiEnabled() {
		return $this->config->getAppValue('core', 'shareapi_enabled', 'yes') !== 'yes';
	}

	/**
	 * Is public link sharing enabled
	 *
	 * @return bool
	 */
	public function shareApiAllowLinks() {
		return $this->config->getAppValue('core', 'shareapi_allow_links', 'yes') === 'yes';
	}

	/**
	 * Is password on public link requires
	 *
	 * @return bool
	 */
	public function shareApiLinkEnforcePassword() {
		return $this->config->getAppValue('core', 'shareapi_enforce_links_password', 'no') === 'yes';
	}

	/**
	 * Is default expire date enabled
	 *
	 * @return bool
	 */
	public function shareApiLinkDefaultExpireDate() {
		return $this->config->getAppValue('core', 'shareapi_default_expire_date', 'no') === 'yes';
	}

	/**
	 * Is default expire date enforced
	 *
	 * @return bool
	 */
	public function shareApiLinkDefaultExpireDateEnforced() {
		return $this->config->getAppValue('core', 'shareapi_enforce_expire_date', 'no') === 'yes';
	}

	/**
	 * Number of default expire days
	 *
	 * @return int
	 */
	public function shareApiLinkDefaultExpireDays() {
		return (int)$this->config->getAppValue('core', 'shareapi_expire_after_n_days', '7');
	}

	/**
	 * Allow public upload on link shares
	 *
	 * @return bool
	 */
	public function shareApiLinkAllowPublicUpload() {
		return $this->config->getAppValue('core', 'shareapi_allow_public_upload', 'yes') === 'yes';
	}
}
