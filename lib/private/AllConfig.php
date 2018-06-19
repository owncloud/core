<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
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

namespace OC;
use Doctrine\DBAL\Platforms\OraclePlatform;
use OC\Cache\CappedMemoryCache;
use OCP\IConfig;
use OCP\IDBConnection;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class to combine all the configuration options ownCloud offers
 */
class AllConfig implements IConfig {

	/** @var SystemConfig */
	private $systemConfig;

	/** @var IDBConnection */
	private $connection;

	/** @var EventDispatcher  */
	private $eventDispatcher;
	/**
	 * 3 dimensional array with the following structure:
	 * [ $userId =>
	 *     [ $appId =>
	 *         [ $key => $value ]
	 *     ]
	 * ]
	 *
	 * database table: preferences
	 *
	 * methods that use this:
	 *   - setUserValue
	 *   - getUserValue
	 *   - getUserKeys
	 *   - deleteUserValue
	 *   - deleteAllUserValues
	 *   - deleteAppFromAllUsers
	 *
	 * @var CappedMemoryCache $userCache
	 */
	private $userCache;

	/**
	 * AllConfig constructor.
	 *
	 * @param SystemConfig $systemConfig
	 * @param EventDispatcher|null $eventDispatcher
	 */
	public function __construct(SystemConfig $systemConfig, EventDispatcher $eventDispatcher) {
		$this->userCache = new CappedMemoryCache();
		$this->systemConfig = $systemConfig;
		$this->eventDispatcher = $eventDispatcher;
	}

	/**
	 * TODO - FIXME This fixes an issue with base.php that cause cyclic
	 * dependencies, especially with autoconfig setup
	 *
	 * Replace this by properly injected database connection. Currently the
	 * base.php triggers the getDatabaseConnection too early which causes in
	 * autoconfig setup case a too early distributed database connection and
	 * the autoconfig then needs to reinit all already initialized dependencies
	 * that use the database connection.
	 *
	 * otherwise a SQLite database is created in the wrong directory
	 * because the database connection was created with an uninitialized config
	 */
	private function fixDIInit() {
		if ($this->connection === null) {
			$this->connection = \OC::$server->getDatabaseConnection();
		}
	}

	/**
	 * Sets and deletes system wide values
	 *
	 * @param array $configs Associative array with `key => value` pairs
	 *                       If value is null, the config key will be deleted
	 */
	public function setSystemValues(array $configs) {
		$this->systemConfig->setValues($configs);
	}

	/**
	 * Sets a new system wide value
	 *
	 * @param string $key the key of the value, under which will be saved
	 * @param mixed $value the value that should be stored
	 */
	public function setSystemValue($key, $value) {
		$this->systemConfig->setValue($key, $value);
	}

	/**
	 * Looks up a system wide defined value
	 *
	 * @param string $key the key of the value, under which it was saved
	 * @param mixed $default the default value to be returned if the value isn't set
	 * @return mixed the value or $default
	 */
	public function getSystemValue($key, $default = '') {
		return $this->systemConfig->getValue($key, $default);
	}

	/**
	 * Looks up a system wide defined value and filters out sensitive data
	 *
	 * @param string $key the key of the value, under which it was saved
	 * @param mixed $default the default value to be returned if the value isn't set
	 * @return mixed the value or $default
	 */
	public function getFilteredSystemValue($key, $default = '') {
		return $this->systemConfig->getFilteredValue($key, $default);
	}

	/**
	 * Delete a system wide defined value
	 *
	 * @param string $key the key of the value, under which it was saved
	 */
	public function deleteSystemValue($key) {
		$this->systemConfig->deleteValue($key);
	}

	/**
	 * Get all keys stored for an app
	 *
	 * @param string $appName the appName that we stored the value under
	 * @return string[] the keys stored for the app
	 */
	public function getAppKeys($appName) {
		return \OC::$server->getAppConfig()->getKeys($appName);
	}

	/**
	 * Writes a new app wide value
	 *
	 * @param string $appName the appName that we want to store the value under
	 * @param string $key the key of the value, under which will be saved
	 * @param string|float|int $value the value that should be stored
	 */
	public function setAppValue($appName, $key, $value) {
		\OC::$server->getAppConfig()->setValue($appName, $key, $value);
	}

	/**
	 * Looks up an app wide defined value
	 *
	 * @param string $appName the appName that we stored the value under
	 * @param string $key the key of the value, under which it was saved
	 * @param string $default the default value to be returned if the value isn't set
	 * @return string the saved value
	 */
	public function getAppValue($appName, $key, $default = '') {
		return \OC::$server->getAppConfig()->getValue($appName, $key, $default);
	}

	/**
	 * Delete an app wide defined value
	 *
	 * @param string $appName the appName that we stored the value under
	 * @param string $key the key of the value, under which it was saved
	 */
	public function deleteAppValue($appName, $key) {
		\OC::$server->getAppConfig()->deleteKey($appName, $key);
	}

