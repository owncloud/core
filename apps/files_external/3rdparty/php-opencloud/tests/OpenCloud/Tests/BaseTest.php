<?php
/**
 * Unit Tests
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @version 1.0.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */
 
namespace OpenCloud\Tests;

use OpenCloud\Common\Lang;
use OpenCloud\Common\Debug;

/**
 * Can't test Base directly, since it is an abstract class, so we instantiate it
 */

class MyBase extends \OpenCloud\Common\Base 
{    
    public $foo; // to test SetProperty
    
    public function GetHttpRequestObject($url, $method='GET', array $options = array()) 
    {
        return parent::GetHttpRequestObject($url, $method);
    }
}

class BaseTest extends \PHPUnit_Framework_TestCase
{
	private $my;

	/**
	 * create our redirected Base class
	 */
	public function __construct() {
		$this->my = new MyBase;
	}

	/**
	 * Tests
	 */
	public function test_gettext() {
		$this->assertEquals(Lang::translate('Hello'), 'Hello');
	}
	public function test_noslash() {
		$this->assertEquals(Lang::noslash('String/'), 'String');
		$this->assertEquals(Lang::noslash('String'), 'String');
	}
	public function testDebug() 
	{
        $this->my->setDebug(true);
        $this->my->debug("HELLO, WORLD!");
	    $this->expectOutputRegex('/ELLO/');
	    $this->my->setDebug(false);
	}
	/**
	 * @expectedException OpenCloud\Common\Exceptions\URLError
	 */
	public function testUrl() {
		$this->my->Url();
	}
	public function testGetHttpRequestObject() {
	    $request = $this->my->GetHttpRequestObject('file:/dev/null');
	    $this->assertEquals(
	        'OpenCloud\Common\Request\Curl',
	        get_class($request));
	}
	public function test__set() 
	{
		//$this->setExpectedException('OpenCloud\Common\Exceptions\AttributeError');
		//$this->expectOutputRegEx('/Unrecognized attribute/');
	}
	public function testMakeQueryString() {
	    $this->assertEquals(
	        'A=1',
	        $this->my->MakeQueryString(array('A'=>1)));
	    $this->assertEquals(
	        'A=1&B=2',
	        $this->my->MakeQueryString(array('A'=>1,'B'=>2)));
	    $this->assertEquals(
	        'A=1&B=False',
	        $this->my->MakeQueryString(array('A'=>1,'B'=>FALSE)));
	    $this->assertEquals(
	        'A=1&B=True',
	        $this->my->MakeQueryString(array('A'=>1,'B'=>TRUE)));
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\JsonError
	 */
	public function testCheckJsonError() {
	    $json = '{"one":"two"}';
	    $obj = json_decode($json);
	    $this->assertEquals(FALSE, $this->my->CheckJsonError());
	    $json = '{"one":"two"';
	    $obj = json_decode($json);
	    $this->assertEquals(TRUE, $this->my->CheckJsonError());
	}
	public function testSetProperty() {
	    if (RAXSDK_STRICT_PROPERTY_CHECKS) {
			$this->setExpectedException('OpenCloud\Common\Exceptions\AttributeError');
		}
		$this->my->foo = 'bar';
	    $this->assertEquals('bar', $this->my->foo);
	    $this->my->SetProperty('one', 'two');
	    $this->assertEquals('two', $this->my->one);
	}
}
