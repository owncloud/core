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

namespace Test\Route;

use OC\Route\Route;
use Test\TestCase;

class RouteTest extends TestCase {
	const code = <<<EOL
<?php
namespace Test\Route;
class DummyClass {
}
EOL;

	public function testActionInclude() {

		// create temp file with code to be required in the include action
		$temp_file = \tempnam(\sys_get_temp_dir(), 'code');
		\file_put_contents($temp_file, self::code);

		$route = new Route('/');
		$route->actionInclude($temp_file);

		// class does not yet exist
		$this->assertFalse(\class_exists('Test\Route\DummyClass'));

		$f = $route->getDefault('action');
		$f([]);

		// no class shall exist
		$this->assertTrue(\class_exists('Test\Route\DummyClass'));
	}
}
