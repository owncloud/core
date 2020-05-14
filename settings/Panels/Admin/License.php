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

use OCP\License\ILicenseManager;
use OCP\Settings\ISettings;
use OCP\Template;

class License implements ISettings {
	/** @var ILicenseManager */
	private $licenseManager;

	public function __construct(ILicenseManager $licenseManager) {
		$this->licenseManager = $licenseManager;
	}

	public function getPriority() {
		return 20;
	}

	public function getSectionID() {
		return 'general';
	}

	public function getPanel() {
		$template = new Template('settings', 'panels/admin/license');

		$messageInfo = $this->licenseManager->getLicenseMessageFor('core');  // use "core" as appid

		$divMessageClass = 'class="warning"';
		$messageCode = $messageInfo['license_state'];
		if ($messageCode === ILicenseManager::LICENSE_STATE_MISSING ||
			$messageCode === ILicenseManager::LICENSE_STATE_VALID ||
			$messageCode === ILicenseManager::LICENSE_STATE_ABOUT_TO_EXPIRE
		) {
			$divMessageClass = '';
		}

		$template->assign('messageInfo', $messageInfo);
		$template->assign('divMessageClass', $divMessageClass);
		return $template;
	}
}
