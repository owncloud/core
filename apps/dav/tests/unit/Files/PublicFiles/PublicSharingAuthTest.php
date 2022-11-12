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

use OCA\DAV\Files\PublicFiles\PublicSharingAuth;
use OCA\DAV\Files\PublicFiles\PublicSharedRootNode;
use OCP\Share\IManager;
use OCP\Share\IShare;
use PHPUnit\Framework\MockObject\MockObject;
use Sabre\DAV\Server;
use Sabre\DAV\Tree;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use Test\TestCase;

class PublicSharingAuthTest extends TestCase {
	/**
	 * @dataProvider providesCheckData
	 */
	public function testCheck($expectedResult, $shareNode, $authHeader = null) {
		$tree = $this->createMock(Tree::class);
		$server = $this->createMock(Server::class);
		$server->tree = $tree;
		$manager = $this->createMock(IManager::class);
		$manager->method('checkPassword')->willReturnCallback(static function ($share, $password) {
			return $share->getPassword() === $password;
		});

		$tree->method('getNodeForPath')->willReturn($shareNode);
		$auth = new PublicSharingAuth($server, $manager);

		$req = $this->createMock(RequestInterface::class);
		$req->method('getPath')->willReturn('public-files/123456');
		if ($auth) {
			$req->method('getHeader')->willReturnCallback(static function ($key) use ($authHeader) {
				if ($key === 'Authorization') {
					return $authHeader;
				}
				return null;
			});
		}
		$resp = $this->createMock(ResponseInterface::class);
		$result = $auth->check($req, $resp);

		self::assertEquals($expectedResult, $result);
	}

	public function providesCheckData() {
		$validResult = [true, 'principals/system/public'];
		$authHeaderMissing = [false, 'No \'Authorization: Basic\' header found. Either the client didn\'t send one, or the server is misconfigured'];
		$wrongUserOrPassword = [false, 'Username or password was incorrect'];
		$shareWithoutPassword = $this->createPublicSharedRootNode();
		$shareWithPassword = $this->createPublicSharedRootNode('123456');

		return [
			'not a share node' => [$validResult, null],
			'no password' => [$validResult, $shareWithoutPassword],
			'with password - but no auth header' => [$authHeaderMissing, $shareWithPassword],
			'with password - and valid auth header' => [$validResult, $shareWithPassword, 'Basic cHVibGljOjEyMzQ1Ng=='],
			'with password - and wrong password in auth header' => [$wrongUserOrPassword, $shareWithPassword, 'Basic cHViaWM6MTIzNDU2'],
			'with password - and invalid auth header' => [$authHeaderMissing, $shareWithPassword, 'Basic 1111111'],
		];
	}

	/**
	 * @return MockObject
	 */
	private function createPublicSharedRootNode($password = null) {
		$shareWithoutPassword = $this->createMock(PublicSharedRootNode::class);
		$share = $this->createMock(IShare::class);
		if ($password) {
			$share->method('getPassword')->willReturn($password);
		}
		$shareWithoutPassword->method('getShare')->willReturn($share);
		return $shareWithoutPassword;
	}
}
