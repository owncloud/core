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

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;

require_once 'bootstrap.php';

/**
 * Capabilities context.
 */
class CapabilitiesContext implements Context {
	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * @Then the capabilities should contain
	 *
	 * @param TableNode|null $formData
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkCapabilitiesResponse(TableNode $formData):void {
		$capabilitiesXML = $this->featureContext->appConfigurationContext->getCapabilitiesXml(__METHOD__);
		$assertedSomething = false;

		$this->featureContext->verifyTableNodeColumns($formData, ['value', 'path_to_element', 'capability']);

		foreach ($formData->getHash() as $row) {
			$row['value'] = $this->featureContext->substituteInLineCodes($row['value']);
			Assert::assertEquals(
				$row['value'] === "EMPTY" ? '' : $row['value'],
				$this->featureContext->appConfigurationContext->getParameterValueFromXml(
					$capabilitiesXML,
					$row['capability'],
					$row['path_to_element']
				),
				"Failed field {$row['capability']} {$row['path_to_element']}"
			);
			$assertedSomething = true;
		}

		Assert::assertTrue(
			$assertedSomething,
			'there was nothing in the table of expected capabilities'
		);
	}

	/**
	 * @Then the version data in the response should contain
	 *
	 * @param TableNode|null $formData
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkVersionResponse(TableNode $formData):void {
		$versionXML = $this->featureContext->appConfigurationContext->getVersionXml(__METHOD__);
		$assertedSomething = false;

		$this->featureContext->verifyTableNodeColumns($formData, ['name', 'value']);

		foreach ($formData->getHash() as $row) {
			$row['value'] = $this->featureContext->substituteInLineCodes($row['value']);
			$actualValue = $versionXML->{$row['name']};

			Assert::assertEquals(
				$row['value'] === "EMPTY" ? '' : $row['value'],
				$actualValue,
				"Failed field {$row['name']}"
			);
			$assertedSomething = true;
		}

		Assert::assertTrue(
			$assertedSomething,
			'there was nothing in the table of expected version data'
		);
	}

	/**
	 * @Then the major-minor-micro version data in the response should match the version string
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkVersionMajorMinorMicroResponse():void {
		$versionXML = $this->featureContext->appConfigurationContext->getVersionXml(__METHOD__);
		$versionString = (string) $versionXML->string;
		// We expect that versionString will be in a format like "10.9.2 beta" or "10.9.2-alpha" or "10.9.2"
		$result = \preg_match('/^[0-9]+\.[0-9]+\.[0-9]+/', $versionString, $matches);
		Assert::assertSame(
			1,
			$result,
			__METHOD__ . " version string '$versionString' does not start with a semver version"
		);
		// semVerParts should have an array with the 3 semver components of the version, e.g. "1", "9" and "2".
		$semVerParts = \explode('.', $matches[0]);
		$expectedMajor = $semVerParts[0];
		$expectedMinor = $semVerParts[1];
		$expectedMicro = $semVerParts[2];
		$actualMajor = (string) $versionXML->major;
		$actualMinor = (string) $versionXML->minor;
		$actualMicro = (string) $versionXML->micro;
		Assert::assertSame(
			$expectedMajor,
			$actualMajor,
			__METHOD__ . "'major' data item does not match with major version in string '$versionString'"
		);
		Assert::assertSame(
			$expectedMinor,
			$actualMinor,
			__METHOD__ . "'minor' data item does not match with minor version in string '$versionString'"
		);
		Assert::assertSame(
			$expectedMicro,
			$actualMicro,
			__METHOD__ . "'micro' data item does not match with micro (patch) version in string '$versionString'"
		);
	}

	/**
	 * @Then the :pathToElement capability of files sharing app should be :value
	 *
	 * @param string $pathToElement
	 * @param string $value
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theCapabilityOfFilesSharingAppShouldBe(
		string $pathToElement,
		string $value
	):void {
		$this->featureContext->appConfigurationContext->userGetsCapabilitiesCheckResponse(
			$this->featureContext->getCurrentUser()
		);
		$capabilitiesXML = $this->featureContext->appConfigurationContext->getCapabilitiesXml(__METHOD__);
		$actualValue = $this->featureContext->appConfigurationContext->getParameterValueFromXml(
			$capabilitiesXML,
			"files_sharing",
			$pathToElement
		);
		Assert::assertEquals(
			$value === "EMPTY" ? '' : $value,
			$actualValue,
			"Expected {$pathToElement} capability of files sharing app to be {$value}, but got {$actualValue}"
		);
	}

	/**
	 * @Then the capabilities should not contain
	 *
	 * @param TableNode|null $formData
	 *
	 * @return void
	 */
	public function theCapabilitiesShouldNotContain(TableNode $formData):void {
		$capabilitiesXML = $this->featureContext->appConfigurationContext->getCapabilitiesXml(__METHOD__);
		$assertedSomething = false;

		foreach ($formData->getHash() as $row) {
			Assert::assertFalse(
				$this->featureContext->appConfigurationContext->parameterValueExistsInXml(
					$capabilitiesXML,
					$row['capability'],
					$row['path_to_element']
				),
				"Capability {$row['capability']} {$row['path_to_element']} exists but it should not exist"
			);
			$assertedSomething = true;
		}

		Assert::assertTrue(
			$assertedSomething,
			'there was nothing in the table of not expected capabilities'
		);
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
