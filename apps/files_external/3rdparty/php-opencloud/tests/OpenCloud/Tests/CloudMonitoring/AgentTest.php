<?php

namespace OpenCloud\Tests\CloudMonitoring;

use PHPUnit_Framework_TestCase;
use OpenCloud\CloudMonitoring\Service;

class AgentTest extends PHPUnit_Framework_TestCase
{

    const AGENT_ID      = '00-agent.example.com';
    const CONNECTION_ID = 'cntl4qsIbA';

    public function __construct()
    {
        $this->connection = new FakeConnection('example.com', 'SECRET');

        $this->service = new Service(
            $this->connection,
            'cloudMonitoring',
            'DFW',
            'publicURL'
        );
        
        $this->resource = $this->service->resource('Agent');
    }
    
    public function testResourceClass()
    {
        $this->assertInstanceOf(
            'OpenCloud\\CloudMonitoring\\Resource\\Agent',
            $this->resource
        );
    }
    
    public function testUrl()
    {
        $this->assertEquals(
            'https://monitoring.api.rackspacecloud.com/v1.0/TENANT-ID/agents',
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
    
    public function testCollection()
    {
        $this->assertInstanceOf(
            'OpenCloud\\Common\\Collection',
            $this->resource->listAll()
        );
    }
    
    public function testGet()
    {
        $this->resource->get(self::AGENT_ID);
        
        $this->assertEquals($this->resource->id, self::AGENT_ID);
        $this->assertEquals($this->resource->last_connected, 1334685407);
    }
    
    public function testGetConnections()
    {  
        $this->resource->id = self::AGENT_ID;
        $list = $this->resource->getConnections();
        
        $this->assertInstanceOf(
            'OpenCloud\\Common\\Collection',
            $list
        );
        
        $first = $list->First();
        
        $this->assertInstanceOf(
            'OpenCloud\\CloudMonitoring\\Resource\\AgentConnection',
            $first
        );
        
        $this->assertEquals('cntl4qsIbA', $first->id);
        $this->assertEquals('0b49b96d-24c9-45ca-c585-4040707f4880', $first->guid);
    }
    
    public function testGetConnection()
    {
        $this->resource->id = self::AGENT_ID;
        $connection = $this->resource->getConnection(self::CONNECTION_ID);
        
        $this->assertInstanceOf(
            'OpenCloud\\CloudMonitoring\\Resource\\AgentConnection',
            $connection
        );
        
        $this->assertEquals('0.1.2.16', $connection->bundle_version);
    }
    
}