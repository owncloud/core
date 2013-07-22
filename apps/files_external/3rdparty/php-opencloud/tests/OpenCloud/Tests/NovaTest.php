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

// stub out Nova because it's an abstract class
class MyNova extends \OpenCloud\Common\Nova { }

class NovaTest extends \PHPUnit_Framework_TestCase
{
	private
		$conn, 		// connection
		$nova;	    // service

	public function __construct() {
		$this->conn = new StubConnection('http://example.com', 'SECRET');
		$this->nova = new MyNova(
			$this->conn,
			'compute',
			'cloudServersOpenStack',
			'DFW',
			'publicURL'
		);
	}
	/**
	 * Tests
	 */
	public function testUrl() {
	    $this->assertEquals(
	        'https://dfw.servers.api.rackspacecloud.com/v2/TENANT-ID/foo',
	        $this->nova->Url('foo'));
    }
	public function testFlavor() {
	    $f = $this->nova->Flavor();
	    $this->assertEquals('OpenCloud\Compute\Flavor', get_class($f));
	}
	public function testFlavorList() {
		$flist = $this->nova->FlavorList();
		$this->assertEquals('OpenCloud\Common\Collection', get_class($flist));
	}
	public function testRequest() {
		// this returns 404 because the Connection::Request() is stubbed out
		$resp = $this->nova->Request('http://example.com');
		$this->assertEquals(404, $resp->HttpStatus());
	}
}
