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

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;
use Behat\Mink\Session;

/**
 * Login page.
 */
class LoginPage extends OwncloudPage {

	/**
	 * @var string $path
	 */
	protected $path = '/index.php/login';
	protected $userInputId = "user";
	protected $passwordInputId = "password";

	/**
	 * @param string $username
	 * @param string $password
	 * @param string $target
	 * @return Page
	 */
	public function loginAs($username, $password, $target = 'FilesPage') {
		$this->fillField($this->userInputId, $username);
		$this->fillField($this->passwordInputId, $password);
		$this->findById("submit")->click();
		return $this->getPage($target);
	}

	/**
	 * there is no reliable loading indicator on the login page, so just wait for
	 * the user and password to be there.
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 * @return void
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		$timeout_msec = STANDARDUIWAITTIMEOUTMILLISEC
	) {
		$currentTime = microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			if (($this->findById($this->userInputId) !== null)
				&& ($this->findById($this->passwordInputId) !== null)
			) {
				break;
			}
			usleep(STANDARDSLEEPTIMEMICROSEC);
			$currentTime = microtime(true);
		}

		if ($currentTime > $end) {
			throw new \Exception(
				"LoginPage:waitTillPageIsLoaded:timeout waiting for page to load"
			);
		}

		$this->waitForOutstandingAjaxCalls($session);
	}
}