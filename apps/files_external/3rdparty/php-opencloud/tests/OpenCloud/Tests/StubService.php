<?php
// (c)2012 Rackspace Hosting
// See COPYING for licensing information

namespace OpenCloud\Tests;

define('SERVICE_RESPONSE', <<<ENDRESPONSE
HTTP/1.1 200 OK
Content-Length: 0
Content-Type: application/json

ENDRESPONSE
);

/**
 * Since Service is an abstract class, we'll build a wrapper class so that
 * we can test it.
 */
class StubService extends \OpenCloud\Common\Service {

	public function Request( $url, $method='GET', array $headers=array(), $body=Null ) {
		//return parent::Request( $url, $method, $headers, $body );
		if (preg_match('/extensions$/', $url))
			$body = file_get_contents(TESTDIR.'/extensions.json');
		else if (preg_match('/limits$/', $url))
			$body = file_get_contents(TESTDIR.'/limits.json');
		else $body = SERVICE_RESPONSE;
		return new \OpenCloud\Common\Request\Response\Blank(
			array('body'=>$body));
	}
	public function Container() {
		return new \OpenCloud\ObjectStore\Container($this);
	}
	public function CDN() { return NULL; }
}
