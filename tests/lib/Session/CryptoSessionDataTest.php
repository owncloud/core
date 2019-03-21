<?php
/**
 * @author Joas Schilling <nickvergessen@owncloud.com>
 * @author Tom Needham <tom@owncloud.com>
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

namespace Test\Session;

use OC\Session\CryptoSessionData;
use OCP\Session\Exceptions\SessionNotAvailableException;
use OC\Session\Memory;

class CryptoSessionDataTest extends Session {
	/** @var \PHPUnit\Framework\MockObject\MockObject|\OCP\Security\ICrypto */
	protected $crypto;

	/** @var \OCP\ISession */
	protected $wrappedSession;

	protected function setUp() {
		parent::setUp();

		$this->wrappedSession = new \OC\Session\Memory(static::getUniqueID());
		$this->crypto = $this->getMockBuilder('OCP\Security\ICrypto')
			->disableOriginalConstructor()
			->getMock();
		$this->crypto->expects($this->any())
			->method('encrypt')
			->willReturnCallback(function ($input) {
				return '#' . $input . '#';
			});
		$this->crypto->expects($this->any())
			->method('decrypt')
			->willReturnCallback(function ($input) {
				return \substr($input, 1, -1);
			});

		$this->instance = new CryptoSessionData($this->wrappedSession, $this->crypto, 'PASS');
	}

	/**
	 * Thrown exception during session destruct/close should be handled silently
	 */
	public function testDestructExceptionCatching() {
		/** @var Memory | \PHPUnit\Framework\MockObject\MockObject $session */
		$session = $this->getMockBuilder(Memory::class)
			->disableOriginalConstructor()
			->getMock();
		$instance = new CryptoSessionData($session, $this->crypto, 'PASS');
		$instance->set('test', 'test');
		$e = new SessionNotAvailableException();
		$session->expects($this->exactly(2))->method('set')->willThrowException($e);
		$instance->__destruct();
	}
}
