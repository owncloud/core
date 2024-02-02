<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2024, ownCloud GmbH
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

use OC\Preview\JPEG;
use OCP\Files\File;
use Test\TestCase;

class ImagePreviewTest extends TestCase {
	public function testImageTooBigToPreview(): void {
		$file = $this->createMock(File::class);
		$file->method('getSize')->willReturn(100*1024*1024);
		$file->method('fopen')->willThrowException(new \RuntimeException('How did you get here?'));
		$p = new JPEG();
		$result = $p->getThumbnail($file, 64, 64, true);
		self::assertFalse($result);
	}
	public function testPixelFlood(): void {
		$filename = __DIR__ . '/../../data/pixel.jpg';
		$stream = fopen($filename, 'rb');
		$file = $this->createMock(File::class);
		$file->method('getSize')->willReturn(filesize($filename));
		$file->method('fopen')->willReturn($stream);
		$p = new JPEG();
		$result = $p->getThumbnail($file, 64, 64, true);
		self::assertFalse($result);
	}
}
