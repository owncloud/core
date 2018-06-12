<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Joas Schilling <coding@schilljs.com>
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

use OCA\DAV\Connector\Sabre\CommentPropertiesPlugin as CommentPropertiesPluginImplementation;

class CommentsPropertiesPluginTest extends \Test\TestCase {

	/** @var  CommentPropertiesPluginImplementation */
	protected $plugin;
	protected $commentsManager;
	protected $userSession;
	protected $server;
	protected $userFolder;

	public function setUp() {
		parent::setUp();

		$this->commentsManager = $this->createMock('\OCP\Comments\ICommentsManager');
		$this->userSession = $this->createMock('\OCP\IUserSession');

		$this->userFolder = $this->createMock('\OCP\Files\Folder');

		$this->server = $this->getMockBuilder('\Sabre\DAV\Server')
			->disableOriginalConstructor()
			->getMock();

		$this->plugin = new CommentPropertiesPluginImplementation($this->commentsManager, $this->userSession, $this->userFolder);
		$this->plugin->initialize($this->server);
	}

	public function testHandleGetPropertiesUser() {
		$sabreNode1 = $this->getMockBuilder('\OCA\DAV\Connector\Sabre\File')
			->disableOriginalConstructor()
			->getMock();
		$sabreNode1->expects($this->any())
			->method('getId')
			->will($this->returnValue(111));
		$sabreNode1->expects($this->never())
			->method('getPath');
		$sabreNode2 = $this->getMockBuilder('\OCA\DAV\Connector\Sabre\File')
			->disableOriginalConstructor()
			->getMock();
		$sabreNode2->expects($this->any())
			->method('getId')
			->will($this->returnValue(222));
		$sabreNode2->expects($this->never())
			->method('getPath');

		$sabreNode = $this->getMockBuilder('\OCA\DAV\Connector\Sabre\Directory')
			->disableOriginalConstructor()
			->getMock();
		$sabreNode->expects($this->any())
			->method('getId')
			->will($this->returnValue(123));
		$sabreNode->expects($this->once())
			->method('getChildren')
		->will($this->returnValue([$sabreNode1, $sabreNode2]));
		$sabreNode->expects($this->any())
			->method('getPath')
			->will($this->returnValue('/subdir'));

		// simulate sabre recursive PROPFIND traversal
		$propFindRoot = new \Sabre\DAV\PropFind(
			'/subdir',
			[CommentPropertiesPluginImplementation::PROPERTY_NAME_UNREAD],
			1
		);

		$propFind1 = new \Sabre\DAV\PropFind(
			'/subdir/test.txt',
			[CommentPropertiesPluginImplementation::PROPERTY_NAME_UNREAD],
			0
		);
		$propFind2 = new \Sabre\DAV\PropFind(
			'/subdir/test2.txt',
			[CommentPropertiesPluginImplementation::PROPERTY_NAME_UNREAD],
			0
		);

		// Add some comments there
		$numberOfCommentsForNodes[$sabreNode1->getId()] = 1;
		$numberOfCommentsForNodes[$sabreNode2->getId()] = 4;
		$this->commentsManager->expects($this->once())
			->method('getNumberOfUnreadCommentsForNodes')
			->willReturn($numberOfCommentsForNodes);

		// Now test with user
		$this->userSession->expects($this->any())
			->method('getUser')
			->willReturn($this->createMock('\OCP\IUser'));

		$this->plugin->handleGetProperties(
			$propFindRoot,
			$sabreNode
		);
		$this->plugin->handleGetProperties(
			$propFind1,
			$sabreNode1
		);
		$this->plugin->handleGetProperties(
			$propFind2,
			$sabreNode2
		);

		$result = $propFindRoot->getResultForMultiStatus();
		$result1 = $propFind1->getResultForMultiStatus();
		$result2 = $propFind2->getResultForMultiStatus();
		$this->assertEmpty($result[404]);
		$this->assertEmpty($result1[404]);
		$this->assertEmpty($result2[404]);
		$this->assertEquals(0, $result[200][CommentPropertiesPluginImplementation::PROPERTY_NAME_UNREAD]);
		$this->assertEquals(1, $result1[200][CommentPropertiesPluginImplementation::PROPERTY_NAME_UNREAD]);
		$this->assertEquals(4, $result2[200][CommentPropertiesPluginImplementation::PROPERTY_NAME_UNREAD]);
	}

