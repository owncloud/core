<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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

namespace OCA\DAV\Tests\unit\Connector\Sabre;

use OC\Files\View;
use OCA\DAV\Connector\Sabre\Directory;
use OCA\DAV\Connector\Sabre\FilesPlugin;
use OCA\DAV\Connector\Sabre\FilesReportPlugin as FilesReportPluginImplementation;
use OCA\DAV\Files\Xml\FilterRequest;
use OCP\Files\File;
use OCP\Files\Folder;
use OCP\IConfig;
use OCP\IGroupManager;
use OCP\IRequest;
use OCP\ITags;
use OCP\IUserSession;
use OCP\SystemTag\ISystemTagManager;
use OCP\SystemTag\ISystemTagObjectMapper;
use OCP\SystemTag\TagNotFoundException;
use PHPUnit\Framework\MockObject\MockObject;
use Sabre\DAV\Server;
use Sabre\DAV\Tree;
use Sabre\HTTP\ResponseInterface;
use Test\TestCase;
use function array_keys;
use function array_values;

class FilesReportPluginTest extends TestCase {
	/** @var Server|MockObject */
	private $server;

	/** @var Tree|MockObject */
	private $tree;

	/** @var ISystemTagObjectMapper|MockObject */
	private $tagMapper;

	/** @var ISystemTagManager|MockObject */
	private $tagManager;

	/** @var ITags|MockObject */
	private $privateTags;

	/** @var  IUserSession */
	private $userSession;

	/** @var FilesReportPluginImplementation */
	private $plugin;

	/** @var View|MockObject **/
	private $view;

	/** @var IGroupManager|MockObject **/
	private $groupManager;

	/** @var Folder|MockObject **/
	private $userFolder;

	public function setUp(): void {
		parent::setUp();
		$this->tree = $this->getMockBuilder('\Sabre\DAV\Tree')
			->disableOriginalConstructor()
			->getMock();

		$this->view = new View();

		$this->server = $this->getMockBuilder('\Sabre\DAV\Server')
			->setConstructorArgs([$this->tree])
			->setMethods(['getRequestUri', 'getBaseUri', 'generateMultiStatus'])
			->getMock();

		$this->server->expects($this->any())
			->method('getBaseUri')
			->willReturn('http://example.com/owncloud/remote.php/dav');

		$this->groupManager = $this->getMockBuilder('\OCP\IGroupManager')
			->disableOriginalConstructor()
			->getMock();

		$this->userFolder = $this->getMockBuilder('\OCP\Files\Folder')
			->disableOriginalConstructor()
			->getMock();

		$this->tagManager = $this->createMock('\OCP\SystemTag\ISystemTagManager');
		$this->tagMapper = $this->createMock('\OCP\SystemTag\ISystemTagObjectMapper');
		$this->userSession = $this->createMock('\OCP\IUserSession');
		$this->privateTags = $this->createMock('\OCP\ITags');
		$privateTagManager = $this->createMock('\OCP\ITagManager');
		$privateTagManager->expects($this->any())
			->method('load')
			->with('files')
			->willReturn($this->privateTags);

		$user = $this->createMock('\OCP\IUser');
		$user->expects($this->any())
			->method('getUID')
			->willReturn('testuser');
		$this->userSession->expects($this->any())
			->method('getUser')
			->willReturn($user);

		// add FilesPlugin to test more properties
		$this->server->addPlugin(
			new FilesPlugin(
				$this->tree,
				$this->createMock(IConfig::class),
				$this->createMock(IRequest::class)
			)
		);

		$this->plugin = new FilesReportPluginImplementation(
			$this->tree,
			$this->view,
			$this->tagManager,
			$this->tagMapper,
			$privateTagManager,
			$this->userSession,
			$this->groupManager,
			$this->userFolder
		);
	}

	public function testOnReportInvalidNode() {
		$path = 'totally/unrelated/13';

		$this->tree->expects($this->any())
			->method('getNodeForPath')
			->with('/' . $path)
			->will($this->returnValue($this->createMock('\Sabre\DAV\INode')));

		$this->server->expects($this->any())
			->method('getRequestUri')
			->will($this->returnValue($path));
		$this->plugin->initialize($this->server);

		$this->assertNull($this->plugin->onReport(FilesReportPluginImplementation::REPORT_NAME, [], '/' . $path));
	}

