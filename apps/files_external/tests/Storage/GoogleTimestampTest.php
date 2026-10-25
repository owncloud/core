<?php
/**
 * @author Martin Mattel <github@diemattels.at>
 *
 * @copyright Copyright (c) 2026, ownCloud GmbH
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

namespace OCA\Files_External\Tests\Storage;

use OCA\Files_External\Lib\Storage\Google;
use Test\TestCase;

/**
 * Converting Drive time fields, runs without a Google Drive account
 *
 * @package OCA\Files_External\Tests\Storage
 */
class GoogleTimestampTest extends TestCase {
	public function timeProvider() {
		return [
			// Drive returns null for times that are not set, e.g. viewedByMeTime
			[null, false],
			['2026-10-25T09:24:50.123Z', 1792920290],
			['2026-10-25T11:24:50+02:00', 1792920290],
			['not a time', false],
		];
	}

	/**
	 * @dataProvider timeProvider
	 *
	 * @param string|null $time
	 * @param int|false $expected
	 */
	public function testToTimestamp($time, $expected) {
		$this->assertSame($expected, self::invokePrivate(Google::class, 'toTimestamp', [$time]));
	}

	public function testToTimestampNullDoesNotTriggerDeprecation() {
		$messages = [];
		\set_error_handler(function ($errno, $errstr) use (&$messages) {
			$messages[] = $errstr;
			return true;
		});
		try {
			$result = self::invokePrivate(Google::class, 'toTimestamp', [null]);
		} finally {
			\restore_error_handler();
		}
		$this->assertFalse($result);
		$this->assertSame([], $messages);
	}
}
