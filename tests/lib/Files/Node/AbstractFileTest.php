<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace Test\Files\Node;

use OC\Files\Node\AbstractFile;
use OCP\Files\FileInfo;
use Test\TestCase;

class AbstractFileTest extends TestCase {
	public function testMime() {
		/** @var AbstractFile | \PHPUnit\Framework\MockObject\MockObject $node */
		$node = new AbstractFile();
		$this->assertEquals('application/octet-stream', $node->getMimetype());
		$this->assertEquals('application', $node->getMimePart());
		$this->assertEquals(FileInfo::TYPE_FILE, $node->getType());
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 * @dataProvider providesOperations
	 */
	public function testOperations($operation) {
		/** @var AbstractFile | \PHPUnit\Framework\MockObject\MockObject $node */
		$node = $this->getMockForAbstractClass(AbstractFile::class);
		$node->$operation('');
	}

	public function providesOperations() {
		return [
			['getId'],
			['getFullPath'],
			['getRelativePath'],
			['isEncrypted'],
			['isCreatable'],
			['isShared'],
			['isMounted'],
			['getMountPoint'],
			['getOwner'],
			['getChecksum'],
			['move'],
			['delete'],
			['copy'],
			['touch'],
			['getStorage'],
			['getPath'],
			['getInternalPath'],
			['getId'],
			['stat'],
			['getMTime'],
			['getSize'],
			['getEtag'],
			['getPermissions'],
			['isReadable'],
			['isUpdateable'],
			['isDeletable'],
			['isShareable'],
			['getParent'],
			['getName'],
			['lock'],
			['changeLock'],
			['unlock'],
			// file methods
			['getContent'],
			['putContent'],
			['fopen'],
			['hash'],
		];
	}
}
