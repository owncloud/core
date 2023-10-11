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

use OC\Updater;
use OCA\UpdateNotification\UpdateChecker;
use Test\TestCase;

class UpdateCheckerTest extends TestCase {
	/** @var Updater */
	private \PHPUnit\Framework\MockObject\MockObject $updater;
	private \OCA\UpdateNotification\UpdateChecker $updateChecker;

	public function setUp(): void {
		parent::setUp();

		$this->updater = $this->getMockBuilder('\\' . \OC\Updater\VersionCheck::class)
			->disableOriginalConstructor()->getMock();
		$this->updateChecker = new UpdateChecker($this->updater);
	}

	public function testGetUpdateStateWithUpdateAndInvalidLink() {
		$this->updater
			->expects($this->once())
			->method('check')
			->willReturn([
				'version' => 123,
				'versionstring' => 'ownCloud 123',
				'web'=> 'javascript:alert(1)',
			]);

		$expected = [
			'updateAvailable' => true,
			'updateVersion' => 'ownCloud 123',
		];
		$this->assertSame($expected, $this->updateChecker->getUpdateState());
	}

	public function testGetUpdateStateWithUpdateAndValidLink() {
		$this->updater
			->expects($this->once())
			->method('check')
			->willReturn([
				'version' => 123,
				'versionstring' => 'ownCloud 123',
				'web'=> 'https://owncloud.com/myUrl',
			]);

		$expected = [
			'updateAvailable' => true,
			'updateVersion' => 'ownCloud 123',
			'updateLink' => 'https://owncloud.com/myUrl',
		];
		$this->assertSame($expected, $this->updateChecker->getUpdateState());
	}

	public function testGetUpdateStateWithoutUpdate() {
		$this->updater
			->expects($this->once())
			->method('check')
			->willReturn([]);

		$expected = [];
		$this->assertSame($expected, $this->updateChecker->getUpdateState());
	}
}
