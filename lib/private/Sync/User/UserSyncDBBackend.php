<?php
/**
 * @copyright Copyright (c) 2023, ownCloud GmbH
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

namespace OC\Sync\User;

use OC\User\Database;
use OCP\UserInterface;
use OCP\Sync\User\IUserSyncBackend;
use OCP\Sync\User\SyncingUser;

class UserSyncDBBackend implements IUserSyncBackend {
	/** @var Database */
	private $dbUserBackend;

	private $pointer = 0;
	private $cachedUserData = ['min' => 0, 'max' => 0, 'last' => false];

	public function __construct(Database $dbUserBackend) {
		$this->dbUserBackend = $dbUserBackend;
	}

	/**
	 * This is intended to be used just for unit tests
	 */
	public function getPointer(): int {
		return $this->pointer;
	}

	/**
	 * This is intended to be used just for unit tests
	 */
	public function getCachedUserData(): array {
		return $this->cachedUserData;
	}

	/**
	 * @inheritDoc
	 */
	public function resetPointer() {
		$this->pointer = 0;
		$this->cachedUserData = ['min' => 0, 'max' => 0, 'last' => false];
	}

	/**
	 * @inheritDoc
	 */
	public function getNextUser(): ?SyncingUser {
		$chunk = 500;
		$minPointer = $this->cachedUserData['min'];
		if (!isset($this->cachedUserData['users'][$this->pointer - $minPointer])) {
			if ($this->cachedUserData['last']) {
				// we've reached the end
				return null;
			}

			$users = $this->dbUserBackend->getUsersData('', $chunk, $this->pointer);

			$minPointer = $this->pointer;
			$this->cachedUserData = [
				'min' => $this->pointer,
				'max' => $this->pointer + $chunk,
				'last' => empty($users),
				'users' => $users,
			];
		}

		$syncingUser = null;
		if (isset($this->cachedUserData['users'][$this->pointer - $minPointer])) {
			$data = $this->cachedUserData['users'][$this->pointer - $minPointer];
			$uid = $data['uid'];
			$displayname = $data['displayname'];
			if ($displayname === null || $displayname === '') {
				$displayname = $uid;
			}
			$syncingUser = new SyncingUser($uid);
			$syncingUser->setDisplayName($displayname);
			$syncingUser->setHome($this->dbUserBackend->getHome($uid));
		}
		$this->pointer++;
		return $syncingUser;
	}

	/**
	 * @inheritDoc
	 */
	public function getSyncingUser(string $id): ?SyncingUser {
		$syncingUser = null;

		$data = $this->dbUserBackend->getUserData($id);
		if ($data !== false) {
			$uid = $data['uid'];
			$displayname = $data['displayname'];
			if ($displayname === null || $displayname === '') {
				$displayname = $uid;
			}
			$syncingUser = new SyncingUser($uid);
			$syncingUser->setDisplayName($displayname);
			$syncingUser->setHome($this->dbUserBackend->getHome($uid));
		}
		return $syncingUser;
	}

	/**
	 * @inheritDoc
	 */
	public function userCount(): ?int {
		$nUsers = $this->dbUserBackend->countUsers();
		if ($nUsers === false) {
			return null;
		}
		return $nUsers;
	}

	/**
	 * @inheritDoc
	 */
	public function getUserInterface(): UserInterface {
		return $this->dbUserBackend;
	}
}
