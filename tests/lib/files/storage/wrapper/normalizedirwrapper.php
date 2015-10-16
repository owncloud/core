<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace Test\Files\Storage\Wrapper;

use Icewind\Streams\IteratorDirectory;
use Test\TestCase;

class NormalizeDirWrapper extends TestCase {
	public function specialNameProvider() {
		return [
			['a', 'a'],
			['Å', 'Å'], //U+0041 U+030A(NFD), U+00C5(NFC)
		];
	}

	/**
	 * @param string $file
	 * @param string $expected
	 * @dataProvider specialNameProvider
	 */
	public function testReadSingle($file, $expected) {
		$source = IteratorDirectory::wrap([$file]);
		$wrapped = \OC\Files\Storage\Wrapper\NormalizeDirWrapper::wrap($source);
		$result = readdir($wrapped);
		$this->assertEquals($expected, $result);
	}

	public function folderProvider() {
		return [
			[['foo', 'bar', 'asd']],
			[[]]
		];
	}

	/**
	 * @param string[] $files
	 * @dataProvider folderProvider
	 */
	public function testFolderBasics($files) {
		$source = IteratorDirectory::wrap($files);
		$wrapped = \OC\Files\Storage\Wrapper\NormalizeDirWrapper::wrap($source);

		$firstResult = readdir($wrapped);
		rewinddir($wrapped);
		$this->assertEquals($firstResult, readdir($wrapped));

		rewinddir($wrapped);
		$result = [];
		while (($file = readdir($wrapped)) !== false) {
			$result[] = $file;
		}
		$this->assertEquals($files, $result);
	}
}
