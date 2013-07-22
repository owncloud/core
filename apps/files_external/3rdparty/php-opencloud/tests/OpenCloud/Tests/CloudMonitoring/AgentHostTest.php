<?php

namespace OpenCloud\Tests\CloudMonitoring;

use PHPUnit_Framework_TestCase;
use OpenCloud\CloudMonitoring\Service;

class AgentHostTest extends PHPUnit_Framework_TestCase
{
    const AGENT_ID = 'someId';

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
        $agent = $this->service->resource('Agent');
        $agent->get(self::AGENT_ID);

        // Get main resource
        $this->resource = $this->service->resource('AgentHost');
        $this->resource->setParent($agent);
    }
    
    public function testResourceClass()
    {
        $this->assertInstanceOf(
            'OpenCloud\\CloudMonitoring\\Resource\\AgentHost',
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
    
    public function testCollection()
    {
        $this->assertInstanceOf(
            'OpenCloud\\Common\\Collection',
            $this->resource->info('cpus')
        );
    }

    public function testCPU()
    {
        $list = $this->resource->info('cpus');
        while ($info = $list->Next()) {
            $this->assertObjectHasAttribute('name', $info);
            $this->assertObjectHasAttribute('vendor', $info);
            $this->assertObjectHasAttribute('model', $info);
        }
    }
    
    public function testDisks()
    {
        $list = $this->resource->info('disks');
        while ($info = $list->Next()) {
            $this->assertObjectHasAttribute('read_bytes', $info);
            $this->assertObjectHasAttribute('reads', $info);
            $this->assertObjectHasAttribute('rtime', $info);
        }
    }

    public function testFilesystems()
    {
        $list = $this->resource->info('filesystems');
        while ($info = $list->Next()) {
            $this->assertObjectHasAttribute('dir_name', $info);
            $this->assertObjectHasAttribute('dev_name', $info);
            $this->assertObjectHasAttribute('free_files', $info);
        }
    }

    public function testNetworkInterfaces()
    {
        $list = $this->resource->info('network_interfaces');
        while ($info = $list->Next()) {
            $this->assertObjectHasAttribute('name', $info);
            $this->assertObjectHasAttribute('type', $info);
            $this->assertObjectHasAttribute('netmask', $info);
        }
    }

}