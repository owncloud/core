<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
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

namespace Test\Files\Utils;

use OC\Files\Utils\FileUtils;
use Test\TestCase;

/**
 * Class FileUtilsTest
 *
 * @package Test\Files\Utils
 */
class FileUtilsTest extends TestCase {

	/**
	 * @dataProvider dataTestIsPartialFile
	 *
	 * @param string $path
	 * @param bool $expected
	 */
	public function testIsPartialFile($path, $expected) {
		$this->assertSame($expected,
			FileUtils::isPartialFile($path)
		);
	}
	
	public function dataTestIsPartialFile() {
		return [
			['foo.txt.part', true],
			['/sub/folder/foo.txt.part', true],
			['/sub/folder.part/foo.txt', true],
			['foo.txt', false],
			['/sub/folder/foo.txt', false],
		];
	}
}
