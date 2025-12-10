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

namespace lib\Preview;

use OC\Preview\PDF;
use OCP\Files\NotFoundException;
use Test\Preview\Provider;

/**
 * Class SVGTest
 *
 * @group DB
 *
 * @package Test\Preview
 */
class PDFTest extends Provider {
	/**
	 * @throws NotFoundException
	 */
	public function setUp(): void {
		if (\count(\Imagick::queryFormats('SVG')) === 1) {
			parent::setUp();

			$fileName = 'testimage.pdf';
			$this->imgPath = $this->prepareTestFile($fileName, \OC::$SERVERROOT . '/tests/data/' . $fileName);
			$this->width = 595;
			$this->height = 842;
			$this->provider = new PDF();
		} else {
			$this->markTestSkipped('No PDF provider present');
		}
	}
}
