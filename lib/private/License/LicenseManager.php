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
use OCP\ILogger;

class LicenseManager implements ILicenseManager {
	public const GRACE_PERIOD = 60 * 60 * 24;  // 24h

	/** @var LicenseFetcher */
	private $licenseFetcher;
	/** @var MessageService */
	private $messageService;
	/** @var IConfig */
	private $config;
	/** @var IAppManager */
	private $appManager;
	/** @var ITimeFactory */
	private $timeFactory;
	/** @var ILogger */
	private $logger;

	public function __construct(
		LicenseFetcher $licenseFetcher,
		MessageService $messageService,
		IAppManager $appManager,
		IConfig $config,
		ITimeFactory $timeFactory,
		ILogger $logger
	) {
		$this->licenseFetcher = $licenseFetcher;
		$this->messageService = $messageService;
		$this->appManager = $appManager;
		$this->config = $config;
		$this->timeFactory = $timeFactory;
		$this->logger = $logger;
	}

	/**
	 * Check if "now" is inside the closed interval [t, t+p], where t = $timestamp
	 * and p = the grace period (24h)
	 *
	 * @param int $timestamp the timestamp when the grace period started
	 * @return bool
	 */
	private function isNowUnderGracePeriod(int $timestamp): bool {
		$currentTime = $this->timeFactory->getTime();
		return $timestamp <= $currentTime && $currentTime <= ($timestamp + self::GRACE_PERIOD);
	}

	/**
	 * Get the apps that are complaining about not having a valid license
	 */
	private function getAppComplains(): array {
		$apps = [];
		$appComplains = $this->config->getAppKeys('core-license-complains');
		foreach ($appComplains as $appComplain) {
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
		return $apps;
	}

	/**
	 * {@inheritDoc}
	 *
	 * If the "includeExtras" is used, the following keys will be added:
	 * - "apps" => list of apps actively using the grace period
	 * - "demoKeyLink" => an url with a web page to get a demo key
	 *
	 * @param bool $includeExtras if the 'apps' key is going to be returned
	 */
	public function getGracePeriod(bool $includeExtras = false): ?array {
		$gracePeriod = $this->config->getAppValue('core', 'grace_period', null);
		if ($gracePeriod === null || !$this->isNowUnderGracePeriod($gracePeriod)) {
			return null;
		}

		if ($includeExtras) {
			$apps = $this->getAppComplains();
			$demoKeyLink = $this->config->getSystemValue('grace_period.demo_key.link', 'https://owncloud.com/try-enterprise/');
			return [
				'apps' => $apps,
				'demoKeyLink' => $demoKeyLink,
				'start' => (int)$gracePeriod,
				'end' => (int)$gracePeriod + self::GRACE_PERIOD,
			];
		}

		return [
			'start' => (int)$gracePeriod,
			'end' => (int)$gracePeriod + self::GRACE_PERIOD,
		];
	}

	/**
	 * @inheritDoc
	 */
	public function setLicenseString(?string $licenseString) {
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
	 * @return array [ILicense|null, ILicenseManager::LICENSE_STATE_*]
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
				$currentTime = $this->timeFactory->getTime();
				if ($licenseObj->getExpirationTime() < $currentTime) {
					$licenseState = ILicenseManager::LICENSE_STATE_EXPIRED;
				} else {
					$daysLeft = ($licenseObj->getExpirationTime() - $currentTime) / 86400;
					if ($daysLeft <= ILicenseManager::THRESHOLD_ABOUT_TO_EXPIRE) {
						$licenseState = ILicenseManager::LICENSE_STATE_ABOUT_TO_EXPIRE;
					} else {
						$licenseState = ILicenseManager::LICENSE_STATE_VALID;
					}
				}
			} else {
				$licenseState = ILicenseManager::LICENSE_STATE_INVALID;
			}
		}

