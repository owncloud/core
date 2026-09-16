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
use OC\Image\ImagickFactory;
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

/**
 * @requires extension imagick
 */
class CoderPinningTest extends TestCase {
	/**
	 * The payload both negative tests feed to a provider it is foreign to. Deliberately
	 * minimal and harmless: what is under test is which coder ImageMagick hands it to,
	 * not what Ghostscript would draw from it.
	 */
	private const FOREIGN_POSTSCRIPT = "%!PS-Adobe-3.0\n%%BoundingBox: 0 0 10 10\nshowpage\n";

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
	 * Skip only when the one coder under test is absent from this ImageMagick build,
	 * rather than probing for some unrelated coder as a proxy for "extended build".
	 */
	private function requireCoder(string $coder): void {
		if (\count(\Imagick::queryFormats($coder)) === 0) {
			$this->markTestSkipped("This ImageMagick build registers no $coder coder");
		}
	}

	/**
	 * A registered coder does not mean the delegate behind it can decode these particular
	 * bytes: coders/heic.c registers HEIC, HEIF and AVIF whenever libheif is present, but
	 * decoding the AVIF fixture additionally needs an AV1 decoder inside libheif. Read the
	 * fixture unpinned first - if this build cannot decode it at all, the pinned read
	 * failing below would say nothing about the pin, so skip rather than report a failure
	 * against the build.
	 *
	 * The unpinned read is content-sniffed, which is exactly what the pin exists to
	 * prevent. That is fine here: it is only ever a capability probe, never an assertion.
	 */
	private function requireDecodableFixture(string $coder, string $content): void {
		$this->requireCoder($coder);
		try {
			$probe = ImagickFactory::create();
			$probe->readImageBlob($content);
			$probe->clear();
		} catch (\ImagickException $e) {
			$this->markTestSkipped("This ImageMagick build cannot decode the $coder fixture: " . $e->getMessage());
		}
	}

	/**
	 * isDangerousToDecode() is a deny-list over the *sniffed* type, and it denies text/*.
	 * On a build whose libmagic reported the payload as text/plain rather than
	 * application/postscript, the provider would reject it at that gate and the negative
	 * assertions below would hold without the coder pin ever running. Assert the detected
	 * type, so such a build fails loudly with an actionable message instead of passing
	 * vacuously.
	 */
	private function assertPayloadReachesTheCoderPin(string $content): void {
		$detected = \OC::$server->getMimeTypeDetector()->detectString($content);
		$this->assertStringStartsWith(
			'application/postscript',
			$detected,
			'payload must survive isDangerousToDecode(), which denies text/* - libmagic here says: ' . $detected
		);
	}

	/**
	 * @dataProvider providesLegitimateContent
	 */
	public function testDecodesItsOwnFormat(string $fixture, string $mimeType, Bitmap $provider, string $coder): void {
		$content = \file_get_contents(\OC::$SERVERROOT . '/' . $fixture);
		$this->requireDecodableFixture($coder, $content);
		$file = $this->makeFile($content, $mimeType);

		$result = $provider->getThumbnail($file, 32, 32, false);

		$this->assertNotFalse($result, "$fixture via " . \get_class($provider) . ' should have decoded');
	}

