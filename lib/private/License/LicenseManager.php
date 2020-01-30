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
	const TRIAL_PERIOD = 60 * 60 * 24;  // 24h

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

	public function getInfoForAllApps() {
		// taking advantage of the current implementation, we'll check the ownCloud's license
		// here with a dummy string. Note that this must change if a license per-app is implemented
		$licenseState = $this->getLicenseStateFor('core');  // TODO: This is very coupled with the current impl
		$info = [];
		$appsWithTrial = $this->config->getAppKeys('core-trials');
		foreach ($appsWithTrial as $appid) {
			$trialMark = $this->config->getAppValue('core-trials', $appid, null);
			if ($trialMark === null) {
				continue;  // unexpected timestamp -> ignore
			}
			$info[$appid] = [];
			$info[$appid]['trial_start'] = $trialMark;
			$info[$appid]['trial_end'] = $trialMark + self::TRIAL_PERIOD;
			$info[$appid]['license_state'] = $licenseState;
		}
		return $info;
	}

	/**
	 * @param int $timestamp the timestamp when the trial started
	 */
	private function isUnderTrial(int $timestamp) {
		$currentTime = $this->timeFactory->getTime();
		return $currentTime < ($timestamp + self::TRIAL_PERIOD);
	}

	public function isAppUnderTrialPeriod(string $appid) {
		$trialMark = $this->config->getAppValue('core-trials', $appid, null);
		if ($trialMark === null) {
			$trialMark = - self::TRIAL_PERIOD;
		}
		return $this->isUnderTrial($trialMark);
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

	public function isThereAnAppUnderWorkingTrial() {
		// this should be pretty similar to the getInfoForAllApps() method

		// taking advantage of the current implementation, we'll check the ownCloud's license
		// here with a dummy string. Note that this must change if a license per-app is implemented
		$licenseState = $this->getLicenseStateFor('core');  // TODO: This is very coupled with the current impl
		if ($licenseState === ILicenseManager::LICENSE_STATE_VALID) {
			// if it's a valid license, all the apps will rely on the license to work
			// it's impossible that an app will rely on the trial to work
			return false;
		}

		$appsWithTrial = $this->config->getAppKeys('core-trials');
		foreach ($appsWithTrial as $appid) {
			$trialMark = $this->config->getAppValue('core-trials', $appid, null);
			if ($trialMark === null) {
				continue;  // unexpected timestamp -> ignore
			}
			if ($this->isUnderTrial($trialMark)) {
				return true;
			}
		}
		return false;
	}

	public function checkLicenseFor(string $appid) {
		$currentTime = $this->timeFactory->getTime();

		$trialMark = $this->config->getAppValue('core-trials', $appid, null);
		if ($trialMark === null) {
			// always start a trial if needed regardless of the license
			$callerFile = \debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0]['file'];
			if (\strpos($callerFile, $this->appManager->getAppPath($appid)) === 0) {
				// ensure it's the app itself the one starting the trial.
				// neither core nor other app should be able to start a trial on behalf of another app
				$this->config->setAppValue('core-trials', $appid, $currentTime);
				$trialMark = $currentTime;  // set the expected trial mark as now
			} else {
				// the "isUnderTrial" method must always return false in this case
				$trialMark = - self::TRIAL_PERIOD;
			}
		}

		// if the app isn't under trial and the license isn't valid, disabled the app
		if (!$this->isUnderTrial($trialMark) && !($this->getLicenseStateFor($appid) === ILicenseManager::LICENSE_STATE_VALID)) {
			$this->appManager->disableApp($appid);
			return false;
		} else {
			return true;
		}
	}
}
