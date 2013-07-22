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

class DnsTest extends \PHPUnit_Framework_TestCase
{
	private
		$conn, 		// connection
		$dns;	// compute service

	public function __construct() {
		$this->conn = new StubConnection('http://example.com', 'SECRET');
		$this->dns = new \OpenCloud\DNS\Service(
			$this->conn,
			'cloudDNS',
			'N/A',
			'publicURL'
		);
	}
	/**
	 * Tests
	 */
	public function test__construct() {
	    $thing = new \OpenCloud\DNS\Service($this->conn,'cloudDNS','N/A','publicURL');
	    $this->assertEquals(
	        'OpenCloud\DNS\Service',
	        get_class($thing));
	}
	public function testUrl() {
		$this->assertEquals(
			'https://dns.api.rackspacecloud.com/v1.0/TENANT-ID',
			$this->dns->Url());
	}
	public function testDomain() {
		$this->assertEquals(
			'OpenCloud\DNS\Domain',
			get_class($this->dns->Domain()));
	}
	public function testDomainList() {
		$list = $this->dns->DomainList();
		$this->assertEquals(
			'OpenCloud\Common\Collection',
			get_class($list));
		$this->assertGreaterThan(
			2,
			strlen($list->Next()->Name()));
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\AsyncHttpError
	 */
	public function testAsyncRequest() {
	    $resp = $this->dns->AsyncRequest('FOOBAR');
	}
	public function testImport() {
		$this->assertEquals(
			'OpenCloud\DNS\AsyncResponse',
			get_class($this->dns->Import('foo bar oops')));
	}
	public function testPtrRecordList() {
		$server = new \OpenCloud\Compute\Server(
			new \OpenCloud\Compute\Service($this->conn,
				'cloudServersOpenStack', 'DFW', 'publicURL'));
		$server->id = '42';
		$this->assertEquals(
			'OpenCloud\Common\Collection',
			get_class($this->dns->PtrRecordList($server)));
	}
	public function testRecord() {
		$this->assertEquals(
			'OpenCloud\DNS\PtrRecord',
			get_class($this->dns->PtrRecord()));
	}
	public function testLimits() {
		$obj = $this->dns->Limits();
		$this->assertEquals(
			TRUE,
			is_array($obj->rate));
		$obj = $this->dns->Limits('DOMAIN_LIMIT');
		$this->assertEquals(
			500,
			$obj->absolute->limits[0]->value);
	}
	public function testLimitTypes() {
		$arr = $this->dns->LimitTypes();
		$this->assertEquals(
			TRUE,
			in_array('RATE_LIMIT', $arr));
	}
}
