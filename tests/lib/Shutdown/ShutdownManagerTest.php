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

namespace Tests\Shutdown;

use OC\Shutdown\ShutDownManager;
use Test\TestCase;

class ShutdownManagerTest extends TestCase {
	public function testOrderedRun() {
		/** @var ShutDownManager $manager */
		$manager = $this->getMockBuilder(ShutDownManager::class)
			->disableOriginalConstructor()
			->setMethods(['__construct'])
			->getMock();
		$callOrder = '';
		$manager->register(function () use (&$callOrder) {
			$callOrder .= 'b';
		}, 20);
		$manager->register(function () use (&$callOrder) {
			$callOrder .= 'c';
		}, 30);
		$manager->register(function () use (&$callOrder) {
			$callOrder .= 'a';
		}, 10);

		$manager->run();
		$this->assertEquals('abc', $callOrder);
	}
}
