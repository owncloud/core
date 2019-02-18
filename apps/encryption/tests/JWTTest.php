<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\Encryption\Tests;

use OCA\Encryption\JWT;
use Test\TestCase;

class JWTTest extends TestCase {
	/** @var JWT | \PHPUnit_Framework_MockObject_MockObject */
	private $jwt;

	public function setUp() {
		parent::setUp();
		$this->jwt = new JWT();
	}

	public function testBase64UrlEncode() {
		$expectedResult = "Zm9v";
		$result = $this->jwt->base64UrlEncode('foo');
		$this->assertEquals($expectedResult, $result);
	}

	public function testHeader() {
		$expectedResult = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9";
		$result = $this->jwt->header();
		$this->assertEquals($expectedResult, $result);
	}

	public function testPayload() {
		$this->jwt->payload(['foo' => 'bar']);
		$this->assertTrue(true);
	}

	public function testSignature() {
		$expected = 'kFaZPruDYO6RIqibVuF8UqWucdn_Ig0PoCZ8Sq2r_X8';
		$result = $this->jwt->signature('foo', 'abcd');
		$this->assertEquals($expected, $result);
	}

	public function testToken() {
		$this->jwt->token(['foo' => 'bar'], 'secret');
		$this->assertTrue(true);
	}
}
