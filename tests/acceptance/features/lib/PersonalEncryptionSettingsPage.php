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
  * PageObject for the personal encryption settings page
  */
class PersonalEncryptionSettingsPage extends OwncloudPage {

	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/settings/personal?sectionid=encryption';

	private $userEnableRecoveryCheckboxId = 'userEnableRecoveryCheckbox';
	private $userEnableRecoveryCheckboxXpath = '//label[@for="userEnableRecoveryCheckbox"]';

	/**
	 * Enable password recovery
	 *
	 * @return void
	 */
	public function enablePasswordRecovery() {
		$userEnableRecoveryCheckbox = $this->find('xpath', $this->userEnableRecoveryCheckboxXpath);
		$this->assertElementNotNull(
			$userEnableRecoveryCheckbox,
			__METHOD__ .
			" id $this->userEnableRecoveryCheckboxXpath " .
			"could not find enable checkbox"
		);
		$userEnableRecoveryCheckbox->click();
	}

	/**
	 * there is no reliable loading indicator on the personal encryption settings page,
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
		$timeout_msec = STANDARDUIWAITTIMEOUTMILLISEC
	) {
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			if ($this->findById($this->userEnableRecoveryCheckboxId) !== null) {
				break;
			}
			\usleep(STANDARDSLEEPTIMEMICROSEC);
			$currentTime = \microtime(true);
		}
		if ($currentTime > $end) {
			throw new \Exception(
				__METHOD__ . " timeout waiting for personal encryption settings page to load"
			);
		}
		$this->waitForOutstandingAjaxCalls($session);
	}
}
