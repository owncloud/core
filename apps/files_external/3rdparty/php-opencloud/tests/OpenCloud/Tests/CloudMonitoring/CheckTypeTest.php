<?php

namespace OpenCloud\Tests\CloudMonitoring;

use PHPUnit_Framework_TestCase;
use OpenCloud\CloudMonitoring\Service;

class CheckTypeTest extends PHPUnit_Framework_TestCase
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

        $this->resource = $this->service->resource('CheckType');
	}

    public function testCheckTypeClass()
    {
        $this->assertInstanceOf('OpenCloud\\CloudMonitoring\\Resource\\CheckType', $this->resource);
    }

    public function testListAllCheckTypesClass()
    {
        $this->assertInstanceOf('OpenCloud\\Common\\Collection', $this->resource->listAll());
    }

    public function testListAllCheckTypesHasRightCount()
    {
        $response = $this->resource->listAll();
        $this->assertInstanceOf('OpenCloud\\CloudMonitoring\\Resource\\CheckType', $response->First());
    }

    public function testGetCheckType()
    {
        $this->resource->get('remote.dns');

        $this->assertEquals('remote.dns', $this->resource->id);
        $this->assertEquals('remote', $this->resource->type);
    }

}