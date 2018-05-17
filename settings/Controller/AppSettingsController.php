<?php
/**
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OC\Settings\Controller;

use OC\App\DependencyAnalyzer;
use OC\App\Platform;
use OCP\App\IAppManager;
use \OCP\AppFramework\Controller;
use OCP\IRequest;
use OCP\IL10N;
use OCP\IConfig;

/**
 * @package OC\Settings\Controller
 */
class AppSettingsController extends Controller {
	const CAT_ENABLED = 0;
	const CAT_DISABLED = 1;

	/** @var \OCP\IL10N */
	private $l10n;
	/** @var IConfig */
	private $config;
	/** @var IAppManager */
	private $appManager;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param IL10N $l10n
	 * @param IConfig $config
	 * @param IAppManager $appManager
	 */
	public function __construct($appName,
								IRequest $request,
								IL10N $l10n,
								IConfig $config,
								IAppManager $appManager) {
		parent::__construct($appName, $request);
		$this->l10n = $l10n;
		$this->config = $config;
		$this->appManager = $appManager;
	}

	/**
	 * Get all available apps in a category
	 *
	 * @param string $category
	 * @return array
	 */
	public function listApps($category = '') {
		if ($category === '') {
			$category = 'enabled';
		}
		switch ($category) {
			// installed apps
			case 'enabled':
				$apps = $this->getInstalledApps();
				\usort($apps, function ($a, $b) {
					$a = (string)$a['name'];
					$b = (string)$b['name'];
					if ($a === $b) {
						return 0;
					}
					return ($a < $b) ? -1 : 1;
				});
				break;
			// not-installed apps
			case 'disabled':
				$apps = \OC_App::listAllApps();
				$apps = \array_filter($apps, function ($app) {
					return !$app['active'];
				});
				\usort($apps, function ($a, $b) {
					$a = (string)$a['name'];
					$b = (string)$b['name'];
					if ($a === $b) {
						return 0;
					}
					return ($a < $b) ? -1 : 1;
				});
				break;
			default:
				$apps = [];

				break;
		}

		// fix groups to be an array
		$dependencyAnalyzer = new DependencyAnalyzer(new Platform($this->config), $this->l10n);
		$apps = \array_map(function ($app) use ($dependencyAnalyzer) {

			// fix groups
			$groups = [];
			if (\is_string($app['groups'])) {
				$groups = \json_decode($app['groups']);
			} elseif (\is_array($app['groups'])) {
				$groups = $app['groups'];
			}
			$app['groups'] = $groups;
			$app['canUnInstall'] = !$app['active'] && $app['removable'];

			// fix licence vs license
			if (isset($app['license']) && !isset($app['licence'])) {
				$app['licence'] = $app['license'];
			}

			// analyse dependencies
			$missing = $dependencyAnalyzer->analyze($app);
			$app['canInstall'] = empty($missing);
			$app['missingDependencies'] = $missing;

			$app['missingMinOwnCloudVersion'] = !isset($app['dependencies']['owncloud']['@attributes']['min-version']);
			$app['missingMaxOwnCloudVersion'] = !isset($app['dependencies']['owncloud']['@attributes']['max-version']);

			return $app;
		}, $apps);

		return ['apps' => $apps, 'status' => 'success'];
	}

	/**
	 * @return array
	 */
	private function getInstalledApps() {
		$apps = \OC_App::listAllApps();
		$apps = \array_filter($apps, function ($app) {
			return $app['active'];
		});
		return $apps;
	}
}
