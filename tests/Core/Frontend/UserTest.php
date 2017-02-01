<?php
/**
 * ownCloud
*
* @author Artur Neumann <info@individual-it.net>
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
use Test\SeleniumTestCase;
use Facebook\WebDriver\WebDriverBy as WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition as WebDriverExpectedCondition;

class UserTest extends SeleniumTestCase
{
	private $userToTest = "admin";

	/**
	 * navigated to the user Page
	 * @return
	 * @return RemoteWebElement the userlist table
	 */
	protected function navigateToUsersPage()
	{
		WebDriverBy::id('expandDisplayName');
		$this->webDriver->findElement(WebDriverBy::id("expandDisplayName"))
		->click();
		$this->webDriver->findElement(
				WebDriverBy::xpath(".//div[@id='expanddiv']/ul/li[2]/a")
				)->click();
		
		$this->webDriver->wait()->until(
			WebDriverExpectedCondition::invisibilityOfElementLocated(
				WebDriverBy::xpath(
					".//*[@id='app-content']/div[@class='loading']"
				)
			)
		);

						$userTable = $this->webDriver->findElement(
								WebDriverBy::xpath(".//table[@id='userlist']")
								);

						return $userTable;

	}

	/**
	 * finds the user $userName in table $userTable
	 * @param RemoteWebElement $usersTable
	 * @param string $userName
	 * @return RemoteWebElement tr of the found user
	 */
	protected function findUserInTable($usersTable,$userName)
	{
		$usersTRs=$usersTable->findElement(WebDriverBy::tagName("tbody"))
		->findElements(WebDriverBy::tagName("tr"));
			
		foreach ( $usersTRs as $tr ) {
			$currentUserName=$tr->findElement(WebDriverBy::className("name"))
			->getText();
			if ($userName === $currentUserName) {
				return $tr;
			}
		}

	}

	public function testChangeUserQuota()
	{
		$this->adminLogin();

		$usersTable=$this->navigateToUsersPage();
		$tr=$this->findUserInTable($usersTable, $this->userToTest);

		$select=$tr->findElement(
				WebDriverBy::xpath(".//select[@class='quota-user']")
				);
		$option=$select->findElement(
				WebDriverBy::xpath(".//option[@value='1 GB']")
				);
		$option->click();

		$usersTable=$this->navigateToUsersPage();
		$tr=$this->findUserInTable($usersTable, $this->userToTest);
		$select=$tr->findElement(
				WebDriverBy::xpath(".//select[@class='quota-user']")
				);
		$this->assertEquals(
				"1 GB", $select->findElement(
						WebDriverBy::xpath(".//option[@selected='selected']")
						)
				->getAttribute("value")
				);

		$option=$select->findElement(
				WebDriverBy::xpath(".//option[@value='none']")
				);
		$option->click();

		$usersTable=$this->navigateToUsersPage();
		$tr=$this->findUserInTable($usersTable, $this->userToTest);

		$select=$tr->findElement(
				WebDriverBy::xpath(".//select[@class='quota-user']")
				);

		$this->assertEquals(
				"none", $select->findElement(
						WebDriverBy::xpath(".//option[@selected='selected']")
						)
				->getAttribute("value")
				);


	}
}