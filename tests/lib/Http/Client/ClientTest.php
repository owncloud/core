<?php
/**
 * Copyright (c) 2015 Lukas Reschke <lukas@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Http\Client;

use GuzzleHttp\Psr7\Response;
use OC\Http\Client\Client;
use OCP\IConfig;
use GuzzleHttp\Client as GuzzleClient;

/**
 * Class ClientTest
 */
class ClientTest extends \Test\TestCase {
	/** @var GuzzleClient */
	private $guzzleClient;
	/** @var Client */
	private $client;
	/** @var IConfig */
	private $config;

	public function setUp(): void {
		parent::setUp();
		$this->config = $this->createMock('\OCP\IConfig');
		$this->guzzleClient = $this->createMock(GuzzleClient::class);
		$certificateManager = $this->createMock('\OCP\ICertificateManager');
		$this->client = new Client(
			$this->config,
			$certificateManager,
			$this->guzzleClient
		);
	}

	public function testGetProxyUri() {
		$this->config
			->expects($this->exactly(2))
			->method('getSystemValue')
			->withConsecutive(
				['proxy', null],
				['proxyuserpwd', null],
			)
			->willReturnOnConsecutiveCalls(
				null,
				null,
			);
		$this->assertSame('', self::invokePrivate($this->client, 'getProxyUri'));
	}

	public function testGetProxyUriProxyHostEmptyPassword() {
		$this->config
			->expects($this->exactly(2))
			->method('getSystemValue')
			->withConsecutive(
				['proxy', null],
				['proxyuserpwd', null],
			)
			->willReturnOnConsecutiveCalls(
				'foo',
				null,
			);
		$this->assertSame('foo', self::invokePrivate($this->client, 'getProxyUri'));
	}

	public function testGetProxyUriProxyHostWithPassword() {
		$this->config
			->method('getSystemValue')
			->willReturnMap(
				[
					['proxy', null, 'foo'],
					['proxyuserpwd', null, 'username:password']
				]
			);
		$this->assertSame('username:password@foo', self::invokePrivate($this->client, 'getProxyUri'));
	}

	public function testGet() {
		$this->guzzleClient->method('get')
			->willReturn(new Response(200));
		$this->assertEquals(200, $this->client->get('http://localhost/', [])->getStatusCode());
	}

	public function testGetStream() {
		$this->config
			->method('getSystemValue')
			->willReturnMap(
				[
					['proxy', null, 'foo'],
					['proxyuserpwd', null, 'username:password']
				]
			);
		$this->guzzleClient->method('get')
			->willReturn(new Response(200));
		$this->assertEquals(200, $this->client->get(
			'http://localhost/',
			[
				'stream' => true,
				'config' => [
					'stream_context' => [
						'http' => [
							'request_fulluri' => true
						]
					],
				],
			]
		)->getStatusCode());
	}

	public function testPost() {
		$this->guzzleClient->method('post')
			->willReturn(new Response(200));
		$this->assertEquals(200, $this->client->post('http://localhost/', [])->getStatusCode());
	}

	public function testPut() {
		$this->guzzleClient->method('put')
			->willReturn(new Response(200));
		$this->assertEquals(200, $this->client->put('http://localhost/', [])->getStatusCode());
	}

	public function testDelete() {
		$this->guzzleClient->method('delete')
			->willReturn(new Response(201));
		$this->assertEquals(201, $this->client->delete('http://localhost/', [])->getStatusCode());
	}

	public function testOptions() {
		$this->guzzleClient->method('request')
			->willReturn(new Response(200));
		$this->assertEquals(200, $this->client->options('http://localhost/', [])->getStatusCode());
	}
}
