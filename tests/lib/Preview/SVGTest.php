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
 * Class SVGTest
 *
 * @group DB
 *
 * @package Test\Preview
 */
class SVGTest extends Provider {
	public function setUp(): void {
		# === 0 rather than === 1: a build may register SVG alongside SVGZ/MSVG, which
		# would have skipped these cases while the SVG coder was present all along
		if (\count(\Imagick::queryFormats('SVG')) === 0) {
			$this->markTestSkipped('This ImageMagick build registers no SVG coder');
		}
		parent::setUp();

		$fileName = 'testimagelarge.svg';
		$this->imgPath = $this->prepareTestFile($fileName, \OC::$SERVERROOT . '/tests/data/' . $fileName);
		$this->width = 3000;
		$this->height = 2000;
		$this->provider = new \OC\Preview\SVG;
	}
}
