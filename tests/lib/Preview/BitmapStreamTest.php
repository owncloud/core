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
	 * Needs no particular coder: no build has one for non-image XML, so readImageBlob()
	 * throws everywhere. On #41827 it never reaches a coder at all, because the mime
	 * gate rejects XML first - either way the throw is what this asserts about.
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
	 * TIFF rather than PDF, and a blob this test writes itself rather than a fixture:
	 * PDF decoding depends on the Ghostscript delegate and is the coder most likely to
	 * be revoked by a hardened policy.xml, neither of which queryFormats() reports - so
	 * gating on it would leave this red on exactly the images OC10-164 hardens. Writing
	 * and reading the blob with the same build cannot disagree with itself.
	 */
	public function testClosesTheStreamOnSuccess(): void {
		list($file, $stream) = $this->makeFile($this->tiffBlob(), 'image/tiff');

		$result = (new TIFF())->getThumbnail($file, 32, 32, false);

		$this->assertNotFalse($result, 'a TIFF should decode through the TIFF provider');
		$this->assertFalse(\is_resource($stream), 'the stream must be closed on the success path');
	}

	/**
	 * A TIFF needs no external delegate, so this skips only where the build cannot
	 * handle TIFF at all - in which case the assertions above could not run either way.
	 */
	private function tiffBlob(): string {
		try {
			$image = new \Imagick();
			$image->newImage(64, 48, new \ImagickPixel('white'));
			$image->setImageFormat('tiff');
			$blob = $image->getImageBlob();
			$image->clear();
		} catch (\ImagickException $e) {
			$this->markTestSkipped('This ImageMagick build cannot produce a TIFF: ' . $e->getMessage());
		}
		return $blob;
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
