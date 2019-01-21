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

namespace OC\Settings\Panels\Admin;

use OCP\Settings\ISettings;
use OCP\Template;

class Encryption implements ISettings {
	public function getPriority() {
		return 30;
	}

	public function getPanel() {
		$tmpl = new Template('settings', 'panels/admin/encryption');
		$tmpl->assign('encryptionEnabled', \OC::$server->getEncryptionManager()->isEnabled());
		$tmpl->assign('encryptionReady', \OC::$server->getEncryptionManager()->isReady());
		$tmpl->assign('hsmEnabled', \OC::$server->getConfig()->getAppValue('encryption', 'hsmEnabled', '0'));
		$tmpl->assign('hsmURL', \OC::$server->getConfig()->getAppValue('encryption', 'hsm.url', '0'));
		$tmpl->assign('hsmJWTSecret', \OC::$server->getConfig()->getAppValue('encryption', 'hsm.jwt.secret', '0'));
		$encryptionModules = \OC::$server->getEncryptionManager()->getEncryptionModules();
		$defaultEncryptionModuleId = \OC::$server->getEncryptionManager()->getDefaultEncryptionModuleId();
		$encModules = [];
		foreach ($encryptionModules as $module) {
			$encModules[$module['id']]['displayName'] = $module['displayName'];
			$encModules[$module['id']]['default'] = false;
			if ($module['id'] === $defaultEncryptionModuleId) {
				$encModules[$module['id']]['default'] = true;
			}
		}
		$backends = \OC::$server->getUserManager()->getBackends();
		$externalBackends = (\count($backends) > 1) ? true : false;
		$tmpl->assign('externalBackendsEnabled', $externalBackends);
		$tmpl->assign('encryptionModules', $encModules);
		return $tmpl;
	}

	public function getSectionID() {
		return 'encryption';
	}
}
