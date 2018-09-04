<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OC\Repair;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
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

	/** @var \OC_Defaults */
	private $defaults;

	/**
	 * Apps constructor.
	 *
	 * @param IAppManager $appManager
	 * @param EventDispatcher $eventDispatcher
	 * @param IConfig $config
	 * @param \OC_Defaults $defaults
	 */
	public function __construct(IAppManager $appManager, EventDispatcher $eventDispatcher, IConfig $config, \OC_Defaults $defaults) {
		$this->appManager = $appManager;
		$this->eventDispatcher = $eventDispatcher;
		$this->config = $config;
		$this->defaults = $defaults;
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
		$currentVersion = \implode('.', Util::getVersion());
		$versionDiff = \version_compare($currentVersion, $installedVersion);
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
		$versionDiff = \version_compare('10.0.0', $installedVersion);
		if ($versionDiff < 0) {
			return false;
		}
		return true;
	}

	/**
	 * @param IOutput $output
	 * @throws RepairException
	 */
	public function run(IOutput $output) {
		if ($this->config->getSystemValue('has_internet_connection', true) !== true) {
			$link = $this->defaults->buildDocLinkToKey('admin-marketplace-apps');
			$output->info('No internet connection available - no app updates will be taken from the marketplace.');
			$output->info("How to update apps in such situation please see $link");
			$this->appManager->disableApp('market');
		}
		$appsToUpgrade = $this->getAppsToUpgrade();
		$failedCompatibleApps = [];
		$failedMissingApps = $appsToUpgrade[self::KEY_MISSING];
		$failedIncompatibleApps = $appsToUpgrade[self::KEY_INCOMPATIBLE];
		$hasNotUpdatedCompatibleApps = 0;

		// fix market app state
		$shallContactMarketplace = $this->fixMarketAppState($output);

		// market might be enabled but admin does not want to automatically update apps through it
		// (they might want to manually click through the updates in the web UI so keeping the
		// market enabled here is a legitimate use case)
		if ($this->config->getSystemValue('upgrade.automatic-app-update', true) !== true) {
			$shallContactMarketplace = false;
		}

		if ($shallContactMarketplace) {
			// Check if we can use the marketplace to update apps as needed?
			if ($this->appManager->isEnabledForUser('market')) {
				// Use market to fix missing / old apps
				$this->loadApp('market');
				$output->info('Using market to update existing apps');
				try {
					// Try to update incompatible apps
					if (!empty($appsToUpgrade[self::KEY_INCOMPATIBLE])) {
						$output->info('Attempting to update the following existing but incompatible app from market: ' . \implode(', ', $appsToUpgrade[self::KEY_INCOMPATIBLE]));
						$failedIncompatibleApps = $this->getAppsFromMarket(
							$output,
							$appsToUpgrade[self::KEY_INCOMPATIBLE],
							'upgradeAppStoreApp'
						);
					}

					// Try to download missing apps
					if (!empty($appsToUpgrade[self::KEY_MISSING])) {
						$output->info('Attempting to update the following missing apps from market: ' . \implode(', ', $appsToUpgrade[self::KEY_MISSING]));
						$failedMissingApps = $this->getAppsFromMarket(
							$output,
							$appsToUpgrade[self::KEY_MISSING],
							'reinstallAppStoreApp'
						);
					}

					// Try to update compatible apps
					if (!empty($appsToUpgrade[self::KEY_COMPATIBLE])) {
						$output->info('Attempting to update the following existing compatible apps from market: ' . \implode(', ', $appsToUpgrade[self::KEY_MISSING]));
						$failedCompatibleApps = $this->getAppsFromMarket(
							$output,
							$appsToUpgrade[self::KEY_COMPATIBLE],
							'upgradeAppStoreApp'
						);
					}

					$hasNotUpdatedCompatibleApps = \count($failedCompatibleApps);
				} catch (AppManagerException $e) {
					$output->warning($e->getMessage());
				}
			} else {
				// No market available, output error and continue attempt
				$link = $this->defaults->buildDocLinkToKey('admin-marketplace-apps');
				$output->warning("Market app is unavailable for updating of apps. Please update manually, see $link");
			}
		}

		$hasBlockingMissingApps = \count($failedMissingApps);
		$hasBlockingIncompatibleApps = \count($failedIncompatibleApps);

		if ($hasBlockingIncompatibleApps || $hasBlockingMissingApps) {
			// fail
			$output->warning('You have incompatible or missing apps enabled that could not be found or updated via the marketplace.');
			$output->warning(
				'Please install or update the following apps manually or disable them with:'
				. $this->getOccDisableMessage(\array_merge($failedIncompatibleApps, $failedMissingApps))
			);
			$link = $this->defaults->buildDocLinkToKey('admin-marketplace-apps');
			$output->warning("For manually updating, see $link");

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
	 * @param string $event
	 * @return array
	 * @throws AppManagerException
	 */
	protected function getAppsFromMarket(IOutput $output, $appList, $event) {
		$failedApps = [];
		foreach ($appList as $app) {
			$output->info("Fetching app from market: $app");
			try {
				$this->eventDispatcher->dispatch(
					\sprintf('%s::%s', IRepairStep::class, $event),
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
				$output->warning(\get_class($e));

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
			if (!isset($info['id']) || $info['id'] === null) {
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
		if (!\count($appList)) {
			return '';
		}
		$appList = \array_map(
			function ($appId) {
				return "occ app:disable $appId";
			},
			$appList
		);
		return "\n" . \implode("\n", $appList);
	}

	/**
	 * @codeCoverageIgnore
	 * @param string $app
	 */
	protected function loadApp($app) {
		OC_App::loadApp($app, false);
	}

	/**
	 * @return bool
	 */
	private function isAppStoreEnabled() {
		// if appstoreenabled was explicitly disabled we shall not use the market app for upgrade
		$appStoreEnabled = $this->config->getSystemValue('appstoreenabled', null);
		if ($appStoreEnabled === false) {
			return false;
		}
		return true;
	}

	private function fixMarketAppState(IOutput $output) {
		// no core update -> nothing to do
		if (!$this->isCoreUpdate()) {
			return false;
		}

		// no update from a version before 10.0 -> nothing to do, but allow apps to be updated
		if (!$this->requiresMarketEnable()) {
			return true;
		}
		// if the appstore was explicitly disabled -> disable market app as well
		if (!$this->isAppStoreEnabled()) {
			$this->appManager->disableApp('market');
			$link = $this->defaults->buildDocLinkToKey('admin-marketplace-apps');
			$output->info('Appstore was disabled in past versions and marketplace interactions are disabled for now as well.');
			$output->info('If you would like to get automated app updates on upgrade please enable the market app and remove "appstoreenabled" from your config.');
			$output->info("Please note that the market app is not recommended for clustered setups - see $link");
			return false;
		}

		// Then we need to enable the market app to support app updates / downloads during upgrade
		$output->info('Enabling market app to assist with update');
		try {
			// Prepare oc_jobs for older ownCloud version fixes https://github.com/owncloud/update-testing/issues/5
			$connection = \OC::$server->getDatabaseConnection();
			$toSchema = $connection->createSchema();
			$this->changeSchema($toSchema, ['tablePrefix' => $connection->getPrefix()]);
			$connection->migrateToSchema($toSchema);

			$this->appManager->enableApp('market');
			return true;
		} catch (\Exception $ex) {
			$output->warning($ex->getMessage());
			return false;
		}
	}

	/**
	 * DB update for oc_jobs table
	 * it is intentionally duplicates 20170213215145 and a part of 20170101215145
	 * to allow seamless market app installation
	 *
	 * @param Schema $schema
	 * @param array $options
	 * @throws \Doctrine\DBAL\Schema\SchemaException
	 */
	private function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		if ($schema->hasTable("${prefix}jobs")) {
			$jobsTable = $schema->getTable("${prefix}jobs");

			if (!$jobsTable->hasColumn('last_checked')) {
				$jobsTable->addColumn(
					'last_checked',
					Type::INTEGER,
					[
						'default' => 0,
						'notnull' => false
					]
				);
			}

			if (!$jobsTable->hasColumn('reserved_at')) {
				$jobsTable->addColumn(
					'reserved_at',
					Type::INTEGER,
					[
						'default' => 0,
						'notnull' => false
					]
				);
			}

			if (!$jobsTable->hasColumn('execution_duration')) {
				$jobsTable->addColumn('execution_duration', Type::INTEGER, [
					'notnull' => true,
					'length' => 5,
					'default' => -1,
				]);
			}
		}
	}
}
