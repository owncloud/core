<?php
/**
 * @author Michael Jobst <mjobst+github@tecratech.de>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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
namespace OCA\Files_Sharing\API;

use OCP\Files\IRootFolder;
use OCP\Files\NotFoundException;
use OCP\IConfig;
use OCP\IGroupManager;
use OCP\IL10N;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IUserManager;
use OCP\Lock\ILockingProvider;
use OCP\Lock\LockedException;
use OCP\Share\Exceptions\GenericShareException;
use OCP\Share\Exceptions\ShareNotFound;
use OCP\Share\IManager;
use OCP\Share\IShare;
use OCA\Files_Sharing\Service\NotificationPublisher;
use OCA\Files_Sharing\Helper;
use OCA\Files_Sharing\SharingBlacklist;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class Share20OCS
 *
 * @package OCA\Files_Sharing\API
 */
class Share20OCS {

	/** @var IManager */
	private $shareManager;
	/** @var IGroupManager */
	private $groupManager;
	/** @var IUserManager */
	private $userManager;
	/** @var IRequest */
	private $request;
	/** @var IRootFolder */
	private $rootFolder;
	/** @var IURLGenerator */
	private $urlGenerator;
	/** @var IUser */
	private $currentUser;
	/** @var IL10N */
	private $l;
	/** @var IConfig */
	private $config;
	/** @var NotificationPublisher */
	private $notificationPublisher;
	/** @var EventDispatcher  */
	private $eventDispatcher;
	/** @var SharingBlacklist */
	private $sharingBlacklist;

	/**
	 * @var string
	 */
	private $additionalInfoField;

	/**
	 * Share20OCS constructor.
	 *
	 * @param IManager $shareManager
	 * @param IGroupManager $groupManager
	 * @param IUserManager $userManager
	 * @param IRequest $request
	 * @param IRootFolder $rootFolder
	 * @param IURLGenerator $urlGenerator
	 * @param IUser $currentUser
	 * @param IL10N $l10n
	 * @param IConfig $config
	 * @param NotificationPublisher $notificationPublisher
	 */
	public function __construct(
			IManager $shareManager,
			IGroupManager $groupManager,
			IUserManager $userManager,
			IRequest $request,
			IRootFolder $rootFolder,
			IURLGenerator $urlGenerator,
			IUser $currentUser,
			IL10N $l10n,
			IConfig $config,
			NotificationPublisher $notificationPublisher,
			EventDispatcher $eventDispatcher,
			SharingBlacklist $sharingBlacklist
	) {
		$this->shareManager = $shareManager;
		$this->userManager = $userManager;
		$this->groupManager = $groupManager;
		$this->request = $request;
		$this->rootFolder = $rootFolder;
		$this->urlGenerator = $urlGenerator;
		$this->currentUser = $currentUser;
		$this->l = $l10n;
		$this->config = $config;
		$this->notificationPublisher = $notificationPublisher;
		$this->eventDispatcher = $eventDispatcher;
		$this->sharingBlacklist = $sharingBlacklist;
		$this->additionalInfoField = $this->config->getAppValue('core', 'user_additional_info_field', '');
	}

	/**
	 * Returns the additional info to display behind the display name as configured.
	 *
	 * @param IUser $user user for which to retrieve the additional info
	 * @return string|null additional info or null if none to be displayed
	 */
	private function getAdditionalUserInfo(IUser $user) {
		if ($this->additionalInfoField === 'email') {
			return $user->getEMailAddress();
		} elseif ($this->additionalInfoField === 'id') {
			return $user->getUID();
		}
		return null;
	}

