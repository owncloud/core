<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
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

namespace OC\Updater;

use OCP\App\IAppManager;

class PreUpdate {
	/** @var  IAppManager */
	private $appManager;

	public function __construct(IAppManager $appManager) {
		$this->appManager = $appManager;
	}

	/**
	 * @return string[] array of application ids
	 */
	public function getMissingApps(){
		$installedApps = $this->appManager->getInstalledApps();
		$missingApps = [];
		foreach ($installedApps as $appId){
			$info = $this->appManager->getAppInfo($appId);
			if (!isset($info['id'])){
				$missingApps[] = $appId;
			}
		}
		return $missingApps;
	}
}
