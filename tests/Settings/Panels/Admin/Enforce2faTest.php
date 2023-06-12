<?php
/**
 *
 * @copyright Copyright (c) 2023, ownCloud GmbH
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

use OC\Settings\Panels\Admin\Enforce2fa;
use OCP\IConfig;

/**
 * @package Tests\Settings\Panels\Admin
 */
class Enforce2faTest extends \Test\TestCase {
	/** @var IConfig */
	private $config;
	/** @var Enforce2fa */
	private $panel;

	protected function setUp(): void {
		parent::setUp();
		$this->config = $this->createMock(IConfig::class);

		$this->panel = new Enforce2fa($this->config);
	}

	public function testGetSection() {
		$this->assertSame('security', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertSame(50, $this->panel->getPriority());
	}

	public function testGetPanel() {
		$this->config->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'enforce_2fa', 'no', 'yes'],
				['core', 'enforce_2fa_excluded_groups', '[]', '["group1", "group2"]'],
			]));

		$tmplHtml = $this->panel->getPanel()->fetchPage();
		$this->assertMatchesRegularExpression('/<input.*id="enforce_2fa".*checked="checked"/', $tmplHtml);
		$this->assertMatchesRegularExpression('/<input.*id="enforce_2fa_excluded_groups".*value="group1|group2"/', $tmplHtml);
	}
}
