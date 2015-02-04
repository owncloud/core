<?php
/**
  * Copyright (c) 2015 Roeland Jago Douma <roeland@famdouma.nl>
  * This file is licensed under the Affero General Public License version 3 or
  * later.
  * See the COPYING-README file.
  */

use OCA\Files;

/**
 * Class Test_Files_Capabilties
 */
class Test_Files_Capabilities extends \PHPUnit_Framework_TestCase {

	/**
	 * Test for the general part in each return statement and assert
	 */
	function getFilesPart($data) {
		$this->assertArrayHasKey('capabilities', $data);
		$this->assertArrayHasKey('files', $data['capabilities']);
		return $data['capabilities']['files'];
	}

	/**
	 * Create a mock config object and insert the values in $map tot the getSystemValue
	 * function. Then obtain the capabilities and extract the first few
	 * levels in the array
	 */
	function getResults($map) {
		$stub = $this->getMockBuilder('\OCP\IConfig')->disableOriginalConstructor()->getMock();
		$stub->method('getSystemValue')->will($this->returnValueMap($map));
		$cap = new \OCA\Files\Capabilities($stub);
		$result = $this->getFilesPart($cap->getCaps()->getData());
		return $result;
	}

	/**
	 * @covers OCA\Files\Capabilities::getCaps
	 */
	public function testCapabilities() {
		/*
		 * Test for thumbnails
		 */
		$map = array(
			array('enable_previews', true, true)
		);
		$result = $this->getResults($map);
		$this->assertArrayHasKey('thumbnails', $result);

		/*
		 * Test for no thumbnails
		 */
		$map = array(
			array('enable_previews', true, false)
		);
		$result = $this->getResults($map);
		$this->assertArrayNotHasKey('thumbnails', $result);
	}
}
