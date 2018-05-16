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

use OCP\App\IAppManager;
use OCP\IAppConfig;
use OCP\IConfig;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;

/**
 * Leave only one app-theme active to prevent the mess
 */
class DisableExtraThemes implements IRepairStep {

	/** @var IAppManager */
	protected $appManager;

	/** @var IConfig */
	protected $config;

	/** @var IAppConfig */
	protected $appConfig;

	/**
	 * @param IAppManager $appManager
	 * @param IConfig $config
	 * @param IAppConfig $appConfig
	 */
	public function __construct($appManager, $config, $appConfig) {
		$this->appManager = $appManager;
		$this->config = $config;
		$this->appConfig = $appConfig;
	}

	public function getName() {
		return 'Disable extra themes';
	}

	/**
	 * @param IOutput $out
	 */
	public function run(IOutput $out) {
		$enabledThemes = $this->getEnabledAppThemes();

		$activeTheme = '';
		if (\count($enabledThemes) >= 2) {
			$activeTheme = \array_pop($enabledThemes);
			foreach ($enabledThemes as $appId) {
				$this->appManager->disableApp($appId);
				$out->info("Theme $appId disabled");
			}
		}

		$activeLegacyTheme = $this->config->getSystemValue('theme', '');
		if ($activeLegacyTheme !== '' && \count($enabledThemes) > 0) {
			$this->config->setSystemValue('theme', '');
			$out->info("Legacy theme $activeLegacyTheme disabled");
		}

		if ($activeTheme !== '') {
			$out->info("Theme $activeTheme left active");
		}
	}

	/**
	 * @return string[]
	 */
	protected function getEnabledAppThemes() {
		// get enabled apps as index => appId
		$enabledApps = $this->appManager->getInstalledApps();

		// get themes as appId => appType
		$appTypes = $this->appConfig->getValues(false, 'types');
		$allThemes = \array_filter(
			$appTypes,
			function ($appTypes) {
				return \in_array('theme', \explode(',', $appTypes));
			}
		);

		// calculate an intersection to get enabled themes
		$enabledThemes = \array_intersect(\array_keys($allThemes), $enabledApps);

		return $enabledThemes;
	}
}
