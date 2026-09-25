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
		# Postscript::getImagickFormat() pins EPS, so on a build that cannot decode through
		# that coder this provider cannot produce a preview at all. Unguarded, that is a
		# failure rather than a skip - previously ImageMagick's own sniffing hid the
		# dependency. Registration alone does not answer it: coders/ps.c registers EPS
		# whether or not Ghostscript is there, so the guard probes the fixture instead.
		$fileName = 'testimage.eps';
		$fixture = \OC::$SERVERROOT . '/tests/data/' . $fileName;
		$this->requireDecodableFixtureFile('EPS', $fixture);
		parent::setUp();

		$this->imgPath = $this->prepareTestFile($fileName, $fixture);
		$this->width = 2400;
		$this->height = 1707;
		$this->provider = new \OC\Preview\Postscript;
	}
}
