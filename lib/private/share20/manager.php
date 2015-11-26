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
use OCP\ILogger;
use OCP\Security\ISecureRandom;
use OCP\Security\IHasher;

use OC\Share20\Exception\ShareNotFound;

/**
 * This class is the communication hub for all sharing related operations.
 */
class Manager {

	/**
	 * @var IShareProvider[]
	 */
	private $defaultProvider;

	/** @var ILogger */
	private $logger;

	/** @var IConfig */
	private $config;

	/** @var ISecureRandom */
	private $secureRandom;

	/** @var IHasher */
	private $hasher;

	/**
	 * Manager constructor.
	 *
	 * @param ILogger $logger
	 * @param IConfig $config
	 * @param IShareProvider $defaultProvider
	 * @param ISecureRandom $secureRandom
	 * @param IHasher $hasher
	 */
	public function __construct(
			ILogger $logger,
			IConfig $config,
			IShareProvider $defaultProvider,
			ISecureRandom $secureRandom,
			IHasher $hasher
	) {
		$this->logger = $logger;
		$this->config = $config;
		$this->secureRandom = $secureRandom;
		$this->hasher = $hasher;

		// TEMP SOLUTION JUST TO GET STARTED
		$this->defaultProvider = $defaultProvider;
	}

	/**
	 * Share a path
	 *
	 * @param IShare $share
	 * @return Share The share object
	 * @throws \Exception
	 */
	public function createShare(IShare $share) {
		//Verify share type
		if ($share->getShareType() === \OCP\Share::SHARE_TYPE_USER) {
			// We expect a valid user as sharedWith for user shares
			if (!($share->getSharedWith() instanceof \OCP\IUser)) {
				throw new \InvalidArgumentException('SharedWith should be an IUser');
			}
		} else if ($share->getShareType() === \OCP\Share::SHARE_TYPE_GROUP) {
			// We expect a valid group as sharedWith for group shares
			if (!($share->getSharedWith() instanceof \OCP\IGroup)) {
				throw new \InvalidArgumentException('SharedWith should be an IGroup');
			}
		} else if ($share->getShareType() === \OCP\Share::SHARE_TYPE_LINK) {

			// Are link shares allowed?
			if (!$this->shareApiAllowLinks()) {
				throw new \Exception('Link sharing not allowed');
			}

			$share->setSharedWith(null);

			/*
			 * For now ignore a set token.
			 */
			$share->setToken(
				$this->secureRandom->getMediumStrengthGenerator()->generate(
					\OC\Share\Constants::TOKEN_LENGTH,
					\OCP\Security\ISecureRandom::CHAR_LOWER.
					\OCP\Security\ISecureRandom::CHAR_UPPER.
					\OCP\Security\ISecureRandom::CHAR_DIGITS
				)
			);

			// Verify expiredate if set
			if ($share->getExpirationDate() !== null) {
				//Make sure the expiration date is a date
				$date = $share->getExpirationDate();
				$date->setTime(0,0,0);
				$share->setExpirationDate($date);

				$date = new \DateTime();
				$date->setTime(0,0,0);
				if ($date >= $share->getExpirationDate()) {
					throw new \InvalidArgumentException('Expiration date is in the past');
				}

				// If we enforce the expiration date check that is does not exceed
				if ($this->shareApiLinkDefaultExpireDateEnforced()) {
					$date->add(new \DateInterval('P' . $this->shareApiLinkDefaultExpireDays() . 'D'));
					if ($date < $share->getExpirationDate()) {
						throw new \InvalidArgumentException('Cannot set expiration date more than ' . $this->shareApiLinkDefaultExpireDays() . ' in the future');
					}
				}
			}

			// If expiredate is empty set a default one if there is a default
			if ($share->getExpirationDate() === null && $this->shareApiLinkDefaultExpireDate()) {
				$date = new \DateTime();
				$date->setTime(0,0,0);
				$date->add(new \DateInterval('P'.$this->shareApiLinkDefaultExpireDays().'D'));
				$share->setExpirationDate($date);
			}

			// Check if we use passwords if required
			if ($share->getPassword() === null && $this->shareApiLinkEnforcePassword()) {
				throw new \InvalidArgumentException('Passwords are enforced for link shares');
			}

			// If a password is set. Hash it!
			if ($share->getPassword() !== null) {
				$share->setPassword($this->hasher->hash($share->getPassword()));
			}
		} else {
			// We do not handle other types yet
			throw new \InvalidArgumentException('unkown share type');
		}

		// Verify the initiator of the share is et
		if ($share->getSharedBy() === null) {
			throw new \InvalidArgumentException('SharedBy should be set');
		}

		// The path should be set
		if ($share->getPath() === null) {
			throw new \InvalidArgumentException('Path should be set');
		}
		// And it should be a file or a folder
		if (!($share->getPath() instanceof \OCP\Files\File) &&
		    !($share->getPath() instanceof \OCP\Files\Folder)) {
			throw new \InvalidArgumentException('Path should be either a file or a folder');
		}

		// On creation of a share the owner is always the owner of the path
		$share->setShareOwner($share->getPath()->getOwner());

		// Check if we actually have share permissions
		if (!$share->getPath()->isShareable()) {
			throw new \Exception('Path is not shareable');
		}

		// Permissions should be set
		if ($share->getPermissions() === null) {
			throw new \InvalidArgumentException('A share requires permissions');
		}

		// Check that we do not share with more permissions than we have
		if ($share->getPermissions() & ~$share->getPath()->getPermissions()) {
			throw new \Exception('Cannot increase permissions');
		}

		//TODO handle link share permissions or check them

		$share = $this->defaultProvider->create($share);
		return $share;
	}

	/**
	 * Update a share
	 *
	 * @param Share $share
	 * @return Share The share object
	 */
	public function updateShare(Share $share) {
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
	}

	/**
	 * Retrieve a share by the share id
	 *
	 * @param string $id
	 * @return Share
	 *
	 * @throws ShareNotFound
	 */
	public function getShareById($id) {
		if ($id === null) {
			throw new ShareNotFound();
		}

		$share = $this->defaultProvider->getShareById($id);

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
	 *`
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