	public function testOnReportInvalidReportName() {
		$path = 'test';

		$this->tree->expects($this->any())
			->method('getNodeForPath')
			->with('/' . $path)
			->will($this->returnValue($this->createMock('\Sabre\DAV\INode')));

		$this->server->expects($this->any())
			->method('getRequestUri')
			->will($this->returnValue($path));
		$this->plugin->initialize($this->server);

		$this->assertNull($this->plugin->onReport('{whoever}whatever', [], '/' . $path));
	}

	public function testOnReport() {
		$path = 'test';

		$parameters = new FilterRequest();
		$parameters->properties = [
			'{DAV:}getcontentlength',
			'{http://owncloud.org/ns}size',
			'{http://owncloud.org/ns}fileid',
			'{DAV:}resourcetype',
		];
		$parameters->filters = [
			'systemtag' => [123, 456],
			'favorite' => null
		];

		$this->groupManager->expects($this->any())
			->method('isAdmin')
			->willReturn(true);

		$this->tagMapper
			->expects($this->exactly(2))
			->method('getObjectIdsForTags')
			->withConsecutive(
				['123', 'files'],
				['456', 'files'],
			)
			->willReturnOnConsecutiveCalls(
				['111', '222'],
				['111', '222', '333'],
			);

		$reportTargetNode = $this->createMock(Directory::class);
		$reportTargetNode->method('getPath')->willReturn('');
		$response = $this->createMock(ResponseInterface::class);
		$response->expects($this->once())
			->method('setHeader')
			->with('Content-Type', 'application/xml; charset=utf-8');

		$response->expects($this->once())
			->method('setStatus')
			->with(207);

		$response->expects($this->once())
			->method('setBody');

		$this->tree->expects($this->any())
			->method('getNodeForPath')
			->with('/' . $path)
			->willReturn($reportTargetNode);

		$filesNode1 = $this->createMock(Folder::class);
		$filesNode1->method('getId')->willReturn(111);
		$filesNode1->method('getPath')->willReturn('/node1');
		$filesNode1->method('isReadable')->willReturn(true);
		$filesNode1->method('getSize')->willReturn(2048);
		$filesNode2 = $this->createMock(File::class);
		$filesNode2->method('getId')->willReturn(222);
		$filesNode2->method('getPath')->willReturn('/sub/node2');
		$filesNode2->method('getSize')->willReturn(1024);
		$filesNode2->method('isReadable')->willReturn(true);

		$this->userFolder
			->expects($this->exactly(2))
			->method('getById')
			->withConsecutive(
				['111'],
				['222'],
			)
			->willReturnOnConsecutiveCalls(
				[$filesNode1],
				[$filesNode2],
			);

		$this->server->expects($this->any())
			->method('getRequestUri')
			->willReturn($path);
		$this->server->httpResponse = $response;
		$this->plugin->initialize($this->server);

		$responses = null;
		$this->server->expects($this->once())
			->method('generateMultiStatus')
			->willReturnCallback(
				function ($responsesArg) use (&$responses) {
					$responses = $responsesArg;
				}
			);

		$this->assertFalse($this->plugin->onReport(FilesReportPluginImplementation::REPORT_NAME, $parameters, '/' . $path));

		$this->assertCount(2, $responses);

		$this->assertTrue(isset($responses[0][200]));
		$this->assertTrue(isset($responses[1][200]));

		$this->assertEquals('/test/node1', $responses[0]['href']);
		$this->assertEquals('/test/sub/node2', $responses[1]['href']);

		$props1 = $responses[0];
		$this->assertEquals('111', $props1[200]['{http://owncloud.org/ns}fileid']);
		$this->assertNull($props1[404]['{DAV:}getcontentlength']);
		$this->assertInstanceOf('\Sabre\DAV\Xml\Property\ResourceType', $props1[200]['{DAV:}resourcetype']);
		$resourceType1 = $props1[200]['{DAV:}resourcetype']->getValue();
		$this->assertEquals('{DAV:}collection', $resourceType1[0]);

		$props2 = $responses[1];
		$this->assertEquals('1024', $props2[200]['{DAV:}getcontentlength']);
		$this->assertEquals('222', $props2[200]['{http://owncloud.org/ns}fileid']);
		$this->assertInstanceOf('\Sabre\DAV\Xml\Property\ResourceType', $props2[200]['{DAV:}resourcetype']);
		$this->assertCount(0, $props2[200]['{DAV:}resourcetype']->getValue());
	}

