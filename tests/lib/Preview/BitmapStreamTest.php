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
	 * @return array{0: File, 1: resource}
	 */
	private function makeFile(string $content): array {
		$stream = \fopen('php://memory', 'rb+');
		\fwrite($stream, $content);
		\rewind($stream);
		$file = $this->createMock(File::class);
		$file->method('fopen')->willReturn($stream);
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
	 */
	public function testClosesTheStreamWhenDecodingThrows(): void {
		// content no coder claims at all. An XML payload would be sniffed as SVG and only
		// fail where that delegate is missing, so it would decode to a blank canvas - and
		// fail this test - on a build with librsvg or the internal MSVG renderer enabled
		list($file, $stream) = $this->makeFile('not-an-image-' . \str_repeat("\x00\xff", 16));

		$result = (new Photoshop())->getThumbnail($file, 32, 32, false);

		$this->assertFalse($result, 'undecodable content must not produce a preview');
		$this->assertFalse(\is_resource($stream), 'the stream must be closed on the failure path');
	}

	public function testClosesTheStreamOnSuccess(): void {
		$png = \file_get_contents(\OC::$SERVERROOT . '/tests/data/testimage.png');
		list($file, $stream) = $this->makeFile($png);

		$result = (new Photoshop())->getThumbnail($file, 32, 32, false);

		$this->assertNotFalse($result, 'a PNG should still decode');
		$this->assertFalse(\is_resource($stream), 'the stream must be closed on the success path');
	}

	/**
	 * A storage that cannot open the file returns false rather than throwing. On PHP 7.4
	 * stream_get_contents(false) only warns and hands on false, which the sanitizer
	 * coerces and Imagick then rejects, so the return value alone cannot tell this apart
	 * from an undecodable file - it is false either way. The observable difference is the
	 * noise: unhandled, the attempt warns from stream_get_contents() before blaming
	 * ImageMagick for a file it never saw. (The sanitizer warns too, but behind @, so
	 * only the first is asserted on here.)
	 *
	 * (On PHP 8 the same call raises a TypeError instead - an \Error, so it escapes the
	 * \Exception handler in getThumbnail() and surfaces as a 500. That is the failure this
	 * guard prevents there, and why master's version of this test asserts the return.)
	 */
	public function testReportsNoPreviewWithoutWarningsWhenTheFileCannotBeOpened(): void {
		$file = $this->createMock(File::class);
		$file->method('fopen')->willReturn(false);
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
}
