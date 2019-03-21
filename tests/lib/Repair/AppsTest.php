<?php
/**
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
namespace Test\Repair;

use OC\Repair\Apps;
use OCP\App\IAppManager;
use OCP\IConfig;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Test\TestCase;

/**
 * Tests to check version comparison
 *
 * @see \OC\Repair\AppsTest
 */
class AppsTest extends TestCase {

	/** @var Apps | \PHPUnit\Framework\MockObject\MockObject */
	protected $repair;
	/** @var IAppManager | \PHPUnit\Framework\MockObject\MockObject */
	protected $appManager;
	/** @var  EventDispatcherInterface | \PHPUnit\Framework\MockObject\MockObject */
	protected $eventDispatcher;
	/** @var  IConfig | \PHPUnit\Framework\MockObject\MockObject*/
	protected $config;
	/** @var \OC_Defaults | \PHPUnit\Framework\MockObject\MockObject */
	private $defaults;

	protected function setUp() {
		parent::setUp();
		$this->appManager = $this->createMock(IAppManager::class);
		$this->defaults = $this->createMock(\OC_Defaults::class);
		$this->eventDispatcher = $this->createMock(EventDispatcherInterface::class);
		$this->config = $this->createMock(IConfig::class);
		$this->repair = new Apps(
			$this->appManager,
			$this->eventDispatcher,
			$this->config,
			$this->defaults
		);
	}

	public function testMarketEnableVersionCompare10() {
		$this->config->expects($this->once())->method('getSystemValue')->with('version', '0.0.0')->willReturn('10.0.0');
		$this->assertTrue($this->invokePrivate($this->repair, 'requiresMarketEnable'));
	}

	public function testMarketEnableVersionCompare9() {
		$this->config->expects($this->once())->method('getSystemValue')->with('version', '0.0.0')->willReturn('9.1.5');
		$this->assertTrue($this->invokePrivate($this->repair, 'requiresMarketEnable'));
	}

	public function testMarketEnableVersionCompareFuture() {
		$this->config->expects($this->once())->method('getSystemValue')->with('version', '0.0.0')->willReturn('10.0.2');
		$this->assertFalse($this->invokePrivate($this->repair, 'requiresMarketEnable'));
	}

	public function testMarketEnableVersionCompareCurrent() {
		$this->config->expects($this->once())->method('getSystemValue')->with('version', '0.0.0')->willReturn('10.0.1');
		$this->assertFalse($this->invokePrivate($this->repair, 'requiresMarketEnable'));
	}

	public function dataTestHasBlockingIncompatibleApps() {
		return [
			['git', [], false],
			['daily', [], false],
			['stable', [], false],
			['git', ['someapp'], false],
			['daily', ['someapp'], false],
			['stable', ['someapp'], true],
		];
	}

	/**
	 * @dataProvider dataTestHasBlockingIncompatibleApps
	 * @param string $channel
	 * @param string[] $blockingApps
	 * @param bool $expectedResult
	 */
	public function testHasBlockingIncompatibleApps($channel, $blockingApps, $expectedResult) {
		$oldChannel = \OCP\Util::getChannel();
		\OCP\Util::setChannel($channel);
		$this->assertEquals(
			$expectedResult,
			$this->invokePrivate($this->repair, 'hasBlockingIncompatibleApps', [$blockingApps])
		);
		\OCP\Util::setChannel($oldChannel);
	}

	public function dataTestUpdateEvent() {
		return [
			['10.1.0.0', [10, 1, 3, 7], false, false], // same major version
			['10.1.0.0', [10, 1, 3, 7], true, true],   // same major version, but major forced
			['10.1.0.0', [11, 0, 2, 0], false, true],  // different major version
			['10.1.0.0', [10, 0, 2, 0], true, true],  // different major version, major forced
		];
	}

	/**
	 * @dataProvider dataTestUpdateEvent
	 * @param string $installedVersion
	 * @param int[] $sourcesVersion
	 * @param bool $forceMajorUpdate
	 * @param bool $expectedIsMajorUpdate
	 */
	public function testUpdateAppEvent($installedVersion, $sourcesVersion, $forceMajorUpdate, $expectedIsMajorUpdate) {
		$appName = 'fakeapp';

		$this->config->method('getSystemValue')
			->with('version', '0.0.0')
			->willReturn($installedVersion);
		$this->configureRepair(['getSourcesVersion'], $forceMajorUpdate);

		$this->repair->method('getSourcesVersion')
			->willReturn($sourcesVersion);

		$this->eventDispatcher->expects($this->once())->method('dispatch')
			->willReturnCallback(
				function ($eventName, $event) use ($appName) {
					$this->assertEquals($appName, $event->getSubject());
					$this->assertEquals(true, $event->getArgument('isMajorUpdate'));
				}
			);
		$this->invokePrivate(
			$this->repair,
			'getAppsFromMarket',
			[
				new \OC\Migration\ConsoleOutput(new NullOutput()),
				[ $appName ],
				'john'
			]
		);
	}

	private function configureRepair($mockedMethods, $forceMajorUpgrade = false) {
		$this->repair = $this->getMockBuilder(Apps::class)
			->setConstructorArgs(
				[
					$this->appManager,
					$this->eventDispatcher,
					$this->config,
					$this->defaults,
					$forceMajorUpgrade
				]
			)
			->setMethods($mockedMethods)
			->getMock();
	}
}
