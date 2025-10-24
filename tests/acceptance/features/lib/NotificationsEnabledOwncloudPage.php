<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2018 Artur Neumann artur@jankaritech.com
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

namespace Tests\Acceptance\Page;

use Behat\Mink\Session;
use Behat\Mink\Element\NodeElement;
use Exception;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;

/**
 * PageObject that has everything the general OwncloudPage does
 * plus what the notifications App adds to it
 */
class NotificationsEnabledOwncloudPage extends OwncloudPage {
	private $notificationsButtonXpath = "//div[contains(@class,'notifications-button')]";

	/**
	 *
	 * @return NodeElement
	 * @throws ElementNotFoundException
	 */
	private function findNotificationsButton(): NodeElement {
		$button = $this->waitTillElementIsNotNull($this->notificationsButtonXpath);
		$this->assertElementNotNull(
			$button,
			__METHOD__ .
			" could not find notifications button with xpath $this->notificationsButtonXpath"
		);
		return $button;
	}

	/**
	 * wait till the new notifications button is visible
	 *
	 * @return void
	 */
	public function waitForNotifications() {
		$button = $this->findNotificationsButton();
		$this->waitFor(
			STANDARD_UI_WAIT_TIMEOUT_MILLISEC / 1000,
			[$button, 'isVisible']
		);
	}

	/**
	 * @param Session $session
	 *
	 * @return NotificationsAppDialog
	 * @throws Exception
	 */
	public function openNotifications(Session $session): NotificationsAppDialog {
		$this->findNotificationsButton()->click();
		/**
		 *
		 * @var NotificationsAppDialog $notificationsAppDialog
		 */
		$notificationsAppDialog = $this->getPage("NotificationsAppDialog");
		$notificationsAppDialog->waitTillPageIsLoaded($session);
		return $notificationsAppDialog;
	}

	/**
	 *
	 * @param Session $session
	 *
	 * @return NotificationsAppDialog
	 * @throws Exception
	 */
	public function openNotificationsDialog(Session $session):NotificationsAppDialog {
		$session->reload();
		$this->waitForNotifications();
		return $this->openNotifications($session);
	}
}
