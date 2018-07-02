<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Frank Karlitschek <frank@karlitschek.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Steffen Lindner <mail@steffen-lindner.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OC;

use OC\Hooks\BasicEmitter;
use OC\IntegrityCheck\Checker;
use OC_App;
use OCP\IConfig;
use OCP\ILogger;
use OCP\Util;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class that handles autoupdating of ownCloud
 *
 * Hooks provided in scope \OC\Updater
 *  - maintenanceStart()
 *  - maintenanceEnd()
 *  - dbUpgrade()
 *  - failure(string $message)
 */
class Updater extends BasicEmitter {

	/** @var ILogger $log */
	private $log;
	
	/** @var IConfig */
	private $config;

	/** @var Checker */
	private $checker;

	private $logLevelNames = [
		0 => 'Debug',
		1 => 'Info',
		2 => 'Warning',
		3 => 'Error',
		4 => 'Fatal',
	];

	/**
	 * @param IConfig $config
	 * @param Checker $checker
	 * @param ILogger $log
	 */
	public function __construct(IConfig $config,
								Checker $checker,
								ILogger $log = null) {
		$this->log = $log;
		$this->config = $config;
		$this->checker = $checker;
	}

	/**
	 * runs the update actions in maintenance mode, does not upgrade the source files
	 * except the main .htaccess file
	 *
	 * @return bool true if the operation succeeded, false otherwise
	 */
	public function upgrade() {
		$this->emitRepairEvents();

		$logLevel = $this->config->getSystemValue('loglevel', Util::WARN);
		$this->emit('\OC\Updater', 'setDebugLogLevel', [ $logLevel, $this->logLevelNames[$logLevel] ]);
		$this->config->setSystemValue('loglevel', Util::DEBUG);

		$wasMaintenanceModeEnabled = $this->config->getSystemValue('maintenance', false);

		if (!$wasMaintenanceModeEnabled) {
			$this->config->setSystemValue('maintenance', true);
			$this->emit('\OC\Updater', 'maintenanceEnabled');
		}

		$installedVersion = $this->config->getSystemValue('version', '0.0.0');
		$currentVersion = \implode('.', Util::getVersion());
		$this->log->debug('starting upgrade from ' . $installedVersion . ' to ' . $currentVersion, ['app' => 'core']);

		$success = true;
		try {
			$this->doUpgrade($currentVersion, $installedVersion);
		} catch (\Exception $exception) {
			$this->log->logException($exception, ['app' => 'core']);
			$this->emit('\OC\Updater', 'failure', [\get_class($exception) . ': ' .$exception->getMessage()]);
			$success = false;
		}

		$this->emit('\OC\Updater', 'updateEnd', [$success]);

		if (!$wasMaintenanceModeEnabled && $success) {
			$this->config->setSystemValue('maintenance', false);
			$this->emit('\OC\Updater', 'maintenanceDisabled');
		} else {
			$this->emit('\OC\Updater', 'maintenanceActive');
		}

		$this->emit('\OC\Updater', 'resetLogLevel', [ $logLevel, $this->logLevelNames[$logLevel] ]);
		$this->config->setSystemValue('loglevel', $logLevel);
		$this->config->setSystemValue('installed', true);

		return $success;
	}

	/**
	 * Return versions from which this version is allowed to upgrade from
	 *
	 * @return string[] allowed previous versions
	 */
	private function getAllowedPreviousVersions() {
		// this should really be a JSON file
		require \OC::$SERVERROOT . '/version.php';

		$allowedPreviousVersions = [];

		/** @var array $OC_VersionCanBeUpgradedFrom */
		foreach ($OC_VersionCanBeUpgradedFrom as $version) {
			$allowedPreviousVersions[] = \implode('.', $version);
		}

		return $allowedPreviousVersions;
	}

	/**
	 * Return vendor from which this version was published
	 *
	 * @return string Get the vendor
	 */
	private function getVendor() {
		// this should really be a JSON file
		require \OC::$SERVERROOT . '/version.php';
		/** @var string $vendor */
		return (string) $vendor;
	}

	/**
	 * Whether an upgrade to a specified version is possible
	 * @param string $oldVersion
	 * @param string $newVersion
	 * @param string[] $allowedPreviousVersions
	 * @return bool
	 */
	public function isUpgradePossible($oldVersion, $newVersion, $allowedPreviousVersions) {
		// TODO: write tests for this, since i just wrapped it to get started with migrations and this might fail in some cases
		foreach ($allowedPreviousVersions as $allowedPreviousVersion) {
			$allowedUpgrade =  (\version_compare($allowedPreviousVersion, $oldVersion, '<=')
				&& (\version_compare($oldVersion, $newVersion, '<=') || $this->config->getSystemValue('debug', false)));
			if ($allowedUpgrade) {
				return $allowedUpgrade;
			}
		}

		// Upgrade not allowed, someone switching vendor?
		if ($this->getVendor() !== $this->config->getAppValue('core', 'vendor', '')) {
			$oldVersion = \explode('.', $oldVersion);
			$newVersion = \explode('.', $newVersion);

			return $oldVersion[0] === $newVersion[0] && $oldVersion[1] === $newVersion[1];
		}

		return false;
	}

