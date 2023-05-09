<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2017 Artur Neumann artur@jankaritech.com
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
require_once 'bootstrap.php';

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use Behat\Mink\Session;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\Notification;
use Page\NotificationsEnabledOwncloudPage;
use PHPUnit\Framework\Assert;

/**
 * Context for Notifications App
 *
 */
class WebUINotificationsContext extends RawMinkContext implements Context {
	private NotificationsEnabledOwncloudPage $owncloudPage;
	private FeatureContext $featureContext;

	/**
	 *
	 * @param NotificationsEnabledOwncloudPage $owncloudPage
	 */
	public function __construct(
		NotificationsEnabledOwncloudPage $owncloudPage
	) {
		$this->owncloudPage = $owncloudPage;
	}

	/**
	 *
	 * @Then /^the user should see (\d+) notification(?:s|) on the webUI with these details$/
	 *
	 * @param int $number
	 * @param TableNode $expectedNotifications
	 *
	 * @return void
	 * @throws Exception
	 */
	public function assertNotificationsOnWebUI(
		int $number,
		TableNode $expectedNotifications
	):void {
		$notificationsDialog = $this->owncloudPage->openNotificationsDialog($this->getSession());
		$notifications = $notificationsDialog->getAllNotifications();
		Assert::assertEquals(
			$number,
			\count($notifications),
			"expected $number notifications, found " . \count($notifications)
		);
		$this->featureContext->verifyTableNodeColumns($expectedNotifications, ['title'], ['link', 'message', 'user']);
		foreach ($expectedNotifications as $expectedNotification) {
			$found = false;
			$expectedNotification['title'] = $this->featureContext->substituteInLineCodes(
				$expectedNotification['title'],
				$expectedNotification['user']
			);
			foreach ($notifications as $notification) {
				$found = false;
				foreach ($expectedNotification as $expectedKey => $expectedValue) {
					if ($expectedKey === "user") {
						break;
					} elseif ($notification[$expectedKey] === $expectedValue) {
						$found = true;
					} else {
						$found = false;
						break;
					}
				}
				if ($found) {
					break;
				}
			}
			if (!$found) {
				Assert::fail(
					"could not find expected notification: " .
					\print_r($expectedNotification, true) .
					" in viewed notifications: " .
					\print_r($notifications, true)
				);
			}
		}
	}

	/**
	 * @When /^the user follows the link of the (first|last) notification on the webUI$/
	 * @Given /^the user has followed the link of the (first|last) notification on the webUI$/
	 *
	 * @param string $firstOrLast first|last
	 *
	 * @return void
	 * @throws Exception
	 *
	 * @throws InvalidArgumentException
	 */
	public function userFollowsLink(string $firstOrLast):void {
		$notificationsDialog = $this->owncloudPage->openNotificationsDialog($this->getSession());
		$notifications = $notificationsDialog->getAllNotificationObjects();
		if ($firstOrLast === 'first') {
			/**
			 *
			 * @var Notification $notification
			 */
			$notification = \reset($notifications);
		} elseif ($firstOrLast === 'last') {
			$notification = \end($notifications);
		} else {
			throw new InvalidArgumentException();
		}
		if ($notification === false) {
			throw new Exception(__METHOD__ . " no notifications found");
		}
		$notification->followLink($this->getSession());
	}

	/**
	 * @When /^the user reacts with "(Accept|Decline)" to all notifications on the webUI$/
	 * @Given /^the user has reacted with "(Accept|Decline)" to all notifications on the webUI$/
	 *
	 * @param string $reaction
	 *
	 * @return void
	 */
	public function userReactsToAllNotificationsOnTheWebUI(string $reaction):void {
		$notificationsDialog = $this->owncloudPage->openNotificationsDialog($this->getSession());
		$notifications = $notificationsDialog->getAllNotificationObjects();
		while (\count($notifications) > 0) {
			$notifications[0]->react($reaction, $this->getSession());
			//we need to rescan again, because the DOM changes
			$notifications = $notificationsDialog->getAllNotificationObjects();
		}
	}

	/**
	 * @When the user accepts all shares displayed in the notifications on the webUI
	 * @Given the user has accepted all shares displayed in the notifications on the webUI
	 *
	 * @return void
	 */
	public function userAcceptsAllShares():void {
		$this->userReactsToAllNotificationsOnTheWebUI("Accept");
	}

	/**
	 * @When the user declines all shares displayed in the notifications on the webUI
	 * @Given the user has declined all shares displayed in the notifications on the webUI
	 *
	 * @return void
	 */
	public function userDeclinesAllShares():void {
		$this->userReactsToAllNotificationsOnTheWebUI("Decline");
	}

	/**
	 * This will run before EVERY scenario.
	 *
	 * @BeforeScenario @webUI
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function before(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
