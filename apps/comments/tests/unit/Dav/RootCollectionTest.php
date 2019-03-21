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

use OCA\Comments\Dav\EntityTypeCollection as EntityTypeCollectionImplementation;
use OCP\Comments\CommentsEntityEvent;
use Symfony\Component\EventDispatcher\EventDispatcher;

class RootCollectionTest extends \Test\TestCase {

	/** @var \OCP\Comments\ICommentsManager|\PHPUnit\Framework\MockObject\MockObject */
	protected $commentsManager;
	/** @var \OCP\IUserManager|\PHPUnit\Framework\MockObject\MockObject */
	protected $userManager;
	/** @var \OCP\ILogger|\PHPUnit\Framework\MockObject\MockObject */
	protected $logger;
	/** @var \OCA\Comments\Dav\RootCollection */
	protected $collection;
	/** @var \OCP\IUserSession|\PHPUnit\Framework\MockObject\MockObject */
	protected $userSession;
	/** @var \Symfony\Component\EventDispatcher\EventDispatcherInterface */
	protected $dispatcher;
	/** @var \OCP\IUser|\PHPUnit\Framework\MockObject\MockObject */
	protected $user;

	public function setUp() {
		parent::setUp();

		$this->user = $this->createMock('\OCP\IUser');

		$this->commentsManager = $this->createMock('\OCP\Comments\ICommentsManager');
		$this->userManager = $this->createMock('\OCP\IUserManager');
		$this->userSession = $this->createMock('\OCP\IUserSession');
		$this->dispatcher = new EventDispatcher();
		$this->logger = $this->createMock('\OCP\ILogger');

		$this->collection = new \OCA\Comments\Dav\RootCollection(
			$this->commentsManager,
			$this->userManager,
			$this->userSession,
			$this->dispatcher,
			$this->logger
		);
	}

	protected function prepareForInitCollections() {
		$this->user->expects($this->any())
			->method('getUID')
			->will($this->returnValue('alice'));

		$this->userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->user));

		$this->dispatcher->addListener(CommentsEntityEvent::EVENT_ENTITY, function (CommentsEntityEvent $event) {
			$event->addEntityCollection('files', function () {
				return true;
			});
		});
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 */
	public function testCreateFile() {
		$this->collection->createFile('foo');
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 */
	public function testCreateDirectory() {
		$this->collection->createDirectory('foo');
	}

	public function testGetChild() {
		$this->prepareForInitCollections();
		$etc = $this->collection->getChild('files');
		$this->assertInstanceOf(EntityTypeCollectionImplementation::class, $etc);
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\NotFound
	 */
	public function testGetChildInvalid() {
		$this->prepareForInitCollections();
		$this->collection->getChild('robots');
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\NotAuthenticated
	 */
	public function testGetChildNoAuth() {
		$this->collection->getChild('files');
	}

	public function testGetChildren() {
		$this->prepareForInitCollections();
		$children = $this->collection->getChildren();
		$this->assertNotEmpty($children);
		foreach ($children as $child) {
			$this->assertInstanceOf(EntityTypeCollectionImplementation::class, $child);
		}
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\NotAuthenticated
	 */
	public function testGetChildrenNoAuth() {
		$this->collection->getChildren();
	}

	public function testChildExistsYes() {
		$this->prepareForInitCollections();
		$this->assertTrue($this->collection->childExists('files'));
	}

	public function testChildExistsNo() {
		$this->prepareForInitCollections();
		$this->assertFalse($this->collection->childExists('robots'));
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\NotAuthenticated
	 */
	public function testChildExistsNoAuth() {
		$this->collection->childExists('files');
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 */
	public function testDelete() {
		$this->collection->delete();
	}

	public function testGetName() {
		$this->assertSame('comments', $this->collection->getName());
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 */
	public function testSetName() {
		$this->collection->setName('foobar');
	}

	public function testGetLastModified() {
		$this->assertNull($this->collection->getLastModified());
	}
}
