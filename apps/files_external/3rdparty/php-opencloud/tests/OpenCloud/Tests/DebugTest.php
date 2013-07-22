<?php

namespace OpenCloud\Tests;

use OpenCloud\ObjectStore\Service;
use OpenCloud\Common\Request\Response\Blank as BlankRequest;
use OpenCloud\Common\Debug;
use OpenCloud\OpenStack;

require_once('StubConnection.php');

/**
 * Set up a mock service object and override the Request method.
 * 
 * @extends Service
 */
class MockService extends Service 
{
	
	public function Request($url, $method = 'GET', array $headers = array(), $body = null) 
	{
		return new BlankRequest;
	}
	
}

/**
 * Main Test class.
 */
class DebugTest extends \PHPUnit_Framework_TestCase
{

	private $mockService;
	private $connection;
	
	private $debugPrefix;
	private $debugMessage = 'Test output message with parameters: %d %s %d';
	private $debugParam1 = 1000;
	private $debugParam2 = 'STRING';
	private $debugParam3 = true;
	
	private $debugObject;
	
	public function __construct() 
	{
		$this->connection = new StubConnection('http://example.com', 'SECRET');
		
		$this->mockService = new MockService(
			$this->connection,
			'cloudFiles',
			'DFW',
			'publicURL'
		);
		
		$this->debugPrefix = 'DEBUG : (' . get_class($this->mockService) . ') : ';
	}

	private function genericDebugCall()
	{
    	return $this->mockService->debug(
            $this->debugMessage,
            $this->debugParam1,
            $this->debugParam2,
            $this->debugParam3
        );
    }
	
	public function testBegin()
	{
    	$this->assertEquals(2 + 2, 4);
	}
	
	public function testEnableDebug()
	{
    	$this->mockService->setDebug(true);
    	$this->assertTrue($this->mockService->getDebug());
	}
	
	public function testEmptyWhenDebugDisabled()
	{
    	$this->assertEmpty($this->mockService->debug($this->debugMessage));
	}
	
	public function testMessageWhenDebugEnabled()
	{ 
	    // Enable debugging and set to return
	    $this->mockService->setDebug(true);
	    $this->mockService->setDebugOutputStyle(false);
	    
    	$this->assertEquals(
    	   $this->debugPrefix . 'Test output message with parameters: 1000 STRING 1',
    	   trim($this->genericDebugCall())
    	);
	}
	
	public function testEchoOutputStyle()
	{
    	$this->mockService->setDebug(true);

    	// Set output style to echo and test for string output
    	$this->genericDebugCall();
    	$this->expectOutputRegex('/DEBUG/');
	}
	
	public function testReturnOutputStyle()
	{
    	$this->mockService->setDebug(true);
    	
    	// Set output style to return and test for no output
    	$this->mockService->setDebugOutputStyle(false);
    	$this->genericDebugCall();
    	$this->expectOutputString('');
	}

	public function testDebugInvestigate()
	{
    	Debug::investigate($this->mockService);
    	// Has prefix?
    	$this->expectOutputRegex('/DEBUG/');
    	// Has fully-qualified classname?
    	$this->expectOutputRegex('/OpenCloud\\\Tests\\\MockService/');
    	// Has name of parent class?
    	$this->expectOutputRegex('/OpenCloud\\\ObjectStore\\\Service/');
	}

}
