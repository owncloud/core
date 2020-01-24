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

use OCA\DAV\Files\PublicFiles\SharedFile;
use OCP\Files\File;
use OCP\Share\IShare;
use Test\TestCase;

class PublicFileTest extends TestCase {
	public function testETag() {
		$file = $this->createMock(File::class);
		$file->method('getETag')->willReturn('123456');
		$share = $this->createMock(IShare::class);
		$metaFile = new SharedFile($file, $share);
		$this->assertEquals('"123456"', $metaFile->getETag());
	}

	public function testSize() {
		$file = $this->createMock(File::class);
		$file->method('getSize')->willReturn(42);
		$share = $this->createMock(IShare::class);
		$metaFile = new SharedFile($file, $share);
		$this->assertEquals(42, $metaFile->getSize());
	}
}
