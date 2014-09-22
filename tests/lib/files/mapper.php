<?php
/**
 * ownCloud
 *
 * @author Thomas Müller
 * @copyright 2013 Thomas Müller thomas.mueller@owncloud.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace Test\Files;

class Mapper extends \Test\TestCase {

	/**
	 * @var \OC\Files\Mapper
	 */
	private $mapper = null;

	protected function setUp() {
		parent::setUp();
		$this->mapper = new \OC\Files\Mapper('D:/');
	}

	public function slugifyData() {
		return array(
			array('text.txt', 'text.txt'),
			array('folder.name.with.peri ods', 'folder.name.with.peri-ods'),
			array('te st.t x t', 'te-st.t-x-t'),
			array('ありがとう', md5('ありがとう')),
		);
	}

	/**
	 * @dataProvider slugifyData
	 */
	public function testSlugify($fileName, $expected) {
		$this->assertEquals($expected, \Test_Helper::invokePrivate($this->mapper, 'slugify', array($fileName)));
	}

	public function addIndexToFilenameData() {
		return array(
			// with extension
			array('text.txt', null, 'text.txt'),
			array('text.txt', 0, 'text.txt'),
			array('text.txt', 2, 'text-2.txt'),

			// without extension
			array('text', null, 'text'),
			array('text', 0, 'text'),
			array('text', 2, 'text-2'),

			// with multiple dots
			array('text.text.txt', null, 'text.text.txt'),
			array('text.text.txt', 0, 'text.text.txt'),
			array('text.text.txt', 2, 'text.text-2.txt'),
			array('text.text.text.txt', 2, 'text.text.text-2.txt'),
		);
	}

	/**
	 * @dataProvider addIndexToFilenameData
	 */
	public function testAddIndexToFilename($fileName, $index, $expected) {
		$this->assertEquals($expected, \Test_Helper::invokePrivate($this->mapper, 'addIndexToFilename', array($fileName, $index)));
	}
}
