<?php
/**
* ownCloud
*
* @author Artur Neumann
* @copyright 2017 Artur Neumann info@individual-it.net
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

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;

use Page\PersonalSecuritySettingsPage;

require_once 'bootstrap.php';

/**
 * PersonalSecuritySettingsContext context.
 */
class PersonalSecuritySettingsContext extends RawMinkContext implements Context
{
	private $personalSecuritySettingsPage;
	private $appName;
	private $strForAppName = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

	public function __construct(PersonalSecuritySettingsPage $personalSecuritySettingsPage)
	{
		$this->personalSecuritySettingsPage = $personalSecuritySettingsPage;
		$this->appName = substr(str_shuffle($this->strForAppName), 0, 8);
	}

	/**
	 * @Given I am on the personal security settings page
	 */
	public function iAmOnThePersonalSecuritySettingsPage()
	{
		$this->personalSecuritySettingsPage->open();
	}

	/**
	 * @When I create a new App password
	 */
	public function iCreateANewAppPasswordForTheAppNamed()
	{
		$this->personalSecuritySettingsPage->createNewAppPassword($this->appName);
	}

	/**
	 * @Then the new app should be listed in the App passwords list
	 */
	public function theAppShouldBeListedInTheAppPasswordsList()
	{
		$appTr=$this->personalSecuritySettingsPage->getLinkedAppByName(
			$this->appName
		);
		PHPUnit_Framework_Assert::assertNotEmpty($appTr);
		$disconnectButton=
			$this->personalSecuritySettingsPage->getDisconnectButton($appTr);
		PHPUnit_Framework_Assert::assertNotEmpty($disconnectButton);
	}

	/**
	 * @Then my username and the app password should be displayed
	 */
	public function myUsernameAndTheAppPasswordShouldBeDisplayed()
	{
		$result=$this->personalSecuritySettingsPage->getAppPasswordResult();
		PHPUnit_Framework_Assert::assertEquals(
			$this->personalSecuritySettingsPage->getMyUsername(),
			$result[0]->getValue()
		);

		PHPUnit_Framework_Assert::assertEquals(
			1, preg_match(
				'/(([A-Z]){5}-){3}([A-Z]){5}/', $result[1]->getValue()
			)
		);

	}

}
