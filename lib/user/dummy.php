<?php

/**
 * ownCloud
 *
 * @author Frank Karlitschek
 * @copyright 2012 Frank Karlitschek frank@owncloud.org
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

/**
 * dummy user backend, does not keep state, only for testing use
 */
class OC_User_Dummy extends OC_User_Backend {
	private $users = array();

	/**
	 * @brief Create a new user
	 * @param string $uid The username of the user to create
	 * @param string $password The password of the new user
	 * @return bool
	 *
	 * Creates a new user. Basic checking of username is done in OC_User
	 * itself, not in its subclasses.
	 */
	public function createUser($uid, $password) {
		$lowerUid = strtolower($uid);
		$this->users[$lowerUid] = array('uid' => $uid, 'password' => $password, 'displayname' => $uid);
	}

	/**
	 * @brief delete a user
	 * @param string $uid The username of the user to delete
	 * @return bool
	 *
	 * Deletes a user
	 */
	public function deleteUser($uid) {
		$lowerUid = strtolower($uid);
		if (isset($this->users[$uid])) {
			unset($this->users[$lowerUid]);
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @brief Set password
	 * @param string $uid The username
	 * @param string $password The new password
	 * @return bool
	 *
	 * Change the password of a user
	 */
	public function setPassword($uid, $password) {
		$lowerUid = strtolower($uid);
		if (isset($this->users[$lowerUid])) {
			$this->users[$lowerUid]['password'] = $password;
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @brief Check if the password is correct
	 * @param string $uid The username
	 * @param string $password The password
	 * @return string
	 *
	 * Check if the password is correct without logging in the user
	 * returns the user id or false
	 */
	public function checkPassword($uid, $password) {
		$lowerUid = strtolower($uid);
		if (isset($this->users[$lowerUid])) {
			if ($this->users[$lowerUid]['password'] == $password) {
				return $this->users[$lowerUid]['uid'];
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	/**
	 * @brief Get a list of all users
	 * @param string $search
	 * @param int $limit
	 * @param int $offset
	 * @return array with all uids
	 *
	 * Get a list of all users.
	 */
	public function getUsers($search = '', $limit = null, $offset = null) {
		$result = array();
		$search = strtolower($search);
		foreach ($this->users as $uid => $user) {
			if ($offset > 0) {
				$offset--;
			} else {
				if (is_null($limit) or $limit > 0) {
					if ($search == '' or strpos($uid, $search) !== false) {
						$result[] = $user['uid'];
						if (!is_null($limit)) {
							$limit--;
						}
					}
				}
			}
		}
		return $result;
	}

	/**
	 * @brief check if a user exists
	 * @param string $uid the username
	 * @return boolean
	 */
	public function userExists($uid) {
		$lowerUid = strtolower($uid);
		return isset($this->users[$lowerUid]);
	}

	/**
	 * @return bool
	 */
	public function hasUserListings() {
		return true;
	}

	public function setDisplayName($uid, $displayName) {
		$lowerUid = strtolower($uid);
		$this->users[$lowerUid]['displayname'] = $displayName;
	}

	public function getDisplayName($uid) {
		$lowerUid = strtolower($uid);
		return $this->users[$lowerUid]['displayname'];
	}
}