		return [$licenseObj, $licenseState];
	}

	/**
	 * {@inheritdoc}
	 *
	 * Per-app licenses aren't implemented at the moment. This method will return the state
	 * of the ownCloud's license for all apps (including public community apps)
	 */
	public function getLicenseStateFor(string $appid): int {
		$info = $this->getLicenseWithState($appid);
		return $info[1];  // license state is the second item.
	}

	public function getLicenseMessageFor(string $appid, string $language = null): array {
		$info = $this->getLicenseWithState($appid);
		if ($info[0] === null) {
			// no license
			$infoForMessage = [
				'licenseState' => $info[1],
			];
		} else {
			$infoForMessage = [
				'licenseState' => $info[1],
				'licenseType' => $info[0]->getType(),
				// daysLeft won't be accurate if the license isn't valid, but it's ok.
				'daysLeft' => \ceil(($info[0]->getExpirationTime() - $this->timeFactory->getTime()) / 86400),
			];
		}

		$messageData = $this->messageService->getMessageForLicense($infoForMessage, $language);
		// need to include license_state and type fields
		$messageData['license_state'] = $info[1];
		if ($info[0] === null) {
			$messageData['type'] = -1;
		} else {
			$messageData['type'] = $info[0]->getType();
		}
		return $messageData;
	}

	/**
	 * {@inheritDoc}
	 *
	 * This method will register a "complain" if we're under the grace period but the app
	 * doesn't have a valid license, This way it's easier to keep track of what apps
	 * have invalid license during the grace period
	 *
	 * Options:
	 * - 'startGracePeriod' => true/false (default true): whether a grace period should
	 *   start (if possible) automatically. Note that if a grace period is ongoing or
	 *   has expired, this option won't have any effect. Set the option to false if you
	 *   don't want to start the grace period.
	 * - 'disableApp' => true/false (default true): whether the app will be disabled if the
	 *   grace period has finished and there is no valid license. Setting this
	 *   option to false is intended to be used by apps which are mostly open but
	 *   have some parts that require a license: you don't want to disable the whole
	 *   app if there is no valid license.
	 */
	public function checkLicenseFor(string $appid, array $options = []): bool {
		$currentTime = $this->timeFactory->getTime();

		$gracePeriod = $this->config->getAppValue('core', 'grace_period', null);
		if ($gracePeriod === null) {
			if (isset($options['startGracePeriod']) && $options['startGracePeriod'] === false) {
				// don't set the grace period. Use a negative value for the "isNowUnderGracePeriod"
				$gracePeriod = -self::GRACE_PERIOD;
			} else {
				$this->config->setAppValue('core', 'grace_period', $currentTime);
				$gracePeriod = $currentTime;  // set the expected trial mark as now
			}
		}

		$licenseWithState = $this->getLicenseWithState($appid);
		$licenseObj = $licenseWithState[0];
		$licenseState = $licenseWithState[1];
		if (!$this->isNowUnderGracePeriod($gracePeriod)) {
			// we aren't under a grace period, so the app must be disabled if the license isn't valid
			if ($licenseState !== ILicenseManager::LICENSE_STATE_VALID &&
				$licenseState !== ILicenseManager::LICENSE_STATE_ABOUT_TO_EXPIRE
			) {
				if (!isset($options['disableApp']) || $options['disableApp'] !== false) {
					$this->appManager->disableApp($appid);
					$this->logger->warning("$appid has been disabled because the license is not valid", ['app' => 'core']);
				}
				return false;
			}

			return true;
		}

		if ($licenseState !== ILicenseManager::LICENSE_STATE_VALID &&
			$licenseState !== ILicenseManager::LICENSE_STATE_ABOUT_TO_EXPIRE
		) {
			// we're under a grace period but the license for the app isn't valid
			// mark the app to know there is at least one app using the grace period.
			// we'll still return true in this case.
			$licenseKey = '';
			if ($licenseObj) {
				$licenseKey = $licenseObj->getLicenseString();
			}
			$this->config->setAppValue('core-license-complains', $appid, $licenseKey);
			$this->logger->debug("$appid has registered a license complain over license $licenseKey", ['app' => 'core']);
		}
		return true;
	}
}
