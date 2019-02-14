<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace Test\Helper;

use OC\Helper\EnvironmentHelper;
use Test\TestCase;

class EnvironmentHelperTest extends TestCase {
	private $environmentHelper;

	public function setUp(): void {
		$this->environmentHelper = new EnvironmentHelper();
		parent::setUp();
	}

	public function testGetWebRoot() {
		$this->assertEquals(\OC::$WEBROOT, $this->environmentHelper->getWebRoot());
	}

	public function testGetServerRoot() {
		$this->assertEquals(\OC::$SERVERROOT, $this->environmentHelper->getServerRoot());
	}

	public function testGetAppsRoots() {
		$this->assertEquals(\OC::$APPSROOTS, $this->environmentHelper->getAppsRoots());
	}

	public function testGetEnvVar() {
		\putenv('foo=bar');
		$this->assertEquals('bar', $this->environmentHelper->getEnvVar('foo'));
	}
}
