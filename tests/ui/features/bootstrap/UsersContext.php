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
use Behat\Mink\Exception\ExpectationException;

use Page\UsersPage;

require_once 'bootstrap.php';

/**
 * Users context.
 */
class UsersContext extends RawMinkContext implements Context
{

	private $usersPage;

	public function __construct(UsersPage $usersPage)
	{
		$this->usersPage = $usersPage;
	}

	/**
	 * @Given quota of user :username is set to :quota
	 */
	public function quotaOfUserIsSetTo($username, $quota)
	{
		$this->usersPage->open();
		$this->usersPage->waitTillPageIsLoaded($this->getSession());
		$this->usersPage->setQuotaOfUserTo($username, $quota, $this->getSession());
	}

	/**
	 * @When quota of user :username is changed to :quota
	 */
	public function quotaOfUserIsChangedTo($username, $quota)
	{
		$this->usersPage->open();
		$this->usersPage->waitTillPageIsLoaded($this->getSession());
		$this->usersPage->setQuotaOfUserTo($username, $quota, $this->getSession());
	}

	/**
	 * @When the page is reloaded
	 */
	public function pageIsReloaded()
	{
		$this->getSession()->reload();
		$this->usersPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @Then quota of user :username should be set to :quota
	 */
	public function quotaOfUserShouldBeSetTo($username, $quota)
	{
		$setQuota=trim($this->usersPage->getQuotaOfUser($username));
		if ($setQuota!==$quota) {
			throw new ExpectationException(
				'Users quota is set to "'.$setQuota. '" expected "' .
				$quota . '"', $this->getSession()
			);
		}
	}
}
