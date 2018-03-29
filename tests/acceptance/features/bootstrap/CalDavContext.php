<?php
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

require __DIR__ . '/../../../../lib/composer/autoload.php';

use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Message\ResponseInterface;

/**
 * CalDav functions
 */
class CalDavContext implements \Behat\Behat\Context\Context {
	/**
	 * @var Client 
	 */
	private $client;
	/**
	 * @var ResponseInterface 
	 */
	private $response;
	/**
	 * @var array 
	 */
	private $responseXml = '';

	/**
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * @BeforeScenario @caldav
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
		$this->client = new Client();
		$this->responseXml = '';
	}

	/**
	 * @AfterScenario @caldav
	 *
	 * @return void
	 */
	public function afterScenario() {
		$davUrl = $this->featureContext->baseUrlWithSlash() . 'remote.php/dav/calendars/admin/MyCalendar';
		try {
			$this->client->delete(
				$davUrl,
				[
					'auth' => $this->featureContext->getAuthOptionForAdmin()
				]
			);
		} catch (BadResponseException $e) {
		}
	}

	/**
	 * @When user :user requests calendar :calendar using the API
	 *
	 * @param string $user
	 * @param string $calendar
	 *
	 * @return void
	 */
	public function userRequestsCalendarUsingTheAPI($user, $calendar) {
		$davUrl = $this->featureContext->baseUrlWithSlash() . 'remote.php/dav/calendars/' . $calendar;

		try {
			$this->response = $this->client->get(
				$davUrl,
				[
					'auth' => $this->featureContext->getAuthOptionForUser($user)
				]
			);
		} catch (BadResponseException $e) {
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @Then the CalDAV HTTP status code should be :code
	 *
	 * @param int $code
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theCalDavHttpStatusCodeShouldBe($code) {
		if ((int)$code !== $this->response->getStatusCode()) {
			throw new \Exception(
				sprintf(
					'Expected %s got %s',
					(int)$code,
					$this->response->getStatusCode()
				)
			);
		}

		$body = $this->response->getBody()->getContents();
		if ($body && substr($body, 0, 1) === '<') {
			$reader = new Sabre\Xml\Reader();
			$reader->xml($body);
			$this->responseXml = $reader->parse();
		}
	}

	/**
	 * @Then the CalDAV exception should be :message
	 *
	 * @param string $message
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theCalDavExceptionShouldBe($message) {
		$result = $this->responseXml['value'][0]['value'];

		if ($message !== $result) {
			throw new \Exception(
				sprintf(
					'Expected %s got %s',
					$message,
					$result
				)
			);
		}
	}

	/**
	 * @Then the CalDAV error message should be :message
	 *
	 * @param string $message
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theCalDavErrorMessageShouldBe($message) {
		$result = $this->responseXml['value'][1]['value'];

		if ($message !== $result) {
			throw new \Exception(
				sprintf(
					'Expected %s got %s',
					$message,
					$result
				)
			);
		}
	}

	/**
	 * @Given user :user has successfully created a calendar named :name
	 *
	 * @param string $user
	 * @param string $name
	 *
	 * @return void
	 */
	public function userHasCreatedACalendarNamed($user, $name) {
		$davUrl = $this->featureContext->baseUrlWithSlash() . 'remote.php/dav/calendars/' . $user . '/' . $name;

		$request = $this->client->createRequest(
			'MKCALENDAR',
			$davUrl,
			[
				'body' => '<c:mkcalendar xmlns:c="urn:ietf:params:xml:ns:caldav" xmlns:d="DAV:" xmlns:a="http://apple.com/ns/ical/" xmlns:o="http://owncloud.org/ns"><d:set><d:prop><d:displayname>test</d:displayname><o:calendar-enabled>1</o:calendar-enabled><a:calendar-color>#21213D</a:calendar-color><c:supported-calendar-component-set><c:comp name="VEVENT"/></c:supported-calendar-component-set></d:prop></d:set></c:mkcalendar>',
				'auth' => $this->featureContext->getAuthOptionForUser($user)
			]
		);

		$this->response = $this->client->send($request);
		$this->theCalDavHttpStatusCodeShouldBe(201);
	}

}
