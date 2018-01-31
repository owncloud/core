<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

namespace OCA\Encryption\Migrations;

use OCP\Migration\ISimpleMigration;
use OCP\Migration\IOutput;

class Version20170913113840 implements ISimpleMigration {

	/**
	 * @param IOutput $out
	*/
	public function run(IOutput $out) {
		$installedVersion = \OC::$server->getConfig()->getSystemValue('version', '0.0.0');

		if (version_compare('10.0.3', $installedVersion, '>=') === true) {
			$encryptionEnable = \OC::$server->getAppConfig()->getValue('encryption', 'enabled', 'yes');
			$coreEncryptionEnable = \OC::$server->getAppConfig()->getValue('core', 'encryption_enabled', 'yes');
			$userSpecificKey = \OC::$server->getAppConfig()->getValue('encryption', 'userSpecificKey', '');
			$masterKey = \OC::$server->getAppConfig()->getValue('encryption', 'useMasterKey', '');

			if (($userSpecificKey === '') && ($masterKey === '') &&
				($encryptionEnable === 'yes') && ($coreEncryptionEnable === 'yes')) {
				\OC::$server->getConfig()->setAppValue('encryption', 'userSpecificKey', '1');
			}
		}
	}
}


