<?php
/**
 * @author Juan Pablo Villafañez <jvillafanez@solidgear.es>
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
namespace OCA\DAV\Tests\unit\Connector\Sabre;

use OCA\DAV\Connector\Sabre\PublicDavLocksPlugin;
use Sabre\DAV\Locks\Backend\BackendInterface;
use Sabre\DAV\Locks\LockInfo;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use Test\TestCase;

class PublicDavLocksPluginTest extends TestCase {
	/** @var BackendInterface */
	private $backendInterface;
	/** @var callable */
	private $matcher;
	/** @var PublicDavLocksPlugin */
	private $publicDavLocksPlugin;

	protected function setUp(): void {
		parent::setUp();
		$this->backendInterface = $this->createMock(BackendInterface::class);
		$this->matcher = $this->getMockBuilder(\stdClass::class)
			->setMethods(['__invoke'])
			->getMock();

		$this->publicDavLocksPlugin = new PublicDavLocksPlugin($this->backendInterface, $this->matcher);
	}

	public function testGetPluginName() {
		$this->assertEquals('PublicDavLockPlugin', $this->publicDavLocksPlugin->getPluginName());
	}

	public function testGetHTTPMethodsForPublic() {
		$this->matcher->method('__invoke')->willReturn(true);
		$this->assertEmpty($this->publicDavLocksPlugin->getHTTPMethods('/route/01'));
	}

	/**
	 */
	public function testHttpLockForPublicWithoutLocks() {
		$this->expectException(\Sabre\DAV\Exception\MethodNotAllowed::class);

		$this->matcher->method('__invoke')->willReturn(true);

		$request = $this->createMock(RequestInterface::class);
		$request->method('getPath')->willReturn('/requested/path');

		$response = $this->createMock(ResponseInterface::class);

		$this->backendInterface->method('getLocks')->willReturn([]);

		$this->publicDavLocksPlugin->httpLock($request, $response);
	}

	/**
	 */
	public function testHttpLockForPublicWithLocks() {
		$this->expectException(\Sabre\DAV\Exception\Locked::class);

		$this->matcher->method('__invoke')->willReturn(true);

		$request = $this->createMock(RequestInterface::class);
		$request->method('getPath')->willReturn('/requested/path');

		$response = $this->createMock(ResponseInterface::class);

		$lock1 = $this->createMock(LockInfo::class);
		$lock2 = $this->createMock(LockInfo::class);
		$this->backendInterface->method('getLocks')->willReturn([$lock1, $lock2]);

		$this->publicDavLocksPlugin->httpLock($request, $response);
	}

	/**
	 */
	public function testHttpUnlockForPublic() {
		$this->expectException(\Sabre\DAV\Exception\MethodNotAllowed::class);

		$this->matcher->method('__invoke')->willReturn(true);

		$request = $this->createMock(RequestInterface::class);
		$request->method('getPath')->willReturn('/requested/path');

		$response = $this->createMock(ResponseInterface::class);

		$this->publicDavLocksPlugin->httpLock($request, $response);
	}

	public function testGetHTTPMethodsForPrivate() {
		$this->matcher->method('__invoke')->willReturn(false);
		$this->assertEquals(['LOCK', 'UNLOCK'], $this->publicDavLocksPlugin->getHTTPMethods('/route/01'));
	}

	/*
	 * Lock and Unlock tests for private paths can't be unittested with the current code
	 */
}
