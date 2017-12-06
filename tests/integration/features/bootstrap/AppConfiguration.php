<?php
/**
 * ownCloud
 *
 * @author Joas Schilling <coding@schilljs.com>
 * @author Sergio Bertolin <sbertolin@owncloud.com>
 * @author Phillip Davis <phil@jankaritech.com>
 * @copyright 2017 ownCloud GmbH
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

require __DIR__ . '/../../../../lib/composer/autoload.php';

/**
 * AppConfiguration trait
 */
trait AppConfiguration {

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
	 * @return void
	 */
	abstract public function sendingTo($verb, $url);

	/**
	 * @param string $verb
	 * @param string $url
	 * @param \Behat\Gherkin\Node\TableNode $body
	 * @return void
	 */
	abstract public function sendingToWith($verb, $url, $body);

	/**
	 * @param mixed $statusCode
	 * @return void
	 */
	abstract public function theOCSStatusCodeShouldBe($statusCode);

	/**
	 * @param mixed $statusCode
	 * @return void
	 */
	abstract public function theHTTPStatusCodeShouldBe($statusCode);

	/**
	 * @Given /^parameter "([^"]*)" of app "([^"]*)" is set to "([^"]*)"$/
	 * @param string $parameter
	 * @param string $app
	 * @param string $value
	 * @return void
	 */
	public function serverParameterIsSetTo($parameter, $app, $value) {
		$user = $this->currentUser;
		$this->currentUser = 'admin';

		$this->modifyServerConfig($app, $parameter, $value);

		$this->currentUser = $user;
	}

	/**
	 * @Then the capabilities setting of :capabilitiesApp path :capabilitiesPath is :expectedValue
	 * @param string $capabilitiesApp the "app" name in the capabilities response
	 * @param string $capabilitiesPath the path to the element
	 * @param string $expectedValue
	 * @return void
	 */
	public function theCapabilitiesSettingOfAppParameterIs($capabilitiesApp, $capabilitiesPath, $expectedValue) {
		$this->getCapabilitiesCheckResponse();

		PHPUnit_Framework_Assert::assertEquals(
			$expectedValue,
			$this->getAppParameter($capabilitiesApp, $capabilitiesPath)
		);
	}

	/**
	 * @param string $capabilitiesApp the "app" name in the capabilities response
	 * @param string $capabilitiesPath the path to the element
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
	 * @When the capabilities are retrieved
	 * @return void
	 */
	public function getCapabilitiesCheckResponse() {
		$this->sendingTo('GET', '/cloud/capabilities');
		PHPUnit_Framework_Assert::assertEquals(200, $this->response->getStatusCode());
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
	 * @return string
	 */
	public function getParameterValueFromXml($xml, $capabilitiesApp, $capabilitiesPath) {
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
	 * @param string $capabilitiesApp the "app" name in the capabilities response
	 * @param string $capabilitiesParameter the parameter name in the
	 *                                      capabilities response
	 * @param string $testingApp the "app" name as understood by "testing"
	 * @param string $testingParameter the parameter name as understood by
	 *                                 "testing"
	 * @param boolean $testingState the on|off state the parameter must be set to for the test
	 * @return void
	 */
	public function setCapability(
		$capabilitiesApp, $capabilitiesParameter, $testingApp, $testingParameter, $testingState
	) {
		$savedCapabilitiesChanges = AppConfigHelper::setCapability(
			$this->baseUrlWithoutOCSAppendix(),
			$this->adminUser[0],
			$this->adminUser[1],
			$capabilitiesApp,
			$capabilitiesParameter,
			$testingApp,
			$testingParameter,
			$testingState,
			$this->savedCapabilitiesXml
		);
		
		if (sizeof($savedCapabilitiesChanges) > 0) {
			$this->savedCapabilitiesChanges[] = $savedCapabilitiesChanges;
		}
	}

	/**
	 * @param string $app
	 * @param string $parameter
	 * @param string $value
	 * @return void
	 */
	protected function modifyServerConfig($app, $parameter, $value) {
		AppConfigHelper::modifyServerConfig(
			$this->baseUrlWithoutOCSAppendix(),
			$this->adminUser[0],
			$this->adminUser[1],
			$app,
			$parameter,
			$value,
			$this->apiVersion
		);
	}

	/**
	 * @param boolean $enabled if true, then enable the testing app
	 *                         otherwise disable the testing app
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
	 * @return void
	 */
	public function prepareParametersBeforeScenario() {
		$user = $this->currentUser;
		$this->currentUser = 'admin';
		$this->resetAppConfigs();
		$this->currentUser = $user;
	}

	/**
	 * @AfterScenario
	 * @return void
	 */
	public function restoreParametersAfterScenario() {
		$user = $this->currentUser;
		$this->currentUser = 'admin';

		foreach ($this->savedCapabilitiesChanges as $capabilitiesChange) {
			$this->modifyServerConfig(
				$capabilitiesChange['testingApp'],
				$capabilitiesChange['testingParameter'],
				$capabilitiesChange['savedState'] ? 'yes' : 'no'
			);
		}

		$this->currentUser = $user;
	}
}
