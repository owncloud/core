<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OC\Share20;

use OC\Cache\CappedMemoryCache;
use OC\Files\Mount\MoveableMount;
use OC\Files\View;
use OCP\Files\File;
use OCP\Files\Folder;
use OCP\Files\IRootFolder;
use OCP\Files\Mount\IMountManager;
use OCP\Files\NotFoundException;
use OCP\IConfig;
use OCP\IDBConnection;
use OCP\IGroupManager;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IUserManager;
use OCP\Security\IHasher;
use OCP\Security\ISecureRandom;
use OCP\Share\Exceptions\GenericShareException;
use OCP\Share\Exceptions\ShareNotFound;
use OCP\Share\Exceptions\TransferSharesException;
use OCP\Share\IManager;
use OCP\Share\IProviderFactory;
use OCP\Share\IShare;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * This class is the communication hub for all sharing related operations.
 */
class Manager implements IManager {

	/** @var IProviderFactory */
	private $factory;
	/** @var ILogger */
	private $logger;
	/** @var IConfig */
	private $config;
	/** @var ISecureRandom */
	private $secureRandom;
	/** @var IHasher */
	private $hasher;
	/** @var IMountManager */
	private $mountManager;
	/** @var IGroupManager */
	private $groupManager;
	/** @var IL10N */
	private $l;
	/** @var IUserManager */
	private $userManager;
	/** @var IRootFolder */
	private $rootFolder;
	/** @var CappedMemoryCache */
	private $sharingDisabledForUsersCache;
	/** @var EventDispatcher  */
	private $eventDispatcher;
	/** @var  View */
	private $view;
	/** @var IDBConnection  */
	private $connection;

	/**
	 * Manager constructor.
	 *
	 * @param ILogger $logger
	 * @param IConfig $config
	 * @param ISecureRandom $secureRandom
	 * @param IHasher $hasher
	 * @param IMountManager $mountManager
	 * @param IGroupManager $groupManager
	 * @param IL10N $l
	 * @param IProviderFactory $factory
	 * @param IUserManager $userManager
	 * @param IRootFolder $rootFolder
	 */
	public function __construct(
			ILogger $logger,
			IConfig $config,
			ISecureRandom $secureRandom,
			IHasher $hasher,
			IMountManager $mountManager,
			IGroupManager $groupManager,
			IL10N $l,
			IProviderFactory $factory,
			IUserManager $userManager,
			IRootFolder $rootFolder,
			EventDispatcher $eventDispatcher,
			View $view,
			IDBConnection $connection
	) {
		$this->logger = $logger;
		$this->config = $config;
		$this->secureRandom = $secureRandom;
		$this->hasher = $hasher;
		$this->mountManager = $mountManager;
		$this->groupManager = $groupManager;
		$this->l = $l;
		$this->factory = $factory;
		$this->userManager = $userManager;
		$this->rootFolder = $rootFolder;
		$this->sharingDisabledForUsersCache = new CappedMemoryCache();
		$this->eventDispatcher = $eventDispatcher;
		$this->view = $view;
		$this->connection = $connection;
	}

	/**
	 * @param int[] $shareTypes - ref \OC\Share\Constants[]
	 * @return int[] $providerIdMap e.g. { "ocinternal" => { 0, 1 }[2] }[1]
	 */
	private function shareTypeToProviderMap($shareTypes) {
		$providerIdMap = [];
		foreach ($shareTypes as $shareType) {
			// Get provider and its ID, at this point provider is cached at IProviderFactory instance
			$provider = $this->factory->getProviderForType($shareType);
			$providerId = $provider->identifier();

			// Create a key -> multi value map
			$providerIdMap[$providerId][] = $shareType;
		}
		return $providerIdMap;
	}

	/**
	 * Convert from a full share id to a tuple (providerId, shareId)
	 *
	 * @param string $id
	 * @return string[]
	 */
	private function splitFullId($id) {
		return \explode(':', $id, 2);
	}

	/**
	 * Verify if a password meets all requirements
	 *
	 * @param string $password
	 * @throws \Exception
	 */
	protected function verifyPassword($password) {
		// Let others verify the password
		$accepted = true;
		$message = '';
		\OCP\Util::emitHook('\OC\Share', 'verifyPassword', [
				'password' => $password,
				'accepted' => &$accepted,
				'message' => &$message
		]);

		if (!$accepted) {
			throw new \Exception($message);
		}

		$this->eventDispatcher->dispatch(
			'OCP\Share::validatePassword',
			new GenericEvent(null, ['password' => $password])
		);
	}

