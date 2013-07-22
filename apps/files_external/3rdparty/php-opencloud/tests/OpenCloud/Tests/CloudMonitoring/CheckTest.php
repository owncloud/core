<?php

namespace OpenCloud\Tests\CloudMonitoring;

use PHPUnit_Framework_TestCase;
use OpenCloud\CloudMonitoring\Service;

class CheckTest extends PHPUnit_Framework_TestCase
{
	
	public function __construct()
	{
        $this->connection = new FakeConnection('example.com', 'SECRET');

        $this->service = new Service(
            $this->connection,
            'cloudMonitoring',
            'DFW',
            'publicURL'
        );

        $parentEntity = $this->service->resource('entity', array('id' => 'enAAAAA'));
        $this->resource = $this->service->resource('check');
        $this->resource->setParent($parentEntity);
	}

	public function testCheckClass()
	{
		$this->assertInstanceOf('OpenCloud\\CloudMonitoring\\Resource\\Check', $this->resource);
	}

	public function testListAllIsCollection()
	{
		$this->assertInstanceOf('OpenCloud\\Common\\Collection', $this->resource->listAll());
	}

	public function testParentClass()
	{
		$this->assertInstanceOf('OpenCloud\\CloudMonitoring\\Resource\\Entity', $this->resource->Parent());
	}

    /**
     * @expectedException OpenCloud\Common\Exceptions\CreateError
     */
	public function testCreateFailsWithoutRequiredParams()
	{
		$this->resource->Create();
	}

	public function testCheckTest()
	{
		$this->resource->type  = 'remote.http';
		$this->resource->label = 'Example label';
		$this->resource->disabled = false;

		$response = $this->resource->test(array(), false)->HttpBody();
		
		$this->assertNotNull($response);

		$response = json_decode($response);
		$this->assertObjectNotHasAttribute('debug_info', $response[0]);
	}

	public function testCheckTestWithDebug()
	{
		$this->resource->type  = 'remote.http';
		$this->resource->label = 'Example label';
		$this->resource->disabled = false;

		$response = json_decode($this->resource->test(array(), true)->HttpBody());
		$this->assertObjectHasAttribute('debug_info', $response[0]);
	}

	public function testExistingCheckTest()
	{
		$this->resource->id   = 'chAAAA';
		$this->resource->type = 'remote.http';

		$response = $this->resource->testExisting()->HttpBody();	
		$this->assertNotNull($response);

		$response = json_decode($response);
		$this->assertObjectHasAttribute('metrics', $response[0]);	
		$this->assertObjectNotHasAttribute('debug_info', $response[0]);
	}

	public function testGetCheck()
	{
		$response = $this->resource->get('chAAAA');
		
		$this->assertEquals($this->resource->id, 'chAAAA');
	}

}