<?php

namespace OpenCloud\Tests\CloudMonitoring;

use PHPUnit_Framework_TestCase;
use OpenCloud\CloudMonitoring\Service;
use OpenCloud\CloudMonitoring\Exception;
use OpenCloud\Common\Collection;

class ChangelogTest extends PHPUnit_Framework_TestCase
{
    
    const NT_ID = 'webhook';
    
    public function __construct()
    {
        $this->connection = new FakeConnection('http://example.com', 'SECRET');

        $this->service = new Service(
            $this->connection,
            'cloudMonitoring',
            'LON',
            'publicURL'
        );
        
        $this->resource = $this->service->resource('Changelog');
    }
    
    public function testResourceClass()
    {
        $this->assertInstanceOf(
            'OpenCloud\\CloudMonitoring\\Resource\\Changelog',
            $this->resource
        );
    }
    
    public function testResourceUrl()
    {
        $this->assertEquals(
            'https://monitoring.api.rackspacecloud.com/v1.0/TENANT-ID/changelogs/alarms',
            $this->resource->Url()
        );
    }
    
    /**
     * @expectedException OpenCloud\Common\Exceptions\CreateError
     */
    public function testCreateFailWithNoParams()
    {
        $this->resource->Create();
    }
    
    public function testListAll()
    {
        $this->assertInstanceOf(
            'OpenCloud\\Common\\Collection',
            $this->resource->listAll()
        );
        
        $first = $this->resource->listAll()->First();
        
        $this->assertEquals('4c5e28f0-0b3f-11e1-860d-c55c4705a286', $first->id);
        $this->assertEquals('enPhid7noo', $first->entity_id);
    }
    
}