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

	public function removePathData() {
		return array(
			array('h€llo', false),
			array('h€llo', true),
			array('h€llo/', false),
			array('h€llo/', true),

			array('h€llo', false, false),
			array('h€llo', true, false),
			array('h€llo/', false, false),
			array('h€llo/', true, false),

			array('test/../h€llo', false),
			array('test/../h€llo', true),
			array('test/../h€llo/', false),
			array('test/../h€llo/', true),

			array('test/../h€llo', false, false),
			array('test/../h€llo', true, false),
			array('test/../h€llo/', false, false),
			array('test/../h€llo/', true, false),
		);
	}

	/**
	 * @dataProvider removePathData
	 */
	public function testRemovePath($removePath, $recursive, $isLogical = true) {
		$dataDir = 'D:\\testing/';
		$mapper = new \OC\Files\Mapper($dataDir);
		$removePathSlash = (substr($removePath, -1) == '/') ? $removePath : $removePath . '/';

		$physicalEuro	= $mapper->logicToPhysical($dataDir . 'h€llo-h€llo.txt', true);
		$physicalAt		= $mapper->logicToPhysical($dataDir . 'h€llo-h@llo.txt', true);
		$physicalHello	= $mapper->logicToPhysical($dataDir . $removePath, true);
		$physicalRecur	= $mapper->logicToPhysical($dataDir . $removePathSlash . 'recursivetest', true);
		$physicalSubDir	= $mapper->logicToPhysical($dataDir . $removePathSlash . 'recursivetest/subdir.txt', true);

		if ($isLogical) {
			$mapper->removePath($dataDir . $removePath, true, $recursive);
		} {
			$mapper->removePath($physicalHello, false, $recursive);
		}

		$sql = 'SELECT * FROM `*PREFIX*file_map`';
		$result = \OC_DB::executeAudited($sql);
		$paths = array();
		while ($row = $result->fetchRow()) {
			$paths[$row['physic_path']] = $row;
		}

		$assertHasKey = 'The mapper entry should NOT have been deleted';
		$assertNotHasKey = 'The mapper entry should have been deleted';

		$this->assertArrayHasKey($physicalEuro, $paths, $assertHasKey);
		$this->assertArrayHasKey($physicalAt, $paths, $assertHasKey);
		$this->assertArrayNotHasKey($physicalHello, $paths, $assertNotHasKey);

		if ($recursive) {
			$this->assertArrayNotHasKey($physicalRecur, $paths, $assertNotHasKey);
			$this->assertArrayNotHasKey($physicalSubDir, $paths, $assertNotHasKey);
		} else {
			$this->assertArrayHasKey($physicalRecur, $paths, $assertHasKey);
			$this->assertArrayHasKey($physicalSubDir, $paths, $assertHasKey);
		}

		$mapper->removePath($dataDir, true, true);
	}

	public function slugifyPathData() {
		return array(
			// with extension
			array('D:/text.txt', 'D:/text.txt'),
			array('D:/text-2.txt', 'D:/text.txt', 2),
			array('D:/a/b/text.txt', 'D:/a/b/text.txt'),

			// without extension
			array('D:/text', 'D:/text'),
			array('D:/text-2', 'D:/text', 2),
			array('D:/a/b/text', 'D:/a/b/text'),

			// with double dot
			array('D:/text.text.txt', 'D:/text.text.txt'),
			array('D:/text.text-2.txt', 'D:/text.text.txt', 2),
			array('D:/a/b/text.text.txt', 'D:/a/b/text.text.txt'),

			// foldername and filename with periods
			array('D:/folder.name.with.periods', 'D:/folder.name.with.periods'),
			array('D:/folder.name.with.periods/test-2.txt', 'D:/folder.name.with.periods/test.txt', 2),
			array('D:/folder.name.with.periods/test.txt', 'D:/folder.name.with.periods/test.txt'),

			// foldername and filename with periods and spaces
			array('D:/folder.name.with.peri-ods', 'D:/folder.name.with.peri ods'),
			array('D:/folder.name.with.peri-ods/te-st-2.t-x-t', 'D:/folder.name.with.peri ods/te st.t x t', 2),
			array('D:/folder.name.with.peri-ods/te-st.t-x-t', 'D:/folder.name.with.peri ods/te st.t x t'),

			/**
			 * If a foldername is empty, after we stripped out some unicode and other characters,
			 * the resulting name must be reproducable otherwise uploading a file into that folder
			 * will not write the file into the same folder.
			 */
			array('D:/' . md5('ありがとう'), 'D:/ありがとう'),
			array('D:/' . md5('ありがとう') . '/issue6722.txt', 'D:/ありがとう/issue6722.txt'),
		);
	}

	/**
	 * @dataProvider slugifyPathData
	 */
	public function testSlugifyPath($slug, $path, $index = null) {
		$this->assertEquals($slug, $this->mapper->slugifyPath($path, $index));
	}
}
