<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Jakob Sack <mail@jakobsack.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
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

use OCP\IAppConfig;
use OCP\ICache;
use OCP\IDBConnection;

/**
 * This class provides an easy way for apps to store config values in the
 * database.
 */
class AppConfig implements IAppConfig {
	/**
	 * @var \OCP\IDBConnection $conn
	 */
	protected $conn;

	/**
	 * @var \OCP\ICache
	 */
	private $cache;

	private $ttl = 300;

	/**
	 * @param IDBConnection $conn
	 */
	public function __construct(IDBConnection $conn, ICache $cache) {
		$this->conn = $conn;
		$this->cache = $cache;
	}

	/**
	 * Get all apps using the config
	 *
	 * @return array an array of app ids
	 *
	 * This function returns a list of all apps that have at least one
	 * entry in the appconfig table.
	 */
	public function getApps() {
		$result = $this->cache->get('apps');
		if (empty($result)) {
			$sql = $this->conn->getQueryBuilder();
			$sql->selectDistinct('appid')
				->from('appconfig')
				->orderBy('appid');
			$query = $sql->execute();

			$result = $query->fetchAll();
			$query->closeCursor();

			$this->cache->set('apps', $result, $this->ttl);
		}
		return $result;
	}

	/**
	 * Get the available keys for an app
	 *
	 * @param string $app the app we are looking for
	 * @return array an array of key names
	 *
	 * This function gets all keys of an app. Please note that the values are
	 * not returned.
	 */
	public function getKeys($app) {
		$result = $this->cache->get('keysbyapp:'.$app);
		if (empty($result)) {
			$sql = $this->conn->getQueryBuilder();
			$sql->selectDistinct('configvalue')
				->from('appconfig')
				->where($sql->expr()->eq(
					'appid', $sql->createNamedParameter($app)
				))
				->orderBy('configvalue');
			$query = $sql->execute();

			$result = $query->fetchAll();
			$query->closeCursor();

			$this->cache->set('apps', $result, $this->ttl);
		}
		return $result;
	}

	/**
	 * Gets the config value
	 *
	 * @param string $app app
	 * @param string $key key
	 * @param string $default = null, default value if the key does not exist
	 * @return string the value or $default
	 *
	 * This function gets a value from the appconfig table. If the key does
	 * not exist the default value will be returned
	 */
	public function getValue($app, $key, $default = null) {
		if ($this->cache->hasKey($app.':'.$key)) {
			return $this->cache->get($app.':'.$key);
		} else {
			$sql = $this->conn->getQueryBuilder();
			$sql->select('configvalue')
				->from('appconfig')
				->where($sql->expr()->eq(
					'appid', $sql->createNamedParameter($app)
				))
				->andWhere($sql->expr()->eq(
					'configkey', $sql->createNamedParameter($key)
				));
			$query = $sql->execute();

			$result = $query->fetchColumn();
			$query->closeCursor();

			if ($result !== false) {
				$this->cache->set($app.':'.$key, $result, $this->ttl);
				return $result;
			}
		}

		return $default;
	}

	/**
	 * check if a key is set in the appconfig
	 *
	 * @param string $app
	 * @param string $key
	 * @return bool
	 */
	public function hasKey($app, $key) {
		if ($this->cache->hasKey($app.':'.$key)) {
			return true;
		} else {
			$sql = $this->conn->getQueryBuilder();
			$sql->select('configvalue')
				->from('appconfig')
				->where($sql->expr()->eq(
					'appid', $sql->createNamedParameter($app)
				))
				->andWhere($sql->expr()->eq(
					'configkey', $sql->createNamedParameter($key)
				));
			$query = $sql->execute();

			$result = $query->fetchColumn();
			$query->closeCursor();

			if ($result !== false) {
				$this->cache->set($app.':'.$key, $result, $this->ttl);
				return true;
			} else {
				return false;
			}

		}
	}