	public function testHandleGetPropertiesUserLoggedOut() {
		$sabreNode1 = $this->getMockBuilder('\OCA\DAV\Connector\Sabre\File')
			->disableOriginalConstructor()
			->getMock();
		$sabreNode1->expects($this->any())
			->method('getId')
			->will($this->returnValue(111));
		$sabreNode1->expects($this->never())
			->method('getPath');
		$sabreNode2 = $this->getMockBuilder('\OCA\DAV\Connector\Sabre\File')
			->disableOriginalConstructor()
			->getMock();
		$sabreNode2->expects($this->any())
			->method('getId')
			->will($this->returnValue(222));
		$sabreNode2->expects($this->never())
			->method('getPath');

		$sabreNode = $this->getMockBuilder('\OCA\DAV\Connector\Sabre\Directory')
			->disableOriginalConstructor()
			->getMock();
		$sabreNode->expects($this->any())
			->method('getId')
			->will($this->returnValue(123));
		$sabreNode->expects($this->once())
			->method('getChildren')
			->will($this->returnValue([$sabreNode1, $sabreNode2]));
		$sabreNode->expects($this->any())
			->method('getPath')
			->will($this->returnValue('/subdir'));
		// simulate sabre recursive PROPFIND traversal
		$propFindRoot = new \Sabre\DAV\PropFind(
			'/subdir',
			[CommentPropertiesPluginImplementation::PROPERTY_NAME_UNREAD],
			1
		);

		$propFind1 = new \Sabre\DAV\PropFind(
			'/subdir/test.txt',
			[CommentPropertiesPluginImplementation::PROPERTY_NAME_UNREAD],
			0
		);
		$propFind2 = new \Sabre\DAV\PropFind(
			'/subdir/test2.txt',
			[CommentPropertiesPluginImplementation::PROPERTY_NAME_UNREAD],
			0
		);

		$this->plugin->handleGetProperties(
			$propFindRoot,
			$sabreNode
		);
		$this->plugin->handleGetProperties(
			$propFind1,
			$sabreNode1
		);
		$this->plugin->handleGetProperties(
			$propFind2,
			$sabreNode2
		);

		$result = $propFindRoot->getResultForMultiStatus();
		$this->assertEmpty($result[404]);
		$this->assertEquals(0, $result[200][CommentPropertiesPluginImplementation::PROPERTY_NAME_UNREAD]);
	}

	public function nodeProvider() {
		$mocks = [];
		foreach (['\OCA\DAV\Connector\Sabre\File', '\OCA\DAV\Connector\Sabre\Directory', '\Sabre\DAV\INode'] as $class) {
			$mocks[] = 	$this->getMockBuilder($class)
				->disableOriginalConstructor()
				->getMock();
		}

		return [
			[$mocks[0], true],
			[$mocks[1], true],
			[$mocks[2], false]
		];
	}

	/**
	 * @dataProvider nodeProvider
	 * @param $node
	 * @param $expectedSuccessful
	 */
	public function testHandleGetPropertiesCorrectNode($node, $expectedSuccessful) {
		$propFind = $this->getMockBuilder('\Sabre\DAV\PropFind')
			->disableOriginalConstructor()
			->getMock();

		if ($expectedSuccessful) {
			$propFind->expects($this->exactly(3))
				->method('handle');
		} else {
			$propFind->expects($this->never())
				->method('handle');
		}

		$this->plugin->handleGetProperties($propFind, $node);
	}

	public function baseUriProvider() {
		return [
			['owncloud/remote.php/webdav/', '4567', 'owncloud/remote.php/dav/comments/files/4567'],
			['owncloud/remote.php/files/', '4567', 'owncloud/remote.php/dav/comments/files/4567'],
			['owncloud/wicked.php/files/', '4567', null]
		];
	}

	/**
	 * @dataProvider baseUriProvider
	 * @param $baseUri
	 * @param $fid
	 * @param $expectedHref
	 */
	public function testGetCommentsLink($baseUri, $fid, $expectedHref) {
		$node = $this->getMockBuilder('\OCA\DAV\Connector\Sabre\File')
			->disableOriginalConstructor()
			->getMock();
		$node->expects($this->any())
			->method('getId')
			->will($this->returnValue($fid));

		$this->server->expects($this->once())
			->method('getBaseUri')
			->will($this->returnValue($baseUri));

		$href = $this->plugin->getCommentsLink($node);
		$this->assertSame($expectedHref, $href);
	}

	public function userProvider() {
		return [
			[$this->createMock('\OCP\IUser')],
			[null]
		];
	}

	/**
	 * @dataProvider userProvider
	 * @param $user
	 */
	public function testGetUnreadCount($user) {
		$node = $this->getMockBuilder('\OCA\DAV\Connector\Sabre\File')
			->disableOriginalConstructor()
			->getMock();
		$node->expects($this->any())
			->method('getId')
			->will($this->returnValue('4567'));

		$this->userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));

		$numberOfCommentsForNodes[$node->getId()] = 42;
		$this->commentsManager->expects($this->any())
			->method('getNumberOfUnreadCommentsForNodes')
			->willReturn($numberOfCommentsForNodes);

		$unread = $this->plugin->getUnreadCount($node);
		if ($user === null) {
			$this->assertNull($unread);
		} else {
			$this->assertSame($unread, 42);
		}
	}

	/**
	 * @dataProvider userProvider
	 * @param $user
	 */
	public function testGetUnreadCountWithZeroUnread($user) {
		$node = $this->getMockBuilder('\OCA\DAV\Connector\Sabre\File')
			->disableOriginalConstructor()
			->getMock();
		$node->expects($this->any())
			->method('getId')
			->will($this->returnValue('4567'));

		$this->userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));

		$numberOfCommentsForNodes = [];
		$this->commentsManager->expects($this->any())
			->method('getNumberOfUnreadCommentsForNodes')
			->willReturn($numberOfCommentsForNodes);

		$unread = $this->plugin->getUnreadCount($node);
		if ($user === null) {
			$this->assertNull($unread);
		} else {
			$this->assertSame($unread, 0);
		}
	}
}
