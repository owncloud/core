<?php declare(strict_types=1);

/**
 * ownCloud
 *
 * @author Kiran Parajuli <kiran@jankaritech.com>
 * @copyright Copyright (c) 2023 Kiran Parajuli kiran@jankaritech.com
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
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use PHPUnit\Framework\Assert;
use TestHelpers\Asserts\AArray;

class AssertArrayContext implements Context {
	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

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
		if (AArray::isRegex($needle)) {
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
				: (string)$needle;

			foreach ($actualArray as $actualValue) {
				if ((string)$expectedSubstitutedValue === (string)$actualValue) {
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
		if (AArray::isRegex($expected)) {
			// if the value is a regex, then compare against the actual value
			// a value is a regex if it starts and ends with a slash
			// if a slash is needed in the regex, then it needs to be escaped
			Assert::assertTrue(
				(bool)\preg_match($expected, $actual),
				"Expected regex did not match while checking for key '" . $checkingForKey . "'." .
				"\n- Expected regex: '" . $expected . "'" .
				"\n+ Actual value: '" . $actual . "' (" . \gettype($actual) . ')'
			);
		} else {
			$expectedSubstitutedValue = \is_string($expected)
				? $this->featureContext->substituteInLineCodes($expected)
				: (string)$expected;

			Assert::assertEquals(
				$expectedSubstitutedValue,
				$actual,
				'Expected value was not found while' .
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
		$actualValues = AArray::getArrayValues($actualArray);
		$expectedValues = AArray::getArrayValues($expectedArray);

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
		$actualValues = AArray::getArrayValues($actualArray);
		$expectedValues = AArray::getArrayValues($expectedArray);

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
			AArray::assertTypeEquals($value, $actualArray[$key], $key);

			if (\is_array($value)) {
				if (\count($value) === 0) {
					Assert::assertEquals(
						0,
						\count($actualArray[$key]),
						"Expected an empty array for key '$key' but got a non-empty array." .
						"\n+ Actual array: '" . \json_encode($actualArray[$key], JSON_PRETTY_PRINT) . "'"
					);
				}
				if (AArray::isMultiDimensionalArray($actualArray[$key])) {
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
				"\n- Expected keys: [" . \implode(', ', \array_keys($expected)) . ']' .
				"\n+ Actual keys: [" . \implode(', ', \array_keys($actual)) . ']' .
				"+\n+ Actual array: " . \json_encode($actual, JSON_PRETTY_PRINT)
			);
			// if the types of expected and actual values are different, then the assertion fails right away
			AArray::assertTypeEquals($value, $actual[$key], $key);

			if (\is_array($value)) {
				AArray::isMultiDimensionalArray($value)
					// if the value is an array, we need to check it recursively
					? $this->assertArrayEquals($value, $actual[$key])
					: $this->assert1DArrayEquals($value, $actual[$key], $key);
			} else {
				$this->assertValueEqualsRegexOrSubstitution($value, $actual[$key], $key);
			}
		}
	}

	/**
	 * @Then the data of the response should match
	 *
	 * @param PyStringNode $schemaString
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theDataOfTheResponseShouldMatch(PyStringNode $schemaString): void {
		$responseXml = $this->featureContext->getResponseXml()->data;
		$actualResponseArray = AArray::simpleXMLElementToArray($responseXml);

		$expectedResponseArray = AArray::getArrayFromPyString($schemaString);

		$this->assertArrayEquals($expectedResponseArray, $actualResponseArray);
	}

	/**
	 * @Then the data of the response should contain
	 *
	 * @param PyStringNode $schemaString
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theResponseDataShouldContain(PyStringNode $schemaString): void {
		$responseXml = $this->featureContext->getResponseXml()->data;
		$actualResponseArray = AArray::simpleXMLElementToArray($responseXml);

		$expectedResponseArray = AArray::getArrayFromPyString($schemaString);

		$this->assertArrayContains($expectedResponseArray, $actualResponseArray);
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
	public function before(BeforeScenarioScope $scope): void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}