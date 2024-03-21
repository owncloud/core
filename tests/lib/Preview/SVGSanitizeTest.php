<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2024, ownCloud GmbH
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

use OC\Preview\SVG;
use Test\TestCase;

class SVGSanitizeTest extends TestCase {
	/**
	 * @dataProvider providesSVG
	 */
	public function test(string $test, string $svgContent): void {
		$output = SVG::sanitizeSVGContent($svgContent);
		self::assertStringNotContainsString($test, $output);
	}

	public function providesSVG(): \Generator {
		$svgContent0 = <<<'SVG'
<svg xmlns="http://www.w3.org/2000/svg" width="800" height="800">
	<image href="/var/www/owncloud/stable10/tests/data/testimage.jpg" width="400" height="400"></image>
</svg>
SVG;
		$svgContent1 = <<<'SVG'
<svg xmlns="http://www.w3.org/2000/svg" 
   xmlns:xlink="http://www.w3.org/1999/xlink"
   xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
width="800" height="800">
    <linearGradient
       inkscape:collect="always"
       xlink:href="/etc/passwd#linearGradient4061"
       id="linearGradient4067"
       x1="708.0863"
       y1="416.54196"
       x2="710.52051"
       y2="423.02032"
       gradientUnits="userSpaceOnUse"
       gradientTransform="translate(-74.8682,-105.3782)" />
</svg>
SVG;

		yield 'image href' => ['testimage', $svgContent0];
		yield 'passwd href' => ['passwd', $svgContent1];
	}
}
