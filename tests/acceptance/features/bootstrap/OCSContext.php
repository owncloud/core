<?php
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
use GuzzleHttp\Message\ResponseInterface;
use TestHelpers\OcsApiHelper;

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
	 * @Given /^the user has sent HTTP method "([^"]*)" to OCS API endpoint "([^"]*)"$/
	 *
	 * @param string $verb
	 * @param string $url
	 *
	 * @return void
	 */
	public function theUserSendsToOcsApiEndpoint($verb, $url) {
		$this->theUserSendsToOcsApiEndpointWithBody($verb, $url, null);
	}

	/**
	 * @When /^user "([^"]*)" sends HTTP method "([^"]*)" to OCS API endpoint "([^"]*)"$/
	 * @When /^user "([^"]*)" sends HTTP method "([^"]*)" to OCS API endpoint "([^"]*)" using password "([^"]*)"$/
	 * @Given /^user "([^"]*)" has sent HTTP method "([^"]*)" to API endpoint "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 * @param string $password
	 *
	 * @return void
	 */
	public function userSendsToOcsApiEndpoint($user, $verb, $url, $password = null) {
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user,
			$verb,
			$url,
			null,
			$password
		);
	}

	/**
	 * @When /^user "([^"]*)" sends HTTP method "([^"]*)" to OCS API endpoint "([^"]*)" with body$/
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
	public function userSendsHTTPMethodToOcsApiEndpointWithBody(
		$user, $verb, $url, $body = null, $password = null
	) {
		
		/**
		 * array of the data to be sent in the body.
		 * contains $body data converted to an array
		 *
		 * @var array $bodyArray
		 */
		$bodyArray = [];
		if ($body instanceof TableNode) {
			$bodyArray = $body->getRowsHash();
		}
		
		if ($user !== 'UNAUTHORIZED_USER') {
			$user = $this->featureContext->getActualUsername($user);
			if ($password === null) {
				$password = $this->featureContext->getPasswordForUser($user);
			}
		} else {
			$user = null;
			$password = null;
		}
		
		$response = OcsApiHelper::sendRequest(
			$this->featureContext->getBaseUrl(), $user, $password, $verb,
			$url, $bodyArray, $this->featureContext->getOcsApiVersion()
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @When the administrator sends HTTP method :verb to OCS API endpoint :url
	 * @When the administrator sends HTTP method :verb to OCS API endpoint :url using password :password
	 *
	 * @param string $verb
	 * @param string $url
	 * @param string $password
	 *
	 * @return void
	 */
	public function theAdministratorSendsHttpMethodToOcsApiEndpoint(
		$verb, $url, $password = null
	) {
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
	 */
	public function userSendsToOcsApiEndpointWithHeaders(
		$user, $verb, $url, TableNode $headersTable
	) {
		$user = $this->featureContext->getActualUsername($user);
		$password = $this->featureContext->getPasswordForUser($user);
		$this->userSendsToOcsApiEndpointWithHeadersAndPassword(
			$user, $verb, $url, $password, $headersTable
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
	 */
	public function administratorSendsToOcsApiEndpointWithHeaders(
		$verb, $url, TableNode $headersTable
	) {
		$this->userSendsToOcsApiEndpointWithHeaders(
			$this->featureContext->getAdminUsername(), $verb, $url, $headersTable
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
	 */
	public function userSendsToOcsApiEndpointWithHeadersAndPassword(
		$user, $verb, $url, $password, TableNode $headersTable
	) {
		$user = $this->featureContext->getActualUsername($user);
		$headers = [];
		foreach ($headersTable as $row) {
			$headers[$row['header']] = $row ['value'];
		}
		
		$response = OcsApiHelper::sendRequest(
			$this->featureContext->getBaseUrl(), $user, $password, $verb,
			$url, [], $this->featureContext->getOcsApiVersion(), $headers
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
	 */
	public function administratorSendsToOcsApiEndpointWithHeadersAndPassword(
		$verb, $url, $password, TableNode $headersTable
	) {
		$this->userSendsToOcsApiEndpointWithHeadersAndPassword(
			$this->featureContext->getAdminUsername(), $verb, $url, $password, $headersTable
		);
	}

	/**
	 * @When the administrator sends HTTP method :verb to OCS API endpoint :url with body
	 * @Given the administrator has sent HTTP method :verb to OCS API endpoint :url with body
	 *
	 * @param string $verb
	 * @param string $url
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function theAdministratorSendsHttpMethodToOcsApiEndpointWithBody(
		$verb, $url, TableNode $body
	) {
		$admin = $this->featureContext->getAdminUsername();
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$admin, $verb, $url, $body
		);
	}

	/**
	 * @When /^the user sends HTTP method "([^"]*)" to OCS API endpoint "([^"]*)" with body$/
	 * @Given /^the user has sent HTTP method "([^"]*)" to OCS API endpoint "([^"]*)" with body$/
	 *
	 * @param string $verb
	 * @param string $url
	 * @param TableNode $body
	 *
	 * @return void
	 */
	public function theUserSendsToOcsApiEndpointWithBody($verb, $url, $body) {
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$this->featureContext->getCurrentUser(),
			$verb,
			$url,
			$body
		);
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
		$verb, $url, $password, TableNode $body
	) {
		$admin = $this->featureContext->getAdminUsername();
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$admin, $verb, $url, $body, $password
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
		$user, $verb, $url, $password, $body
	) {
		$this->userSendsHTTPMethodToOcsApiEndpointWithBody(
			$user, $verb, $url, $body, $password
		);
	}

	/**
	 * @Then /^the OCS status code should be "([^"]*)"$/
	 *
	 * @param int|int[] $statusCode
	 * @param string $message
	 *
	 * @return void
	 */
	public function theOCSStatusCodeShouldBe($statusCode, $message = "") {
		if ($message === "") {
			$message = "OCS status code is not the expected value";
		}
		
		$responseStatusCode = $this->getOCSResponseStatusCode(
			$this->featureContext->getResponse()
		);
		if (\is_array($statusCode)) {
			PHPUnit\Framework\Assert::assertContains(
				$responseStatusCode, $statusCode,
				$message
			);
		} else {
			PHPUnit\Framework\Assert::assertEquals(
				$statusCode, $responseStatusCode,
				$message
			);
		}
	}

	/**
	 * Check the text in an OCS status message
	 *
	 * @Then /^the OCS status message should be "([^"]*)"$/
	 *
	 * @param string $statusMessage
	 *
	 * @return void
	 */
	public function theOCSStatusMessageShouldBe($statusMessage) {
		PHPUnit\Framework\Assert::assertEquals(
			$statusMessage,
			$this->getOCSResponseStatusMessage(
				$this->featureContext->getResponse()
			),
			'Unexpected OCS status message in response'
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
	) {
		PHPUnit\Framework\Assert::assertEquals(
			$statusMessage->getRaw(),
			$this->getOCSResponseStatusMessage(
				$this->featureContext->getResponse()
			),
			'Unexpected OCS status message in response'
		);
	}

	/**
	 * Parses the xml answer to get ocs response which doesn't match with
	 * http one in v1 of the api.
	 *
	 * @param ResponseInterface $response
	 *
	 * @throws \Exception
	 * @return string
	 */
	public function getOCSResponseStatusCode($response) {
		$responseXml = $this->featureContext->getResponseXml($response);
		if (isset($responseXml->meta[0], $responseXml->meta[0]->statuscode)) {
			return (string) $responseXml->meta[0]->statuscode;
		}
		throw new \Exception(
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
	public function getOCSResponseStatusMessage($response) {
		return (string) $this->featureContext->getResponseXml($response)->meta[0]->message;
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
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
