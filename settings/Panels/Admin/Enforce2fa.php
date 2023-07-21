<?php
/**
 * @copyright Copyright (c) 2023, ownCloud GmbH
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
use OCP\IConfig;

class Enforce2fa implements ISettings {
	/** @var IConfig */
	protected $config;

	public function __construct(IConfig $config) {
		$this->config = $config;
	}

	public function getPriority() {
		return 50;
	}

	public function getPanel() {
		$enforce2faExcludedGroups = \json_decode($this->config->getAppValue('core', 'enforce_2fa_excluded_groups', '[]'), true);
		$tmpl = new Template('settings', 'panels/admin/enforce2fa');
		$tmpl->assign('enforce2fa', $this->config->getAppValue('core', 'enforce_2fa', 'no') === 'yes');
		$tmpl->assign('enforce2faExcludedGroups', \implode('|', $enforce2faExcludedGroups));
		return $tmpl;
	}

	public function getSectionID() {
		return 'security';
	}
}
