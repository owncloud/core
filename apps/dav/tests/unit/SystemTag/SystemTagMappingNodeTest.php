<?php
/**
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

namespace OCA\DAV\Tests\unit\SystemTag;

use OC\SystemTag\SystemTag;
use OCP\SystemTag\ISystemTag;
use OCP\SystemTag\TagNotFoundException;

class SystemTagMappingNodeTest extends \Test\TestCase {
	/**
	 * @var \OCP\SystemTag\ISystemTagManager
	 */
	private $tagManager;

	/**
	 * @var \OCP\SystemTag\ISystemTagObjectMapper
	 */
	private $tagMapper;

	/**
	 * @var \OCP\IUser
	 */
	private $user;

	protected function setUp(): void {
		parent::setUp();

		$this->tagManager = $this->createMock('\OCP\SystemTag\ISystemTagManager');
		$this->tagMapper = $this->createMock('\OCP\SystemTag\ISystemTagObjectMapper');
		$this->user = $this->createMock('\OCP\IUser');
	}

	public function getMappingNode($tag = null) {
		if ($tag === null) {
			$tag = new SystemTag(1, 'Test', true, true);
		}
		return new \OCA\DAV\SystemTag\SystemTagMappingNode(
			$tag,
			123,
			'files',
			$this->user,
			$this->tagManager,
			$this->tagMapper
		);
	}

	public function testGetters() {
		$tag = new SystemTag(1, 'Test', true, false);
		$node = $this->getMappingNode($tag);
		$this->assertEquals('1', $node->getName());
		$this->assertEquals($tag, $node->getSystemTag());
		$this->assertEquals(123, $node->getObjectId());
		$this->assertEquals('files', $node->getObjectType());
	}

	public function testDeleteTag() {
		$node = $this->getMappingNode();
		$this->tagManager->expects($this->once())
			->method('canUserSeeTag')
			->with($node->getSystemTag())
			->will($this->returnValue(true));
		$this->tagManager->expects($this->once())
			->method('canUserAssignTag')
			->with($node->getSystemTag())
			->will($this->returnValue(true));
		$this->tagManager->method('canUserUseStaticTagInGroup')
			->willReturn(true);
		$this->tagManager->expects($this->never())
			->method('deleteTags');
		$this->tagMapper->expects($this->once())
			->method('unassignTags')
			->with(123, 'files', 1);

		$node->delete();
	}

	public function tagNodeDeleteProviderPermissionException() {
		return [
			[
				// cannot unassign invisible tag
				new SystemTag(1, 'Original', false, true),
				'Sabre\DAV\Exception\NotFound',
			],
			[
				// cannot unassign non-assignable tag
				new SystemTag(1, 'Original', true, false),
				'Sabre\DAV\Exception\Forbidden',
			],
		];
	}

	/**
	 * @dataProvider tagNodeDeleteProviderPermissionException
	 */
	public function testDeleteTagExpectedException(ISystemTag $tag, $expectedException) {
		$this->tagManager->expects($this->any())
			->method('canUserSeeTag')
			->with($tag)
			->will($this->returnValue($tag->isUserVisible()));
		$this->tagManager->expects($this->any())
			->method('canUserAssignTag')
			->with($tag)
			->will($this->returnValue($tag->isUserAssignable()));
		$this->tagManager->expects($this->never())
			->method('deleteTags');
		$this->tagMapper->expects($this->never())
			->method('unassignTags');

		$thrown = null;
		try {
			$this->getMappingNode($tag)->delete();
		} catch (\Exception $e) {
			$thrown = $e;
		}

		$this->assertInstanceOf($expectedException, $thrown);
	}

	/**
	 */
	public function testDeleteTagNotFound() {
		$this->expectException(\Sabre\DAV\Exception\NotFound::class);

		// assuming the tag existed at the time the node was created,
		// but got deleted concurrently in the database
		$tag = new SystemTag(1, 'Test', true, true);
		$this->tagManager->expects($this->once())
			->method('canUserSeeTag')
			->with($tag)
			->will($this->returnValue($tag->isUserVisible()));
		$this->tagManager->expects($this->once())
			->method('canUserAssignTag')
			->with($tag)
			->will($this->returnValue($tag->isUserAssignable()));
		$this->tagManager->method('canUserUseStaticTagInGroup')
			->willReturn(true);
		$this->tagMapper->expects($this->once())
			->method('unassignTags')
			->with(123, 'files', 1)
			->will($this->throwException(new TagNotFoundException()));

		$this->getMappingNode($tag)->delete();
	}

	/**
	 */
	public function testDeleteTagNotAllowedStaticTag() {
		$this->expectException(\Sabre\DAV\Exception\Forbidden::class);

		$tag = new SystemTag(1, 'Test', true, true, false);
		$this->tagManager->method('canUserSeeTag')
			->willReturn(true);
		$this->tagManager->method('canUserAssignTag')
			->willReturn(true);
		$this->tagManager->method('canUserUseStaticTagInGroup')
			->willReturn(false);

		$this->getMappingNode($tag)->delete();
	}
}