	/**
	 * Removes all keys in appconfig belonging to the app
	 *
	 * @param string $appName the appName the configs are stored under
	 */
	public function deleteAppValues($appName) {
		\OC::$server->getAppConfig()->deleteApp($appName);
	}

	/**
	 * Set a user defined value
	 *
	 * @param string $userId the userId of the user that we want to store the value under
	 * @param string $appName the appName that we want to store the value under
	 * @param string $key the key under which the value is being stored
	 * @param string|float|int $value the value that you want to store
	 * @param string $preCondition only update if the config value was previously the value passed as $preCondition
	 * @throws \OCP\PreConditionNotMetException if a precondition is specified and is not met
	 * @throws \UnexpectedValueException when trying to store an unexpected value
	 * @return bool
	 */
	public function setUserValue($userId, $appName, $key, $value, $preCondition = null) {
		if (!\is_int($value) && !\is_float($value) && !\is_string($value)) {
			throw new \UnexpectedValueException('Only integers, floats and strings are allowed as value');
		}

		// TODO - FIXME
		$this->fixDIInit();

		$preconditionArray = [];
		if ($preCondition !== null) {
			$preconditionArray = [
				'configvalue' => $preCondition,
			];
		}

		$arguments = [
			'uid' => $userId, 'key' => $key, 'value' => $value,
			'app' => $appName, 'precondition' => $preCondition
		];
		$this->eventDispatcher->dispatch('userpreferences.beforeSetValue',
			new GenericEvent(null, $arguments));
		$this->connection->setValues('preferences', [
			'userid' => $userId,
			'appid' => $appName,
			'configkey' => $key,
		], [
			'configvalue' => $value,
		], $preconditionArray);

		// only add to the cache if we already loaded data for the user
		if (isset($this->userCache[$userId])) {
			if (!isset($this->userCache[$userId][$appName])) {
				$this->userCache[$userId][$appName] = [];
			}
			$this->userCache[$userId][$appName][$key] = $value;
		}

		$this->eventDispatcher->dispatch('userpreferences.afterSetValue', new GenericEvent(null, $arguments));

		return true;
	}

	/**
	 * Getting a user defined value
	 *
	 * @param string $userId the userId of the user that we want to store the value under
	 * @param string $appName the appName that we stored the value under
	 * @param string $key the key under which the value is being stored
	 * @param mixed $default the default value to be returned if the value isn't set
	 * @return string
	 */
	public function getUserValue($userId, $appName, $key, $default = '') {
		$data = $this->getUserValues($userId);
		if (isset($data[$appName], $data[$appName][$key])) {
			return $data[$appName][$key];
		}
		return $default;
	}

	/**
	 * Get the keys of all stored by an app for the user
	 *
	 * @param string $userId the userId of the user that we want to store the value under
	 * @param string $appName the appName that we stored the value under
	 * @return string[]
	 */
	public function getUserKeys($userId, $appName) {
		$data = $this->getUserValues($userId);
		if (isset($data[$appName])) {
			return \array_keys($data[$appName]);
		}
		return [];
	}

	/**
	 * Delete a user value
	 *
	 * @param string $userId the userId of the user that we want to store the value under
	 * @param string $appName the appName that we stored the value under
	 * @param string $key the key under which the value is being stored
	 * @return bool
	 */
	public function deleteUserValue($userId, $appName, $key) {
		// TODO - FIXME
		$this->fixDIInit();

		$arguments = ['uid' => $userId, 'key' => $key, 'app' => $appName];
		$this->eventDispatcher->dispatch('userpreferences.beforeDeleteValue',
			new GenericEvent(null, $arguments));

		$sql  = 'DELETE FROM `*PREFIX*preferences` '.
			'WHERE `userid` = ? AND `appid` = ? AND `configkey` = ?';
		$this->connection->executeUpdate($sql, [$userId, $appName, $key]);

		if (isset($this->userCache[$userId], $this->userCache[$userId][$appName])) {
			unset($this->userCache[$userId][$appName][$key]);
		}

		$this->eventDispatcher->dispatch('userpreferences.afterDeleteValue',
			new GenericEvent(null, $arguments));
		return true;
	}

	/**
	 * Delete all user values
	 *
	 * @param string $userId the userId of the user that we want to remove all values from
	 * @return bool
	 */
	public function deleteAllUserValues($userId) {
		// TODO - FIXME
		$this->fixDIInit();

		$arguments = ['uid' => $userId];
		$this->eventDispatcher->dispatch('userpreferences.beforeDeleteUser', new GenericEvent(null, $arguments));

		$sql  = 'DELETE FROM `*PREFIX*preferences` '.
			'WHERE `userid` = ?';
		$this->connection->executeUpdate($sql, [$userId]);

		unset($this->userCache[$userId]);

		$this->eventDispatcher->dispatch('userpreferences.afterDeleteUser', new GenericEvent(null, $arguments));

		return true;
	}

