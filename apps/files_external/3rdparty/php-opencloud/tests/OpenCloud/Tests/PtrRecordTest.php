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

class PtrRecordTest extends \PHPUnit_Framework_TestCase
{
	private
		$conn,
		$dns,
		$record;	// the record

	public function __construct() {
		$this->conn = new StubConnection('http://example.com', 'SECRET');
		$this->dns = new \OpenCloud\DNS\Service(
			$this->conn,
			'cloudDNS',
			'N/A',
			'publicURL'
		);
		$this->record = new \OpenCloud\DNS\PtrRecord($this->dns);
	}
	/**
	 * Tests
	 */
	public function test__construct() {
		$this->record = new \OpenCloud\DNS\PtrRecord($this->dns);
		$this->assertEquals(
			'PTR',
			$this->record->type);
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\RecordTypeError
	 */
	public function test__construct2() {
		// not allowed to change the record type from PTR
		$this->record = new \OpenCloud\DNS\PtrRecord(
			$this->dns, array('type' => 'A'));
	}
	public function testUrl() {
		$this->assertEquals(
			'https://dns.api.rackspacecloud.com/v1.0/TENANT-ID/rdns',
			$this->record->Url());
	}
	public function testCreate() {
		$server = $this->conn->Compute(NULL, 'ORD')->Server(array('id'=>'foo'));
		$this->assertEquals(
			'OpenCloud\DNS\AsyncResponse',
			get_class($this->record->Create(array('server'=>$server))));
	}
	public function testUpdate() {
		$server = $this->conn->Compute(NULL, 'ORD')->Server(array('id'=>'foo'));
		$this->assertEquals(
			'OpenCloud\DNS\AsyncResponse',
			get_class($this->record->Create(array('server'=>$server))));
	}
	public function testDelete() {
		$server = $this->conn->Compute(NULL, 'ORD')->Server(array('id'=>'foo'));
		$this->record->server = $server;
		$this->assertEquals(
			'OpenCloud\DNS\AsyncResponse',
			get_class($this->record->Delete()));
	}
}