	/**
	 * runs the update actions in maintenance mode, does not upgrade the source files
	 * except the main .htaccess file
	 *
	 * @param string $currentVersion current version to upgrade to
	 * @param string $installedVersion previous version from which to upgrade from
	 *
	 * @throws \Exception
	 */
	private function doUpgrade($currentVersion, $installedVersion) {
		// Stop update if the update is over several major versions
		$allowedPreviousVersions = $this->getAllowedPreviousVersions();
		if (!self::isUpgradePossible($installedVersion, $currentVersion, $allowedPreviousVersions)) {
			throw new \Exception('Updates between multiple major versions and downgrades are unsupported.');
		}

		// Update .htaccess files
		try {
			Setup::updateHtaccess();
			Setup::protectDataDirectory();
		} catch (\Exception $e) {
			throw new \Exception($e->getMessage());
		}

		// create empty file in data dir, so we can later find
		// out that this is indeed an ownCloud data directory
		// (in case it didn't exist before)
		\file_put_contents($this->config->getSystemValue('datadirectory', \OC::$SERVERROOT . '/data') . '/.ocdata', '');

		// pre-upgrade repairs
		$repair = new Repair(Repair::getBeforeUpgradeRepairSteps(), \OC::$server->getEventDispatcher());
		$repair->run();

		$this->doCoreUpgrade();

		try {
			// TODO: replace with the new repair step mechanism https://github.com/owncloud/core/pull/24378
			Setup::installBackgroundJobs();
		} catch (\Exception $e) {
			throw new \Exception($e->getMessage());
		}

		// update all apps
		$this->doAppUpgrade();

		// install new shipped apps on upgrade
		OC_App::loadApps('authentication');
		$errors = Installer::installShippedApps(true);
		foreach ($errors as $appId => $exception) {
			/** @var \Exception $exception */
			$this->log->logException($exception, ['app' => $appId]);
			$this->emit('\OC\Updater', 'failure', [$appId . ': ' . $exception->getMessage()]);
		}

		// post-upgrade repairs
		$repair = new Repair(Repair::getRepairSteps(), \OC::$server->getEventDispatcher());
		$repair->run();

		//Invalidate update feed
		$this->config->setAppValue('core', 'lastupdatedat', 0);

		// Check for code integrity if not disabled
		if (\OC::$server->getIntegrityCodeChecker()->isCodeCheckEnforced()) {
			$this->emit('\OC\Updater', 'startCheckCodeIntegrity');
			$this->checker->runInstanceVerification();
			$this->emit('\OC\Updater', 'finishedCheckCodeIntegrity');
		}

		// only set the final version if everything went well
		$this->config->setSystemValue('version', \implode('.', Util::getVersion()));
		$this->config->setAppValue('core', 'vendor', $this->getVendor());
	}

	protected function doCoreUpgrade() {
		$this->emit('\OC\Updater', 'dbUpgradeBefore');

		// execute core migrations
		if (\is_dir(\OC::$SERVERROOT."/core/Migrations")) {
			$ms = new \OC\DB\MigrationService('core', \OC::$server->getDatabaseConnection());
			$ms->migrate();
		}

		$this->emit('\OC\Updater', 'dbUpgrade');
	}

	/**
	 * upgrades all apps within a major ownCloud upgrade. Also loads "priority"
	 * (types authentication, filesystem, logging, in that order) afterwards.
	 *
	 * @throws NeedsUpdateException
	 */
	protected function doAppUpgrade() {
		$apps = \OC_App::getEnabledApps();
		$priorityTypes = ['authentication', 'filesystem', 'logging'];
		$pseudoOtherType = 'other';
		$stacks = [$pseudoOtherType => []];

		foreach ($apps as $appId) {
			$priorityType = false;
			foreach ($priorityTypes as $type) {
				if (!isset($stacks[$type])) {
					$stacks[$type] = [];
				}
				if (\OC_App::isType($appId, $type)) {
					$stacks[$type][] = $appId;
					$priorityType = true;
					break;
				}
			}
			if (!$priorityType) {
				$stacks[$pseudoOtherType][] = $appId;
			}
		}
		foreach ($stacks as $type => $stack) {
			foreach ($stack as $appId) {
				if (\OC_App::shouldUpgrade($appId)) {
					$this->emit('\OC\Updater', 'appUpgradeStarted', [$appId, \OC_App::getAppVersion($appId)]);
					\OC_App::updateApp($appId);
					$this->emit('\OC\Updater', 'appUpgrade', [$appId, \OC_App::getAppVersion($appId)]);
				}
				if ($type !== $pseudoOtherType) {
					// load authentication, filesystem and logging apps after
					// upgrading them. Other apps my need to rely on modifying
					// user and/or filesystem aspects.
					\OC_App::loadApp($appId, false);
				}
			}
		}
	}

	/**
	 * Forward messages emitted by the repair routine
	 */
	private function emitRepairEvents() {
		$dispatcher = \OC::$server->getEventDispatcher();
		$dispatcher->addListener('\OC\Repair::warning', function ($event) {
			if ($event instanceof GenericEvent) {
				$this->emit('\OC\Updater', 'repairWarning', $event->getArguments());
			}
		});
		$dispatcher->addListener('\OC\Repair::error', function ($event) {
			if ($event instanceof GenericEvent) {
				$this->emit('\OC\Updater', 'repairError', $event->getArguments());
			}
		});
		$dispatcher->addListener('\OC\Repair::info', function ($event) {
			if ($event instanceof GenericEvent) {
				$this->emit('\OC\Updater', 'repairInfo', $event->getArguments());
			}
		});
		$dispatcher->addListener('\OC\Repair::step', function ($event) {
			if ($event instanceof GenericEvent) {
				$this->emit('\OC\Updater', 'repairStep', $event->getArguments());
			}
		});
	}
}
