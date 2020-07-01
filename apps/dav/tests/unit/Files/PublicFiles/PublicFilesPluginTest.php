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

namespace OCA\DAV\Tests\Unit\Files\PublicFiles;

use OCA\DAV\Files\PublicFiles\PublicFilesPlugin;
use OCA\DAV\Files\PublicFiles\PublicSharedRootNode;
use OCA\DAV\Files\PublicFiles\SharedFolder;
use OCP\Files\NotFoundException;
use OCP\Share\IShare;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\PropFind;
use Sabre\DAV\Server;
use Sabre\DAV\Xml\Property\GetLastModified;
use Test\TestCase;

class PublicFilesPluginTest extends TestCase {
	public function testInit() {
		$plugin = new PublicFilesPlugin();

		$server = $this->createMock(Server::class);
		$server->expects($this->exactly(4))
			->method('on')
			->withConsecutive(
				['propFind', [$plugin, 'propFind']],
				['beforeMethod:PUT', [$plugin, 'beforePut']],
				['beforeWriteContent', [$plugin, 'handleBeforeWriteContent']],
				['beforeCreateFile', [$plugin, 'handleBeforeCreateFile']]
			);

		$plugin->initialize($server);
	}

	/**
	 * @dataProvider providesMethods
	 */
	public function testPropFindPublicSharedRootNode($expectedMethod, $expectedMethodReturn, $prop, $methodReturnValue = null) {
		if ($methodReturnValue === null) {
			$methodReturnValue = $expectedMethodReturn;
		}
		$node = $this->createMock(PublicSharedRootNode::class);
		$share = $this->createMock(IShare::class);
		$node->method('getShare')->willReturn($share);
		$share->expects(self::once())->method($expectedMethod)->willReturn($methodReturnValue);
		$propFind = new PropFind('', [$prop]);
		$plugin = new PublicFilesPlugin();
		$plugin->propFind($propFind, $node);

		self::assertEquals($expectedMethodReturn, $propFind->get($prop));
	}

	public function providesMethods() {
		return [
			['getShareOwner', 'alice', PublicFilesPlugin::PUBLIC_LINK_SHARE_OWNER],
			['getExpirationDate', new GetLastModified(123456), PublicFilesPlugin::PUBLIC_LINK_EXPIRATION, 123456],
			['getPermissions', 1, PublicFilesPlugin::PUBLIC_LINK_PERMISSION],
			['getNodeType', 'file', PublicFilesPlugin::PUBLIC_LINK_ITEM_TYPE],
			['getShareTime', new GetLastModified(123456), PublicFilesPlugin::PUBLIC_LINK_SHARE_DATETIME, 123456],
		];
	}

	public function testHandleBeforeCreateFile() {
		$this->expectException(NotFound::class);

		$share = $this->createMock(IShare::class);
		$share->expects(self::once())
			->method('getNode')
			->willThrowException(new NotFoundException());

		$parent = $this->createMock(SharedFolder::class);
		$parent->expects(self::once())
			->method('getShare')
			->willReturn($share);

		$plugin = new PublicFilesPlugin();
		$plugin->handleBeforeCreateFile(null, null, $parent, true);
	}
}
