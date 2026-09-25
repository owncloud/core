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

use OC\Preview\Photoshop;
use OCP\Files\File;
use Test\TestCase;

/**
 * @requires extension imagick
 */
class BitmapStreamTest extends TestCase {
	/**
	 * getMimeType() is stubbed on every mock, because Bitmap providers now derive the
	 * pinned Imagick coder from it. getThumbnail() casts the value, so an unstubbed mock
	 * gives '' rather than a TypeError - which is worse for a test, not better: '' reaches
	 * getImagickFormat() and seven of the eight providers answer it with the same constant
	 * they answer anything with, so the case would pass while saying nothing about which
	 * coder ran. Font is the one provider that branches on the mime type, so it is the one
	 * where an unstubbed mock would silently select the wrong pin.
	 *
	 * @return array{0: File, 1: resource}
	 */
	private function makeFile(string $content, string $mimeType): array {
		$stream = \fopen('php://memory', 'rb+');
		\fwrite($stream, $content);
		\rewind($stream);
		$file = $this->createMock(File::class);
		$file->method('fopen')->willReturn($stream);
		$file->method('getMimeType')->willReturn($mimeType);
		$file->method('getSize')->willReturn(\strlen($content));
		$file->method('getPath')->willReturn('/test/bitmap-stream');
		return [$file, $stream];
	}

	/**
	 * getResizedPreview() throwing is a routine outcome rather than an exceptional one -
	 * any content ImageMagick has no coder for reaches it - so the handle has to be
	 * released on that path too. Otherwise a preview pre-generation run, or a cron preview
	 * job, over a directory of undecodable files exhausts the process's descriptors one
	 * file at a time.
	 *
	 * The payload is bytes no coder claims. Before the coder pin that meant ImageMagick
	 * sniffed the format as "" and reported no decode delegate; with the pin there is no
	 * sniffing and the pinned PSD coder rejects the header instead. Different messages,
	 * same outcome, and neither depends on which delegates the build happens to have.
	 *
	 * An XML payload also throws everywhere measured, but for a reason that varies with the
	 * build - no SVG delegate, or a denied MVG coder, or MVG's own "must specify image
	 * size" once the coders are installed and the policy opened. More importantly libmagic
	 * reads it as text/xml or image/svg, and the pre-decode mime gate denies both, so it
	 * would stop reaching the decode at all.
	 */
	public function testClosesTheStreamWhenDecodingThrows(): void {
		$content = "\x00\x01\x02\x03 oc10-164 not an image \xff\xfe";
		# Pin why this throws. Both assertions below are satisfied by any early return, so a
		# build whose libmagic called these bytes text/* would refuse them at the mime gate,
		# keep this test green, and quietly stop covering the decode this test is named for.
		# Measured on owncloudci/php:7.4: application/octet-stream, so they reach the decode.
		#
		# Mirrors the deny-list in OC\Preview\Bitmap::isDangerousToDecode(), which is private
		# and so cannot be called from here. Mirroring beats pinning one exact
		# classification: any binary type reaches the decode, so asserting "octet-stream"
		# specifically would fail on a libmagic that matched these bytes to another binary
		# magic entry while the behaviour under test was still correct.
		#
		# The copy is the cost. What drifts is a deny-list entry that none of the three rules
		# below already match, whether it is written as an exact match or as a prefix. Add
		# one there without adding it here and the payload can start being refused at the
		# gate while this assertion stays green, leaving the decode uncovered. Grep for
		# isDangerousToDecode when changing either.
		$detected = \strtolower(\trim(\explode(';', \OC::$server->getMimeTypeDetector()->detectString($content), 2)[0]));
		$refusedBeforeDecoding = \strpos($detected, 'text/') === 0
			|| \strpos($detected, 'image/svg') === 0
			|| \in_array($detected, ['application/xml', 'image/x-mvg'], true);
		$this->assertFalse(
			$refusedBeforeDecoding,
			"the payload must reach the decode rather than the pre-decode mime gate, got: $detected"
		);
		list($file, $stream) = $this->makeFile($content, 'application/x-photoshop');

		$result = (new Photoshop())->getThumbnail($file, 32, 32, false);

		# stream first: PHPUnit stops at the first failure, and the handle is the
		# regression guard worth keeping if the payload ever becomes decodable
		$this->assertFalse(\is_resource($stream), 'the stream must be closed once getThumbnail() returns');
		$this->assertFalse($result, 'undecodable content must not produce a preview');
	}

