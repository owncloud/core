<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2017 Artur Neumann artur@jankaritech.com
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

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\PersonalSecuritySettingsPage;

require_once 'bootstrap.php';

/**
 * WebUI PersonalSecuritySettings context.
 */
class WebUIPersonalSecuritySettingsContext extends RawMinkContext implements Context {

	private $personalSecuritySettingsPage;
	private $appName;
	private $strForAppName = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

	/**
	 * WebUIPersonalSecuritySettingsContext constructor.
	 *
	 * @param PersonalSecuritySettingsPage $personalSecuritySettingsPage
	 */
	public function __construct(
		PersonalSecuritySettingsPage $personalSecuritySettingsPage
	) {
		$this->personalSecuritySettingsPage = $personalSecuritySettingsPage;
		$this->appName = substr(str_shuffle($this->strForAppName), 0, 8);
	}

	/**
	 * @When the user browses to the personal security settings page
	 * @Given the user has browsed to the personal security settings page
	 *
	 * @return void
	 */
	public function theUserBrowsesToThePersonalSecuritySettingsPage() {
		$this->personalSecuritySettingsPage->open();
	}

	/**
	 * @When the user creates a new App password using the webUI
	 * @Given the user has created a new App password using the webUI
	 *
	 * @return void
	 */
	public function theUserCreatesANewAppPasswordUsingTheWebUI() {
		$this->personalSecuritySettingsPage->createNewAppPassword($this->appName);
	}

	/**
	 * @Then the new app should be listed in the App passwords list on the webUI
	 *
	 * @return void
	 */
	public function theAppShouldBeListedInTheAppPasswordsListOnTheWebUI() {
		$appTr = $this->personalSecuritySettingsPage->getLinkedAppByName(
			$this->appName
		);
		PHPUnit_Framework_Assert::assertNotEmpty($appTr);
		$disconnectButton
			= $this->personalSecuritySettingsPage->getDisconnectButton($appTr);
		PHPUnit_Framework_Assert::assertNotEmpty($disconnectButton);
	}

	/**
	 * @Then the user display name and the app password should be displayed on the webUI
	 *
	 * @return void
	 */
	public function theUserDisplayNameAndAppPasswordShouldBeDisplayedOnTheWebUI() {
		$result = $this->personalSecuritySettingsPage->getAppPasswordResult();
		PHPUnit_Framework_Assert::assertEquals(
			$this->personalSecuritySettingsPage->getMyDisplayname(),
			$result[0]->getValue()
		);

		PHPUnit_Framework_Assert::assertEquals(
			1, preg_match(
				'/(([A-Z]){5}-){3}([A-Z]){5}/', $result[1]->getValue()
			)
		);
	}

}
