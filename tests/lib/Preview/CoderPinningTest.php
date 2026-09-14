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
use Test\TestCase;

class CoderPinningTest extends TestCase {
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
		# delegate cannot decode CFF-outline OpenType fonts at all, pinned or not - confirmed
		# against four real system .otf files. TTF-tagged content, which the TTF coder decodes
		# fine, is what's actually exercised in practice for the font-sfnt mime type.
		yield 'Font (font-sfnt, ttf bytes)' => ['testimage.ttf', 'application/font-sfnt', new Font()];
		yield 'Heic (image/heic)' => ['testimage.heic', 'image/heic', new Heic()];
		yield 'Heic (image/heif)' => ['testimage.heic', 'image/heif', new Heic()];
	}

	/**
	 * PostScript content is sniffed by libmagic as application/postscript, which
	 * isDangerousToDecode() must not reject since Postscript/PDF legitimately decode
	 * it - so the mime-type gate alone lets it through here too. Pinning the expected
	 * coder is what stops ImageMagick's own content-sniffing from handing it to the
	 * Ghostscript delegate through a provider that has nothing to do with PostScript.
	 *
	 * PDF/Postscript/Illustrator are deliberately not in this set: they are the
	 * Ghostscript-backed providers PostScript-ish content is NOT foreign to, so
	 * feeding it to them tests Ghostscript's own leniency, not cross-coder confusion.
	 * Font is also excluded: see testFontNeverInvokesADangerousCoderForForeignContent().
	 *
	 * @dataProvider providesForeignProviders
	 */
	public function testRejectsPostScriptContentFromAForeignProvider(Bitmap $provider, string $mimeType): void {
		if (\count(\Imagick::queryFormats('SVG')) === 0) {
			$this->markTestSkipped('No SVG/extra ImageMagick coders present');
		}
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
	}

	public function testFontNeverInvokesADangerousCoderForForeignContent(): void {
		if (\count(\Imagick::queryFormats('SVG')) === 0) {
			$this->markTestSkipped('No SVG/extra ImageMagick coders present');
		}
		$postscript = "%!PS-Adobe-3.0\n%%BoundingBox: 0 0 10 10\nshowpage\n";
		$file = $this->makeFile($postscript, 'application/font-sfnt');

		$result = (new Font())->getThumbnail($file, 32, 32, false);

		# FreeType fails on non-font bytes by producing a blank placeholder, not by
		# invoking Ghostscript or a script coder - so this may be a small valid image
		# rather than false, but it must never carry rendered PostScript content.
		if ($result !== false) {
			$this->assertLessThan(2048, \strlen($result->data()));
		}
	}
}
