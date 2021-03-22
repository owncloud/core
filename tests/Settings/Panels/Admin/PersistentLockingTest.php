<?php
/**
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

namespace Tests\Settings\Panels\Admin;

use OC\Settings\Panels\Admin\PersistentLocking;
use OC\Lock\Persistent\LockManager;
use OCP\IConfig;

/**
 * @package Tests\Settings\Panels\Admin
 */
class PersistentLockingTest extends \Test\TestCase
{
	/** @var IConfig */
	private $config;

	public function setUp(): void {
		parent::setUp();
		$this->config = $this->createMock(IConfig::class);
		$this->panel = new PersistentLocking($this->config);
	}

	public function testGetPriority() {
		$this->assertSame(0, $this->panel->getPriority());
	}

	public function testGetSection() {
		$this->assertEquals('additional', $this->panel->getSectionID());
	}

	public function testGetPanel() {
		$this->config->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'lock_timeout_default', LockManager::LOCK_TIMEOUT_DEFAULT, 44],
				['core', 'lock_timeout_max', LockManager::LOCK_TIMEOUT_MAX, 9999],
			]));

		$templateHtml = $this->panel->getPanel()->fetchPage();
		// applied modifiers "m" for multiline and "s" to include newlines in the dot char
		$this->assertRegExp('/input[[:space:]].*name="lock_timeout_default"[[:space:]].*value="44"/ms', $templateHtml);
		$this->assertRegExp('/input[[:space:]].*name="lock_timeout_max"[[:space:]].*value="9999"/ms', $templateHtml);
	}
}
