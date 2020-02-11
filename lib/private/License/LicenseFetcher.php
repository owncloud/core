<?php
/**
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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
namespace OC\License;

use OC\License\BasicLicense;
use OCP\IConfig;

/**
 * Fetch the licenses being used.
 * The class has the capacity to fetch the licenses from multiple places (only config for now) as
 * well as different licenses (in case that we need to handle multiple kind of licenses at some point)
 * and also per-app licenses (not planned for now)
 */
class LicenseFetcher {
	/** @var IConfig */
	private $config;

	public function __construct(IConfig $config) {
		$this->config = $config;
	}

	/**
	 * Get the license used by ownCloud
	 * @return ILicense|null the license object or null if no license is found
	 */
	public function getOwncloudLicense() {
		$licenseKey = $this->config->getSystemValue('license-key', null);
		if ($licenseKey === null) {
			return null;
		}

		return new BasicLicense($licenseKey);  // only BasicLicense is available at the moment
	}

	/**
	 * Set the license that ownCloud will use
	 * @param string $licenseString the license string
	 */
	public function setOwncloudLicense(string $licenseString) {
		$this->config->setSystemValue('license-key', $licenseString);
	}
}