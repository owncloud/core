<?php
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

use TestHelpers\AppConfigHelper;
use TestHelpers\OcsApiHelper;

require __DIR__ . '/../../../../lib/composer/autoload.php';

/**
 * AppConfiguration trait
 */
trait AppConfiguration {

	/**
	 * @var WebUIGeneralContext
	 */
	private $webUIGeneralContext;

	/**
	 * @var array with keys for each baseURL (e.g. of local and remote server)
	 *            that contain the original capabilities in XML format
	 */
	private $savedCapabilitiesXml;
	
	/**
	 * @var array the changes made to capabilities for the test scenario
	 */
	private $savedCapabilitiesChanges = [];

	/**
	 * @When /^the administrator sets parameter "([^"]*)" of app "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $parameter
	 * @param string $app
	 * @param string $value
	 *
	 * @return void
	 */
	public function adminSetsServerParameterToUsingAPI(
		$parameter, $app, $value
	) {
		$user = $this->currentUser;
		$this->currentUser = $this->getAdminUsername();

		$this->modifyAppConfig($app, $parameter, $value);

		$this->currentUser = $user;
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
	public function serverParameterHasBeenSetTo($parameter, $app, $value) {
		// The capturing group of the regex always includes the quotes at each
		// end of the captured string, so trim them.
		$value = \trim($value, $value[0]);
		$this->adminSetsServerParameterToUsingAPI($parameter, $app, $value);
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
	 */
	public function theCapabilitiesSettingOfAppParameterShouldBe(
		$capabilitiesApp, $capabilitiesPath, $expectedValue
	) {
		$this->theAdministratorGetsCapabilitiesCheckResponse();

		PHPUnit\Framework\Assert::assertEquals(
			$expectedValue,
			$this->getAppParameter($capabilitiesApp, $capabilitiesPath)
		);
	}

	/**
	 * @param string $capabilitiesApp the "app" name in the capabilities response
	 * @param string $capabilitiesPath the path to the element
	 *
	 * @return string
	 */
	public function getAppParameter($capabilitiesApp, $capabilitiesPath) {
		$answeredValue = $this->getParameterValueFromXml(
			$this->getCapabilitiesXml(),
			$capabilitiesApp,
			$capabilitiesPath
		);

		return (string)$answeredValue;
	}

	/**
	 * @When user :username retrieves the capabilities using the capabilities API
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function userGetsCapabilities($username) {
		$user = $this->getActualUsername($username);
		$password = $this->getPasswordForUser($user);
		$this->response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(), $user, $password, 'GET', '/cloud/capabilities',
			[], $this->getOcsApiVersion()
		);
	}

	/**
	 * @Given user :username has retrieved the capabilities
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function userGetsCapabilitiesCheckResponse($username) {
		$this->userGetsCapabilities($username);
		PHPUnit\Framework\Assert::assertEquals(
			200, $this->response->getStatusCode()
		);
	}

	/**
	 * @When the user retrieves the capabilities using the capabilities API
	 *
	 * @return void
	 */
	public function theUserGetsCapabilities() {
		$this->userGetsCapabilities($this->getCurrentUser());
	}

	/**
	 * @Given the user has retrieved the capabilities
	 *
	 * @return void
	 */
	public function theUserGetsCapabilitiesCheckResponse() {
		$this->userGetsCapabilitiesCheckResponse($this->getCurrentUser());
	}

	/**
	 * @When the administrator retrieves the capabilities using the capabilities API
	 *
	 * @return void
	 */
	public function theAdministratorGetsCapabilities() {
		$this->userGetsCapabilities($this->getAdminUsername());
	}

	/**
	 * @Given the administrator has retrieved the capabilities
	 *
	 * @return void
	 */
	public function theAdministratorGetsCapabilitiesCheckResponse() {
		$this->userGetsCapabilitiesCheckResponse($this->getAdminUsername());
	}

	/**
	 * @return string latest retrieved capabilities in XML format
	 */
	public function getCapabilitiesXml() {
		return $this->getResponseXml()->data->capabilities;
	}

	/**
	 * @param string $xml of the capabilities
	 * @param string $capabilitiesApp the "app" name in the capabilities response
	 * @param string $capabilitiesPath the path to the element
	 *
	 * @return string
	 */
	public function getParameterValueFromXml(
		$xml, $capabilitiesApp, $capabilitiesPath
	) {
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

		return (string)$answeredValue;
	}

	/**
	 * @param string $xml of the capabilities
	 * @param string $capabilitiesApp the "app" name in the capabilities response
	 * @param string $capabilitiesPath the path to the element
	 *
	 * @return boolean
	 */
	public function parameterValueExistsInXml(
		$xml, $capabilitiesApp, $capabilitiesPath
	) {
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
	 * @param string $capabilitiesApp the "app" name in the capabilities response
	 * @param string $capabilitiesParameter the parameter name in the
	 *                                      capabilities response
	 *
	 * @return boolean
	 */
	public function wasCapabilitySet($capabilitiesApp, $capabilitiesParameter) {
		return (bool) $this->getParameterValueFromXml(
			$this->savedCapabilitiesXml[$this->getBaseUrl()],
			$capabilitiesApp,
			$capabilitiesParameter
		);
	}

	/**
	 * @param array $capabilitiesArray with each array entry containing keys for:
	 *                                 ['capabilitiesApp'] the "app" name in the capabilities response
	 *                                 ['capabilitiesParameter'] the parameter name in the capabilities response
	 *                                 ['testingApp'] the "app" name as understood by "testing"
	 *                                 ['testingParameter'] the parameter name as understood by "testing"
	 *                                 ['testingState'] boolean state the parameter must be set to for the test
	 *
	 * @return void
	 */
	public function setCapabilities($capabilitiesArray) {
		$savedCapabilitiesChanges = AppConfigHelper::setCapabilities(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$capabilitiesArray,
			$this->savedCapabilitiesXml[$this->getBaseUrl()]
		);

		if (!isset($this->savedCapabilitiesChanges[$this->getBaseUrl()])) {
			$this->savedCapabilitiesChanges[$this->getBaseUrl()] = [];
		}
		$this->savedCapabilitiesChanges[$this->getBaseUrl()] = \array_merge(
			$this->savedCapabilitiesChanges[$this->getBaseUrl()],
			$savedCapabilitiesChanges
		);
	}

	/**
	 * @param string $app
	 * @param string $parameter
	 * @param string $value
	 *
	 * @return void
	 */
	protected function modifyAppConfig($app, $parameter, $value) {
		AppConfigHelper::modifyAppConfig(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$app,
			$parameter,
			$value,
			$this->ocsApiVersion
		);
	}

	/**
	 * @param array $appParameterValues
	 *
	 * @return void
	 */
	protected function modifyAppConfigs($appParameterValues) {
		AppConfigHelper::modifyAppConfigs(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$appParameterValues,
			$this->ocsApiVersion
		);
	}

	/**
	 * @param boolean $enabled if true, then enable the testing app
	 *                         otherwise disable the testing app
	 *
	 * @return void
	 */
	protected function setStatusTestingApp($enabled) {
		$this->theUserSendsToOcsApiEndpoint(
			($enabled ? 'post' : 'delete'), '/cloud/apps/testing'
		);
		$this->theHTTPStatusCodeShouldBe('200');
		if ($this->ocsApiVersion == 1) {
			$this->ocsContext->theOCSStatusCodeShouldBe('100');
		}

		$this->theUserSendsToOcsApiEndpoint('get', '/cloud/apps?filter=enabled');
		$this->theHTTPStatusCodeShouldBe('200');
		if ($enabled) {
			PHPUnit\Framework\Assert::assertContains(
				'testing',
				$this->response->getBody()->getContents()
			);
		} else {
			PHPUnit\Framework\Assert::assertNotContains(
				'testing',
				$this->response->getBody()->getContents()
			);
		}
	}

	/**
	 * Setup any app config state.
	 * This will be called before each scenario.
	 *
	 * @return void
	 */
	abstract protected function resetAppConfigs();

	/**
	 * @BeforeScenario
	 *
	 * @return void
	 */
	public function prepareParametersBeforeScenario() {
		$user = $this->currentUser;
		$this->currentUser = $this->getAdminUsername();
		$previousServer = $this->currentServer;
		foreach (['LOCAL','REMOTE'] as $server) {
			if (($server === 'LOCAL') || $this->federatedServerExists()) {
				$this->usingServer($server);
				$this->resetAppConfigs();
			}
		}
		$this->usingServer($previousServer);
		$this->currentUser = $user;
	}

	/**
	 * @AfterScenario
	 *
	 * @return void
	 */
	public function restoreParametersAfterScenario() {
		$this->deleteTokenAuthEnforcedAfterScenario();
		$user = $this->currentUser;
		$this->currentUser = $this->getAdminUsername();
		$previousServer = $this->currentServer;
		foreach (['LOCAL','REMOTE'] as $server) {
			if (($server === 'LOCAL') || $this->federatedServerExists()) {
				$this->usingServer($server);
				if (\key_exists($this->getBaseUrl(), $this->savedCapabilitiesChanges)) {
					$this->modifyAppConfigs($this->savedCapabilitiesChanges[$this->getBaseUrl()]);
				}
			}
		}
		$this->usingServer($previousServer);
		$this->currentUser = $user;
	}
}
