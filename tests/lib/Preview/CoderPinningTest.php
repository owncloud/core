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
	 * The payload testRejectsPostScriptContentFromAForeignProvider() feeds to a provider it
	 * is foreign to. Deliberately minimal and harmless: what is under test is which coder
	 * ImageMagick hands it to, not what Ghostscript would draw from it. A square box is
	 * fine there, because that test's observable is assertFalse(), which any successful
	 * decode trips whatever shape it produced.
	 */
	private const FOREIGN_POSTSCRIPT = "%!PS-Adobe-3.0\n%%BoundingBox: 0 0 10 10\nshowpage\n";

	/**
	 * The same payload with a *portrait* bounding box. That is the only difference, and it
	 * is the one testFontNeverInvokesADangerousCoderForForeignContent() rests on: its
	 * observable is the thumbnail's shape, and the square box above thumbnails square
	 * whichever coder produced it. The page stays blank on purpose - nothing here inspects
	 * a pixel, so drawing operators would only suggest the assertion is stronger than it is.
	 */
	private const FOREIGN_POSTSCRIPT_PORTRAIT = "%!PS-Adobe-3.0\n%%BoundingBox: 0 0 600 800\nshowpage\n";

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
		} catch (\Exception $e) {
			# \Exception, not \ImagickException: imagick reports some delegate and policy
			# conditions at warning severity, and PHPUnit 9 converts PHP warnings into
			# PHPUnit\Framework\Error\Warning by default (convertWarningsToExceptions,
			# unset in tests/phpunit-autotest.xml and defaulting to true - failOnWarning
			# only decides whether an emitted warning fails the run). That class extends
			# \Exception via PHPUnit\Framework\Exception, so one catch covers both, and
			# an \Error still surfaces rather than being turned into a green skip.
			$this->markTestSkipped("This ImageMagick build cannot decode the $coder fixture: " . $e->getMessage());
		}
	}

	/**
	 * Skips unless this build can rasterize PostScript, which needs the PS coder to be both
	 * registered and permitted by policy.xml plus a working Ghostscript delegate. Reads
	 * unpinned, as every probe here does - a capability check, never an assertion.
	 */
	private function requireRenderablePostScript(string $content): void {
		try {
			$probe = ImagickFactory::create();
			$probe->readImageBlob($content);
			$probe->clear();
		} catch (\Exception $e) {
			$this->markTestSkipped('This build cannot rasterize PostScript: ' . $e->getMessage());
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
		# The mutant this test is meant to catch - the pin removed - only produces a portrait
		# render on a build that can rasterize PostScript at all. Without Ghostscript, or
		# under the stock Debian policy that denies the PS coder, readImageBlob() would throw
		# instead, getThumbnail() would return false, and the assertion below would hold with
		# no pin in place. Skip rather than report protection this build is not providing.
		$this->requireRenderablePostScript(self::FOREIGN_POSTSCRIPT_PORTRAIT);
		$this->assertPayloadReachesTheCoderPin(self::FOREIGN_POSTSCRIPT_PORTRAIT);
		$file = $this->makeFile(self::FOREIGN_POSTSCRIPT_PORTRAIT, 'application/font-sfnt');

		$result = (new Font())->getThumbnail($file, 32, 32, false);

		# FreeType fails on non-font bytes either by refusing them outright or by producing
		# a placeholder, never by invoking Ghostscript or a script coder - both are safe
		# outcomes. What must never happen is the PostScript page itself coming back
		# rendered. The payload's bounding box is portrait (600x800) while ImageMagick's TTF
		# coder draws a fixed 800x480 specimen sheet, so the thumbnail's shape is what
		# separates them: measured on owncloudci/php:8.3, 32x19 through the TTF pin against
		# 25x32 with the pin removed.
		#
		# Size cannot be used for this. OC_Image::data() re-encodes through GD, and by then
		# the image is already downscaled to fit 32x32, so both outcomes land within a few
		# hundred bytes of each other - an earlier revision of this test asserted a 2048
		# byte ceiling and could not fail. Nor can assertFalse(): the placeholder is a
		# valid image on this build, so that would fail where the pin is working.
		#
		# One branch-free expression on purpose - branching would leave the test
		# assertion-less on a build that returns false, and failOnRisky in
		# tests/phpunit-autotest.xml makes a zero-assertion test a hard failure.
		$renderedThePortraitPage = $result !== false && $result->height() > $result->width();
		$this->assertFalse($renderedThePortraitPage, 'Font must not render PostScript content');
	}

	/**
	 * The pin is derived from the file's own mime type, not from the one that selected
	 * the provider - callers can override the latter via getThumbnail(['mimeType' => ...]),
	 * and apps/files_trashbin/ajax/preview.php does exactly that, because a trashed
	 * file's .d<timestamp> suffix defeats extension-based detection and leaves it
	 * reporting application/octet-stream.
	 *
	 * So a provider must still decode when handed a mime type it does not serve. Guard
	 * that: making the provider reject a mime type failing its own getMimeType() regex
	 * looks like a tightening, but it would silently kill every trashbin bitmap preview.
	 *
	 * @dataProvider providesForeignMimeTypeButOwnContent
	 */
	public function testDecodesWhenTheStoredMimeTypeIsNotTheProvidersOwn(
		string $fixture,
		Bitmap $provider,
		string $coder
	): void {
		$content = \file_get_contents(\OC::$SERVERROOT . '/' . $fixture);
		$this->requireDecodableFixture($coder, $content);
		# what a trashed "photo.tif.d1700000000" actually reports
		$file = $this->makeFile($content, 'application/octet-stream');

		$this->assertSame(
			0,
			\preg_match($provider->getMimeType(), 'application/octet-stream'),
			'precondition: this mime type must NOT match the provider regex, or the case proves nothing'
		);
		$this->assertNotFalse(
			$provider->getThumbnail($file, 32, 32, false),
			'a provider pinning a constant coder must still decode its own content'
		);
	}

	public function providesForeignMimeTypeButOwnContent(): Generator {
		yield 'TIFF' => ['tests/data/testimage.tiff', new TIFF(), 'TIFF'];
		yield 'Photoshop' => ['tests/data/testimage.psd', new Photoshop(), 'PSD'];
		yield 'SGI' => ['tests/data/testimage.sgi', new SGI(), 'SGI'];
	}

	/**
	 * The stored mime type can also be missing altogether, not just be the wrong one:
	 * FileInfo::getMimetype() returns whatever Cache::get() put in the row, which is
	 * MimeTypeLoader::getMimetypeById() - null for a mimetype id with no matching row in
	 * oc_mimetypes. Nothing constrains that column, so a dangling id survives there.
	 *
	 * Uncast, that null hits getResizedPreview()'s string parameter as a TypeError, and a
	 * TypeError is an \Error: it escapes getThumbnail()'s catch (\Exception) and reaches
	 * the caller as a 500 instead of degrading to a media-type icon. assertNotFalse() is
	 * what detects it - the \Error propagates out of this test as an error, not a failure.
	 */
	public function testDecodesWhenTheStoredMimeTypeIsMissingEntirely(): void {
		$content = \file_get_contents(\OC::$SERVERROOT . '/tests/data/testimage.tiff');
		$this->requireDecodableFixture('TIFF', $content);

		$stream = \fopen('php://memory', 'rb+');
		\fwrite($stream, $content);
		\rewind($stream);
		$file = $this->createMock(File::class);
		$file->method('fopen')->willReturn($stream);
		$file->method('getMimeType')->willReturn(null);

		$this->assertNotFalse(
			(new TIFF())->getThumbnail($file, 32, 32, false),
			'a null stored mime type must still decode, because TIFF pins a constant coder'
		);
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
