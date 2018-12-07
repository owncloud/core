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
}
