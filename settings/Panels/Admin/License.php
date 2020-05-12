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

use OC\License\LicenseFetcher;
use OC\License\MessageService;
use OCP\Settings\ISettings;
use OCP\Template;

class License implements ISettings {
	/** @var LicenseFetcher */
	private $licenseFetcher;
	/** @var MessageService */
	private $messageService;

	public function __construct(LicenseFetcher $licenseFetcher, MessageService $messageService) {
		$this->licenseFetcher = $licenseFetcher;
		$this->messageService = $messageService;
	}

	public function getPriority() {
		return 20;
	}

	public function getSectionID() {
		return 'general';
	}

	public function getPanel() {
		$daysLeft = 0;
		$template = new Template('settings', 'panels/admin/license');

		$ocLicense = $this->licenseFetcher->getOwncloudLicense();
		$messageInfo = $this->messageService->getMessageForLicense($ocLicense);  // null license is considered

		$divMessageClass = 'class="warning"';
		$messageCode = $messageInfo['code'];
		if ($messageCode === MessageService::MESSAGE_LICENSE_MISSING ||
			$messageCode === MessageService::MESSAGE_LICENSE_OK_NORMAL ||
			$messageCode === MessageService::MESSAGE_LICENSE_OK_DEMO
		) {
			$divMessageClass = '';
		}

		$template->assign('messageInfo', $messageInfo);
		$template->assign('divMessageClass', $divMessageClass);
		return $template;
	}
}
