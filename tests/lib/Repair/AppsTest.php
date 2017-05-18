<?php
/**
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH.
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
namespace Test\Repair;
use OCP\App\IAppManager;
use OCP\IConfig;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Tests to check version comparison
 *
 * @see \OC\Repair\AppsTest
 */
class AppsTest extends \Test\TestCase {

	/** @var \OC\Repair\AvatarPermissions */
	protected $repair;

	/** @var IAppManager */
	protected $appManager;
	/** @var  EventDispatcher */
	protected $eventDispatcher;
	/** @var  IConfig */
	protected $config;

	protected function setUp() {
		parent::setUp();

		$this->appManager = $this->getMockBuilder(IAppManager::class)->getMock();
		$this->eventDispatcher = $this->getMockBuilder(EventDispatcher::class)->getMock();
		$this->config = $this->getMockBuilder(IConfig::class)->getMock();
		$this->repair = new \OC\Repair\Apps($this->appManager, $this->eventDispatcher, $this->config);
	}

	public function testMarketEnableVersionCompare10() {
		$this->config->expects($this->once())->method('getSystemValue')->with('version', '0.0.0')->will($this->returnValue('10.0.0'));
		$this->assertTrue($this->invokePrivate($this->repair, 'requiresMarketEnable'));
	}

	public function testMarketEnableVersionCompare9() {
		$this->config->expects($this->once())->method('getSystemValue')->with('version', '0.0.0')->will($this->returnValue('9.1.5'));
		$this->assertTrue($this->invokePrivate($this->repair, 'requiresMarketEnable'));
	}

	public function testMarketEnableVersionCompareFuture() {
		$this->config->expects($this->once())->method('getSystemValue')->with('version', '0.0.0')->will($this->returnValue('10.0.2'));
		$this->assertFalse($this->invokePrivate($this->repair, 'requiresMarketEnable'));
	}

	public function testMarketEnableVersionCompareCurrent() {
		$this->config->expects($this->once())->method('getSystemValue')->with('version', '0.0.0')->will($this->returnValue('10.0.1'));
		$this->assertFalse($this->invokePrivate($this->repair, 'requiresMarketEnable'));
	}
}