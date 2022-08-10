<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Tom Needham <tom@owncloud.com>
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 * @author Vincent Petry <pvince81@owncloud.com>
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

namespace OC\User;

use OC\Files\Cache\Storage;
use OC\Group\Manager;
use OC\Hooks\Emitter;
use OC_Helper;
use OCP\Events\EventEmitterTrait;
use OCP\IAvatarManager;
use OCP\IImage;
use OCP\ILogger;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IConfig;
use OCP\IUserBackend;
use OCP\IUserSession;
use OCP\User\NotPermittedActionException;
use OCP\PreConditionNotMetException;
use OCP\User\IChangePasswordBackend;
use OCP\User\UserExtendedAttributesEvent;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;

class User implements IUser {
	use EventEmitterTrait;

	/** @var Account */
	private $account;

	/** @var Emitter|Manager $emitter */
	private $emitter;

	/** @var \OCP\IConfig $config */
	private $config;

	/** @var IAvatarManager */
	private $avatarManager;

	/** @var IURLGenerator */
	private $urlGenerator;

	/** @var EventDispatcher */
	private $eventDispatcher;

	/** @var AccountMapper */
	private $mapper;

	/** @var \OC\Group\Manager  */
	private $groupManager;

	/** @var Session  */
	private $userSession;

	/** @var null|array */
	private $userExtendedAttributes = null;

	/**
	 * This flag is true by default. This flag when set to false
	 * would not allow the set operations in this class. Or in other
	 * words the update to the accounts table will be restricted through this flag.
	 * This flag is only modified inside getExtendedAttributes method.
	 * @var bool
	 */
	private $allowUserAccountUpdate = true;

	/**
	 * User constructor.
	 *
	 * @param Account $account
	 * @param AccountMapper $mapper
	 * @param null $emitter
	 * @param IConfig|null $config
	 * @param null $urlGenerator
	 * @param EventDispatcher|null $eventDispatcher
	 * @param Manager|null $groupManager
	 * @param Session|null $userSession
	 */
	public function __construct(
		Account $account,
		AccountMapper $mapper,
		$emitter = null,
		IConfig $config = null,
		$urlGenerator = null,
		EventDispatcher $eventDispatcher = null,
		\OC\Group\Manager $groupManager = null,
		Session $userSession = null
	) {
		$this->account = $account;
		$this->mapper = $mapper;
		$this->emitter = $emitter;
		if ($eventDispatcher === null) {
			$eventDispatcher = \OC::$server->getEventDispatcher();
		}
		$this->eventDispatcher = $eventDispatcher;
		if ($config === null) {
			$config = \OC::$server->getConfig();
		}
		$this->config = $config;
		$this->urlGenerator = $urlGenerator;
		if ($this->urlGenerator === null) {
			$this->urlGenerator = \OC::$server->getURLGenerator();
		}
		$this->groupManager = $groupManager;
		if ($this->groupManager === null) {
			$this->groupManager = \OC::$server->getGroupManager();
		}
		$this->userSession = $userSession;
		if ($this->userSession === null) {
			$this->userSession = \OC::$server->getUserSession();
		}
	}

	/**
	 * get the user id
	 *
	 * @return string
	 */
	public function getUID() {
		return $this->account->getUserId();
	}

	/**
	 * get the user name
	 * TODO move username to account table
	 *
	 * @return string
	 */
	public function getUserName() {
		$uid = $this->getUID();
		return $this->config->getUserValue($uid, 'core', 'username', $uid);
	}

	/**
	 * set the user name
	 * TODO move username to account table
	 *
	 * @param string $userName
	 * @throws NotPermittedActionException
	 */
	public function setUserName($userName) {
		if (!$this->allowUserAccountUpdate) {
			throw new NotPermittedActionException("Operation cannot be allowed as other apps are fetching extended attributes of this user.");
		}

		$currentUserName = $this->getUserName();
		if ($userName !== $currentUserName) {
			$uid = $this->getUID();
			try {
				$this->config->setUserValue($uid, 'core', 'username', $userName);
			} catch (PreConditionNotMetException $e) {
				// ignore, because precondition is empty
			}
		}
	}

