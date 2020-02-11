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

	public function getGracePeriod() {
		$gracePeriod = $this->config->getAppValue('core', 'grace_period', null);
		$appUsingGacePeriod = $this->config->getAppValue('core', 'grace_period_used_by', null);
		if ($gracePeriod === null) {
			return null;
		} else {
			return [
				'app' => $appUsingGacePeriod,
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
		// remove the "grace_period_used_by" marker
		$this->config->deleteAppValue('core', 'grace_period_used_by');
	}

	/**
	 * @inheritdoc
	 *
	 * Per-app licenses aren't implemented at the moment. This method will return the state
	 * of the ownCloud's license for all apps (including public community apps)
	 */
	public function getLicenseStateFor(string $appid) {
		// check if license is missing
		$licenseObj = $this->licenseFetcher->getOwncloudLicense();
		if ($licenseObj === null) {
			return ILicenseManager::LICENSE_STATE_MISSING;
		}

		// check if the license is valid
		if ($licenseObj->isValid()) {
			// check if the license has expired
			if ($licenseObj->getExpirationTime() < $this->timeFactory->getTime()) {
				return ILicenseManager::LICENSE_STATE_EXPIRED;
			} else {
				return ILicenseManager::LICENSE_STATE_VALID;
			}
		} else {
			return ILicenseManager::LICENSE_STATE_INVALID;
		}
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

		$licenseState = $this->getLicenseStateFor($appid);
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
				$this->config->setAppValue('core', 'grace_period_used_by', $appid);
			}
			return true;
		}
	}
}
