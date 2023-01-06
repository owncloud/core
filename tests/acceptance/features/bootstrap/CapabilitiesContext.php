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
use Behat\Gherkin\Node\PyStringNode;

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
	 * Converts a XML response into an array
	 *
	 * @param SimpleXMLElement $xml
	 *
	 * @return array
	 */
	public function simpleXMLElementToArray(SimpleXMLElement $xml): array {
		$json = json_encode($xml);
		return (array)json_decode($json, true);
	}

	/**
	 * Converts a PyString (expected to be a valid json) to an array
	 *
	 * @param PyStringNode $schemaString
	 *
	 * @return array
	 * @throws Exception
	 */
	public function getArrayFromPyString(PyStringNode $schemaString): array {
		$schemaRawString = $schemaString->getRaw();
		$schema = json_decode($schemaRawString, true);
		if ($schema === null && json_last_error() !== JSON_ERROR_NONE) {
			throw new Exception(
				"Error: Provided JSON data is invalid." .
				"\nMessage: '" . json_last_error_msg() . "'"
			);
		}
		return (array) $schema;
	}
	/**
	 * Determines if the given array is multidimensional or not
	 *
	 * @param array $arrayToCheck
	 *
	 * @return bool
	 */
	public function isMultiDimensionalArray(array $arrayToCheck): bool {
		if (\count($arrayToCheck) === 0) {
			return false;
		}
		// The XML converted array can have only values but may be faked as multidimensional
		// by having a single key named 'element' with the value being an array or a string
		// This function checks if the array has only one key named 'element'
		// if 'element' is as the array key, then it is not a multidimensional array
		$keys = \array_keys($arrayToCheck);
		if ($keys === ["element"]) {
			return false;
		}

		$values = \array_values($arrayToCheck);

		// rsort will sort the array in descending order
		// if any values in the array are arrays, then the first element will be an array
		// if the first element is an array, then it is a multidimensional array
		\rsort($values);
		return \is_array($values[0]);
	}

	/**
	 * Array converted from XML can have a different structure.
	 *
	 * For eg. a 1D array can be like: Array(
	 * 		[element] => Array(
	 * 			[0] => shareExpiration,
	 * 			[1] => passwordProtected
	 * 		)
	 * )
	 *
	 * or like: Array(
	 * 		[0] => shareExpiration
	 * )
	 *
	 * If element is the only key in the array, then we need to get the value of that key
	 * and return it.
	 *
	 * @param array $arr the array to grab the value from
	 *
	 * @return array array of values of the provided array
	 */
	public function getArrayValues(array $arr): array {
		$values = [];
		if (\array_keys($arr) === ["element"]) {
			if (\is_array($arr["element"])) {
				$values = $arr["element"];
			} else {
				$values = [$arr["element"]];
			}
		} else {
			$values = \array_values($arr);
		}
		\sort($values);
		return $values;
	}

	/**
	 * Determines if the given string is a regex or not
	 *
	 * @param int|string|bool $needle the string to check
	 *
	 * @return bool true if the string is a regex, false otherwise
	 */
	public function isRegex($needle): bool {
		if (!\is_string($needle)) {
			return false;
		}
		return (\preg_match('/^\/.*\/$/', $needle) === 1);
	}

	/**
	 * @param $expectedValue
	 * @param $actualValue
	 * @param $checkingForKey
	 *
	 * @return void
	 */
	public function assertTypeEquals($expectedValue, $actualValue, $checkingForKey) {
		$expectedType = \gettype($expectedValue);
		$actualType = \gettype($actualValue);

		// while parsing XML to JSON, using the json_encode function,
		// the number values are converted to string
		if (\in_array($expectedType, ['integer', 'double']) && $actualType === 'string') {
			return;
		}

		Assert::assertEquals(
			$expectedType,
			$actualType,
			"The type of the value for key '$checkingForKey' was not the expected type." .
			"\n- Expected type: '" . $expectedType . "'" .
			"\n+ Actual type: '" . $actualType . "'"
		);
	}

	/**
	 * @param string|int $needle expected value to compare
	 *                           can be regex or inline code or normal string
	 * @param array $actualArray actual value to compare against
	 * @param string $checkingForKey the key that is being checked
	 *
	 * @return void
	 * @throws Exception
	 */
	public function assertArrayContainsRegexOrSubstitution($needle, array $actualArray, string $checkingForKey) {
		$match = false;
		if ($this->isRegex($needle)) {
			// if the value is a regex, then compare against the actual value
			// a value is a regex if it starts and ends with a slash
			// if a slash is needed in the regex, then it needs to be escaped
			foreach ($actualArray as $actualValue) {
				if (\preg_match($needle, $actualValue) === 1) {
					$match = true;
					break;
				}
			}
			Assert::assertTrue(
				$match,
				"Expected regex did not match any actual values while checking for key '" . $checkingForKey . "'." .
				"\n- Expected regex: '" . $needle . "'\n" .
				"\n+ Actual array: '" . \json_encode($actualArray) . "'"
			);
		} else {
			$expectedSubstitutedValue = \is_string($needle)
				? $this->featureContext->substituteInLineCodes($needle)
				: (string) $needle;

			foreach ($actualArray as $actualValue) {
				if ((string)$expectedSubstitutedValue === (string) $actualValue) {
					$match = true;
					break;
				}
			}
			Assert::assertTrue(
				$match,
				"Expected value was not found while checking for key '" . $checkingForKey . "'." .
				"\n- Expected value: '" . $needle . "'" .
				"\n- Substituted value: '" . $expectedSubstitutedValue . "'" .
				"\n+ Actual array: '" . \json_encode($actualArray) . "'"
			);
		}
	}

	/**
	 * Checks if the given string is a regex or not
	 * If it is a regex, then it compares the actual value against the regex
	 * If it is not a regex, then it compares the actual value against the expected value
	 *
	 * @param string|int|bool $expected expected value to compare
	 * @param string $actual actual value to compare against
	 * @param string $checkingForKey the key that is being checked
	 *
	 * @return void
	 */
	public function assertValueEqualsRegexOrSubstitution($expected, string $actual, string $checkingForKey) {
		if ($this->isRegex($expected)) {
			// if the value is a regex, then compare against the actual value
			// a value is a regex if it starts and ends with a slash
			// if a slash is needed in the regex, then it needs to be escaped
			Assert::assertTrue(
				(bool)\preg_match($expected, $actual),
				"Expected regex did not match while checking for key '" . $checkingForKey . "'." .
				"\n- Expected regex: '" . $expected . "'" .
				"\n+ Actual value: '" . $actual . "' (" . \gettype($actual) . ")"
			);
		} else {
			$expectedSubstitutedValue = \is_string($expected)
				? $this->featureContext->substituteInLineCodes($expected)
				: (string) $expected;

			Assert::assertEquals(
				$expectedSubstitutedValue,
				$actual,
				"Expected value was not found while" .
				" checking for key '" . $checkingForKey . "' ." .
				"\n- Expected value: '" . $expected . "'" .
				"\n- Substituted value: '" . $expectedSubstitutedValue . "'" .
				"\n+ Actual value: '" . $actual . "'"
			);
		}
	}

	/**
	 * Checks if the values of the expected array are in the actual array
	 *
	 * @param array $expectedArray the expected array to check
	 * @param array $actualArray the actual array to check against
	 * @param string $checkingForKey the key that is being checked
	 *
	 * @return void
	 * @throws Exception
	 */
	public function assert1DArrayContains(array $expectedArray, array $actualArray, string $checkingForKey) {
		$actualValues = $this->getArrayValues($actualArray);
		$expectedValues = $this->getArrayValues($expectedArray);

		foreach ($expectedValues as $expectedValue) {
			$this->assertArrayContainsRegexOrSubstitution($expectedValue, $actualValues, $checkingForKey);
		}
	}

	/**
	 * Checks if the values of the values expected array the actual array are equal
	 *
	 * @param array $expectedArray
	 * @param array $actualArray
	 * @param string $checkingForKey
	 *
	 * @return void
	 * @throws Exception
	 */
	public function assert1DArrayEquals(array $expectedArray, array $actualArray, string $checkingForKey) {
		$actualValues = $this->getArrayValues($actualArray);
		$expectedValues = $this->getArrayValues($expectedArray);

		Assert::assertEquals(
			\count($expectedValues),
			\count($actualValues),
			"Expected array count does not match actual array count while checking for key '" . $checkingForKey . "'." .
			"\n- Expected array count: '" . \count($expectedValues) . "'" .
			"\n+ Actual array count: '" . \count($actualValues) . "'"
		);

		foreach ($expectedValues as $key => $expectedValue) {
			$this->assertValueEqualsRegexOrSubstitution($expectedValue, $actualValues[$key], $checkingForKey);
		}
	}

	/**
	 * Checks if the actual array contains the expected array
	 *
	 * @param array $expectedArray array to compare
	 * @param array $actualArray array to compare against
	 *
	 * @return void
	 * @throws Exception
	 */
	public function assertArrayContains(array $expectedArray, array $actualArray) {
		foreach ($expectedArray as $key => $value) {
			// if the types of expected and actual values are different, then the assertion fails right away
			$this->assertTypeEquals($value, $actualArray[$key], $key);

			if (\is_array($value)) {
				if (\count($value) === 0) {
					Assert::assertEquals(
						0,
						\count($actualArray[$key]),
						"Expected an empty array for key '$key' but got a non-empty array." .
						"\n+ Actual array: '" . \json_encode($actualArray[$key], JSON_PRETTY_PRINT) . "'"
					);
				}
				if ($this->isMultiDimensionalArray($actualArray[$key])) {
					// if the value is a multidimensional array then, all of the
					// expected keys must be present in the actual array keys
					Assert::assertEquals(
						\array_diff(\array_keys($expectedArray), \array_keys($actualArray)),
						[],
						'The expected keys were not found in the actual array.' .
						"\n- Found keys: " . \implode(', ', \array_keys($actualArray)) .
						"\n+ Expected keys: " . \implode(', ', \array_keys($expectedArray))
					);
					$this->assertArrayContains($value, $actualArray[$key]);
				} else {
					$this->assert1DArrayContains($value, $actualArray[$key], $key);
				}
			} else {
				if (\is_array($actualArray[$key])) {
					$this->assertArrayContainsRegexOrSubstitution($value, $actualArray[$key], $key);
				} else {
					$this->assertValueEqualsRegexOrSubstitution($value, $actualArray[$key], $key);
				}
			}
		}
	}

	/**
	 * Checks if the actual array equals the expected array
	 *
	 * @param array $expected array to compare
	 * @param array $actual array to compare against
	 *
	 * @return void
	 * @throws Exception
	 */
	public function assertArrayEquals(array $expected, array $actual) {
		foreach ($expected as $key => $value) {
			// the actual array must have the same key as the expected array
			Assert::assertArrayHasKey(
				$key,
				$actual,
				"The key '$key' was not found in the actual array." .
				"\n- Expected keys: [" . \implode(', ', \array_keys($expected)) . "]" .
				"\n+ Actual keys: [" . \implode(', ', \array_keys($actual)) . "]" .
				"+\n+ Actual array: " . \json_encode($actual, JSON_PRETTY_PRINT)
			);
			// if the types of expected and actual values are different, then the assertion fails right away
			$this->assertTypeEquals($value, $actual[$key], $key);

			if (\is_array($value)) {
				if ($this->isMultiDimensionalArray($value)) {
					// if the value is an array, we need to check it recursively
					$this->assertArrayEquals($value, $actual[$key]);
				} else {
					$this->assert1DArrayEquals($value, $actual[$key], $key);
				}
			} else {
				$this->assertValueEqualsRegexOrSubstitution($value, $actual[$key], $key);
			}
		}
	}

	/**
	 * @Then the data of the response data should match
	 *
	 * @param PyStringNode $schemaString
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theDataOfTheResponseShouldMatch(PyStringNode $schemaString): void {
		$responseXml = $this->featureContext->getResponseXml()->data;
		$actualResponseArray = $this->simpleXMLElementToArray($responseXml);

		$expectedResponseArray = $this->getArrayFromPyString($schemaString);

		$this->assertArrayEquals($expectedResponseArray, $actualResponseArray);
	}

	/**
	 * @Then the data of the response data should contain
	 *
	 * @param PyStringNode $schemaString
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theResponseDataShouldContain(PyStringNode $schemaString): void {
		$responseXml = $this->featureContext->getResponseXml()->data;
		$actualResponseArray = $this->simpleXMLElementToArray($responseXml);

		$expectedResponseArray = $this->getArrayFromPyString($schemaString);

		$this->assertArrayContains($expectedResponseArray, $actualResponseArray);
	}

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
			$expectedValue = $row['value'] === 'EMPTY' ? '' : $row['value'];
			$actualValue = $this->featureContext->appConfigurationContext->getParameterValueFromXml(
				$capabilitiesXML,
				$row['capability'],
				$row['path_to_element']
			);
			Assert::assertEquals(
				$expectedValue,
				$actualValue,
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
