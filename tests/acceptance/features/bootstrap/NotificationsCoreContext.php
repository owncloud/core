<?php
/**
 * @author Joas Schilling <nickvergessen@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License,
 * version 3, along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use GuzzleHttp\Message\ResponseInterface;
use PHPUnit\Framework\Assert;
use TestHelpers\OcsApiHelper;

require_once 'bootstrap.php';

/**
 * Defines application features from the specific context.
 */
class NotificationsCoreContext implements Context {

	/**
	 * @var array[]
	 */
	protected $notificationIds;

	/**
	 * @var int
	 */
	protected $deletedNotification;

	/**
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * @return array[]
	 */
	public function getNotificationIds() {
		return $this->notificationIds;
	}

	/**
	 * @return array[]
	 */
	public function getLastNotificationIds() {
		return \end($this->notificationIds);
	}

	/**
	 * @return int
	 */
	public function getDeletedNotification() {
		return $this->deletedNotification;
	}

	/**
	 * @param int $deletedNotification
	 *
	 * @return void
	 */
	public function setDeletedNotification($deletedNotification) {
		$this->deletedNotification = $deletedNotification;
	}

	/**
	 * @Then /^the list of notifications should have (\d+) (?:entry|entries)$/
	 *
	 * @param int $numNotifications
	 *
	 * @return void
	 */
	public function checkNumNotifications($numNotifications) {
		$notifications = $this->getArrayOfNotificationsResponded(
			$this->featureContext->getResponse()
		);
		Assert::assertCount(
			(int) $numNotifications, $notifications
		);

		$notificationIds = [];
		foreach ($notifications as $notification) {
			$notificationIds[] = (int) $notification['notification_id'];
		}

		$this->notificationIds[] = $notificationIds;
	}

	/**
	 * @Then /^user "([^"]*)" should have (\d+) notification(?:s|)(| missing the last one| missing the first one)$/
	 *
	 * @param string $user
	 * @param int $numNotifications
	 * @param string $missingLast
	 *
	 * @return void
	 */
	public function userNumNotifications($user, $numNotifications, $missingLast) {
		$this->featureContext->userSendsToOcsApiEndpoint(
			$user, 'GET', '/apps/notifications/api/v1/notifications?format=json'
		);
		Assert::assertEquals(
			200, $this->featureContext->getResponse()->getStatusCode()
		);

		$previousNotificationIds = [];
		if ($missingLast) {
			Assert::assertNotEmpty($this->getNotificationIds());
			$previousNotificationIds = $this->getLastNotificationIds();
		}

		$this->checkNumNotifications((int) $numNotifications);

		if ($missingLast) {
			$now = $this->getLastNotificationIds();
			if ($missingLast === ' missing the last one') {
				\array_unshift($now, $this->getDeletedNotification());
			} else {
				$now[] = $this->getDeletedNotification();
			}

			Assert::assertEquals($previousNotificationIds, $now);
		}
	}

	/**
	 * @Then /^the (first|last) notification of user "([^"]*)" should match$/
	 *
	 * @param string $notification first|last
	 * @param string $user
	 * @param \Behat\Gherkin\Node\TableNode $formData
	 *
	 * @return void
	 */
	public function matchNotificationPlain(
		$notification, $user, $formData
	) {
		$this->matchNotification(
			$notification, $user, false, $formData
		);
	}

	/**
	 * @Then /^the (first|last) notification of user "([^"]*)" should match these regular expressions$/
	 *
	 * @param string $notification first|last
	 * @param string $user
	 * @param \Behat\Gherkin\Node\TableNode $formData
	 *
	 * @return void
	 */
	public function matchNotificationRegularExpression(
		$notification, $user, $formData
	) {
		$this->matchNotification(
			$notification, $user, true, $formData
		);
	}

	/**
	 * @param string $notification first|last
	 * @param string $user
	 * @param bool $regex
	 * @param \Behat\Gherkin\Node\TableNode $formData
	 *
	 * @return void
	 */
	public function matchNotification(
		$notification, $user, $regex, $formData
	) {
		$lastNotifications = $this->getLastNotificationIds();
		if ($notification === 'first') {
			$notificationId = \reset($lastNotifications);
		} else /* if ($notification === 'last')*/ {
			$notificationId = \end($lastNotifications);
		}

		$this->featureContext->userSendsToOcsApiEndpoint(
			$user,
			'GET',
			"/apps/notifications/api/v1/notifications/$notificationId?format=json"
		);
		Assert::assertEquals(
			200, $this->featureContext->getResponse()->getStatusCode()
		);
		$response = \json_decode(
			$this->featureContext->getResponse()->getBody()->getContents(), true
		);

		foreach ($formData->getRowsHash() as $key => $value) {
			Assert::assertArrayHasKey(
				$key, $response['ocs']['data']
			);
			if ($regex) {
				$value = $this->featureContext->substituteInLineCodes(
					$value, ['preg_quote' => ['/'] ]
				);
				Assert::assertNotFalse(
					(bool)\preg_match($value, $response['ocs']['data'][$key]),
					"'$value' does not match '{$response['ocs']['data'][$key]}'"
				);
			} else {
				$value = $this->featureContext->substituteInLineCodes($value);
				Assert::assertEquals(
					$value, $response['ocs']['data'][$key]
				);
			}
		}
	}

	/**
	 * Parses the xml answer to get the array of notifications returned.
	 *
	 * @param ResponseInterface $resp
	 *
	 * @return array
	 */
	public function getArrayOfNotificationsResponded(ResponseInterface $resp) {
		$jsonResponse = \json_decode($resp->getBody()->getContents(), 1);
		return $jsonResponse['ocs']['data'];
	}

	/**
	 *
	 * @AfterScenario
	 *
	 * @return void
	 */
	public function clearNotifications() {
		$response = OcsApiHelper::sendRequest(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			"DELETE",
			'/apps/testing/api/v1/notifications'
		);
		Assert::assertEquals(200, $response->getStatusCode());
		Assert::assertEquals(
			200, (int) $this->featureContext->getOCSResponseStatusCode($response)
		);
	}

	/**
	 * @BeforeScenario
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function setUpScenario(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
		$this->clearNotifications();
	}
}
