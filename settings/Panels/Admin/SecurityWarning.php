<?php
/**
 * @author Tom Needham <tom@owncloud.com>
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

namespace OC\Settings\Panels\Admin;

use OC\Lock\NoopLockingProvider;
use OC\Settings\Panels\Helper;
use OCP\IConfig;
use OCP\IDBConnection;
use OCP\IL10N;
use OCP\Lock\ILockingProvider;
use OCP\Settings\ISettings;
use OCP\Template;

class SecurityWarning implements ISettings {

	/** @var IL10N */
	protected $l;
	/** @var IConfig */
	protected $config;
	/** @var IDBConnection */
	protected $dbconnection;
	/** @var Helper */
	protected $helper;
	/** @var ILockingProvider */
	protected $lockingProvider;

	public function __construct(IL10N $l,
								IConfig $config,
								IDBConnection $dbconnection,
								Helper $helper,
								ILockingProvider $lockingProvider) {
		$this->l = $l;
		$this->config = $config;
		$this->dbconnection = $dbconnection;
		$this->helper = $helper;
		$this->lockingProvider = $lockingProvider;
	}

	public function getPriority() {
		return 1000;
	}

	public function getPanel() {
		// create htaccess test file
		$util = new \OC_Util();
		$util->createHtaccessTestFile($this->config);

		$template = new Template('settings', 'panels/admin/securitywarning');
		// warn if php is not setup properly to get system variables with getenv
		$path = \getenv('PATH');
		$template->assign('getenvServerNotWorking', empty($path));
		$template->assign('readOnlyConfigEnabled', $this->config->isSystemConfigReadOnly());
		$template->assign('isAnnotationsWorking', $this->helper->isAnnotationsWorking());
		try {
			if ($this->dbconnection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\SqlitePlatform) {
				$template->assign('invalidTransactionIsolationLevel', false);
			} else {
				$template->assign('invalidTransactionIsolationLevel', $this->dbconnection->getTransactionIsolation() !== \Doctrine\DBAL\Connection::TRANSACTION_READ_COMMITTED);
			}
		} catch (\Doctrine\DBAL\DBALException $e) {
			// ignore
			$template->assign('invalidTransactionIsolationLevel', false);
		}
		// warn if outdated version of a memcache module is used
		$caches = [
		'apcu'	=> ['name' => $this->l->t('APCu'), 'version' => '4.0.6'],
		'redis'	=> ['name' => $this->l->t('Redis'), 'version' => '2.2.5'],
		];
		$outdatedCaches = [];
		foreach ($caches as $php_module => $data) {
			$isOutdated = \extension_loaded($php_module) && \version_compare(\phpversion($php_module), $data['version'], '<') && (\strpos(\phpversion($php_module), 'dev')===false);
			if ($isOutdated) {
				$outdatedCaches[$php_module] = $data;
			}
		}
		$template->assign('OutdatedCacheWarning', $outdatedCaches);
		$template->assign('has_fileinfo', $this->helper->fileInfoLoaded());
		$databaseOverload = (\strpos($this->config->getSystemValue('dbtype'), 'sqlite') !== false);
		$template->assign('databaseOverload', $databaseOverload);
		if ($this->lockingProvider instanceof NoopLockingProvider) {
			$template->assign('fileLockingType', 'none');
		} elseif ($this->lockingProvider instanceof \OC\Lock\DBLockingProvider) {
			$template->assign('fileLockingType', 'db');
		} else {
			$template->assign('fileLockingType', 'cache');
		}
		$template->assign('isLocaleWorking', $this->helper->isSetLocaleWorking());

		// If the current web root is non-empty but the web root from the config is,
		// and system cron is used, the URL generator fails to build valid URLs.
		$shouldSuggestOverwriteCliUrl = $this->config->getAppValue('core', 'backgroundjobs_mode', 'ajax') === 'cron' &&
		\OC::$WEBROOT && \OC::$WEBROOT !== '/' &&
		!$this->config->getSystemValue('overwrite.cli.url', '');
		$suggestedOverwriteCliUrl = ($shouldSuggestOverwriteCliUrl) ? \OC::$WEBROOT : '';
		$template->assign('suggestedOverwriteCliUrl', $suggestedOverwriteCliUrl);
		$template->assign('backgroundjobs_mode', $this->config->getAppValue('core', 'backgroundjobs_mode', 'ajax'));
		$template->assign('cronErrors', $this->config->getAppValue('core', 'cronErrors'));
		$template->assign('checkForWorkingWellKnownSetup', $this->config->getSystemValue('check_for_working_wellknown_setup', true));
		return $template;
	}

	public function getSectionID() {
		return 'general';
	}
}
