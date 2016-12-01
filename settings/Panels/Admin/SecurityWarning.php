<?php
/**
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

use OCP\IConfig;
use OCP\IL10N;
use OCP\Settings\ISettings;
use OCP\Template;

class SecurityWarning implements ISettings {

	/** @var  IL10N */
	protected $l;

	/** @var IConfig  */
	protected $config;

	public function __construct(IL10N $l, IConfig $config) {
		$this->l = $l;
		$this->config = $config;
	}

    public function getPriority() {
        return 0;
    }

    public function getPanel() {
		$template = new Template('settings', 'panels/admin/securitywarning');
		// warn if php is not setup properly to get system variables with getenv
		$path = getenv('PATH');
		$template->assign('getenvServerNotWorking', empty($path));
		$template->assign('readOnlyConfigEnabled', \OC_Helper::isReadOnlyConfigEnabled());
		$template->assign('isAnnotationsWorking', \OC_Util::isAnnotationsWorking());
		/** @var \Doctrine\DBAL\Connection $connection */
		$connection = \OC::$server->getDatabaseConnection();
		try {
			if ($connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\SqlitePlatform) {
				$template->assign('invalidTransactionIsolationLevel', false);
			} else {
				$template->assign('invalidTransactionIsolationLevel', $connection->getTransactionIsolation() !== \Doctrine\DBAL\Connection::TRANSACTION_READ_COMMITTED);
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
			$isOutdated = extension_loaded($php_module) && version_compare(phpversion($php_module), $data['version'], '<');
			if ($isOutdated) {
				$outdatedCaches[$php_module] = $data;
			}
		}
		$template->assign('OutdatedCacheWarning', $outdatedCaches);
		$template->assign('has_fileinfo', \OC_Util::fileInfoLoaded());
		$databaseOverload = (strpos(\OCP\Config::getSystemValue('dbtype'), 'sqlite') !== false);
		$template->assign('databaseOverload', $databaseOverload);
		$lockingProvider = \OC::$server->getLockingProvider();
		if ($lockingProvider instanceof NoopLockingProvider) {
			$template->assign('fileLockingType', 'none');
		} else if ($lockingProvider instanceof \OC\Lock\DBLockingProvider) {
			$template->assign('fileLockingType', 'db');
		} else {
			$template->assign('fileLockingType', 'cache');
		}
		$template->assign('isLocaleWorking', \OC_Util::isSetLocaleWorking());

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
