<?php
/**
 * @copyright Copyright (c) 2013 Thomas Tanghus (thomas@tanghus.net)
 * @copyright Copyright (c) 2015 Lukas Reschke lukas@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\AppFramework\Http;

use OC\AppFramework\Http\Request;
use OC\Security\CSRF\CsrfToken;
use OC\Security\CSRF\CsrfTokenManager;
use OCP\IConfig;
use OCP\IRequest;
use OCP\Security\ISecureRandom;
use Test\TestCase;

/**
 * Class RequestTest
 *
 * @package OC\AppFramework\Http
 */
class RequestTest extends TestCase {
	/** @var string */
	protected $stream = 'fakeinput://data';
	/** @var ISecureRandom | \PHPUnit\Framework\MockObject\MockObject */
	protected $secureRandom;
	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	protected $config;
	/** @var CsrfTokenManager | \PHPUnit\Framework\MockObject\MockObject */
	protected $csrfTokenManager;

	protected function setUp(): void {
		parent::setUp();

		if (\in_array('fakeinput', \stream_get_wrappers())) {
			\stream_wrapper_unregister('fakeinput');
		}
		\stream_wrapper_register('fakeinput', 'Test\AppFramework\Http\RequestStream');

		$this->secureRandom = $this->getMockBuilder('\OCP\Security\ISecureRandom')->getMock();
		$this->config = $this->getMockBuilder('\OCP\IConfig')->getMock();
		$this->csrfTokenManager = $this->getMockBuilder('\OC\Security\CSRF\CsrfTokenManager')
			->disableOriginalConstructor()->getMock();
	}

	protected function tearDown(): void {
		\stream_wrapper_unregister('fakeinput');
		parent::tearDown();
	}

