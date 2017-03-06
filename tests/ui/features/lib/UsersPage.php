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

namespace Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class UsersPage extends OwncloudPage
{
	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/settings/users';
	
	public function findUserInTable($username)
	{
		$userTrs = $this->findAll('xpath', ".//table[@id='userlist']/tbody/tr");
		
		foreach ( $userTrs as $userTr ) {
			$user = $userTr->find("css", ".name");
			if ($user->getText() === $username) {
				return $userTr;
			}
		}
		throw new \Exception("Could not find user '$username'");
	}
	
	public function getQuotaOfUser($username)
	{
		$userTr = $this->findUserInTable($username);
		$selectField = $userTr->find(
			'xpath',
			".//select[@class='quota-user']//option[@selected='selected']"
		);
		return $selectField->getText();
	}
	
	public function setQuotaOfUserTo($username, $quota)
	{
		$userTr = $this->findUserInTable($username);
		$selectField = $userTr->find(
			'xpath',
			".//select[@class='quota-user']//option[contains(text(), '".$quota."')]"
		);
		$selectField->click();
	}
}