	/**
	 * Convert an IShare to an array for OCS output
	 *
	 * @param \OCP\Share\IShare $share
	 * @param bool $received whether it's formatting received shares
	 * @return array
	 * @throws NotFoundException In case the node can't be resolved.
	 */
	protected function formatShare(\OCP\Share\IShare $share, $received = false) {
		$sharedBy = $this->userManager->get($share->getSharedBy());
		$shareOwner = $this->userManager->get($share->getShareOwner());

		$result = [
			'id' => $share->getId(),
			'share_type' => $share->getShareType(),
			'uid_owner' => $share->getSharedBy(),
			'displayname_owner' => $sharedBy !== null ? $sharedBy->getDisplayName() : $share->getSharedBy(),
			'permissions' => $share->getPermissions(),
			'stime' => $share->getShareTime() ? $share->getShareTime()->getTimestamp() : null,
			'parent' => null,
			'expiration' => null,
			'token' => null,
			'uid_file_owner' => $share->getShareOwner(),
			'displayname_file_owner' => $shareOwner !== null ? $shareOwner->getDisplayName() : $share->getShareOwner()
		];

		if ($received) {
			// also add state
			$result['state'] = $share->getState();

			// can only fetch path info if mounted already or if owner
			if ($share->getState() === \OCP\Share::STATE_ACCEPTED || $share->getShareOwner() === $this->currentUser->getUID()) {
				$userFolder = $this->rootFolder->getUserFolder($this->currentUser->getUID());
			} else {
				// need to go through owner user for pending shares
				$userFolder = $this->rootFolder->getUserFolder($share->getShareOwner());
			}
		} else {
			$userFolder = $this->rootFolder->getUserFolder($this->currentUser->getUID());
		}

		$nodes = $userFolder->getById($share->getNodeId());

		if (empty($nodes)) {
			throw new NotFoundException();
		}

		$node = $nodes[0];

		$result['path'] = $userFolder->getRelativePath($node->getPath());
		if ($node instanceof \OCP\Files\Folder) {
			$result['item_type'] = 'folder';
		} else {
			$result['item_type'] = 'file';
		}
		$result['mimetype'] = $node->getMimeType();
		$result['storage_id'] = $node->getStorage()->getId();
		$result['storage'] = $node->getStorage()->getCache()->getNumericStorageId();
		$result['item_source'] = $node->getId();
		$result['file_source'] = $node->getId();
		$result['file_parent'] = $node->getParent()->getId();
		$result['file_target'] = $share->getTarget();

		if ($share->getShareType() === \OCP\Share::SHARE_TYPE_USER) {
			$sharedWith = $this->userManager->get($share->getSharedWith());
			$result['share_with'] = $share->getSharedWith();
			$result['share_with_displayname'] = $sharedWith !== null ? $sharedWith->getDisplayName() : $share->getSharedWith();
			if ($sharedWith !== null) {
				$result['share_with_additional_info'] = $this->getAdditionalUserInfo($sharedWith);
			}
		} elseif ($share->getShareType() === \OCP\Share::SHARE_TYPE_GROUP) {
			$group = $this->groupManager->get($share->getSharedWith());
			$result['share_with'] = $share->getSharedWith();
			$result['share_with_displayname'] = $group !== null ? $group->getDisplayName() : $share->getSharedWith();
		} elseif ($share->getShareType() === \OCP\Share::SHARE_TYPE_LINK) {
			$result['share_with'] = $share->getPassword();
			$result['share_with_displayname'] = $share->getPassword();
			$result['name'] = $share->getName();

			$result['token'] = $share->getToken();
			if ($share->getToken() !== null) {
				$result['url'] = $this->urlGenerator->linkToRouteAbsolute('files_sharing.sharecontroller.showShare', ['token' => $share->getToken()]);
			}

			$expiration = $share->getExpirationDate();
			if ($expiration !== null) {
				$result['expiration'] = $expiration->format('Y-m-d 00:00:00');
			}
		} elseif ($share->getShareType() === \OCP\Share::SHARE_TYPE_REMOTE) {
			$result['share_with'] = $share->getSharedWith();
			$result['share_with_displayname'] = $share->getSharedWith();
			$result['token'] = $share->getToken();
		}

		$result['mail_send'] = $share->getMailSend() ? 1 : 0;

		return $result;
	}

	/**
	 * Get a specific share by id
	 *
	 * @param string $id
	 * @return \OC\OCS\Result
	 */
	public function getShare($id) {
		if (!$this->shareManager->shareApiEnabled()) {
			return new \OC\OCS\Result(null, 404, $this->l->t('Share API is disabled'));
		}

		try {
			$share = $this->getShareById($id);
		} catch (ShareNotFound $e) {
			return new \OC\OCS\Result(null, 404, $this->l->t('Wrong share ID, share doesn\'t exist'));
		}

		if ($this->canAccessShare($share)) {
			try {
				$share = $this->formatShare($share);
				return new \OC\OCS\Result([$share]);
			} catch (NotFoundException $e) {
				//Fall trough
			}
		}

		return new \OC\OCS\Result(null, 404, $this->l->t('Wrong share ID, share doesn\'t exist'));
	}

	/**
	 * Delete a share
	 *
	 * @param string $id
	 * @return \OC\OCS\Result
	 */
	public function deleteShare($id) {
		if (!$this->shareManager->shareApiEnabled()) {
			return new \OC\OCS\Result(null, 404, $this->l->t('Share API is disabled'));
		}

		try {
			$share = $this->getShareById($id);
		} catch (ShareNotFound $e) {
			return new \OC\OCS\Result(null, 404, $this->l->t('Wrong share ID, share doesn\'t exist'));
		}

		try {
			$share->getNode()->lock(ILockingProvider::LOCK_SHARED);
		} catch (LockedException $e) {
			return new \OC\OCS\Result(null, 404, 'could not delete share');
		}

		if (!$this->canAccessShare($share)) {
			$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
			return new \OC\OCS\Result(null, 404, $this->l->t('Could not delete share'));
		}

		$this->shareManager->deleteShare($share);

		$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);

