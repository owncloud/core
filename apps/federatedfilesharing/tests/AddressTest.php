<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

use OCA\FederatedFileSharing\Address;

/**
 * Class AddressTest
 *
 * @package OCA\FederatedFileSharing\Tests
 */
class AddressTest extends \Test\TestCase {
	/**
	 * @dataProvider dataTestGetUserId
	 *
	 * @param string $address
	 * @param string $expectedUserId
	 */
	public function testGetUserId($address, $expectedUserId) {
		$cloudAddress = new Address($address);
		$userId = $cloudAddress->getUserId();
		$this->assertEquals($userId, $expectedUserId);
	}

	public function dataTestGetUserId() {
		return [
			['john@domain.com', 'john'],
			['john@domain.com@some.host', 'john@domain.com'],
			['john@domain.com@http://some.host', 'john@domain.com']
		];
	}

	/**
	 * @dataProvider dataTestGetHostName
	 *
	 * @param string $address
	 * @param string $expectedHostName
	 */
	public function testGetHostName($address, $expectedHostName) {
		$cloudAddress = new Address($address);
		$hostName = $cloudAddress->getHostName();
		$this->assertEquals($hostName, $expectedHostName);
	}

	public function dataTestGetHostName() {
		return [
			['john@domain.com', 'domain.com'],
			['john@domain.com@some.host', 'some.host'],
			['john@domain.com@https://some.host', 'some.host'],
			['john@domain.com@http://some.host', 'some.host'],
			['john@domain.com@http://some.host/index.php/', 'some.host'],
			['john@domain.com@http://localhost/index.php/s/token', 'localhost']
		];
	}

	/**
	 * @dataProvider dataTestGetCloudId
	 *
	 * @param string $address
	 * @param string $expectedCloudId
	 */
	public function testGetCloudId($address, $expectedCloudId) {
		$cloudAddress = new Address($address);
		$cleanHostName = $cloudAddress->getCloudId();
		$this->assertEquals($cleanHostName, $expectedCloudId);
	}

	public function dataTestGetCloudId() {
		return [
			['john@domain.com', 'john@domain.com'],
			['john@domain.com@some.host', 'john@domain.com@some.host'],
			['john@domain.com@http://some.host', 'john@domain.com@http://some.host'],
			['john@domain.com@https://some.host', 'john@domain.com@https://some.host'],
			['john@domain.com@https://some.host/', 'john@domain.com@https://some.host']
		];
	}

	/**
	 * @dataProvider dataTestEqualTo
	 *
	 * @param Address $cloudAddress1
	 * @param Address $cloudAddress2
	 * @param bool $expectedIsEqual
	 */
	public function testEqualTo(Address $cloudAddress1, Address $cloudAddress2, $expectedIsEqual) {
		$isEqual = $cloudAddress1->equalTo($cloudAddress2);
		$this->assertEquals($isEqual, $expectedIsEqual);
	}

	public function dataTestEqualTo() {
		return [
			[ new Address('alice@host1'), new Address('bob@host1'), false],
			[ new Address('alice@host1'), new Address('alice@host2'), false],
			[ new Address('alice@host1'), new Address('alice@host1'), true],
			[ new Address('alice@http://host1'), new Address('alice@https://host1'), true],
			[ new Address('alice@host1'), new Address('alice@https://host1'), true],
			[ new Address('alice@http://host1'), new Address('alice@https://host1/'), true],
			[ new Address('alice@http://host1'), new Address('alice@https://HOst1/'), true],
		];
	}
}
