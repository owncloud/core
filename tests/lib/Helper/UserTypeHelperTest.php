<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace Test\Helper;

use OC\Helper\UserTypeHelper;
use OCP\App\IAppManager;
use OCP\IConfig;
use Test\TestCase;

class UserTypeHelperTest extends TestCase {
	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	protected $config;

	/** @var UserTypeHelper | \PHPUnit\Framework\MockObject\MockObject */
	protected $userTypeHelper;

	protected function setUp(): void {
		parent::setUp();
		$this->config = $this->createMock(IConfig::class);
		$this->userTypeHelper = new UserTypeHelper($this->config);
	}

	/**
	 * @dataProvider isGuestUserDataProvider
	 *
	 * @param bool $isGuestsAppEnabled
	 * @param bool $isUserGuest
	 * @param bool $expected
	 */
	public function testIsGuestUser($isUserGuest, $expected) {
		$this->config->method('getUserValue')->willReturn($isUserGuest);
		$this->assertEquals($expected, $this->userTypeHelper->isGuestUser('foobar'));
	}

	public function isGuestUserDataProvider() {
		return [
			[false, false],
			[true, true],
		];
	}
}
