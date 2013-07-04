<?php
/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

require_once 'phpass/PasswordHash.php';

/**
 * Class for user management in a SQL Database (e.g. MySQL, SQLite)
 */
class OC_User_Database extends OC_User_Backend {
	/**
	 * @var PasswordHash
	 */
	static private $hasher = null;

	private function getHasher() {
		if (!self::$hasher) {
			//we don't want to use DES based crypt(), since it doesn't return a hash with a recognisable prefix
			$forcePortable = (CRYPT_BLOWFISH != 1);
			self::$hasher = new PasswordHash(8, $forcePortable);
		}
		return self::$hasher;
	}

	private function hashPassword($password) {
		$hasher = $this->getHasher();
		return $hasher->HashPassword($password . OC_Config::getValue('passwordsalt', ''));
	}

	private function checkPasswordHash($password, $hash) {
		$hasher = $this->getHasher();
		return $hasher->CheckPassword($password . OC_Config::getValue('passwordsalt', ''), $hash);
	}

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
		$hash = $this->hashPassword($password);
		$query = OC_DB::prepare('INSERT INTO `*PREFIX*users` ( `uid`, `password` ) VALUES( ?, ? )');
		$result = $query->execute(array($uid, $hash));

		return (bool)$result;
	}

	/**
	 * @brief delete a user
	 * @param string $uid The username of the user to delete
	 * @return bool
	 *
	 * Deletes a user
	 */
	public function deleteUser($uid) {
		// Delete user-group-relation
		$query = OC_DB::prepare('DELETE FROM `*PREFIX*users` WHERE `uid` = ?');
		$query->execute(array($uid));
		return true;
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
		$hash = $this->hashPassword($password);
		$query = OC_DB::prepare('UPDATE `*PREFIX*users` SET `password` = ? WHERE `uid` = ?');
		$query->execute(array($hash, $uid));
		return true;
	}

	/**
	 * @brief Set display name
	 * @param string $uid The username
	 * @param string $displayName The new display name
	 * @return bool
	 *
	 * Change the display name of a user
	 */
	public function setDisplayName($uid, $displayName) {
		$query = OC_DB::prepare('UPDATE `*PREFIX*users` SET `displayname` = ? WHERE `uid` = ?');
		$query->execute(array($displayName, $uid));
		return true;
	}

	/**
	 * @brief get display name of the user
	 * @param string $uid user ID of the user
	 * @return string display name
	 */
	public function getDisplayName($uid) {
		$query = OC_DB::prepare('SELECT `displayname` FROM `*PREFIX*users` WHERE `uid` = ?');
		$result = $query->execute(array($uid));
		if ($row = $result->fetchRow()) {
			$displayName = trim($row['displayname']);
			if (!empty($displayName)) {
				return $displayName;
			}
		}
		return $uid;
	}

	/**
	 * @brief Get a list of all display names
	 * @param string $search
	 * @param int $limit
	 * @param int $offset
	 * @return array with  all displayNames (value) and the corresponding uids (key)
	 *
	 * Get a list of all display names and user ids.
	 */
	public function getDisplayNames($search = '', $limit = null, $offset = null) {
		$displayNames = array();
		if ($search) {
			$query = OC_DB::prepare('SELECT `uid`, `displayname` FROM `*PREFIX*users`'
			. ' WHERE (`displayname` LIKE ?) OR (`displayname` = "" AND `uid` LIKE ?)', $limit, $offset);
			$result = $query->execute(array('%' . $search . '%', '%' . $search . '%'));
		} else {
			$query = OC_DB::prepare('SELECT `uid`, `displayname` FROM `*PREFIX*users`', $limit, $offset);
			$result = $query->execute();
		}

		while ($row = $result->fetchRow()) {
			if (!empty($row['displayname'])) {
				$displayNames[$row['uid']] = $row['displayname'];
			} else {
				$displayNames[$row['uid']] = $row['uid'];
			}
		}

		return $displayNames;
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
		$query = OC_DB::prepare('SELECT `uid`, `password` FROM `*PREFIX*users` WHERE LOWER(`uid`) = LOWER(?)');
		$result = $query->execute(array($uid));

		$row = $result->fetchRow();
		if ($row) {
			$storedHash = $row['password'];
			if ($this->checkPasswordHash($password, $storedHash)) {
				return $row['uid'];
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	/**
	 * @brief Get a list of all users
	 * @returns array with all uids
	 *
	 * Get a list of all users.
	 */
	public function getUsers($search = '', $limit = null, $offset = null) {
		if ($search) {
			$query = OC_DB::prepare('SELECT `uid` FROM `*PREFIX*users` WHERE `uid` LIKE ?', $limit, $offset);
			$result = $query->execute(array('%' . $search . '%'));
		} else {
			$query = OC_DB::prepare('SELECT `uid` FROM `*PREFIX*users`', $limit, $offset);
			$result = $query->execute();
		}

		$users = array();
		while ($row = $result->fetchRow()) {
			$users[] = $row['uid'];
		}
		return $users;
	}

	/**
	 * @brief check if a user exists
	 * @param string $uid the username
	 * @return boolean
	 */
	public function userExists($uid) {
		$query = OC_DB::prepare('SELECT COUNT(*) FROM `*PREFIX*users` WHERE LOWER(`uid`) = LOWER(?)');
		$result = $query->execute(array($uid));
		if (OC_DB::isError($result)) {
			OC_Log::write('core', OC_DB::getErrorMessage($result), OC_Log::ERROR);
			return false;
		}
		return $result->fetchOne() > 0;
	}

	/**
	 * @brief get the user's home directory
	 * @param string $uid the username
	 * @return boolean
	 */
	public function getHome($uid) {
		if ($this->userExists($uid)) {
			return OC_Config::getValue("datadirectory", OC::$SERVERROOT . "/data") . '/' . $uid;
		} else {
			return false;
		}
	}

	/**
	 * @return bool
	 */
	public function hasUserListings() {
		return true;
	}

}
