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
use PHPUnit\Framework\Assert;

require_once 'bootstrap.php';

/**
 * Capabilities context.
 */
class CapabilitiesContext implements Context {
	private FeatureContext $featureContext;

	/**
	 * @Then the major-minor-micro version data in the response should match the version string
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkVersionMajorMinorMicroResponse():void {
		$jsonResponse = $this->featureContext->getJsonDecodedResponseBodyContent();
		$versionData = $jsonResponse->ocs->data->version;
		$versionString = (string) $versionData->string;
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
		$actualMajor = (string) $versionData->major;
		$actualMinor = (string) $versionData->minor;
		$actualMicro = (string) $versionData->micro;
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
			"Expected $pathToElement capability of files sharing app to be $value, but got $actualValue"
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