	public function testOnReportPaginationFiltered(): void {
		$path = 'test';

		$parameters = new FilterRequest();
		$parameters->properties = [
			'{DAV:}getcontentlength',
		];
		$parameters->filters = [
			'systemtag' => [],
			'favorite' => true
		];
		$parameters->search = [
			'offset' => 2,
			'limit' => 3,
		];

		$filesNodes = [];
		for ($i = 0; $i < 20; $i++) {
			$filesNode = $this->createMock(File::class);
			$filesNode->method('getId')->willReturn(1000 + $i);
			$filesNode->method('getPath')->willReturn('/nodes/node' . $i);
			$filesNode->method('isReadable')->willReturn(true);
			$filesNodes[$filesNode->getId()] = $filesNode;
		}

		// return all above nodes as favorites
		$this->privateTags->expects($this->once())
			->method('getFavorites')
			->willReturn(array_keys($filesNodes));

		$reportTargetNode = $this->createMock(Directory::class);
		$reportTargetNode->method('getPath')->willReturn('/');

		$this->tree->expects($this->any())
			->method('getNodeForPath')
			->with('/' . $path)
			->willReturn($reportTargetNode);

		// getById must only be called for the required nodes
		$this->userFolder
			->expects($this->exactly(3))
			->method('getById')
			->withConsecutive(
				[1002],
				[1003],
				[1004],
			)
			->willReturnOnConsecutiveCalls(
				[$filesNodes[1002]],
				[$filesNodes[1003]],
				[$filesNodes[1004]],
			);

		$this->server->expects($this->any())
			->method('getRequestUri')
			->willReturn($path);

		$this->plugin->initialize($this->server);

		$responses = null;
		$this->server->expects($this->once())
			->method('generateMultiStatus')
			->willReturnCallback(
				function ($responsesArg) use (&$responses) {
					$responses = $responsesArg;
				}
			);

		$this->assertFalse($this->plugin->onReport(FilesReportPluginImplementation::REPORT_NAME, $parameters, '/' . $path));

		$this->assertCount(3, $responses);

		$this->assertEquals('/test/nodes/node2', $responses[0]['href']);
		$this->assertEquals('/test/nodes/node3', $responses[1]['href']);
		$this->assertEquals('/test/nodes/node4', $responses[2]['href']);
	}

	public function testFindNodesByFileIdsRoot() {
		$filesNode1 = $this->getMockBuilder('\OCP\Files\Folder')
			->disableOriginalConstructor()
			->getMock();
		$filesNode1->expects($this->once())
			->method('getName')
			->will($this->returnValue('first node'));

		$filesNode2 = $this->getMockBuilder('\OCP\Files\File')
			->disableOriginalConstructor()
			->getMock();
		$filesNode2->expects($this->once())
			->method('getName')
			->will($this->returnValue('second node'));

		$reportTargetNode = $this->getMockBuilder('\OCA\DAV\Connector\Sabre\Directory')
			->disableOriginalConstructor()
			->getMock();
		$reportTargetNode->expects($this->any())
			->method('getPath')
			->will($this->returnValue('/'));

		$this->userFolder
			->expects($this->exactly(2))
			->method('getById')
			->withConsecutive(
				['111'],
				['222'],
			)
			->willReturnOnConsecutiveCalls(
				[$filesNode1],
				[$filesNode2],
			);

		/** @var Directory|MockObject $reportTargetNode */
		$result = $this->plugin->findNodesByFileIds($reportTargetNode, ['111', '222']);

		$this->assertCount(2, $result);
		$this->assertInstanceOf('\OCA\DAV\Connector\Sabre\Directory', $result[0]);
		$this->assertEquals('first node', $result[0]->getName());
		$this->assertInstanceOf('\OCA\DAV\Connector\Sabre\File', $result[1]);
		$this->assertEquals('second node', $result[1]->getName());
	}

	public function testFindNodesByFileIdsSubDir() {
		$filesNode1 = $this->getMockBuilder('\OCP\Files\Folder')
			->disableOriginalConstructor()
			->getMock();
		$filesNode1->expects($this->once())
			->method('getName')
			->will($this->returnValue('first node'));

		$filesNode2 = $this->getMockBuilder('\OCP\Files\File')
			->disableOriginalConstructor()
			->getMock();
		$filesNode2->expects($this->once())
			->method('getName')
			->will($this->returnValue('second node'));

		$reportTargetNode = $this->getMockBuilder('\OCA\DAV\Connector\Sabre\Directory')
			->disableOriginalConstructor()
			->getMock();
		$reportTargetNode->expects($this->any())
			->method('getPath')
			->will($this->returnValue('/sub1/sub2'));

		$subNode = $this->getMockBuilder('\OCP\Files\Folder')
			->disableOriginalConstructor()
			->getMock();

		$this->userFolder->expects($this->once())
			->method('get')
			->with('/sub1/sub2')
			->will($this->returnValue($subNode));

		$subNode
			->expects($this->exactly(2))
			->method('getById')
			->withConsecutive(
				['111'],
				['222'],
			)
			->willReturnOnConsecutiveCalls(
				[$filesNode1],
				[$filesNode2],
			);

		/** @var Directory|MockObject $reportTargetNode */
		$result = $this->plugin->findNodesByFileIds($reportTargetNode, ['111', '222']);

		$this->assertCount(2, $result);
		$this->assertInstanceOf('\OCA\DAV\Connector\Sabre\Directory', $result[0]);
		$this->assertEquals('first node', $result[0]->getName());
		$this->assertInstanceOf('\OCA\DAV\Connector\Sabre\File', $result[1]);
		$this->assertEquals('second node', $result[1]->getName());
	}

