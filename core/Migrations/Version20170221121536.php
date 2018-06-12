<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
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
namespace OC\Migrations;

use OCP\Migration\ISimpleMigration;
use OCP\Migration\IOutput;

/**
 * If files_external app was disable before, set flag in app config to disable it in core.
 * This is necessary because starting with 10.0 the files_external app will always be enabled.
 */
class Version20170221121536 implements ISimpleMigration {
	public function run(IOutput $out) {
		$config = \OC::$server->getConfig();
		$filesExternalEnabled = $config->getAppValue('files_external', 'enabled', 'no') === 'yes';
		if (!$filesExternalEnabled) {
			// was not enabled before, keep default disabled
			return;
		}

		$externalStorageEnabled = $config->getAppValue('core', 'enable_external_storage', null);
		if ($externalStorageEnabled !== null) {
			// this was already set before for some reason
			return;
		}

		$value = $filesExternalEnabled ? 'yes' : 'no';
		$out->info('Enable external storage: ' . $value);
		$config->setAppValue('core', 'enable_external_storage', $value);
	}
}
