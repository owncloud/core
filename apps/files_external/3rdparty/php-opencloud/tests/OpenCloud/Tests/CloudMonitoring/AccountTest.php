<?php

namespace OpenCloud\Tests\CloudMonitoring;

use PHPUnit_Framework_TestCase;
use OpenCloud\CloudMonitoring\Service;

class AccountTest extends PHPUnit_Framework_TestCase
{
    
    const ACCOUNT_ID = 'someId';
    
    public function __construct()
    {
        $this->connection = new FakeConnection('example.com', 'SECRET');

        $this->service = new Service(
            $this->connection,
            'cloudMonitoring',
            'DFW',
            'publicURL'
        );
    }

    public function testAccountClass()
    {
        echo get_class($this->service->resource('account'));
        $this->expectOutputRegex('#Account#');
    }

    public function testAccountGET()
    {
        $resource = $this->service->resource('account');
        $before = get_object_vars($resource);
        $resource->get();
        
        $this->assertEquals('aValue', $resource->metadata->key);
        $this->assertEquals('token12345', $resource->webhook_token);
    }

    public function testAccountPUT()
    {
        // Update
        $resource = $this->service->resource('account');
        $resource->get();
        $resource->Update(array(
            'metadata' => array(
                'key' => 'Lorem ipsum'
            )
        ));
        
        // Retrieve back again
        $resource->get();

        // Test
        $this->assertObjectHasAttribute('key', $resource->metadata);
    }

}