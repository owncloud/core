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
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\PersonalGeneralSettingsPage;

require_once 'bootstrap.php';

/**
 * PersonalSecuritySettingsContext context.
 */
class PersonalGeneralSettingsContext extends RawMinkContext implements Context {

	private $personalGeneralSettingsPage;
	/**
	 * 
	 * @var FeatureContext
	 */
	private $featureContext;
	/**
	 * PersonalGeneralSettingsContext constructor.
	 *
	 * @param PersonalGeneralSettingsPage $personalGeneralSettingsPage
	 */
	public function __construct(
		PersonalGeneralSettingsPage$personalGeneralSettingsPage
	) {
		$this->personalGeneralSettingsPage = $personalGeneralSettingsPage;
	}

	/**
	 * @Given I am on the personal general settings page
	 * @return void
	 */
	public function iAmOnThePersonalGeneralSettingsPage() {
		$this->personalGeneralSettingsPage->open();
		$this->personalGeneralSettingsPage->waitForOutstandingAjaxCalls(
			$this->getSession()
		);
	}

	/**
	 * @Given I go to the personal general settings page
	 * @return void
	 */
	public function iGoToThePersonalGeneralSettingsPage() {
		$this->visitPath($this->personalGeneralSettingsPage->getPagePath());
		$this->personalGeneralSettingsPage->waitForOutstandingAjaxCalls(
			$this->getSession()
		);
	}

	/**
	 * @When I change the language to :language
	 * @param string $language
	 * @return void
	 */
	public function iChangeTheLanguageTo($language) {
		$this->personalGeneralSettingsPage->changeLanguage($language);
		$this->personalGeneralSettingsPage->waitForOutstandingAjaxCalls(
			$this->getSession()
		);
	}
	
	/**
	 * @When I change the password to :newPassword
	 *
	 * @param string $newPassword
	 *
	 * @return void
	 */
	public function iChangeThePasswordTo($newPassword) {
		$username = $this->featureContext->getCurrentUser();
		$oldPassword = trim($this->featureContext->getUserPassword($username));
		$this->personalGeneralSettingsPage->changePassword(
			$oldPassword, $newPassword,$this->getSession());
	}
	
	/**
	 * @When I change the password to :newPassword using wrong current password
	 *
	 * @param string $newPassword
	 *
	 * @return void
	 */
	public function iChangeThePasswordToUsingWrongCurrentPassword($newPassword) {
		$oldPassword = "thisisawrongpassword";
		$this->personalGeneralSettingsPage->changePassword(
			$oldPassword, $newPassword, $this->getSession());
	}
	
	/**
	 * @Then a password error message should be displayed with the text :wrongPasswordmessageText
	 *
	 * @param string $wrongPasswordmessageText
	 *
	 * @return void
	 */
	public function aPasswordErrorMessageShouldBeDisplayedWithTheText(
		$wrongPasswordmessageText
	) {
		PHPUnit_Framework_Assert::assertEquals(
			$wrongPasswordmessageText,
			$this->personalGeneralSettingsPage->getWrongPasswordMessageText());
	}

	/**
	 * @BeforeScenario
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 *
	 * @param BeforeScenarioScope $scope
	 * @return void
	 */
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
