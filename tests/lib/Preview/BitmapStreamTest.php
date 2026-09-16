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
use OC\Preview\TIFF;
use OCP\Files\File;
use Test\TestCase;

/**
 * @requires extension imagick
 */
class BitmapStreamTest extends TestCase {
	/**
	 * The mime type is stubbed even though nothing in this tree reads it yet. It
	 * anticipates the coder-pin change on #41827, where Bitmap providers derive the
	 * Imagick coder from $file->getMimeType() and getResizedPreview() declares that
	 * parameter as string: an unstubbed mock yields null, which is a TypeError rather
	 * than a failed preview, and a TypeError is an \Error, so it escapes
	 * getThumbnail()'s \Exception handler entirely.
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
	 * released on that path too. Otherwise a preview pre-generation run, or a cron
	 * preview job, over a directory of undecodable files exhausts the process's
	 * descriptors one file at a time.
	 *
	 * Needs no particular coder registered for the payload's own sake: ImageMagick's SVG
	 * coder claims any blob opening with "<?xml" and then fails on a document with no
	 * <svg> root, so readImageBlob() throws on every build. On #41827 it does not reach a
	 * coder at all, because the mime gate rejects XML first. Either way the throw is what
	 * this asserts about - but a different XML payload is not automatically substitutable,
	 * since the guarantee rests on SVG rendering erroring out.
	 */
	public function testClosesTheStreamWhenDecodingThrows(): void {
		list($file, $stream) = $this->makeFile(
			'<?xml version="1.0"?><notanimage>x</notanimage>',
			'application/x-photoshop'
		);

		$result = (new Photoshop())->getThumbnail($file, 32, 32, false);

		$this->assertFalse($result, 'undecodable content must not produce a preview');
		$this->assertFalse(\is_resource($stream), 'the stream must be closed on the failure path');
	}

	/**
	 * Provider, mime type and content all agree, so the success path stays a success
	 * whether the provider decodes by pinning a coder (#41827) or by letting ImageMagick
	 * sniff one.
	 *
	 * TIFF rather than PDF, and a blob this test writes itself rather than a fixture: PDF
	 * decoding needs the Ghostscript delegate and is denied by Debian's and Ubuntu's
	 * stock policy.xml, neither of which queryFormats() reports - so gating on a PDF
	 * would be red on a plain apt-installed ImageMagick rather than skipped.
	 *
	 * The stream is asserted before the decode result, so that an environment which
	 * cannot decode the blob still exercises the handle-release behaviour under test and
	 * reports the decode as the failure it is.
	 */
	public function testClosesTheStreamOnSuccess(): void {
		list($file, $stream) = $this->makeFile($this->tiffBlob(), 'image/tiff');

		$result = (new TIFF())->getThumbnail($file, 32, 32, false);

		# outcome-neutral message: this assertion runs first, so it also fires where the
		# decode did not succeed, and must not then claim the leak was on the success path
		$this->assertFalse(\is_resource($stream), 'the stream must be closed once getThumbnail() returns');
		$this->assertNotFalse($result, 'a TIFF should decode through the TIFF provider');
	}

	/**
	 * Skips when this build has no TIFF support, and is loud about everything else.
	 *
	 * That line is deliberate rather than convenient. A skip costs the success-path
	 * fclose() assertion, and a guard quietly withholding these assertions is how they
	 * came to never run in CI in the first place - so an absent feature may skip, while a
	 * broken setup (revoked coder rights, an unparsable policy.xml, a wand that will not
	 * construct) has to be visible.
	 *
	 * The two are told apart by what ImageMagick reports, because no registration check
	 * can do it: coders/tiff.c registers TIFF, TIF, TIFF64 and friends unconditionally
	 * and only assigns the decoder/encoder pointers when built against libtiff, while
	 * GetMagickList() behind queryFormats() matches on the coder name alone. A build with
	 * no libtiff therefore reports TIFF as registered and then fails with MagickCore's
	 * "no encode delegate for this image format", whereas a policy denial says "not
	 * allowed by the security policy" - so the message is what separates them.
	 *
	 * Both directions are exercised: coder rights are granted per direction, so writing a
	 * TIFF does not establish that one can be read back, which is what the assertion
	 * actually needs.
	 *
	 * This deliberately does not try to prove the whole path - getThumbnail() also needs
	 * PNG encoding and GD to load the result. Both are hard product requirements
	 * (composer.json requires ext-gd) and PNG output underpins every ownCloud preview, so
	 * a build failing those should fail this test rather than skip it.
	 */
	private function tiffBlob(): string {
		$image = new \Imagick();
		try {
			$image->newImage(64, 48, new \ImagickPixel('white'));
			$image->setImageFormat('tiff');
			$blob = $image->getImageBlob();

			$probe = new \Imagick();
			try {
				$probe->readImageBlob($blob);
			} finally {
				$probe->clear();
			}
			return $blob;
		} catch (\Exception $e) {
			# \Exception rather than \ImagickException: ImagickPixelException extends
			# \Exception directly and is a sibling, not a subclass
			$message = $e->getMessage();
			if (\stripos($message, 'no encode delegate') !== false
				|| \stripos($message, 'no decode delegate') !== false
			) {
				$this->markTestSkipped('This ImageMagick build has no TIFF delegate: ' . $message);
			}
			throw $e;
		} finally {
			$image->clear();
		}
	}

	/**
	 * A storage that cannot open the file returns false rather than throwing, and
	 * stream_get_contents(false) raises a TypeError - an \Error, so it would escape the
	 * \Exception handler in getThumbnail() and surface as a 500 instead of a missing
	 * preview.
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
