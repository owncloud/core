<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace Owncloud\Updater\Utils;

/**
 * Class AppManager
 *
 * @package Owncloud\Updater\Utils
 */
class AppManager {
	/**
	 * @var OccRunner $occRunner
	 */
	protected $occRunner;

	/**
	 * @var array $disabledApps
	 */
	protected $disabledApps = [];

	/**
	 *
	 * @param OccRunner $occRunner
	 */
	public function __construct(OccRunner $occRunner) {
		$this->occRunner = $occRunner;
	}

	/**
	 * @param $appId
	 * @return bool
	 */
	public function disableApp($appId) {
		try {
			$this->occRunner->run('app:disable', ['app-id' => $appId]);
		} catch (\Exception $e) {
			return false;
		}
		return true;
	}

	/**
	 * @param $appId
	 * @return bool
	 */
	public function enableApp($appId) {
		try {
			$this->occRunner->run('app:enable', ['app-id' => $appId]);
			\array_unshift($this->disabledApps, $appId);
		} catch (\Exception $e) {
			return false;
		}
		return true;
	}

	/**
	 * @return array
	 */
	public function getAllApps() {
		$shippedApps = $this->occRunner->runJson('app:list');
		$allApps = \array_merge(\array_keys($shippedApps['enabled']), \array_keys($shippedApps['disabled']));
		return $allApps;
	}

	/**
	 * @return array
	 */
	public function getNotShippedApps() {
		$shippedApps = $this->occRunner->runJson('app:list', ['--shipped' => 'false']);
		$allApps = \array_merge(\array_keys($shippedApps['enabled']), \array_keys($shippedApps['disabled']));
		return $allApps;
	}

	/**
	 * @return array
	 */
	public function getShippedApps() {
		$shippedApps = $this->occRunner->runJson('app:list', ['--shipped' => 'true']);
		$allApps = \array_merge(\array_keys($shippedApps['enabled']), \array_keys($shippedApps['disabled']));
		return $allApps;
	}

	/**
	 * @param $appId
	 * @return string
	 */
	public function getAppPath($appId) {
		try {
			$response = $this->occRunner->run('app:getpath', ['app' => $appId]);
		} catch (\Exception $e) {
			return '';
		}
		return \trim($response);
	}
}