	public function testProcessFilterRulesSingle() {
		$this->groupManager->expects($this->any())
			->method('isAdmin')
			->will($this->returnValue(true));

		$this->tagMapper->expects($this->exactly(1))
			->method('getObjectIdsForTags')
			->withConsecutive(
				['123', 'files']
			)
			->willReturnMap([
				['123', 'files', 0, '', ['111', '222']],
			]);

		$rules = [
			'systemtag' => ['123'],
			'favorite' => null
		];

		$this->assertEquals(['111', '222'], self::invokePrivate($this->plugin, 'processFilterRules', [$rules]));
	}

	public function testProcessFilterRulesAndCondition() {
		$this->groupManager->expects($this->any())
			->method('isAdmin')
			->will($this->returnValue(true));

		$this->tagMapper->expects($this->exactly(2))
			->method('getObjectIdsForTags')
			->withConsecutive(
				['123', 'files'],
				['456', 'files']
			)
			->willReturnMap([
				['123', 'files', 0, '', ['111', '222']],
				['456', 'files', 0, '', ['222', '333']],
			]);

		$rules = [
			'systemtag' => ['123', '456'],
			'favorite' => null
		];

		$this->assertEquals(['222'], array_values(self::invokePrivate($this->plugin, 'processFilterRules', [$rules])));
	}

	public function testProcessFilterRulesAndConditionWithOneEmptyResult() {
		$this->groupManager->expects($this->any())
			->method('isAdmin')
			->will($this->returnValue(true));

		$this->tagMapper->expects($this->exactly(2))
			->method('getObjectIdsForTags')
			->withConsecutive(
				['123', 'files'],
				['456', 'files']
			)
			->willReturnMap([
				['123', 'files', 0, '', ['111', '222']],
				['456', 'files', 0, '', []],
			]);

		$rules = [
			'systemtag' => ['123', '456'],
			'favorite' => null
		];

		$this->assertEquals([], array_values(self::invokePrivate($this->plugin, 'processFilterRules', [$rules])));
	}

	public function testProcessFilterRulesAndConditionWithFirstEmptyResult() {
		$this->groupManager->expects($this->any())
			->method('isAdmin')
			->will($this->returnValue(true));

		$this->tagMapper->expects($this->exactly(1))
			->method('getObjectIdsForTags')
			->withConsecutive(
				['123', 'files'],
				['456', 'files']
			)
			->willReturnMap([
				['123', 'files', 0, '', []],
				['456', 'files', 0, '', ['111', '222']],
			]);

		$rules = [
			'systemtag' => ['123', '456'],
			'favorite' => null
		];

		$this->assertEquals([], array_values(self::invokePrivate($this->plugin, 'processFilterRules', [$rules])));
	}

	public function testProcessFilterRulesAndConditionWithEmptyMidResult() {
		$this->groupManager->expects($this->any())
			->method('isAdmin')
			->will($this->returnValue(true));

		$this->tagMapper->expects($this->exactly(2))
			->method('getObjectIdsForTags')
			->withConsecutive(
				['123', 'files'],
				['456', 'files'],
				['789', 'files']
			)
			->willReturnMap([
				['123', 'files', 0, '', ['111', '222']],
				['456', 'files', 0, '', ['333']],
				['789', 'files', 0, '', ['111', '222']],
			]);

		$rules = [
			'systemtag' => ['123', '456', '789'],
			'favorite' => null
		];

		$this->assertEquals([], array_values(self::invokePrivate($this->plugin, 'processFilterRules', [$rules])));
	}

