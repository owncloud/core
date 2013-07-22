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

/**
 * Since Service is an abstract class, we'll wrap it so we can test it
 */
class MyService extends \OpenCloud\Common\Service {
	public function Request($url, $method = 'GET', array $headers = array(), $body = NULL) {
		return parent::Request($url,$method,$headers,$body);
	}
}

class ServiceTest extends \PHPUnit_Framework_TestCase
{
	private
		$conn,
		$service;
	public function __construct() {
		$this->conn = new StubConnection('http://example.com', 'SECRET');
		$this->service = new MyService(
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
		/* This also validates the private function get_endpoint() */
		$this->assertEquals(
			'https://dfw.servers.api.rackspacecloud.com/v2/TENANT-ID',
			$this->service->Url());
	}
	public function testUrl2() {
		$this->assertEquals(
			'https://dfw.servers.api.rackspacecloud.com/' .
				'v2/TENANT-ID/sub?a=1&b=2',
			$this->service->Url('sub', array('a'=>1,'b'=>2)));
	}
	public function testRequest() {
		// this returns 404 because the Connection::Request() function
		// is stubbed out
		$resp = $this->service->Request('http://example.com');
		$this->assertEquals(404, $resp->HttpStatus());
	}
	public function testExtensions() {
		$ext = $this->service->Extensions();
		$this->assertEquals(TRUE, is_array($ext));
	}
	public function testLimits() {
		$lim = $this->service->Limits();
		$this->assertEquals(TRUE, is_array($lim));
	}
	public function testRegion() {
		$this->assertEquals(
			'DFW',
			$this->service->Region());
	}
	public function testName() {
		$this->assertEquals(
			'cloudServersOpenStack',
			$this->service->Name());
	}
}
