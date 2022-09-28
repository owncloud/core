<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
 */

namespace OCA\DAV\Tests\Unit\Meta;

use OCA\DAV\Meta\MetaFolder;
use OCA\DAV\Meta\MetaPlugin;
use OCP\Files\Folder;
use OCP\Files\IRootFolder;
use OCP\Files\Node;
use OCP\IUser;
use OCP\IUserSession;
use PHPUnit\Framework\MockObject\MockObject;
use Sabre\DAV\PropFind;
use Sabre\DAV\Server;
use Sabre\DAV\Xml\Service as XMLService;
use Test\TestCase;

class MetaPluginTest extends TestCase {
	/** @var MetaPlugin */
	private $plugin;
	/**
	 * @var IRootFolder | MockObject
	 */
	private $rootfolder;
	/**
	 * @var IUserSession | MockObject
	 */
	private $userSession;
	/**
	 * @var Server | MockObject
	 */
	private $server;

	public function setUp(): void {
		parent::setUp();

		$this->userSession = $this->createMock(IUserSession::class);
		$this->rootfolder = $this->createMock(IRootFolder::class);

		$uid = 'alice';
		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn($uid);
		$this->userSession->method('getUser')->willReturn($user);

		$baseFolder = $this->createMock(Folder::class);
		$baseFolder->method('getById')->willReturnCallback(function ($fileId) {
			if ($fileId === '1234') {
				$matchingFile = $this->createMock(Node::class);
				$matchingFile->method('getPath')->willReturn('/foo/bar/lorem.txt');
				return [$matchingFile];
			}
			return [];
		});
		$baseFolder->method('getRelativePath')->willReturnArgument(0);
		$this->rootfolder->method('get')->with($uid . '/files/')->willReturn($baseFolder);

		$this->plugin = new MetaPlugin($this->userSession, $this->rootfolder);

		/** @var Server | MockObject $server */
		$this->server = $this->createMock(Server::class);

		$xmlService = $this->createMock(XMLService::class);
		$this->server->xml = $xmlService;
	}

	public function testInit() {
		$this->server->expects(self::once())->method('on')->with('propFind');
		$this->plugin->initialize($this->server);
	}

	/**
	 * @dataProvider providesMethods
	 */
	public function testPropFind($fileId, $filePath) {
		$prop = MetaPlugin::PATH_FOR_FILEID_PROPERTYNAME;
		$node = $this->createMock(MetaFolder::class);
		$node->expects(self::once())->method('getName')->willReturn($fileId);
		$propFind = new PropFind('', [$prop]);
		$this->plugin->handleGetProperties($propFind, $node);

		self::assertEquals($filePath, $propFind->get($prop));
	}

	public function providesMethods() {
		return [
			['1234', '/foo/bar/lorem.txt'],
			['0000', null]
		];
	}
}
