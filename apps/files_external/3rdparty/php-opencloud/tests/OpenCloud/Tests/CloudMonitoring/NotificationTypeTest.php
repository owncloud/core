<?php

namespace OpenCloud\Tests\CloudMonitoring;

use PHPUnit_Framework_TestCase;
use OpenCloud\CloudMonitoring\Service;
use OpenCloud\CloudMonitoring\Exception;
use OpenCloud\Common\Collection;

class NotificationTypeTest extends PHPUnit_Framework_TestCase
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
        
        $this->resource = $this->service->resource('NotificationType');
    }
    
    public function testResourceClass()
    {
        $this->assertInstanceOf(
            'OpenCloud\\CloudMonitoring\\Resource\\NotificationType',
            $this->resource
        );
    }
    
    public function testResourceUrl()
    {
        $this->assertEquals(
            'https://monitoring.api.rackspacecloud.com/v1.0/TENANT-ID/notification_types',
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
        
        $this->assertEquals('webhook', $first->id);
        $this->assertEquals('An HTTP or HTTPS URL to POST to', $first->fields[0]->description);
    }
    
    public function testGet()
    {
        $this->resource->get(self::NT_ID);
        
        $this->assertEquals('url', $this->resource->fields[0]->name);
        $this->assertFalse($this->resource->fields[0]->optional);
    }
    
}