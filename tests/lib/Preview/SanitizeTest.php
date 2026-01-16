<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2026, ownCloud GmbH
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

use Generator;
use OC\Preview\Bitmap;
use OC\Preview\Font;
use OC\Preview\PDF;
use OCP\Files\File;
use Test\TestCase;

class SanitizeTest extends TestCase {
	/**
	 * @dataProvider providesSVG
	 */
	public function test(string $svgContent, Bitmap $provider): void {
		if (\count(\Imagick::queryFormats('SVG')) === 0) {
			$this->markTestSkipped('No SVG provider present');
		}
		# mock it all ....
		$stream = fopen('php://memory', 'rb+');
		fwrite($stream, $svgContent);
		rewind($stream);
		$file = $this->createMock(File::class);
		$file->method('getContent')->willReturn($svgContent);
		$file->method('fopen')->willReturn($stream);

		# create the preview
		$return = $provider->getThumbnail($file, 32, 32, false);

		$this->assertImage(__DIR__ . '/white-32x32.png', $return);
	}

	public function providesSVG(): Generator {
		$embeddedImagePath = __DIR__ . '/../../data/testimage.jpg';
		$svgContent0 = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="800" height="800">
	<image href="$embeddedImagePath" width="400" height="400"></image>
</svg>
SVG;

		# all Bitmap based providers use the same thumbnailing logic - two is enough ....
		yield 'PDF provider' => [$svgContent0, new PDF()];
		yield 'Font Provider' => [$svgContent0, new Font()];
	}
}
