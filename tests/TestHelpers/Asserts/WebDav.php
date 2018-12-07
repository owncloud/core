<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2018 Artur Neumann artur@jankaritech.com
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

use PHPUnit_Framework_Assert;
use Behat\Gherkin\Node\TableNode;
use \Sabre\HTTP\ResponseInterface as SabreResponseInterface;

/**
 * WebDAV related asserts
 */
class WebDav {
	/**
	 *
	 * @param string $element exception|message|reason
	 * @param string $expectedValue
	 * @param array $responseXml
	 *
	 * @return void
	 * @throws \Exception
	 */
	public static function assertDavResponseElementIs(
		$element, $expectedValue, $responseXml
	) {
		PHPUnit_Framework_Assert::assertArrayHasKey(
			'value', $responseXml, '$responseXml seems not to be a valid array'
		);
		if ($element === "exception") {
			$result = $responseXml['value'][0]['value'];
		} elseif ($element === "message") {
			$result = $responseXml['value'][1]['value'];
		} elseif ($element === "reason") {
			$result = $responseXml['value'][3]['value'];
		}
		
		PHPUnit_Framework_Assert::assertEquals(
			$expectedValue, $result,
			"Expected '$expectedValue' in element $element got '$result'"
		);
	}

	/**
	 *
	 * @param SabreResponseInterface $response
	 * @param TableNode $expectedShareTypes
	 *
	 * @return bool
	 *
	 * @throws \Exception
	 */
	public static function assertSabreResponseContainsShareTypes(
		$response, $expectedShareTypes
	) {
		if (!\array_key_exists('{http://owncloud.org/ns}share-types', $response)) {
			throw new \Exception(
				"Cannot find property \"{http://owncloud.org/ns}share-types\""
			);
		}

		$foundTypes = [];
		$data = $response['{http://owncloud.org/ns}share-types'];
		foreach ($data as $item) {
			if ($item['name'] !== '{http://owncloud.org/ns}share-type') {
				throw new \Exception(
					"Invalid property found: '{$item['name']}'"
				);
			}

			$foundTypes[] = $item['value'];
		}
		foreach ($expectedShareTypes->getRows() as $row) {
			$key = \array_search($row[0], $foundTypes);
			if ($key === false) {
				throw new \Exception("Expected type {$row[0]} not found");
			}

			unset($foundTypes[$key]);
		}

		if ($foundTypes !== []) {
			throw new \Exception(
				"Found more share types than specified: $foundTypes"
			);
		}
		return true;
	}
}
