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

require_once('StubConnection.php'); // stub Connection class

if (!defined('TEST_DOMAIN')) define('TEST_DOMAIN', 'http://local.test');

/**
 * stub classes for testing the request() method (which is overridden in the
 * StubConnection class used for testing everything else).
 */
class TestingConnection extends \OpenCloud\OpenStack 
{
    public function GetHttpRequestObject($url, $method = 'GET', array $options = array())  
    {
        return new StubRequest($url, $method);
    }
}

class OpenStackTest extends \PHPUnit_Framework_TestCase
{
	private $my; // my Connection

	private $nullFile;

	public function __construct() 
	{
		$this->nullFile = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? 'NUL' : '/dev/null';

		$this->my = new StubConnection(TEST_DOMAIN,
			array('username'=>'Foo', 'password'=>'Bar'));
	}

	/**
	 * Tests
	 */
	public function test__construct() {
	    $this->assertEquals(
	        'OpenCloud\Tests\StubConnection',
	        get_class($this->my));
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\DomainError
	 */
	public function test__options() {
		$test = new StubConnection(TEST_DOMAIN,
			array('username'=>'Foo', 'password'=>'Bar'),
			'bad option');
	}
	public function testUrl() {
		$this->assertEquals(TEST_DOMAIN.'/tokens', $this->my->Url());
	}
	public function testSecret() {
		$arr = $this->my->Secret();
		$this->assertEquals($arr['username'], 'Foo');
	}
	public function testToken() {
		$this->assertEquals('TOKEN-ID', $this->my->Token());
	}
	public function testTenant() {
		$this->assertEquals('TENANT-ID', $this->my->Tenant());
	}
	public function testExpiration() {
		$this->assertEquals('978374510', $this->my->Expiration());
	}
	public function testServiceCatalog() {
		$cat = $this->my->serviceCatalog();
		$this->assertEquals('DFW', $cat[0]->endpoints[0]->region);
	}
	public function testCredentials() {
		$this->assertRegExp(
		    '/"passwordCredentials"/',
		    $this->my->Credentials());
	    $test = new StubConnection(TEST_DOMAIN,
	        array('username'=>'Foo', 'password'=>'Bar', 'tenantName'=>'Phil'));
	    $this->assertRegExp(
	        '/"tenantName":"Phil"/',
	        $test->Credentials());
	}
	public function testAuthenticate() {
	    $this->my->Authenticate();
	    $this->assertEquals('TOKEN-ID', $this->my->Token());
	}
	/**
	 * Since the request() method is overridden in the StubConnection class,
	 * we need to get this one to use the real code.
	 */
	public function testRequest() {
	    $conn = new TestingConnection('http://example.com',
			array('username'=>'Foo', 'password'=>'Bar'));
	    $response = $conn->Request('GOOD');
	    $this->assertEquals(200, $response->HttpStatus());
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\HttpUnauthorizedError
	 */
	public function test_request_2() {
	    $conn = new TestingConnection('http://example.com',
			array('username'=>'Foo', 'password'=>'Bar'));
	    $response = $conn->Request('401');
	    $this->assertEquals(200, $response->HttpStatus());
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\HttpForbiddenError
	 */
	public function test_request_3() {
	    $conn = new TestingConnection('http://example.com',
			array('username'=>'Foo', 'password'=>'Bar'));
	    $response = $conn->Request('403');
	    $this->assertEquals(200, $response->HttpStatus());
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\HttpOverLimitError
	 */
	public function test_request_4() {
	    $conn = new TestingConnection('http://example.com',
			array('username'=>'Foo', 'password'=>'Bar'));
	    $response = $conn->Request('413');
	    $this->assertEquals(200, $response->HttpStatus());
	}
	public function testAppendUserAgent() {
	    $this->my->AppendUserAgent('FOOBAR');
	    $this->assertEquals(
	        RAXSDK_USER_AGENT.';FOOBAR',
	        $this->my->useragent);
	}
	public function testSetDefaults() {
	    $this->my->SetDefaults('Compute','cloudServersOpenStack','DFW');
	    $comp = $this->my->Compute();
	    $this->assertRegExp('/dfw.servers/', $comp->Url());
	}
	public function testSetTimeouts() {
	    $this->assertEquals(NULL, $this->my->SetTimeouts(10, 10));
	}
	public function testSetUploadProgressCallback() {
		$this->my->SetUploadProgressCallback('foo');
	}
	public function testSetDownloadProgressCallback() {
		$this->my->SetDownloadProgressCallback('bar');
	}
	public function test_read_cb() {
		$fp = fopen($this->nullFile, 'r');
		$this->assertEquals(
			'',
			$this->my->_read_cb(NULL, $fp, 1024));
		fclose($fp);
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\HttpUrlError
	 */
	public function test_write_cb() {
		$ch = curl_init('file:' . $this->nullFile);
		$len = $this->my->_write_cb($ch, 'FOOBAR');
		$this->assertEquals(6, $len);
	}
	public function testExportCredentials() {
		$this->my->Authenticate();
		$arr = $this->my->ExportCredentials();
		$this->assertEquals(
			TRUE,
			is_array($arr));
		$this->assertEquals(
			TRUE,
			is_array($arr['catalog']));
	}
	public function testImportCredentials() {
		$this->my->Authenticate();
		$arr = $this->my->ExportCredentials();
		$conn = new StubConnection(TEST_DOMAIN,
			array('username'=>'Foo', 'password'=>'Bar'));
		$conn->ImportCredentials($arr);
		$this->assertEquals(
			$arr['token'],
			$conn->Token());
	}
	public function testObjectStore() {
	    $objs = $this->my->ObjectStore(
	        'cloudFiles',
	        'DFW',
	        'publicURL'
	    );
	    $this->assertEquals('OpenCloud\ObjectStore\Service', get_class($objs));
	}
	public function testCompute1() {
	    $comp = $this->my->Compute(
	        'cloudServersOpenStack',
	        'DFW',
	        'publicURL'
	    );
	    $this->assertEquals('OpenCloud\Compute\Service', get_class($comp));
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\ServiceValueError
	 */
	public function testCompute2() {
	    $comp = $this->my->Compute();
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\EndpointError
	 */
	public function testComputeFail() {
	    $comp = $this->my->Compute(
	        'FOOBAR',
	        'DFW',
	        'publicURL'
	    );
	    $this->assertEquals('OpenCloud\Compute\Service', get_class($comp));
	}
	public function testVolumeService() {
		$cbs = $this->my->VolumeService('cloudBlockStorage', 'DFW');
		$this->assertEquals(
			'OpenCloud\Volume\Service',
			get_class($cbs));
	}
	public function testServiceList() {
		$list = $this->my->ServiceList();
		while($item = $list->Next())
			$this->assertEquals(
				'OpenCloud\Common\ServiceCatalogItem',
				get_class($item));
	}
}
