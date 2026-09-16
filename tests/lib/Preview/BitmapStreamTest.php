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
	 * getMimeType() is stubbed on every mock that reaches a decode. #41834 has Bitmap
	 * providers derive the Imagick coder from it, and getResizedPreview() there declares
	 * the parameter as string, so an unstubbed mock yields null and a TypeError - an
	 * \Error, which escapes getThumbnail()'s \Exception handler instead of degrading to no
	 * preview. Omitting these is what turned #41827 red, so they are a requirement once
	 * that pin lands rather than a precaution. On this branch getResizedPreview() takes no
	 * mime type at all, so nothing reads them yet.
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
	 * The payload is bytes no coder claims. Here that means ImageMagick sniffs the format
	 * as "" and reports no decode delegate; under #41834's pin there is no sniffing and the
	 * pinned PSD coder rejects the header instead. Different messages, same outcome, and
	 * neither depends on which delegates the build happens to have.
	 *
	 * An XML payload also throws everywhere measured, but for a reason that varies with the
	 * build - no SVG delegate, or a denied MVG coder, or MVG's own "must specify image
	 * size" once the coders are installed and the policy opened. More importantly libmagic
	 * reads it as text/xml, and #41834 adds a pre-decode mime gate denying text/*, so it
	 * would stop reaching the decode at all there.
	 */
	public function testClosesTheStreamWhenDecodingThrows(): void {
		$content = "\x00\x01\x02\x03 oc10-164 not an image \xff\xfe";
		# Pin why this throws. Both assertions below are satisfied by any early return, so
		# on #41834's tree a build whose libmagic called these bytes text/* would refuse
		# them at the mime gate, keep this test green, and quietly stop covering the decode
		# this test is named for.
		# Mirrors the deny-list in OC\Preview\Bitmap::isDangerousToDecode(), which #41834
		# adds and which is private, so it cannot be called from here. Mirroring beats
		# pinning one exact classification: any binary type reaches the decode, so asserting
		# "octet-stream" specifically would fail on a libmagic that matched these bytes to
		# another binary magic entry while the behaviour under test was still correct.
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
	 * success whether the provider decodes by pinning a coder (#41834) or by letting
	 * ImageMagick sniff one.
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
	 * renderer that owncloudci/php:8.3 does not have at all. So this needs no availability
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
	 * stream_get_contents(false) raises a TypeError - an \Error, so it would escape the
	 * \Exception handler in getThumbnail() and surface as a 500 instead of a missing
	 * preview.
	 *
	 * The mime type is stubbed even though the guard returns before reading it, so that the
	 * case does not depend on where in getThumbnail() the mime type is first touched.
	 *
	 * It does not make the file runnable on a tree without that guard. This case and the
	 * undecodable one assert what the guard and the finally introduced, so on a branch
	 * predating them they fail by design - measured on #41834's branch: one error, one
	 * failure. testClosesTheStreamOnSuccess is not among them, since fclose() on the
	 * success path predates #41835, which only moved it into the finally.
	 */
	public function testReturnsFalseWhenTheFileCannotBeOpened(): void {
		$file = $this->createMock(File::class);
		$file->method('fopen')->willReturn(false);
		$file->method('getMimeType')->willReturn('application/x-photoshop');
		$file->method('getSize')->willReturn(1024);
		$file->method('getPath')->willReturn('/test/unopenable');

		$this->assertFalse((new Photoshop())->getThumbnail($file, 32, 32, false));
	}
}
