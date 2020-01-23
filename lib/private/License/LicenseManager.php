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

use OCP\License\ILicenseManager;
use OCP\IConfig;
use OCP\AppFramework\Utility\ITimeFactory;
use OC\License\LicenseFetcher;

class LicenseManager implements ILicenseManager {
	/** @var IConfig */
	private $config;
	/** @var LicenseFetcher */
	private $licenseFetcher;
	/** @var ITimeFactory */
	private $timeFactory;

	public function __construct(LicenseFetcher $licenseFetcher, IConfig $config, ITimeFactory $timeFactory) {
		$this->licenseFetcher = $licenseFetcher;
		$this->config = $config;
		$this->timeFactory = $timeFactory;
	}

	public function isLicenseValid() {
		// check if license is missing
		$licenseObj = $this->licenseFetcher->getOwncloudLicense();
		if ($licenseObj === null) {
			return ILicenseManager::LICENSE_STATE_MISSING;
		}

		// check if the license is valid
		if ($licenseObj->isValid()) {
			// check if the license has expired
			if ($licenseObj->getExpirationDate() < $this->timeFactory->getTime()) {
				return ILicenseManager::LICENSE_STATE_EXPIRED;
			} else {
				return ILicenseManager::LICENSE_STATE_VALID;
			}
		} else {
			return ILicenseManager::LICENSE_STATE_INVALID;
		}
	}

	public function isAppUnderTrialPeriod(string $appid, bool $autoStart = true) {
		$trialMark = $this->config->getAppValue('core', "trials_{$appid}", null);
		if ($trialMark === null) {
			if ($autoStart) {
				$this->config->setAppValue('core', "trials_{$appid}", $this->timeFactory->getTime());
				return true;
			} else {
				return false;
			}
		} else {
			$trialFinish = $trialMark + (60 * 60 * 24);
			$currentTime = $this->timeFactory->getTime();
			if ($currentTime < $trialFinish) {
				return true;
			} else {
				return false;
			}
		}
	}
}
