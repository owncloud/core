<?php
/**
 * Copyright (c) 2013 Andreas Fischer <bantu@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

class Test_HTTPHelper extends PHPUnit_Framework_TestCase {
	protected $httpHelper;

	function setUp() {
		$this->httpHelper = new OC\HTTPHelper();
	}

	function getTestData() {
		$testArray = array(
			'HTTP/1.1 200 OK',
			'Date: Wed, 23 Oct 2013 14:28:38 GMT',
			'Server: Apache/2.2.21 (FreeBSD) mod_ssl/2.2.21 OpenSSL/0.9.8q PHP/5.4.16-dev',
			'Last-Modified: Mon, 16 Sep 2013 01:00:13 GMT',
			'ETag: "12345-678-1231231231233"',
			'Accept-Ranges: bytes',
			'Content-Length: 1406',
			'Vary: User-Agent',
			'Connection: close',
			'Content-Type: image/png',
		);

		return array(
			array($testArray, '', 'HTTP/1.1 200 OK'),
			array($testArray, 'Content-Length', '1406'),
			array($testArray, 'Content-Type', 'image/png'),
		);
	}

	/**
	 * @dataProvider getTestData
	 */
	function testGetHeaderFromArray($array, $key, $expected) {
		$this->assertSame($expected, $this->httpHelper->getHeaderFromArray($array, $key));
	}

	/**
	 * @dataProvider getTestData
	 */
	function testGetHeaderFromString($array, $key, $expected) {
		$this->assertSame($expected, $this->httpHelper->getHeaderFromString(implode("\r\n", $array), $key));
	}
}