		return new \OC\OCS\Result();
	}

	/**
	 * @return \OC\OCS\Result
	 */
	public function createShare() {
		$share = $this->shareManager->newShare();

		if (!$this->shareManager->shareApiEnabled()) {
			return new \OC\OCS\Result(null, 404, $this->l->t('Share API is disabled'));
		}

		$name = $this->request->getParam('name', null);

		// Verify path
		$path = $this->request->getParam('path', null);
		if ($path === null) {
			return new \OC\OCS\Result(null, 404, $this->l->t('Please specify a file or folder path'));
		}

		$userFolder = $this->rootFolder->getUserFolder($this->currentUser->getUID());

		try {
			$path = $userFolder->get($path);
		} catch (NotFoundException $e) {
			return new \OC\OCS\Result(null, 404, $this->l->t('Wrong path, file/folder doesn\'t exist'));
		}

		$share->setNode($path);

		try {
			$share->getNode()->lock(ILockingProvider::LOCK_SHARED);
		} catch (LockedException $e) {
			return new \OC\OCS\Result(null, 404, 'Could not create share');
		}

		$shareType = (int)$this->request->getParam('shareType', '-1');

		// Parse permissions (if available)
		$permissions = $this->request->getParam('permissions', null);
		if ($permissions === null) {
			if ($shareType !== \OCP\Share::SHARE_TYPE_LINK) {
				$permissions = $this->config->getAppValue('core', 'shareapi_default_permissions', \OCP\Constants::PERMISSION_ALL);
				$permissions |= \OCP\Constants::PERMISSION_READ;
			} else {
				$permissions = \OCP\Constants::PERMISSION_ALL;
			}
		} else {
			$permissions = (int)$permissions;
		}

		if ($permissions < 0 || $permissions > \OCP\Constants::PERMISSION_ALL) {
			$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
			return new \OC\OCS\Result(null, 404, 'invalid permissions');
		}

		if ($permissions === 0) {
			return new \OC\OCS\Result(null, 400, $this->l->t('Cannot remove all permissions'));
		}

		// link shares can have create-only without read (anonymous upload)
		if ($shareType !== \OCP\Share::SHARE_TYPE_LINK && $permissions !== \OCP\Constants::PERMISSION_CREATE) {
			// Shares always require read permissions
			$permissions |= \OCP\Constants::PERMISSION_READ;
		}

		if ($path instanceof \OCP\Files\File) {
			// Single file shares should never have delete or create permissions
			$permissions &= ~\OCP\Constants::PERMISSION_DELETE;
			$permissions &= ~\OCP\Constants::PERMISSION_CREATE;
		}

		/*
		 * Hack for https://github.com/owncloud/core/issues/22587
		 * We check the permissions via webdav. But the permissions of the mount point
		 * do not equal the share permissions. Here we fix that for federated mounts.
		 */
		if ($path->getStorage()->instanceOfStorage('OCA\Files_Sharing\External\Storage')) {
			$permissions &= ~($permissions & ~$path->getPermissions());
		}

		$shareWith = $this->request->getParam('shareWith', null);

		$autoAccept = $this->config->getAppValue('core', 'shareapi_auto_accept_share', 'yes') === 'yes';
		if ($shareType === \OCP\Share::SHARE_TYPE_USER) {
			// Valid user is required to share
			if ($shareWith === null || !$this->userManager->userExists($shareWith)) {
				$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
				return new \OC\OCS\Result(null, 404, $this->l->t('Please specify a valid user'));
			}
			$share->setSharedWith($shareWith);
			$share->setPermissions($permissions);
			if ($autoAccept) {
				$share->setState(\OCP\Share::STATE_ACCEPTED);
			} else {
				$share->setState(\OCP\Share::STATE_PENDING);
			}
		} elseif ($shareType === \OCP\Share::SHARE_TYPE_GROUP) {
			if (!$this->shareManager->allowGroupSharing()) {
				$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
				return new \OC\OCS\Result(null, 404, $this->l->t('Group sharing is disabled by the administrator'));
			}

			// Valid group is required to share
			if ($shareWith === null || !$this->groupManager->groupExists($shareWith)) {
				$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
				return new \OC\OCS\Result(null, 404, $this->l->t('Please specify a valid group'));
			}
			if ($this->sharingBlacklist->isGroupBlacklisted($this->groupManager->get($shareWith))) {
				return new \OC\OCS\Result(null, 403, $this->l->t('The group is blacklisted for sharing'));
			}
			$share->setSharedWith($shareWith);
			$share->setPermissions($permissions);
			if ($autoAccept) {
				$share->setState(\OCP\Share::STATE_ACCEPTED);
			} else {
				$share->setState(\OCP\Share::STATE_PENDING);
			}
		} elseif ($shareType === \OCP\Share::SHARE_TYPE_LINK) {
			//Can we even share links?
			if (!$this->shareManager->shareApiAllowLinks()) {
				$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
				return new \OC\OCS\Result(null, 404, $this->l->t('Public link sharing is disabled by the administrator'));
			}

			// legacy way, expecting that this won't be used together with "create-only" shares
			$publicUpload = $this->request->getParam('publicUpload', null);
			// a few permission checks
			if ($publicUpload === 'true' || $permissions === \OCP\Constants::PERMISSION_CREATE) {
				// Check if public upload is allowed
				if (!$this->shareManager->shareApiLinkAllowPublicUpload()) {
					$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
					return new \OC\OCS\Result(null, 403, $this->l->t('Public upload disabled by the administrator'));
				}

				// Public upload can only be set for folders
				if ($path instanceof \OCP\Files\File) {
					$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
					return new \OC\OCS\Result(null, 404, $this->l->t('Public upload is only possible for publicly shared folders'));
				}
			}

			// convert to permissions
			if ($publicUpload === 'true') {
				$share->setPermissions(
					\OCP\Constants::PERMISSION_READ |
					\OCP\Constants::PERMISSION_CREATE |
					\OCP\Constants::PERMISSION_UPDATE |
					\OCP\Constants::PERMISSION_DELETE
				);
			} elseif ($permissions === \OCP\Constants::PERMISSION_CREATE ||
					$permissions === (\OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE | \OCP\Constants::PERMISSION_UPDATE | \OCP\Constants::PERMISSION_DELETE)) {
				$share->setPermissions($permissions);
			} else {
				// because when "publicUpload" is passed usually no permissions are set,
				// which defaults to ALL. But in the case of link shares we default to READ...
				$share->setPermissions(\OCP\Constants::PERMISSION_READ);
			}

			// set name only if passed as parameter, empty string is allowed
			if ($name !== null) {
				$share->setName($name);
			}

			// Set password
			$password = $this->request->getParam('password', '');

			if ($password !== '') {
				$share->setPassword($password);
			}

			//Expire date
			$expireDate = $this->request->getParam('expireDate', '');

			if ($expireDate !== '') {
				try {
					$expireDate = $this->parseDate($expireDate);
					$share->setExpirationDate($expireDate);
				} catch (\Exception $e) {
					$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
					return new \OC\OCS\Result(null, 404, $this->l->t('Invalid date, date format must be YYYY-MM-DD'));
				}
			}
		} elseif ($shareType === \OCP\Share::SHARE_TYPE_REMOTE) {
			if (!$this->shareManager->outgoingServer2ServerSharesAllowed()) {
				$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
				return new \OC\OCS\Result(null, 403, $this->l->t('Sharing %s failed because the back end does not allow shares from type %s', [$path->getPath(), $shareType]));
			}

			$share->setSharedWith($shareWith);
			$share->setPermissions($permissions);
		} else {
			$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
			return new \OC\OCS\Result(null, 400, $this->l->t('Unknown share type'));
		}

		$share->setShareType($shareType);
		$share->setSharedBy($this->currentUser->getUID());

		try {
			$share = $this->shareManager->createShare($share);
		} catch (GenericShareException $e) {
			$code = $e->getCode() === 0 ? 403 : $e->getCode();
			$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
			return new \OC\OCS\Result(null, $code, $e->getHint());
		} catch (\Exception $e) {
			$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
			return new \OC\OCS\Result(null, 403, $e->getMessage());
		}

		$share->getNode()->unlock(\OCP\Lock\ILockingProvider::LOCK_SHARED);

		$formattedShareAfterCreate = $this->formatShare($share);

		return new \OC\OCS\Result($formattedShareAfterCreate);
	}

	/**
	 * @param \OCP\Files\File|\OCP\Files\Folder $node
	 * @param boolean $includeTags include tags in response
	 * @param int|null $stateFilter state filter or empty for all, defaults to 0 (accepted)
	 * @return \OC\OCS\Result
	 */
	private function getSharedWithMe($node = null, $includeTags, $stateFilter = 0) {
		$userShares = $this->shareManager->getSharedWith($this->currentUser->getUID(), \OCP\Share::SHARE_TYPE_USER, $node, -1, 0);
		$groupShares = $this->shareManager->getSharedWith($this->currentUser->getUID(), \OCP\Share::SHARE_TYPE_GROUP, $node, -1, 0);

		$shares = \array_merge($userShares, $groupShares);

		$shares = \array_filter($shares, function (IShare $share) {
			return $share->getShareOwner() !== $this->currentUser->getUID();
		});

		$formatted = [];
		foreach ($shares as $share) {
			if (($stateFilter === null || $share->getState() === $stateFilter) &&
					$this->canAccessShare($share)) {
				try {
					$formatted[] = $this->formatShare($share, true);
				} catch (NotFoundException $e) {
					// Ignore this share
				}
			}
		}

		if ($includeTags) {
			$formatted = \OCA\Files\Helper::populateTags($formatted, 'file_source');
		}

		return new \OC\OCS\Result($formatted);
	}

	/**
	 * @param \OCP\Files\Folder $folder
	 * @return \OC\OCS\Result
	 */
	private function getSharesInDir($folder) {
		if (!($folder instanceof \OCP\Files\Folder)) {
			return new \OC\OCS\Result(null, 400, $this->l->t('Not a directory'));
		}

		$nodes = $folder->getDirectoryListing();
		/** @var \OCP\Share\IShare[] $shares */
		$shares = [];
		foreach ($nodes as $node) {
			$shares = \array_merge($shares, $this->shareManager->getSharesBy($this->currentUser->getUID(), \OCP\Share::SHARE_TYPE_USER, $node, false, -1, 0));
			$shares = \array_merge($shares, $this->shareManager->getSharesBy($this->currentUser->getUID(), \OCP\Share::SHARE_TYPE_GROUP, $node, false, -1, 0));
			$shares = \array_merge($shares, $this->shareManager->getSharesBy($this->currentUser->getUID(), \OCP\Share::SHARE_TYPE_LINK, $node, false, -1, 0));
			if ($this->shareManager->outgoingServer2ServerSharesAllowed()) {
				$shares = \array_merge($shares, $this->shareManager->getSharesBy($this->currentUser->getUID(), \OCP\Share::SHARE_TYPE_REMOTE, $node, false, -1, 0));
			}
		}

		$formatted = [];
		foreach ($shares as $share) {
			try {
				$formatted[] = $this->formatShare($share);
			} catch (NotFoundException $e) {
				//Ignore this share
			}
		}

		return new \OC\OCS\Result($formatted);
	}

	/**
	 * The getShares function.
	 *
	 * - Get shares by the current user
	 * - Get shares by the current user and reshares (?reshares=true)
	 * - Get shares with the current user (?shared_with_me=true)
	 * - Get shares for a specific path (?path=...)
	 * - Get all shares in a folder (?subfiles=true&path=..)
	 *
	 * @return \OC\OCS\Result
	 */
	public function getShares() {
		if (!$this->shareManager->shareApiEnabled()) {
			return new \OC\OCS\Result();
		}

		$sharedWithMe = $this->request->getParam('shared_with_me', null);
		$reshares = $this->request->getParam('reshares', null);
		$subfiles = $this->request->getParam('subfiles');
		$path = $this->request->getParam('path', null);

		$includeTags = $this->request->getParam('include_tags', false);

		if ($path !== null) {
			$userFolder = $this->rootFolder->getUserFolder($this->currentUser->getUID());
			try {
				$path = $userFolder->get($path);
				$path->lock(ILockingProvider::LOCK_SHARED);
			} catch (\OCP\Files\NotFoundException $e) {
				return new \OC\OCS\Result(null, 404, $this->l->t('Wrong path, file/folder doesn\'t exist'));
			} catch (LockedException $e) {
				return new \OC\OCS\Result(null, 404, $this->l->t('Could not lock path'));
			}
		}

		if ($sharedWithMe === 'true') {
			$stateFilter = $this->request->getParam('state', \OCP\Share::STATE_ACCEPTED);
			if ($stateFilter === '') {
				$stateFilter = \OCP\Share::STATE_ACCEPTED;
			} elseif ($stateFilter === 'all') {
				$stateFilter = null; // which means all
			} else {
				$stateFilter = (int)$stateFilter;
			}
			$result = $this->getSharedWithMe($path, $includeTags, $stateFilter);
			if ($path !== null) {
				$path->unlock(ILockingProvider::LOCK_SHARED);
			}
			return $result;
		}

		if ($subfiles === 'true') {
			$result = $this->getSharesInDir($path);
			if ($path !== null) {
				$path->unlock(ILockingProvider::LOCK_SHARED);
			}
			return $result;
		}

		if ($reshares === 'true') {
			$reshares = true;
		} else {
			$reshares = false;
		}

		// Get all shares
		$userShares = $this->shareManager->getSharesBy($this->currentUser->getUID(), \OCP\Share::SHARE_TYPE_USER, $path, $reshares, -1, 0);
		$groupShares = $this->shareManager->getSharesBy($this->currentUser->getUID(), \OCP\Share::SHARE_TYPE_GROUP, $path, $reshares, -1, 0);
		$linkShares = $this->shareManager->getSharesBy($this->currentUser->getUID(), \OCP\Share::SHARE_TYPE_LINK, $path, $reshares, -1, 0);
		$shares = \array_merge($userShares, $groupShares, $linkShares);

		if ($this->shareManager->outgoingServer2ServerSharesAllowed()) {
			$federatedShares = $this->shareManager->getSharesBy($this->currentUser->getUID(), \OCP\Share::SHARE_TYPE_REMOTE, $path, $reshares, -1, 0);
			$shares = \array_merge($shares, $federatedShares);
		}

		$formatted = [];
		foreach ($shares as $share) {
			try {
				$formatted[] = $this->formatShare($share);
			} catch (NotFoundException $e) {
				//Ignore share
			}
		}

		if ($includeTags) {
			$formatted = \OCA\Files\Helper::populateTags($formatted, 'file_source');
		}

		if ($path !== null) {
			$path->unlock(ILockingProvider::LOCK_SHARED);
		}

		return new \OC\OCS\Result($formatted);
	}

	/**
	 * @param int $id
	 * @return \OC\OCS\Result
	 */
	public function updateShare($id) {
		if (!$this->shareManager->shareApiEnabled()) {
			return new \OC\OCS\Result(null, 404, $this->l->t('Share API is disabled'));
		}

		try {
			$share = $this->getShareById($id);
		} catch (ShareNotFound $e) {
			return new \OC\OCS\Result(null, 404, $this->l->t('Wrong share ID, share doesn\'t exist'));
		}

		$share->getNode()->lock(\OCP\Lock\ILockingProvider::LOCK_SHARED);

		if (!$this->canAccessShare($share)) {
			$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
			return new \OC\OCS\Result(null, 404, $this->l->t('Wrong share ID, share doesn\'t exist'));
		}

		$permissions = $this->request->getParam('permissions', null);
		$password = $this->request->getParam('password', null);
		$publicUpload = $this->request->getParam('publicUpload', null);
		$expireDate = $this->request->getParam('expireDate', null);
		$name = $this->request->getParam('name', null);

		/*
		 * expirationdate, password and publicUpload only make sense for link shares
		 */
		if ($share->getShareType() === \OCP\Share::SHARE_TYPE_LINK) {
			if ($permissions === null && $password === null && $publicUpload === null && $expireDate === null && $name === null) {
				$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
				return new \OC\OCS\Result(null, 400, 'Wrong or no update parameter given');
			}

			$newPermissions = null;
			if ($publicUpload === 'true') {
				$newPermissions = \OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE | \OCP\Constants::PERMISSION_UPDATE | \OCP\Constants::PERMISSION_DELETE;
			} elseif ($publicUpload === 'false') {
				$newPermissions = \OCP\Constants::PERMISSION_READ;
			}

			if ($permissions !== null) {
				$newPermissions = (int)$permissions;
			}

			if ($newPermissions !== null &&
				$newPermissions !== \OCP\Constants::PERMISSION_READ &&
				$newPermissions !== \OCP\Constants::PERMISSION_CREATE &&
				// legacy
				$newPermissions !== (\OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE | \OCP\Constants::PERMISSION_UPDATE) &&
				// correct
				$newPermissions !== (\OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE | \OCP\Constants::PERMISSION_UPDATE | \OCP\Constants::PERMISSION_DELETE)
			) {
				$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
				return new \OC\OCS\Result(null, 400, $this->l->t('Can\'t change permissions for public share links'));
			}

			if (
				// legacy
				$newPermissions === (\OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE | \OCP\Constants::PERMISSION_UPDATE) ||
				// correct
				$newPermissions === (\OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE | \OCP\Constants::PERMISSION_UPDATE | \OCP\Constants::PERMISSION_DELETE)
			) {
				if (!$this->shareManager->shareApiLinkAllowPublicUpload()) {
					$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
					return new \OC\OCS\Result(null, 403, $this->l->t('Public upload disabled by the administrator'));
				}

				if (!($share->getNode() instanceof \OCP\Files\Folder)) {
					$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
					return new \OC\OCS\Result(null, 400, $this->l->t('Public upload is only possible for publicly shared folders'));
				}

				// normalize to correct public upload permissions
				$newPermissions = \OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE | \OCP\Constants::PERMISSION_UPDATE | \OCP\Constants::PERMISSION_DELETE;
			}

			// create-only (upload-only)
			if (
				$newPermissions === \OCP\Constants::PERMISSION_CREATE
			) {
				if (!$this->shareManager->shareApiLinkAllowPublicUpload()) {
					$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
					return new \OC\OCS\Result(null, 403, $this->l->t('Public upload disabled by the administrator'));
				}

				if (!($share->getNode() instanceof \OCP\Files\Folder)) {
					$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
					return new \OC\OCS\Result(null, 400, $this->l->t('Public upload is only possible for publicly shared folders'));
				}
			}

			// set name only if passed as parameter, empty string is allowed
			if ($name !== null) {
				$oldname = $share->getName();
				$share->setName($name);
			}

			if ($newPermissions !== null) {
				$share->setPermissions($newPermissions);
				$permissions = $newPermissions;
			}

			if ($expireDate === '') {
				$share->setExpirationDate(null);
			} elseif ($expireDate !== null) {
				try {
					$expireDate = $this->parseDate($expireDate);
				} catch (\Exception $e) {
					$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
					return new \OC\OCS\Result(null, 400, $e->getMessage());
				}
				$share->setExpirationDate($expireDate);
			}

			if ($password === '') {
				$share->setPassword(null);
			} elseif ($password !== null) {
				$share->setPassword($password);
			}
		} else {
			// For other shares only permissions is valid.
			if ($permissions === null) {
				$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
				return new \OC\OCS\Result(null, 400, $this->l->t('Wrong or no update parameter given'));
			} else {
				$permissions = (int)$permissions;
				$share->setPermissions($permissions);
			}
		}

		if ($permissions !== null && $share->getShareOwner() !== $this->currentUser->getUID()) {
			/* Check if this is an incoming share */
			$incomingShares = $this->shareManager->getSharedWith($this->currentUser->getUID(), \OCP\Share::SHARE_TYPE_USER, $share->getNode(), -1, 0);
			$incomingShares = \array_merge($incomingShares, $this->shareManager->getSharedWith($this->currentUser->getUID(), \OCP\Share::SHARE_TYPE_GROUP, $share->getNode(), -1, 0));

			if (!empty($incomingShares)) {
				$maxPermissions = 0;
				foreach ($incomingShares as $incomingShare) {
					$maxPermissions |= $incomingShare->getPermissions();
				}

				if ($share->getPermissions() & ~$maxPermissions) {
					$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
					return new \OC\OCS\Result(null, 404, $this->l->t('Cannot increase permissions'));
				}
			}
		}

		if ($share->getPermissions() === 0) {
			return new \OC\OCS\Result(null, 400, $this->l->t('Cannot remove all permissions'));
		}

		try {
			$share = $this->shareManager->updateShare($share);
		} catch (\Exception $e) {
			$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
			return new \OC\OCS\Result(null, 400, $e->getMessage());
		}

		$share->getNode()->unlock(\OCP\Lock\ILockingProvider::LOCK_SHARED);

		return new \OC\OCS\Result($this->formatShare($share));
	}

	/**
	 * @param int $id
	 * @return \OC\OCS\Result
	 */
	public function acceptShare($id) {
		return $this->updateShareState($id, \OCP\Share::STATE_ACCEPTED);
	}

	/**
	 * @param int $id
	 * @return \OC\OCS\Result
	 */
	public function declineShare($id) {
		return $this->updateShareState($id, \OCP\Share::STATE_REJECTED);
	}

	/**
	 * @param $id
	 * @param $state
	 * @return \OC\OCS\Result
	 */
	private function updateShareState($id, $state) {
		$eventName = '';
		if ($state === \OCP\Share::STATE_ACCEPTED) {
			$eventName = 'accept';
		} elseif ($state === \OCP\Share::STATE_REJECTED) {
			$eventName = 'reject';
		}

		if (!$this->shareManager->shareApiEnabled()) {
			return new \OC\OCS\Result(null, 404, $this->l->t('Share API is disabled'));
		}

		try {
			$share = $this->getShareById($id, $this->currentUser->getUID());
			$this->eventDispatcher->dispatch('share.before' . $eventName, new GenericEvent(null, ['share' => $share]));
		} catch (ShareNotFound $e) {
			return new \OC\OCS\Result(null, 404, $this->l->t('Wrong share ID, share doesn\'t exist'));
		}

		$node = $share->getNode();
		$node->lock(\OCP\Lock\ILockingProvider::LOCK_SHARED);

		// this checks that we are either the owner or recipient
		if (!$this->canAccessShare($share)) {
			$node->unlock(ILockingProvider::LOCK_SHARED);
			return new \OC\OCS\Result(null, 404, $this->l->t('Wrong share ID, share doesn\'t exist'));
		}

		// only recipient can accept/reject share
		if ($share->getShareOwner() === $this->currentUser->getUID() ||
			$share->getSharedBy() === $this->currentUser->getUID()) {
			$node->unlock(ILockingProvider::LOCK_SHARED);
			return new \OC\OCS\Result(null, 403, $this->l->t('Only recipient can change accepted state'));
		}

		if ($share->getState() === $state) {
			if ($eventName !== '') {
				$this->eventDispatcher->dispatch('share.after' . $eventName, new GenericEvent(null, ['share' => $share]));
			}
			// if there are no changes in the state, just return the share as if the change was successful
			$node->unlock(\OCP\Lock\ILockingProvider::LOCK_SHARED);
			return new \OC\OCS\Result([$this->formatShare($share, true)]);
		}

		// we actually want to update all shares related to the node in case there are multiple
		// incoming shares for the same node (ex: receiving simultaneously through group share and user share)
		$allShares = $this->shareManager->getSharedWith($this->currentUser->getUID(), \OCP\Share::SHARE_TYPE_USER, $node, -1, 0);
		$allShares = \array_merge($allShares, $this->shareManager->getSharedWith($this->currentUser->getUID(), \OCP\Share::SHARE_TYPE_GROUP, $node, -1, 0));

		// resolve and deduplicate target if accepting
		if ($state === \OCP\Share::STATE_ACCEPTED) {
			$share = $this->deduplicateShareTarget($share);
		}

		$share->setState($state);

		try {
			foreach ($allShares as $aShare) {
				$aShare->setState($share->getState());
				$aShare->setTarget($share->getTarget());
				$this->shareManager->updateShareForRecipient($aShare, $this->currentUser->getUID());
			}
		} catch (\Exception $e) {
			$share->getNode()->unlock(ILockingProvider::LOCK_SHARED);
			return new \OC\OCS\Result(null, 400, $e->getMessage());
		}

		$node->unlock(\OCP\Lock\ILockingProvider::LOCK_SHARED);

		// FIXME: needs public API!
		\OC\Files\Filesystem::tearDown();
		// FIXME: trigger mount for user to make sure the new node is mounted already
		// before formatShare resolves it
		$this->rootFolder->getUserFolder($this->currentUser->getUID());

		$this->notificationPublisher->discardNotificationForUser($share, $this->currentUser->getUID());

		if ($eventName !== '') {
			$this->eventDispatcher->dispatch('share.after' . $eventName, new GenericEvent(null, ['share' => $share]));
		}
		return new \OC\OCS\Result([$this->formatShare($share, true)]);
	}

	/**
	 * Deduplicate the share target in the current user home folder,
	 * based on configured share folder
	 *
	 * @param IShare $share share target to deduplicate
	 * @return IShare same share with target updated if necessary
	 */
	private function deduplicateShareTarget(IShare $share) {
		$userFolder = $this->rootFolder->getUserFolder($this->currentUser->getUID());
		$mountPoint = \basename($share->getTarget());
		$parentDir = \dirname($share->getTarget());
		if (!$userFolder->nodeExists($parentDir)) {
			$parentDir = Helper::getShareFolder();
			$pathAttempt = \OC\Files\Filesystem::normalizePath($parentDir . '/' . $share->getTarget());
		} else {
			$pathAttempt = \OC\Files\Filesystem::normalizePath($share->getTarget());
		}

		$pathinfo = \pathinfo($pathAttempt);
		$ext = (isset($pathinfo['extension'])) ? '.'.$pathinfo['extension'] : '';
		$name = $pathinfo['filename'];

		$i = 2;
		while ($userFolder->nodeExists($pathAttempt)) {
			$pathAttempt = \OC\Files\Filesystem::normalizePath($parentDir . '/' . $name . ' ('.$i.')' . $ext);
			$i++;
		}

		$share->setTarget($pathAttempt);

		return $share;
	}

	/**
	 * @param \OCP\Share\IShare $share
	 * @return bool
	 */
	protected function canAccessShare(\OCP\Share\IShare $share) {
		// A file with permissions 0 can't be accessed by us,
		// unless it's a rejected sub-group share in which case we want it visible to let the user accept it again
		if ($share->getPermissions() === 0
			&& !($share->getShareType() === \OCP\Share::SHARE_TYPE_GROUP && $share->getState() === \OCP\Share::STATE_REJECTED)) {
			return false;
		}

		// Owner of the file and the sharer of the file can always get share
		if ($share->getShareOwner() === $this->currentUser->getUID() ||
			$share->getSharedBy() === $this->currentUser->getUID()
		) {
			return true;
		}

		// If the share is shared with you (or a group you are a member of)
		if ($share->getShareType() === \OCP\Share::SHARE_TYPE_USER &&
			$share->getSharedWith() === $this->currentUser->getUID()) {
			return true;
		}

		if ($share->getShareType() === \OCP\Share::SHARE_TYPE_GROUP) {
			$sharedWith = $this->groupManager->get($share->getSharedWith());
			if ($sharedWith !== null && $sharedWith->inGroup($this->currentUser)) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Make sure that the passed date is valid ISO 8601
	 * So YYYY-MM-DD
	 * If not throw an exception
	 *
	 * @param string $expireDate
	 *
	 * @throws \Exception
	 * @return \DateTime
	 */
	private function parseDate($expireDate) {
		try {
			$date = new \DateTime($expireDate);
		} catch (\Exception $e) {
			throw new \Exception('Invalid date. Format must be YYYY-MM-DD');
		}

		if ($date === false) {
			throw new \Exception('Invalid date. Format must be YYYY-MM-DD');
		}

		$date->setTime(0, 0, 0);

		return $date;
	}

	/**
	 * Since we have multiple providers but the OCS Share API v1 does
	 * not support this we need to check all backends.
	 *
	 * @param string $id
	 * @return \OCP\Share\IShare
	 * @throws ShareNotFound
	 */
	private function getShareById($id, $recipient = null) {
		$share = null;

		// First check if it is an internal share.
		try {
			$share = $this->shareManager->getShareById('ocinternal:'.$id, $recipient);
		} catch (ShareNotFound $e) {
			if (!$this->shareManager->outgoingServer2ServerSharesAllowed()) {
				throw new ShareNotFound();
			}

			$share = $this->shareManager->getShareById('ocFederatedSharing:' . $id, $recipient);
		}

		return $share;
	}
}
