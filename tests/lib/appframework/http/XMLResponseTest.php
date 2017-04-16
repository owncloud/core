<?php

/**
 * ownCloud - App Framework
 *
 * @author Bernhard Posselt
 * @author Morris Jobke
 * @author Patrick Paysant
 * @copyright 2012 Bernhard Posselt <dev@bernhard-posselt.com>
 * @copyright 2013 Morris Jobke <morris.jobke@gmail.com>
 * @copyright 2014 Patrick Paysant <ppa.work@gmail.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */


namespace OC\AppFramework\Http;


use OCP\AppFramework\Http\XMLResponse;
use OCP\AppFramework\Http;

class XMLResponseTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @var XMLResponse
	 */
	private $xml;

	protected function setUp() {
		$this->xml = new XMLResponse();
	}


	public function testHeader() {
		$headers = $this->xml->getHeaders();
		$this->assertEquals('text/xml; charset=utf-8', $headers['Content-type']);
	}


	public function testSetData() {
		$params = array('hi', 'yo');
		$this->xml->setData($params);

		$this->assertEquals(array('hi', 'yo'), $this->xml->getData());
	}

	public function testRootTagName() {
		$response = new XMLResponse(array(), 200, 'foobar');

		$expected = '<?xml version ="1.0"?><foobar></foobar>';

		$this->assertXmlStringEqualsXmlString($expected, $response->render());
	}

	public function testInvalidRootTagName() {
		$response = new XMLResponse(array(), 200, '000');

		$expected = '<?xml version ="1.0"?><root></root>';

		$this->assertXmlStringEqualsXmlString($expected, $response->render());
	}

	public function testRender() {
		$params = array('test' => 'hi');
		$this->xml->setData($params);

		$expected = '<?xml version ="1.0"?><root><test>hi</test></root>';

		$this->assertXmlStringEqualsXmlString($expected, $this->xml->render());
	}

	public function testConstructorAllowsToSetData() {
		$data = array('hi');
		$code = 300;
		$response = new XMLResponse($data, $code);

		$expected = '<?xml version ="1.0"?><root><item0>hi</item0></root>';
		$this->assertXmlStringEqualsXmlString($expected, $response->render());
		$this->assertEquals($code, $response->getStatus());
	}

	public function testChainability() {
		$params = array('hi', 'yo');
		$this->xml->setData($params)
			->setStatus(Http::STATUS_NOT_FOUND);

		$this->assertEquals(Http::STATUS_NOT_FOUND, $this->xml->getStatus());
		$this->assertEquals(array('hi', 'yo'), $this->xml->getData());
	}

}
