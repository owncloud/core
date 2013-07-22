<?php

namespace OpenCloud\Tests\CloudMonitoring;

use PHPUnit_Framework_TestCase;
use OpenCloud\CloudMonitoring\Service;
use OpenCloud\CloudMonitoring\Exception;
use OpenCloud\Common\Collection;

class ZoneTest extends PHPUnit_Framework_TestCase
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

        $this->resource = $this->service->resource('zone');
    }
    
    public function testResourceClass()
    {
        $this->assertInstanceOf(
            'OpenCloud\\CloudMonitoring\\Resource\\Zone',
            $this->resource
        );
    }
    
    public function testUrl()
    {
        $this->assertEquals(
            'https://monitoring.api.rackspacecloud.com/v1.0/TENANT-ID/monitoring_zones',
            $this->resource->Url()
        );
    }
    
    public function testCollection()
    {
        $this->assertInstanceOf(
            'OpenCloud\\Common\\Collection',
            $this->resource->listAll()
        );
    }
    
    public function testCollectionContent()
    {
        $list = $this->resource->listAll();
        $first = $list->First();
        
        $this->assertEquals('mzAAAAA', $first->id);
        $this->assertEquals('US', $first->country_code);
    }
    
    public function testGetClass()
    {
        $this->resource->get('mzAAAAA');
        
        $this->assertEquals('mzAAAAA', $this->resource->id);
    }
    
    public function testTraceroute()
    {
        $this->resource->id = 'mzAAAAA';
        $response = $this->resource->traceroute(array(
            'target' => 'http://test.com'
        ));
        
        $object = json_decode($response->HttpBody());
        
        $this->assertCount(27, $object->result);
        $this->assertEquals('173.194.78.139', $object->result[26]->ip);
    }

}