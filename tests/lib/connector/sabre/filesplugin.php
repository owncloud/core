<?php

namespace Tests\Connector\Sabre;

/**
 * Copyright (c) 2015 Vincent Petry <pvince81@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */
class FilesPlugin extends \Test\TestCase {
	/**
	 * @var \Sabre\DAV\Server
	 */
	private $server;

	/**
	 * @var \Sabre\DAV\ObjectTree
	 */
	private $tree;

	/**
	 * @var \OC_Connector_Sabre_FilesPlugin
	 */
	private $plugin;

	public function setUp() {
		parent::setUp();
		$this->server = new \Sabre\DAV\Server();
		$this->tree = $this->getMockBuilder('\Sabre\DAV\Tree')
			->disableOriginalConstructor()
			->getMock();
		$this->plugin = new \OC_Connector_Sabre_FilesPlugin($this->tree);
		$this->plugin->initialize($this->server);
	}

	private function createTestNode($class) {
		$node = $this->getMockBuilder($class)
			->disableOriginalConstructor()
			->getMock();
		$node->expects($this->any())
			->method('getId')
			->will($this->returnValue(123));

		$this->tree->expects($this->any())
			->method('getNodeForPath')
			->with('/dummypath')
			->will($this->returnValue($node));

		$node->expects($this->any())
			->method('getFileId')
			->will($this->returnValue(123));
		$node->expects($this->any())
			->method('getEtag')
			->will($this->returnValue('"abc"'));
		$node->expects($this->any())
			->method('getDavPermissions')
			->will($this->returnValue('R'));

		return $node;
	}

	/**
	 * @dataProvider providesETagTestData
	 * @param $expectedETag
	 * @param $isChunked
	 * @param $isChunkComplete
	 */
	public function testETag($expectedETag, $isChunked, $isChunkComplete) {
		if (!is_null($isChunked)) {
			$_SERVER['HTTP_OC_CHUNKED'] = $isChunked;
		}
		if (!is_null($isChunkComplete)) {
			$_SERVER['X-CHUNKING_COMPLETE'] = $isChunkComplete;
		}
		$node = $this->createTestNode('\OC_Connector_Sabre_File');

		$etag = $this->plugin->getETag($node);

		$this->assertEquals($expectedETag, $etag);
	}

	public function providesETagTestData() {
		return [
			// non-chunked tests
			['"abc"', null, null],
			['"abc"', null, false],

			// chunked tests
			[null, true, null],
			['"abc"', true, true],
		];
	}
}
