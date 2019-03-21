<?php
/**
 * @author Juan Pablo Villafañez <jvillafanez@solidgear.es>
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

use OCP\ISearch;
use OCA\DAV\Files\Xml\SearchRequest;
use OCA\DAV\Connector\Sabre\FilesSearchReportPlugin;
use OCA\DAV\Connector\Sabre\Directory;
use OCA\DAV\Connector\Sabre\File;
use OCA\DAV\Connector\Sabre\Node;
use OC\Search\Result\File as ResultFile;
use Sabre\DAV\Tree;
use Sabre\DAV\Server;
use Sabre\DAV\PropFind;

class FilesSearchReportPluginTest extends \Test\TestCase {
	/** @var Server|\PHPUnit\Framework\MockObject\MockObject */
	private $server;

	/** @var Tree|\PHPUnit\Framework\MockObject\MockObject */
	private $tree;

	/** @var ISearch|\PHPUnit\Framework\MockObject\MockObject */
	private $searchService;

	/** @var FilesSearchReportPlugin|\PHPUnit\Framework\MockObject\MockObject */
	private $plugin;

	public function setUp() {
		parent::setUp();

		$this->tree = $this->getMockBuilder(Tree::class)
			->disableOriginalConstructor()
			->getMock();

		$this->server = $this->getMockBuilder(Server::class)
			->setConstructorArgs([$this->tree])
			->setMethods(['getRequestUri', 'getBaseUri', 'generateMultiStatus'])
			->getMock();

		$this->server->expects($this->any())
			->method('getBaseUri')
			->will($this->returnValue('http://example.com/owncloud/remote.php/dav'));

		$this->searchService = $this->getMockBuilder(ISearch::class)
			->disableOriginalConstructor()
			->getMock();
		$this->plugin = new FilesSearchReportPlugin($this->searchService);
	}

	private function setupBaseTreeNode($path, Node $node) {
		$this->tree->expects($this->any())
			->method('getNodeForPath')
			->with($path)
			->will($this->returnValue($node));

		$this->server->expects($this->any())
			->method('getRequestUri')
			->will($this->returnValue($path));
	}

	public function testOnReportFileNode() {
		$base = '/remote.php/dav/files/user';
		$nodePath = '/totally/unrelated/13';
		$path = "{$base}{$nodePath}";

		$node = $this->createMock(File::class);
		$node->method('getPath')->willReturn($nodePath);

		$this->setupBaseTreeNode($path, $node);
		$this->plugin->initialize($this->server);

		$this->assertNull($this->plugin->onReport(FilesSearchReportPlugin::REPORT_NAME, [], $path));
	}

	public function testOnReportWrongReportName() {
		$base = '/remote.php/dav/files/user';
		$nodePath = '/totally/unrelated/13';
		$path = "{$base}{$nodePath}";

		$node = $this->createMock(Directory::class);
		$node->method('getPath')->willReturn($nodePath);

		$this->setupBaseTreeNode($path, $node);
		$this->plugin->initialize($this->server);

		$this->assertNull($this->plugin->onReport('this name should not exist', [], $path));
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\NotImplemented
	 */
	public function testOnReportNotRoot() {
		$base = '/remote.php/dav/files/user';
		$nodePath = '/totally/unrelated/13';
		$path = "{$base}{$nodePath}";

		$node = $this->createMock(Directory::class);
		$node->method('getPath')->willReturn($nodePath);

		$this->setupBaseTreeNode($path, $node);
		$this->plugin->initialize($this->server);

		$this->plugin->onReport(FilesSearchReportPlugin::REPORT_NAME, [], $path);
	}

	public function onReportNoSearchPatternProvider() {
		return [
			[[], null],
			[['{http://owncloud.org/ns}fileid','{DAV:}getcontentlength'], null],
			[[], []],
			[['{http://owncloud.org/ns}fileid','{DAV:}getcontentlength'], []],
			[[], ['limit' => 50]],
			[['{http://owncloud.org/ns}fileid','{DAV:}getcontentlength'], ['limit' => 50]],
		];
	}

	/**
	 * @dataProvider onReportNoSearchPatternProvider
	 * @expectedException \Sabre\DAV\Exception\BadRequest
	 */
	public function testOnReportNoSearchPattern($properties, $searchInfo) {
		$base = '/remote.php/dav/files/user';
		$nodePath = '/';
		$path = "{$base}{$nodePath}";

		$parameters = new SearchRequest();
		$parameters->properties = $properties;
		$parameters->searchInfo = $searchInfo;

		$node = $this->createMock(Directory::class);
		$node->method('getPath')->willReturn($nodePath);

		$this->setupBaseTreeNode($path, $node);
		$this->plugin->initialize($this->server);

		$this->plugin->onReport(FilesSearchReportPlugin::REPORT_NAME, $parameters, $path);
	}

	public function onReportProvider() {
		return [
			[[], ['pattern' => 'go']],
			[['{http://owncloud.org/ns}fileid','{DAV:}getcontentlength'], ['pattern' => 'go']],
			[[], ['pattern' => 'se', 'limit' => 5]],
			[['{http://owncloud.org/ns}fileid','{DAV:}getcontentlength'], ['pattern' => 'se', 'limit' => 5]],
		];
	}

	/**
	 * @dataProvider onReportProvider
	 */
	public function testOnReport($properties, $searchInfo) {
		$base = '/remote.php/dav/files/user';
		$nodePath = '/';
		$path = "{$base}{$nodePath}";

		$parameters = new SearchRequest();
		$parameters->properties = $properties;
		$parameters->searchInfo = $searchInfo;

		$node = $this->createMock(Directory::class);
		$node->method('getPath')->willReturn($nodePath);

		$expectedLimit = (isset($searchInfo['limit'])) ? $searchInfo['limit'] : 30;
		$realLimit = \min($expectedLimit, 8);

		$searchList = $this->getSearchList($searchInfo['pattern'], $realLimit);
		$searchListNodePaths = \array_map(function ($path) use ($base) {
			return "{$base}{$path}";
		}, $searchList);

		$this->searchService->method('searchPaged')
			->with($searchInfo['pattern'], ['files'], 1, $expectedLimit)
			->will($this->returnCallback(function ($pattern, $apps, $page, $limit) use ($searchList) {
				return \array_map(function ($value) {
					$mock = $this->createMock(ResultFile::class);
					$mock->path = $value;
					return $mock;
				}, $searchList);
			}));

		$this->tree->method('getMultipleNodes')
			->with($searchListNodePaths)
			->will($this->returnCallback(function ($paths) use ($searchList) {
				$nodes = [];
				foreach ($paths as $key => $path) {
					$mock = $this->createMock(Node::class);
					$mock->method('getName')->willReturn($path);
					$mock->method('getId')->willReturn($key);
					$mock->method('getSize')->willReturn($key * 1024);
					$mock->method('getEtag')->willReturn(\str_repeat($key, 8));
					$nodes[$path] = $mock;
				}
				return $nodes;
			}));

		$responses = [];
		$this->server->expects($this->once())
			->method('generateMultiStatus')
			->will($this->returnCallback(function ($responsesArg) use (&$responses) {
				foreach ($responsesArg as $responseArg) {
					$responses[] = $responseArg;
				}
			})
		);

		$this->setupBaseTreeNode($path, $node);
		$this->plugin->initialize($this->server);

		// setup a propfind handler to fill some data
		$this->server->on('propFind', function (Propfind $propfind, $node) {
			$propfind->handle('{http://owncloud.org/ns}fileid', $node->getId());
			$propfind->handle('{DAV:}getcontentlength', $node->getSize());
			$propfind->handle('{DAV:}getetag', $node->getEtag());
		});

		$this->plugin->onReport(FilesSearchReportPlugin::REPORT_NAME, $parameters, $path);

		$this->assertEquals($realLimit, \count($responses));
		if ($properties === []) {
			foreach ($responses as $key => $response) {
				// dav properties should be shown while non-dav properties won't appear
				$this->assertEquals($key * 1024, $response[200]['{DAV:}getcontentlength']);
				$this->assertEquals(\str_repeat($key, 8), $response[200]['{DAV:}getetag']);
				$this->assertFalse(isset($response[200]['{http://owncloud.org/ns}fileid']));
			}
		} else {
			$propfindProperties = [
				'{http://owncloud.org/ns}fileid',
				'{DAV:}getcontentlength',
				'{DAV:}getetag',
			];
			$foundProperties = \array_intersect($properties, $propfindProperties);
			$notFoundProperties = \array_diff($properties, $propfindProperties);
			$notRequestedProperties = \array_diff($propfindProperties, $properties);
			foreach ($responses as $key => $response) {
				// only requested properties should appear
				foreach ($foundProperties as $foundProperty) {
					switch ($foundProperty) {
						case '{DAV:}getcontentlength':
							$this->assertEquals($key * 1024, $response[200]['{DAV:}getcontentlength']);
							break;
						case '{DAV:}getetag':
							$this->assertEquals(\str_repeat($key, 8), $response[200]['{DAV:}getetag']);
							break;
						case '{http://owncloud.org/ns}fileid':
							$this->assertEquals($key, $response[200]['{http://owncloud.org/ns}fileid']);
							break;
					}
				}
				foreach ($notFoundProperties as $notFoundProperty) {
					$this->assertTrue(isset($response[400][$notFoundProperty]));
				}
				foreach ($notRequestedProperties as $notRequestedProperty) {
					$this->assertFalse(isset($response[200][$notRequestedProperty]));
					$this->assertFalse(isset($response[400][$notRequestedProperty]));
				}
			}
		}
	}

	private function getSearchList($search, $numberOfItems) {
		$results = [];
		$pathParts = [];
		for ($i = 0 ; $i < $numberOfItems ; $i++) {
			$pathParts[] = $search . \strval($i);
			$results[] = '/' . \implode('/', $pathParts);
		}
		return $results;
	}

	public function getSupportedReportSetProvider() {
		return [
			['/remote.php/dav/files/user', '/totally/unrelated/13'],
			['/remote.php/dav/files/user', '/'],
			['/remote.php/webdav', '/totally/unrelated/13'],
			['/remote.php/webdav', '/'],
		];
	}

	/**
	 * @dataProvider getSupportedReportSetProvider
	 */
	public function testGetSupportedReportSet($base, $nodePath) {
		$path = "{$base}{$nodePath}";

		$node = $this->createMock(Directory::class);
		$node->method('getPath')->willReturn($nodePath);

		$this->setupBaseTreeNode($path, $node);
		$this->plugin->initialize($this->server);

		if ($nodePath === '/') {
			$this->assertEquals(
				['{http://owncloud.org/ns}search-files'],
				$this->plugin->getSupportedReportSet($path)
			);
		} else {
			$this->assertEquals([], $this->plugin->getSupportedReportSet($path));
		}
	}
}
