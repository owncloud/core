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

namespace OC\Settings\Panels;

class Helper {
	public function getStorageInfo($path) {
		return \OC_Helper::getStorageInfo($path);
	}

	public function getPersonalForms() {
		return \OC_App::getForms('personal');
	}

	public function getAdminForms() {
		return \OC_App::getForms('admin');
	}

	public function shareWithGroupMembersOnly() {
		return \OC\Share\Share::shareWithGroupMembersOnly();
	}

	public function findBinaryPath($path) {
		return (bool) \OC_Helper::findBinaryPath($path);
	}

	public function isAnnotationsWorking() {
		return \OC_Util::isAnnotationsWorking();
	}

	public function fileInfoLoaded() {
		return \OC_Util::fileInfoLoaded();
	}

	public function isSetLocaleWorking() {
		return \OC_Util::isSetLocaleWorking();
	}

	public function getLogFilePath() {
		return \OC\Log\Owncloud::getLogFilePath();
	}

	public function getMountDepMessage($backends) {
		return \OC_Mount_Config::dependencyMessage($backends);
	}
}
