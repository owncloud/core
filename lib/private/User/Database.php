<?php
/**
 * @author adrien <adrien.waksberg@believedigital.com>
 * @author Aldo "xoen" Giambelluca <xoen@xoen.org>
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author fabian <fabian@web2.0-apps.de>
 * @author Georg Ehrke <georg@owncloud.com>
 * @author Jakob Sack <mail@jakobsack.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Michael Gapczynski <GapczynskiM@gmail.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author nishiki <nishiki@yaegashi.fr>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
/*
 *
 * The following SQL statement is just a help for developers and will not be
 * executed!
 *
 * CREATE TABLE `users` (
 *   `uid` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
 *   `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 *   PRIMARY KEY (`uid`)
 * ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
 *
 */

namespace OC\User;

use OC\Cache\CappedMemoryCache;
use OCP\IDBConnection;
use OCP\IUserBackend;
use OCP\User\IProvidesDisplayNameBackend;
use OCP\User\IProvidesEMailBackend;
use OCP\User\IProvidesHomeBackend;
use OCP\Util;

/**
 * Class for user management in a SQL Database (e.g. MySQL, SQLite)
 */
class Database extends Backend implements IUserBackend {
	/** @var CappedMemoryCache */
	private $cache;

	/** @var IDBConnection */
	private $conn;

	/**
	 * OC_User_Database constructor.
	 */
	public function __construct() {
		$this->cache = new CappedMemoryCache();
		$this->conn = \OC::$server->getDatabaseConnection();
	}

	/**
	 * Create a new user
	 * @param string $uid The username of the user to create
	 * @param string $password The password of the new user
	 * @return bool
	 *
	 * Creates a new user. Basic checking of username is done in OC_User
	 * itself, not in its subclasses.
	 */
	public function createUser($uid, $password) {
		unset($this->cache[$uid]); // make sure we are reading from the db
		if (!$this->userExists($uid)) {
			$query = \OC_DB::prepare('INSERT INTO `*PREFIX*users` ( `uid`, `password` ) VALUES( ?, ? )');
			$result = $query->execute([$uid, \OC::$server->getHasher()->hash($password)]);

			if ($result) {
				unset($this->cache[$uid]); // invalidate non existing user in cache
			}

			return $result ? true : false;
		}

		return false;
	}

	/**
	 * delete a user
	 * @param string $uid The username of the user to delete
	 * @return bool
	 *
	 * Deletes a user
	 */
	public function deleteUser($uid) {
		// Delete user-group-relation
		$query = \OC_DB::prepare('DELETE FROM `*PREFIX*users` WHERE `uid` = ?');
		$result = $query->execute([$uid]);

		if (isset($this->cache[$uid])) {
			unset($this->cache[$uid]);
		}

		return $result ? true : false;
	}

	/**
	 * Set password
	 * @param string $uid The username
	 * @param string $password The new password
	 * @return bool
	 *
	 * Change the password of a user
	 */
	public function setPassword($uid, $password) {
		if ($this->userExists($uid)) {
			$query = \OC_DB::prepare('UPDATE `*PREFIX*users` SET `password` = ? WHERE `uid` = ?');
			$result = $query->execute([\OC::$server->getHasher()->hash($password), $uid]);

			return $result ? true : false;
		}

		return false;
	}

	/**
	 * Check if the password is correct
	 * @param string $userName The username
	 * @param string $password The password
	 * @return string the uuid
	 *
	 * Check if the password is correct without logging in the user
	 * returns the uuid or false
	 */
	public function checkPassword($userName, $password) {

		$qb = $this->conn->getQueryBuilder();
		$qb->select(['a.uuid', 'u.password'])
			->from('accounts', 'a')
			->join('a', 'users', 'u', $qb->expr()->eq('u.uid', 'a.uuid')) // TODO use id foreign key
			->where($qb->expr()->eq('a.user_name',  $qb->createNamedParameter(mb_strtolower($userName))));

		$result = $qb->execute();

		$rows = $result->fetchAll();
		if (count($rows) === 1) {
			$storedHash = $rows[0]['password'];
			$newHash = '';
			if(\OC::$server->getHasher()->verify($password, $storedHash, $newHash)) {
				$uuid = $rows[0]['uuid'];
				if(!empty($newHash)) {
					$this->setPassword($uuid, $password);
					unset($this->cache[$uuid]); // invalidate cache
				}
				return $uuid;
			}
		}

		return false;
	}

	/**
	 * Load an user in the cache
	 * @param string $uid the username
	 * @return boolean true if user was found, false otherwise
	 */
	private function loadUser($uid) {
		// if not in cache (false is a valid value)
		if (!isset($this->cache[$uid]) && $this->cache[$uid] !== false) {
			$query = \OC_DB::prepare('SELECT `uid` FROM `*PREFIX*users` WHERE LOWER(`uid`) = LOWER(?)');
			$result = $query->execute([$uid]);

			if ($result === false) {
				Util::writeLog('core', \OC_DB::getErrorMessage(), Util::ERROR);
				return false;
			}

			// "uid" is primary key, so there can only be a single result
			if ($row = $result->fetchRow()) {
				$this->cache[$uid]['uid'] = $row['uid'];
			} else {
				$this->cache[$uid] = false;
				return false;
			}
			$result->closeCursor();
		}

		return true;
	}

	/**
	/**
	 * check if a user exists
	 * @param string $uid the username
	 * @return boolean
	 */
	public function userExists($uid) {
		$this->loadUser($uid);
		return !empty($this->cache[$uid]);
	}

	/**
	 * @return bool
	 */
	public function hasUserListings() {
		return true;
	}

	/**
	 * counts the users in the database
	 *
	 * @return int|bool
	 */
	public function countUsers() {
		$query = \OC_DB::prepare('SELECT COUNT(*) FROM `*PREFIX*users`');
		$result = $query->execute();
		if ($result === false) {
			Util::writeLog('core', \OC_DB::getErrorMessage(), Util::ERROR);
			return false;
		}
		return $result->fetchOne();
	}

	/**
	 * returns the username for the given login name in the correct casing
	 *
	 * @param string $loginName
	 * @return string|false
	 */
	public function loginName2UserName($loginName) {
		if ($this->userExists($loginName)) {
			return $this->cache[$loginName]['uid'];
		}

		return false;
	}

	/**
	 * Backend name to be shown in user management
	 * @return string the name of the backend to be shown
	 */
	public function getBackendName(){
		return 'Database';
	}

	public static function preLoginNameUsedAsUserName($param) {
		if(!isset($param['uid'])) {
			throw new \Exception('key uid is expected to be set in $param');
		}

		$backends = \OC::$server->getUserManager()->getBackends();
		foreach ($backends as $backend) {
			if ($backend instanceof Database) {
				/** @var \OC\User\Database $backend */
				$uid = $backend->loginName2UserName($param['uid']);
				if ($uid !== false) {
					$param['uid'] = $uid;
					return;
				}
			}
		}

	}
}
