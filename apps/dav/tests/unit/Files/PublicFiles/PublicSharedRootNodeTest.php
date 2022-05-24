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

use OCA\DAV\Files\PublicFiles\PublicSharedRootNode;
use OCP\Constants;
use OCP\Files\NotFoundException;
use OCP\IRequest;
use OCP\Share\IShare;
use Test\TestCase;

class PublicSharedRootNodeTest extends TestCase {
	/**
	 */
	public function testNoLongerExistingResource() {
		$this->expectException(\Sabre\DAV\Exception\NotFound::class);

		$share = $this->createMock(IShare::class);
		$request = $this->createMock(IRequest::class);
		$share->method('getNode')->willThrowException(new NotFoundException());

		$publicSharedRoot = new PublicSharedRootNode($share, $request);
		$publicSharedRoot->getChildren();
	}

	public function testNoChildrenOnGetForPublicUpload() {
		$share = $this->createMock(IShare::class);
		$request = $this->createMock(IRequest::class);
		$share->method('getPermissions')->willReturn(Constants::PERMISSION_CREATE);
		$request->method('getMethod')->willReturn('GET');

		$publicSharedRoot = new PublicSharedRootNode($share, $request);
		$children = $publicSharedRoot->getChildren();
		$this->assertEmpty($children);
	}
}
