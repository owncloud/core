<?php
/**
 * @author Arthur Schiwon <blizzz@owncloud.com>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Jakob Sack <mail@jakobsack.de>
 * @author Joas Schilling <nickvergessen@owncloud.com>
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

	private $cache = array();

	private $cacheTime = 600; // 10 minutes

	/**
	 * @param IDBConnection $conn
	 * @param ICache $cache
	 */
	public function __construct(IDBConnection $conn, ICache $cache = null) {
		$this->conn = $conn;
		$this->cache = $cache;
	}

	/**
	 * @param string $app
	 * @return array
	 */
	private function getAppValues($app) {
		$cacheKey = 'app/' . $app;
		if ($values = $this->cache->get($cacheKey)) {
			return $values;
		}
		$values = [];
		$sql = $this->conn->getQueryBuilder();
		$sql->select(['configkey', 'configvalue'])
			->from('appconfig')
			->where($sql->expr()->eq('appid', $sql->createParameter('appid')))
			->setParameter('appid', $app);
		$result = $sql->execute();
		while ($row = $result->fetch()) {
			$values[$row['configkey']] = $row['configvalue'];
		}
		$this->cache->set($cacheKey, $values, $this->cacheTime);
		return $values;
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
		if ($values = $this->cache->get('apps')) {
			return $values;
		}
		$sql = $this->conn->getQueryBuilder();
		$sql->selectDistinct(['appid'])
			->from('appconfig');
		$result = $sql->execute();

		$apps = [];
		while ($appid = $result->fetchColumn()) {
			$apps[] = $appid;
		}
		$this->cache->set('apps', $apps, $this->cacheTime);
		return $apps;
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
		$values = $this->getAppValues($app);
		$keys = array_keys($values);
		sort($keys);
		return $keys;
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
		$values = $this->getAppValues($app);
		if (isset($values[$key])) {
			return $values[$key];
		} else {
			return $default;
		}
	}

	/**
	 * check if a key is set in the appconfig
	 *
	 * @param string $app
	 * @param string $key
	 * @return bool
	 */
	public function hasKey($app, $key) {
		$values = $this->getAppValues($app);
		return array_key_exists($key, $values);
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
		// Does the key exist? no: insert, yes: update.
		$this->cache->remove('app/' . $app);
		if (!$this->hasKey($app, $key)) {
			$sql = $this->conn->getQueryBuilder();
			$sql->insert('appconfig')
				->values([
					'appid' => $sql->createParameter('appid'),
					'configkey' => $sql->createParameter('configkey'),
					'configvalue' => $sql->createParameter('configvalue'),
				])
				->setParameters([
					'appid' => $app,
					'configkey' => $key,
					'configvalue' => $value,
				]);
			$sql->execute();
		} else {
			$oldValue = $this->getValue($app, $key);
			if($oldValue === strval($value)) {
				return false;
			}
			$sql = $this->conn->getQueryBuilder();
			$sql->update('appconfig')
				->set('configvalue', $sql->createParameter('configvalue'))
				->where($sql->expr()->eq('appid', $sql->createParameter('app')))
				->andWhere($sql->expr()->eq('configkey', $sql->createParameter('configkey')))
				->setParameter('app', $app)
				->setParameter('configkey', $key);
			$sql->execute();
		}
		$this->cache->remove('app/' . $app);
		$this->cache->remove('key/' . $key);
		$this->cache->remove('apps');
		return true;
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
			->where($sql->expr()->eq('appid', $sql->createParameter('app')))
			->andWhere($sql->expr()->eq('configkey', $sql->createParameter('configkey')))
			->setParameter('app', $app)
			->setParameter('configkey', $key);
		$sql->execute();

		$this->cache->remove('app/' . $app);
		$this->cache->remove('key/' . $key);
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
			->where($sql->expr()->eq('appid', $sql->createParameter('app')))
			->setParameter('app', $app);
		$sql->execute();

		$this->cache->remove('app/' . $app);
		$this->cache->remove('apps');
		$this->cache->clear('key/');
	}

	/**
	 * get multiple values, either the app or key can be used as wildcard by setting it to false
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
			return $this->getAppValues($app);
		} else {
			$cacheKey = 'key/' . $key;
			if ($values = $this->cache->get($cacheKey)) {
				return $values;
			}
			$sql = $this->conn->getQueryBuilder();
			$sql->select(['configvalue', 'appid'])
				->from('appconfig')
				->where($sql->expr()->eq('configkey', $sql->createParameter('configkey')))
				->setParameter('configkey', $key);
			$result = $sql->execute();

			$values = array();
			while ($row = $result->fetch((\PDO::FETCH_ASSOC))) {
				$values[$row['appid']] = $row['configvalue'];
			}

			$this->cache->set($cacheKey, $values, $this->cacheTime);
			return $values;
		}
	}
}