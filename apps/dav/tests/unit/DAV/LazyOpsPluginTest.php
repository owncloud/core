<?php
/**
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

namespace OCA\DAV\Tests\unit\DAV;

use OCA\DAV\DAV\LazyOpsPlugin;
use OCA\DAV\JobStatus\Entity\JobStatus;
use OCA\DAV\JobStatus\Entity\JobStatusMapper;
use OCP\ILogger;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IUserSession;
use OCP\Shutdown\IShutdownManager;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\Server;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use Test\TestCase;

class LazyOpsPluginTest extends TestCase {

	/** @var LazyOpsPlugin */
	private $plugin;
	/** @var ILogger */
	private $logger;
	/** @var JobStatusMapper | \PHPUnit\Framework\MockObject\MockObject */
	private $jobStatusMapper;
	/** @var IShutdownManager | \PHPUnit\Framework\MockObject\MockObject */
	private $shutdownManager;
	/** @var IURLGenerator | \PHPUnit\Framework\MockObject\MockObject */
	private $urlGenerator;
	/** @var IUserSession | \PHPUnit\Framework\MockObject\MockObject */
	private $userSession;

	public function setUp() {
		parent::setUp();

		$this->userSession = $this->createMock(IUserSession::class);
		$this->urlGenerator= $this->createMock(IURLGenerator::class);
		$this->shutdownManager = $this->createMock(IShutdownManager::class);
		$this->jobStatusMapper = $this->createMock(JobStatusMapper::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->plugin = new LazyOpsPlugin($this->userSession, $this->urlGenerator,
			$this->shutdownManager, $this->jobStatusMapper, $this->logger);

		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('alice');
		$this->userSession->method('getUser')->willReturn($user);
	}

	public function testInit() {
		$server = $this->createMock(Server::class);
		$server->expects(self::once())->method('on')->with('method:MOVE');
		$this->plugin->initialize($server);
	}

	public function testMoveWithoutLazyOpsHeader() {
		$request = $this->createMock(RequestInterface::class);
		$response= $this->createMock(ResponseInterface::class);
		$response->expects($this->never())->method('setStatus');
		$this->plugin->httpMove($request, $response);
	}

	public function testMoveWithLazyOpsHeader() {
		$request = $this->createMock(RequestInterface::class);
		$request->method('getHeader')->with('OC-LazyOps')->willReturn(true);
		$response= $this->createMock(ResponseInterface::class);
		$response->expects($this->once())->method('setStatus')->with(202);
		$response->expects($this->exactly(2))->method('setHeader')->withConsecutive(
			['Connection', 'close'],
			['OC-JobStatus-Location', self::stringStartsWith('/remote.php/dav/job-status/alice/')]
		);

		$this->urlGenerator->expects(self::once())->method('linkTo')->willReturn('/remote.php');

		$this->jobStatusMapper->expects(self::once())
			->method('insert')->willReturnCallback(function (JobStatus $entity) {
				self::assertEquals('alice', $entity->getUserId());
				self::assertEquals('{"status":"init"}', $entity->getStatusInfo());
			});

		$this->shutdownManager->expects(self::once())->method('register');

		$this->plugin->httpMove($request, $response);
	}

	public function testAfterResponseProcessing() {
		$request = $this->createMock(RequestInterface::class);
		$request->method('getHeader')->with('OC-LazyOps')->willReturn(true);
		$request->expects(self::once())->method('removeHeader')->with('OC-LazyOps')->willReturn(true);

		$response= $this->createMock(ResponseInterface::class);
		$response->expects($this->exactly(2))->method('getHeader')->withConsecutive(
			['OC-FileId'],
			['ETag']
		)->willReturnOnConsecutiveCalls(
			'oc1234',
			'"abcdef"'
		);

		$this->jobStatusMapper->expects(self::once())
			->method('insert')->willReturnCallback(function (JobStatus $entity) {
				self::assertEquals('alice', $entity->getUserId());
				self::assertEquals('{"status":"started"}', $entity->getStatusInfo());
			});
		$this->jobStatusMapper->expects(self::once())
			->method('update')->willReturnCallback(function (JobStatus $entity) {
				self::assertEquals('alice', $entity->getUserId());
				self::assertEquals('{"status":"finished","fileId":"oc1234","ETag":"\"abcdef\""}', $entity->getStatusInfo());
			});

		$server = $this->createMock(Server::class);
		$server->expects(self::once())->method('emit')->with('method:MOVE');

		$this->plugin->initialize($server);
		$this->plugin->afterResponse($request, $response);
	}

	public function testAfterResponseProcessingThrowingAnException() {
		$request = $this->createMock(RequestInterface::class);
		$request->method('getHeader')->with('OC-LazyOps')->willReturn(true);
		$request->expects(self::once())->method('removeHeader')->with('OC-LazyOps')->willReturn(true);

		$response= $this->createMock(ResponseInterface::class);

		$this->jobStatusMapper->expects(self::once())
			->method('insert')->willReturnCallback(function (JobStatus $entity) {
				self::assertEquals('alice', $entity->getUserId());
				self::assertEquals('{"status":"started"}', $entity->getStatusInfo());
			});
		$this->jobStatusMapper->expects(self::once())
			->method('update')->willReturnCallback(function (JobStatus $entity) {
				self::assertEquals('alice', $entity->getUserId());
				self::assertEquals('{"status":"error","errorCode":404,"errorMessage":""}', $entity->getStatusInfo());
			});

		$server = $this->createMock(Server::class);
		$server->expects(self::once())->method('emit')->willThrowException(new NotFound());

		$this->plugin->initialize($server);
		$this->plugin->afterResponse($request, $response);
	}
}
