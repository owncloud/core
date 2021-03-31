<?php
/**
 * @author Jan Ackermann <jackermann@owncloud.com>
 * @author Jannik Stehle <jstehle@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

namespace OCP\Activity;

/**
 * Class Constants
 *
 * @package OCP
 * @since 10.8.0
 */

class DataProvider {
	/** @var string */
	private static $issuerApp = '';

	/**
	 * Get the issuer app
	 *
	 * @return  string
	 * @since 10.8.0
	 */
	public static function getIssuerApp() {
		return self::$issuerApp;
	}

	/**
	 * Set the issuer app
	 *
	 * @param $issuerApp string
	 * @since 10.8.0
	 */
	public static function setIssuerApp(string $issuerApp) {
		self::$issuerApp = $issuerApp;
	}

	/**
	 * Clear the data
	 * @since 10.8.0
	 */
	public static function expunge() {
		self::$issuerApp = '';
	}
}
