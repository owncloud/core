<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Joas Schilling <coding@schilljs.com>
 * @author Sergio Bertolin <sbertolin@owncloud.com>
 * @author Phillip Davis <phil@jankaritech.com>
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use PHPUnit\Framework\Assert;
use TestHelpers\AppConfigHelper;
use TestHelpers\OcsApiHelper;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Context\Context;

/**
 * AppConfiguration trait
 */
class AppConfigurationContext implements Context {

	/**
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * @When /^the administrator sets parameter "([^"]*)" of app "([^"]*)" to ((?:'[^']*')|(?:"[^"]*"))$/
	 *
	 * @param string $parameter
	 * @param string $app
	 * @param string $value
	 *
	 * @return void
	 */
	public function adminSetsServerParameterToUsingAPI(
		string $parameter,
		string $app,
		string $value
	):void {
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		$value = \trim($value, $value[0]);
		$this->modifyAppConfig($app, $parameter, $value);
	}

	/**
	 * @Given /^parameter "([^"]*)" of app "([^"]*)" has been set to ((?:'[^']*')|(?:"[^"]*"))$/
	 *
	 * @param string $parameter
	 * @param string $app
	 * @param string $value
	 *
	 * @return void
	 */
	public function serverParameterHasBeenSetTo(string $parameter, string $app, string $value):void {
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		if (\TestHelpers\OcisHelper::isTestingOnOcisOrReva()) {
			return;
		}
		$value = \trim($value, $value[0]);
		$this->modifyAppConfig($app, $parameter, $value);
	}

	/**
	 * @Then the capabilities setting of :capabilitiesApp path :capabilitiesPath should be :expectedValue
	 * @Given the capabilities setting of :capabilitiesApp path :capabilitiesPath has been confirmed to be :expectedValue
	 *
	 * @param string $capabilitiesApp the "app" name in the capabilities response
	 * @param string $capabilitiesPath the path to the element
	 * @param string $expectedValue
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theCapabilitiesSettingOfAppParameterShouldBe(
		string $capabilitiesApp,
		string $capabilitiesPath,
		string $expectedValue
	):void {
		$this->theAdministratorGetsCapabilitiesCheckResponse();
		$actualValue = $this->getAppParameter($capabilitiesApp, $capabilitiesPath);

		Assert::assertEquals(
			$expectedValue,
			$actualValue,
			__METHOD__
			. " $capabilitiesApp path $capabilitiesPath should be $expectedValue but is $actualValue"
		);
	}

	/**
	 * @param string $capabilitiesApp the "app" name in the capabilities response
	 * @param string $capabilitiesPath the path to the element
	 *
	 * @return string
	 */
	public function getAppParameter(string $capabilitiesApp, string $capabilitiesPath):string {
		return $this->getParameterValueFromXml(
			$this->getCapabilitiesXml(__METHOD__),
			$capabilitiesApp,
			$capabilitiesPath
		);
	}

	/**
	 * @When user :username retrieves the capabilities using the capabilities API
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function userGetsCapabilities(string $username):void {
		$user = $this->featureContext->getActualUsername($username);
		$password = $this->featureContext->getPasswordForUser($user);
		$this->featureContext->setResponse(
			OcsApiHelper::sendRequest(
				$this->featureContext->getBaseUrl(),
				$user,
				$password,
				'GET',
				'/cloud/capabilities',
				$this->featureContext->getStepLineRef(),
				[],
				$this->featureContext->getOcsApiVersion()
			)
		);
	}

	/**
	 * @Given user :username has retrieved the capabilities
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userGetsCapabilitiesCheckResponse(string $username):void {
		$this->userGetsCapabilities($username);
		$statusCode = $this->featureContext->getResponse()->getStatusCode();
		if ($statusCode !== 200) {
			throw new \Exception(
				__METHOD__
				. " user $username returned unexpected status $statusCode"
			);
		}
	}

	/**
	 * @When the user retrieves the capabilities using the capabilities API
	 *
	 * @return void
	 */
	public function theUserGetsCapabilities():void {
		$this->userGetsCapabilities($this->featureContext->getCurrentUser());
	}

	/**
	 * @Given the user has retrieved the capabilities
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserGetsCapabilitiesCheckResponse():void {
		$this->userGetsCapabilitiesCheckResponse($this->featureContext->getCurrentUser());
	}

	/**
	 * @When the administrator retrieves the capabilities using the capabilities API
	 *
	 * @return void
	 */
	public function theAdministratorGetsCapabilities():void {
		$this->userGetsCapabilities($this->featureContext->getAdminUsername());
	}

	/**
	 * @Given the administrator has retrieved the capabilities
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorGetsCapabilitiesCheckResponse():void {
		$this->userGetsCapabilitiesCheckResponse($this->featureContext->getAdminUsername());
	}

	/**
	 * @param string $exceptionText text to put at the front of exception messages
	 *
	 * @return SimpleXMLElement latest retrieved capabilities in XML format
	 */
	public function getCapabilitiesXml(string $exceptionText = ''): SimpleXMLElement {
		if ($exceptionText === '') {
			$exceptionText = __METHOD__;
		}
		return $this->featureContext->getResponseXml(null, $exceptionText)->data->capabilities;
	}

