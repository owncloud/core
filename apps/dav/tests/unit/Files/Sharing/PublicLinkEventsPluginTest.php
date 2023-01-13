<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgeargroup.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\DAV\Tests\Unit\Files\Sharing;

use Sabre\DAV\Server;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use OCA\DAV\Files\Sharing\PublicLinkEventsPlugin;
use Test\TestCase;

class PublicLinkEventsPluginTest extends TestCase {
	/** @var EventDispatcherInterface */
	private $dispatcher;
	/** @var Server */
	private $server;
	/** @var PublicLinkEventsPlugin */
	private $publicLinkEventsPlugin;

	protected function setUp(): void {
		$this->dispatcher = $this->createMock(EventDispatcherInterface::class);
		$this->server = $this->createMock(Server::class);

		$this->publicLinkEventsPlugin = new PublicLinkEventsPlugin($this->dispatcher);
	}

	public function testInitialize() {
		$this->server->expects($this->exactly(2))
			->method('on')
			->withConsecutive(
				[$this->equalTo('beforeMethod:*'), $this->equalTo([$this->publicLinkEventsPlugin, 'beforeMethod'])],
				[$this->equalTo('afterMethod:*'), $this->equalTo([$this->publicLinkEventsPlugin, 'afterMethod'])]
			);
		$this->publicLinkEventsPlugin->initialize($this->server);
	}

	public function methodProvider() {
		return [
			['GET'],
			['PUT'],
			['MOVE'],
			['DELETE'],
			['PROPFIND'],
		];
	}

	/**
	 * @dataProvider methodProvider
	 */
	public function testBeforeMethod($method) {
		$request = $this->createMock(RequestInterface::class);
		$response = $this->createMock(ResponseInterface::class);

		$request->method('getPath')->willReturn('/mypath');
		$request->expects($this->once())
			->method('getRawServerValue')
			->with('PHP_AUTH_USER')
			->willReturn('ABcdEFgh');
		$request->method('getMethod')->willReturn($method);
		$request->method('getHeader')
			->with($this->equalTo('Destination'))
			->willReturn('/pub/anotherpath');

		$this->server->method('calculateUri')->willReturn('/anotherpath');

		$lowercaseMethod = \strtolower($method);
		$this->dispatcher->expects($this->once())
			->method('dispatch')
			->with($this->anything(), "dav.public.{$lowercaseMethod}.before");

		$this->publicLinkEventsPlugin->initialize($this->server);  // required to include the server instance
		$this->publicLinkEventsPlugin->beforeMethod($request, $response);
	}

	/**
	 * @dataProvider methodProvider
	 */
	public function testAfterMethod($method) {
		$request = $this->createMock(RequestInterface::class);
		$response = $this->createMock(ResponseInterface::class);

		$request->method('getPath')->willReturn('/mypath');
		$request->method('getMethod')->willReturn($method);
		$request->expects($this->once())
			->method('getRawServerValue')
			->with('PHP_AUTH_USER')
			->willReturn('ABcdEFgh');
		$request->method('getHeader')
			->with($this->equalTo('Destination'))
			->willReturn('/pub/anotherpath');

		$this->server->method('calculateUri')->willReturn('/anotherpath');

		$lowercaseMethod = \strtolower($method);
		$this->dispatcher->expects($this->once())
			->method('dispatch')
			->with($this->anything(), "dav.public.{$lowercaseMethod}.after");

		$this->publicLinkEventsPlugin->initialize($this->server);  // required to include the server instance
		$this->publicLinkEventsPlugin->afterMethod($request, $response);
	}
}
