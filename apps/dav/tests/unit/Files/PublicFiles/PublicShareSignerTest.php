<?php
/**
 * @author David Christofas <dchristofas@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

namespace OCA\DAV\Tests\Unit\Files\PublicFiles;

use OCA\DAV\Files\PublicFiles\PublicShareSigner;
use Test\TestCase;

class PublicShareSignerTest extends TestCase {
	public function testGet() {
		$s = new PublicShareSigner('someToken', 'someFileName', new \DateTime(), 'somekey');
		$hash = $s->getSignature();
		self::assertIsString($hash);
		self::assertEquals(64, \strlen($hash));
	}

	public function testVerify() {
		$expectedHash = 'd67966402971bd3eb18aea62faf122a30e2dd5c9101aa9e106a56574cc535c6c';
		$date = \DateTime::createFromFormat(\DateTime::ATOM, '2009-01-03T18:15:05Z');
		$s = new PublicShareSigner('someToken', 'someFileName', $date, 'somekey');
		self::assertEquals($expectedHash, $s->getSignature());
	}
}