	/**
	 * @param SimpleXMLElement $xml of the capabilities
	 * @param string $capabilitiesApp the "app" name in the capabilities response
	 * @param string $capabilitiesPath the path to the element
	 *
	 * @return string
	 */
	public function getParameterValueFromXml(
		SimpleXMLElement $xml,
		string $capabilitiesApp,
		string $capabilitiesPath
	):string {
		$path_to_element = \explode('@@@', $capabilitiesPath);
		$answeredValue = $xml->{$capabilitiesApp};
		foreach ($path_to_element as $element) {
			$nameIndexParts = \explode('[', $element);
			if (isset($nameIndexParts[1])) {
				// This part of the path should be something like "some_element[1]"
				// Separately extract the name and the index
				$name = $nameIndexParts[0];
				$index = (int) \explode(']', $nameIndexParts[1])[0];
				// and use those to construct the reference into the next XML level
				$answeredValue = $answeredValue->{$name}[$index];
			} else {
				if ($element !== "") {
					$answeredValue = $answeredValue->{$element};
				}
			}
		}

		return (string) $answeredValue;
	}

	/**
	 * @param SimpleXMLElement $xml of the capabilities
	 * @param string $capabilitiesApp the "app" name in the capabilities response
	 * @param string $capabilitiesPath the path to the element
	 *
	 * @return boolean
	 */
	public function parameterValueExistsInXml(
		SimpleXMLElement $xml,
		string $capabilitiesApp,
		string $capabilitiesPath
	):bool {
		$path_to_element = \explode('@@@', $capabilitiesPath);
		$answeredValue = $xml->{$capabilitiesApp};

		foreach ($path_to_element as $element) {
			$nameIndexParts = \explode('[', $element);
			if (isset($nameIndexParts[1])) {
				// This part of the path should be something like "some_element[1]"
				// Separately extract the name and the index
				$name = $nameIndexParts[0];
				$index = (int) \explode(']', $nameIndexParts[1])[0];
				// and use those to construct the reference into the next XML level
				if (isset($answeredValue->{$name}[$index])) {
					$answeredValue = $answeredValue->{$name}[$index];
				} else {
					// The path ends at this level
					return false;
				}
			} else {
				if (isset($answeredValue->{$element})) {
					$answeredValue = $answeredValue->{$element};
				} else {
					// The path ends at this level
					return false;
				}
			}
		}

		return true;
	}

	/**
	 * @param string $app
	 * @param string $parameter
	 * @param string $value
	 *
	 * @return void
	 */
	public function modifyAppConfig(string $app, string $parameter, string $value):void {
		AppConfigHelper::modifyAppConfig(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$app,
			$parameter,
			$value,
			$this->featureContext->getStepLineRef(),
			$this->featureContext->getOcsApiVersion()
		);
	}

	/**
	 * @param array $appParameterValues
	 *
	 * @return void
	 */
	public function modifyAppConfigs(array $appParameterValues):void {
		AppConfigHelper::modifyAppConfigs(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$appParameterValues,
			$this->featureContext->getStepLineRef(),
			$this->featureContext->getOcsApiVersion()
		);
	}

