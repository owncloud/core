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

/**
 * Stub for Rackspace to Override the ->Request() method
 */
class MyRackspace extends \OpenCloud\Rackspace {
    public function Request($url,$method='GET',$headers=array(),$data=NULL) {
    	return new \OpenCloud\Common\Request\Response\Blank(array(
    		'body'=>file_get_contents(TESTDIR.'/connection.json')));
    }
}

class RackspaceTest extends \PHPUnit_Framework_TestCase
{
	private
		$conn;
	public function __construct() {
		$this->conn = new MyRackspace('http://example.com',
			array('username'=>'FOO', 'password'=>'BAR'));
	}

	/**
	 * Tests
	 */
	public function testCredentials() {
		$this->conn = new MyRackspace(
			'http://example.com',
			array('username'=>'FOO', 'password'=>'BAR'));
		$this->assertRegExp(
			'/"username":"FOO"/',
			$this->conn->Credentials());
		$this->conn = new MyRackspace(
			'http://example.com',
			array('username'=>'FOO','apiKey'=>'KEY'));
		$this->assertRegExp(
			'/RAX-KSKEY:apiKeyCredentials/',
			$this->conn->Credentials());
	}
	public function testDbService() {
		$dbaas = $this->conn->DbService(NULL, 'DFW');
		$this->assertEquals('OpenCloud\Database\Service', get_class($dbaas));
	}
	public function testLoadBalancerService() {
	    $lbservice = $this->conn->LoadBalancerService(NULL, 'DFW');
	    $this->assertEquals(
	        'OpenCloud\LoadBalancer\Service',
	        get_class($lbservice));
	}
	public function testDNS() {
		$dns = $this->conn->DNS(NULL, 'DFW');
		$this->assertEquals(
			'OpenCloud\DNS\Service',
			get_class($dns));
	}
}
