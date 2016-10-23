<?php
/**
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

namespace Test;

use OC\Settings\SettingsManager;

class SettingsManagerTest extends TestCase {
	/** @var \OC\Settings\SettingsManager */
	protected $settingsManager;

	protected function setUp() {
		parent::setUp();
		$this->settingsManager = new SettingsManager();
	}

	public function testGetBuiltInSections() { }

  public function testFindRegisteredPanels() {}

  public function testLoadPanel() {}

  public function testLoadPanels() {

  public function testGetPanels() {}

  public function testSortOrder() {}

}
