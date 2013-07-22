<?php

namespace OpenCloud\Tests\CloudMonitoring;

use PHPUnit_Framework_TestCase;
use OpenCloud\CloudMonitoring\Service;
use OpenCloud\CloudMonitoring\Exception;
use OpenCloud\Common\Collection;

class NotificationHistoryTest extends PHPUnit_Framework_TestCase
{
    
    const ENTITY_ID = 'enAAAA';
    const ALARM_ID  = 'alAAAA';
    const CHECK_ID  = 'chAAAA';
    const NH_ID     = '646ac7b0-0b34-11e1-a0a1-0ff89fa2fa26';
    
    public function __construct()
    {
        $this->connection = new FakeConnection('http://example.com', 'SECRET');

        $this->service = new Service(
            $this->connection,
            'cloudMonitoring',
            'LON',
            'publicURL'
        );
        
        // Grandparent resource (i.e. entity)
        $entityResource = $this->service->resource('entity');
        $entityResource->Refresh(self::ENTITY_ID);
        
        // Parent resource (i.e. alarm)
        $alarmResource = $this->service->resource('alarm');
        $alarmResource->setParent($entityResource);
        $alarmResource->Refresh(self::ALARM_ID);
    
        // This resource
        $this->resource = $this->service->resource('NotificationHistory');
        $this->resource->setParent($alarmResource);
    }
    
    public function testResourceClass()
    {
        $this->assertInstanceOf(
            'OpenCloud\\CloudMonitoring\\Resource\\NotificationHistory',
            $this->resource
        );
    }
    
    public function testResourceUrl()
    {
        $this->assertEquals(
            'https://monitoring.api.rackspacecloud.com/v1.0/TENANT-ID/entities/'.self::ENTITY_ID.'/alarms/'.self::ALARM_ID.'/notification_history',
            $this->resource->Url()
        );
    }
    
    public function testListChecks()
    {
        $response = $this->resource->listChecks();
        
        $this->assertCount(2, $response->check_ids);
        $this->assertEquals('chOne', $response->check_ids[0]);
    }
    
    public function testListHistory()
    {
        $list = $this->resource->listHistory(self::CHECK_ID);
        
        $first = $list->First();
        
        $this->assertEquals('sometransaction', $first->transaction_id);
        $this->assertEquals('matched return statement on line 6', $first->status);
        $this->assertEquals('ntOne', $first->notification_results[0]->notification_id);
    }
    
    public function testSingle()
    {
        $this->resource->getSingleHistoryItem(self::CHECK_ID, self::NH_ID);
        
        $this->assertEquals(self::NH_ID, $this->resource->id);
        $this->assertEquals(1320885544875, $this->resource->timestamp);
        $this->assertEquals('WARNING', $this->resource->state);
        
    }
    
}