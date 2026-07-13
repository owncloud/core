<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace Test\IntegrityCheck\Verifier;

use OC\IntegrityCheck\Verifier\CrlFetcher;
use OCP\Http\Client\IClient;
use OCP\Http\Client\IClientService;
use OCP\Http\Client\IResponse;
use Test\TestCase;

class CrlFetcherTest extends TestCase {
	/** @var IClientService | \PHPUnit\Framework\MockObject\MockObject */
	private $clientService;
	/** @var CrlFetcher */
	private $fetcher;

	public function setUp(): void {
		parent::setUp();
		$this->clientService = $this->createMock(IClientService::class);
		$this->fetcher = new CrlFetcher($this->clientService);
	}

	/**
	 * Test happy path: 200 response with body
	 */
	public function testFetchSuccess200WithBody(): void {
		$url = 'https://example.test/crl';
		$crlBody = 'CRLBYTES';

		$response = $this->createMock(IResponse::class);
		$response->expects($this->once())
			->method('getStatusCode')
			->willReturn(200);
		$response->expects($this->once())
			->method('getBody')
			->willReturn($crlBody);

		$client = $this->createMock(IClient::class);
		$client->expects($this->once())
			->method('get')
			->with(
				$url,
				$this->callback(function ($options) {
					// Verify allow_redirects is false
					return isset($options['allow_redirects']) && $options['allow_redirects'] === false;
				})
			)
			->willReturn($response);

		$this->clientService->expects($this->once())
			->method('newClient')
			->willReturn($client);

		$result = $this->fetcher->fetch($url);
		$this->assertSame($crlBody, $result);
	}

	/**
	 * Test empty body on 200 response - should return empty string, not null
	 */
	public function testFetchSuccess200WithEmptyBody(): void {
		$url = 'https://example.test/crl';

		$response = $this->createMock(IResponse::class);
		$response->expects($this->once())
			->method('getStatusCode')
			->willReturn(200);
		$response->expects($this->once())
			->method('getBody')
			->willReturn('');

		$client = $this->createMock(IClient::class);
		$client->expects($this->once())
			->method('get')
			->with(
				$url,
				$this->callback(function ($options) {
					return isset($options['allow_redirects']) && $options['allow_redirects'] === false;
				})
			)
			->willReturn($response);

		$this->clientService->expects($this->once())
			->method('newClient')
			->willReturn($client);

		$result = $this->fetcher->fetch($url);
		$this->assertSame('', $result);
	}

	/**
	 * Test non-HTTPS URL - should return null and never call client
	 */
	public function testFetchNonHttpsUrl(): void {
		$url = 'http://example.test/crl';

		// The client should never be created for non-HTTPS URLs
		$this->clientService->expects($this->never())
			->method('newClient');

		$result = $this->fetcher->fetch($url);
		$this->assertNull($result);
	}

	/**
	 * Test non-200 status code - should return null
	 */
	public function testFetchNon200Status(): void {
		$url = 'https://example.test/crl';

		$response = $this->createMock(IResponse::class);
		$response->expects($this->once())
			->method('getStatusCode')
			->willReturn(404);
		$response->expects($this->never())
			->method('getBody');

		$client = $this->createMock(IClient::class);
		$client->expects($this->once())
			->method('get')
			->with(
				$url,
				$this->callback(function ($options) {
					return isset($options['allow_redirects']) && $options['allow_redirects'] === false;
				})
			)
			->willReturn($response);

		$this->clientService->expects($this->once())
			->method('newClient')
			->willReturn($client);

		$result = $this->fetcher->fetch($url);
		$this->assertNull($result);
	}

	/**
	 * Test transport exception - should return null, never throw
	 */
	public function testFetchTransportException(): void {
		$url = 'https://example.test/crl';

		$client = $this->createMock(IClient::class);
		$client->expects($this->once())
			->method('get')
			->with(
				$url,
				$this->callback(function ($options) {
					return isset($options['allow_redirects']) && $options['allow_redirects'] === false;
				})
			)
			->willThrowException(new \Exception('Network error'));

		$this->clientService->expects($this->once())
			->method('newClient')
			->willReturn($client);

		$result = $this->fetcher->fetch($url);
		$this->assertNull($result);
	}

	/**
	 * Test verify allow_redirects is actually passed as false in options
	 */
	public function testAllowRedirectsOptionIsFalse(): void {
		$url = 'https://example.test/crl';
		$optionsPassed = [];

		$response = $this->createMock(IResponse::class);
		$response->expects($this->once())
			->method('getStatusCode')
			->willReturn(200);
		$response->expects($this->once())
			->method('getBody')
			->willReturn('CRL');

		$client = $this->createMock(IClient::class);
		$client->expects($this->once())
			->method('get')
			->willReturnCallback(function ($url, $options) use (&$optionsPassed, $response) {
				$optionsPassed = $options;
				return $response;
			});

		$this->clientService->expects($this->once())
			->method('newClient')
			->willReturn($client);

		$this->fetcher->fetch($url);

		// Verify allow_redirects was passed and is false
		$this->assertArrayHasKey('allow_redirects', $optionsPassed);
		$this->assertFalse($optionsPassed['allow_redirects']);
	}
}