	/**
	 * @When the administrator adds url :url as trusted server using the testing API
	 *
	 * @param string $url
	 *
	 * @return void
	 */
	public function theAdministratorAddsUrlAsTrustedServerUsingTheTestingApi(string $url):void {
		$adminUser = $this->featureContext->getAdminUsername();
		$response = OcsApiHelper::sendRequest(
			$this->featureContext->getBaseUrl(),
			$adminUser,
			$this->featureContext->getAdminPassword(),
			'POST',
			"/apps/testing/api/v1/trustedservers",
			$this->featureContext->getStepLineRef(),
			['url' => $this->featureContext->substituteInLineCodes($url)]
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * Return text that contains the details of the URL, including any differences due to inline codes
	 *
	 * @param string $url
	 *
	 * @return string
	 */
	private function getUrlStringForMessage(string $url):string {
		$text = $url;
		$expectedUrl = $this->featureContext->substituteInLineCodes($url);
		if ($expectedUrl !== $url) {
			$text .= " ($expectedUrl)";
		}
		return $text;
	}

	/**
	 * @param string $url
	 *
	 * @return string
	 */
	private function getNotTrustedServerMessage(string $url):string {
		return
			"URL "
			. $this->getUrlStringForMessage($url)
			. " is not a trusted server but should be";
	}

	/**
	 * @Then url :url should be a trusted server
	 *
	 * @param string $url
	 *
	 * @return  void
	 * @throws Exception
	 */
	public function urlShouldBeATrustedServer(string $url):void {
		$trustedServers = $this->featureContext->getTrustedServers();
		foreach ($trustedServers as $server => $id) {
			if ($server === $this->featureContext->substituteInLineCodes($url)) {
				return;
			}
		}
		Assert::fail($this->getNotTrustedServerMessage($url));
	}

	/**
	 * @Then the trusted server list should include these urls:
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theTrustedServerListShouldIncludeTheseUrls(TableNode $table):void {
		$trustedServers = $this->featureContext->getTrustedServers();
		$expected = $table->getColumnsHash();

		foreach ($expected as $server) {
			$found = false;
			foreach ($trustedServers as $url => $id) {
				if ($url === $this->featureContext->substituteInLineCodes($server['url'])) {
					$found = true;
					break;
				}
			}
			if (!$found) {
				Assert::fail($this->getNotTrustedServerMessage($server['url']));
			}
		}
	}

	/**
	 * @Given the administrator has added url :url as trusted server
	 *
	 * @param string $url
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasAddedUrlAsTrustedServer(string $url):void {
		$this->theAdministratorAddsUrlAsTrustedServerUsingTheTestingApi($url);
		$status = $this->featureContext->getResponse()->getStatusCode();
		if ($status !== 201) {
			throw new \Exception(
				__METHOD__ .
				" Could not add trusted server " . $this->getUrlStringForMessage($url)
				. ". The request failed with status $status"
			);
		}
	}

	/**
	 * @When the administrator deletes url :url from trusted servers using the testing API
	 *
	 * @param string $url
	 *
	 * @return void
	 */
	public function theAdministratorDeletesUrlFromTrustedServersUsingTheTestingApi(string $url):void {
		$adminUser = $this->featureContext->getAdminUsername();
		$response = OcsApiHelper::sendRequest(
			$this->featureContext->getBaseUrl(),
			$adminUser,
			$this->featureContext->getAdminPassword(),
			'DELETE',
			"/apps/testing/api/v1/trustedservers",
			$this->featureContext->getStepLineRef(),
			['url' => $this->featureContext->substituteInLineCodes($url)]
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @Then url :url should not be a trusted server
	 *
	 * @param string $url
	 *
	 * @return void
	 * @throws Exception
	 */
	public function urlShouldNotBeATrustedServer(string $url):void {
		$trustedServers = $this->featureContext->getTrustedServers();
		foreach ($trustedServers as $server => $id) {
			if ($server === $this->featureContext->substituteInLineCodes($url)) {
				Assert::fail(
					"URL " . $this->getUrlStringForMessage($url)
					. " is a trusted server but is not expected to be"
				);
			}
		}
	}

	/**
	 * @When the administrator deletes all trusted servers using the testing API
	 *
	 * @return void
	 */
	public function theAdministratorDeletesAllTrustedServersUsingTheTestingApi():void {
		$adminUser = $this->featureContext->getAdminUsername();
		$response = OcsApiHelper::sendRequest(
			$this->featureContext->getBaseUrl(),
			$adminUser,
			$this->featureContext->getAdminPassword(),
			'DELETE',
			"/apps/testing/api/v1/trustedservers/all",
			$this->featureContext->getStepLineRef()
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @Given the trusted server list is cleared
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theTrustedServerListIsCleared():void {
		$this->theAdministratorDeletesAllTrustedServersUsingTheTestingApi();
		$statusCode = $this->featureContext->getResponse()->getStatusCode();
		if ($statusCode !== 204) {
			$contents = $this->featureContext->getResponse()->getBody()->getContents();
			throw new \Exception(
				__METHOD__
				. " Failed to clear all trusted servers" . $contents
			);
		}
	}

	/**
	 * @Then the trusted server list should be empty
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theTrustedServerListShouldBeEmpty():void {
		$trustedServers = $this->featureContext->getTrustedServers();
		Assert::assertEmpty(
			$trustedServers,
			__METHOD__ . " Trusted server list is not empty"
		);
	}

	/**
	 * Expires last created share using the testing API
	 *
	 * @return void
	 */
	public function expireLastCreatedUserShare():void {
		$adminUser = $this->featureContext->getAdminUsername();
		$share_id = $this->featureContext->getLastShareId();
		$response = OcsApiHelper::sendRequest(
			$this->featureContext->getBaseUrl(),
			$adminUser,
			$this->featureContext->getAdminPassword(),
			'POST',
			"/apps/testing/api/v1/expire-share/{$share_id}",
			$this->featureContext->getStepLineRef(),
			[],
			$this->featureContext->getOcsApiVersion()
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @Given the administrator has expired the last created share using the testing API
	 *
	 * @return void
	 */
	public function theAdministratorHasExpiredTheLastCreatedShare():void {
		$this->expireLastCreatedUserShare();
		Assert::assertSame(
			200,
			$this->featureContext->getResponse()->getStatusCode(),
			"Request to expire last share failed."
		);
	}

	/**
	 * @When the administrator expires the last created share using the testing API
	 *
	 * @return void
	 */
	public function theAdministratorExpiresTheLastCreatedShare():void {
		$this->expireLastCreatedUserShare();
	}

	/**
	 * @BeforeScenario
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
}
