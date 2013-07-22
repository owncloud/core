<?php

namespace OpenCloud\Tests\CloudMonitoring;

use PHPUnit_Framework_TestCase;
use OpenCloud\CloudMonitoring\Service;

class AgentTargetTest extends PHPUnit_Framework_TestCase
{
    const ENTITY_ID = 'enAAAAA';

    public function __construct()
    {
        $this->connection = new FakeConnection('example.com', 'SECRET');

        $this->service = new Service(
            $this->connection,
            'cloudMonitoring',
            'DFW',
            'publicURL'
        );
        
        // Set up parent resource
        $agent = $this->service->resource('Entity');
        $agent->get(self::ENTITY_ID);

        // Get main resource
        $this->resource = $this->service->resource('AgentTarget');
        $this->resource->setParent($agent);
    }
    
    public function testResourceClass()
    {
        $this->assertInstanceOf(
            'OpenCloud\\CloudMonitoring\\Resource\\AgentTarget',
            $this->resource
        );
    }
    
    /**
     * @expectedException OpenCloud\Common\Exceptions\CreateError
     */
    public function testCreateFails()
    {
        $this->resource->Create();
    }
    
    /**
     * @expectedException OpenCloud\Common\Exceptions\UpdateError
     */
    public function testUpdateFails()
    {
        $this->resource->Update();
    }

    public function testCollectionContent()
    {
        $this->resource->setType('agent.filesystem');

        $targetArray = $this->resource->listAll();

        $this->assertContains('/', $targetArray);
        $this->assertContains('/sys/kernel/debug', $targetArray);
        $this->assertContains('/var/lock', $targetArray);
    }

}