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

use Page\OwncloudPage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * The Settings Menu
 *
 */
class SettingsMenu extends OwncloudPage {
	private $logoutButtonId = 'logout';

	/**
	 * Logout with the logout button
	 *
	 * @return void
	 */
	public function logout() {
		$logoutButton = $this->findById($this->logoutButtonId);
		$this->assertElementNotNull(
			$logoutButton,
			__METHOD__ .
			" id $this->logoutButtonId " .
			"could not find logout button"
		);
		$logoutButton->click();
	}
}
