<?php
/**
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

namespace OCA\Files\Tests\BackgroundJob;

use OC\Lock\Persistent\LockMapper;
use OCA\Files\BackgroundJob\CleanupPersistentFileLocks;
use Test\TestCase;

class CleanupPersistentFileLocksTest extends TestCase {
	public function testJob(): void {
		/** @var LockMapper | \PHPUnit_Framework_MockObject_MockObject $lockMapper */
		$lockMapper = $this->createMock(LockMapper::class);
		$lockMapper->expects(self::once())->method('cleanup');
		$job = new CleanupPersistentFileLocks($lockMapper);
		$job->run(null);
	}
}
