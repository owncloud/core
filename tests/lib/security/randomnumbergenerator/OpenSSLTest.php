<?php
/**
 * @author Lukas Reschke <lukas@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

class OpenSSLTest extends \Test\TestCase {
	/** @var \OC\Security\RandomNumberGenerator\OpenSSL */
	private $openssl;

	public function setUp() {
		parent::setUp();
		$this->openssl = new \OC\Security\RandomNumberGenerator\OpenSSL();
	}

	public function testGetStrength() {
		$this->assertEquals(new \SecurityLib\Strength(\SecurityLib\Strength::MEDIUM), $this->openssl->getStrength());
	}

	public function testGenerate() {
		$this->assertSame(12, strlen($this->openssl->generate(12)));
		$this->assertSame(0, strlen($this->openssl->generate(0)));
	}
}
