<?php
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
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\Files_Trashbin\Tests;

use OC\Files\View;
use OCA\Files_Trashbin\TrashbinSkipChecker;
use OCP\IConfig;
use OCP\ILogger;

/**
 * Class SkipTrashbinManagerTest
 *
 * @group DB
 */
class TrashbinSkipCheckerTest extends TestCase {
	/** @var  ILogger */
	protected $logger;
	/** @var  IConfig */
	protected $config;
	/** @var  TrashbinSkipChecker */
	protected $trashbinSkipChecker;

	protected function setUp(): void {
		parent::setUp();

		$this->logger = $this->getMockBuilder(ILogger::class)
			->disableOriginalConstructor()->getMock();
		$this->config = $this->getMockBuilder(IConfig::class)
			->disableOriginalConstructor()->getMock();

		$this->trashbinSkipChecker = new TrashbinSkipChecker($this->logger, $this->config);
	}

	public function testSkipDueToDirectoryName() {
		$this->config->expects($this->any())
			->method('getSystemValue')
			->willReturn(['somefolder'], [], null);
		$view = $this->createMock(View::class);

		$view->expects($this->once())
			->method('getMimeType')->willReturn('application/pdf');

		$this->assertTrue($this->trashbinSkipChecker->shouldSkipPath($view, 'somefolder/somefile.pdf'));
	}

	public function testSkipDueToFileExtension() {
		$this->config->expects($this->any())
			->method('getSystemValue')
			->willReturn([], ['pdf'], null);
		$view = $this->createMock(View::class);

		$view->expects($this->once())
			->method('getMimeType')->willReturn('application/pdf');

		$this->assertTrue($this->trashbinSkipChecker->shouldSkipPath($view, 'somefolder/somefile.pdf'));
	}

	public function testSkipDueToFileSize() {
		$view = $this->createMock(View::class);

		$this->config->expects($this->any())
			->method('getSystemValue')
			->willReturn([], [], '5B');

		$view->expects($this->once())
			->method('getMimeType')->willReturn('application/pdf');

		$view->expects($this->once())
			->method('filesize')->willReturn(6);

		$this->assertTrue($this->trashbinSkipChecker->shouldSkipPath($view, 'somefolder/somefile.pdf'));
	}
}
