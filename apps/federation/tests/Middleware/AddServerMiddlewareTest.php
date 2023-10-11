<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
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

namespace OCA\Federation\Tests\Middleware;

use OC\HintException;
use OCA\Federation\Middleware\AddServerMiddleware;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\ILogger;
use Test\TestCase;

class AddServerMiddlewareTest extends TestCase {
	/** @var  \PHPUnit\Framework\MockObject\MockObject | ILogger */
	private \PHPUnit\Framework\MockObject\MockObject $logger;

	/** @var \PHPUnit\Framework\MockObject\MockObject | \OCP\IL10N */
	private \PHPUnit\Framework\MockObject\MockObject $l10n;

	private \OCA\Federation\Middleware\AddServerMiddleware $middleware;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | Controller */
	private \PHPUnit\Framework\MockObject\MockObject $controller;

	public function setUp(): void {
		parent::setUp();

		$this->logger = $this->createMock(\OCP\ILogger::class);
		$this->l10n = $this->createMock(\OCP\IL10N::class);
		$this->controller = $this->getMockBuilder(\OCP\AppFramework\Controller::class)
			->disableOriginalConstructor()->getMock();

		$this->middleware = new AddServerMiddleware(
			'AddServerMiddlewareTest',
			$this->l10n,
			$this->logger
		);
	}

	/**
	 * @dataProvider dataTestAfterException
	 *
	 * @param \Exception $exception
	 * @param string $message
	 * @param string $hint
	 */
	public function testAfterException($exception, $message, $hint) {
		$this->logger->expects($this->once())->method('error')
			->with($message, ['app' => 'AddServerMiddlewareTest']);

		$this->l10n->expects($this->any())->method('t')
			->willReturnCallback(
				fn ($message) => $message
			);

		$result = $this->middleware->afterException($this->controller, 'method', $exception);

		$this->assertSame(
			Http::STATUS_BAD_REQUEST,
			$result->getStatus()
		);

		$data = $result->getData();

		$this->assertSame(
			$hint,
			$data['message']
		);
	}

	public function dataTestAfterException() {
		return [
			[new HintException('message', 'hint'), 'message', 'hint'],
			[new \Exception('message'), 'message', 'message'],
		];
	}
}
