<?php
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

namespace Page;

use Behat\Mink\Session;

/**
 * PageObject for the Notifications area
 */
class NotificationsAppDialog extends OwncloudPage {
	private $notificationContainerXpath = "//div[@class='notification']";
	private $notificationTitleXpath = "//h3[@class='notification-title']";
	private $notificationLinkXpath = "//a[@class='notification-link']";
	private $notificationMessageXpath = "//p[@class='notification-message']";
	
	/**
	 *
	 * @return array with notifications details title,link,message
	 */
	public function getAllNotifications() {
		$notifications = $this->findAll("xpath", $this->notificationContainerXpath);
		$notificationsArray = [];
		foreach ($notifications as $notification) {
			$title = $notification->find("xpath", $this->notificationTitleXpath);
			$this->assertElementNotNull(
				$title,
				__METHOD__ .
				" could not find notification title with xpath $this->notificationTitleXpath"
			);
			$link = $notification->find("xpath", $this->notificationLinkXpath);
			$this->assertElementNotNull(
				$link,
				__METHOD__ .
				" could not find notification link with xpath $this->notificationLinkXpath"
			);
			$message = $notification->find("xpath", $this->notificationMessageXpath);
			$this->assertElementNotNull(
				$message,
				__METHOD__ .
				" could not find notification message with xpath $this->notificationMessageXpath"
			);
			$notificationsArray[] = [
				'title' => $title->getText(),
				'link' => $link->getAttribute('href'),
				'message' => $message->getText()
			];
		}
		return $notificationsArray;
	}

	/**
	 *
	 * @return \Page\Notification[]
	 */
	public function getAllNotificationObjects() {
		$notificationsElement = $this->findAll("xpath", $this->notificationContainerXpath);
		$notificationObjects = [];
		foreach ($notificationsElement as $notificationElement) {
			/**
			 *
			 * @var Notification $notificationObject
			 */
			$notificationObject = $this->getPage("Notification");
			$notificationObject->setElement($notificationElement);
			$notificationObjects[] = $notificationObject;
		}
		return $notificationObjects;
	}

	/**
	 * waits for the page to appear completely
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
		$this->waitTillXpathIsVisible(
			$this->notificationContainerXpath, $timeout_msec
		);
	}
}
