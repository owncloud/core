<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\DAV\Tests\unit\Comments;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use OCP\Comments\IComment;
use OCP\ILogger;
use OCP\IUserSession;
use OCP\IUserManager;
use OCP\Comments\ICommentsManager;

class EntityCollectionTest extends \Test\TestCase {

	/** @var \OCP\Comments\ICommentsManager|\PHPUnit\Framework\MockObject\MockObject */
	protected $commentsManager;
	/** @var \OCP\IUserManager|\PHPUnit\Framework\MockObject\MockObject */
	protected $userManager;
	/** @var \OCP\ILogger|\PHPUnit\Framework\MockObject\MockObject */
	protected $logger;
	/** @var \OCA\Comments\Dav\EntityCollection */
	protected $collection;
	/** @var \OCP\IUserSession|\PHPUnit\Framework\MockObject\MockObject */
	protected $userSession;
	/** @var EventDispatcherInterface | \PHPUnit\Framework\MockObject\MockObject */
	private $dispatcher;

	public function setUp() {
		parent::setUp();

		$this->commentsManager = $this->createMock(ICommentsManager::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->userSession = $this->createMock(IUserSession::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->dispatcher = $this->createMock(EventDispatcherInterface::class);

		$this->collection = new \OCA\Comments\Dav\EntityCollection(
			'19',
			'files',
			$this->commentsManager,
			$this->userManager,
			$this->userSession,
			$this->dispatcher,
			$this->logger
		);
	}

	public function testGetId(): void {
		$this->assertSame($this->collection->getId(), '19');
	}

	public function testGetChild(): void {
		$this->commentsManager->expects($this->once())
			->method('get')
			->with('55')
			->will($this->returnValue($this->createMock(IComment::class)));

		$node = $this->collection->getChild('55');
		$this->assertInstanceOf(\OCA\Comments\Dav\CommentNode::class, $node);
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\NotFound
	 */
	public function testGetChildException(): void {
		$this->commentsManager->expects($this->once())
			->method('get')
			->with('55')
			->will($this->throwException(new \OCP\Comments\NotFoundException()));

		$this->collection->getChild('55');
	}

	public function testGetChildren(): void {
		$this->commentsManager->expects($this->once())
			->method('getForObject')
			->with('files', '19')
			->will($this->returnValue([$this->createMock(IComment::class)]));

		$result = $this->collection->getChildren();

		$this->assertSame(\count($result), 1);
		$this->assertInstanceOf(\OCA\Comments\Dav\CommentNode::class, $result[0]);
	}

	public function testFindChildren(): void {
		$dt = new \DateTime('2016-01-10 18:48:00');
		$this->commentsManager->expects($this->once())
			->method('getForObject')
			->with('files', '19', 5, 15, $dt)
			->will($this->returnValue([$this->createMock(IComment::class)]));

		$result = $this->collection->findChildren(5, 15, $dt);

		$this->assertSame(\count($result), 1);
		$this->assertInstanceOf(\OCA\Comments\Dav\CommentNode::class, $result[0]);
	}

	public function testChildExistsTrue(): void {
		$this->assertTrue($this->collection->childExists('44'));
	}

	public function testChildExistsFalse(): void {
		$this->commentsManager->expects($this->once())
			->method('get')
			->with('44')
			->will($this->throwException(new \OCP\Comments\NotFoundException()));

		$this->assertFalse($this->collection->childExists('44'));
	}
}
