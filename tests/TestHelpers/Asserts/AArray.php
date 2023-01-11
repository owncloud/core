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

namespace TestHelpers\Asserts;

use Behat\Gherkin\Node\PyStringNode;
use PHPUnit\Framework\Assert;
use SimpleXMLElement;

/**
 * WebDAV related asserts
 */
class AArray {
	/**
	 * Converts a XML response into an array
	 *
	 * @param SimpleXMLElement $xml
	 *
	 * @return array
	 */
	public static function simpleXMLElementToArray(SimpleXMLElement $xml): array {
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
	public static function getArrayFromPyString(PyStringNode $schemaString): array {
		$schemaRawString = $schemaString->getRaw();
		$schema = json_decode($schemaRawString, true);
		if ($schema === null && json_last_error() !== JSON_ERROR_NONE) {
			throw new Exception(
				'Error: Provided JSON data is invalid.' .
				"\nMessage: '" . json_last_error_msg() . "'"
			);
		}
		return (array)$schema;
	}

	/**
	 * Determines if the given array is multidimensional or not
	 *
	 * @param array $arrayToCheck
	 *
	 * @return bool
	 */
	public static function isMultiDimensionalArray(array $arrayToCheck): bool {
		if (\count($arrayToCheck) === 0) {
			return false;
		}
		// The XML converted array can have only values but may be faked as multidimensional
		// by having a single key named 'element' with the value being an array or a string
		// This function checks if the array has only one key named 'element'
		// if 'element' is as the array key, then it is not a multidimensional array
		$keys = \array_keys($arrayToCheck);
		if ($keys === ['element']) {
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
	 *        [element] => Array(
	 *            [0] => shareExpiration,
	 *            [1] => passwordProtected
	 *        )
	 * )
	 *
	 * or like: Array(
	 *        [0] => shareExpiration
	 * )
	 *
	 * If element is the only key in the array, then we need to get the value of that key
	 * and return it.
	 *
	 * @param array $arr the array to grab the value from
	 *
	 * @return array array of values of the provided array
	 */
	public static function getArrayValues(array $arr): array {
		if (\array_keys($arr) === ['element']) {
			$values = \is_array($arr['element'])
				? $arr['element']
				: [$arr['element']];
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
	public static function isRegex($needle): bool {
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
	public static function assertTypeEquals($expectedValue, $actualValue, $checkingForKey) {
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
}