	/**
	 * get the display name for the user, if no specific display name is set it will fallback to the user id
	 *
	 * @return string
	 */
	public function getDisplayName() {
		$displayName = $this->account->getDisplayName();
		if (\strlen($displayName) === 0) {
			$displayName = $this->getUID();
		}
		return $displayName;
	}

	/**
	 * set the displayname for the user
	 *
	 * @param string $displayName
	 * @return bool
	 * @throws NotPermittedActionException
	 */
	public function setDisplayName($displayName) {
		if (!$this->allowUserAccountUpdate) {
			throw new NotPermittedActionException("Operation cannot be allowed as other apps are fetching extended attributes of this user.");
		}

		if (!$this->canChangeDisplayName()) {
			return false;
		}
		$displayName = \trim($displayName);
		if ($displayName === $this->account->getDisplayName()) {
			return false;
		}
		$this->account->setDisplayName($displayName);
		$this->mapper->update($this->account);

		$backend = $this->account->getBackendInstance();
		if ($backend->implementsActions(Backend::SET_DISPLAYNAME)) {
			/* @phan-suppress-next-line PhanUndeclaredMethod */
			$backend->setDisplayName($this->account->getUserId(), $displayName);
		}

		$this->triggerChange('displayName', $displayName);

		return true;
	}

	/**
	 * set the email address of the user
	 *
	 * @param string|null $mailAddress
	 * @return void
	 * @throws NotPermittedActionException
	 * @since 9.0.0
	 */
	public function setEMailAddress($mailAddress) {
		if (!$this->allowUserAccountUpdate) {
			throw new NotPermittedActionException("Operation cannot be allowed as other apps are fetching extended attributes of this user.");
		}

		$mailAddress = \trim($mailAddress);
		if ($mailAddress === $this->account->getEmail()) {
			return;
		}
		$this->account->setEmail($mailAddress);
		$this->mapper->update($this->account);
		$this->triggerChange('eMailAddress', $mailAddress);
	}

	/**
	 * returns the timestamp of the user's last login or 0 if the user did never
	 * login
	 *
	 * @return int
	 */
	public function getLastLogin() {
		return (int)$this->account->getLastLogin();
	}

	/**
	 * updates the timestamp of the most recent login of this user
	 *
	 * @return void
	 */
	public function updateLastLoginTimestamp() {
		$this->account->setLastLogin(\time());
		$this->mapper->update($this->account);
	}

	/**
	 * Delete the user
	 *
	 * @return bool
	 */
	public function delete() {
		if ($this->emitter) {
			$this->emitter->emit('\OC\User', 'preDelete', [$this]);
		}
		// get the home now because it won't return it after user deletion
		$homePath = $this->getHome();
		$this->mapper->delete($this->account);
		$bi = $this->account->getBackendInstance();
		if ($bi !== null) {
			$bi->deleteUser($this->account->getUserId());
		}

		// FIXME: Feels like an hack - suggestions?

		// We have to delete the user from all groups
		foreach (\OC::$server->getGroupManager()->getUserGroups($this) as $group) {
			$group->removeUser($this);
		}
		// Delete the user's keys in preferences
		\OC::$server->getConfig()->deleteAllUserValues($this->getUID());

		// Delete all mount points for user
		\OC::$server->getUserStoragesService()->deleteAllMountsForUser($this);
		//Delete external storage or remove user from applicableUsers list
		\OC::$server->getGlobalStoragesService()->deleteAllForUser($this);

		// Delete user files in /data/
		if ($homePath !== false) {
			// FIXME: this operates directly on FS, should use View instead...
			// also this is not testable/mockable...
			\OC_Helper::rmdirr($homePath);
		}

		// Delete the users entry in the storage table
		Storage::remove('home::' . $this->getUID());
		Storage::remove('object::user:' . $this->getUID());

		\OC::$server->getCommentsManager()->deleteReferencesOfActor('users', $this->getUID());
		\OC::$server->getCommentsManager()->deleteReadMarksFromUser($this);

		if ($this->emitter) {
			$this->emitter->emit('\OC\User', 'postDelete', [$this]);
		}
		return true;
	}