	public function testProcessFilterRulesInvisibleTagAsAdmin() {
		$this->groupManager->expects($this->any())
			->method('isAdmin')
			->will($this->returnValue(true));

		$tag1 = $this->createMock('\OCP\SystemTag\ISystemTag');
		$tag1->expects($this->any())
			->method('getId')
			->will($this->returnValue('123'));
		$tag1->expects($this->any())
			->method('isUserVisible')
			->will($this->returnValue(true));

		$tag2 = $this->createMock('\OCP\SystemTag\ISystemTag');
		$tag2->expects($this->any())
			->method('getId')
			->will($this->returnValue('123'));
		$tag2->expects($this->any())
			->method('isUserVisible')
			->will($this->returnValue(false));

		// no need to fetch tags to check permissions
		$this->tagManager->expects($this->never())
			->method('getTagsByIds');

		$this->tagMapper
			->expects($this->exactly(2))
			->method('getObjectIdsForTags')
			->withConsecutive(
				['123'],
				['456'],
			)
			->willReturnOnConsecutiveCalls(
				['111', '222'],
				['222', '333'],
			);

		$rules = [
			'systemtag' => ['123', '456'],
			'favorite' => null
		];

		$this->assertEquals(['222'], array_values(self::invokePrivate($this->plugin, 'processFilterRules', [$rules])));
	}

	/**
	 */
	public function testProcessFilterRulesInvisibleTagAsUser() {
		$this->expectException(TagNotFoundException::class);

		$this->groupManager->expects($this->any())
			->method('isAdmin')
			->will($this->returnValue(false));

		$tag1 = $this->createMock('\OCP\SystemTag\ISystemTag');
		$tag1->expects($this->any())
			->method('getId')
			->will($this->returnValue('123'));
		$tag1->expects($this->any())
			->method('isUserVisible')
			->will($this->returnValue(true));

		$tag2 = $this->createMock('\OCP\SystemTag\ISystemTag');
		$tag2->expects($this->any())
			->method('getId')
			->will($this->returnValue('123'));
		$tag2->expects($this->any())
			->method('isUserVisible')
			->will($this->returnValue(false)); // invisible

		$this->tagManager->expects($this->once())
			->method('getTagsByIds')
			->with(['123', '456'])
			->will($this->returnValue([$tag1, $tag2]));

		$rules = [
			'systemtag' => ['123', '456'],
			'favorite' => null
		];

		self::invokePrivate($this->plugin, 'processFilterRules', [$rules]);
	}

	public function testProcessFilterRulesVisibleTagAsUser() {
		$this->groupManager->expects($this->any())
			->method('isAdmin')
			->will($this->returnValue(false));

		$tag1 = $this->createMock('\OCP\SystemTag\ISystemTag');
		$tag1->expects($this->any())
			->method('getId')
			->will($this->returnValue('123'));
		$tag1->expects($this->any())
			->method('isUserVisible')
			->will($this->returnValue(true));

		$tag2 = $this->createMock('\OCP\SystemTag\ISystemTag');
		$tag2->expects($this->any())
			->method('getId')
			->will($this->returnValue('123'));
		$tag2->expects($this->any())
			->method('isUserVisible')
			->will($this->returnValue(true));

		$this->tagManager->expects($this->once())
			->method('getTagsByIds')
			->with(['123', '456'])
			->will($this->returnValue([$tag1, $tag2]));

		$this->tagMapper
			->expects($this->exactly(2))
			->method('getObjectIdsForTags')
			->withConsecutive(
				['123'],
				['456'],
			)
			->willReturnOnConsecutiveCalls(
				['111', '222'],
				['222', '333'],
			);

		$rules = [
			'systemtag' => ['123', '456'],
			'favorite' => null
		];

		$this->assertEquals(['222'], array_values(self::invokePrivate($this->plugin, 'processFilterRules', [$rules])));
	}

	public function testProcessFavoriteFilter() {
		$rules = [
			'systemtag' => [],
			'favorite' => true
		];

		$this->privateTags->expects($this->once())
			->method('getFavorites')
			->will($this->returnValue(['456', '789']));

		$this->assertEquals(['456', '789'], array_values(self::invokePrivate($this->plugin, 'processFilterRules', [$rules])));
	}

	public function filesBaseUriProvider() {
		return [
			['', '', ''],
			['files/username', '', '/files/username'],
			['files/username/test', '/test', '/files/username'],
			['files/username/test/sub', '/test/sub', '/files/username'],
			['test', '/test', ''],
		];
	}

	/**
	 * @dataProvider filesBaseUriProvider
	 */
	public function testFilesBaseUri($uri, $reportPath, $expectedUri) {
		$this->assertEquals($expectedUri, self::invokePrivate($this->plugin, 'getFilesBaseUri', [$uri, $reportPath]));
	}
}