	public function providesLegitimateContent(): Generator {
		yield 'PDF' => ['tests/data/testimage.pdf', 'application/pdf', new PDF(), 'PDF'];
		yield 'Postscript (EPS)' => ['tests/data/testimage.eps', 'application/postscript', new Postscript(), 'EPS'];
		# Modern .ai files really are PDF containers, and ImageMagick's AI coder is a
		# Ghostscript alias for the PDF one - so testimage.pdf is a faithful fixture for
		# this case, and a separate .ai file would be a byte-identical copy of it.
		yield 'Illustrator (AI)' => ['tests/data/testimage.pdf', 'application/illustrator', new Illustrator(), 'AI'];
		yield 'Photoshop (PSD)' => ['tests/data/testimage.psd', 'application/x-photoshop', new Photoshop(), 'PSD'];
		yield 'SGI' => ['tests/data/testimage.sgi', 'image/sgi', new SGI(), 'SGI'];
		yield 'TIFF' => ['tests/data/testimage.tiff', 'image/tiff', new TIFF(), 'TIFF'];
		# Reuses the in-tree OpenSans rather than adding a font fixture of its own. No
		# genuine OTF ('OTTO'-tagged) case here: this environment's ImageMagick/FreeType
		# delegate cannot decode CFF-outline OpenType fonts at all, pinned or not -
		# confirmed against four real system .otf files. TTF-tagged content, which the TTF
		# coder decodes fine, is what's actually exercised in practice for the font-sfnt
		# mime type.
		yield 'Font (font-sfnt, ttf bytes)' => ['core/fonts/OpenSans-Regular.ttf', 'application/font-sfnt', new Font(), 'TTF'];
		# The HEIC fixture is AVIF-branded on purpose: coders/heic.c registers HEIC, HEIF
		# and AVIF as three separate coders, so an AVIF-branded file served by the Heic
		# provider is the case worth a real sample - and an HEVC-encoded one would need a
		# libde265 delegate that is not present everywhere.
		#
		# Both mime types pin HEIC, so neither case needs a distinct HEIF coder to be
		# registered - which is the point: pinning HEIF would break image/heif previews
		# on every build that only registers HEIC.
		yield 'Heic (image/heic)' => ['tests/data/testimage.heic', 'image/heic', new Heic(), 'HEIC'];
		yield 'Heic (image/heif)' => ['tests/data/testimage.heic', 'image/heif', new Heic(), 'HEIC'];
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
	public function testRejectsPostScriptContentFromAForeignProvider(Bitmap $provider, string $mimeType, string $coder): void {
		$this->requireCoder($coder);
		$this->assertPayloadReachesTheCoderPin(self::FOREIGN_POSTSCRIPT);
		$file = $this->makeFile(self::FOREIGN_POSTSCRIPT, $mimeType);

		$result = $provider->getThumbnail($file, 32, 32, false);

		$this->assertFalse($result);
	}

	public function providesForeignProviders(): Generator {
		yield 'SGI' => [new SGI(), 'image/sgi', 'SGI'];
		yield 'Photoshop' => [new Photoshop(), 'application/x-photoshop', 'PSD'];
		yield 'TIFF' => [new TIFF(), 'image/tiff', 'TIFF'];
		yield 'Heic' => [new Heic(), 'image/heic', 'HEIC'];
	}

	public function testFontNeverInvokesADangerousCoderForForeignContent(): void {
		$this->requireCoder('TTF');
		$this->assertPayloadReachesTheCoderPin(self::FOREIGN_POSTSCRIPT);
		$file = $this->makeFile(self::FOREIGN_POSTSCRIPT, 'application/font-sfnt');

		$result = (new Font())->getThumbnail($file, 32, 32, false);

		# FreeType fails on non-font bytes either by refusing them outright or by producing
		# a blank placeholder, never by invoking Ghostscript or a script coder - both are
		# safe outcomes. What must never happen is a large image carrying rendered
		# PostScript content. Assert that as one branch-free expression: branching would
		# leave the test assertion-less on builds that return false, and failOnRisky in
		# tests/phpunit-autotest.xml turns a zero-assertion test into a hard failure.
		$renderedBytes = $result === false ? 0 : \strlen((string)$result->data());
		$this->assertLessThan(2048, $renderedBytes, 'Font must not render PostScript content');
	}

	/**
	 * setFormat() pins the wand's *output* format as well as the input coder, so a
	 * provider that reset only the image format would hand back the input format
	 * re-encoded instead of a PNG. Guard that explicitly: for TIFF the re-encode is
	 * byte-identical to the input, which makes the mistake easy to reintroduce and
	 * hard to spot.
	 */
	public function testPinnedDecodeReturnsPngAndNotThePinnedInputFormat(): void {
		$content = \file_get_contents(\OC::$SERVERROOT . '/tests/data/testimage.tiff');
		$this->requireDecodableFixture('TIFF', $content);
		$file = $this->makeFile($content, 'image/tiff');

		$result = (new TIFF())->getThumbnail($file, 32, 32, false);

		$this->assertNotFalse($result);
		$this->assertSame('image/png', $result->mimeType());
	}
}