	/**
	 * Set the user's password
	 *
	 * @param string $password
	 * @param string $recoveryPassword for the encryption app to reset encryption keys
	 * @return bool
	 * @throws \InvalidArgumentException
	 * @throws NotPermittedActionException
	 */
	public function setPassword($password, $recoveryPassword = null) {
		if (!$this->allowUserAccountUpdate) {
			throw new NotPermittedActionException("Operation cannot be allowed as other apps are fetching extended attributes of this user.");
		}

		if (\OCP\Util::isEmptyString($password)) {
			throw new \InvalidArgumentException('Password cannot be empty');
		}

		return $this->emittingCall(function () use (&$password, &$recoveryPassword) {
			if ($this->emitter) {
				$this->emitter->emit('\OC\User', 'preSetPassword', [$this, $password, $recoveryPassword]);
				\OC::$server->getEventDispatcher()->dispatch(
					new GenericEvent(null, ['uid'=> $this->getUID(), 'password' => $password]),
					'OCP\User::validatePassword'
				);
			}
			if ($this->canChangePassword()) {
				/** @var IChangePasswordBackend $backend */
				$backend = $this->account->getBackendInstance();
				'@phan-var IChangePasswordBackend $backend';
				$result = $backend->setPassword($this->getUID(), $password);
				if ($result) {
					if ($this->emitter) {
						$this->emitter->emit('\OC\User', 'postSetPassword', [$this, $password, $recoveryPassword]);
					}
					$this->config->deleteUserValue($this->getUID(), 'owncloud', 'lostpassword');
				}
				return !($result === false);
			} else {
				return false;
			}
		}, [
			'before' => ['user' => $this, 'password' => $password, 'recoveryPassword' => $recoveryPassword],
			'after' => ['user' => $this, 'password' => $password, 'recoveryPassword' => $recoveryPassword]
		], 'user', 'setpassword');
	}

	/**
	 * get the users home folder to mount
	 *
	 * @return string
	 */
	public function getHome() {
		return $this->account->getHome();
	}

	public function setHome(string $newLocation) {
		$this->account->setHome($newLocation);
	}

	/**
	 * Get the name of the backend class the user is connected with
	 *
	 * @return string
	 */
	public function getBackendClassName() {
		$b = $this->account->getBackendInstance();
		if ($b instanceof IUserBackend) {
			return $b->getBackendName();
		}
		return $this->account->getBackend();
	}

	/**
	 * check if the backend allows the user to change his avatar on Personal page
	 *
	 * @return bool
	 */
	public function canChangeAvatar() {
		$backend = $this->account->getBackendInstance();
		if ($backend === null) {
			return false;
		}
		if ($backend->implementsActions(Backend::PROVIDE_AVATAR)) {
			/* @phan-suppress-next-line PhanUndeclaredMethod */
			return $backend->canChangeAvatar($this->getUID());
		}
		return true;
	}

	/**
	 * check if the backend supports changing passwords
	 *
	 * @return bool
	 */
	public function canChangePassword() {
		$backend = $this->account->getBackendInstance();
		if ($backend === null) {
			return false;
		}
		return $backend instanceof IChangePasswordBackend || $backend->implementsActions(Backend::SET_PASSWORD);
	}

	/**
	 * check if the backend supports changing display names
	 *
	 * @return bool
	 */
	public function canChangeDisplayName() {
		if ($this->userSession instanceof IUserSession) {
			$user = $this->userSession->getUser();
			if (
				($this->config->getSystemValue('allow_user_to_change_display_name') === false) &&
				(($user !== null) && (!$this->groupManager->isAdmin($user->getUID()))) &&
				(($user !== null) && (!$this->groupManager->getSubAdmin()->isSubAdmin($user)))
			) {
				return false;
			}
		}

		$backend = $this->account->getBackendInstance();
		if ($backend === null) {
			return false;
		}
		return $backend->implementsActions(Backend::SET_DISPLAYNAME);
	}

