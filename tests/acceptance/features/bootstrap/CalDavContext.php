<?php declare(strict_types=1);
/**
 * @author Lukas Reschke <lukas@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use PHPUnit\Framework\Assert;
use Psr\Http\Message\ResponseInterface;
use TestHelpers\HttpRequestHelper;

/**
 * CalDav functions
 */
class CalDavContext implements Context {
	private ResponseInterface $response;
	private FeatureContext $featureContext;

	/**
	 * @BeforeScenario @caldav
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function setUpScenario(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}

	/**
	 * @AfterScenario @caldav
	 *
	 * @return void
	 */
	public function afterScenario():void {
		$davUrl = $this->featureContext->getBaseUrl()
			. '/remote.php/dav/calendars/admin/MyCalendar';
		HttpRequestHelper::delete(
			$davUrl,
			$this->featureContext->getStepLineRef(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword()
		);
	}

	/**
	 * @When user :user requests calendar :calendar of user :ofUser using the new WebDAV API
	 *
	 * @param string $user
	 * @param string $calendar
	 * @param string $ofUser
	 *
	 * @return void
	 */
	public function userRequestsCalendarUsingTheAPI(string $user, string $calendar, string $ofUser):void {
		$user = $this->featureContext->getActualUsername($user);
		$ofUser = $this->featureContext->getActualUsername($ofUser);
		$normalizedUser = $this->featureContext->normalizeUsername($ofUser);
		$calendar = $this->featureContext->substituteInLineCodes(
			$calendar,
			$normalizedUser
		);
		$davUrl = $this->featureContext->getBaseUrl()
			. "/remote.php/dav/calendars/$calendar";

		$this->response = HttpRequestHelper::get(
			$davUrl,
			$this->featureContext->getStepLineRef(),
			$user,
			$this->featureContext->getPasswordForUser($user)
		);
		$this->featureContext->setResponseXml(
			HttpRequestHelper::parseResponseAsXml($this->response)
		);
	}

	/**
	 * @When the administrator requests calendar :calendar of user :ofUser using the new WebDAV API
	 *
	 * @param string $calendar
	 * @param string $ofUser
	 *
	 * @return void
	 */
	public function theAdministratorRequestsCalendarUsingTheNewWebdavApi(string $calendar, string $ofUser):void {
		$admin = $this->featureContext->getAdminUsername();
		$this->userRequestsCalendarUsingTheAPI($admin, $calendar, $ofUser);
	}

	/**
	 * @Then the CalDAV HTTP status code should be :code
	 *
	 * @param string $expectedStatus
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theCalDavHttpStatusCodeShouldBe(string $expectedStatus):void {
		$actualStatus = $this->response->getStatusCode();
		Assert::assertEquals(
			(int) $expectedStatus,
			$actualStatus,
			__METHOD__ . " Expected HTTP status $expectedStatus but got $actualStatus"
		);
	}

	/**
	 * @Then as user :user a new calendar with name :calendar should be present in the WebDAV API Response
	 *
	 * @param string $user
	 * @param string $calendar
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userCalendarShouldBePresentInTheWebdavApiResponse(string $user, string $calendar):void {
		$user = $this->featureContext->getActualUsername($user);
		$normalizedUser = $this->featureContext->normalizeUsername($user);
		$calendar = $this->featureContext->substituteInLineCodes(
			$calendar,
			$normalizedUser
		);
		$davUrl = $this->featureContext->getBaseUrl()
			. "/remote.php/dav/calendars/$calendar";

		$this->response = HttpRequestHelper::get(
			$davUrl,
			$this->featureContext->getStepLineRef(),
			$user,
			$this->featureContext->getPasswordForUser($user)
		);
		$this->featureContext->setResponseXml(
			HttpRequestHelper::parseResponseAsXml($this->response)
		);
		$this->theCalDavHttpStatusCodeShouldBe("200");
	}

	/**
	 * @Given user :user has successfully created a calendar named :name
	 *
	 * @param string $user
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasCreatedACalendarNamed(string $user, string $name):void {
		$user = $this->featureContext->getActualUsername($user);
		$davUrl = $this->featureContext->getBaseUrl()
			. "/remote.php/dav/calendars/$user/$name";

		$body
			= '<c:mkcalendar xmlns:c="urn:ietf:params:xml:ns:caldav" ' .
			'xmlns:d="DAV:" xmlns:a="http://apple.com/ns/ical/" ' .
			'xmlns:o="http://owncloud.org/ns"><d:set><d:prop><d:displayname>' .
			'test</d:displayname><o:calendar-enabled>1</o:calendar-enabled>' .
			'<a:calendar-color>#21213D</a:calendar-color>' .
			'<c:supported-calendar-component-set><c:comp name="VEVENT"/>' .
			'</c:supported-calendar-component-set></d:prop></d:set>' .
			'</c:mkcalendar>';

		$this->response = HttpRequestHelper::sendRequest(
			$davUrl,
			$this->featureContext->getStepLineRef(),
			"MKCALENDAR",
			$user,
			$this->featureContext->getPasswordForUser($user),
			null,
			$body
		);
		$this->theCalDavHttpStatusCodeShouldBe("201");
		$this->featureContext->setResponseXml(
			HttpRequestHelper::parseResponseAsXml($this->response)
		);
	}

	/**
	 * @Given the administrator has successfully created a calendar named :name
	 *
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasSuccessfullyCreatedACalendarNamed(string $name):void {
		$admin = $this->featureContext->getAdminUsername();
		$this->userHasCreatedACalendarNamed($admin, $name);
	}
}
