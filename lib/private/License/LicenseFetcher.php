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

use OC\HintException;
use OCP\IConfig;
use OCP\AppFramework\Utility\ITimeFactory;

/**
 * Fetch the licenses being used.
 * The class has the capacity to fetch the licenses from multiple places (only config for now) as
 * well as different licenses (in case that we need to handle multiple kind of licenses at some point)
 * and also per-app licenses (not planned for now)
 */
class LicenseFetcher {
	/** @var IConfig */
	private $config;
	/** @var ITimeFactory */
	private $timeFactory;

	public function __construct(IConfig $config, ITimeFactory $timeFactory) {
		$this->config = $config;
		$this->timeFactory = $timeFactory;
	}

	/**
	 * Get the license used by ownCloud
	 * License in the DB will be prioritized as long as it's valid and not expired,
	 * otherwise, we'll fallback to the one in the system configuration.
	 * We won't check validity of the license in the system configuration, so we could
	 * return invalid or expired licenses present there.
	 * If the DB license is invalid or expired and the one in the system configuration
	 * is missing, we'll return the DB one even though it's invalid
	 *
	 * @return ILicense|null the license object or null if no license is found
	 * @throws HintException
	 */
	public function getOwncloudLicense(): ?ILicense {
		$licenseClass = $this->config->getSystemValue('license-class', BasicLicense::class);
		if (!\class_exists($licenseClass)) {
			throw new HintException("Unknown license $licenseClass");
		}

		$license = null;
		$licenseKey = $this->config->getAppValue('enterprise_key', 'license-key', null);
		if ($licenseKey !== null) {
			$license = new $licenseClass($licenseKey);
			if ($license->isValid() && $license->getExpirationTime() >= $this->timeFactory->getTime()) {
				return $license;
			}
		}

		// license missing or expired / invalid
		// check config.php
		$licenseKey = $this->config->getSystemValue('license-key', null);
		if ($licenseKey !== null) {
			// license status doesn't matter in this case
			$license = new $licenseClass($licenseKey);
		}

		return $license;
	}

	/**
	 * Set the license that ownCloud will use
	 * @param string $licenseString the license string
	 */
	public function setOwncloudLicense(string $licenseString): void {
		$this->config->setAppValue('enterprise_key', 'license-key', $licenseString);
	}
}
