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

use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use TestHelpers\AppConfigHelper;

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
	 * @var string the original capabilities in XML format
	 */
	private $savedCapabilitiesXml;
	
	/**
	 * @var array the changes made to capabilities for the test scenario
	 */
	private $savedCapabilitiesChanges = [];

	/**
	 * @param string $verb
	 * @param string $url
	 *
	 * @return void
	 */
	abstract public function sendingTo($verb, $url);

	/**
	 * @param string $verb
	 * @param string $url
	 * @param \Behat\Gherkin\Node\TableNode $body
	 *
	 * @return void
	 */
	abstract public function sendingToWith($verb, $url, $body);

	/**
	 * @param mixed $statusCode
	 *
	 * @return void
	 */
	abstract public function theOCSStatusCodeShouldBe($statusCode);

	/**
	 * @param mixed $statusCode
	 *
	 * @return void
	 */
	abstract public function theHTTPStatusCodeShouldBe($statusCode);

	/**
	 * @When /^the administrator sets parameter "([^"]*)" of app "([^"]*)" to "([^"]*)" using the API$/
	 *
	 * @param string $parameter
	 * @param string $app
	 * @param string $value
	 *
	 * @return void
	 */
	public function adminSetsServerParameterToUsingAPI($parameter, $app, $value) {
		$user = $this->currentUser;
		$this->currentUser = $this->getAdminUsername();

		$this->modifyServerConfig($app, $parameter, $value);

		$this->currentUser = $user;
	}

	/**
	 * @Given /^parameter "([^"]*)" of app "([^"]*)" has been set to "([^"]*)"$/
	 *
	 * @param string $parameter
	 * @param string $app
	 * @param string $value
	 *
	 * @return void
	 */
	public function serverParameterHasBeenSetTo($parameter, $app, $value) {
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
		$this->getCapabilitiesCheckResponse();

		PHPUnit_Framework_Assert::assertEquals(
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
	 * @When the user retrieves the capabilities using the API
	 *
	 * @return void
	 */
	public function getCapabilitiesCheckResponse() {
		$this->sendingTo('GET', '/cloud/capabilities');
		PHPUnit_Framework_Assert::assertEquals(
			200, $this->response->getStatusCode()
		);
	}

	/**
	 * @return string latest retrieved capabilities in XML format
	 */
	public function getCapabilitiesXml() {
		return $this->response->xml()->data->capabilities;
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
		$path_to_element = explode('@@@', $capabilitiesPath);
		$answeredValue = $xml->{$capabilitiesApp};

		for ($i = 0; $i < count($path_to_element); $i++) {
			$answeredValue = $answeredValue->{$path_to_element[$i]};
		}

		return (string)$answeredValue;
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
			$this->savedCapabilitiesXml,
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
			$this->baseUrlWithSlash(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$capabilitiesArray,
			$this->savedCapabilitiesXml
		);

		$this->savedCapabilitiesChanges = array_merge(
			$this->savedCapabilitiesChanges,
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
	protected function modifyServerConfig($app, $parameter, $value) {
		AppConfigHelper::modifyServerConfig(
			$this->baseUrlWithSlash(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$app,
			$parameter,
			$value,
			$this->apiVersion
		);
	}

	/**
	 * @param string $appParameterValues
	 *
	 * @return void
	 */
	protected function modifyServerConfigs($appParameterValues) {
		AppConfigHelper::modifyServerConfigs(
			$this->baseUrlWithSlash(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			$appParameterValues,
			$this->apiVersion
		);
	}

	/**
	 * @param boolean $enabled if true, then enable the testing app
	 *                         otherwise disable the testing app
	 *
	 * @return void
	 */
	protected function setStatusTestingApp($enabled) {
		$this->sendingTo(($enabled ? 'post' : 'delete'), '/cloud/apps/testing');
		$this->theHTTPStatusCodeShouldBe('200');
		if ($this->apiVersion == 1) {
			$this->theOCSStatusCodeShouldBe('100');
		}

		$this->sendingTo('get', '/cloud/apps?filter=enabled');
		$this->theHTTPStatusCodeShouldBe('200');
		if ($enabled) {
			PHPUnit_Framework_Assert::assertContains(
				'testing',
				$this->response->getBody()->getContents()
			);
		} else {
			PHPUnit_Framework_Assert::assertNotContains(
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
	 * @param BeforeScenarioScope $scope
	 * @return void
	 */
	public function prepareParametersBeforeScenario(BeforeScenarioScope $scope) {
		$user = $this->currentUser;
		$this->currentUser = $this->getAdminUsername();
		$this->resetAppConfigs();
		$this->currentUser = $user;
	}

	/**
	 * @AfterScenario
	 *
	 * @return void
	 */
	public function restoreParametersAfterScenario() {
		$user = $this->currentUser;
		$this->currentUser = $this->getAdminUsername();
		$this->modifyServerConfigs($this->savedCapabilitiesChanges);
		$this->currentUser = $user;
	}
}
