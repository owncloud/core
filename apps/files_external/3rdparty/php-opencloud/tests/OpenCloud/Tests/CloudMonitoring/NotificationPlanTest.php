<?php

namespace OpenCloud\Tests\CloudMonitoring;

use PHPUnit_Framework_TestCase;
use OpenCloud\CloudMonitoring\Service;

class NotificationPlanTest extends PHPUnit_Framework_TestCase
{
    
    const NP_ID = 'npAAAA';
    
    public function __construct()
    {
        $this->connection = new FakeConnection('example.com', 'SECRET');

        $this->service = new Service(
            $this->connection,
            'cloudMonitoring',
            'DFW',
            'publicURL'
        );
           
        $this->resource = $this->service->resource('NotificationPlan');
    }
    
    public function testNPClass()
    {
        $this->assertInstanceOf(
            'OpenCloud\\CloudMonitoring\\Resource\\NotificationPlan',
            $this->resource
        );
    }
    
    public function testNPUrl()
    {
        $this->assertEquals(
            'https://monitoring.api.rackspacecloud.com/v1.0/TENANT-ID/notification_plans',
            $this->resource->Url()
        );
    }
    
    /**
     * @expectedException OpenCloud\Common\Exceptions\CreateError
     */
    public function testCreateFailsWithoutParams()
    {
        $this->resource->Create();
    }
    
    public function testListAllClass()
    {
        $this->assertInstanceOf(
            'OpenCloud\\Common\\Collection',
            $this->resource->listAll()
        );
    }
    
    public function testListAllProperties()
    {
        $list = $this->resource->listAll();
        $first = $list->First();
        $this->assertObjectHasAttribute('label', $first);
        $this->assertEquals('ntAAAA', $first->critical_state[0]);
    }
    
    public function testGet()
    {
        $this->resource->get(self::NP_ID);
        $this->assertEquals('Notification Plan 1', $this->resource->label);
    }
    
}