<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Psr\Http\Message\ResponseInterface;
use PHPUnit\Framework\Assert;
use TestHelpers\OcsApiHelper;
use TestHelpers\TranslationHelper;

require_once 'bootstrap.php';

/**
 * steps needed to send requests to the OCS API
 */
class OCSContext implements Context {

	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * @When /^the user sends HTTP method "([^"]*)" to OCS API endpoint "([^"]*)"$/
	 *
	 * @param string $verb
	 * @param string $url
	 *
	 * @return void
	 */
	public function theUserSendsToOcsApiEndpoint(string $verb, string $url):void {
		$this->theUserSendsToOcsApiEndpointWithBody($verb, $url, null);
	}

	/**
	 * @Given /^the user has sent HTTP method "([^"]*)" to OCS API endpoint "([^"]*)"$/
	 *
	 * @param string $verb
	 * @param string $url
	 *
	 * @return void
	 */
	public function theUserHasSentToOcsApiEndpoint(string $verb, string $url):void {
		$this->theUserSendsToOcsApiEndpointWithBody($verb, $url, null);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @When /^user "([^"]*)" sends HTTP method "([^"]*)" to OCS API endpoint "([^"]*)"$/
	 * @When /^user "([^"]*)" sends HTTP method "([^"]*)" to OCS API endpoint "([^"]*)" using password "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function userSendsToOcsApiEndpoint(string $user, string $verb, string $url, ?string $password = null):void {
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			$verb,
			$url,
			null,
			$password
		);
	}

	/**
	 * @Given /^user "([^"]*)" has sent HTTP method "([^"]*)" to API endpoint "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function userHasSentToOcsApiEndpoint(string $user, string $verb, string $url, ?string $password = null):void {
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			$verb,
			$url,
			null,
			$password
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 * @param TableNode|null $body
	 * @param string|null $password
	 * @param array|null $headers
	 *
	 * @return void
	 */
	public function userSendsHTTPMethodToOcsApiEndpointWithBody(
		string $user,
		string $verb,
		string $url,
		?TableNode $body = null,
		?string $password = null,
		?array $headers = null
	):void {
		/**
		 * array of the data to be sent in the body.
		 * contains $body data converted to an array
		 *
		 * @var array $bodyArray
		 */
		$bodyArray = [];
		if ($body instanceof TableNode) {
			$bodyArray = $body->getRowsHash();
		} elseif ($body !== null && \is_array($body)) {
			$bodyArray = $body;
		}

		if ($user !== 'UNAUTHORIZED_USER') {
			if ($password === null) {
				$password = $this->featureContext->getPasswordForUser($user);
			}
			$user = $this->featureContext->getActualUsername($user);
		} else {
			$user = null;
			$password = null;
		}
		$response = OcsApiHelper::sendRequest(
			$this->featureContext->getBaseUrl(),
			$user,
			$password,
			$verb,
			$url,
			$this->featureContext->getStepLineRef(),
			$bodyArray,
			$this->featureContext->getOcsApiVersion(),
			$headers
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @param string $verb
	 * @param string $url
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function adminSendsHttpMethodToOcsApiEndpointWithBody(
		string $verb,
		string $url,
		?TableNode $body
	):void {
		$admin = $this->featureContext->getAdminUsername();
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$admin,
			$verb,
			$url,
			$body
		);
	}

	/**
	 * @param string $verb
	 * @param string $url
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function theUserSendsToOcsApiEndpointWithBody(string $verb, string $url, ?TableNode $body = null):void {
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$this->featureContext->getCurrentUser(),
			$verb,
			$url,
			$body
		);
	}

	/**
	 * @When /^user "([^"]*)" sends HTTP method "([^"]*)" to OCS API endpoint "([^"]*)" with body$/
	 *
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 * @param TableNode|null $body
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function userSendHTTPMethodToOcsApiEndpointWithBody(
		string $user,
		string $verb,
		string $url,
		?TableNode $body = null,
		?string $password = null
	):void {
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			$verb,
			$url,
			$body,
			$password
		);
	}

	/**
	 * @Given /^user "([^"]*)" has sent HTTP method "([^"]*)" to OCS API endpoint "([^"]*)" with body$/
	 *
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 * @param TableNode|null $body
	 * @param string $password
	 *
	 * @return void
	 */
	public function userHasSentHTTPMethodToOcsApiEndpointWithBody(
		string $user,
		string $verb,
		string $url,
		?TableNode $body = null,
		?string $password = null
	):void {
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			$verb,
			$url,
			$body,
			$password
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @When the administrator sends HTTP method :verb to OCS API endpoint :url
	 * @When the administrator sends HTTP method :verb to OCS API endpoint :url using password :password
	 *
	 * @param string $verb
	 * @param string $url
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function theAdministratorSendsHttpMethodToOcsApiEndpoint(
		string $verb,
		string $url,
		?string $password = null
	):void {
		$admin = $this->featureContext->getAdminUsername();
		$this->userSendsToOcsApiEndpoint($admin, $verb, $url, $password);
	}

	/**
	 * @When /^user "([^"]*)" sends HTTP method "([^"]*)" to OCS API endpoint "([^"]*)" with headers$/
	 *
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 * @param TableNode $headersTable
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userSendsToOcsApiEndpointWithHeaders(
		string $user,
		string $verb,
		string $url,
		TableNode $headersTable
	):void {
		$user = $this->featureContext->getActualUsername($user);
		$password = $this->featureContext->getPasswordForUser($user);
		$this->userSendsToOcsApiEndpointWithHeadersAndPassword(
			$user,
			$verb,
			$url,
			$password,
			$headersTable
		);
	}

	/**
	 * @When /^the administrator sends HTTP method "([^"]*)" to OCS API endpoint "([^"]*)" with headers$/
	 *
	 * @param string $verb
	 * @param string $url
	 * @param TableNode $headersTable
	 *
	 * @return void
	 * @throws Exception
	 */
	public function administratorSendsToOcsApiEndpointWithHeaders(
		string $verb,
		string $url,
		TableNode $headersTable
	):void {
		$this->userSendsToOcsApiEndpointWithHeaders(
			$this->featureContext->getAdminUsername(),
			$verb,
			$url,
			$headersTable
		);
	}

	/**
	 * @When /^user "([^"]*)" sends HTTP method "([^"]*)" to OCS API endpoint "([^"]*)" with headers using password "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 * @param string $password
	 * @param TableNode $headersTable
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userSendsToOcsApiEndpointWithHeadersAndPassword(
		string $user,
		string $verb,
		string $url,
		string $password,
		TableNode $headersTable
	):void {
		$this->featureContext->verifyTableNodeColumns(
			$headersTable,
			['header', 'value']
		);
		$user = $this->featureContext->getActualUsername($user);
		$headers = [];
		foreach ($headersTable as $row) {
			$headers[$row['header']] = $row ['value'];
		}

		$response = OcsApiHelper::sendRequest(
			$this->featureContext->getBaseUrl(),
			$user,
			$password,
			$verb,
			$url,
			$this->featureContext->getStepLineRef(),
			[],
			$this->featureContext->getOcsApiVersion(),
			$headers
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @When /^the administrator sends HTTP method "([^"]*)" to OCS API endpoint "([^"]*)" with headers using password "([^"]*)"$/
	 *
	 * @param string $verb
	 * @param string $url
	 * @param string $password
	 * @param TableNode $headersTable
	 *
	 * @return void
	 * @throws Exception
	 */
	public function administratorSendsToOcsApiEndpointWithHeadersAndPassword(
		string $verb,
		string $url,
		string $password,
		TableNode $headersTable
	):void {
		$this->userSendsToOcsApiEndpointWithHeadersAndPassword(
			$this->featureContext->getAdminUsername(),
			$verb,
			$url,
			$password,
			$headersTable
		);
	}

	/**
	 * @When the administrator sends HTTP method :verb to OCS API endpoint :url with body
	 *
	 * @param string $verb
	 * @param string $url
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function theAdministratorSendsHttpMethodToOcsApiEndpointWithBody(
		string $verb,
		string $url,
		?TableNode $body
	):void {
		$this->adminSendsHttpMethodToOcsApiEndpointWithBody(
			$verb,
			$url,
			$body
		);
	}

	/**
	 * @Given the administrator has sent HTTP method :verb to OCS API endpoint :url with body
	 *
	 * @param string $verb
	 * @param string $url
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function theAdministratorHasSentHttpMethodToOcsApiEndpointWithBody(
		string $verb,
		string $url,
		?TableNode $body
	):void {
		$this->adminSendsHttpMethodToOcsApiEndpointWithBody(
			$verb,
			$url,
			$body
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @When /^the user sends HTTP method "([^"]*)" to OCS API endpoint "([^"]*)" with body$/
	 *
	 * @param string $verb
	 * @param string $url
	 * @param TableNode $body
	 *
	 * @return void
	 */
	public function theUserSendsHTTPMethodToOcsApiEndpointWithBody(string $verb, string $url, TableNode $body):void {
		$this->theUserSendsHTTPMethodToOcsApiEndpointWithBody(
			$verb,
			$url,
			$body
		);
	}

	/**
	 * @Given /^the user has sent HTTP method "([^"]*)" to OCS API endpoint "([^"]*)" with body$/
	 *
	 * @param string $verb
	 * @param string $url
	 * @param TableNode $body
	 *
	 * @return void
	 */
	public function theUserHasSentHTTPMethodToOcsApiEndpointWithBody(string $verb, string $url, TableNode $body):void {
		$this->theUserSendsHTTPMethodToOcsApiEndpointWithBody(
			$verb,
			$url,
			$body
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @When the administrator sends HTTP method :verb to OCS API endpoint :url with body using password :password
	 *
	 * @param string $verb
	 * @param string $url
	 * @param string $password
	 * @param TableNode $body
	 *
	 * @return void
	 */
	public function theAdministratorSendsHttpMethodToOcsApiWithBodyAndPassword(
		string $verb,
		string $url,
		string $password,
		TableNode $body
	):void {
		$admin = $this->featureContext->getAdminUsername();
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$admin,
			$verb,
			$url,
			$body,
			$password
		);
	}

	/**
	 * @When /^user "([^"]*)" sends HTTP method "([^"]*)" to OCS API endpoint "([^"]*)" with body using password "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 * @param string $password
	 * @param TableNode $body
	 *
	 * @return void
	 */
	public function userSendsHTTPMethodToOcsApiEndpointWithBodyAndPassword(
		string $user,
		string $verb,
		string $url,
		string $password,
		TableNode $body
	):void {
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			$verb,
			$url,
			$body,
			$password
		);
	}

	/**
	 * @When user :user requests these endpoints with :method using password :password about user :ofUser
	 *
	 * @param string $user
	 * @param string $method
	 * @param string $password
	 * @param string $ofUser
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userSendsRequestToTheseEndpointsWithOutBodyUsingPassword(
		string $user,
		string $method,
		string $password,
		string $ofUser,
		TableNode $table
	):void {
		$this->userSendsRequestToTheseEndpointsWithBodyUsingPassword(
			$user,
			$method,
			null,
			$password,
			$ofUser,
			$table
		);
	}

	/**
	 * @When user :user requests these endpoints with :method including body :body using password :password about user :ofUser
	 *
	 * @param string|null $user
	 * @param string|null $method
	 * @param string|null $body
	 * @param string|null $password
	 * @param string|null $ofUser
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userSendsRequestToTheseEndpointsWithBodyUsingPassword(
		?string $user,
		?string $method,
		?string $body,
		?string $password,
		?string $ofUser,
		TableNode $table
	):void {
		$user = $this->featureContext->getActualUsername($user);
		$ofUser = $this->featureContext->getActualUsername($ofUser);
		$this->featureContext->verifyTableNodeColumns($table, ['endpoint'], ['destination']);
		$this->featureContext->emptyLastHTTPStatusCodesArray();
		$this->featureContext->emptyLastOCSStatusCodesArray();
		foreach ($table->getHash() as $row) {
			$row['endpoint'] = $this->featureContext->substituteInLineCodes(
				$row['endpoint'],
				$ofUser
			);
			$header = [];
			if (isset($row['destination'])) {
				$header['Destination'] = $this->featureContext->substituteInLineCodes(
					$this->featureContext->getBaseUrl() . $row['destination'],
					$ofUser
				);
			}
			$this->featureContext->authContext->userRequestsURLWithUsingBasicAuth(
				$user,
				$row['endpoint'],
				$method,
				$password,
				$body,
				$header
			);
			$this->featureContext->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @When user :user requests these endpoints with :method including body :body about user :ofUser
	 *
	 * @param string $user
	 * @param string $method
	 * @param string $body
	 * @param string $ofUser
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userSendsRequestToTheseEndpointsWithBody(string $user, string $method, string $body, string $ofUser, TableNode $table):void {
		$header = [];
		if ($method === 'MOVE' || $method === 'COPY') {
			$header['Destination'] = '/path/to/destination';
		}

		$this->sendRequestToTheseEndpointsAsNormalUser(
			$user,
			$method,
			$ofUser,
			$table,
			$body,
			null,
			$header,
		);
	}

	/**
	 * @When /^user "([^"]*)" requests these endpoints with "([^"]*)" to (?:get|set) property "([^"]*)" about user "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $method
	 * @param string $property
	 * @param string $ofUser
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userSendsRequestToTheseEndpointsWithProperty(string $user, string $method, string $property, string  $ofUser, TableNode $table):void {
		$this->sendRequestToTheseEndpointsAsNormalUser(
			$user,
			$method,
			$ofUser,
			$table,
			null,
			$property
		);
	}

	/**
	 * @param string $user
	 * @param string $method
	 * @param string $ofUser
	 * @param TableNode $table
	 * @param string|null $body
	 * @param string|null $property
	 * @param Array|null $header
	 *
	 * @return void
	 * @throws Exception
	 */
	public function sendRequestToTheseEndpointsAsNormalUser(
		string $user,
		string $method,
		string $ofUser,
		TableNode $table,
		?string $body = null,
		?string $property = null,
		?array $header = null
	):void {
		$user = $this->featureContext->getActualUsername($user);
		$ofUser = $this->featureContext->getActualUsername($ofUser);
		$this->featureContext->verifyTableNodeColumns($table, ['endpoint']);
		$this->featureContext->emptyLastHTTPStatusCodesArray();
		$this->featureContext->emptyLastOCSStatusCodesArray();
		if (!$body && $property) {
			$body = $this->featureContext->getBodyForOCSRequest($method, $property);
		}
		foreach ($table->getHash() as $row) {
			$row['endpoint'] = $this->featureContext->substituteInLineCodes(
				$row['endpoint'],
				$ofUser
			);
			$this->featureContext->authContext->userRequestsURLWithUsingBasicAuth(
				$user,
				$row['endpoint'],
				$method,
				$this->featureContext->getPasswordForUser($user),
				$body,
				$header
			);
			$this->featureContext->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @When user :asUser requests these endpoints with :method including body :body using the password of user :user
	 *
	 * @param string $asUser
	 * @param string $method
	 * @param string $body
	 * @param string $user
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userRequestsTheseEndpointsWithUsingThePasswordOfUser(string $asUser, string $method, string $body, string $user, TableNode $table):void {
		$asUser = $this->featureContext->getActualUsername($asUser);
		$userRenamed = $this->featureContext->getActualUsername($user);
		$this->featureContext->verifyTableNodeColumns($table, ['endpoint']);
		$this->featureContext->emptyLastHTTPStatusCodesArray();
		$this->featureContext->emptyLastOCSStatusCodesArray();
		foreach ($table->getHash() as $row) {
			$row['endpoint'] = $this->featureContext->substituteInLineCodes(
				$row['endpoint'],
				$userRenamed
			);
			$this->featureContext->authContext->userRequestsURLWithUsingBasicAuth(
				$asUser,
				$row['endpoint'],
				$method,
				$this->featureContext->getPasswordForUser($user),
				$body
			);
			$this->featureContext->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @Then /^the OCS status code should be "([^"]*)"$/
	 *
	 * @param string $statusCode
	 * @param string $message
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theOCSStatusCodeShouldBe(string $statusCode, $message = ""):void {
		$statusCodes = explode(",", $statusCode);
		$responseStatusCode = $this->getOCSResponseStatusCode(
			$this->featureContext->getResponse()
		);
		if (\is_array($statusCodes)) {
			if ($message === "") {
				$message = "OCS status code is not any of the expected values " . \implode(",", $statusCodes) . " got " . $responseStatusCode;
			}
			Assert::assertContainsEquals(
				$responseStatusCode,
				$statusCodes,
				$message
			);
		} else {
			if ($message === "") {
				$message = "OCS status code is not the expected value " . $statusCodes . " got " . $responseStatusCode;
			}

			Assert::assertEquals(
				$statusCodes,
				$responseStatusCode,
				$message
			);
		}
	}

	/**
	 * @Then /^the OCS status code should be "([^"]*)" or "([^"]*)"$/
	 *
	 * @param string $statusCode1
	 * @param string $statusCode2
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theOcsStatusCodeShouldBeOr(string $statusCode1, string $statusCode2):void {
		$this->theOCSStatusCodeShouldBe(
			$statusCode1 . "," . $statusCode2
		);
	}

	/**
	 * Check the text in an OCS status message
	 *
	 * @Then /^the OCS status message should be "([^"]*)"$/
	 * @Then /^the OCS status message should be "([^"]*)" in language "([^"]*)"$/
	 *
	 * @param string $statusMessage
	 * @param string|null $language
	 *
	 * @return void
	 */
	public function theOCSStatusMessageShouldBe(string $statusMessage, ?string $language = null):void {
		$language = TranslationHelper::getLanguage($language);
		$statusMessage = $this->getActualStatusMessage($statusMessage, $language);

		Assert::assertEquals(
			$statusMessage,
			$this->getOCSResponseStatusMessage(
				$this->featureContext->getResponse()
			),
			'Unexpected OCS status message :"' . $this->getOCSResponseStatusMessage(
				$this->featureContext->getResponse()
			) . '" in response'
		);
	}

	/**
	 * Check the text in an OCS status message
	 *
	 * @Then /^the OCS status message about user "([^"]*)" should be "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $statusMessage
	 *
	 * @return void
	 */
	public function theOCSStatusMessageAboutUserShouldBe(string $user, string $statusMessage):void {
		$user = \strtolower($this->featureContext->getActualUsername($user));
		$statusMessage = $this->featureContext->substituteInLineCodes(
			$statusMessage,
			$user
		);
		Assert::assertEquals(
			$statusMessage,
			$this->getOCSResponseStatusMessage(
				$this->featureContext->getResponse()
			),
			'Unexpected OCS status message :"' . $this->getOCSResponseStatusMessage(
				$this->featureContext->getResponse()
			) . '" in response'
		);
	}

	/**
	 * Check the text in an OCS status message.
	 * Use this step form if the expected text contains double quotes,
	 * single quotes and other content that theOCSStatusMessageShouldBe()
	 * cannot handle.
	 *
	 * After the step, write the expected text in PyString form like:
	 *
	 * """
	 * File "abc.txt" can't be shared due to reason "xyz"
	 * """
	 *
	 * @Then /^the OCS status message should be:$/
	 *
	 * @param PyStringNode $statusMessage
	 *
	 * @return void
	 */
	public function theOCSStatusMessageShouldBePyString(
		PyStringNode $statusMessage
	):void {
		Assert::assertEquals(
			$statusMessage->getRaw(),
			$this->getOCSResponseStatusMessage(
				$this->featureContext->getResponse()
			),
			'Unexpected OCS status message: "' . $this->getOCSResponseStatusMessage(
				$this->featureContext->getResponse()
			) . '" in response'
		);
	}

	/**
	 * Parses the xml answer to get ocs response which doesn't match with
	 * http one in v1 of the api.
	 *
	 * @param ResponseInterface $response
	 *
	 * @return string
	 * @throws Exception
	 */
	public function getOCSResponseStatusCode(ResponseInterface $response):string {
		$responseXml = $this->featureContext->getResponseXml($response, __METHOD__);
		if (isset($responseXml->meta[0], $responseXml->meta[0]->statuscode)) {
			return (string) $responseXml->meta[0]->statuscode;
		}
		throw new Exception(
			"No OCS status code found in responseXml"
		);
	}

	/**
	 * Parses the xml answer to get ocs response message which doesn't match with
	 * http one in v1 of the api.
	 *
	 * @param ResponseInterface $response
	 *
	 * @return string
	 */
	public function getOCSResponseStatusMessage(ResponseInterface $response):string {
		return (string) $this->featureContext->getResponseXml($response, __METHOD__)->meta[0]->message;
	}

	/**
	 * convert status message in the desired language
	 *
	 * @param string $statusMessage
	 * @param string|null $language
	 *
	 * @return string
	 */
	public function getActualStatusMessage(string $statusMessage, ?string $language = null):string {
		if ($language !== null) {
			$multiLingualMessage = \json_decode(
				\file_get_contents(__DIR__ . "/../../fixtures/multiLanguageErrors.json"),
				true
			);

			if (isset($multiLingualMessage[$statusMessage][$language])) {
				$statusMessage = $multiLingualMessage[$statusMessage][$language];
			}
		}
		return $statusMessage;
	}

	/**
	 * check if the HTTP status code and the OCS status code indicate that the request was successful
	 * this function is aware of the currently used OCS version
	 *
	 * @param string|null $message
	 *
	 * @return void
	 * @throws Exception
	 */
	public function assertOCSResponseIndicatesSuccess(?string $message = ""):void {
		$this->featureContext->theHTTPStatusCodeShouldBe('200', $message);
		if ($this->featureContext->getOcsApiVersion() === 1) {
			$this->theOCSStatusCodeShouldBe('100', $message);
		} else {
			$this->theOCSStatusCodeShouldBe('200', $message);
		}
	}

	/**
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 *
	 * @BeforeScenario
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