	/**
	 * check if the backend supports changing email addresses
	 *
	 * @return bool
	 */
	public function canChangeMailAddress() {
		if ($this->userSession instanceof IUserSession) {
			$user = $this->userSession->getUser();
			if (
				($this->config->getSystemValue('allow_user_to_change_mail_address') === false) &&
				(($user !== null) && (!$this->groupManager->isAdmin($user->getUID()))) &&
				(($user !== null) && (!$this->groupManager->getSubAdmin()->isSubAdmin($user)))
			) {
				return false;
			}
		}

		return true;
	}

	/**
	 * check if the user is enabled
	 *
	 * @return bool
	 */
	public function isEnabled() {
		return $this->account->getState() === Account::STATE_ENABLED;
	}

	/**
	 * Set the enabled status for the user
	 *
	 * @param bool $enabled
	 * @throws NotPermittedActionException
	 */
	public function setEnabled($enabled) {
		if (!$this->allowUserAccountUpdate) {
			throw new NotPermittedActionException("Operation cannot be allowed as other apps are fetching extended attributes of this user.");
		}

		if ($enabled === true) {
			$this->account->setState(Account::STATE_ENABLED);
		} else {
			$this->account->setState(Account::STATE_DISABLED);
		}
		$this->mapper->update($this->account);

		if ($this->eventDispatcher) {
			$this->eventDispatcher->dispatch(new GenericEvent($this), self::class . '::postSetEnabled');
		}
	}

	/**
	 * get the users email address
	 *
	 * @return string|null
	 * @since 9.0.0
	 */
	public function getEMailAddress() {
		return $this->account->getEmail();
	}

	/**
	 * get the users' quota
	 *
	 * @return string
	 * @since 9.0.0
	 */
	public function getQuota() {
		$quota = $this->account->getQuota();
		if ($quota === null) {
			return 'default';
		}
		return $quota;
	}

	/**
	 * Set the users' quota
	 *
	 * @param string $quota
	 * @return void
	 * @throws NotPermittedActionException
	 * @throws PreConditionNotMetException
	 * @since 9.0.0
	 */
	public function setQuota($quota) {
		if (!$this->allowUserAccountUpdate) {
			throw new NotPermittedActionException("Operation cannot be allowed as other apps are fetching extended attributes of this user.");
		}

		if ($quota !== 'none' and $quota !== 'default') {
			$quota = OC_Helper::computerFileSize($quota);
			$quota = OC_Helper::humanFileSize($quota);
		}
		$this->account->setQuota($quota);
		// Set the quota on the preferences table as an override
		$this->config->setUserValue($this->getUID(), 'files', 'quota', $quota);
		$this->mapper->update($this->account);
		$this->triggerChange('quota', $quota);
	}

	/**
	 * get the avatar image if it exists
	 *
	 * @param int $size
	 * @return IImage|null
	 * @since 9.0.0
	 */
	public function getAvatarImage($size) {
		// delay the initialization
		if ($this->avatarManager === null) {
			$this->avatarManager = \OC::$server->getAvatarManager();
		}

		$avatar = $this->avatarManager->getAvatar($this->getUID());
		$image = $avatar->get($size);
		if ($image) {
			return $image;
		}

		return null;
	}

	/**
	 * get the federation cloud id
	 *
	 * @return string
	 * @since 9.0.0
	 */
	public function getCloudId() {
		$uid = $this->getUID();
		$server = $this->urlGenerator->getAbsoluteURL('/');
		return $uid . '@' . \rtrim($this->removeProtocolFromUrl($server), '/');
	}

	/**
	 * @param string $url
	 * @return string
	 */
	private function removeProtocolFromUrl($url) {
		if (\strpos($url, 'https://') === 0) {
			return \substr($url, \strlen('https://'));
		} elseif (\strpos($url, 'http://') === 0) {
			return \substr($url, \strlen('http://'));
		}

		return $url;
	}

