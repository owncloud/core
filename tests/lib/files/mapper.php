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

	public function logicToPhysicalData() {
		return array(
			array(
				array(
					array('text.txt', 'text.txt'),
				), 'Plain ASCII file, no modification required',
			),
			array(
				array(
					array('text.txt', 'text.txt'),
				), 'Plain ASCII file, no modification required',
			),
			array(
				array(
					array(' text.txt ', 'text.txt'),
				), 'Remove leading and trailing spaces from file names',
			),
			array(
				array(
					array('te xt .txt', 'te-xt-.txt'),
				), 'Replace spaces in file names with dashes',
			),
			array(
				array(
					array('teöxtä.txt', 'teoxta.txt'),
				), 'Replace simple non-ascii characters with ascii replacement',
			),
			array(
				array(
					array('te xt .txt', 'te-xt-.txt'),
					array('te€xt€.txt', 'te-xt--1.txt'),
					array('te xt .txt', 'te-xt-.txt'),
				), 'Hash collision and reusing the first hash',
			),
			array(
				array(
					array('fol@der', 'fol-der'),
					array('fol der/test1.txt', 'fol-der-1/test1.txt'),
					array('fol€der/test1.txt', 'fol-der-2/test1.txt'),
					array('fol der/test2.txt', 'fol-der-1/test2.txt'),
					array('fol€der/test2.txt', 'fol-der-2/test2.txt'),
					array('fol@der/test1.txt', 'fol-der/test1.txt'),
					array('fol@der-1', 'fol-der-1-1'),
					array('fol€der', 'fol-der-2'),
				), 'Hash collision on folder names',
			),
		);
	}

	protected $testPath = 'D:/issue/11103/';

	/**
	 * @dataProvider logicToPhysicalData
	 */
	public function testLogicToPhysical($paths, $explain) {
		$mapper = new \OC\Files\Mapper($this->testPath);
		$mapper->removePath($this->testPath, false, true);
		$this->assertEmptyMapPath($this->testPath);

		foreach ($paths as $pathData) {
			list($logical, $physical) = $pathData;
			$this->assertEquals($this->testPath . $physical, $mapper->logicToPhysical($this->testPath . $logical, true), $explain);
		}
	}

	protected function assertEmptyMapPath($path) {
		$query = \OC_DB::prepare('SELECT `physic_path` FROM `*PREFIX*file_map` WHERE `physic_path` LIKE ?');
		$result = $query->execute(array($path . '%'));

		$paths = array();
		while ($row = $result->fetchRow()) {
			$paths[] = $row['physic_path'];
		}

		$this->assertEmpty($paths, 'The map table should not contain entries for physical path: ' . $path);
	}
}
