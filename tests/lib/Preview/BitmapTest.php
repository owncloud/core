<?php
/**
 * @author Olivier Paroz <owncloud@interfasys.ch>
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

namespace Test\Preview;

/**
 * Class BitmapTest
 *
 * @group DB
 *
 * @package Test\Preview
 */
class BitmapTest extends Provider {
	public function setUp(): void {
		# Postscript::getImagickFormat() pins EPS, so on a build without that coder this
		# provider cannot decode the fixture at all. Unguarded, that is a failure rather
		# than a skip - previously ImageMagick's own sniffing hid the dependency.
		if (\count(\Imagick::queryFormats('EPS')) === 0) {
			$this->markTestSkipped('This ImageMagick build registers no EPS coder');
		}
		parent::setUp();

		$fileName = 'testimage.eps';
		$this->imgPath = $this->prepareTestFile($fileName, \OC::$SERVERROOT . '/tests/data/' . $fileName);
		$this->width = 2400;
		$this->height = 1707;
		$this->provider = new \OC\Preview\Postscript;
	}
}
