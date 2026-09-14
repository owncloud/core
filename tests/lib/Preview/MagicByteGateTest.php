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
use OC\Preview\Heic;
use OC\Preview\Illustrator;
use OC\Preview\PDF;
use OC\Preview\Photoshop;
use OC\Preview\Postscript;
use OC\Preview\SGI;
use OC\Preview\TIFF;
use OCP\Files\File;
use ReflectionMethod;
use Test\TestCase;

class MagicByteGateTest extends TestCase {
	private function makeFile(string $content, string $mimeType): File {
		$stream = \fopen('php://memory', 'rb+');
		\fwrite($stream, $content);
		\rewind($stream);
		$file = $this->createMock(File::class);
		$file->method('fopen')->willReturn($stream);
		$file->method('getMimeType')->willReturn($mimeType);
		return $file;
	}

	/**
	 * @dataProvider providesLegitimateContent
	 */
	public function testDecodesItsOwnFormat(string $fixture, string $mimeType, Bitmap $provider): void {
		if (\count(\Imagick::queryFormats('SVG')) === 0) {
			$this->markTestSkipped('No SVG/extra ImageMagick coders present');
		}
		# HEIF is registered as a coder distinct from HEIC on a real libheif1 install (verified
		# against the actual owncloud/server images), but not in every CI ImageMagick build.
		if ($mimeType === 'image/heif' && \count(\Imagick::queryFormats('HEIF')) === 0) {
			$this->markTestSkipped('No distinct HEIF coder present in this environment');
		}
		$content = \file_get_contents(__DIR__ . '/../../data/' . $fixture);
		$file = $this->makeFile($content, $mimeType);

		$result = $provider->getThumbnail($file, 32, 32, false);

		$this->assertNotFalse($result, "$fixture via " . \get_class($provider) . ' should have decoded');
	}

	public function providesLegitimateContent(): Generator {
		yield 'PDF' => ['testimage.pdf', 'application/pdf', new PDF()];
		yield 'Postscript (EPS)' => ['testimage.eps', 'application/postscript', new Postscript()];
		yield 'Illustrator (AI)' => ['testimage.ai', 'application/illustrator', new Illustrator()];
		yield 'Photoshop (PSD)' => ['testimage.psd', 'application/x-photoshop', new Photoshop()];
		yield 'SGI' => ['testimage.sgi', 'image/sgi', new SGI()];
		yield 'TIFF' => ['testimage.tiff', 'image/tiff', new TIFF()];
		# no genuine OTF ('OTTO'-tagged) fixture here: this environment's ImageMagick/FreeType
		# delegate cannot decode CFF-outline OpenType fonts at all - confirmed against four
		# real system .otf files. TTF-tagged content is what's actually exercised in practice
		# for the font-sfnt mime type it shares with OTF.
		yield 'Font (font-sfnt, ttf bytes)' => ['testimage.ttf', 'application/font-sfnt', new Font()];
		yield 'Heic (image/heic)' => ['testimage.heic', 'image/heic', new Heic()];
		yield 'Heic (image/heif)' => ['testimage.heic', 'image/heif', new Heic()];
	}

	/**
	 * PostScript content is sniffed by libmagic as application/postscript, which
	 * isDangerousToDecode() must not reject since Postscript/PDF legitimately decode
	 * it - so the mime-type gate alone lets it through here too. hasExpectedMagicBytes()
	 * is what rejects it before Imagick is ever invoked, for a provider that has
	 * nothing to do with PostScript.
	 *
	 * PDF/Postscript/Illustrator are deliberately not in this set: they are the
	 * Ghostscript-backed providers PostScript-ish content is NOT foreign to.
	 *
	 * @dataProvider providesForeignProviders
	 */
	public function testRejectsPostScriptContentFromAForeignProvider(Bitmap $provider, string $mimeType): void {
		$postscript = "%!PS-Adobe-3.0\n%%BoundingBox: 0 0 10 10\nshowpage\n";
		$file = $this->makeFile($postscript, $mimeType);

		$result = $provider->getThumbnail($file, 32, 32, false);

		$this->assertFalse($result);
	}

	public function providesForeignProviders(): Generator {
		yield 'SGI' => [new SGI(), 'image/sgi'];
		yield 'Photoshop' => [new Photoshop(), 'application/x-photoshop'];
		yield 'TIFF' => [new TIFF(), 'image/tiff'];
		yield 'Heic' => [new Heic(), 'image/heic'];
		# Font's gate rejects this deterministically too: "%!" matches none of its
		# accepted sfnt tags or the PFB marker, so it never reaches FreeType at all.
		yield 'Font' => [new Font(), 'application/font-sfnt'];
	}

