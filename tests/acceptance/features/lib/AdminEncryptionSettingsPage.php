<?php
/**
 * ownCloud
 *
 * @author Paurakh Sharma Humagain <paurakh@jankaritech.com>
 * @copyright Copyright (c) 2018 Paurakh Sharma Humagain <paurakh@jankaritech.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

 namespace Page;
 use Behat\Mink\Session;

 /**
  * PageObject for the admin encryption settings page
  */
class AdminEncryptionSettingsPage extends OwncloudPage {

	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/settings/admin?sectionid=encryption';

	private $encryptionRecoveryPasswordFieldId = 'encryptionRecoveryPassword';
	private $repeatEncryptionRecoveryPasswordFieldId = 'repeatEncryptionRecoveryPassword';
	private $enableRecoveryBtnId = 'enableRecoveryKey';
	private $enableEncryptionCheckboxId = 'enableEncryption';

	/**
	 * Enable recovery key and set recovery key
	 *
	 * @param string $recoveryKey
	 *
	 * @return void
	 */
	public function enableRecoveryKeyAndSetRecoveryKeyTo($recoveryKey) {
		$enableRecoveryKeyBtn = $this->findById($this->enableRecoveryBtnId);
		$this->assertElementNotNull(
			$enableRecoveryKeyBtn,
			__METHOD__ .
			" id $this->enableRecoveryBtnId " .
			"could not find enable/disable recovery key button"
		);

		$action = $enableRecoveryKeyBtn->getAttribute("value");
		if ($action === "Disable recovery key") {
			return;
		}
		$this->fillField($this->encryptionRecoveryPasswordFieldId, $recoveryKey);
		$this->fillField($this->repeatEncryptionRecoveryPasswordFieldId, $recoveryKey);
		$enableRecoveryKeyBtn->click();
	}

	/**
	 * there is no reliable loading indicator on the admin encryption settings page,
	 * so just wait for the enable encryption checkbox to be there.
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		$timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	) {
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			if ($this->findById($this->enableEncryptionCheckboxId) !== null) {
				break;
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			$currentTime = \microtime(true);
		}
		if ($currentTime > $end) {
			throw new \Exception(
				__METHOD__ . " timeout waiting for admin encryption settings page to load"
			);
		}
		$this->waitForOutstandingAjaxCalls($session);
	}
}