	/**
	 * Sets a value. If the key did not exist before it will be created.
	 *
	 * @param string $app app
	 * @param string $key key
	 * @param string $value value
	 * @return bool True if the value was inserted or updated, false if the value was the same
	 */
	public function setValue($app, $key, $value) {
		if (!$this->hasKey($app, $key)) {
			$inserted = (bool) $this->conn->insertIfNotExist('*PREFIX*appconfig', [
				'appid' => $app,
				'configkey' => $key,
				'configvalue' => $value,
			], [
				'appid',
				'configkey',
			]);

			if ($inserted) {
				$this->cache->set($app.':'.$key, $value, $this->ttl);
				$this->cache->clear('valuesbykey:'.$key);
				$this->cache->clear('valuesbyapp:'.$app);
				return true;
			}
		}

		$query = $this->conn->getQueryBuilder();
		$query->update('appconfig')
			->set('configvalue', $query->createNamedParameter($value))
			->where($query->expr()->eq(
				'appid', $query->createNamedParameter($app)
			))
			->andWhere($query->expr()->eq(
				'configkey', $query->createNamedParameter($key)
			));

		/*
		 * Only limit to the existing value for non-Oracle DBs:
		 * http://docs.oracle.com/cd/E11882_01/server.112/e26088/conditions002.htm#i1033286
		 * > Large objects (LOBs) are not supported in comparison conditions.
		 */
		if (!($this->conn instanceof \OC\DB\OracleConnection)) {
			// Only update the value when it is not the same
			$query->andWhere($query->expr()->neq(
				'configvalue', $query->createNamedParameter($value)
			));
		}

		$changedRow = (bool) $query->execute();

		$this->cache->set($app.':'.$key, $value, $this->ttl);
		$this->cache->clear('valuesbykey:'.$key);
		$this->cache->clear('valuesbyapp:'.$app);

		return $changedRow;
	}

	/**
	 * Deletes a key
	 *
	 * @param string $app app
	 * @param string $key key
	 * @return boolean|null
	 */
	public function deleteKey($app, $key) {

		$sql = $this->conn->getQueryBuilder();
		$sql->delete('appconfig')
			->where($sql->expr()->eq(
				'appid', $sql->createNamedParameter($app)
			))
			->andWhere($sql->expr()->eq(
				'configkey', $sql->createNamedParameter($key)
			));
		$sql->execute();

		$this->cache->remove($app.':'.$key);
		$this->cache->clear('valuesbykey:'.$key);
		$this->cache->clear('valuesbyapp:');
	}

	/**
	 * Remove app from appconfig
	 *
	 * @param string $app app
	 * @return boolean|null
	 *
	 * Removes all keys in appconfig belonging to the app.
	 */
	public function deleteApp($app) {

		$sql = $this->conn->getQueryBuilder();
		$sql->delete('appconfig')
			->where($sql->expr()->eq(
				'appid', $sql->createNamedParameter($app)
			));
		$sql->execute();

		$this->cache->clear($app);
		$this->cache->clear('valuesbykey:');
		$this->cache->clear('valuesbyapp:'.$app);
	}

	/**
	 * get multiple values, either the app or key can be used as wildcard by
	 * setting it to false
	 *
	 * @param string|false $app
	 * @param string|false $key
	 * @return array|false
	 */
	public function getValues($app, $key) {
		if (($app !== false) === ($key !== false)) {
			return false;
		}

		if ($key === false) {
			$result = $this->cache->get('valuesbyapp:'.$app);
			if (empty($result)) {
				$sql = $this->conn->getQueryBuilder();
				$sql->select(['configkey', 'configvalue'])
					->from('appconfig')
					->where($sql->expr()->eq(
						'appid', $sql->createNamedParameter($app)
					));
				$query = $sql->execute();

				$result = [];
				while ($row = $query->fetch()) {
					$result[$row['configkey']] = $row['configvalue'];
				}
				$query->closeCursor();

				$this->cache->set('valuesbyapp:' . $app, $result, $this->ttl);
			}
			return $result;
		} else {
			$result = $this->cache->get('valuesbykey:'.$key);
			if (empty($result)) {
				$sql = $this->conn->getQueryBuilder();
				$sql->select(['appid', 'configvalue'])
					->from('appconfig')
					->where($sql->expr()->eq(
						'configkey', $sql->createNamedParameter($key)
					));
				$query = $sql->execute();

				$result = [];
				while ($row = $query->fetch()) {
					$result[$row['appid']] = $row['configvalue'];
				}
				$query->closeCursor();

				$this->cache->set('valuesbykey:' . $key, $result, $this->ttl);
			}
			return $result;
		}
	}

}
