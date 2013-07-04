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
		$query = 'INSERT INTO `*PREFIX*users` ( `uid`, `password`, `uid_lower` ) VALUES( ?, ?, ? )';
		$result = \OC_DB::executeAudited($query, array($uid, $hash, strtolower($uid)));

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
		$uid = strtolower($uid);
		$sql = 'DELETE FROM `*PREFIX*users` WHERE `uid_lower` = ?';
		\OC_DB::executeAudited($sql, array($uid));
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
		$uid = strtolower($uid);
		$sql = 'UPDATE `*PREFIX*users` SET `password` = ? WHERE `uid_lower` = ?';
		\OC_DB::executeAudited($sql, array($hash, $uid));
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
		$uid = strtolower($uid);
		$sql = 'UPDATE `*PREFIX*users` SET `displayname` = ? WHERE `uid_lower` = ?';
		\OC_DB::executeAudited($sql, array($displayName, $uid));
		return true;
	}

	/**
	 * @brief get display name of the user
	 * @param string $uid user ID of the user
	 * @return string display name
	 */
	public function getDisplayName($uid) {
		$uid = strtolower($uid);
		$sql = 'SELECT `displayname` FROM `*PREFIX*users` WHERE `uid_lower` = ?';
		$result = \OC_DB::executeAudited($sql, array($uid));
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
	 * @return array with all displayNames (value) and the corresponding uids (key)
	 *
	 * Get a list of all display names and user ids.
	 */
	public function getDisplayNames($search = '', $limit = null, $offset = null) {
		$displayNames = array();
		if ($search) {
			$sql = 'SELECT `uid`, `displayname` FROM `*PREFIX*users`'
				. ' WHERE (`displayname` LIKE ?) OR (`displayname` = "" AND `uid` LIKE ?)';
			$result = \OC_DB::executeAudited(array('sql' => $sql, 'limit' => $limit, 'offset' => $offset), array('%' . $search . '%', '%' . $search . '%'));
		} else {
			$sql = 'SELECT `uid`, `displayname` FROM `*PREFIX*users`';
			$result = \OC_DB::executeAudited(array('sql' => $sql, 'limit' => $limit, 'offset' => $offset));
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
		$uid = strtolower($uid);
		$sql = 'SELECT `uid`, `password` FROM `*PREFIX*users` WHERE `uid_lower` = ?';
		$result = \OC_DB::executeAudited($sql, array($uid));

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
			$search = strtolower($search);
			$sql = 'SELECT `uid` FROM `*PREFIX*users` WHERE `uid_lower` LIKE ?';
			$result = \OC_DB::executeAudited(array('sql' => $sql, 'limit' => $limit, 'offset' => $offset), array('%' . $search . '%'));
		} else {
			$sql = 'SELECT `uid` FROM `*PREFIX*users`';
			$result = \OC_DB::executeAudited(array('sql' => $sql, 'limit' => $limit, 'offset' => $offset));
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
		$uid = strtolower($uid);
		$sql = 'SELECT COUNT(*) FROM `*PREFIX*users` WHERE `uid_lower` = ?';
		$result = \OC_DB::executeAudited($sql, array($uid));
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

	public function setUidLowerRows() {
		$query = \OC_DB::prepare('UPDATE `*PREFIX*users` SET `uid_lower` = LOWER(`uid`)');
		$query->execute();
	}
}
