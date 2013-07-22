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

define('TESTDATA',<<<ENDTESTDATA
Four score and seven years ago, our
fathers brought forth on this continent
a new nation, conceived in Liberty, and
dedicated to the proposition that all
men were created equal.
ENDTESTDATA
);

use OpenCloud\Common\Request\Curl;
use OpenCloud\Common\Request\Response\Http;

// stub for request
class MyStubRequest extends Curl {
    public function info() {
        parent::info();
        return array('http_code'=>'200');
    }
    public function errno() {
        parent::errno();
        return 0;
    }
    public function error() {
        parent::error();
        return 'NOPE';
    }
    public function ReturnHeaders() {
    	return array(
    		"HTTP/1.1 200 OK\r\n",
    		"Content-Type: text/plain\r\n",
    		"X-Test-Header: Nothing\r\n"
    	);
    }
}

class HttpResponseTest extends \PHPUnit_Framework_TestCase
{
    private $response;

    private $nullFile;

    public function __construct() 
    {
        $this->nullFile = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? 'NUL' : '/dev/null';

        $request = new MyStubRequest('file:' . $this->nullFile);
        $this->response = new Http(
            $request,
            TESTDATA);
    }
    /**
     * Tests
     */
    public function test__construct() {
    	$req = new Curl('file:' . $this->nullFile);
    	$req->SetOption(CURLOPT_RETURNTRANSFER, TRUE);
    	$req->SetConnectTimeout(20);
    	$req->SetHttpTimeout(20);
    	$req->SetRetries(2);
    	$req->setheaders(array());
    	$req->SetHeader('X-Transfer-Name', 'Glen Campbell');
    	$req->Execute();
    	$req->info();
    	$req->errno();
    	$req->error();
    	$req->ReturnHeaders();
    	$req->_get_header_cb(curl_init('http://example.com'), 'X-Status: Blame');
    	$this->response = new Http(
    		$req,
    		TESTDATA);
        $this->assertGreaterThan(0, count($this->response->Headers()));
    	$this->assertEquals('', $req->close());
    }
    public function testHttpBody() {
        $this->assertEquals('Four', substr($this->response->HttpBody(), 0, 4));
    }
    public function testHeaders() {
    	$harr = $this->response->Headers();
        $this->assertEquals(3, sizeof($harr));
        foreach($harr as $name => $value)
        	$this->assertEquals(
        		trim($value),
        		$value);
    }
    public function testHeader() {
        $this->assertEquals(
            'Nothing',
            $this->response->Header('X-Test-Header'));
    }
    public function testinfo() {
        $this->assertEquals(TRUE, is_array($this->response->info()));
    }
    public function testerrno() {
        $this->assertEquals(0, $this->response->errno());
    }
    public function testerror() {
        $this->assertEquals('NOPE', $this->response->error());
    }
    public function testHttpStatus() {
        $this->assertEquals(200, $this->response->HttpStatus());
    }
}
