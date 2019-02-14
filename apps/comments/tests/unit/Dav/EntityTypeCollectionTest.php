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

use OCA\Comments\Dav\EntityCollection as EntityCollectionImplementation;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use OCP\ILogger;
use OCP\IUserSession;
use OCP\IUserManager;
use OCP\Comments\ICommentsManager;

class EntityTypeCollectionTest extends \Test\TestCase {

	/** @var \OCP\Comments\ICommentsManager|\PHPUnit\Framework\MockObject\MockObject */
	protected $commentsManager;
	/** @var \OCP\IUserManager|\PHPUnit\Framework\MockObject\MockObject */
	protected $userManager;
	/** @var \OCP\ILogger|\PHPUnit\Framework\MockObject\MockObject */
	protected $logger;
	/** @var \OCA\Comments\Dav\EntityTypeCollection */
	protected $collection;
	/** @var \OCP\IUserSession|\PHPUnit\Framework\MockObject\MockObject */
	protected $userSession;

	protected $childMap = [];
	/** @var EventDispatcherInterface | \PHPUnit\Framework\MockObject\MockObject */
	private $dispatcher;

	public function setUp(): void {
		parent::setUp();

		$this->commentsManager = $this->createMock(ICommentsManager::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->userSession = $this->createMock(IUserSession::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->dispatcher = $this->createMock(EventDispatcherInterface::class);

		$instance = $this;

		$this->collection = new \OCA\Comments\Dav\EntityTypeCollection(
			'files',
			$this->commentsManager,
			$this->userManager,
			$this->userSession,
			$this->dispatcher,
			$this->logger,
			function ($child) use ($instance) {
				return !empty($instance->childMap[$child]);
			}
		);
	}

	public function testChildExistsYes() {
		$this->childMap[17] = true;
		$this->assertTrue($this->collection->childExists('17'));
	}

	public function testChildExistsNo() {
		$this->assertFalse($this->collection->childExists('17'));
	}

	public function testGetChild() {
		$this->childMap[17] = true;

		$ec = $this->collection->getChild('17');
		$this->assertInstanceOf(EntityCollectionImplementation::class, $ec);
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\NotFound
	 */
	public function testGetChildException() {
		$this->collection->getChild('17');
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\MethodNotAllowed
	 */
	public function testGetChildren() {
		$this->collection->getChildren();
	}
}
