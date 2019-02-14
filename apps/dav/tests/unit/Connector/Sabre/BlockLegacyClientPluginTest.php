<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

use OCA\DAV\Connector\Sabre\BlockLegacyClientPlugin;
use OCP\IConfig;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;

/**
 * Class BlockLegacyClientPluginTest
 *
 * @package OCA\DAV\Tests\unit\Connector\Sabre
 */
class BlockLegacyClientPluginTest extends TestCase {
	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private $config;
	/** @var BlockLegacyClientPlugin */
	private $blockLegacyClientVersionPlugin;

	public function setUp(): void {
		parent::setUp();

		$this->config = $this->createMock('\OCP\IConfig');
		$this->blockLegacyClientVersionPlugin = new BlockLegacyClientPlugin($this->config);
	}

	/**
	 * @return array
	 */
	public function oldDesktopClientProvider() {
		return [
			['Mozilla/5.0 (1.5.0) mirall/1.5.0'],
			['mirall/1.5.0'],
			['mirall/1.5.4'],
			['mirall/1.6.0'],
			['Mozilla/5.0 (Bogus Text) mirall/1.6.9'],
		];
	}

	/**
	 * @dataProvider oldDesktopClientProvider
	 * @param string $userAgent
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 * @expectedExceptionMessage Unsupported client version.
	 */
	public function testBeforeHandlerException($userAgent) {
		/** @var \Sabre\HTTP\RequestInterface | PHPUnit\Framework\MockObject\MockObject $request */
		$request = $this->createMock('\Sabre\HTTP\RequestInterface');
		$request
			->expects($this->once())
			->method('getHeader')
			->with('User-Agent')
			->will($this->returnValue($userAgent));

		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->with('minimum.supported.desktop.version', $this->anything())
			->will($this->returnValue('2.2.4'));

		$this->blockLegacyClientVersionPlugin->beforeHandler($request);
	}

	/**
	 * @return array
	 */
	public function newAndAlternateDesktopClientProvider() {
		return [
			['Mozilla/5.0 (2.2.4) mirall/2.2.4'],
			['mirall/2.8.3'],
			['mirall/2.7.2'],
			['mirall/2.7.0'],
			['Mozilla/5.0 (Bogus Text) mirall/3.0.1'],
		];
	}

	/**
	 * @dataProvider newAndAlternateDesktopClientProvider
	 * @param string $userAgent
	 */
	public function testBeforeHandlerSuccess($userAgent) {
		/** @var \Sabre\HTTP\RequestInterface | PHPUnit\Framework\MockObject\MockObject $request */
		$request = $this->createMock('\Sabre\HTTP\RequestInterface');
		$request
			->expects($this->once())
			->method('getHeader')
			->with('User-Agent')
			->will($this->returnValue($userAgent));

		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->with('minimum.supported.desktop.version', $this->anything())
			->will($this->returnValue('2.2.4'));

		$this->blockLegacyClientVersionPlugin->beforeHandler($request);
	}

	public function testBeforeHandlerNoUserAgent() {
		/** @var \Sabre\HTTP\RequestInterface | PHPUnit\Framework\MockObject\MockObject $request */
		$request = $this->createMock('\Sabre\HTTP\RequestInterface');
		$request
			->expects($this->once())
			->method('getHeader')
			->with('User-Agent')
			->will($this->returnValue(null));
		$this->blockLegacyClientVersionPlugin->beforeHandler($request);
	}
}
