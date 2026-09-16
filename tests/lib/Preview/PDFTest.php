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
		# PDF is the coder PDF::getImagickFormat() pins. This used to gate on the SVG
		# coder, which this provider never touches - so on any build registering no SVG
		# coder (owncloudci/php:8.3 among them) every case here skipped, reporting "No
		# PDF provider present" while the PDF coder was in fact present.
		if (\count(\Imagick::queryFormats('PDF')) === 0) {
			$this->markTestSkipped('This ImageMagick build registers no PDF coder');
		}
		parent::setUp();

		$fileName = 'testimage.pdf';
		$this->imgPath = $this->prepareTestFile($fileName, \OC::$SERVERROOT . '/tests/data/' . $fileName);
		$this->width = 595;
		$this->height = 842;
		$this->provider = new PDF();
	}
}
