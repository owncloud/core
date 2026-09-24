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
use OC\Preview\Postscript;
use OCP\Files\File;
use Test\TestCase;

class SanitizeTest extends TestCase {
	/**
	 * @dataProvider providesSVG
	 */
	public function test(string $content, Bitmap $provider, string $mimeType): void {
		# no coder guard on purpose: isDangerousToDecode() rejects this content before
		# ImagickFactory::create() and before setFormat(), so these cases never reach a
		# coder at all. Requiring one would only let a reduced build skip the OC10-164
		# regression assertions silently.
		$this->assertPayloadIsDeniedByTheMimeGate($content);

		# mock it all ....
		$stream = fopen('php://memory', 'rb+');
		fwrite($stream, $content);
		rewind($stream);
		$file = $this->createMock(File::class);
		$file->method('getContent')->willReturn($content);
		$file->method('fopen')->willReturn($stream);
		$file->method('getMimeType')->willReturn($mimeType);

		# create the preview - SVG/text/script-shaped content must never reach Imagick via a Bitmap provider
		$return = $provider->getThumbnail($file, 32, 32, false);

		$this->assertFalse($return);
	}

	/**
	 * Control assertion, mirroring Bitmap::isDangerousToDecode()'s deny-list.
	 *
	 * That gate keys on the *sniffed* type, and libmagic's answer varies by build - the
	 * same SVG is image/svg+xml on PHP 8.3 and image/svg on 7.4. A build that classified
	 * one of these payloads as something the deny-list misses would send it to the coder
	 * instead, where the pin would very likely reject it anyway and assertFalse() below
	 * would still pass: the case would go quiet rather than fail. Assert the precondition
	 * so such a build reports an actionable failure.
	 */
	private function assertPayloadIsDeniedByTheMimeGate(string $content): void {
		$detected = \OC::$server->getMimeTypeDetector()->detectString($content);
		$type = \strtolower(\trim(\explode(';', $detected, 2)[0]));

		$denied = \strpos($type, 'text/') === 0
			|| \strpos($type, 'image/svg') === 0
			|| \in_array($type, ['application/xml', 'image/x-mvg'], true);

		$this->assertTrue(
			$denied,
			'payload must be one isDangerousToDecode() denies, or this case proves nothing - libmagic here says: ' . $detected
		);
	}

	public function providesSVG(): Generator {
		$embeddedImagePath = __DIR__ . '/../../data/testimage.jpg';
		$svgContent0 = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="800" height="800">
	<image href="$embeddedImagePath" width="400" height="400"></image>
</svg>
SVG;

		# malformed SVG (unclosed <image>) - the DOM sanitizer cannot parse this and
		# used to fall back to the raw, unsanitized content
		$malformedSvgWithMslHref = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10" height="10">
	<image xlink:href="MSL:/tmp/oc10-164-payload.msl" width="10" height="10">
</svg>
SVG;

		$rawMvg = <<<MVG
push graphic-context
viewbox 0 0 64 64
fill 'url(msl:/tmp/oc10-164-payload.msl)'
pop graphic-context
MVG;

		$wellFormedSvg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"><rect width="10" height="10" fill="green"/></svg>
SVG;

		# The payload below is the one the PDF and Postscript cases need, because those two
		# providers pin a Ghostscript-backed coder and so are the only ones whose pin does
		# NOT reject foreign content - for every other provider the pin is a second line of
		# defence that makes the assertion hold with or without the mime gate. PostScript
		# with its %!PS-Adobe header sniffs as application/postscript, which the gate must
		# let through (Preview\Postscript and Preview\PDF have to decode real ones), so it
		# cannot serve here. Drop the header and libmagic reports text/plain - denied by the
		# gate - while an affirmed PDF:/EPS: pin still hands it straight to Ghostscript,
		# which renders it at 595x842 / 612x792. That combination is what makes these cases
		# fail if the gate is ever removed, instead of passing on the pin alone.
		$headerlessPostScript = "newpath 10 10 moveto 50 50 lineto 4 setlinewidth stroke showpage\n";

		# all Bitmap based providers use the same thumbnailing logic - two is enough ....
		yield 'PDF provider - image tag' => [$svgContent0, new PDF(), 'application/pdf'];
		yield 'Font Provider - image tag' => [$svgContent0, new Font(), 'application/font-sfnt'];
		yield 'PDF provider - malformed SVG with MSL href' => [$malformedSvgWithMslHref, new PDF(), 'application/pdf'];
		yield 'Font Provider - malformed SVG with MSL href' => [$malformedSvgWithMslHref, new Font(), 'application/font-sfnt'];
		yield 'PDF provider - raw MVG' => [$rawMvg, new PDF(), 'application/pdf'];
		yield 'Font Provider - raw MVG' => [$rawMvg, new Font(), 'application/font-sfnt'];
		yield 'PDF provider - well-formed SVG' => [$wellFormedSvg, new PDF(), 'application/pdf'];
		yield 'Font Provider - well-formed SVG' => [$wellFormedSvg, new Font(), 'application/font-sfnt'];
		yield 'PDF provider - headerless PostScript' => [$headerlessPostScript, new PDF(), 'application/pdf'];
		yield 'Postscript provider - headerless PostScript' => [
			$headerlessPostScript, new Postscript(), 'application/postscript'
		];
	}
}
