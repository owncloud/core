<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

namespace OCA\FederatedFileSharing\Tests;

use OCA\FederatedFileSharing\TokenHandler;
use OCP\Security\ISecureRandom;

class TokenHandlerTest extends \Test\TestCase {
	/** @var  TokenHandler */
	private $tokenHandler;

	/** @var  ISecureRandom | \PHPUnit\Framework\MockObject\MockObject */
	private $secureRandom;

	/** @var int */
	private $expectedTokenLength = 15;

	public function setUp(): void {
		parent::setUp();

		$this->secureRandom = $this->createMock('OCP\Security\ISecureRandom');

		$this->tokenHandler = new TokenHandler($this->secureRandom);
	}

	public function testGenerateToken() {
		$this->secureRandom->expects($this->once())->method('generate')
			->with(
				$this->expectedTokenLength,
				ISecureRandom::CHAR_LOWER . ISecureRandom::CHAR_UPPER . ISecureRandom::CHAR_DIGITS
			)
			->willReturn(true);

		$this->assertTrue($this->tokenHandler->generateToken());
	}
}
