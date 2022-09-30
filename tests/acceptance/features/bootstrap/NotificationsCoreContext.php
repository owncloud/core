<?php declare(strict_types=1);
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
use Behat\Gherkin\Node\TableNode;
use Psr\Http\Message\ResponseInterface;
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
	 *
	 * @var OCSContext
	 */
	private $ocsContext;

	/**
	 * @return array[]
	 */
	public function getNotificationIds():array {
		return $this->notificationIds;
	}

	/**
	 * @return array[]
	 */
	public function getLastNotificationIds():array {
		return \end($this->notificationIds);
	}

	/**
	 * @return int
	 */
	public function getDeletedNotification():int {
		return $this->deletedNotification;
	}

	/**
	 * @param int $deletedNotification
	 *
	 * @return void
	 */
	public function setDeletedNotification(int $deletedNotification):void {
		$this->deletedNotification = $deletedNotification;
	}

	/**
	 * @Then /^the list of notifications should have (\d+) (?:entry|entries)$/
	 *
	 * @param int $numNotifications
	 *
	 * @return void
	 */
	public function checkNumNotifications(int $numNotifications):void {
		$notifications = $this->getArrayOfNotificationsResponded(
			$this->featureContext->getResponse()
		);
		Assert::assertCount(
			(int) $numNotifications,
			$notifications,
			"Expected notifications count to have '"
			. (int) $numNotifications
			. "' entries but got '"
			. \count($notifications)
			. "' entries"
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
	public function userNumNotifications(string $user, int $numNotifications, string $missingLast):void {
		$user = $this->featureContext->getActualUsername($user);

		$this->ocsContext->userSendsToOcsApiEndpoint(
			$user,
			'GET',
			'/apps/notifications/api/v1/notifications?format=json'
		);
		Assert::assertEquals(
			200,
			$this->featureContext->getResponse()->getStatusCode(),
			"Expected status code to be '200' but got '"
			. $this->featureContext->getResponse()->getStatusCode()
			. "'"
		);

		$previousNotificationIds = [];
		if ($missingLast) {
			Assert::assertNotEmpty(
				$this->getNotificationIds(),
				"The notifications is empty, but was not expected to be empty when step is used '{$missingLast}'"
			);
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

			Assert::assertEquals(
				$previousNotificationIds,
				$now,
				"The actual notifications, {$missingLast}, are not what was expected. {$numNotifications} were expected.See the differences below."
			);
		}
	}

	/**
	 * @Then /^the (first|last) notification of user "([^"]*)" should match$/
	 *
	 * @param string $notification first|last
	 * @param string $user
	 * @param TableNode $formData
	 *
	 * @return void
	 * @throws Exception
	 */
	public function matchNotificationPlain(
		string $notification,
		string $user,
		TableNode $formData
	):void {
		$this->matchNotification(
			$notification,
			$user,
			"",
			false,
			$formData
		);
	}

	/**
	 * @Then /^the (first|last) notification of user "([^"]*)" should match these regular expressions about user "([^"]*)"$/
	 *
	 * @param string $notification first|last
	 * @param string $user
	 * @param string $aboutUser
	 * @param TableNode $formData
	 *
	 * @return void
	 */
	public function matchNotificationRegularExpression(
		string $notification,
		string $user,
		string $aboutUser,
		TableNode $formData
	) {
		$this->matchNotification(
			$notification,
			$user,
			$aboutUser,
			true,
			$formData
		);
	}

	/**
	 * @param string $notification first|last
	 * @param string $user
	 * @param string $aboutUser
	 * @param bool $regex
	 * @param TableNode $formData
	 *
	 * @return void
	 * @throws Exception
	 */
	public function matchNotification(
		string $notification,
		string $user,
		string $aboutUser,
		bool   $regex,
		TableNode $formData
	):void {
		$lastNotifications = $this->getLastNotificationIds();
		if ($notification === 'first') {
			$notificationId = \reset($lastNotifications);
		} else { /* if ($notification === 'last')*/
			$notificationId = \end($lastNotifications);
		}

		$this->ocsContext->userSendsToOcsApiEndpoint(
			$user,
			'GET',
			"/apps/notifications/api/v1/notifications/$notificationId?format=json"
		);

		Assert::assertEquals(
			200,
			$this->featureContext->getResponse()->getStatusCode(),
			"Expected status code to be '200', but got '"
			. $this->featureContext->getResponse()->getStatusCode()
			. "'"
		);
		$response = \json_decode(
			$this->featureContext->getResponse()->getBody()->getContents(),
			true
		);

		$this->featureContext->verifyTableNodeColumns($formData, ['key', 'regex']);
		foreach ($formData->getHash() as $notification) {
			Assert::assertArrayHasKey(
				$notification['key'],
				$response['ocs']['data'],
				"Could not find notification with key '${notification['key']}' matching '${notification['regex']}', in " . __METHOD__
			);
			if ($regex) {
				$value = $this->featureContext->substituteInLineCodes(
					$notification['regex'],
					$aboutUser,
					['preg_quote' => ['/']]
				);
				Assert::assertNotFalse(
					(bool) \preg_match($value, $response['ocs']['data'][$notification['key']]),
					"'$value' does not match '{$response['ocs']['data'][$notification['key']]}'"
				);
			} else {
				$value = $this->featureContext->substituteInLineCodes($notification['regex']);
				Assert::assertEquals(
					$value,
					$response['ocs']['data'][$notification['key']],
					"Expected {$value} but got {$response['ocs']['data'][$notification['key']]}"
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
	public function getArrayOfNotificationsResponded(ResponseInterface $resp):array {
		$jsonResponse = \json_decode($resp->getBody()->getContents(), true);
		return $jsonResponse['ocs']['data'];
	}

	/**
	 *
	 * @AfterScenario
	 *
	 * @return void
	 * @throws Exception
	 */
	public function clearNotifications() {
		$response = OcsApiHelper::sendRequest(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			"DELETE",
			'/apps/testing/api/v1/notifications',
			$this->featureContext->getStepLineRef()
		);
		Assert::assertEquals(
			200,
			$response->getStatusCode(),
			"Expected status code to be '200' but got {$response->getStatusCode()}"
		);
		Assert::assertEquals(
			200,
			(int) $this->ocsContext->getOCSResponseStatusCode($response),
			"Expected status code to be '200' but got '"
			. (int) $this->ocsContext->getOCSResponseStatusCode($response)
			. "'"
		);
	}

	/**
	 * @BeforeScenario
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setUpScenario(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
		$this->ocsContext = $environment->getContext('OCSContext');
		$this->clearNotifications();
	}
}
