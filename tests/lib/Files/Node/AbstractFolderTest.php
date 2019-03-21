<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace Test\Files\Node;

use OC\Files\Node\AbstractFolder;
use OCP\Files\FileInfo;
use Test\TestCase;

class AbstractFolderTest extends TestCase {
	public function testMimeAndGetType() {
		/** @var AbstractFolder | \PHPUnit\Framework\MockObject\MockObject $node */
		$node = $this->getMockForAbstractClass(AbstractFolder::class);
		$this->assertEquals('httpd/unix-directory', $node->getMimetype());
		$this->assertEquals('httpd', $node->getMimePart());
		$this->assertEquals(FileInfo::TYPE_FOLDER, $node->getType());
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 * @dataProvider providesOperations
	 */
	public function testOperations($operation) {
		/** @var AbstractFolder | \PHPUnit\Framework\MockObject\MockObject $node */
		$node = $this->getMockForAbstractClass(AbstractFolder::class);
		$node->$operation('', '');
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
			// folder methods
			['getDirectoryListing'],
			['get'],
			['nodeExists'],
			['newFolder'],
			['newFile'],
			['search'],
			['searchByMime'],
			['searchByTag'],
			['getById'],
			['getFreeSpace'],
			['getNonExistingName'],
			['getRelativePath'],
		];
	}
}
