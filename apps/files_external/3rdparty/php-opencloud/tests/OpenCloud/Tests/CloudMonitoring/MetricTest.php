<?php

namespace OpenCloud\Tests\CloudMonitoring;

use PHPUnit_Framework_TestCase;
use OpenCloud\CloudMonitoring\Service;
use OpenCloud\CloudMonitoring\Exception;
use OpenCloud\Common\Collection;

class MetricTest extends PHPUnit_Framework_TestCase
{
    
    const ENTITY_ID   = 'enAAAAA';
    const CHECK_ID    = 'chAAAA';
    const METRIC_NAME = 'mzdfw.available';
    
    public function __construct()
    {
        $this->connection = new FakeConnection('http://example.com', 'SECRET');

        $this->service = new Service(
            $this->connection,
            'cloudMonitoring',
            'LON',
            'publicURL'
        );
        
        // Grandparent object (i.e. entity)
        $entityResource = $this->service->resource('entity');
        $entityResource->Refresh(self::ENTITY_ID);
        
        // Parent object (i.e. check)
        $checkResource = $this->service->resource('check');
        $checkResource->setParent($entityResource);
        $checkResource->Refresh(self::CHECK_ID);
        
        // Our metric object
        $this->resource = $this->service->resource('metric');
        $this->resource->setParent($checkResource);
    }

    public function testResourceClass()
    {
    	$this->assertEquals(
    		get_class($this->resource),
    		'OpenCloud\\CloudMonitoring\\Resource\\Metric'
    	);
    }

    public function testListIsCollection()
    {
    	$this->assertInstanceOf(
    	   'OpenCloud\\Common\\Collection',
    	   $this->resource->listAll()
    	);
    }
    
    public function testParentClass()
    {
        $this->assertInstanceOf(
            'OpenCloud\\CloudMonitoring\\Resource\\Check',
            $this->resource->Parent()
        );
    }
    
    public function testUrl()
    {
        $this->assertEquals(
            'https://monitoring.api.rackspacecloud.com/v1.0/TENANT-ID/entities/'.self::ENTITY_ID.'/checks/'.self::CHECK_ID.'/metrics',
            $this->resource->Url()
        );
    }
    
    /**
     * @expectedException OpenCloud\Common\Exceptions\CreateError
     */
    public function testCreateFail()
    {
    	$this->resource->Create();
    }
   
    /**
     * @expectedException OpenCloud\Common\Exceptions\UpdateError
     */ 
    public function testUpdateFail()
    {
        $this->resource->Update();
    }
    
    /**
     * @expectedException OpenCloud\Common\Exceptions\DeleteError
     */
    public function testDeleteFail()
    {
        $this->resource->Delete();
    }
    
    public function testDataPointsClass()
    {
        $this->assertInstanceOf(
            'OpenCloud\\Common\\Collection',
            $this->resource->fetchDataPoints(self::METRIC_NAME, array(
            	'resolution' => 'FULL',
            	'from'       => 1369756378450,
            	'to'         => 1369760279018
            ))
        );
    }

}