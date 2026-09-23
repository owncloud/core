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
 * skips wherever ImageMagick registers no SVG coder - owncloudci/php:8.3 among them. The
 * guard under test here returns before any SVG is decoded, so it can and should run
 * everywhere ext-imagick is present. ImagickFactory::create() still runs first, hence the
 * extension requirement.
 *
 * @requires extension imagick
 */
class SVGStreamTest extends TestCase {
	/**
	 * @dataProvider providesUnusableHandles
	 *
	 * @param false|null $handle
	 */
	public function testReturnsFalseWhenTheFileCannotBeOpened($handle): void {
		$file = $this->createMock(File::class);
		$file->method('fopen')->willReturn($handle);
		$file->method('getPath')->willReturn('/test/unopenable.svg');

		// Without the guard, stream_get_contents() raises a TypeError for either value.
		// That is an \Error, so it escapes getThumbnail()'s catch (\Exception) and reaches
		// the caller as a 500 rather than degrading to a media-type icon - this assertion
		// never gets to run, the case errors instead.
		$this->assertFalse((new SVG())->getThumbnail($file, 32, 32, false));
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
