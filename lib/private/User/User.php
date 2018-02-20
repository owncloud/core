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
use OC\Hooks\Emitter;
use OC\MembershipManager;
use OC_Helper;
use OCP\Events\EventEmitterTrait;
use OCP\IAvatarManager;
use OCP\IImage;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IConfig;
use OCP\IUserBackend;
use OCP\IUserSession;
use OCP\User\IChangePasswordBackend;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;

class User implements IUser {

	use EventEmitterTrait;
	/** @var Account */
	private $account;

	/** @var Emitter|Manager $emitter */
	private $emitter;

	/** @var IConfig $config */
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

	/** @var MembershipManager */
	private $membershipManager;

	/**
	 * User constructor.
	 *
	 * @param Account $account
	 * @param AccountMapper $mapper
	 * @param MembershipManager $membershipManager
	 * @param null $emitter
	 * @param IConfig|null $config
	 * @param null $urlGenerator
	 * @param EventDispatcher|null $eventDispatcher
	 * @param \OC\Group\Manager|null $groupManager
	 * @param Session|null $userSession
	 */
	public function __construct(Account $account, AccountMapper $mapper, MembershipManager $membershipManager,
								$emitter = null, IConfig $config = null,
								$urlGenerator = null, EventDispatcher $eventDispatcher = null,
								\OC\Group\Manager $groupManager = null, Session $userSession = null
	) {
		$this->account = $account;
		$this->mapper = $mapper;
		$this->emitter = $emitter;
		$this->membershipManager = $membershipManager;
		$this->eventDispatcher = $eventDispatcher;
		if($config === null) {
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
	 * get the display name for the user, if no specific display name is set it will fallback to the user id
	 *
	 * @return string
	 */
	public function getDisplayName() {
		$displayName = $this->account->getDisplayName();
		if (empty($displayName)) {
			$displayName = $this->getUID();
		}
		return $displayName;
	}

	/**
	 * set the display name for the user
	 *
	 * @param string $displayName
	 * @return bool
	 */
	public function setDisplayName($displayName) {
		if (!$this->canChangeDisplayName()) {
			return false;
		}
		$displayName = trim($displayName);
		if ($displayName === $this->account->getDisplayName()) {
			return false;
		}
		$this->account->setDisplayName($displayName);
		$this->mapper->update($this->account);

		$backend = $this->account->getBackendInstance();
		if ($backend->implementsActions(Backend::SET_DISPLAYNAME)) {
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
	 * @since 9.0.0
	 */
	public function setEMailAddress($mailAddress) {
		$mailAddress = trim($mailAddress);
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
	 */
	public function updateLastLoginTimestamp() {
		$firstTimeLogin = ($this->getLastLogin() === 0);
		$this->account->setLastLogin(time());
		$this->mapper->update($this->account);
		return $firstTimeLogin;
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

		// Delete the user's keys in preferences
		\OC::$server->getConfig()->deleteAllUserValues($this->getUID());

		// Delete user files in /data/
		$homePath = $this->getHome();
		if ($homePath !== false) {
			// FIXME: this operates directly on FS, should use View instead...
			// also this is not testable/mockable...
			\OC_Helper::rmdirr($homePath);
		}

		// Delete the users entry in the storage table
		Storage::remove('home::' . $this->getUID());

		\OC::$server->getCommentsManager()->deleteReferencesOfActor('users', $this->getUID());
		\OC::$server->getCommentsManager()->deleteReadMarksFromUser($this);

		// Remove the user from all groups
		$this->membershipManager->removeMemberships($this->account->getId());

		// Delete user in external backend
		$bi = $this->account->getBackendInstance();
		if ($bi !== null) {
			$bi->deleteUser($this->account->getUserId());
		}

		// Delete user internally
		$this->mapper->delete($this->account);

		if ($this->emitter) {
			$this->emitter->emit('\OC\User', 'postDelete', [$this]);
		}
		return true;
	}

	/**
	 * Set the password of the user
	 *
	 * @param string $password
	 * @param string $recoveryPassword for the encryption app to reset encryption keys
	 * @return bool
	 */
	public function setPassword($password, $recoveryPassword = null) {
		return $this->emittingCall(function () use (&$password, &$recoveryPassword) {
			if ($this->emitter) {
				$this->emitter->emit('\OC\User', 'preSetPassword', [$this, $password, $recoveryPassword]);
				\OC::$server->getEventDispatcher()->dispatch(
					'OCP\User::validatePassword',
					new GenericEvent(null, ['uid'=> $this->getUID(), 'password' => $password])
				);
			}
			if ($this->canChangePassword()) {
				/** @var IChangePasswordBackend $backend */
				$backend = $this->account->getBackendInstance();
				$result = $backend->setPassword($this->getUID(), $password);
				if ($result) {
					if ($this->emitter) {
						$this->emitter->emit('\OC\User', 'postSetPassword', [$this, $password, $recoveryPassword]);
					}
					$this->config->deleteUserValue($this->getUID(), 'owncloud', 'lostpassword');
				}
				return !($result === false);
			}
			return false;
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

	/**
	 * Get the name of the backend class the user is connected with
	 *
	 * @return string
	 */
	public function getBackendClassName() {
		$b = $this->account->getBackendInstance();
		if($b instanceof IUserBackend) {
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
		// Only Admin and SubAdmins are allowed to change display name
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
	 * check if the user is enabled
	 *
	 * @return bool
	 */
	public function isEnabled() {
		return $this->account->getState() === Account::STATE_ENABLED;
	}

	/**
	 * set the enabled status for the user
	 *
	 * @param bool $enabled
	 */
	public function setEnabled($enabled) {
		if ($enabled === true) {
			$this->account->setState(Account::STATE_ENABLED);
		} else {
			$this->account->setState(Account::STATE_DISABLED);
		}
		$this->mapper->update($this->account);

		if ($this->eventDispatcher){
			$this->eventDispatcher->dispatch(self::class . '::postSetEnabled',  new GenericEvent($this));
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
	 * set the users' quota
	 *
	 * @param string $quota
	 * @return void
	 * @since 9.0.0
	 */
	public function setQuota($quota) {
		if($quota !== 'none' and $quota !== 'default') {
			$quota = OC_Helper::computerFileSize($quota);
			$quota = OC_Helper::humanFileSize($quota);
		}
		$this->account->setQuota($quota);
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
		return $uid . '@' . rtrim( $this->removeProtocolFromUrl($server), '/');
	}

	/**
	 * @param string $url
	 * @return string
	 */
	private function removeProtocolFromUrl($url) {
		if (strpos($url, 'https://') === 0) {
			return substr($url, strlen('https://'));
		}
		if (strpos($url, 'http://') === 0) {
			return substr($url, strlen('http://'));
		}

		return $url;
	}

	public function triggerChange($feature, $value = null) {
		if ($this->emitter && in_array($feature, $this->account->getUpdatedFields(), true)) {
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
	 * @since 10.0.1
	 */
	public function setSearchTerms(array $terms) {
		// Check length of terms, cut if too long
		$terms = array_map(function($term) {
			return substr($term, 0, 191);
		}, $terms);
		$this->mapper->setTermsForAccount($this->account->getId(), $terms);
	}
}
