<?php

namespace OCA\DAV\Tests\Unit;

use OCA\DAV\Capabilities;
use OCP\IConfig;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;

/**
 * @author Jan Ackermann <jackermann@owncloud.com>
 * @author Jannik Stehle <jstehle@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

class CapabilitiesTest extends TestCase {
	/** @var IConfig| MockObject */
	protected $config;

	/** @var Capabilities */
	protected $capabilities;

	protected function setUp(): void {
		parent::setUp();

		$this->config = $this->createMock(IConfig::class);
		$this->capabilities = new Capabilities($this->config);
	}

	public function testGetCapabilities() {
		$this->config->expects($this->exactly(2))
			->method('getSystemValue')
			->withConsecutive(['dav.propfind.depth_infinity'], ['dav.enable.async'])
			->willReturn(true, true);

		$result = $this->capabilities->getCapabilities();
		$this->assertEquals($result['dav']['chunking'], '1.0');
		$this->assertEquals($result['dav']['reports'][0], 'search-files');
		$this->assertEquals($result['dav']['trashbin'], '1.0');
		$this->assertEquals($result['dav']['propfind']['depth_infinity'], true);
		$this->assertEquals($result['async'], '1.0');
	}
}