	/**
	 * Delete all user related values of one app
	 *
	 * @param string $appName the appName of the app that we want to remove all values from
	 * @return bool
	 */
	public function deleteAppFromAllUsers($appName) {
		// TODO - FIXME
		$this->fixDIInit();

		$arguments = ['app' => $appName];
		$this->eventDispatcher->dispatch('userpreferences.beforeDeleteApp', new GenericEvent(null, $arguments));

		$sql  = 'DELETE FROM `*PREFIX*preferences` '.
			'WHERE `appid` = ?';
		$this->connection->executeUpdate($sql, [$appName]);

		foreach ($this->userCache as &$userCache) {
			unset($userCache[$appName]);
		}

		$this->eventDispatcher->dispatch('userpreferences.afterDeleteApp', new GenericEvent(null, $arguments));
		return true;
	}

	/**
	 * Returns all user configs sorted by app of one user
	 *
	 * @param string $userId the user ID to get the app configs from
	 * @return array[] - 2 dimensional array with the following structure:
	 *     [ $appId =>
	 *         [ $key => $value ]
	 *     ]
	 */
	private function getUserValues($userId) {
		// TODO - FIXME
		$this->fixDIInit();

		if (isset($this->userCache[$userId])) {
			return $this->userCache[$userId];
		}
		$data = [];
		$query = 'SELECT `appid`, `configkey`, `configvalue` FROM `*PREFIX*preferences` WHERE `userid` = ?';
		$result = $this->connection->executeQuery($query, [$userId]);
		while ($row = $result->fetch()) {
			$appId = $row['appid'];
			if (!isset($data[$appId])) {
				$data[$appId] = [];
			}
			$data[$appId][$row['configkey']] = $row['configvalue'];
		}
		$this->userCache[$userId] = $data;
		return $data;
	}

	/**
	 * Fetches a mapped list of userId -> value, for a specified app and key and a list of user IDs.
	 *
	 * @param string $appName app to get the value for
	 * @param string $key the key to get the value for
	 * @param array $userIds the user IDs to fetch the values for
	 * @return array Mapped values: userId => value
	 */
	public function getUserValueForUsers($appName, $key, $userIds) {
		// TODO - FIXME
		$this->fixDIInit();

		if (empty($userIds) || !\is_array($userIds)) {
			return [];
		}

		$chunkedUsers = \array_chunk($userIds, 50, true);
		$placeholders50 = \implode(',', \array_fill(0, 50, '?'));

		$userValues = [];
		foreach ($chunkedUsers as $chunk) {
			$queryParams = $chunk;
			// create [$app, $key, $chunkedUsers]
			\array_unshift($queryParams, $key);
			\array_unshift($queryParams, $appName);

			$placeholders = (\sizeof($chunk) === 50) ? $placeholders50 :  \implode(',', \array_fill(0, \sizeof($chunk), '?'));

			$query    = 'SELECT `userid`, `configvalue` ' .
						'FROM `*PREFIX*preferences` ' .
						'WHERE `appid` = ? AND `configkey` = ? ' .
						'AND `userid` IN (' . $placeholders . ')';
			$result = $this->connection->executeQuery($query, $queryParams);

			while ($row = $result->fetch()) {
				$userValues[$row['userid']] = $row['configvalue'];
			}
		}

		return $userValues;
	}

	/**
	 * Determines the users that have the given value set for a specific app-key-pair
	 *
	 * @param string $appName the app to get the user for
	 * @param string $key the key to get the user for
	 * @param string $value the value to get the user for
	 * @return array of user IDs
	 */
	public function getUsersForUserValue($appName, $key, $value) {
		// TODO - FIXME
		$this->fixDIInit();

		$queryBuilder = $this->connection->getQueryBuilder();
		$queryBuilder->select('userid')
			->from('preferences')
			->where($queryBuilder->expr()->eq(
				'appid', $queryBuilder->createNamedParameter($appName))
			)
			->andWhere($queryBuilder->expr()->eq(
				'configkey', $queryBuilder->createNamedParameter($key))
			)
			->andWhere($queryBuilder->expr()->isNotNull('configvalue'));

		if ($this->connection->getDatabasePlatform() instanceof OraclePlatform) {
			//oracle can only compare the first 4000 bytes of a CLOB column
			$queryBuilder->andWhere($queryBuilder->expr()->eq(
				$queryBuilder->createFunction('dbms_lob.substr(`configvalue`, 4000, 1)'),
				$queryBuilder->createNamedParameter($value))
			);
		} else {
			$queryBuilder->andWhere($queryBuilder->expr()->eq(
				'configvalue', $queryBuilder->createNamedParameter($value))
			);
		}
		$query = $queryBuilder->execute();

		$userIDs = [];
		while ($row = $query->fetch()) {
			$userIDs[] = $row['userid'];
		}

		$query->closeCursor();

		return $userIDs;
	}

	/**
	 * In some environments the system config file is readonly. Find out if this
	 * is the case.
	 *
	 * @return boolean
	 * @since 10.0.3
	 */
	public function isSystemConfigReadOnly() {
		return $this->systemConfig->isReadOnly();
	}
}
