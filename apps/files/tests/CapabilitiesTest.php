<?php

namespace OCA\Files;

use OCP\IConfig;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;

/**
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

	protected function setUp() {
		parent::setUp();

		$this->config = $this->createMock(IConfig::class);
		$this->capabilities = new Capabilities($this->config);
	}

	public function testGetCapabilities() {
		$result = $this->capabilities->getCapabilities();
		$this->assertArrayHasKey('checksums', $result);
		$this->assertArrayHasKey('files', $result);
		$this->assertArrayHasKey('privateLinksDetailsParam', $result['files']);
		$this->assertTrue($result['files']['privateLinksDetailsParam']);
	}
}
