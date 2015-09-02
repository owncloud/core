<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <rmccorkell@owncloud.com>
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

namespace OCP\App;

/**
 * Application loader
 *
 * @since 8.2.0
 */
interface IAppLoader {

	/**
	 * Retrieve an app Application instance
	 *
	 * @param string $appId
	 * @return \OCP\AppFramework\App|null
	 * @since 8.2.0
	 */
	public function getApp($appId);

	/**
	 * Load the app and return the Application instance
	 *
	 * @param string $appId
	 * @return \OCP\AppFramework\App
	 * @since 8.2.0
	 */
	public function loadApp($appId);
}
