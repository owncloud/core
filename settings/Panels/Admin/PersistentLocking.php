<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgear.es>
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

namespace OC\Settings\Panels\Admin;

use OC\Lock\Persistent\LockManager;
use OCP\Settings\ISettings;
use OCP\Template;
use OCP\IConfig;

class PersistentLocking implements ISettings {
	/** @var IConfig */
	private $config;

	public function __construct(IConfig $config) {
		$this->config = $config;
	}

	public function getPriority() {
		return 0;
	}

	public function getSectionID() {
		return 'additional';
	}

	public function getPanel() {
		// we must use the same container
		$tmpl = new Template('settings', 'panels/admin/persistentlocking');
		$tmpl->assign('defaultTimeout', $this->config->getAppValue('core', 'lock_timeout_default', LockManager::LOCK_TIMEOUT_DEFAULT));
		$tmpl->assign('maximumTimeout', $this->config->getAppValue('core', 'lock_timeout_max', LockManager::LOCK_TIMEOUT_MAX));
		$tmpl->assign('manualFileLockOnClientsEnabled', $this->config->getAppValue('files', 'enable_lock_file_action', 'no'));

		return $tmpl;
	}
}