	public function testRequestAccessors() {
		$vars = [
			'get' => ['name' => 'John Q. Public', 'nickname' => 'Joey'],
			'method' => 'GET',
		];

		$request = new Request(
			$vars,
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		// Countable
		$this->assertCount(2, $request);
		// Array access
		$this->assertSame('Joey', $request['nickname']);
		// "Magic" accessors
		$this->assertSame('Joey', $request->{'nickname'});
		$this->assertArrayHasKey('nickname', $request);
		$this->assertTrue(isset($request->{'nickname'}));
		$this->assertFalse(isset($request->{'flickname'}));
		// Only testing 'get', but same approach for post, files etc.
		$this->assertSame('Joey', $request->get['nickname']);
		// Always returns null if variable not set.
		$this->assertNull($request->{'flickname'});
	}

	// urlParams has precedence over POST which has precedence over GET
	public function testPrecedence() {
		$vars = [
			'get' => ['name' => 'John Q. Public', 'nickname' => 'Joey'],
			'post' => ['name' => 'Jane Doe', 'nickname' => 'Janey'],
			'urlParams' => ['user' => 'jw', 'name' => 'Johnny Weissmüller'],
			'method' => 'GET'
		];

		$request = new Request(
			$vars,
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertCount(3, $request);
		$this->assertSame('Janey', $request->{'nickname'});
		$this->assertSame('Johnny Weissmüller', $request->{'name'});
	}

	/**
	 */
	public function testImmutableArrayAccess() {
		$this->expectException(\RuntimeException::class);

		$vars = [
			'get' => ['name' => 'John Q. Public', 'nickname' => 'Joey'],
			'method' => 'GET'
		];

		$request = new Request(
			$vars,
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$request['nickname'] = 'Janey';
	}

	/**
	 */
	public function testImmutableMagicAccess() {
		$this->expectException(\RuntimeException::class);

		$vars = [
			'get' => ['name' => 'John Q. Public', 'nickname' => 'Joey'],
			'method' => 'GET'
		];

		$request = new Request(
			$vars,
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$request->{'nickname'} = 'Janey';
	}

	/**
	 */
	public function testGetTheMethodRight() {
		$this->expectException(\LogicException::class);

		$vars = [
			'get' => ['name' => 'John Q. Public', 'nickname' => 'Joey'],
			'method' => 'GET',
		];

		$request = new Request(
			$vars,
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$request->post;
	}

	public function testTheMethodIsRight() {
		$vars = [
			'get' => ['name' => 'John Q. Public', 'nickname' => 'Joey'],
			'method' => 'GET',
		];

		$request = new Request(
			$vars,
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('GET', $request->method);
		$result = $request->get;
		$this->assertSame('John Q. Public', $result['name']);
		$this->assertSame('Joey', $result['nickname']);
	}

	public function testJsonPost() {
		global $data;
		$data = '{"name": "John Q. Public", "nickname": "Joey"}';
		$vars = [
			'method' => 'POST',
			'server' => ['CONTENT_TYPE' => 'application/json; utf-8']
		];

		$request = new Request(
			$vars,
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('POST', $request->method);
		$result = $request->post;
		$this->assertSame('John Q. Public', $result['name']);
		$this->assertSame('Joey', $result['nickname']);
		$this->assertSame('Joey', $request->params['nickname']);
		$this->assertSame('Joey', $request['nickname']);
	}

	public function testNotJsonPost() {
		global $data;
		$data = 'this is not valid json';
		$vars = [
			'method' => 'POST',
			'server' => ['CONTENT_TYPE' => 'application/json; utf-8']
		];

		$request = new Request(
			$vars,
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertEquals('POST', $request->method);
		$result = $request->post;
		// ensure there's no error attempting to decode the content
	}

	public function testPatch() {
		global $data;
		$data = \http_build_query(['name' => 'John Q. Public', 'nickname' => 'Joey'], '', '&');

		$vars = [
			'method' => 'PATCH',
			'server' => ['CONTENT_TYPE' => 'application/x-www-form-urlencoded'],
		];

		$request = new Request(
			$vars,
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('PATCH', $request->method);
		$result = $request->patch;

		$this->assertSame('John Q. Public', $result['name']);
		$this->assertSame('Joey', $result['nickname']);
	}

	public function testJsonPatchAndPut() {
		global $data;

		// PUT content
		$data = '{"name": "John Q. Public", "nickname": "Joey"}';
		$vars = [
			'method' => 'PUT',
			'server' => ['CONTENT_TYPE' => 'application/json; utf-8'],
		];

		$request = new Request(
			$vars,
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('PUT', $request->method);
		$result = $request->put;

		$this->assertSame('John Q. Public', $result['name']);
		$this->assertSame('Joey', $result['nickname']);

		// PATCH content
		$data = '{"name": "John Q. Public", "nickname": null}';
		$vars = [
			'method' => 'PATCH',
			'server' => ['CONTENT_TYPE' => 'application/json; utf-8'],
		];

		$request = new Request(
			$vars,
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('PATCH', $request->method);
		$result = $request->patch;

		$this->assertSame('John Q. Public', $result['name']);
		$this->assertNull($result['nickname']);
	}

	public function testPutStream() {
		global $data;
		$data = \file_get_contents(__DIR__ . '/../../../data/testimage.png');

		$vars = [
			'put' => $data,
			'method' => 'PUT',
			'server' => [
				'CONTENT_TYPE' => 'image/png',
				'CONTENT_LENGTH' => \strlen($data),
			],
		];

		$request = new Request(
			$vars,
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('PUT', $request->method);
		$resource = $request->put;
		$contents = \stream_get_contents($resource);
		$this->assertSame($data, $contents);

		try {
			$resource = $request->put;
		} catch (\LogicException $e) {
			return;
		}
		$this->fail('Expected LogicException.');
	}

	public function testDoubleGetParamOnPut() {
		$vars = [
			'method' => 'PUT',
			'server' => [],
		];

		$request = new Request(
			$vars,
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		// trigger decoding of the request
		$request->getParam('foo');

		$request->setUrlParameters([
			'var1' => 'value1',
			'var2' => 'value2'
		]);

		// it should be possible to get unlimited number of URL parameters
		// without reading the request body
		$var1 = $request->getParam('var1');
		$var2 = $request->getParam('var2');

		$this->assertEquals('value1', $var1);
		$this->assertEquals('value2', $var2);
	}

	public function testSetUrlParameters() {
		$vars = [
			'post' => [],
			'method' => 'POST',
			'urlParams' => ['id' => '2'],
		];

		$request = new Request(
			$vars,
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$newParams = ['id' => '3', 'test' => 'test2'];
		$request->setUrlParameters($newParams);
		$this->assertSame('test2', $request->getParam('test'));
		$this->assertEquals('3', $request->getParam('id'));
		$this->assertEquals('3', $request->getParams()['id']);
	}

	public function testGetIdWithModUnique() {
		$vars = [
			'server' => [
				'UNIQUE_ID' => 'GeneratedUniqueIdByModUnique'
			],
		];

		$request = new Request(
			$vars,
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('GeneratedUniqueIdByModUnique', $request->getId());
	}

	public function providesGetIdWithValidXRequestID() {
		return [
			['6241e4ae-ca5d-49e6-948c-6c9e20624361'],
			['6241e4ae+ca5d+49e6+948c+6c9e20624361'],
			['6241e4ae/ca5d/49e6/948c/6c9e20624361'],
			['6241e4ae_ca5d_49e6_948c_6c9e20624361'],
			['6241e4ae=ca5d=49e6=948c=6c9e20624361'],
			['6241e4ae.ca5d.49e6.948c.6c9e20624361'],
			['6241e4ae:ca5d:49e6:948c:6c9e20624361'],
			['12-34-56-78-9A-BC_1985-04-12T23:20:50.52Z'],
		];
	}

	/**
	 * @dataProvider providesGetIdWithValidXRequestID
	 */
	public function testGetIdWithValidXRequestID($xRequestID) {
		$vars = [
			'server' => [
				'HTTP_X_REQUEST_ID' => $xRequestID
			],
		];

		$request = new Request(
			$vars,
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame($xRequestID, $request->getId());
	}
	public function providesGetIdWithInvalidXRequestID() {
		return [
			['too-short'],
			[
				'too-long--too-long--too-long--too-long--too-long--'.
				'too-long--too-long--too-long--too-long--too-long--'.
				'too-long--too-long--too-long--too-long--too-long--'.
				'too-long--too-long--too-long--too-long--too-long--x'
			],
			['6241e4ae ca5d 49e6 948c 6c9e20624361'],
			['6241e4ae#ca5d#49e6#948c#6c9e20624361'],
			['6241e4ae%ca5d%49e6%948c%6c9e20624361'],
			['6241e4ae"ca5d"49e6"948c"6c9e20624361'],
			['6241e4ae\'ca5d\'49e6\'948c\'6c9e20624361'],
		];
	}

	/**
	 * @dataProvider providesGetIdWithInvalidXRequestID
	 */
	public function testGetIdWithInvalidXRequestID($xRequestID) {
		$this->expectException(\InvalidArgumentException::class);

		$vars = [
			'server' => [
				'HTTP_X_REQUEST_ID' => $xRequestID
			],
		];

		$request = new Request(
			$vars,
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$request->getId();
	}

	public function testGetIdWithoutModUnique() {
		$this->secureRandom->expects($this->once())
			->method('generate')
			->with('20')
			->will($this->returnValue('GeneratedByOwnCloudItself'));

		$request = new Request(
			[],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('GeneratedByOwnCloudItself', $request->getId());
	}

	public function testGetIdWithoutModUniqueStable() {
		$request = new Request(
			[],
			\OC::$server->getSecureRandom(),
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);
		$firstId = $request->getId();
		$secondId = $request->getId();
		$this->assertSame($firstId, $secondId);
	}

	public function testGetRemoteAddressWithoutTrustedRemote() {
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->with('trusted_proxies')
			->will($this->returnValue([]));

		$request = new Request(
			[
				'server' => [
					'REMOTE_ADDR' => '10.0.0.2',
					'HTTP_X_FORWAR	DED' => '10.4.0.5, 10.4.0.4',
					'HTTP_X_FORWARDED_FOR' => '192.168.0.233'
				],
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('10.0.0.2', $request->getRemoteAddress());
	}

	public function testGetRemoteAddressWithNoTrustedHeader() {
		$this->config
			->expects($this->exactly(2))
			->method('getSystemValue')
			->withConsecutive(
				['trusted_proxies'],
				['forwarded_for_headers'],
			)
			->willReturnOnConsecutiveCalls(
				['10.0.0.2'],
				[],
			);

		$request = new Request(
			[
				'server' => [
					'REMOTE_ADDR' => '10.0.0.2',
					'HTTP_X_FORWARDED' => '10.4.0.5, 10.4.0.4',
					'HTTP_X_FORWARDED_FOR' => '192.168.0.233'
				],
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('10.0.0.2', $request->getRemoteAddress());
	}

	public function testGetRemoteAddressWithSingleTrustedRemote() {
		$this->config
			->expects($this->exactly(2))
			->method('getSystemValue')
			->withConsecutive(
				['trusted_proxies'],
				['forwarded_for_headers'],
			)
			->willReturnOnConsecutiveCalls(
				['10.0.0.2'],
				['HTTP_X_FORWARDED'],
			);

		$request = new Request(
			[
				'server' => [
					'REMOTE_ADDR' => '10.0.0.2',
					'HTTP_X_FORWARDED' => '10.4.0.5, 10.4.0.4',
					'HTTP_X_FORWARDED_FOR' => '192.168.0.233'
				],
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('10.4.0.5', $request->getRemoteAddress());
	}

	public function testGetRemoteAddressVerifyPriorityHeader() {
		$this->config
			->expects($this->exactly(2))
			->method('getSystemValue')
			->withConsecutive(
				['trusted_proxies'],
				['forwarded_for_headers'],
			)
			->willReturnOnConsecutiveCalls(
				['10.0.0.2'],
				['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED'],
			);

		$request = new Request(
			[
				'server' => [
					'REMOTE_ADDR' => '10.0.0.2',
					'HTTP_X_FORWARDED' => '10.4.0.5, 10.4.0.4',
					'HTTP_X_FORWARDED_FOR' => '192.168.0.233'
				],
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('192.168.0.233', $request->getRemoteAddress());
	}

	/**
	 * @return array
	 */
	public function httpProtocolProvider() {
		return [
			// Valid HTTP 1.0
			['HTTP/1.0', 'HTTP/1.0'],
			['http/1.0', 'HTTP/1.0'],
			['HTTp/1.0', 'HTTP/1.0'],

			// Valid HTTP 1.1
			['HTTP/1.1', 'HTTP/1.1'],
			['http/1.1', 'HTTP/1.1'],
			['HTTp/1.1', 'HTTP/1.1'],

			// Valid HTTP 2.0
			['HTTP/2', 'HTTP/2'],
			['http/2', 'HTTP/2'],
			['HTTp/2', 'HTTP/2'],

			// Invalid
			['HTTp/394', 'HTTP/1.1'],
			['InvalidProvider/1.1', 'HTTP/1.1'],
			[null, 'HTTP/1.1'],
			['', 'HTTP/1.1'],

		];
	}

	/**
	 * @dataProvider httpProtocolProvider
	 *
	 * @param mixed $input
	 * @param string $expected
	 */
	public function testGetHttpProtocol($input, $expected) {
		$request = new Request(
			[
				'server' => [
					'SERVER_PROTOCOL' => $input,
				],
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame($expected, $request->getHttpProtocol());
	}

	public function testGetServerProtocolWithOverride() {
		$this->config
			->expects($this->exactly(3))
			->method('getSystemValue')
			->withConsecutive(
				['overwriteprotocol'],
				['overwritecondaddr'],
				['overwriteprotocol'],
			)
			->willReturnOnConsecutiveCalls(
				'customProtocol',
				'',
				'customProtocol',
			);

		$request = new Request(
			[],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('customProtocol', $request->getServerProtocol());
	}

	public function testGetServerProtocolWithProtoValid() {
		$this->config
			->expects($this->exactly(2))
			->method('getSystemValue')
			->with('overwriteprotocol')
			->will($this->returnValue(''));

		$requestHttps = new Request(
			[
				'server' => [
					'HTTP_X_FORWARDED_PROTO' => 'HtTpS'
				],
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);
		$requestHttp = new Request(
			[
				'server' => [
					'HTTP_X_FORWARDED_PROTO' => 'HTTp'
				],
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('https', $requestHttps->getServerProtocol());
		$this->assertSame('http', $requestHttp->getServerProtocol());
	}

	public function testGetServerProtocolWithHttpsServerValueOn() {
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->with('overwriteprotocol')
			->will($this->returnValue(''));

		$request = new Request(
			[
				'server' => [
					'HTTPS' => 'on'
				],
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);
		$this->assertSame('https', $request->getServerProtocol());
	}

	public function testGetServerProtocolWithHttpsServerValueOff() {
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->with('overwriteprotocol')
			->will($this->returnValue(''));

		$request = new Request(
			[
				'server' => [
					'HTTPS' => 'off'
				],
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);
		$this->assertSame('http', $request->getServerProtocol());
	}

	public function testGetServerProtocolWithHttpsServerValueEmpty() {
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->with('overwriteprotocol')
			->will($this->returnValue(''));

		$request = new Request(
			[
				'server' => [
					'HTTPS' => ''
				],
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);
		$this->assertSame('http', $request->getServerProtocol());
	}

	public function testGetServerProtocolDefault() {
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->with('overwriteprotocol')
			->will($this->returnValue(''));

		$request = new Request(
			[],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);
		$this->assertSame('http', $request->getServerProtocol());
	}

	public function testGetServerProtocolBehindLoadBalancers() {
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->with('overwriteprotocol')
			->will($this->returnValue(''));

		$request = new Request(
			[
				'server' => [
					'HTTP_X_FORWARDED_PROTO' => 'https,http,http'
				],
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('https', $request->getServerProtocol());
	}

	/**
	 * @dataProvider userAgentProvider
	 * @param string $testAgent
	 * @param array $userAgent
	 * @param bool $matches
	 */
	public function testUserAgent($testAgent, $userAgent, $matches) {
		$request = new Request(
			[
						'server' => [
								'HTTP_USER_AGENT' => $testAgent,
						]
				],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame($matches, $request->isUserAgent($userAgent));
	}

	/**
	 * @dataProvider userAgentProvider
	 * @param string $testAgent
	 * @param array $userAgent
	 * @param bool $matches
	 */
	public function testUndefinedUserAgent($testAgent, $userAgent, $matches) {
		$request = new Request(
			[],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertFalse($request->isUserAgent($userAgent));
	}

	/**
	 * @return array
	 */
	public function userAgentProvider() {
		return [
			[
				'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0)',
				[
					Request::USER_AGENT_IE
				],
				true,
			],
			[
				'Mozilla/5.0 (X11; Linux i686; rv:24.0) Gecko/20100101 Firefox/24.0',
				[
					Request::USER_AGENT_IE
				],
				false,
			],
			[
				'Mozilla/5.0 (Linux; Android 4.4; Nexus 4 Build/KRT16S) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.59 Mobile Safari/537.36',
				[
					Request::USER_AGENT_ANDROID_MOBILE_CHROME
				],
				true,
			],
			[
				'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0)',
				[
					Request::USER_AGENT_ANDROID_MOBILE_CHROME
				],
				false,
			],
			[
				'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0)',
				[
					Request::USER_AGENT_IE,
					Request::USER_AGENT_ANDROID_MOBILE_CHROME,
				],
				true,
			],
			[
				'Mozilla/5.0 (Linux; Android 4.4; Nexus 4 Build/KRT16S) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.59 Mobile Safari/537.36',
				[
					Request::USER_AGENT_IE,
					Request::USER_AGENT_ANDROID_MOBILE_CHROME,
				],
				true,
			],
			[
				'Mozilla/5.0 (X11; Linux i686; rv:24.0) Gecko/20100101 Firefox/24.0',
				[
					Request::USER_AGENT_FREEBOX
				],
				false,
			],
			[
				'Mozilla/5.0',
				[
					Request::USER_AGENT_FREEBOX
				],
				true,
			],
			[
				'Fake Mozilla/5.0',
				[
					Request::USER_AGENT_FREEBOX
				],
				false,
			],
		];
	}

	public function testInsecureServerHostServerNameHeader() {
		$request = new Request(
			[
				'server' => [
					'SERVER_NAME' => 'from.server.name:8080',
				]
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('from.server.name:8080', $request->getInsecureServerHost());
	}

	public function testInsecureServerHostHttpHostHeader() {
		$request = new Request(
			[
				'server' => [
					'SERVER_NAME' => 'from.server.name:8080',
					'HTTP_HOST' => 'from.host.header:8080',
				]
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('from.host.header:8080', $request->getInsecureServerHost());
	}

	public function testInsecureServerHostHttpFromForwardedHeaderSingle() {
		$request = new Request(
			[
				'server' => [
					'SERVER_NAME' => 'from.server.name:8080',
					'HTTP_HOST' => 'from.host.header:8080',
					'HTTP_X_FORWARDED_HOST' => 'from.forwarded.host:8080',
				]
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('from.forwarded.host:8080', $request->getInsecureServerHost());
	}

	public function testInsecureServerHostHttpFromForwardedHeaderStacked() {
		$request = new Request(
			[
				'server' => [
					'SERVER_NAME' => 'from.server.name:8080',
					'HTTP_HOST' => 'from.host.header:8080',
					'HTTP_X_FORWARDED_HOST' => 'from.forwarded.host2:8080,another.one:9000',
				]
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('from.forwarded.host2:8080', $request->getInsecureServerHost());
	}

	public function testGetServerHostWithOverwriteHost() {
		$this->config
			->expects($this->exactly(3))
			->method('getSystemValue')
			->withConsecutive(
				['overwritehost'],
				['overwritecondaddr'],
				['overwritehost'],
			)
			->willReturnOnConsecutiveCalls(
				'my.overwritten.host',
				'',
				'my.overwritten.host',
			);

		$request = new Request(
			[],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('my.overwritten.host', $request->getServerHost());
	}

	public function testGetServerHostWithTrustedDomain() {
		$this->config
			->expects($this->exactly(2))
			->method('getSystemValue')
			->withConsecutive(
				['overwritehost'],
				['trusted_domains'],
			)
			->willReturnOnConsecutiveCalls(
				'',
				['my.trusted.host'],
			);

		$request = new Request(
			[
				'server' => [
					'HTTP_X_FORWARDED_HOST' => 'my.trusted.host',
				],
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('my.trusted.host', $request->getServerHost());
	}

	public function testGetServerHostWithUntrustedDomain() {
		$this->config
			->expects($this->exactly(3))
			->method('getSystemValue')
			->withConsecutive(
				['overwritehost'],
				['trusted_domains'],
				['trusted_domains'],
			)
			->willReturnOnConsecutiveCalls(
				'',
				['my.trusted.host'],
				['my.trusted.host'],
			);

		$request = new Request(
			[
				'server' => [
					'HTTP_X_FORWARDED_HOST' => 'my.untrusted.host',
				],
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('my.trusted.host', $request->getServerHost());
	}

	public function testGetServerHostWithNoTrustedDomain() {
		$this->config
			->expects($this->exactly(3))
			->method('getSystemValue')
			->withConsecutive(
				['overwritehost'],
				['trusted_domains'],
				['trusted_domains'],
			)
			->willReturnOnConsecutiveCalls(
				'',
				[],
				[],
			);

		$request = new Request(
			[
				'server' => [
					'HTTP_X_FORWARDED_HOST' => 'my.untrusted.host',
				],
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('', $request->getServerHost());
	}

	public function testGetOverwriteHostDefaultNull() {
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->with('overwritehost')
			->will($this->returnValue(''));
		$request = new Request(
			[],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertNull(self::invokePrivate($request, 'getOverwriteHost'));
	}

	public function testGetOverwriteHostWithOverwrite() {
		$this->config
			->expects($this->exactly(3))
			->method('getSystemValue')
			->withConsecutive(
				['overwritehost'],
				['overwritecondaddr'],
				['overwritehost'],
			)
			->willReturnOnConsecutiveCalls(
				'www.owncloud.com',
				'',
				'www.owncloud.com',
			);

		$request = new Request(
			[],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('www.owncloud.com', self::invokePrivate($request, 'getOverwriteHost'));
	}

	public function testGetPathInfoWithSetEnv() {
		$request = new Request(
			[
				'server' => [
					'PATH_INFO' => 'apps/files/',
				]
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('apps/files/', $request->getPathInfo());
	}

	public function testGetPathInfoWithPathInfoBeingEmpty() {
		$request = new Request(
			[
				'server' => [
					'PATH_INFO' => '',
					'REQUEST_URI' => '/index.php/apps/files/?dir=/',
					'SCRIPT_NAME' => 'index.php'
				]
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame('/apps/files/', $request->getPathInfo());
	}

	/**
	 */
	public function testGetPathInfoNotProcessible() {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('The requested uri(/foo.php) cannot be processed by the script \'/var/www/index.php\')');

		$request = new Request(
			[
				'server' => [
					'REQUEST_URI' => '/foo.php',
					'SCRIPT_NAME' => '/var/www/index.php',
				]
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$request->getPathInfo();
	}

	/**
	 */
	public function testGetRawPathInfoNotProcessible() {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('The requested uri(/foo.php) cannot be processed by the script \'/var/www/index.php\')');

		$request = new Request(
			[
				'server' => [
					'REQUEST_URI' => '/foo.php',
					'SCRIPT_NAME' => '/var/www/index.php',
				]
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$request->getRawPathInfo();
	}

	/**
	 * @dataProvider genericPathInfoProvider
	 * @param string $requestUri
	 * @param string $scriptName
	 * @param string $expected
	 */
	public function testGetPathInfoWithoutSetEnvGeneric($requestUri, $scriptName, $expected) {
		$request = new Request(
			[
				'server' => [
					'REQUEST_URI' => $requestUri,
					'SCRIPT_NAME' => $scriptName,
				]
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame($expected, $request->getPathInfo());
	}

	/**
	 * @dataProvider genericPathInfoProvider
	 * @param string $requestUri
	 * @param string $scriptName
	 * @param string $expectedGetPathInfo
	 * @param string $expectedGetRawPathInfo
	 */
	public function testGetRawPathInfoWithoutSetEnvGeneric($requestUri, $scriptName, $expectedGetPathInfo, $expectedGetRawPathInfo): void {
		if ($expectedGetRawPathInfo === '') {
			$expected = $expectedGetPathInfo;
		} else {
			$expected = $expectedGetRawPathInfo;
		}
		$request = new Request(
			[
				'server' => [
					'REQUEST_URI' => $requestUri,
					'SCRIPT_NAME' => $scriptName,
				]
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame($expected, $request->getRawPathInfo());
	}

	/**
	 * @dataProvider rawPathInfoProvider
	 * @param string $requestUri
	 * @param string $scriptName
	 * @param string $expected
	 */
	public function testGetRawPathInfoWithoutSetEnv($requestUri, $scriptName, $expected) {
		$request = new Request(
			[
				'server' => [
					'REQUEST_URI' => $requestUri,
					'SCRIPT_NAME' => $scriptName,
				]
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame($expected, $request->getRawPathInfo());
	}

	/**
	 * @dataProvider pathInfoProvider
	 * @param string $requestUri
	 * @param string $scriptName
	 * @param string $expected
	 */
	public function testGetPathInfoWithoutSetEnv($requestUri, $scriptName, $expected) {
		$request = new Request(
			[
				'server' => [
					'REQUEST_URI' => $requestUri,
					'SCRIPT_NAME' => $scriptName,
				]
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame($expected, $request->getPathInfo());
	}

	/**
	 * @return array
	 */
	public function genericPathInfoProvider(): array {
		return [
			['/core/index.php?XDEBUG_SESSION_START=14600', '/core/index.php', '', ''],
			['/index.php/apps/files/', 'index.php', '/apps/files/', ''],
			['/index.php/apps/files/../&amp;/&?someQueryParameter=QueryParam', 'index.php', '/apps/files/../&amp;/&', ''],
			['/remote.php/漢字編碼方法 / 汉字编码方法', 'remote.php', '/漢字編碼方法 / 汉字编码方法', ''],
			['/remote.php/pound-cent-AE-%A3%A2%C6-in-ISO-8859-1', 'remote.php', '/pound-cent-AE-£¢Æ-in-ISO-8859-1', '/pound-cent-AE-%A3%A2%C6-in-ISO-8859-1'],
			['///removeTrailin//gSlashes///', 'remote.php', '/removeTrailin/gSlashes/', ''],
			['/remove/multiple/Slashes/In/ScriptName/', '//remote.php', '/remove/multiple/Slashes/In/ScriptName/', ''],
			['/', '/', '', ''],
			['', '', '', ''],
		];
	}

	/**
	 * @return array
	 */
	public function rawPathInfoProvider() {
		return [
			['/foo%2Fbar/subfolder', '', 'foo%2Fbar/subfolder'],
			['/foo/bar', 'remote.php', '/foo/bar'],
			['/foo/bar', '//remote.php', '/foo/bar'],
		];
	}

	/**
	 * @return array
	 */
	public function pathInfoProvider() {
		return [
			['/foo%2Fbar/subfolder', '', 'foo/bar/subfolder'],
		];
	}

	public function providesUri() {
		return[
			['/test.php', '/test.php'],
			['/remote.php/dav/files/user0/test_folder:5', '/remote.php/dav/files/user0/test_folder:5'],
			['/remote.php/dav/files/admin/welcome.txt', 'http://localhost:8080/remote.php/dav/files/admin/welcome.txt'],
			['/path?arg=value#anchor', 'http://username:password@hostname:9090/path?arg=value#anchor'],
			['/path:5?arg=value#anchor', 'http://username:password@hostname:9090/path:5?arg=value#anchor'],
			['', ''],
			['/test.php', '/test.php'],
		];
	}

	/**
	 * @dataProvider providesUri
	 */
	public function testGetRequestUriWithoutOverwrite($expectedUri, $requestUri) {
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->with('overwritewebroot')
			->will($this->returnValue(''));

		$request = new Request(
			[
				'server' => [
					'REQUEST_URI' => $requestUri
				]
			],
			$this->secureRandom,
			$this->config,
			$this->csrfTokenManager,
			$this->stream
		);

		$this->assertSame($expectedUri, $request->getRequestUri());
	}

	public function providesGetRequestUriWithOverwriteData() {
		return [
			['/scriptname.php/some/PathInfo', '/owncloud/', ''],
			['/scriptname.php/some/PathInfo', '/owncloud/', '123'],
		];
	}

	/**
	 * @dataProvider providesGetRequestUriWithOverwriteData
	 */
	public function testGetRequestUriWithOverwrite($expectedUri, $overwriteWebRoot, $overwriteCondAddr) {
		$this->config
			->expects($this->exactly(2))
			->method('getSystemValue')
			->withConsecutive(
				['overwritewebroot'],
				['overwritecondaddr'],
			)
			->willReturnOnConsecutiveCalls(
				$overwriteWebRoot,
				$overwriteCondAddr,
			);

		/** @var IRequest | \PHPUnit\Framework\MockObject\MockObject $request */
		$request = $this->getMockBuilder('\OC\AppFramework\Http\Request')
			->setMethods(['getScriptName'])
			->setConstructorArgs([
				[
					'server' => [
						'REQUEST_URI' => '/test.php/some/PathInfo',
						'SCRIPT_NAME' => '/test.php',
					]
				],
				$this->secureRandom,
				$this->config,
				$this->csrfTokenManager,
				$this->stream
			])
			->getMock();
		$request
			->expects($this->once())
			->method('getScriptName')
			->will($this->returnValue('/scriptname.php'));

		$this->assertSame($expectedUri, $request->getRequestUri());
	}

	public function testPassesCSRFCheckWithGet() {
		/** @var Request $request */
		$request = $this->getMockBuilder('\OC\AppFramework\Http\Request')
			->setMethods(['getScriptName'])
			->setConstructorArgs([
				[
					'get' => [
						'requesttoken' => 'AAAHGxsTCTc3BgMQESAcNR0OAR0=:MyTotalSecretShareds',
					],
				],
				$this->secureRandom,
				$this->config,
				$this->csrfTokenManager,
				$this->stream
			])
			->getMock();
		$token = new CsrfToken('AAAHGxsTCTc3BgMQESAcNR0OAR0=:MyTotalSecretShareds');
		$this->csrfTokenManager
			->expects($this->once())
			->method('isTokenValid')
			->with($token)
			->willReturn(true);

		$this->assertTrue($request->passesCSRFCheck());
	}

	public function testPassesCSRFCheckWithPost() {
		/** @var Request $request */
		$request = $this->getMockBuilder('\OC\AppFramework\Http\Request')
			->setMethods(['getScriptName'])
			->setConstructorArgs([
				[
					'post' => [
						'requesttoken' => 'AAAHGxsTCTc3BgMQESAcNR0OAR0=:MyTotalSecretShareds',
					],
				],
				$this->secureRandom,
				$this->config,
				$this->csrfTokenManager,
				$this->stream
			])
			->getMock();
		$token = new CsrfToken('AAAHGxsTCTc3BgMQESAcNR0OAR0=:MyTotalSecretShareds');
		$this->csrfTokenManager
				->expects($this->once())
				->method('isTokenValid')
				->with($token)
				->willReturn(true);

		$this->assertTrue($request->passesCSRFCheck());
	}

	public function testPassesCSRFCheckWithHeader() {
		/** @var Request $request */
		$request = $this->getMockBuilder('\OC\AppFramework\Http\Request')
			->setMethods(['getScriptName'])
			->setConstructorArgs([
				[
					'server' => [
						'HTTP_REQUESTTOKEN' => 'AAAHGxsTCTc3BgMQESAcNR0OAR0=:MyTotalSecretShareds',
					],
				],
				$this->secureRandom,
				$this->config,
				$this->csrfTokenManager,
				$this->stream
			])
			->getMock();
		$token = new CsrfToken('AAAHGxsTCTc3BgMQESAcNR0OAR0=:MyTotalSecretShareds');
		$this->csrfTokenManager
				->expects($this->once())
				->method('isTokenValid')
				->with($token)
				->willReturn(true);

		$this->assertTrue($request->passesCSRFCheck());
	}

	/**
	 * @return array
	 */
	public function invalidTokenDataProvider() {
		return [
			['InvalidSentToken'],
			['InvalidSentToken:InvalidSecret'],
			[null],
			[''],
		];
	}

	/**
	 * @dataProvider invalidTokenDataProvider
	 * @param string $invalidToken
	 */
	public function testPassesCSRFCheckWithInvalidToken($invalidToken) {
		/** @var Request $request */
		$request = $this->getMockBuilder('\OC\AppFramework\Http\Request')
			->setMethods(['getScriptName'])
			->setConstructorArgs([
				[
					'server' => [
						'HTTP_REQUESTTOKEN' => $invalidToken,
					],
				],
				$this->secureRandom,
				$this->config,
				$this->csrfTokenManager,
				$this->stream
			])
			->getMock();

		$token = new CsrfToken($invalidToken);
		$this->csrfTokenManager
				->expects($this->any())
				->method('isTokenValid')
				->with($token)
				->willReturn(false);

		$this->assertFalse($request->passesCSRFCheck());
	}

	public function testPassesCSRFCheckWithoutTokenFail() {
		/** @var Request $request */
		$request = $this->getMockBuilder('\OC\AppFramework\Http\Request')
			->setMethods(['getScriptName'])
			->setConstructorArgs([
				[],
				$this->secureRandom,
				$this->config,
				$this->csrfTokenManager,
				$this->stream
			])
			->getMock();

		$this->assertFalse($request->passesCSRFCheck());
	}
}
