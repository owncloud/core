<?php

namespace OpenCloud\Tests\CloudMonitoring;

use PHPUnit_Framework_TestCase;
use OpenCloud\CloudMonitoring\Service;
use OpenCloud\CloudMonitoring\Exception;
use OpenCloud\Common\Collection;

class EntityTest extends PHPUnit_Framework_TestCase
{
    
    public function __construct()
    {
        $this->connection = new FakeConnection('http://example.com', 'SECRET');

        $this->service = new Service(
            $this->connection,
            'cloudMonitoring',
            'LON',
            'publicURL'
        );

        $this->resource = $this->service->resource('entity');
    }

    public function testResourceClass()
    {
    	$this->assertEquals(
    		get_class($this->resource),
    		'OpenCloud\\CloudMonitoring\\Resource\\Entity'
    	);
    }

    public function testListIsCollection()
    {
    	$this->assertTrue(
    		$this->resource->listAll() instanceof Collection
    	);
    }
    
    /**
     * @expectedException OpenCloud\Common\Exceptions\CreateError
     */
    public function testEntityCreateFailIfNoLabel()
    {
    	$this->resource->Create();
    }

}