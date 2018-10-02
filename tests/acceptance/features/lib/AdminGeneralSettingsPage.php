<?php

/**
 * ownCloud
 *
 * @author Paurakh Sharma Humagain <paurakh@jankaritech.com>
 * @copyright Copyright (c) 2018 Paurakh Sharma Humagain paurakh@jankaritech.com
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License,
 * as published by the Free Software Foundation;
 * either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace Page;

use Behat\Gherkin\Node\TableNode;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use WebDriver\Session;
use TestHelpers\EmailHelper;

/**
 * Admin General Settings page.
 */
class AdminGeneralSettingsPage extends OwncloudPage {

	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/settings/admin?sectionid=general';

	protected $sendModeTypeId = 'mail_smtpmode';
	protected $encryptionTypeId = 'mail_smtpsecure';
	protected $mailFromAddressFieldId = 'mail_from_address';
	protected $mailDomainFieldId = 'mail_domain';
	protected $authMethodTypeId = 'mail_smtpauthtype';
	protected $authRequiredCheckboxXpath = '//label[@for="mail_smtpauth"]';
	protected $authRequiredCheckboxId = 'mail_smtpauth';
	protected $serverAddressFieldId = 'mail_smtphost';
	protected $serverPortFieldId = 'mail_smtpport';
	protected $sendTestEmailBtnId = 'sendtestemail';

	/**
	 * set email server settings
	 *
	 * @param TableNode $emailSettingsTable
	 *
	 * @return void
	 */
	public function setEmailServerSettings($emailSettingsTable) {
		foreach ($emailSettingsTable as $row) {
			if ($row['setting'] === 'send mode') {
				$this->selectFieldOption($this->sendModeTypeId, $row['value']);
			} elseif ($row['setting'] === 'encryption') {
				$this->selectFieldOption($this->encryptionTypeId, $row['value']);
			} elseif ($row['setting'] === 'from address') {
				$this->fillField($this->mailFromAddressFieldId, $row['value']);
			} elseif ($row['setting'] === 'mail domain') {
				$this->fillField($this->mailDomainFieldId, $row['value']);
			} elseif ($row['setting'] === 'authentication method') {
				$this->selectFieldOption($this->authMethodTypeId, $row['value']);
			} elseif ($row['setting'] === 'authentication required') {
				$this->checkRequiredAuthentication($row['value']);
			} elseif ($row['setting'] === 'server address') {
				if ($row['value'] === "%MAILHOG_HOST%") {
					$row['value'] = EmailHelper::getMailhogHost();
				}
				$this->fillField($this->serverAddressFieldId, $row['value']);
			} elseif ($row['setting'] === 'port') {
				$this->fillField($this->serverPortFieldId, $row['value']);
			}
		}
		$this->waitForAjaxCallsToStartAndFinish($this->getSession());
	}

	/**
	 * send test email
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function sendTestEmail($session) {
		$sendTestEmailBtn = $this->findById($this->sendTestEmailBtnId);

		if ($sendTestEmailBtn === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" id $this->sendTestEmailBtnId " .
				"could not find button"
			);
		}

		$sendTestEmailBtn->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * enable/disable authentication
	 *
	 * @param string $requiredState ('true' | 'false')
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function checkRequiredAuthentication($requiredState) {
		$checkbox = $this->find("xpath", $this->authRequiredCheckboxXpath);
		$checkCheckbox = $this->findById($this->authRequiredCheckboxId);
		
		if ($checkbox === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->authRequiredCheckboxXpath " .
				"could not find label for checkbox"
			);
		}
		
		if ($checkCheckbox === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" id $this->authRequiredCheckboxId " .
				"could not find checkbox"
			);
		}
		
		if ($requiredState == 'true') {
			if (!$checkCheckbox->isChecked()) {
				$checkbox->click();
			}
		} elseif ($requiredState == 'false') {
			if ($checkCheckbox->isChecked()) {
				$checkbox->click();
			}
		} else {
			throw new \Exception(
				__METHOD__ . " invalid action: $action"
			);
		}
	}
}
