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

// make a real class from the abstract one
class MyPersistentObject extends \OpenCloud\Common\PersistentObject {
	public
		$status,
		$updated,
		$hostId,
		$addresses,
		$links,
		$image,
		$hostname,
		$flavor,
		$id,
		$user_id,
		$name,
		$created,
		$tenant_id,
		$accessIPv4,
		$accessIPv6,
		$volume,
		$progress,
		$adminPass,
		$metadata;
	protected static
		$json_name = 'instance',
		$json_collection_name = 'instanceCollection',
		$url_resource = 'instances';
	public function Refresh($id=NULL, $url=NULL) { 
		return parent::Refresh($id, $url); }
	public function NoCreate() { return parent::NoCreate(); }
	public function NoUpdate() { return parent::NoUpdate(); }
	public function NoDelete() { return parent::NoDelete(); }
	public function Action($object) { return parent::Action($object); }
	public function CreateUrl() { return parent::CreateUrl(); }
}

class PersistentObjectTest extends \PHPUnit_Framework_TestCase
{
	private
	    $service,
		$instance;
	public function __construct() {
		$conn = new StubConnection('http://example.com', 'SECRET');
		$this->service = new \OpenCloud\Compute\Service(
			$conn,
			'cloudServersOpenStack',
			'DFW',
			'publicURL'
		);
		$this->instance = new MyPersistentObject($this->service);
	}

	/**
	 * Tests
	 */
	public function test__construct() {
	    $inst = new MyPersistentObject($this->service);
	    $this->assertEquals(
	        'OpenCloud\Tests\MyPersistentObject',
	        get_class($inst));
	    $inst = new MyPersistentObject($this->service,
	    	array('id'=>'42'));
	    $this->assertEquals(
	    	'OpenCloud\Tests\MyPersistentObject',
	    	get_class($inst));
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\InvalidArgumentError
	 */
	public function test__construct2() {
	    $inst = new MyPersistentObject($this->service, FALSE);
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\AttributeError
	 */
	public function test__set() {
	    $this->instance->FOOBAR = 'BAZ';
	}
	public function testUrl() {
	    $this->instance->id = '12';
	    $this->assertEquals(
			'https://dfw.servers.api.rackspacecloud.com/v2/'.
			'TENANT-ID/instances/12',
	        $this->instance->Url());
	    $this->assertEquals(
			'https://dfw.servers.api.rackspacecloud.com/v2/TENANT-ID/'.
			'instances/12/foobar?foo=BAZ',
	        $this->instance->Url('foobar',
	        	array('foo'=>'BAZ')));
	}
	public function testUrl2() {
	    $this->instance->id = '12';
	    /* this tests for subresources and query strings */
	    $qstr = array('a'=>1, 'b'=>2);
	    $this->assertEquals(
			'https://dfw.servers.api.rackspacecloud.com/v2/TENANT-ID/'.
				'instances/12/pogo?a=1&b=2',
	        $this->instance->Url('pogo', $qstr));
	}
	public function testRefresh() {
	    $this->instance->Refresh('SERVER-ID');
	    $this->assertEquals('ACTIVE', $this->instance->status);
	}
	public function testWaitFor() {
	    $this->instance->id = '11';
	    $this->instance->WaitFor('FOOBAR', -1,
	        array($this, 'WaitForCallBack'));
	    $this->assertEquals(
	        'FOOBAR',
	        $this->instance->status);
	}
	// this is called by the WaitFor function, above
	public function WaitForCallBack($server) {
	    $server->status = 'FOOBAR';
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\CreateError
	 */
	public function testCreate() {
		$this->instance->Create();
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\UpdateError
	 */
	public function testUpdate() {
		$this->instance->Update();
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\UrlError
	 */
	public function testDelete() {
		$this->instance->Delete();
	}
	public function testName() {
		$this->assertEquals(
			'',
			$this->instance->Name());
	}
	public function testStatus() {
	    $this->assertEquals(
	        'N/A',
	        $this->instance->Status());
	}
	public function testId() {
	    $this->assertEquals(
	        NULL,
	        $this->instance->Id());
	}
	public function testJsonName() {
	    $this->assertEquals(
	        'instance',
	        MyPersistentObject::JsonName());
	}
	public function testResourceName() {
	    $this->assertEquals(
	        'instances',
	        MyPersistentObject::ResourceName());
	}
	public function testJsonCollectionName() {
	    $this->assertEquals(
	        'instanceCollection',
	        MyPersistentObject::JsonCollectionName());
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\CreateError
	 */
	public function testNoCreate() {
	    $this->instance->NoCreate();
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\UpdateError
	 */
	public function testNoUpdate() {
	    $this->instance->NoUpdate();
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\DeleteError
	 */
	public function testNoDelete() {
	    $this->instance->NoDelete();
	}
	public function testService() {
	    $this->assertEquals(
	        'OpenCloud\Compute\Service',
	        get_class($this->instance->Service()));
	}
	public function testParent() {
	    $this->assertEquals(
	        'OpenCloud\Compute\Service',
	        get_class($this->instance->Parent()));
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\UnsupportedExtensionError
	 */
	public function testCheckExtension() {
        // this should work
        $this->assertEquals(
            TRUE,
    	    $this->instance->CheckExtension('os-rescue'));
	    // this causes the exception
	    $this->instance->CheckExtension('foobar');
	}
	public function testAction() {
	    $obj = new \stdClass;
	    $this->instance->id = 'foo';
	    $this->instance->Action($obj);
	}
	public function testCreateUrl() {
	    $this->assertEquals(
	        'https://dfw.servers.api.rackspacecloud.com/v2/TENANT-ID/instances',
	        $this->instance->CreateUrl());
	}
	public function testRegion() {
		$this->assertEquals(
			'DFW',
			$this->instance->Region());
	}
}
