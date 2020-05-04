<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgeargroup.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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
use OC\User\Manager;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IConfig;
use OCP\Files\NotFoundException;

/**
 * Class representing a deleted user.
 * This class is intended to be used internally.
 */
class DeletedUser implements IUser {
	/** @var Emitter */
	private $emitter;
	/** @var IConfig */
	private $config;
	/** @var IURLGenerator */
	private $urlGenerator;
	/** @var string */
	private $uid;

	public function __construct(Manager $userManager, IConfig $config, IURLGenerator $urlGenerator, $uid) {
		$this->emitter = $userManager;  // use the userManager as event emitter
		// this is required because there could be listeners listening in the
		// userManager class, and we want to trigger the same
		// (this behaviour is copied from \OC\User\Manager::getUserObject)
		$this->config = $config;
		$this->urlGenerator = $urlGenerator;
		$this->uid = $uid;
	}

	public function getAccountId() {
		return $this->uid;
	}

	/**
	 * @return string
	 */
	public function getUID() {
		return $this->uid;
	}

	/**
	 * @return string
	 */
	public function getUserName() {
		return $this->config->getUserValue($this->uid, 'core', 'username', $this->uid);
	}

	public function setUserName($userName) {
		throw new \Exception("Not Implemented", 1);
	}

	/**
	 * Return the uid as displayname. Consider the account table's information deleted.
	 * @return string
	 */
	public function getDisplayName() {
		return $this->uid;
	}

	public function setDisplayName($displayName) {
		throw new \Exception("Not Implemented", 1);
	}

	/**
	 * Consider the user didn't login (return 0)
	 * @return int
	 */
	public function getLastLogin() {
		return 0;
	}

	/**
	 * Match \OC\User\User implementation returning true on first update, but
	 * don't do anything
	 */
	public function updateLastLoginTimestamp() {
		return true;
	}

	/**
	 * This is mostly copied from \OC\User\User, but taking into account the
	 * account info is missing
	 */
	public function delete() {
		if ($this->emitter) {
			$this->emitter->emit('\OC\User', 'preDelete', [$this]);
		}

		// account deletion in the backend must have been performed out of here, otherwise
		// we shouldn't have reached this point. Skip the account deletion in the backend

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
		try {
			$userFolder = \OC::$server->getRootFolder()->get("/{$this->uid}");
			$userFolder->delete();
		} catch (NotFoundException $e) {
			// Do nothing if the folder doesn't exist
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

	public function setPassword($password, $recoveryPassword = null) {
		throw new \Exception("Not Implemented", 1);
	}

	public function getHome() {
		throw new \Exception("Not Implemented", 1);
	}

	public function getBackendClassName() {
		throw new \Exception("Not Implemented", 1);
	}

	public function canChangeAvatar() {
		return false;
	}

	public function canChangePassword() {
		return false;
	}

	public function canChangeDisplayName() {
		return false;
	}

	public function isEnabled() {
		return false;
	}

	public function setEnabled($enabled) {
		throw new \Exception("Not Implemented", 1);
	}

	/**
	 * @return string|null
	 */
	public function getEMailAddress() {
		return null;
	}

	public function getAvatarImage($size) {
		throw new \Exception("Not Implemented", 1);
	}

	public function getCloudId() {
		$server = $this->urlGenerator->getAbsoluteURL('/');
		return $this->uid . '@' . \rtrim($this->removeProtocolFromUrl($server), '/');
	}

	/**
	 * Copied from \OC\User\User
	 */
	private function removeProtocolFromUrl($url) {
		if (\strpos($url, 'https://') === 0) {
			return \substr($url, \strlen('https://'));
		} elseif (\strpos($url, 'http://') === 0) {
			return \substr($url, \strlen('http://'));
		}

		return $url;
	}

	public function setEMailAddress($mailAddress) {
		throw new \Exception("Not Implemented", 1);
	}

	public function getQuota() {
		return 'default';
	}

	public function setQuota($quota) {
		throw new \Exception("Not Implemented", 1);
	}

	public function setSearchTerms(array $terms) {
		throw new \Exception("Not Implemented", 1);
	}

	public function getSearchTerms() {
		return [];
	}
}