	/**
	 * Provider, declared mime type and content all agree, so the success path stays a
	 * success whether the provider decodes by pinning a coder or by letting ImageMagick
	 * sniff one. It used to feed a PNG through the Photoshop provider, which the PSD pin
	 * correctly refuses - that mismatch is the whole point of the pin, so the fixture had
	 * to go rather than the pin.
	 *
	 * The stream is asserted before the decode result for the same reason as above.
	 */
	public function testClosesTheStreamOnSuccess(): void {
		list($file, $stream) = $this->makeFile($this->psdBlob(), 'application/x-photoshop');

		$result = (new Photoshop())->getThumbnail($file, 32, 32, false);

		$this->assertFalse(\is_resource($stream), 'the stream must be closed once getThumbnail() returns');
		$this->assertNotFalse($result, 'a PSD should decode through the Photoshop provider');
	}

	/**
	 * A PSD this build writes itself, so nothing here depends on a fixture.
	 *
	 * PSD rather than TIFF, PDF or SVG because ImageMagick implements it natively:
	 * coders/psd.so links no image library, while coders/tiff.so links libtiff, PDF needs
	 * the Ghostscript delegate that Debian and Ubuntu deny by default, and SVG needs a
	 * renderer that owncloudci/php:7.4 does not have at all. So this needs no availability
	 * guard and cannot skip - and it must not skip, because that would silently retire the
	 * success-path fclose() assertion, which is the entire subject of this file. A guard
	 * quietly withholding these assertions is how the OC10-164 preview tests came to never
	 * run in CI in the first place.
	 */
	private function psdBlob(): string {
		$image = new \Imagick();
		try {
			$image->newImage(64, 48, new \ImagickPixel('white'));
			$image->setImageFormat('psd');
			return $image->getImageBlob();
		} finally {
			$image->clear();
		}
	}

	/**
	 * A storage that cannot open the file returns false rather than throwing, and
	 * View::fopen() has a null return for the same situation - hence both rows.
	 *
	 * On PHP 7.4 stream_get_contents() only warns for either value and hands on false,
	 * which is then coerced on its way to Imagick and rejected there, so the return value
	 * alone cannot tell this apart from an undecodable file - it is false either way. The
	 * observable difference is the noise: unguarded, the attempt warns from
	 * stream_get_contents() before blaming ImageMagick for a file it never saw, and the
	 * null row warns a second time from fclose() in the finally. So the assertion has to be
	 * on the warnings; asserting the return value, as master does, cannot fail here.
	 *
	 * (On PHP 8 those calls raise a TypeError instead - an \Error, so it escapes the
	 * \Exception handler in getThumbnail() and surfaces as a 500. That is the failure this
	 * guard prevents there, and why master's version of this test asserts the return.)
	 *
	 * The mime type is stubbed even though the guard returns before reading it, so that the
	 * case does not depend on where in getThumbnail() the mime type is first touched.
	 *
	 * @dataProvider providesUnusableHandles
	 *
	 * @param false|null $handle
	 */
	public function testReportsNoPreviewWithoutWarningsWhenTheFileCannotBeOpened($handle): void {
		$file = $this->createMock(File::class);
		$file->method('fopen')->willReturn($handle);
		$file->method('getMimeType')->willReturn('application/x-photoshop');
		$file->method('getSize')->willReturn(1024);
		$file->method('getPath')->willReturn('/test/unopenable');

		$warnings = [];
		\set_error_handler(function ($number, $string) use (&$warnings) {
			// ignore what the code under test deliberately silenced with @, so that
			// suppressed diagnostics from anywhere else in the path cannot fail this
			if (!($number & \error_reporting())) {
				return false;
			}
			$warnings[] = $string;
			return true;
		});
		try {
			$result = (new Photoshop())->getThumbnail($file, 32, 32, false);
		} finally {
			\restore_error_handler();
		}

		$this->assertFalse($result, 'an unopenable file must not produce a preview');
		$this->assertSame([], $warnings, 'the failure must be handled, not warned about');
	}

	public function providesUnusableHandles(): array {
		# View::fopen() returns null rather than false for a path isForbiddenFileOrDir()
		# rejects, and for one no storage resolves for. Unguarded on PHP 7.4, that null warns
		# once from stream_get_contents() and again from fclose() in the finally; on PHP 8
		# each of those is a TypeError instead.
		return ['fopen returned false' => [false], 'fopen returned null' => [null]];
	}
}
