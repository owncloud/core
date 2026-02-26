<?php

/**
 * ownCloud - App Framework
 *
 * @author Bernhard Posselt
 * @copyright Copyright (c) 2012 Bernhard Posselt <dev@bernhard-posselt.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace Test\AppFramework\Http;

use DateTime;
use DateTimeZone;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\ContentSecurityPolicy;
use OCP\AppFramework\Http\Response;
use Test\TestCase;

class ResponseTest extends TestCase {
	private Response $childResponse;

	protected function setUp(): void {
		parent::setUp();
		$this->childResponse = new Response();
	}

	public function testAddHeader(): void {
		$this->childResponse->addHeader(' hello ', 'world');
		$headers = $this->childResponse->getHeaders();
		$this->assertEquals('world', $headers['hello']);
	}

	public function testSetHeaders(): void {
		$expected = [
			'Last-Modified' => 1,
			'ETag' => 3,
			'Something-Else' => 'hi'
		];

		$this->childResponse->setHeaders($expected);
		$headers = $this->childResponse->getHeaders();
		$expected['Content-Security-Policy'] = "default-src 'none';manifest-src 'self';script-src 'self' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self' data: blob:;font-src 'self';connect-src 'self';media-src 'self'";

		$this->assertEquals($expected, $headers);
	}

	public function testOverwriteCsp(): void {
		$expected = [
			'Content-Security-Policy' => "default-src 'none';script-src 'self' 'unsafe-inline' 'unsafe-eval';style-src 'self' 'unsafe-inline';img-src 'self';font-src 'self';connect-src 'self';media-src 'self'",
		];
		$policy = new ContentSecurityPolicy();
		$policy->allowInlineScript(true);

		$this->childResponse->setContentSecurityPolicy($policy);
		$headers = $this->childResponse->getHeaders();

		$this->assertEquals(\array_merge($expected, $headers), $headers);
	}

	public function testGetCsp(): void {
		$policy = new ContentSecurityPolicy();
		$policy->allowInlineScript(true);

		$this->childResponse->setContentSecurityPolicy($policy);
		$this->assertEquals($policy, $this->childResponse->getContentSecurityPolicy());
	}

	public function testGetCspEmpty(): void {
		$this->assertNull($this->childResponse->getContentSecurityPolicy());
	}

	public function testAddHeaderValueNullDeletesIt(): void {
		$this->childResponse->addHeader('hello', 'world');
		$this->childResponse->addHeader('hello', null);
		$this->assertCount(2, $this->childResponse->getHeaders());
	}

	public function testCacheHeadersAreDisabledByDefault(): void {
		$headers = $this->childResponse->getHeaders();
		$this->assertEquals('no-cache, no-store, must-revalidate', $headers['Cache-Control']);
	}

	public function testAddCookie(): void {
		$this->childResponse->addCookie('foo', 'bar');
		$this->childResponse->addCookie('bar', 'foo', new DateTime('1970-01-01'));

		$expectedResponse = [
			'foo' => [
				'value' => 'bar',
				'expireDate' => null,
			],
			'bar' => [
				'value' => 'foo',
				'expireDate' => new DateTime('1970-01-01')
			]
		];
		$this->assertEquals($expectedResponse, $this->childResponse->getCookies());
	}

	public function testSetCookies(): void {
		$expected = [
			'foo' => [
				'value' => 'bar',
				'expireDate' => null,
			],
			'bar' => [
				'value' => 'foo',
				'expireDate' => new DateTime('1970-01-01')
			]
		];

		$this->childResponse->setCookies($expected);
		$cookies = $this->childResponse->getCookies();

		$this->assertEquals($expected, $cookies);
	}

	public function testInvalidateCookie(): void {
		$this->childResponse->addCookie('foo', 'bar');
		$this->childResponse->invalidateCookie('foo');
		$expected = [
			'foo' => [
				'value' => 'expired',
				'expireDate' => new DateTime('1971-01-01')
			]
		];

		$cookies = $this->childResponse->getCookies();

		$this->assertEquals($expected, $cookies);
	}

	public function testInvalidateCookies(): void {
		$this->childResponse->addCookie('foo', 'bar');
		$this->childResponse->addCookie('bar', 'foo');
		$expected = [
			'foo' => [
				'value' => 'bar',
				'expireDate' => null
			],
			'bar' => [
				'value' => 'foo',
				'expireDate' => null
			]
		];
		$cookies = $this->childResponse->getCookies();
		$this->assertEquals($expected, $cookies);

		$this->childResponse->invalidateCookies(['foo', 'bar']);
		$expected = [
			'foo' => [
				'value' => 'expired',
				'expireDate' => new DateTime('1971-01-01')
			],
			'bar' => [
				'value' => 'expired',
				'expireDate' => new DateTime('1971-01-01')
			]
		];

		$cookies = $this->childResponse->getCookies();
		$this->assertEquals($expected, $cookies);
	}

	public function testRenderReturnNullByDefault(): void {
		$this->assertNull($this->childResponse->render());
	}

	public function testGetStatus(): void {
		$default = $this->childResponse->getStatus();

		$this->childResponse->setStatus(Http::STATUS_NOT_FOUND);

		$this->assertEquals(Http::STATUS_OK, $default);
		$this->assertEquals(Http::STATUS_NOT_FOUND, $this->childResponse->getStatus());
	}

	public function testGetEtag(): void {
		$this->childResponse->setETag('hi');
		$this->assertSame('hi', $this->childResponse->getETag());
	}

	public function testGetLastModified(): void {
		$lastModified = new DateTime('now', new DateTimeZone('GMT'));
		$lastModified->setTimestamp(1);
		$this->childResponse->setLastModified($lastModified);
		$this->assertEquals($lastModified, $this->childResponse->getLastModified());
	}

	public function testCacheSecondsZero(): void {
		$this->childResponse->cacheFor(0);

		$headers = $this->childResponse->getHeaders();
		$this->assertEquals('no-cache, no-store, must-revalidate', $headers['Cache-Control']);
	}

	public function testCacheSeconds(): void {
		$this->childResponse->cacheFor(33);

		$headers = $this->childResponse->getHeaders();
		$this->assertEquals(
			'max-age=33, must-revalidate',
			$headers['Cache-Control']
		);
	}

	public function testEtagLastModifiedHeaders(): void {
		$lastModified = new DateTime('now', new DateTimeZone('GMT'));
		$lastModified->setTimestamp(1);
		$this->childResponse->setLastModified($lastModified);
		$headers = $this->childResponse->getHeaders();
		$this->assertEquals('Thu, 01 Jan 1970 00:00:01 +0000', $headers['Last-Modified']);
	}

	public function testChainability(): void {
		$lastModified = new DateTime('now', new DateTimeZone('GMT'));
		$lastModified->setTimestamp(1);

		$this->childResponse->setETag('hi')
			->setStatus(Http::STATUS_NOT_FOUND)
			->setLastModified($lastModified)
			->cacheFor(33)
			->addHeader('hello', 'world');

		$headers = $this->childResponse->getHeaders();

		$this->assertEquals('world', $headers['hello']);
		$this->assertEquals(Http::STATUS_NOT_FOUND, $this->childResponse->getStatus());
		$this->assertEquals('hi', $this->childResponse->getETag());
		$this->assertEquals('Thu, 01 Jan 1970 00:00:01 +0000', $headers['Last-Modified']);
		$this->assertEquals(
			'max-age=33, must-revalidate',
			$headers['Cache-Control']
		);
	}
}