	/**
	 * Stronger proof than garbage bytes: a GENUINE fixture of one format, fed to a
	 * provider for a different format. If hasExpectedMagicBytes() were accidentally
	 * missing or a no-op, several of these would very plausibly still decode -
	 * Imagick would happily auto-sniff a real PSD/TIFF/SGI/HEIC file regardless of
	 * which PHP class read it.
	 *
	 * @dataProvider providesForeignGenuineContent
	 */
	public function testRejectsGenuineContentOfAnotherFormat(string $fixture, Bitmap $provider, string $mimeType): void {
		$content = \file_get_contents(__DIR__ . '/../../data/' . $fixture);
		$file = $this->makeFile($content, $mimeType);

		$result = $provider->getThumbnail($file, 32, 32, false);

		$this->assertFalse($result);
	}

	public function providesForeignGenuineContent(): Generator {
		yield 'PSD fixture via SGI provider' => ['testimage.psd', new SGI(), 'image/sgi'];
		yield 'TIFF fixture via Photoshop provider' => ['testimage.tiff', new Photoshop(), 'application/x-photoshop'];
		yield 'SGI fixture via TIFF provider' => ['testimage.sgi', new TIFF(), 'image/tiff'];
		yield 'HEIC fixture via Photoshop provider' => ['testimage.heic', new Photoshop(), 'application/x-photoshop'];
	}

	/**
	 * Direct boundary tests for hasExpectedMagicBytes() itself - the cheapest, most
	 * direct regression guard for this change, independent of any Imagick delegate
	 * being installed (rejection happens before Imagick is ever touched).
	 *
	 * @dataProvider providesMagicByteBoundaries
	 */
	public function testHasExpectedMagicBytesBoundary(Bitmap $provider, string $content, bool $expected): void {
		$method = new ReflectionMethod($provider, 'hasExpectedMagicBytes');
		$method->setAccessible(true);

		$this->assertSame($expected, $method->invoke($provider, $content));
	}

	public function providesMagicByteBoundaries(): Generator {
		yield 'empty string rejected everywhere (PDF)' => [new PDF(), '', false];
		yield 'single byte rejected (SGI)' => [new SGI(), "\x01", false];

		yield 'PDF accepts %PDF-' => [new PDF(), "%PDF-1.4\n", true];
		yield 'PDF rejects %!' => [new PDF(), "%!PS-Adobe-3.0\n", false];

		yield 'Postscript accepts %!' => [new Postscript(), "%!PS-Adobe-3.0\n", true];
		yield 'Postscript rejects %PDF-' => [new Postscript(), "%PDF-1.4\n", false];

		yield 'Illustrator accepts %PDF-' => [new Illustrator(), "%PDF-1.4\n", true];
		yield 'Illustrator accepts %!' => [new Illustrator(), "%!PS-Adobe-3.0\n", true];
		yield 'Illustrator rejects 8BPS' => [new Illustrator(), "8BPS\0\0", false];

		yield 'Photoshop accepts 8BPS' => [new Photoshop(), "8BPS\x00\x01", true];
		yield 'Photoshop rejects %PDF-' => [new Photoshop(), "%PDF-1.4\n", false];

		yield 'SGI accepts 0x01 0xDA' => [new SGI(), "\x01\xDA\x01\x01", true];
		yield 'SGI rejects 8BPS' => [new SGI(), "8BPS\x00\x01", false];

		yield 'TIFF accepts little-endian II*\0' => [new TIFF(), "II*\0\x08\x00\x00\x00", true];
		yield 'TIFF accepts big-endian MM\0*' => [new TIFF(), "MM\0*\x00\x00\x00\x08", true];
		yield 'TIFF rejects 8BPS' => [new TIFF(), "8BPS\x00\x01", false];

		yield 'Font accepts sfnt 1.0 tag' => [new Font(), "\x00\x01\x00\x00rest", true];
		yield 'Font accepts OTTO tag' => [new Font(), 'OTTOrest', true];
		yield 'Font accepts true tag' => [new Font(), 'truerest', true];
		yield 'Font accepts ttcf tag' => [new Font(), 'ttcfrest', true];
		yield 'Font accepts PFB ASCII segment' => [new Font(), "\x80\x01rest", true];
		yield 'Font accepts PFB binary segment' => [new Font(), "\x80\x02rest", true];
		yield 'Font accepts PFB EOF segment' => [new Font(), "\x80\x03rest", true];
		yield 'Font rejects PFB with an unknown segment type' => [new Font(), "\x80\x04rest", false];
		yield 'Font rejects %!' => [new Font(), "%!PS-Adobe-3.0\n", false];

		yield 'Heic accepts a heic brand' => [new Heic(), "\x00\x00\x00\x18ftypheic", true];
		yield 'Heic accepts a mif1 (generic HEIF) brand' => [new Heic(), "\x00\x00\x00\x18ftypmif1", true];
		yield 'Heic rejects an avif brand' => [new Heic(), "\x00\x00\x00\x18ftypavif", false];
		yield 'Heic rejects content missing the ftyp box' => [new Heic(), "\x00\x00\x00\x18wxyzheic", false];
	}
}
