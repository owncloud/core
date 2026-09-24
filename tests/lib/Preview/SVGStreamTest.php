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

use OC\Preview\SVG;
use OCP\Files\File;
use Test\TestCase;

/**
 * Deliberately not part of SVGTest: that one extends Provider, needs the database and
 * skips wherever ImageMagick registers no SVG coder - owncloudci/php:7.4, this branch's own
 * CI image, among them. The guard under test here returns before any SVG is decoded, so it
 * can and should run everywhere ext-imagick is present. ImagickFactory::create() still runs
 * first, hence the extension requirement.
 *
 * @requires extension imagick
 */
class SVGStreamTest extends TestCase {
	/**
	 * Asserts on the warnings rather than on the return value, because on PHP 7.4 the
	 * return value cannot tell the two trees apart. Unguarded, stream_get_contents() warns
	 * and hands on false for either handle; the prefix check turns that into a bare XML
	 * declaration, and Imagick rejects it - so getThumbnail() answers false there too, and
	 * master's assertFalse() would pass with the guard reverted. What the guard removes is
	 * the noise: one warning from stream_get_contents() naming a parameter type, and for
	 * the null row a second from fclose(), before the log blames ImageMagick for content it
	 * never received. (On PHP 8 those calls raise a TypeError instead, an \Error that
	 * escapes getThumbnail()'s catch (\Exception) and reaches the caller as a 500, which is
	 * why master can assert the return value.)
	 *
	 * The handler honours error_reporting() so that diagnostics the code under test
	 * deliberately silenced with @ cannot fail this - OC\Log\ErrorHandler::onError() draws
	 * the same line, returning early when error_reporting() is 0.
	 *
	 * @dataProvider providesUnusableHandles
	 *
	 * @param false|null $handle
	 */
	public function testReportsNoPreviewWithoutWarningsWhenTheFileCannotBeOpened($handle): void {
		$file = $this->createMock(File::class);
		$file->method('fopen')->willReturn($handle);
		$file->method('getPath')->willReturn('/test/unopenable.svg');

		$warnings = [];
		\set_error_handler(function ($number, $string) use (&$warnings) {
			if (!($number & \error_reporting())) {
				return false;
			}
			$warnings[] = $string;
			return true;
		});
		try {
			$result = (new SVG())->getThumbnail($file, 32, 32, false);
		} finally {
			\restore_error_handler();
		}

		$this->assertFalse($result, 'an unopenable file must not produce a preview');
		$this->assertSame([], $warnings, 'the failure must be handled, not warned about');
	}

	public function providesUnusableHandles(): array {
		# View::fopen() returns null rather than false for a path isForbiddenFileOrDir()
		# rejects, and for one no storage resolves for, so the guard cannot just compare
		# against false
		return ['fopen returned false' => [false], 'fopen returned null' => [null]];
	}

	public function testReleasesTheStreamWhenTheReadThrows(): void {
		if (\in_array('svgstreamtest', \stream_get_wrappers(), true)) {
			\stream_wrapper_unregister('svgstreamtest');
		}
		$this->assertTrue(
			\stream_wrapper_register('svgstreamtest', ThrowingStreamWrapper::class),
			'the throwing wrapper must register, or this case proves nothing'
		);

		try {
			$stream = \fopen('svgstreamtest://throw-on-read', 'r');
			// premise: without an open handle to hand over, both assertions below would hold
			// at the !is_resource() guard and never reach the finally this case is about
			$this->assertTrue(\is_resource($stream), 'the wrapper must yield an open handle');

			$file = $this->createMock(File::class);
			$file->method('fopen')->willReturn($stream);
			$file->method('getPath')->willReturn('/test/unreadable.svg');

			$result = (new SVG())->getThumbnail($file, 32, 32, false);
		} finally {
			\stream_wrapper_unregister('svgstreamtest');
		}

		$this->assertFalse($result);
		// The wrapper throws a \RuntimeException out of stream_get_contents(), which
		// getThumbnail() catches - so the fclose() has to be in a finally or the descriptor,
		// and the shared lock the View wrapper releases on close, are both held on. Asserted
		// through the caller's own handle rather than by counting /proc/self/fd, which only
		// exists on Linux.
		$this->assertFalse(\is_resource($stream), 'getThumbnail() must close the handle it was given');
	}
}

/**
 * Reproduces a wrapper that fails mid-read. The encryption module does this for real when a
 * file's key is missing or corrupt; a plain fopen() of an unreadable path cannot, because it
 * fails at open time and is covered by testReturnsFalseWhenTheFileCannotBeOpened() instead.
 */
class ThrowingStreamWrapper {
	/** @var resource */
	public $context;

	public function stream_open(string $path, string $mode, int $options, ?string &$openedPath): bool {
		return true;
	}

	public function stream_read(int $count): string {
		throw new \RuntimeException('simulated read failure');
	}

	public function stream_eof(): bool {
		return false;
	}

	public function stream_stat(): array {
		return [];
	}
}
