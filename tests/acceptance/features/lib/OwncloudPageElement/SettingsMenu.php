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

namespace Page\OwncloudPageElement;

use Behat\Mink\Session;
use Page\OwncloudPage;

/**
 * The Settings Menu
 *
 */
class SettingsMenu extends OwncloudPage {
	private $logoutButtonXpath = "//*[@id='logout']";

	/**
	 * Logout with the logout button
	 *
	 * @return void
	 */
	public function logout() {
		$logoutButton = $this->find("xpath", $this->logoutButtonXpath);
		$this->assertElementNotNull(
			$logoutButton,
			__METHOD__ .
			" xpath $this->logoutButtonXpath " .
			"could not find logout button"
		);
		$logoutButton->click();
	}

	/**
	 * waits for the menu to appear
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 *
	 * @return void
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		$timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	) {
		$this->waitTillXpathIsVisible($this->logoutButtonXpath, $timeout_msec);
	}
}