	public function triggerChange($feature, $value = null) {
		if ($this->emitter && \in_array($feature, $this->account->getUpdatedFields())) {
			$this->emitter->emit('\OC\User', 'changeUser', [$this, $feature, $value]);
		}
	}

	/**
	 * @return string[]
	 * @since 10.0.1
	 */
	public function getSearchTerms() {
		$terms = [];
		foreach ($this->mapper->findByAccountId($this->account->getId()) as $term) {
			$terms[] = $term->getTerm();
		}
		return $terms;
	}

	/**
	 * @param string[] $terms
	 * @throws NotPermittedActionException
	 * @since 10.0.1
	 */
	public function setSearchTerms(array $terms) {
		if (!$this->allowUserAccountUpdate) {
			throw new NotPermittedActionException("Operation cannot be allowed as other apps are fetching extended attributes of this user.");
		}

		// Check length of terms, cut if too long
		$terms = \array_map(function ($term) {
			return \substr($term, 0, 191);
		}, $terms);
		$this->mapper->setTermsForAccount($this->account->getId(), $terms);
	}

	/**
	 * @return integer
	 * @since 11.0.0
	 */
	public function getAccountId() {
		return $this->account->getId();
	}

	/**
	 * get the attributes of user for apps
	 * This method sends event which is listened by the apps. The apps would add attributes which
	 * are specific to this user. Say for example a user might have access to a blog site, in such
	 * case the app which is responsible for this control could listen to this event and
	 * add an attribute say:
	 * "blogSite" => "https://foo/bar"
	 * Apps add attributes and their value in the form of key => value. The userExtendedAttributes
	 * does not care which app added the attributes. It only considers about the
	 * attributes.
	 * The argument clearCache is used to clear userExtendedAttributes. If there are
	 * external apps involved or under any circumstance we know there will be delay
	 * in response from the app, then its safe to use clearCache as false.
	 * New event is triggered under the following conditions:
	 * - if the userExtendedAttributes is null or empty array ( even if clearCache is set to false, in this condition, event will be triggered )
	 * - if clearCache is set to true
	 * The flag allowUserAccountUpdate is set to true by default. This flag is set to false before event is emitted.
	 * This flag is checked on all the set operations, in this class to make sure no user account
	 * table update is allowed when the extended attributes are provided by the apps. Once the
	 * event listeners have done their task, the flag is set back to true.
	 * The exception is thrown when the listener tries call this method again. This is to
	 * prevent infinite loop. Also the exceptions thrown during any operation by the listeners
	 * are allowed to go up. The exceptions are not caught in this method.
	 *
	 *
	 * @param bool $clearCache, set to true if user attributes should be created every time, else false is set to reuse the userExtendedAttributes cache.
	 * @return array
	 * @throws NotPermittedActionException
	 * @since 10.11.0
	 */
	public function getExtendedAttributes($clearCache = false) {
		if (!$this->allowUserAccountUpdate) {
			throw new NotPermittedActionException("Operation cannot be allowed as other apps are fetching extended attributes of this user.");
		}
		/**
		 * using empty because userExtendedAttributes could either be null or empty array
		 * or an array of attributes
		 */
		if ($clearCache || !isset($this->userExtendedAttributes) || $this->userExtendedAttributes === []) {
			$userExtendedAttributesEvent = new UserExtendedAttributesEvent($this);

			/**
			 * Restrict the user accounts table update for the set operations as the apps
			 * listening to the event below will be providing extended attributes of this
			 * user.
			 */
			$this->allowUserAccountUpdate = false;
			try {
				$this->eventDispatcher->dispatch(UserExtendedAttributesEvent::USER_EXTENDED_ATTRIBUTES, $userExtendedAttributesEvent);
			} finally {
				//Reset the flag to true so that account table can now be allowed to update.
				$this->allowUserAccountUpdate = true;
			}

			//Just overwrite the userExtendedAttributes if clearCache is true
			$this->userExtendedAttributes = $userExtendedAttributesEvent->getAttributes();
		}

		return $this->userExtendedAttributes;
	}
}
