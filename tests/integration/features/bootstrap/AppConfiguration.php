<?php

use Psr\Http\Message\ResponseInterface;

require __DIR__ . '/../../../../lib/composer/autoload.php';

trait AppConfiguration {
	/** @var string */
	private $currentUser = '';

	/** @var ResponseInterface */
	private $response = null;

	/** @var string the original capabilities in XML format */
	private $savedCapabilitiesXml;

	abstract public function sendingTo($verb, $url);
	abstract public function sendingToWith($verb, $url, $body);
	abstract public function theOCSStatusCodeShouldBe($statusCode);
	abstract public function theHTTPStatusCodeShouldBe($statusCode);

	/**
	 * @Given /^parameter "([^"]*)" of app "([^"]*)" is set to "([^"]*)"$/
	 * @param string $parameter
	 * @param string $app
	 * @param string $value
	 */
	public function serverParameterIsSetTo($parameter, $app, $value) {
		$user = $this->currentUser;
		$this->currentUser = 'admin';

		$this->modifyServerConfig($app, $parameter, $value);

		$this->currentUser = $user;
	}

	/**
	 * @Then the capabilities setting of :capabilitiesApp path :capabilitiesPath is :expectedValue
	 * @param string $capabilitiesApp the name of the "app" in the capabilities response
	 * @param string $capabilitiesPath the path to the element
	 * @param string $expectedValue
	 */
	public function theCapabilitiesSettingOfAppParameterIs(
		$capabilitiesApp,
		$capabilitiesPath,
		$expectedValue
	) {
		$this->getCapabilitiesCheckResponse();

		PHPUnit_Framework_Assert::assertEquals(
			$expectedValue,
			$this->getAppParameter($capabilitiesApp, $capabilitiesPath)
		);
	}

	/**
	 * @param string $capabilitiesApp the name of the "app" in the capabilities response
	 * @param string $capabilitiesPath the path to the element
	 * @return string
	 */
	public function getAppParameter(
		$capabilitiesApp,
		$capabilitiesPath
	) {
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

		PHPUnit_Framework_Assert::assertEquals(
			200,
			$this->response->getStatusCode()
		);
	}

	/**
	 * @return string latest retrieved capabilities in XML format
	 */
	public function getCapabilitiesXml() {
		return $this->getResponseXml()->data->capabilities;
	}

	/**
	 * @param string $xml of the capabilities
	 * @param string $capabilitiesApp the name of the "app" in the capabilities response
	 * @param string $capabilitiesPath the path to the element
	 * @return string
	 */
	public function getParameterValueFromXml(
		$xml,
		$capabilitiesApp,
		$capabilitiesPath
	) {
		$path_to_element = explode('@@@', $capabilitiesPath);
		$answeredValue = $xml->{$capabilitiesApp};

		for ($i = 0; $i < count($path_to_element); $i++) {
			$answeredValue = $answeredValue->{$path_to_element[$i]};
		}

		return (string)$answeredValue;
	}

	/**
	 * @param string $capabilitiesApp the name of the "app" in the capabilities response
	 * @param string $capabilitiesParameter the name of the parameter in the capabilities response
	 * @param string $testingApp the name of the "app" as understood by "testing"
	 * @param string $testingParameter the name of the parameter as understood by "testing"
	 * @return void
	 */
	public function resetCapability($capabilitiesApp, $capabilitiesParameter, $testingApp, $testingParameter) {
		$savedValue = $this->getParameterValueFromXml(
			$this->savedCapabilitiesXml,
			$capabilitiesApp,
			$capabilitiesParameter);

		$this->modifyServerConfig(
			$testingApp,
			$testingParameter,
			$savedValue ? 'yes' : 'no');
	}

	/**
	 * @param string $app
	 * @param string $parameter
	 * @param string $value
	 */
	protected function modifyServerConfig($app, $parameter, $value) {
		$body = new \Behat\Gherkin\Node\TableNode([['value', $value]]);
		$this->sendingToWith('post', "/apps/testing/api/v1/app/{$app}/{$parameter}", $body);
		$this->theHTTPStatusCodeShouldBe('200');
		if ($this->apiVersion == 1) {
			$this->theOCSStatusCodeShouldBe('100');
		}
	}

	protected function setStatusTestingApp($enabled) {
		$this->sendingTo(($enabled ? 'post' : 'delete'), '/cloud/apps/testing');
		$this->theHTTPStatusCodeShouldBe('200');
		if ($this->apiVersion == 1) {
			$this->theOCSStatusCodeShouldBe('100');
		}

		$this->sendingTo('get', '/cloud/apps?filter=enabled');
		$this->theHTTPStatusCodeShouldBe('200');
		if ($enabled) {
			PHPUnit_Framework_Assert::assertContains('testing', $this->response->getBody()->getContents());
		} else {
			PHPUnit_Framework_Assert::assertNotContains('testing', $this->response->getBody()->getContents());
		}
	}

	abstract protected function setupAppConfigs();

	abstract protected function restoreAppConfigs();

	/**
	 * @BeforeScenario
	 */
	public function prepareParametersBeforeScenario() {
		$user = $this->currentUser;
		$this->currentUser = 'admin';
		$this->setupAppConfigs();
		$this->currentUser = $user;
	}

	/**
	 * @AfterScenario
	 */
	public function restoreParametersAfterScenario() {
		$user = $this->currentUser;
		$this->currentUser = 'admin';
		$this->restoreAppConfigs();
		$this->currentUser = $user;
	}
}
