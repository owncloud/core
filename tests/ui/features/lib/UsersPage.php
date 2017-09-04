<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright 2017 Artur Neumann artur@jankaritech.com
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

namespace Page;

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Session;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

/**
 * Users page.
 */
class UsersPage extends OwncloudPage {

	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/settings/users';

	protected $userTrXpath = ".//table[@id='userlist']/tbody/tr";

	protected $quotaSelectXpath = ".//select[@class='quota-user']";

	protected $quotaOptionXpath = "//option[contains(text(), '%s')]";

	protected $manualQuotaInputXpath = "//input[contains(@data-original-title," .
										"'Please enter storage quota')]";

	/**
	 * @param string $username
	 * @return NodeElement for the requested user in the table
	 * @throws \Exception
	 */
	public function findUserInTable($username) {
		$userTrs = $this->findAll('xpath', $this->userTrXpath);

		foreach ($userTrs as $userTr) {
			$user = $userTr->find("css", ".name");
			if ($user->getText() === $username) {
				return $userTr;
			}
		}
		throw new \Exception("Could not find user '$username'");
	}

	/**
	 * @param string $username
	 * @return string text describing the quota
	 */
	public function getQuotaOfUser($username) {
		$userTr = $this->findUserInTable($username);
		$selectField = $userTr->find('xpath', $this->quotaSelectXpath);
		$selectField = $selectField->find(
			'xpath', "//option[@value='" . $selectField->getValue() . "']"
		);

		return $selectField->getText();
	}

	/**
	 * @param string $username
	 * @param string $quota text form of quota to be input
	 * @param Session $session
	 * @return void
	 */
	public function setQuotaOfUserTo($username, $quota, Session $session) {
		$userTr = $this->findUserInTable($username);
		$selectField = $userTr->find('xpath', $this->quotaSelectXpath);

		$selectOption = $selectField->find(
			'xpath', sprintf($this->quotaOptionXpath, $quota)
		);
		if ($selectOption === null) {
			$selectOption = $selectField->find(
				'xpath', sprintf($this->quotaOptionXpath, "Other")
			);
			$selectOption->click();
			$this->find('xpath', $this->manualQuotaInputXpath)->setValue($quota);
		} else {
			$selectOption->click();
		}
		$this->waitForOutstandingAjaxCalls($session);
	}
}