<?php
/**
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

namespace OC\DB;

use OCP\IDBConnection;
use Doctrine\DBAL\DBALException;

/**
* Various MySQL specific helper functions.
*/
class MySqlTools {
	private function detectBarracuda(IDBConnection $connection) {
		foreach (['innodb_file_format' => 'Barracuda', 'innodb_large_prefix' => 'ON', 'innodb_file_per_table' => 'ON'] as $var => $val) {
			$result = $connection->executeQuery("SHOW VARIABLES LIKE '$var'");
			$rows = $result->fetch();
			$result->closeCursor();
			if ($rows === false) {
				return false;
			}
			if (\strcasecmp($rows['Value'], $val) !== 0) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Detect MariaDB server version, including hack for some mariadb distributions
	 * that starts with the prefix '5.5.5-'
	 *
	 * @param string $versionString Version string as returned by mariadb server, i.e. '5.5.5-Mariadb-10.0.8-xenial'
	 * @return string
	 * @throws DBALException
	 */
	private function getMariaDbMysqlVersionNumber($versionString) {
		if (!\preg_match('/^(?:5\.5\.5-)?(mariadb-)?(?P<major>\d+)\.(?P<minor>\d+)\.(?P<patch>\d+)/i', $versionString, $versionParts)) {
			throw DBALException::invalidPlatformVersionSpecified(
				$versionString,
				'^(?:5\.5\.5-)?(mariadb-)?<major_version>.<minor_version>.<patch_version>'
			);
		}
		return $versionParts['major'] . '.' . $versionParts['minor'] . '.' . $versionParts['patch'];
	}

	/**
	 * @param Connection $connection
	 * @return bool
	 */
	public function supports4ByteCharset(IDBConnection $connection) {
		if ($this->detectBarracuda($connection)) {
			return true;
		}

		$version = $connection->getDatabaseVersionString();
		$mariadb = \stripos($version, 'mariadb') !== false;
		if ($mariadb && \version_compare($this->getMariaDbMysqlVersionNumber($version), '10.3.1', '>=')) {
			// mb4 supported by default on MariaDB since 10.3.1 and innodb_file_format vars were removed
			return true;
		}

		return false;
	}
}
