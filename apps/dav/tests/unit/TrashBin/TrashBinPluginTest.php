<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\DAV\Tests\Unit\TrashBin;

use OCA\DAV\TrashBin\ITrashBinNode;
use OCA\DAV\TrashBin\TrashBinPlugin;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\INode;
use Sabre\DAV\PropFind;
use Sabre\DAV\Server;
use Sabre\DAV\Tree;
use Sabre\DAV\Xml\Property\GetLastModified;
use Test\TestCase;

class TrashBinPluginTest extends TestCase {
	public function testInit() {
		$server = $this->createMock(Server::class);
		$server->expects($this->exactly(2))
			->method('on')
			->withConsecutive(
				['propFind', $this->anything()],
				['beforeMove', $this->anything()]
			);

		$plugin = new TrashBinPlugin();
		$plugin->initialize($server);
	}

	public function testBeforeMoveTrashBinSourceDestinationExistsThrows() {
		$sourceNode = $this->createMock(ITrashBinNode::class);

		$tree = $this->createMock(Tree::class);
		$tree->method('getNodeForPath')->with('trash-bin/user/1')->willReturn($sourceNode);
		$tree->method('nodeExists')->with('files/user/foo.txt')->willReturn(true);

		$server = $this->createMock(Server::class);
		$server->tree = $tree;

		$plugin = new TrashBinPlugin();
		$plugin->initialize($server);

		$this->expectException(Forbidden::class);
		$plugin->beforeMove('trash-bin/user/1', 'files/user/foo.txt');
	}

	public function testBeforeMoveTrashBinSourceDestinationMissingReturnsTrue() {
		$sourceNode = $this->createMock(ITrashBinNode::class);

		$tree = $this->createMock(Tree::class);
		$tree->method('getNodeForPath')->with('trash-bin/user/1')->willReturn($sourceNode);
		$tree->method('nodeExists')->with('files/user/foo.txt')->willReturn(false);

		$server = $this->createMock(Server::class);
		$server->tree = $tree;

		$plugin = new TrashBinPlugin();
		$plugin->initialize($server);

		self::assertTrue($plugin->beforeMove('trash-bin/user/1', 'files/user/foo.txt'));
	}

	public function testBeforeMoveNonTrashBinSourceReturnsTrue() {
		$sourceNode = $this->createMock(INode::class);

		$tree = $this->createMock(Tree::class);
		$tree->method('getNodeForPath')->willReturn($sourceNode);
		$tree->expects(self::never())->method('nodeExists');

		$server = $this->createMock(Server::class);
		$server->tree = $tree;

		$plugin = new TrashBinPlugin();
		$plugin->initialize($server);

		self::assertTrue($plugin->beforeMove('files/user/a.txt', 'files/user/b.txt'));
	}

	/**
	 * @dataProvider providesMethods
	 */
	public function testPropFind($expectedMethod, $expectedMethodReturn, $prop, $methodReturnValue = null) {
		if ($methodReturnValue === null) {
			$methodReturnValue = $expectedMethodReturn;
		}
		$node = $this->createMock(ITrashBinNode::class);
		$node->expects(self::once())->method($expectedMethod)->willReturn($methodReturnValue);
		$propFind = new PropFind('', [$prop]);
		$plugin = new TrashBinPlugin();
		$plugin->propFind($propFind, $node);

		self::assertEquals($expectedMethodReturn, $propFind->get($prop));
	}

	public function providesMethods() {
		return [
			['getOriginalFileName', 'bar.txt', TrashBinPlugin::TRASHBIN_ORIGINAL_FILENAME],
			['getOriginalLocation', 'foo/bar.txt', TrashBinPlugin::TRASHBIN_ORIGINAL_LOCATION],
			['getDeleteTimestamp', 123456, TrashBinPlugin::TRASHBIN_DELETE_TIMESTAMP],
			['getDeleteTimestamp', new GetLastModified(123456), TrashBinPlugin::TRASHBIN_DELETE_DATETIME, 123456]
		];
	}
}
