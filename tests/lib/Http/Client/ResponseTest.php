<?php
/**
 * Copyright (c) 2015 Lukas Reschke <lukas@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Http\Client;

use OC\Http\Client\Response;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ResponseTest
 */
class ResponseTest extends \Test\TestCase {
	/** @var Response */
	private $response;
	/** @var ResponseInterface */
	private $guzzleResponse;

	public function setUp() {
		parent::setUp();
		$this->guzzleResponse = $this->createMock(ResponseInterface::class);
		$this->response = new Response($this->guzzleResponse);
	}

	public function testGetStatusCode() {
		$this->guzzleResponse->expects($this->once())
			->method('getStatusCode')
			->willReturn(1337);
		$this->assertEquals(1337, $this->response->getStatusCode());
	}

	public function testGetHeader() {
		$this->guzzleResponse->expects($this->once())
			->method('getHeader')
			->with('bar')
			->willReturn('foo');
		$this->assertEquals('foo', $this->response->getHeader('bar'));
	}
}
