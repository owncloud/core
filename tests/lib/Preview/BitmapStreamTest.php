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

use OC\Preview\PDF;
use OC\Preview\Photoshop;
use OCP\Files\File;
use Test\TestCase;

/**
 * @requires extension imagick
 */
class BitmapStreamTest extends TestCase {
	/**
	 * The mime type has to be stubbed even where this test does not care about it:
	 * Bitmap providers read $file->getMimeType() to decide which Imagick coder to use,
	 * and an unstubbed mock returns null, which is a TypeError rather than a bad
	 * preview - and a TypeError is an \Error, so it escapes getThumbnail()'s
	 * \Exception handler entirely.
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
	 * XML content is rejected before any coder is consulted, so this case needs no
	 * particular coder to be registered.
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
	 * Uses PDF against a PDF, so the provider, the file's mime type and the content all
	 * agree - the success path has to stay a success regardless of whether the provider
	 * decodes by pinning a coder or by letting ImageMagick sniff one.
	 */
	public function testClosesTheStreamOnSuccess(): void {
		if (\count(\Imagick::queryFormats('PDF')) === 0) {
			$this->markTestSkipped('This ImageMagick build registers no PDF coder');
		}
		$pdf = \file_get_contents(\OC::$SERVERROOT . '/tests/data/testimage.pdf');
		list($file, $stream) = $this->makeFile($pdf, 'application/pdf');

		$result = (new PDF())->getThumbnail($file, 32, 32, false);

		$this->assertNotFalse($result, 'a PDF should decode through the PDF provider');
		$this->assertFalse(\is_resource($stream), 'the stream must be closed on the success path');
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
