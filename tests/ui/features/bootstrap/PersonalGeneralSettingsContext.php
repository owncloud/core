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
use Page\PersonalGeneralSettingsPage;

require_once 'bootstrap.php';

/**
 * PersonalSecuritySettingsContext context.
 */
class PersonalGeneralSettingsContext extends RawMinkContext implements Context
{
	private $personalGeneralSettingsPage;

	public function __construct(PersonalGeneralSettingsPage$personalGeneralSettingsPage)
	{
		$this->personalGeneralSettingsPage= $personalGeneralSettingsPage;
	}
	
	/**
	 * @Given I am on the personal general settings page
	 */
	public function iAmOnThePersonalGeneralSettingsPage()
	{
		$this->personalGeneralSettingsPage->open();
		$this->personalGeneralSettingsPage->waitForOutstandingAjaxCalls($this->getSession());
	}
	
	/**
	 * @Given I go to the personal general settings page
	 */
	public function iGoToThePersonalGeneralSettingsPage()
	{
		$this->visitPath($this->personalGeneralSettingsPage->getPagePath());
		$this->personalGeneralSettingsPage->waitForOutstandingAjaxCalls($this->getSession());
	}
	
	/**
	 * @When I change the language to :language
	 */
	public function iChangeTheLanguageTo($language)
	{
		$this->personalGeneralSettingsPage->changeLanguage($language);
		$this->personalGeneralSettingsPage->waitForOutstandingAjaxCalls($this->getSession());
	}
}
