<?php

namespace OpenCloud\Tests\CloudMonitoring;

use PHPUnit_Framework_TestCase;
use OpenCloud\CloudMonitoring\Service;

class AlarmTest extends PHPUnit_Framework_TestCase
{

    const ENTITY_ID = 'enAAAAA';
    const ALARM_ID  = 'alAAAA';
    
    public function __construct()
    {
        $this->connection = new FakeConnection('example.com', 'SECRET');

        $this->service = new Service(
            $this->connection,
            'cloudMonitoring',
            'DFW',
            'publicURL'
        );
        
        // Parent object (i.e. entity)
        $entityResource = $this->service->resource('Entity');
        $entityResource->Refresh(self::ENTITY_ID);
        
        $this->resource = $this->service->resource('Alarm');
        $this->resource->setParent($entityResource);
    }
    
    public function testResourceClass()
    {
        $this->assertInstanceOf(
            'OpenCloud\\CloudMonitoring\\Resource\\Alarm',
            $this->resource
        );
    }
    
    public function testParentClass()
    {
        $this->assertInstanceOf(
            'OpenCloud\\CloudMonitoring\\Resource\\Entity',
            $this->resource->Parent()
        );
    }
    
    public function testUrl()
    {
        $this->assertEquals(
            'https://monitoring.api.rackspacecloud.com/v1.0/TENANT-ID/entities/'.self::ENTITY_ID.'/alarms',
            $this->resource->Url()
        );
    }
    
    /**
     * @expectedException OpenCloud\Common\Exceptions\CreateError
     */
    public function testCreateFailsWithNoParams()
    {
        $this->resource->Create();
    }
    
    /**
     * @expectedException OpenCloud\Common\Exceptions\UpdateError
     */
    public function testUpdateFailsWithNoParams()
    {
        $this->resource->Update();
    }
    
    public function testAlarmTesting()
    {
        $params = array();
        
        // Set criteria
        $params['criteria'] = 'if (metric["code"] == "404") { return new AlarmStatus(CRITICAL, "not found"); } return new AlarmStatus(OK);';
        
        // Data which needs to be tested
        $params['check_data'] = json_decode(file_get_contents(__DIR__ . '/Resource/Check/test_existing.json'));
        
        
        $response = $this->resource->test($params);
        
        $this->assertObjectHasAttribute('timestamp', $response[0]);
        $this->assertObjectHasAttribute('status', $response[0]);
        
        $this->assertEquals('OK', $response[0]->state);
    }
    
    public function testAlarmCollection()
    {
        $this->assertInstanceOf(
            'OpenCloud\\Common\\Collection',
            $this->resource->listAll()
        );
    }
    
    public function testGetAlarm()
    {
        $this->resource->get(self::ALARM_ID);
        
        $this->assertEquals($this->resource->id, self::ALARM_ID);
        $this->assertEquals($this->resource->Parent()->id, self::ENTITY_ID);
        
        $this->expectOutputRegex('/return new AlarmStatus\(OK\)/');
        echo $this->resource->criteria;
    }
    
}