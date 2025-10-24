<?php declare(strict_types=1);

/**
 * ownCloud
 *
 * @author Paurakh Sharma Humagain <paurakh@jankaritech.com>
 * @copyright Copyright (c) 2018 Paurakh Sharma Humagain paurakh@jankaritech.com
 *
 * This code is Tests\Acceptance\free software: you can redistribute it and/or modify
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

namespace Tests\Acceptance\Page;

use Behat\Gherkin\Node\TableNode;
use Behat\Mink\Exception\ElementNotFoundException;
use Behat\Mink\Session;
use Exception;
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
	protected $credentialNameFieldId = 'mail_smtpname';
	protected $credentialPasswordFieldId = 'mail_smtppassword';
	protected $storeCredentialsBtnId = 'mail_credentials_settings_submit';
	protected $sendTestEmailBtnId = 'sendtestmail';

	protected $imprintUrlFieldId = 'legal_imprint';
	protected $privacyPolicyUrlFieldId = 'legal_privacy_policy';

	protected $releaseChannelId = 'release-channel';

	protected $cronJobAjaxXpath = "//label[@for='backgroundjobs_ajax']";
	protected $cronJobWebCronXpath = "//label[@for='backgroundjobs_webcron']";
	protected $cronJobCronXpath = "//label[@for='backgroundjobs_cron']";

	protected $logLevelId = 'loglevel';

	protected $lockBreakerXpath = '//div[@id="persistentlocking"]/p[@id="lock-breakers"]/div//li[contains(@class, "select2-search-field")]';
	protected $lockBreakerGroups = '//div[@id="persistentlocking"]/p[@id="lock-breakers"]/div//li[contains(@class, "select2-search-choice")]';

	protected $ownCloudVersionXpath = '//td[text() = "version"]/following-sibling::td';
	protected $ownCloudVersionStringXpath = '//td[text() = "versionstring"]/following-sibling::td';

	/**
	 * set email server settings
	 *
	 * @param Session $session
	 * @param TableNode $emailSettingsTable
	 *
	 * @return void
	 * @throws ElementNotFoundException|Exception
	 */
	public function setEmailServerSettings(Session $session, TableNode $emailSettingsTable): void {
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
				if ($row['value'] === "%EMAIL_HOST%") {
					$row['value'] = EmailHelper::getEmailHost();
				}
				$this->fillField($this->serverAddressFieldId, $row['value']);
			} elseif ($row['setting'] === 'port') {
				$this->fillField($this->serverPortFieldId, $row['value']);
			} elseif ($row['setting'] === 'credential name') {
				$this->fillField($this->credentialNameFieldId, $row['value']);
			} elseif ($row['setting'] === 'credential password') {
				$this->fillField($this->credentialPasswordFieldId, $row['value']);
			}
		}
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * click the store-credentials button
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function storeCredentials(Session $session): void {
		$storeCredentialsBtn = $this->findById($this->storeCredentialsBtnId);

		$this->assertElementNotNull(
			$storeCredentialsBtn,
			__METHOD__ .
			" id $this->storeCredentialsBtnId " .
			"could not find button"
		);

		$storeCredentialsBtn->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * send test email
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function sendTestEmail(Session $session): void {
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
	 * @throws Exception
	 */
	public function checkRequiredAuthentication(string $requiredState): void {
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
			throw new Exception(
				__METHOD__ . " invalid auth required checkbox state: $requiredState"
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
	 * @throws Exception
	 */
	public function setLegalUrl(string $legalUrlType, string $legalUrlValue): void {
		if ($legalUrlType === "Imprint") {
			$this->fillField($this->imprintUrlFieldId, $legalUrlValue);
		} elseif ($legalUrlType === "Privacy Policy") {
			$this->fillField($this->privacyPolicyUrlFieldId, $legalUrlValue);
		} else {
			throw new Exception(
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
	 * @throws ElementNotFoundException
	 */
	public function setUpdateChannelValue(string $updateChannel): void {
		$this->selectFieldOption($this->releaseChannelId, $updateChannel);
	}

	/**
	 * set cron job value
	 *
	 * @param string $cronJob
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setCronJobValue(string $cronJob): void {
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
			throw new Exception(
				__METHOD__ . " invalid cron job type: $cronJob"
			);
		}
		$selectCron->click();
	}

	/**
	 * get credential name
	 *
	 * @return string
	 */
	public function getCredentialName(): string {
		$field = $this->findById($this->credentialNameFieldId);
		$this->assertElementNotNull(
			$field,
			__METHOD__ .
			" id $this->credentialNameFieldId " .
			"could not find credential name field "
		);
		return $field->getValue();
	}

	/**
	 * get credential password
	 *
	 * @return string
	 */
	public function getCredentialPassword(): string {
		$field = $this->findById($this->credentialPasswordFieldId);
		$this->assertElementNotNull(
			$field,
			__METHOD__ .
			" id $this->credentialPasswordFieldId " .
			"could not find credential password field "
		);
		return $field->getValue();
	}

	/**
	 * get ownCloud version
	 *
	 * @return string ownCloud Version
	 */
	public function getOwncloudVersion(): string {
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
	public function getOwncloudVersionString(): string {
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
	 * @throws ElementNotFoundException|Exception
	 */
	public function setLogLevel(int $logLevel): void {
		$loglevels = [0, 1, 2, 3, 4];
		if (\in_array($logLevel, $loglevels)) {
			$this->selectFieldOption($this->logLevelId, $logLevel);
		} else {
			throw new Exception(
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
	 * @throws Exception
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		int $timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	): void {
		$this->waitForAjaxCallsToStartAndFinish($session);
		$this->waitTillXpathIsVisible(
			$this->ownCloudVersionStringXpath,
			$timeout_msec
		);
	}

	/**
	 * add group to lock breakers group
	 *
	 * @param Session $session
	 * @param string $groupName
	 *
	 * @return void
	 */
	public function addGroupLockBreakersGroup(
		Session $session,
		string $groupName
	): void {
		$this->getPage('AdminSharingSettingsPage')->addGroupToInputField($groupName, $this->lockBreakerXpath);
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * get lock breakers group
	 *
	 * @return array
	 * @throws Exception
	 */
	public function getLockBreakersGroups(): array {
		$this->waitTillElementIsNotNull($this->lockBreakerGroups);
		$groupList = $this->findAll("xpath", $this->lockBreakerGroups);
		$this->assertElementNotNull(
			$groupList,
			__METHOD__ .
			" xpath $this->lockBreakerGroups " .
			"could not find xpath for lock breaker groups"
		);

		foreach ($groupList as $group) {
			$groups[] = $this->getTrimmedText($group);
		}
		return $groups;
	}
}
