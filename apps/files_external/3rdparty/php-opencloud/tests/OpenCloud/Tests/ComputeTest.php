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

require_once 'StubConnection.php';

class ComputeTest extends \PHPUnit_Framework_TestCase
{
	private
		$conn, 		// connection
		$compute;	// compute service

	public function __construct() {
		$this->conn = new StubConnection('http://example.com', 'SECRET');
		$this->compute = new \OpenCloud\Compute\Service(
			$this->conn,
			'cloudServersOpenStack',
			'DFW',
			'publicURL'
		);
	}
	/**
	 * Tests
	 */
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\UnsupportedVersionError
	 */
	public function test__construct() {
		$compute = new \OpenCloud\Compute\Service(
			$this->conn,
			'cloudServers', // invalid version
			'DFW',
			'publicURL');
	}
	public function testUrl() {
		$this->assertEquals(
		'https://dfw.servers.api.rackspacecloud.com/v2/TENANT-ID/servers',
		$this->compute->Url());
		$this->assertEquals(
	'https://dfw.servers.api.rackspacecloud.com/v2/TENANT-ID/servers/detail',
		    $this->compute->Url('servers/detail'));
		$this->assertEquals(
    'https://dfw.servers.api.rackspacecloud.com/v2/TENANT-ID/servers?A=1&B=2',
		    $this->compute->Url('servers', array('A'=>1,'B'=>2)));
	}
	public function testServer() {
		$s = $this->compute->Server(); // blank
		$this->assertEquals('OpenCloud\Compute\Server', get_class($s));
	}
	public function testServerList() {
		$list = $this->compute->ServerList();
		$this->assertEquals('OpenCloud\Common\Collection', get_class($list));
	}
	public function testImage() {
	    $im = $this->compute->Image(); // blank
	    $this->assertEquals('OpenCloud\Compute\Image', get_class($im));
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\CollectionError
	 */
	public function testImageList() {
	    $list = $this->compute->ImageList();
	    $this->assertEquals('OpenCloud\Common\Collection', get_class($list)); // 404
	}
	public function testNetwork() {
		$this->assertEquals(
			'OpenCloud\Compute\Network',
			get_class($this->compute->Network()));
	}
	public function testNetworkList() {
		$this->assertEquals(
			'OpenCloud\Common\Collection',
			get_class($this->compute->NetworkList()));
	}
	public function testNamespaces() {
	    $this->assertEquals(
	        FALSE,
	        in_array('FOO', $this->compute->namespaces()));
	    $this->assertEquals(
	        TRUE,
	        in_array('rax-bandwidth', $this->compute->namespaces()));
	}
	public function test_load_namespaces() {
	    $this->assertEquals(
	        TRUE,
	        in_array('rax-bandwidth', $this->compute->namespaces()));
	}
}
