<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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

namespace OCA\Files_Versions\Tests\Command;

use OCA\Files_Versions\Command\Expire;
use Test\TestCase;

/**
 * Class ExpireTest
 *
 * @group DB
 *
 * @package OCA\Files_Versions\Tests\Command
 */
class ExpireTest extends TestCase {
	public function testExpireNonExistingUser() {
		$command = new Expire(self::getUniqueID('test'), '');
		$command->handle();

		$this->assertTrue(true);
	}
}
