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

class NetworkTest extends \PHPUnit_Framework_TestCase {

	private
		$service,
		$net;
	
	public function __construct() {
		$conn = new StubConnection('http://example.com', 'SECRET');
		$this->service = new \OpenCloud\Compute\Service(
			$conn,
			'cloudServersOpenStack',
			'DFW',
			'publicURL'
		);
		$this->net = new \OpenCloud\Compute\Network($this->service, RAX_PUBLIC);
	}
	
	/**
	 * Tests
	 */
	public function test__construct() {
		$this->assertEquals(
			RAX_PUBLIC,
			$this->net->id);
		$net = $this->service->Network();
		$this->assertEquals(
			'OpenCloud\Compute\Network',
			get_class($net));
	}
	public function testCreate() {
		$net = $this->service->Network();
		$net->Create(array('label'=>'foo','cidr'=>'bar'));
		$this->assertEquals(
			'foo',
			$net->label);
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\NetworkUpdateError
	 */
	public function testUpdate() {
		$this->net->Update();
	}
	public function testDelete() {
		$net = $this->service->Network();
		$net->id = 'foobar';
		$resp = $net->Delete();
		$this->assertEquals(
			202,
			$resp->HttpStatus());
	}
	public function testName() {
		$this->assertEquals(
			'public',
			$this->net->Name());
	}

}