	/**
	 * Check if a password must be enforced if the shared has those permissions
	 * @param int $permissions \OCP\Constants::PERMISSION_* ("|" can be use for sets of permissions)
	 * @return bool true if the password must be enforced, false otherwise
	 */
	protected function passwordMustBeEnforced($permissions) {
		$roEnforcement = $permissions === \OCP\Constants::PERMISSION_READ && $this->shareApiLinkEnforcePasswordReadOnly();
		$woEnforcement = $permissions === \OCP\Constants::PERMISSION_CREATE && $this->shareApiLinkEnforcePasswordWriteOnly();
		// use read & write enforcement for the rest of the cases
		$rwEnforcement = ($permissions !== \OCP\Constants::PERMISSION_READ && $permissions !== \OCP\Constants::PERMISSION_CREATE) && $this->shareApiLinkEnforcePasswordReadWrite();
		if ($roEnforcement || $woEnforcement || $rwEnforcement) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Check for generic requirements before creating a share
	 *
	 * @param \OCP\Share\IShare $share
	 * @throws \InvalidArgumentException
	 * @throws GenericShareException
	 */
	protected function generalCreateChecks(\OCP\Share\IShare $share) {
		if ($share->getShareType() === \OCP\Share::SHARE_TYPE_USER) {
			// We expect a valid user as sharedWith for user shares
			if (!$this->userManager->userExists($share->getSharedWith())) {
				throw new \InvalidArgumentException('SharedWith is not a valid user');
			}
		} elseif ($share->getShareType() === \OCP\Share::SHARE_TYPE_GROUP) {
			// We expect a valid group as sharedWith for group shares
			if (!$this->groupManager->groupExists($share->getSharedWith())) {
				throw new \InvalidArgumentException('SharedWith is not a valid group');
			}
		} elseif ($share->getShareType() === \OCP\Share::SHARE_TYPE_LINK) {
			if ($share->getSharedWith() !== null) {
				throw new \InvalidArgumentException('SharedWith should be empty');
			}
		} elseif ($share->getShareType() === \OCP\Share::SHARE_TYPE_REMOTE) {
			if ($share->getSharedWith() === null) {
				throw new \InvalidArgumentException('SharedWith should not be empty');
			}
		} else {
			// We can't handle other types yet
			throw new \InvalidArgumentException('unkown share type');
		}

		// Verify the initiator of the share is set
		if ($share->getSharedBy() === null) {
			throw new \InvalidArgumentException('SharedBy should be set');
		}

		// Cannot share with yourself
		if ($share->getShareType() === \OCP\Share::SHARE_TYPE_USER &&
			$share->getSharedWith() === $share->getSharedBy()) {
			throw new \InvalidArgumentException('Can\'t share with yourself');
		}

		// The path should be set
		if ($share->getNode() === null) {
			throw new \InvalidArgumentException('Path should be set');
		}

		// And it should be a file or a folder
		if (!($share->getNode() instanceof \OCP\Files\File) &&
				!($share->getNode() instanceof \OCP\Files\Folder)) {
			throw new \InvalidArgumentException('Path should be either a file or a folder');
		}

		// And you can't share your rootfolder
		if ($this->userManager->userExists($share->getSharedBy())) {
			$sharedPath = $this->rootFolder->getUserFolder($share->getSharedBy())->getPath();
		} else {
			$sharedPath = $this->rootFolder->getUserFolder($share->getShareOwner())->getPath();
		}
		if ($sharedPath === $share->getNode()->getPath()) {
			throw new \InvalidArgumentException('You can\'t share your root folder');
		}

		// Check if we actually have share permissions
		if (!$share->getNode()->isShareable()) {
			$message_t = $this->l->t('You are not allowed to share %s', [$share->getNode()->getPath()]);
			throw new GenericShareException($message_t, $message_t, 404);
		}

		// Permissions should be set
		if ($share->getPermissions() === null) {
			throw new \InvalidArgumentException('A share requires permissions');
		}

		/*
		 * Quick fix for #23536
		 * Non moveable mount points do not have update and delete permissions
		 * while we 'most likely' do have that on the storage.
		 */
		$permissions = $share->getNode()->getPermissions();
		$mount = $share->getNode()->getMountPoint();
		if (!($mount instanceof MoveableMount)) {
			$permissions |= \OCP\Constants::PERMISSION_DELETE | \OCP\Constants::PERMISSION_UPDATE;
		}

		// Check that we do not share with more permissions than we have
		if ($share->getPermissions() & ~$permissions) {
			$message_t = $this->l->t('Cannot increase permissions of %s', [$share->getNode()->getPath()]);
			throw new GenericShareException($message_t, $message_t, 404);
		}

		if ($share->getNode() instanceof \OCP\Files\File) {
			if ($share->getPermissions() & \OCP\Constants::PERMISSION_DELETE) {
				$message_t = $this->l->t('Files can\'t be shared with delete permissions');
				throw new GenericShareException($message_t);
			}
			if ($share->getPermissions() & \OCP\Constants::PERMISSION_CREATE) {
				$message_t = $this->l->t('Files can\'t be shared with create permissions');
				throw new GenericShareException($message_t);
			}
		}
	}

	/**
	 * Validate if the expiration date fits the system settings
	 *
	 * @param \OCP\Share\IShare $share The share to validate the expiration date of
	 * @return \OCP\Share\IShare The modified share object
	 * @throws GenericShareException
	 * @throws \InvalidArgumentException
	 * @throws \Exception
	 */
	protected function validateExpirationDate(\OCP\Share\IShare $share) {
		$expirationDate = $share->getExpirationDate();

		if ($expirationDate !== null) {
			//Make sure the expiration date is a date
			$expirationDate->setTime(0, 0, 0);

			$date = new \DateTime();
			$date->setTime(0, 0, 0);
			if ($date >= $expirationDate) {
				$message = $this->l->t('Expiration date is in the past');
				throw new GenericShareException($message, $message, 404);
			}
		}

		// If expiredate is empty set a default one if there is a default
		$fullId = null;
		try {
			$fullId = $share->getFullId();
		} catch (\UnexpectedValueException $e) {
			// This is a new share
		}

		if ($fullId === null && $expirationDate === null && $this->shareApiLinkDefaultExpireDate()) {
			$expirationDate = new \DateTime();
			$expirationDate->setTime(0, 0, 0);
			$expirationDate->add(new \DateInterval('P'.$this->shareApiLinkDefaultExpireDays().'D'));
		}

		// If we enforce the expiration date check that is does not exceed
		if ($this->shareApiLinkDefaultExpireDateEnforced()) {
			if ($expirationDate === null) {
				throw new \InvalidArgumentException('Expiration date is enforced');
			}

			$date = new \DateTime();
			$date->setTime(0, 0, 0);
			$date->add(new \DateInterval('P' . $this->shareApiLinkDefaultExpireDays() . 'D'));
			if ($date < $expirationDate) {
				$message = $this->l->t('Cannot set expiration date more than %s days in the future', [$this->shareApiLinkDefaultExpireDays()]);
				throw new GenericShareException($message, $message, 404);
			}
		}

		$accepted = true;
		$message = '';
		\OCP\Util::emitHook('\OC\Share', 'verifyExpirationDate', [
			'expirationDate' => &$expirationDate,
			'accepted' => &$accepted,
			'message' => &$message,
			'passwordSet' => $share->getPassword() !== null,
		]);

		if (!$accepted) {
			throw new \Exception($message);
		}

		$share->setExpirationDate($expirationDate);

		return $share;
	}

	/**
	 * Check for pre share requirements for user shares
	 *
	 * @param \OCP\Share\IShare $share
	 * @throws \Exception
	 */
	protected function userCreateChecks(\OCP\Share\IShare $share) {
		// Check if we can share with group members only
		if ($this->shareWithGroupMembersOnly()) {
			$sharedBy = $this->userManager->get($share->getSharedBy());
			$sharedWith = $this->userManager->get($share->getSharedWith());
			// Verify we can share with this user
			$groups = \array_intersect(
					$this->groupManager->getUserGroupIds($sharedBy),
					$this->groupManager->getUserGroupIds($sharedWith)
			);
			if (empty($groups)) {
				throw new \Exception('Only sharing with group members is allowed');
			}
		}

		/*
		 * TODO: Could be costly, fix
		 *
		 * Also this is not what we want in the future.. then we want to squash identical shares.
		 */
		$provider = $this->factory->getProviderForType(\OCP\Share::SHARE_TYPE_USER);
		$existingShares = $provider->getSharesByPath($share->getNode());
		foreach ($existingShares as $existingShare) {
			// Ignore if it is the same share
			try {
				if ($existingShare->getFullId() === $share->getFullId()) {
					continue;
				}
			} catch (\UnexpectedValueException $e) {
				//Shares are not identical
			}

			// Identical share already existst
			if ($existingShare->getSharedWith() === $share->getSharedWith()) {
				throw new \Exception('Path already shared with this user');
			}

			// The share is already shared with this user via a group share
			if ($existingShare->getShareType() === \OCP\Share::SHARE_TYPE_GROUP) {
				$group = $this->groupManager->get($existingShare->getSharedWith());
				if ($group !== null) {
					$user = $this->userManager->get($share->getSharedWith());

					if ($group->inGroup($user) && $existingShare->getShareOwner() !== $share->getShareOwner()) {
						throw new \Exception('Path already shared with this user');
					}
				}
			}
		}
	}

	/**
	 * Check for pre share requirements for group shares
	 *
	 * @param \OCP\Share\IShare $share
	 * @throws \Exception
	 */
	protected function groupCreateChecks(\OCP\Share\IShare $share) {
		// Verify group shares are allowed
		if (!$this->allowGroupSharing()) {
			throw new \Exception('Group sharing is now allowed');
		}

		// Verify if the user can share with this group
		if ($this->shareWithMembershipGroupOnly()) {
			$sharedBy = $this->userManager->get($share->getSharedBy());
			$sharedWith = $this->groupManager->get($share->getSharedWith());
			if ($sharedWith === null || !$sharedWith->inGroup($sharedBy)) {
				throw new \Exception('Only sharing within your own groups is allowed');
			}
		}

		/*
		 * TODO: Could be costly, fix
		 *
		 * Also this is not what we want in the future.. then we want to squash identical shares.
		 */
		$provider = $this->factory->getProviderForType(\OCP\Share::SHARE_TYPE_GROUP);
		$existingShares = $provider->getSharesByPath($share->getNode());
		foreach ($existingShares as $existingShare) {
			try {
				if ($existingShare->getFullId() === $share->getFullId()) {
					continue;
				}
			} catch (\UnexpectedValueException $e) {
				//It is a new share so just continue
			}

			if ($existingShare->getSharedWith() === $share->getSharedWith()) {
				throw new \Exception('Path already shared with this group');
			}
		}
	}

	/**
	 * Check for pre share requirements for link shares
	 *
	 * @param \OCP\Share\IShare $share
	 * @throws \Exception
	 */
	protected function linkCreateChecks(\OCP\Share\IShare $share) {
		// Are link shares allowed?
		if (!$this->shareApiAllowLinks()) {
			throw new \Exception('Link sharing not allowed');
		}

		// Link shares by definition can't have share permissions
		if ($share->getPermissions() & \OCP\Constants::PERMISSION_SHARE) {
			throw new \InvalidArgumentException('Link shares can\'t have reshare permissions');
		}

		// Check if public upload is allowed
		if (!$this->shareApiLinkAllowPublicUpload() &&
			($share->getPermissions() & (\OCP\Constants::PERMISSION_CREATE | \OCP\Constants::PERMISSION_UPDATE | \OCP\Constants::PERMISSION_DELETE))) {
			throw new \InvalidArgumentException('Public upload not allowed');
		}
	}

	/**
	 * To make sure we don't get invisible link shares we set the parent
	 * of a link if it is a reshare. This is a quick word around
	 * until we can properly display multiple link shares in the UI
	 *
	 * See: https://github.com/owncloud/core/issues/22295
	 *
	 * FIXME: Remove once multiple link shares can be properly displayed
	 *
	 * @param \OCP\Share\IShare $share
	 */
	protected function setLinkParent(\OCP\Share\IShare $share) {

		// No sense in checking if the method is not there.
		if (\method_exists($share, 'setParent')) {
			$storage = $share->getNode()->getStorage();
			if ($storage->instanceOfStorage('\OCA\Files_Sharing\ISharedStorage')) {
				$share->setParent($storage->getShareId());
			}
		};
	}

	/**
	 * @param File|Folder $path
	 */
	protected function pathCreateChecks($path) {
		// Make sure that we do not share a path that contains a shared mountpoint
		if ($path instanceof \OCP\Files\Folder) {
			$mounts = $this->mountManager->findIn($path->getPath());
			foreach ($mounts as $mount) {
				if ($mount->getStorage()->instanceOfStorage('\OCA\Files_Sharing\ISharedStorage')) {
					throw new \InvalidArgumentException('Path contains files shared with you');
				}
			}
		}
	}

	/**
	 * Check if the user that is sharing can actually share
	 *
	 * @param \OCP\Share\IShare $share
	 * @throws \Exception
	 */
	protected function canShare(\OCP\Share\IShare $share) {
		if (!$this->shareApiEnabled()) {
			throw new \Exception('The share API is disabled');
		}

		if ($this->sharingDisabledForUser($share->getSharedBy())) {
			throw new \Exception('You are not allowed to share');
		}
	}

	/**
	 * Share a path
	 *
	 * @param \OCP\Share\IShare $share
	 * @return Share The share object
	 * @throws \Exception
	 *
	 * TODO: handle link share permissions or check them
	 */
	public function createShare(\OCP\Share\IShare $share) {
		$this->canShare($share);

		$this->generalCreateChecks($share);

		// Verify if there are any issues with the path
		$this->pathCreateChecks($share->getNode());

		/*
		 * On creation of a share the owner is always the owner of the path
		 * Except for mounted federated shares.
		 */
		$storage = $share->getNode()->getStorage();
		if ($storage->instanceOfStorage('OCA\Files_Sharing\External\Storage')) {
			$parent = $share->getNode()->getParent();
			while ($parent->getStorage()->instanceOfStorage('OCA\Files_Sharing\External\Storage')) {
				$parent = $parent->getParent();
			}
			$share->setShareOwner($parent->getOwner()->getUID());
		} else {
			$share->setShareOwner($share->getNode()->getOwner()->getUID());
		}

		//Verify share type
		if ($share->getShareType() === \OCP\Share::SHARE_TYPE_USER) {
			$this->userCreateChecks($share);
		} elseif ($share->getShareType() === \OCP\Share::SHARE_TYPE_GROUP) {
			$this->groupCreateChecks($share);
		} elseif ($share->getShareType() === \OCP\Share::SHARE_TYPE_LINK) {
			$this->linkCreateChecks($share);
			$this->setLinkParent($share);

			/*
			 * For now ignore a set token.
			 */
			$share->setToken(
				$this->secureRandom->generate(
					\OC\Share\Constants::TOKEN_LENGTH,
					\OCP\Security\ISecureRandom::CHAR_LOWER.
					\OCP\Security\ISecureRandom::CHAR_UPPER.
					\OCP\Security\ISecureRandom::CHAR_DIGITS
				)
			);

			//Verify the expiration date
			$this->validateExpirationDate($share);

			//Verify the password
			if ($this->passwordMustBeEnforced($share->getPermissions()) && $share->getPassword() === null) {
				throw new \InvalidArgumentException('Passwords are enforced for link shares');
			} else {
				$this->verifyPassword($share->getPassword());
			}

			// If a password is set. Hash it!
			if (($share->getPassword() !== null) && ($share->getShouldHashPassword() === true)) {
				$share->setPassword($this->hasher->hash($share->getPassword()));
			}
		}

		// Cannot share with the owner
		if ($share->getShareType() === \OCP\Share::SHARE_TYPE_USER &&
			$share->getSharedWith() === $share->getShareOwner()) {
			throw new \InvalidArgumentException('Can\'t share with the share owner');
		}

		// Generate the target
		$target = $this->config->getSystemValue('share_folder', '/') .'/'. $share->getNode()->getName();
		$target = \OC\Files\Filesystem::normalizePath($target);
		$share->setTarget($target);

		// Pre share hook
		$run = true;
		$error = '';
		$preHookData = [
			'itemType' => $share->getNode() instanceof \OCP\Files\File ? 'file' : 'folder',
			'itemSource' => $share->getNode()->getId(),
			'shareType' => $share->getShareType(),
			'uidOwner' => $share->getSharedBy(),
			'permissions' => $share->getPermissions(),
			'fileSource' => $share->getNode()->getId(),
			'expiration' => $share->getExpirationDate(),
			'token' => $share->getToken(),
			'itemTarget' => $share->getTarget(),
			'shareWith' => $share->getSharedWith(),
			'run' => &$run,
			'error' => &$error,
		];
		\OC_Hook::emit('OCP\Share', 'pre_shared', $preHookData);

		$beforeEvent = new GenericEvent(null, ['shareData' => $preHookData, 'shareObject' => $share]);
		$this->eventDispatcher->dispatch('share.beforeCreate', $beforeEvent);

		if ($run === false) {
			throw new \Exception($error);
		}

		$provider = $this->factory->getProviderForType($share->getShareType());
		$share = $provider->create($share);

		// Post share hook
		$postHookData = [
			'itemType' => $share->getNode() instanceof \OCP\Files\File ? 'file' : 'folder',
			'itemSource' => $share->getNode()->getId(),
			'shareType' => $share->getShareType(),
			'uidOwner' => $share->getSharedBy(),
			'permissions' => $share->getPermissions(),
			'fileSource' => $share->getNode()->getId(),
			'expiration' => $share->getExpirationDate(),
			'token' => $share->getToken(),
			'id' => $share->getId(),
			'shareWith' => $share->getSharedWith(),
			'itemTarget' => $share->getTarget(),
			'fileTarget' => $share->getTarget(),
			'passwordEnabled' => ($share->getPassword() !== null and ($share->getPassword() !== '')),
		];

		\OC_Hook::emit('OCP\Share', 'post_shared', $postHookData);

		$afterEvent = new GenericEvent(null, ['shareData' => $postHookData, 'shareObject' => $share]);
		$this->eventDispatcher->dispatch('share.afterCreate', $afterEvent);

		return $share;
	}

	/**
	 * Transfer shares from oldOwner to newOwner. Both old and new owners are uid
	 *
	 * finalTarget is of the form "user1/files/transferred from admin on 20180509"
	 *
	 * TransferShareException would be thrown when:
	 *  - oldOwner, newOwner does not exist.
	 *  - oldOwner and newOwner are same
	 * NotFoundException would be thrown when finalTarget does not exist in the file
	 * system
	 *
	 * @param IShare $share
	 * @param string $oldOwner
	 * @param string $newOwner
	 * @param string $finalTarget
	 * @param null|bool $isChild
	 * @throws TransferSharesException
	 * @throws NotFoundException
	 */
	public function transferShare(IShare $share, $oldOwner, $newOwner, $finalTarget, $isChild = null) {
		if ($this->userManager->get($oldOwner) === null) {
			throw new TransferSharesException("The current owner of the share $oldOwner doesn't exist");
		}
		if ($this->userManager->get($newOwner) === null) {
			throw new TransferSharesException("The future owner $newOwner, where the share has to be moved doesn't exist");
		}

		if ($oldOwner === $newOwner) {
			throw new TransferSharesException("The current owner of the share and the future owner of the share are same");
		}

		//If the destination location, i.e finalTarget is not present, then
		//throw an exception
		if (!$this->view->file_exists($finalTarget)) {
			throw new NotFoundException("The target location $finalTarget doesn't exist");
		}

		if ($isChild === true) {
			//Set the parent to null so that we don't lose the shares after transfer
			$builder = $this->connection->getQueryBuilder();
			$builder->update('share')
				->set('parent', 'null')
				->where($builder->expr()->eq('id', $builder->createNamedParameter($share->getId())))
				->execute();
		}
		/**
		 * If the share was already shared with new owner, then we can delete it
		 */
		if ($share->getSharedWith() === $newOwner) {
			// Unmount the shares before deleting, so we don't try to get the storage later on.
			$shareMountPoint = $this->mountManager->find('/' . $newOwner . '/files' . $share->getTarget());
			if ($shareMountPoint) {
				$this->mountManager->removeMount($shareMountPoint->getMountPoint());
			}

			$provider = $this->factory->getProviderForType($share->getShareType());
			//Try to get the children transferred and then delete the parent
			foreach ($provider->getChildren($share) as $child) {
				$this->transferShare($child, $oldOwner, $newOwner, $finalTarget, true);
			}
			$this->deleteShare($share);
		} else {
			$sharedWith = $share->getSharedWith();

			$targetFile = '/' . \rtrim(\basename($finalTarget), '/') . '/' . \ltrim(\basename($share->getTarget()), '/');
			/**
			 * Scenario where share is made by old owner to a user different
			 * from new owner
			 */
			if (($sharedWith !== null) && ($sharedWith !== $oldOwner) && ($sharedWith !== $newOwner)) {
				$sharedBy = $share->getSharedBy();
				$sharedOwner = $share->getShareOwner();
				//The origin of the share now has to be the destination user.
				if ($sharedBy === $oldOwner) {
					$share->setSharedBy($newOwner);
				}
				if ($sharedOwner === $oldOwner) {
					$share->setShareOwner($newOwner);
				}
				if (($sharedBy === $oldOwner) || ($sharedOwner === $oldOwner)) {
					$share->setTarget($targetFile);
				}
			} else {
				if ($share->getShareOwner() === $oldOwner) {
					$share->setShareOwner($newOwner);
				}
				if ($share->getSharedBy() === $oldOwner) {
					$share->setSharedBy($newOwner);
				}
			}

			/**
			 * Here we update the target when the share is link
			 */
			if ($share->getShareType() === \OCP\Share::SHARE_TYPE_LINK) {
				$share->setTarget($targetFile);
			}

			$this->updateShare($share);
		}
	}

	/**
	 * Update a share
	 *
	 * @param \OCP\Share\IShare $share
	 * @return \OCP\Share\IShare The share object
	 * @throws \InvalidArgumentException
	 */
	public function updateShare(\OCP\Share\IShare $share) {
		$expirationDateUpdated = false;

		$this->canShare($share);

		try {
			$originalShare = $this->getShareById($share->getFullId());
		} catch (\UnexpectedValueException $e) {
			throw new \InvalidArgumentException('Share does not have a full id');
		}

		// We can't change the share type!
		if ($share->getShareType() !== $originalShare->getShareType()) {
			throw new \InvalidArgumentException('Can\'t change share type');
		}

		// We can only change the recipient on user shares
		if ($share->getSharedWith() !== $originalShare->getSharedWith() &&
			$share->getShareType() !== \OCP\Share::SHARE_TYPE_USER) {
			throw new \InvalidArgumentException('Can only update recipient on user shares');
		}

		// Cannot share with the owner
		if ($share->getShareType() === \OCP\Share::SHARE_TYPE_USER &&
			$share->getSharedWith() === $share->getShareOwner()) {
			throw new \InvalidArgumentException('Can\'t share with the share owner');
		}

		$this->generalCreateChecks($share);

		if ($share->getShareType() === \OCP\Share::SHARE_TYPE_USER) {
			$this->userCreateChecks($share);
		} elseif ($share->getShareType() === \OCP\Share::SHARE_TYPE_GROUP) {
			$this->groupCreateChecks($share);
		} elseif ($share->getShareType() === \OCP\Share::SHARE_TYPE_LINK) {
			$this->linkCreateChecks($share);

			// Password updated.
			if ($share->getPassword() !== $originalShare->getPassword() ||
					$share->getPermissions() !== $originalShare->getPermissions()) {
				//Verify the password. Permissions must be taken into account in case the password must be enforced
				if ($this->passwordMustBeEnforced($share->getPermissions()) && $share->getPassword() === null) {
					throw new \InvalidArgumentException('Passwords are enforced for link shares');
				} else {
					$this->verifyPassword($share->getPassword(), $share->getPermissions());
				}

				// If a password is set. Hash it! (only if the password has changed)
				if (($share->getPassword() !== null) &&
						($share->getPassword() !== $originalShare->getPassword()) &&
						($share->getShouldHashPassword() === true)) {
					$share->setPassword($this->hasher->hash($share->getPassword()));
				}
			}

			//Verify the expiration date
			$this->validateExpirationDate($share);

			if ($share->getExpirationDate() != $originalShare->getExpirationDate()) {
				$expirationDateUpdated = true;
			}
		}

		$this->pathCreateChecks($share->getNode());

		// Now update the share!
		$provider = $this->factory->getProviderForType($share->getShareType());
		$share = $provider->update($share);

		$shareAfterUpdateEvent = new GenericEvent(null);
		$shareAfterUpdateEvent->setArgument('shareobject', $share);
		$update = false;
		if ($expirationDateUpdated === true) {
			\OC_Hook::emit('OCP\Share', 'post_set_expiration_date', [
				'itemType' => $share->getNode() instanceof \OCP\Files\File ? 'file' : 'folder',
				'itemSource' => $share->getNode()->getId(),
				'date' => $share->getExpirationDate(),
				'uidOwner' => $share->getSharedBy(),
			]);
			$shareAfterUpdateEvent->setArgument('expirationdateupdated', true);
			$shareAfterUpdateEvent->setArgument('oldexpirationdate', $originalShare->getExpirationDate());
			$update = true;
		}

		if ($share->getPassword() !== $originalShare->getPassword()) {
			\OC_Hook::emit('OCP\Share', 'post_update_password', [
				'itemType' => $share->getNode() instanceof \OCP\Files\File ? 'file' : 'folder',
				'itemSource' => $share->getNode()->getId(),
				'uidOwner' => $share->getSharedBy(),
				'token' => $share->getToken(),
				'disabled' => $share->getPassword() === null,
			]);
			$shareAfterUpdateEvent->setArgument('passwordupdate', true);
			$update = true;
		}

		if ($share->getPermissions() !== $originalShare->getPermissions()) {
			if ($this->userManager->userExists($share->getShareOwner())) {
				$userFolder = $this->rootFolder->getUserFolder($share->getShareOwner());
			} else {
				$userFolder = $this->rootFolder->getUserFolder($share->getSharedBy());
			}
			\OC_Hook::emit('OCP\Share', 'post_update_permissions', [
				'itemType' => $share->getNode() instanceof \OCP\Files\File ? 'file' : 'folder',
				'itemSource' => $share->getNode()->getId(),
				'shareType' => $share->getShareType(),
				'shareWith' => $share->getSharedWith(),
				'uidOwner' => $share->getSharedBy(),
				'permissions' => $share->getPermissions(),
				'path' => $userFolder->getRelativePath($share->getNode()->getPath()),
			]);
			$shareAfterUpdateEvent->setArgument('permissionupdate', true);
			$shareAfterUpdateEvent->setArgument('oldpermissions', $originalShare->getPermissions());
			$shareAfterUpdateEvent->setArgument('path', $userFolder->getRelativePath($share->getNode()->getPath()));
			$update = true;
		}

		if ($share->getName() !== $originalShare->getName()) {
			$shareAfterUpdateEvent->setArgument('sharenameupdated', true);
			$shareAfterUpdateEvent->setArgument('oldname', $originalShare->getName());
			$update = true;
		}

		if ($update === true) {
			$this->eventDispatcher->dispatch('share.afterupdate', $shareAfterUpdateEvent);
		}
		return $share;
	}

	/**
	 * Delete all the children of this share
	 * FIXME: remove once https://github.com/owncloud/core/pull/21660 is in
	 *
	 * @param \OCP\Share\IShare $share
	 * @return \OCP\Share\IShare[] List of deleted shares
	 */
	protected function deleteChildren(\OCP\Share\IShare $share) {
		$deletedShares = [];

		$provider = $this->factory->getProviderForType($share->getShareType());

		foreach ($provider->getChildren($share) as $child) {
			$deletedChildren = $this->deleteChildren($child);
			$deletedShares = \array_merge($deletedShares, $deletedChildren);

			$provider->delete($child);
			$deletedShares[] = $child;
		}

		return $deletedShares;
	}

	protected static function formatUnshareHookParams(\OCP\Share\IShare $share) {
		// Prepare hook
		$shareType = $share->getShareType();
		$sharedWith = '';
		if ($shareType === \OCP\Share::SHARE_TYPE_USER) {
			$sharedWith = $share->getSharedWith();
		} elseif ($shareType === \OCP\Share::SHARE_TYPE_GROUP) {
			$sharedWith = $share->getSharedWith();
		} elseif ($shareType === \OCP\Share::SHARE_TYPE_REMOTE) {
			$sharedWith = $share->getSharedWith();
		}

		$hookParams = [
			'id'         => $share->getId(),
			'itemType'   => $share->getNodeType(),
			'itemSource' => $share->getNodeId(),
			'shareType'  => $shareType,
			'shareWith'  => $sharedWith,
			'itemparent' => \method_exists($share, 'getParent') ? $share->getParent() : '',
			'uidOwner'   => $share->getSharedBy(),
			'fileSource' => $share->getNodeId(),
			'fileTarget' => $share->getTarget()
		];
		return $hookParams;
	}

	/**
	 * Delete a share
	 *
	 * @param \OCP\Share\IShare $share
	 * @throws ShareNotFound
	 * @throws \InvalidArgumentException
	 */
	public function deleteShare(\OCP\Share\IShare $share) {
		try {
			$share->getFullId();
		} catch (\UnexpectedValueException $e) {
			throw new \InvalidArgumentException('Share does not have a full id');
		}

		$hookParams = self::formatUnshareHookParams($share);

		// Emit pre-hook
		\OC_Hook::emit('OCP\Share', 'pre_unshare', $hookParams);

		$beforeEvent = new GenericEvent(null, ['shareData' => $hookParams, 'shareObject' => $share]);
		$this->eventDispatcher->dispatch('share.beforeDelete', $beforeEvent);
		// Get all children and delete them as well
		$deletedShares = $this->deleteChildren($share);

		// Do the actual delete
		$provider = $this->factory->getProviderForType($share->getShareType());
		$provider->delete($share);

		// All the deleted shares caused by this delete
		$deletedShares[] = $share;

		//Format hook info
		$formattedDeletedShares = \array_map('self::formatUnshareHookParams', $deletedShares);

		$hookParams['deletedShares'] = $formattedDeletedShares;

		// Emit post hook
		\OC_Hook::emit('OCP\Share', 'post_unshare', $hookParams);
		$afterEvent = new GenericEvent(null, ['shareData' => $hookParams['deletedShares'], 'shareObject' => $share]);
		$this->eventDispatcher->dispatch('share.afterDelete', $afterEvent);
	}

	/**
	 * Unshare a file as the recipient.
	 * This can be different from a regular delete for example when one of
	 * the users in a groups deletes that share. But the provider should
	 * handle this.
	 *
	 * @param \OCP\Share\IShare $share
	 * @param string $recipientId
	 */
	public function deleteFromSelf(\OCP\Share\IShare $share, $recipientId) {
		list($providerId, ) = $this->splitFullId($share->getFullId());
		$provider = $this->factory->getProvider($providerId);

		$provider->deleteFromSelf($share, $recipientId);

		// Emit post hook. The parameter data structure is slightly different
		// from the post_unshare hook to maintain backward compatibility with
		// Share 1.0: the array contains all the key-value pairs from the old
		// library plus some new ones.
		$hookParams = self::formatUnshareHookParams($share);
		$hookParams['itemTarget'] = $hookParams['fileTarget'];
		$hookParams['unsharedItems'] = [$hookParams];
		\OC_Hook::emit('OCP\Share', 'post_unshareFromSelf', $hookParams);
		$event = new GenericEvent(null, [
			'shareRecipient' => $recipientId,
			'shareOwner' => $share->getSharedBy(),
			'recipientPath' => $share->getTarget(),
			'ownerPath' => $share->getNode()->getPath(),
			'nodeType' => $share->getNodeType()]);
		$this->eventDispatcher->dispatch('fromself.unshare', $event);
	}

	/**
	 * @inheritdoc
	 */
	public function moveShare(\OCP\Share\IShare $share, $recipientId) {
		return $this->updateShareForRecipient($share, $recipientId);
	}

	/**
	 * @inheritdoc
	 */
	public function updateShareForRecipient(\OCP\Share\IShare $share, $recipientId) {
		list($providerId, ) = $this->splitFullId($share->getFullId());
		$provider = $this->factory->getProvider($providerId);

		return $provider->updateForRecipient($share, $recipientId);
	}

	/**
	 * @inheritdoc
	 */
	public function getAllSharesBy($userId, $shareTypes, $nodeIDs, $reshares = false) {
		// This function requires at least 1 node (parent folder)
		if (empty($nodeIDs)) {
			throw new \InvalidArgumentException('Array of nodeIDs empty');
		}
		// This will ensure that if there are multiple share providers for the same share type, we will execute it in batches
		$shares = [];

		$providerIdMap = $this->shareTypeToProviderMap($shareTypes);

		$today = new \DateTime();
		foreach ($providerIdMap as $providerId => $shareTypeArray) {
			// Get provider from cache
			$provider = $this->factory->getProvider($providerId);

			$queriedShares = $provider->getAllSharesBy($userId, $shareTypeArray, $nodeIDs, $reshares);
			foreach ($queriedShares as $queriedShare) {
				if ($queriedShare->getShareType() === \OCP\Share::SHARE_TYPE_LINK && $queriedShare->getExpirationDate() !== null &&
					$queriedShare->getExpirationDate() <= $today
				) {
					try {
						$this->deleteShare($queriedShare);
					} catch (NotFoundException $e) {
						//Ignore since this basically means the share is deleted
					}
					continue;
				}
				\array_push($shares, $queriedShare);
			}
		}

		return $shares;
	}

	/**
	 * @inheritdoc
	 */
	public function getSharesBy($userId, $shareType, $path = null, $reshares = false, $limit = 50, $offset = 0) {
		if ($path !== null &&
				!($path instanceof \OCP\Files\File) &&
				!($path instanceof \OCP\Files\Folder)) {
			throw new \InvalidArgumentException('invalid path');
		}

		$provider = $this->factory->getProviderForType($shareType);

		$shares = $provider->getSharesBy($userId, $shareType, $path, $reshares, $limit, $offset);

		/*
		 * Work around so we don't return expired shares but still follow
		 * proper pagination.
		 */
		if ($shareType === \OCP\Share::SHARE_TYPE_LINK) {
			$shares2 = [];
			$today = new \DateTime();

			while (true) {
				$added = 0;
				foreach ($shares as $share) {
					// Check if the share is expired and if so delete it
					if ($share->getExpirationDate() !== null &&
						$share->getExpirationDate() <= $today
					) {
						try {
							$this->deleteShare($share);
						} catch (NotFoundException $e) {
							//Ignore since this basically means the share is deleted
						}
						continue;
					}
					$added++;
					$shares2[] = $share;

					if (\count($shares2) === $limit) {
						break;
					}
				}

				if (\count($shares2) === $limit) {
					break;
				}

				// If there was no limit on the select we are done
				if ($limit === -1) {
					break;
				}

				$offset += $added;

				// Fetch again $limit shares
				$shares = $provider->getSharesBy($userId, $shareType, $path, $reshares, $limit, $offset);

				// No more shares means we are done
				if (empty($shares)) {
					break;
				}
			}

			$shares = $shares2;
		}

		return $shares;
	}

	/**
	 * @inheritdoc
	 */
	public function getSharedWith($userId, $shareType, $node = null, $limit = 50, $offset = 0) {
		$provider = $this->factory->getProviderForType($shareType);

		return $provider->getSharedWith($userId, $shareType, $node, $limit, $offset);
	}

	/**
	 * @inheritdoc
	 */
	public function getAllSharedWith($userId, $shareTypes, $node = null) {
		$shares = [];
		
		// Aggregate all required $shareTypes by mapping provider to supported shareTypes
		$providerIdMap = $this->shareTypeToProviderMap($shareTypes);
		foreach ($providerIdMap as $providerId => $shareTypeArray) {
			// Get provider from cache
			$provider = $this->factory->getProvider($providerId);
			
			// Obtain all shares for all the supported provider types
			$queriedShares = $provider->getAllSharedWith($userId, $node);
			$shares = \array_merge($shares, $queriedShares);
		}

		return $shares;
	}
	
	/**
	 * @inheritdoc
	 */
	public function getShareById($id, $recipient = null) {
		if ($id === null) {
			throw new ShareNotFound();
		}

		list($providerId, $id) = $this->splitFullId($id);
		$provider = $this->factory->getProvider($providerId);

		$share = $provider->getShareById($id, $recipient);

		// Validate link shares expiration date
		if ($share->getShareType() === \OCP\Share::SHARE_TYPE_LINK &&
			$share->getExpirationDate() !== null &&
			$share->getExpirationDate() <= new \DateTime()) {
			$this->deleteShare($share);
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
		$types = [\OCP\Share::SHARE_TYPE_USER, \OCP\Share::SHARE_TYPE_GROUP];
		$providers = [];
		$results = [];

		foreach ($types as $type) {
			$provider = $this->factory->getProviderForType($type);
			// store this way to deduplicate entries by id
			$providers[$provider->identifier()] = $provider;
		}

		foreach ($providers as $provider) {
			$results = \array_merge($results, $provider->getSharesByPath($path));
		}

		return $results;
	}

	/**
	 * Get the share by token possible with password
	 *
	 * @param string $token
	 * @return Share
	 *
	 * @throws ShareNotFound
	 */
	public function getShareByToken($token) {
		$provider = $this->factory->getProviderForType(\OCP\Share::SHARE_TYPE_LINK);

		try {
			$share = $provider->getShareByToken($token);
		} catch (ShareNotFound $e) {
			$share = null;
		}

		// If it is not a link share try to fetch a federated share by token
		if ($share === null) {
			$provider = $this->factory->getProviderForType(\OCP\Share::SHARE_TYPE_REMOTE);
			$share = $provider->getShareByToken($token);
		}

		if ($share->getExpirationDate() !== null &&
			$share->getExpirationDate() <= new \DateTime()) {
			$this->deleteShare($share);
			throw new ShareNotFound();
		}

		/*
		 * Reduce the permissions for link shares if public upload is not enabled
		 */
		if ($share->getShareType() === \OCP\Share::SHARE_TYPE_LINK &&
			!$this->shareApiLinkAllowPublicUpload()) {
			$share->setPermissions($share->getPermissions() & ~(\OCP\Constants::PERMISSION_CREATE | \OCP\Constants::PERMISSION_UPDATE));
		}

		return $share;
	}

	/**
	 * Verify the password of a public share
	 *
	 * @param \OCP\Share\IShare $share
	 * @param string $password
	 * @return bool
	 */
	public function checkPassword(\OCP\Share\IShare $share, $password) {
		if ($share->getShareType() !== \OCP\Share::SHARE_TYPE_LINK) {
			//TODO maybe exception?
			return false;
		}

		if ($password === null || $share->getPassword() === null) {
			return false;
		}

		$newHash = '';
		if (!$this->hasher->verify($password, $share->getPassword(), $newHash)) {
			return false;
		}

		if (!empty($newHash)) {
			$share->setPassword($newHash);
			$provider = $this->factory->getProviderForType($share->getShareType());
			$provider->update($share);
		}

		return true;
	}

	/**
	 * @inheritdoc
	 */
	public function userDeleted($uid) {
		$types = [\OCP\Share::SHARE_TYPE_USER, \OCP\Share::SHARE_TYPE_GROUP, \OCP\Share::SHARE_TYPE_LINK, \OCP\Share::SHARE_TYPE_REMOTE];

		foreach ($types as $type) {
			$provider = $this->factory->getProviderForType($type);
			$provider->userDeleted($uid, $type);
		}
	}

	/**
	 * @inheritdoc
	 */
	public function groupDeleted($gid) {
		$provider = $this->factory->getProviderForType(\OCP\Share::SHARE_TYPE_GROUP);
		$provider->groupDeleted($gid);
	}

	/**
	 * @inheritdoc
	 */
	public function userDeletedFromGroup($uid, $gid) {
		$provider = $this->factory->getProviderForType(\OCP\Share::SHARE_TYPE_GROUP);
		$provider->userDeletedFromGroup($uid, $gid);
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
	 * Create a new share
	 * @return \OCP\Share\IShare;
	 */
	public function newShare() {
		return new \OC\Share20\Share($this->rootFolder, $this->userManager);
	}

	/**
	 * Is the share API enabled
	 *
	 * @return bool
	 */
	public function shareApiEnabled() {
		return $this->config->getAppValue('core', 'shareapi_enabled', 'yes') === 'yes';
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
	 * Is password on public link requires (fallback to shareApiLinkEnforcePasswordReadOnly)
	 *
	 * @return bool
	 */
	public function shareApiLinkEnforcePassword() {
		return $this->shareApiLinkEnforcePasswordReadOnly();
	}

	/**
	 * Is password enforced for read-only shares?
	 *
	 * @return bool
	 */
	public function shareApiLinkEnforcePasswordReadOnly() {
		return $this->config->getAppValue('core', 'shareapi_enforce_links_password_read_only', 'no') === 'yes';
	}

	/**
	 * Is password enforced for read & write shares?
	 *
	 * @return bool
	 */
	public function shareApiLinkEnforcePasswordReadWrite() {
		return $this->config->getAppValue('core', 'shareapi_enforce_links_password_read_write', 'no') === 'yes';
	}

	/**
	 * Is password enforced for write-only shares?
	 *
	 * @return bool
	 */
	public function shareApiLinkEnforcePasswordWriteOnly() {
		return $this->config->getAppValue('core', 'shareapi_enforce_links_password_write_only', 'no') === 'yes';
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
		return $this->shareApiLinkDefaultExpireDate() &&
			$this->config->getAppValue('core', 'shareapi_enforce_expire_date', 'no') === 'yes';
	}

	/**
	 * Number of default expire days
	 *shareApiLinkAllowPublicUpload
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

	/**
	 * check if user can only share with group members
	 * @return bool
	 */
	public function shareWithGroupMembersOnly() {
		return $this->config->getAppValue('core', 'shareapi_only_share_with_group_members', 'no') === 'yes';
	}

	/**
	 * check if user can only share with groups he's member of
	 * @return bool
	 */
	public function shareWithMembershipGroupOnly() {
		return $this->config->getAppValue('core', 'shareapi_only_share_with_membership_groups', 'no') === 'yes';
	}

	/**
	 * Check if users can share with groups
	 * @return bool
	 */
	public function allowGroupSharing() {
		return $this->config->getAppValue('core', 'shareapi_allow_group_sharing', 'yes') === 'yes';
	}

	/**
	 * Copied from \OC_Util::isSharingDisabledForUser
	 *
	 * @param string $userId
	 * @return bool
	 */
	public function sharingDisabledForUser($userId) {
		if ($userId === null) {
			return false;
		}

		if (isset($this->sharingDisabledForUsersCache[$userId])) {
			return $this->sharingDisabledForUsersCache[$userId];
		}

		if ($this->config->getAppValue('core', 'shareapi_exclude_groups', 'no') === 'yes') {
			$groupsList = $this->config->getAppValue('core', 'shareapi_exclude_groups_list', '');
			$excludedGroups = \json_decode($groupsList);
			if ($excludedGroups === null) {
				$excludedGroups = \explode(',', $groupsList);
				$newValue = \json_encode($excludedGroups);
				$this->config->setAppValue('core', 'shareapi_exclude_groups_list', $newValue);
			}
			$user = $this->userManager->get($userId);
			$usersGroups = $this->groupManager->getUserGroupIds($user);
			$matchingGroups = \array_intersect($usersGroups, $excludedGroups);
			if (!empty($matchingGroups)) {
				// If the user is a member of any of the excluded groups they cannot use sharing
				$this->sharingDisabledForUsersCache[$userId] = true;
				return true;
			}
		}

		$this->sharingDisabledForUsersCache[$userId] = false;
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function outgoingServer2ServerSharesAllowed() {
		return $this->config->getAppValue('files_sharing', 'outgoing_server2server_share_enabled', 'yes') === 'yes';
	}
}
