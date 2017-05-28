<?php
/**
 * @author Victor Dubiniuk <dubiniuk@aheadworks.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace OC\Repair;

use OC\RepairException;
use OC_App;
use OCP\App\AppAlreadyInstalledException;
use OCP\App\AppManagerException;
use OCP\App\AppNotFoundException;
use OCP\App\AppNotInstalledException;
use OCP\App\AppUpdateNotFoundException;
use OCP\App\IAppManager;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;
use OCP\Util;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;
use OCP\IConfig;

class Apps implements IRepairStep {

	const KEY_COMPATIBLE = 'compatible';
	const KEY_INCOMPATIBLE = 'incompatible';
	const KEY_MISSING = 'missing';

	/** @var  IAppManager */
	private $appManager;

	/** @var  EventDispatcher */
	private $eventDispatcher;

	/** @var IConfig */
	private $config;

	/**
	 * Apps constructor.
	 *
	 * @param IAppManager $appManager
	 */
	public function __construct(IAppManager $appManager, EventDispatcher $eventDispatcher, IConfig $config) {
		$this->appManager = $appManager;
		$this->eventDispatcher = $eventDispatcher;
		$this->config = $config;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return 'Upgrade app code from the marketplace';
	}

	/**
	 * Are we updating from an older version?
	 * @return bool
	 */
	private function isCoreUpdate() {
		$installedVersion = $this->config->getSystemValue('version', '0.0.0');
		$currentVersion = implode('.', \OCP\Util::getVersion());
		$versionDiff = version_compare($currentVersion, $installedVersion);
		if ($versionDiff > 0) {
			return true;
		}
		return false;
	}

	/**
	 * If we are updating from <= 10.0.0 we need to enable the marketplace before running the update
	 * @return bool
	 */
	private function requiresMarketEnable() {
		$installedVersion = $this->config->getSystemValue('version', '0.0.0');
		$versionDiff = version_compare('10.0.0', $installedVersion);
		if ($versionDiff >= 0) {
			return true;
		}
		return false;
	}

	/**
	 * @param IOutput $output
	 * @throws RepairException
	 */
	public function run(IOutput $output) {
		$isCoreUpdate = $this->isCoreUpdate();
		$appsToUpgrade = $this->getAppsToUpgrade();
		$failedCompatibleApps = [];
		$failedMissingApps = $appsToUpgrade[self::KEY_MISSING];
		$failedIncompatibleApps = $appsToUpgrade[self::KEY_INCOMPATIBLE];
		$hasNotUpdatedCompatibleApps = 0;
		$requiresMarketEnable = $this->requiresMarketEnable();

		if($isCoreUpdate && $requiresMarketEnable) {
			// Then we need to enable the market app to support app updates / downloads during upgrade
			$output->info('Enabling market app to assist with update');
			// delete old value that might influence old APIs
			if ($this->config->getSystemValue('appstoreenabled', null) !== null) {
				$this->config->deleteSystemValue('appstoreenabled');
			}
			$this->appManager->enableApp('market');
		}

		// Check if we can use the marketplace to update apps as needed?
		if($this->appManager->isEnabledForUser('market')) {
			// Use market to fix missing / old apps
			$this->loadApp('market');
			$output->info('Using market to update existing apps');
			try {
				// Try to update incompatible apps
				if(!empty($appsToUpgrade[self::KEY_INCOMPATIBLE])) {
					$output->info('Attempting to update the following existing but incompatible app from market: '.implode(', ', $appsToUpgrade[self::KEY_INCOMPATIBLE]));
					$failedIncompatibleApps = $this->getAppsFromMarket(
						$output,
						$appsToUpgrade[self::KEY_INCOMPATIBLE],
						'upgradeAppStoreApp'
					);
				}

				// Try to download missing apps
				if(!empty($appsToUpgrade[self::KEY_MISSING])) {
					$output->info('Attempting to update the following missing apps from market: '.implode(', ', $appsToUpgrade[self::KEY_MISSING]));
					$failedMissingApps = $this->getAppsFromMarket(
						$output,
						$appsToUpgrade[self::KEY_MISSING],
						'reinstallAppStoreApp'
					);
				}

				// Try to update compatible apps
				if(!empty($appsToUpgrade[self::KEY_COMPATIBLE])) {
					$output->info('Attempting to update the following existing compatible apps from market: '.implode(', ', $appsToUpgrade[self::KEY_MISSING]));
					$failedCompatibleApps = $this->getAppsFromMarket(
						$output,
						$appsToUpgrade[self::KEY_COMPATIBLE],
						'upgradeAppStoreApp'
					);
				}

				$hasNotUpdatedCompatibleApps = count($failedCompatibleApps);
			} catch (AppManagerException $e) {
				$output->warning('No connection to marketplace: ' . $e->getPrevious());
			}
		} else {
			// No market available, output error and continue attempt
			$output->warning('Market app is unavailable for updating of apps. Enable with: occ app:enable market');
		}

		$hasBlockingMissingApps = count($failedMissingApps);
		$hasBlockingIncompatibleApps = count($failedIncompatibleApps);

		if ($hasBlockingIncompatibleApps || $hasBlockingMissingApps) {
			// fail
			$output->warning('You have incompatible or missing apps enabled that could not be found or updated via the marketplace.');
			$output->warning(
				'please install app manually with tarball or disable them with:'
				. $this->getOccDisableMessage(array_merge($failedIncompatibleApps, $failedMissingApps))
			);

			throw new RepairException('Upgrade is not possible');
		} elseif ($hasNotUpdatedCompatibleApps) {
			foreach ($failedCompatibleApps as $app) {
				// TODO: Show reason
				$output->info("App was not updated: $app");
			}
		}
	}

	/**
	 * Upgrade appList from market
	 * Return an array of apps that were not upgraded successfully
	 *
	 * @param IOutput $output
	 * @param string[] $appList
	 * @return array
	 * @throws AppManagerException
	 */
	protected function getAppsFromMarket(IOutput $output, $appList, $event) {
		$failedApps = [];
		foreach ($appList as $app) {
			$output->info("Fetching app from market: $app");
			try {
				$this->eventDispatcher->dispatch(
					sprintf('%s::%s', IRepairStep::class, $event),
					new GenericEvent($app)
				);
			} catch (AppAlreadyInstalledException $e) {
				$output->info($e->getMessage());
				$failedApps[] = $app;
			} catch (AppNotInstalledException $e) {
				$output->info($e->getMessage());
				$failedApps[] = $app;
			} catch (AppNotFoundException $e) {
				$output->info($e->getMessage());
				$failedApps[] = $app;
			} catch (AppUpdateNotFoundException $e) {
				$output->info($e->getMessage());
				$failedApps[] = $app;
			} catch (AppManagerException $e) {
				// No connection to market. Abort.
				throw $e;
			} catch (\Exception $e) {
				// TODO: check the reason
				$failedApps[] = $app;
				$output->warning(get_class($e));

				$output->warning($e->getMessage());
			}
		}
		return $failedApps;
	}

	/**
	 * Get app list separated as compatible/incompatible/missing
	 *
	 * @return array
	 */
	protected function getAppsToUpgrade() {
		$installedApps = $this->appManager->getInstalledApps();
		$appsToUpgrade = [
			self::KEY_COMPATIBLE => [],
			self::KEY_INCOMPATIBLE => [],
			self::KEY_MISSING => []
		];

		foreach ($installedApps as $appId) {
			$info = $this->appManager->getAppInfo($appId);
			if (!isset($info['id']) || is_null($info['id'])) {
				$appsToUpgrade[self::KEY_MISSING][] = $appId;
				continue;
			}
			$version = Util::getVersion();
			$key = (\OC_App::isAppCompatible($version, $info)) ? self::KEY_COMPATIBLE : self::KEY_INCOMPATIBLE;
			$appsToUpgrade[$key][] = $appId;
		}
		return $appsToUpgrade;
	}

	protected function getOccDisableMessage($appList) {
		if (!count($appList)) {
			return '';
		}
		$appList = array_map(
			function ($appId) {
				return "occ app:disable $appId";
			},
			$appList
		);
		return "\n" . implode("\n", $appList);
	}

	/**
	 * @codeCoverageIgnore
	 * @param string $app
	 */
	protected function loadApp($app) {
		OC_App::loadApp($app, false);
	}
}
