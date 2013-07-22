<?php
/**
 * Unit Tests
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @version 1.0.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\Tests;

require_once('StubConnection.php');

class VolumeServiceTest extends \PHPUnit_Framework_TestCase
{
	private
		$conn, 		// connection
		$service;	// volume service

	public function __construct() {
		$this->conn = new StubConnection('http://example.com', 'SECRET');
		$this->service = new \OpenCloud\Volume\Service(
			$this->conn,
			'cloudBlockStorage',
			'DFW',
			'publicURL'
		);
	}
	/**
	 * Tests
	 */
	public function test__construct() {
		$this->service = new \OpenCloud\Volume\Service(
			$this->conn,
			'cloudBlockStorage',
			'DFW',
			'publicURL'
		);
		$this->assertEquals(
			'OpenCloud\Volume\Service',
			get_class($this->service));
	}
	public function testVolume() {
		$this->assertEquals(
			'OpenCloud\Volume\Volume',
			get_class($this->service->Volume()));
	}
	public function testVolumeList() {
		$this->assertEquals(
			'OpenCloud\Common\Collection',
			get_class($this->service->VolumeList()));
	}
	public function testVolumeType() {
		$this->assertEquals(
			'OpenCloud\Volume\VolumeType',
			get_class($this->service->VolumeType()));
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\CollectionError
	 */
	public function testVolumeTypeList() {
		$this->assertEquals(
			'',
			get_class($this->service->VolumeTypeList()));
	}
	public function testSnapshot() {
		$this->assertEquals(
			'OpenCloud\Volume\Snapshot',
			get_class($this->service->Snapshot()));
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\CollectionError
	 */
	public function testSnapshotList() {
		$this->assertEquals(
			'',
			get_class($this->service->SnapshotList()));
	}
	public function testRequest() {
		$this->assertEquals(
			'OpenCloud\Common\Request\Response\Blank',
			get_class($this->service->Request('http://me.com')));
	}
}
