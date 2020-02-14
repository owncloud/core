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
use OCP\App\IAppManager;
use OCP\AppFramework\Utility\ITimeFactory;
use OC\License\LicenseFetcher;

class LicenseManager implements ILicenseManager {
	const GRACE_PERIOD = 60 * 60 * 24;  // 24h

	/** @var LicenseFetcher */
	private $licenseFetcher;
	/** @var IConfig */
	private $config;
	/** @var IAppManager */
	private $appManager;
	/** @var ITimeFactory */
	private $timeFactory;

	public function __construct(
		LicenseFetcher $licenseFetcher,
		IAppManager $appManager,
		IConfig $config,
		ITimeFactory $timeFactory
	) {
		$this->licenseFetcher = $licenseFetcher;
		$this->appManager = $appManager;
		$this->config = $config;
		$this->timeFactory = $timeFactory;
	}

	/**
	 * Check if "now" is inside the close interval [t, t+p], where t = $timestamp
	 * and p = the grace period (24h)
	 * @param int $timestamp the timestamp when the grace period started
	 */
	private function isNowUnderGracePeriod(int $timestamp) {
		$currentTime = $this->timeFactory->getTime();
		return $timestamp <= $currentTime && $currentTime <= ($timestamp + self::GRACE_PERIOD);
	}

	public function getGracePeriod(bool $includeExtras = false) {
		$gracePeriod = $this->config->getAppValue('core', 'grace_period', null);
		if ($gracePeriod === null || !$this->isNowUnderGracePeriod($gracePeriod)) {
			return null;
		}

		if ($includeExtras) {
			$apps = [];
			$appComplains = $this->config->getAppKeys('core-license-complains');
			foreach ($appComplains as $appComplain) {
				$appInfo = $this->appManager->getAppInfo($appComplain);
				if ($this->config->getAppValue($appComplain, 'enabled', 'no') === 'yes' && $this->appManager->getAppPath($appComplain) !== false) {
					// if the app is installed and hasn't been removed from the FS...
					$licenseWithState = $this->getLicenseWithState($appComplain);
					$licenseMatchesStoredOne = false;
					if ($licenseWithState[0]) {  // license exists for the app
						$complainedLicense = $this->config->getAppValue('core-license-complains', $appComplain, null);
						$licenseMatchesStoredOne = $licenseWithState[0]->getLicenseString() === $complainedLicense;
					}

					if ($licenseMatchesStoredOne) {
						// if current license key matches the one the app is complaining about, mark the app
						$apps[] = $appComplain;
					} else {
						if ($licenseWithState[1] !== ILicenseManager::LICENSE_STATE_VALID) {
							// if the new license isn't valid, mark the app
							$apps[] = $appComplain;
						} else {
							// if the new license is valid, remove the previous complain
							$this->config->deleteAppValue('core-license-complains', $appComplain);
						}
					}
				} else {
					// missing app -> delete complain
					$this->config->deleteAppValue('core-license-complains', $appComplain);
				}
			}

			return [
				'apps' => $apps,
				'start' => (int)$gracePeriod,
				'end' => (int)$gracePeriod + self::GRACE_PERIOD,
			];
		} else {
			return [
				'start' => (int)$gracePeriod,
				'end' => (int)$gracePeriod + self::GRACE_PERIOD,
			];
		}
	}

	public function setLicenseString($licenseString) {
		// we can only set the ownCloud's license for now
		if ($licenseString !== null) {
			$this->licenseFetcher->setOwncloudLicense($licenseString);
		}
		$this->config->deleteAppValues('core-license-complains');
	}

	/**
	 * Per-app licenses aren't implemented at the moment. This method will return the state
	 * of the ownCloud's license for all apps (including public community apps)
	 * Returns an array with the license object and the state of the license (any of the
	 * ILicenseManager::LICENSE_STATE_* constants). Note that the license object could be null
	 * if the license is missing.
	 * @return array [ILicense, ILicenseManager::LICENSE_STATE_*]
	 */
	private function getLicenseWithState(string $appid) {
		// check if license is missing
		$licenseObj = $this->licenseFetcher->getOwncloudLicense();
		if ($licenseObj === null) {
			$licenseState = ILicenseManager::LICENSE_STATE_MISSING;
		} else {
			// check if the license is valid
			if ($licenseObj->isValid()) {
				// check if the license has expired
				if ($licenseObj->getExpirationTime() < $this->timeFactory->getTime()) {
					$licenseState = ILicenseManager::LICENSE_STATE_EXPIRED;
				} else {
					$licenseState = ILicenseManager::LICENSE_STATE_VALID;
				}
			} else {
				$licenseState = ILicenseManager::LICENSE_STATE_INVALID;
			}
		}

		return [$licenseObj, $licenseState];
	}

	/**
	 * @inheritdoc
	 *
	 * Per-app licenses aren't implemented at the moment. This method will return the state
	 * of the ownCloud's license for all apps (including public community apps)
	 */
	public function getLicenseStateFor(string $appid) {
		$info = $this->getLicenseWithState($appid);
		return $info[1];  // license state is the second item.
	}

	public function checkLicenseFor(string $appid) {
		$currentTime = $this->timeFactory->getTime();

		$gracePeriod = $this->config->getAppValue('core', 'grace_period', null);
		if ($gracePeriod === null) {
			// always start a trial if needed regardless of the license
			$callerFile = \debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0]['file'];
			if (\strpos($callerFile, $this->appManager->getAppPath($appid)) === 0) {
				// ensure it's the app itself the one starting the trial.
				// neither core nor other app should be able to start a trial on behalf of another app
				$this->config->setAppValue('core', 'grace_period', $currentTime);
				$gracePeriod = $currentTime;  // set the expected trial mark as now
			} else {
				// the "isNowUnderGracePeriod" method must always return false in this case
				$gracePeriod = - self::TRIAL_PERIOD;
			}
		}

		$licenseWithState = $this->getLicenseWithState($appid);
		$licenseObj = $licenseWithState[0];
		$licenseState = $licenseWithState[1];
		if (!$this->isNowUnderGracePeriod($gracePeriod)) {
			// we aren't under a grace period, so the app must be disabled if the license isn't valid
			if ($licenseState !== ILicenseManager::LICENSE_STATE_VALID) {
				$this->appManager->disableApp($appid);
				return false;
			} else {
				return true;
			}
		} else {
			if ($licenseState !== ILicenseManager::LICENSE_STATE_VALID) {
				// we're under a grace period but the license for the app isn't valid
				// mark the app to know there is at least one app using the grace period.
				// we'll still return true in this case.
				$licenseKey = '';
				if ($licenseObj) {
					$licenseKey = $licenseObj->getLicenseString();
				}
				$this->config->setAppValue('core-license-complains', $appid, $licenseKey);
			}
			return true;
		}
	}
}
