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
use Behat\Mink\Session;
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

	protected $imprintUrlFieldId = 'legal_imprint';
	protected $privacyPolicyUrlFieldId = 'legal_privacy_policy';

	protected $releaseChannelId = 'release-channel';

	protected $cronJobAjaxXpath = "//label[@for='backgroundjobs_ajax']";
	protected $cronJobWebCronXpath = "//label[@for='backgroundjobs_webcron']";
	protected $cronJobCronXpath = "//label[@for='backgroundjobs_cron']";

	protected $logLevelId = 'loglevel';

	protected $ownCloudVersionXpath = '//td[text() = "version"]/following-sibling::td';
	protected $ownCloudVersionStringXpath = '//td[text() = "versionstring"]/following-sibling::td';

	/**
	 * set email server settings
	 *
	 * @param Session $session
	 * @param TableNode $emailSettingsTable
	 *
	 * @return void
	 */
	public function setEmailServerSettings($session, $emailSettingsTable) {
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
		$this->waitForAjaxCallsToStartAndFinish($session);
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

		$this->assertElementNotNull(
			$sendTestEmailBtn,
			__METHOD__ .
			" id $this->sendTestEmailBtnId " .
			"could not find button"
		);

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
		
		$this->assertElementNotNull(
			$checkbox,
			__METHOD__ .
			" xpath $this->authRequiredCheckboxXpath " .
			"could not find label for checkbox"
		);
		
		$this->assertElementNotNull(
			$checkCheckbox,
			__METHOD__ .
			" id $this->authRequiredCheckboxId " .
			"could not find checkbox"
		);
		
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

	/**
	 * set imprint url
	 *
	 * @param string $legalUrlType
	 * @param string $legalUrlValue
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function setLegalUrl($legalUrlType, $legalUrlValue) {
		if ($legalUrlType === "Imprint") {
			$this->fillField($this->imprintUrlFieldId, $legalUrlValue);
		} elseif ($legalUrlType === "Privacy Policy") {
			$this->fillField($this->privacyPolicyUrlFieldId, $legalUrlValue);
		} else {
			throw new \Exception(
				__METHOD__ . " invalid legal url type: $legalUrlType"
			);
		}
	}

	/**
	 * set update channel value
	 *
	 * @param string $updateChannel
	 *
	 * @return void
	 */
	public function setUpdateChannelValue($updateChannel) {
		$this->selectFieldOption($this->releaseChannelId, $updateChannel);
	}

	/**
	 * set cron job value
	 *
	 * @param string $cronJob
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function setCronJobValue($cronJob) {
		if ($cronJob == "ajax") {
			$selectCron = $this->find("xpath", $this->cronJobAjaxXpath);
			$this->assertElementNotNull(
				$selectCron,
				__METHOD__ .
				" xpath $this->cronJobAjaxXpath " .
				"could not find xpath for radio button"
			);
		} elseif ($cronJob == "webcron") {
			$selectCron = $this->find("xpath", $this->cronJobWebCronXpath);
			$this->assertElementNotNull(
				$selectCron,
				__METHOD__ .
				" xpath $this->cronJobWebCronXpath " .
				"could not find xpath for radio button"
			);
		} elseif ($cronJob == "cron") {
			$selectCron = $this->find("xpath", $this->cronJobCronXpath);
			$this->assertElementNotNull(
				$selectCron,
				__METHOD__ .
				" xpath $this->cronJobCronXpath " .
				"could not find xpath for radio button"
			);
		} else {
			throw new \Exception(
				__METHOD__ . " invalid cron job type: $cronJob"
			);
		}
		$selectCron->click();
	}

	/**
	 * get ownCloud version
	 *
	 * @return string ownCloud Version
	 */
	public function getOwncloudVersion() {
		$actualVersion = $this->find("xpath", $this->ownCloudVersionXpath);
		$this->assertElementNotNull(
			$actualVersion,
			__METHOD__ .
			" xpath $this->ownCloudVersionXpath " .
			"could not find xpath for owncloud version"
		);
		return $actualVersion->getText();
	}

	/**
	 * get ownCloud version string
	 *
	 * @return string ownCloud Version String
	 */
	public function getOwncloudVersionString() {
		$actualVersion = $this->find("xpath", $this->ownCloudVersionStringXpath);
		$this->assertElementNotNull(
			$actualVersion,
			__METHOD__ .
			" xpath $this->ownCloudVersionStringXpath " .
			"could not find xpath for owncloud version string"
		);
		return $actualVersion->getText();
	}

	/**
	 * set log level
	 *
	 * @param integer $logLevel
	 *
	 * @return void
	 */
	public function setLogLevel($logLevel) {
		$loglevels = [0, 1, 2, 3, 4];
		if (\in_array($logLevel, $loglevels)) {
			$this->selectFieldOption($this->logLevelId, $logLevel);
		} else {
			throw new \Exception(
				__METHOD__ . " invalid log level: $logLevel"
			);
		}
	}

	/**
	 * waits for the page to appear completely
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 *
	 * @return void
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		$timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	) {
		$this->waitForAjaxCallsToStartAndFinish($session);
		$this->waitTillXpathIsVisible(
			$this->ownCloudVersionStringXpath, $timeout_msec
		);
	}
}
