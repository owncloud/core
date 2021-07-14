<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author ideaship <ideaship@users.noreply.github.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OC\Core\Controller;

use OC\Setup;
use OCP\IConfig;
use OCP\ILogger;

class SetupController {
	/**
	 * @var array map of setup key => config.php key
	 */
	private $keyMapping = [
		'directory' => 'datadirectory',
		'dbtype' => 'dbtype',
		'dbname' => 'dbname',
		'dbuser' => 'dbuser',
		'dbpass' => 'dbpassword',
		'dbhost' => 'dbhost',
		'dbtableprefix' => 'dbtableprefix',
		'apps_paths' => 'apps_paths',
		'adminlogin' => 'adminlogin',
		'adminpass' => 'adminpass',
	];

	protected $confUsed = false;

	/** @var Setup */
	protected $setupHelper;

	/** @var IConfig */
	protected $config;

	/** @var ILogger */
	protected $logger;

	/**
	 * @param Setup $setupHelper
	 */
	public function __construct(Setup $setupHelper, IConfig $config, ILogger $logger) {
		$this->setupHelper = $setupHelper;
		$this->config = $config;
		$this->logger = $logger;
	}

	/**
	 * @param $post
	 */
	public function run($post) {
		// Check for autosetup
		$post = $this->loadConfig($post);
		$opts = $this->setupHelper->getSystemInfo();

		// convert 'abcpassword' to 'abcpass'
		if (isset($post['adminpassword'])) {
			$post['adminpass'] = $post['adminpassword'];
		}
		if (isset($post['dbpassword'])) {
			$post['dbpass'] = $post['dbpassword'];
		}

		if (isset($post['install']) && $post['install']=='true') {
			// We have to launch the installation process :
			$e = $this->setupHelper->install($post);
			$errors = ['errors' => $e];

			if (\count($e) > 0) {
				$options = \array_merge($opts, $post, $errors);
				$this->display($options);
			} else {
				$this->finishSetup();
			}
		} else {
			$options = \array_merge($opts, $post);
			$this->display($options);
		}
	}

	public function display($post) {
		$defaults = [
			'adminlogin' => '',
			'adminpass' => '',
			'dbuser' => '',
			'dbpass' => '',
			'dbname' => '',
			'dbtablespace' => '',
			'dbhost' => 'localhost',
			'dbtype' => '',
			'directory' => '',
			'databases' => []
		];
		$parameters = \array_merge($defaults, $post);

		\OC_Util::addVendorScript('strengthify/jquery.strengthify');
		\OC_Util::addVendorStyle('strengthify/strengthify');
		\OC_Util::addScript('setup');
		\OC_Template::printGuestPage('', 'installation', $parameters);
	}

	public function finishSetup() {
		if ($this->confUsed === true) {
			$this->logger->info(
				'Config file found, setting up ownCloud…',
				['app' => 'core']
			);
			// cleanup autoconf
			$this->config->deleteSystemValue('adminlogin');
			$this->config->deleteSystemValue('adminpass');
		}

		\OC::$server->getIntegrityCodeChecker()->runInstanceVerification();
		\OC_Util::redirectToDefaultPage();
	}

	public function loadConfig($post) {
		foreach ($this->keyMapping as $setupKey => $configKey) {
			$sysValue = $this->config->getSystemValue($configKey, null);
			if ($sysValue !== null) {
				$post[$setupKey] = $sysValue;
				$this->confUsed = true;
			} elseif ($configKey === 'apps_paths') {
				// Default app directories configuration
				$post[$setupKey] = [
					0 => [
						'path' => \OC::$SERVERROOT.'/apps',
						'url' => '/apps',
						'writable' => false,
					],
					1 => [
						'path' => \OC::$SERVERROOT.'/apps-external',
						'url' => '/apps-external',
						'writable' => true,
					]
				];
			}
		}

		$dbIsSet = isset($post['dbtype']);
		$directoryIsSet = isset($post['directory']);
		$adminAccountIsSet = isset($post['adminlogin']);

		if ($dbIsSet && $directoryIsSet && $adminAccountIsSet) {
			$post['install'] = 'true';
		}
		$post['dbIsSet'] = $dbIsSet;
		$post['directoryIsSet'] = $directoryIsSet;

		return $post;
	}
}
