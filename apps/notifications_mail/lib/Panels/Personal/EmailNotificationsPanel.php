<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgear.es>
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

namespace OCA\notifications_mail\Panels\Personal;

use OCP\Settings\ISettings;
use OCP\Template;
use OCP\IConfig;
use OCP\IUserSession;

class EmailNotificationsPanel implements ISettings {
	/** @var IConfig */
	private $config;
	/** @var IUserSession */
	private $userSession;

	public function __construct(IConfig $config, IUserSession $userSession) {
		$this->config = $config;
		$this->userSession = $userSession;
	}
	public function getPanel() {
		$emailSendingOption = $this->config->getUserValue($this->userSession->getUser()->getUID(), 'notifications_mail', 'email_sending_option', 'never');
		$possibleOptions = [
			'never' => [
				'visibleText' => 'Never send me any notification email',
				'selected' => false,
			],
			'action' => [
				'visibleText' => 'Only send me an email when the notification requires some action',
				'selected' => false,
			],
			'always' => [
				'visibleText' => 'Always send me an email for any notification',
				'selected' => false,
			],
		];

		if (!isset($possibleOptions[$emailSendingOption])) {
			$this->config->setUserValue($this->userSession->getUser()->getUID(), 'notifications_mail', 'email_sending_option', 'never');
			$emailSendingOption = 'never';
		}
		$possibleOptions[$emailSendingOption]['selected'] = true;

		$tmpl = new Template('notifications_mail', 'panels/personal/emailnotifications');
		$tmpl->assign('possibleOptions', $possibleOptions);
		return $tmpl;
	}

	public function getPriority() {
		return 0;
	}

	public function getSectionID() {
		return 'additional';
	}
}
