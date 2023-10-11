<?php
/**
 * @author Lukas Reschke <lukas@statuscode.ch>
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

namespace OCA\UpdateNotification\Tests;

use OCA\UpdateNotification\ResetTokenBackgroundJob;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IConfig;
use Test\TestCase;

class ResetTokenBackgroundJobTest extends TestCase {
	/** @var IConfig */
	private \PHPUnit\Framework\MockObject\MockObject $config;
	private \OCA\UpdateNotification\ResetTokenBackgroundJob $resetTokenBackgroundJob;
	/** @var ITimeFactory */
	private \PHPUnit\Framework\MockObject\MockObject $timeFactory;

	public function setUp(): void {
		parent::setUp();
		$this->config = $this->createMock('\\' . \OCP\IConfig::class);
		$this->timeFactory = $this->createMock('\\' . \OCP\AppFramework\Utility\ITimeFactory::class);
		$this->resetTokenBackgroundJob = new ResetTokenBackgroundJob($this->config, $this->timeFactory);
	}

	public function testRunWithNotExpiredToken() {
		$this->timeFactory
			->expects($this->any())
			->method('getTime')
			->willReturn(123);
		$this->config
			->expects($this->once())
			->method('getAppValue')
			->with('core', 'updater.secret.created', 123);
		$this->config
			->expects($this->never())
			->method('deleteSystemValue')
			->with('updater.secret');

		self::invokePrivate($this->resetTokenBackgroundJob, 'run', ['']);
	}

	public function testRunWithExpiredToken() {
		$this->timeFactory
			->expects($this->exactly(2))
			->method('getTime')
			->willReturnOnConsecutiveCalls(
				1_455_131_633,
				1_455_045_234,
			);

		$this->config
			->expects($this->once())
			->method('getAppValue')
			->with('core', 'updater.secret.created', 1_455_045_234);
		$this->config
			->expects($this->once())
			->method('deleteSystemValue')
			->with('updater.secret');

		self::invokePrivate($this->resetTokenBackgroundJob, 'run', ['']);
	}
}
