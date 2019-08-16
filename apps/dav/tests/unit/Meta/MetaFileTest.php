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

namespace OCA\DAV\Tests\Unit\Meta;

use OCA\DAV\Meta\MetaFile;
use OCP\Files\File;
use Test\TestCase;

class MetaFileTest extends TestCase {
	public function testETag() {
		$file = $this->createMock(File::class);
		$file->method('getETag')->willReturn('123456');
		$metaFile = new MetaFile($file);
		$this->assertEquals('"123456"', $metaFile->getETag());
	}
}
