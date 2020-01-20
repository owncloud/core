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
	 */
	public function checkCapabilitiesResponse(TableNode $formData) {
		$capabilitiesXML = $this->featureContext->appConfigurationContext->getCapabilitiesXml();
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
	 * @Then the :pathToElement capability of files sharing app should be :value
	 *
	 * @param string $pathToElement
	 * @param string $value
	 *
	 * @return void
	 */
	public function theCapabilityOfFilesSharingAppShouldBe(
		$pathToElement, $value
	) {
		$this->featureContext->appConfigurationContext->userGetsCapabilitiesCheckResponse(
			$this->featureContext->getCurrentUser()
		);
		$capabilitiesXML = $this->featureContext->appConfigurationContext->getCapabilitiesXml();
		Assert::assertEquals(
			$value === "EMPTY" ? '' : $value,
			$this->featureContext->appConfigurationContext->getParameterValueFromXml(
				$capabilitiesXML,
				"files_sharing",
				$pathToElement
			)
		);
	}

	/**
	 * @Then the capabilities should not contain
	 *
	 * @param TableNode|null $formData
	 *
	 * @return void
	 */
	public function theCapabilitiesShouldNotContain(TableNode $formData) {
		$capabilitiesXML = $this->featureContext->appConfigurationContext->getCapabilitiesXml();
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
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
