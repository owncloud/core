<?php
/**
 * @author Viktar Dubiniuk
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
 */

namespace Settings\Panels\Personal;

use OC\Settings\Panels\Personal\Cors;
use OCP\IConfig;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IUserSession;
use PHPUnit\Framework\MockObject\MockObject;

class CorsTest extends \Test\TestCase {
	/** @var Cors */
	protected $panel;

	/** @var IUserSession | MockObject */
	protected $userSession;

	/** @var IURLGenerator | MockObject */
	protected $urlGenerator;

	/** @var IConfig | MockObject */
	protected $config;

	protected function setUp(): void {
		parent::setUp();

		$this->userSession = $this->createMock(IUserSession::class);
		$this->urlGenerator = $this->createMock(IURLGenerator::class);
		$this->config = $this->createMock(IConfig::class);

		$this->panel = new Cors(
			$this->userSession,
			$this->urlGenerator,
			$this->config
		);
	}

	public function testGetPanel() {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('alice');
		$this->userSession->method('getUser')->willReturn($user);
		$this->config->method('getUserValue')->willReturn('["http:\/\/www.test.com"]');
		$panelHtml = $this->panel->getPanel()->fetchPage();

		$this->assertStringContainsString('id="cors"', $panelHtml);
		$this->assertStringContainsString('http://www.test.com"', $panelHtml);
	}
}
