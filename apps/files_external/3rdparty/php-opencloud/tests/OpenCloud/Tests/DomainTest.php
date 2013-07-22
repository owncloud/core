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

class DomainTest extends \PHPUnit_Framework_TestCase
{
	private
		$conn, 		// connection
		$dns,
		$domain;	// compute service

	public function __construct() {
		$this->conn = new StubConnection('http://example.com', 'SECRET');
		$this->dns = new \OpenCloud\DNS\Service(
			$this->conn,
			'cloudDNS',
			'N/A',
			'publicURL'
		);
		$this->domain = new \OpenCloud\DNS\Domain($this->dns);
		$this->domain->id = 'DOMAIN-ID';
	}
	/**
	 * Tests
	 */
	public function test__construct() {
		$this->assertEquals(
			'OpenCloud\DNS\Domain',
			get_class($this->domain));
	}
	public function testCreate() {
		$this->domain->AddRecord(
			$this->domain->Record(array('type'=>'A')));
		$this->domain->AddSubdomain(
			$this->domain->Subdomain(array('name'=>'foo')));
		$this->assertEquals(
			'OpenCloud\DNS\AsyncResponse',
			get_class($this->domain->Create()));
	}
	public function testUpdate() {
		$resp = $this->domain->Update(array(
			'id'=>'TEST',
			'name'=>'FOO',
			'emailAddress'=>'no-body@dontuseemail.com'));
		$this->assertEquals(
			'OpenCloud\DNS\AsyncResponse',
			get_class($resp));
	}
	public function testDelete() {
		$this->assertEquals(
			'OpenCloud\DNS\AsyncResponse',
			get_class($this->domain->Delete()));
	}
	public function testRecord() {
		$this->assertEquals(
			'OpenCloud\DNS\Record',
			get_class($this->domain->Record()));
	}
	public function testRecordList() {
		$this->assertEquals(
			'OpenCloud\Common\Collection',
			get_class($this->domain->RecordList()));
	}
	public function testSubdomain() {
		$this->assertEquals(
			'OpenCloud\DNS\Subdomain',
			get_class($this->domain->Subdomain()));
	}
	public function testSubdomainList() {
		$this->assertEquals(
			'OpenCloud\Common\Collection',
			get_class($this->domain->SubdomainList()));
	}
	public function testAddRecord() {
		$rec = $this->domain->Record();
		$this->assertEquals(
			1,
			$this->domain->AddRecord($rec));
	}
	public function testAddSubdomain() {
		$sub = $this->domain->Subdomain();
		$this->assertEquals(
			'OpenCloud\DNS\Subdomain',
			get_class($sub));
		$this->assertEquals(
			1,
			$this->domain->AddSubdomain($sub));
		$this->assertEquals(
			$this->domain,
			$sub->Parent());
	}
	public function testChanges() {
		$this->assertEquals(
			'stdClass',
			get_class($this->domain->Changes()));
	}
	public function testExport() {
		$this->assertEquals(
			'OpenCloud\DNS\AsyncResponse',
			get_class($this->domain->Export()));
	}
	public function testCloneDomain() {
	    $asr = $this->domain->CloneDomain('newdomain.io');
	    //print_r($asr);
	    $this->assertEquals(
	        'OpenCloud\DNS\AsyncResponse',
	        get_class($asr));
	}
}
