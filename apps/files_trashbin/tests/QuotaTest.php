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

use OCA\Files_Trashbin\Quota;
use OCP\IConfig;
use OCP\IUserManager;

class QuotaTest extends \Test\TestCase {

	/** @var IUserManager | \PHPUnit\Framework\MockObject\MockObject  */
	private $userManager;

	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject  */
	protected $config;

	protected function setUp() {
		parent::setUp();

		$this->userManager = $this->getMockBuilder(IUserManager::class)
			->getMock();
		$this->config =  $this->getMockBuilder(IConfig::class)
			->getMock();
	}

	public function testNonExistingUserNoNeedPurge() {
		$this->userManager->expects($this->any())
			->method('get')
			->willReturn(null);

		$quota = new Quota($this->userManager, $this->config);
		$neededSpace = $quota->calculateFreeSpace(100, 'anyuser');
		$this->assertEquals(0, $neededSpace);
	}
}
