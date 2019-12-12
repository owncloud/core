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

use OCA\DAV\TrashBin\RootCollection;
use OCA\DAV\TrashBin\TrashBinHome;
use OCP\IUser;
use OCP\IUserSession;
use Sabre\DAVACL\PrincipalBackend\BackendInterface;
use Test\TestCase;

class RootCollectionTest extends TestCase {
	public function testGetName() {
		$backEnd = $this->createMock(BackendInterface::class);
		$userSession = $this->createMock(IUserSession::class);
		$collection = new RootCollection($backEnd, $userSession);
		self::assertEquals('trash-bin', $collection->getName());
	}

	public function testGetChildForPrincipal() {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('alice');
		$userSession = $this->createMock(IUserSession::class);
		$userSession->method('getUser')->willReturn($user);

		$backEnd = $this->createMock(BackendInterface::class);
		$collection = new RootCollection($backEnd, $userSession);
		$child = $collection->getChildForPrincipal([
			'uri' => 'principals/alice'
		]);
		self::assertInstanceOf(TrashBinHome::class, $child);
	}

	/**
	 */
	public function testGetChildForPrincipalWithUnauthorizedUser() {
		$this->expectException(\Sabre\DAV\Exception\NotAuthenticated::class);

		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('john');
		$userSession = $this->createMock(IUserSession::class);
		$userSession->method('getUser')->willReturn($user);

		$backEnd = $this->createMock(BackendInterface::class);
		$collection = new RootCollection($backEnd, $userSession);
		$collection->getChildForPrincipal([
			'uri' => 'principals/alice'
		]);
	}
}
