<?php
/**
 * @copyright Copyright (c) 2026, ownCloud GmbH
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

namespace Test\Repair;

use OC\Files\View;
use OC\Repair\UpdateCertificateStore;
use OCP\Migration\IOutput;
use Test\TestCase;

/**
 * @group DB
 *
 * @see \OC\Repair\UpdateCertificateStore
 */
class UpdateCertificateStoreTest extends TestCase {
	/** @var View */
	private $view;
	/** @var string */
	private $systemBundle;
	/** @var string|false */
	private $originalSystemBundle;

	protected function setUp(): void {
		parent::setUp();

		\OC_Util::tearDownFS();
		\OC_Util::setupFS();

		$this->view = new View();
		$this->systemBundle = \OC::$server->getCertificateManager(null)->getCertificateBundle();
		$this->originalSystemBundle = $this->view->file_exists($this->systemBundle)
			? $this->view->file_get_contents($this->systemBundle)
			: false;
	}

	protected function tearDown(): void {
		if ($this->originalSystemBundle === false) {
			$this->view->unlink($this->systemBundle);
		} else {
			$this->view->file_put_contents($this->systemBundle, $this->originalSystemBundle);
		}
		parent::tearDown();
	}

	public function testIsRegistered() {
		$steps = \array_map('get_class', \OC\Repair::getRepairSteps());
		$this->assertContains(UpdateCertificateStore::class, $steps);
	}

	public function testRunWarnsInsteadOfFailing() {
		$server = $this->createMock(\OC\Server::class);
		$server->method('getCertificateManager')->willThrowException(new \Exception('boom'));
		$logger = $this->createMock(\OCP\ILogger::class);
		$logger->expects($this->once())->method('logException');
		$server->method('getLogger')->willReturn($logger);
		$out = $this->createMock(IOutput::class);
		$out->expects($this->once())->method('warning')
			->with('Could not update certificate stores: boom');

		$repair = new UpdateCertificateStore($server, \OC::$server->getConfig());
		$repair->run($out);
	}

	public function testRunRegeneratesSystemBundle() {
		$this->view->mkdir(\dirname($this->systemBundle));
		$this->view->file_put_contents($this->systemBundle, 'stale');
		// a cached bundle newer than resources/config/ca-bundle.crt is not rebuilt on access
		$this->view->touch($this->systemBundle, \time() + 10000);

		$repair = new UpdateCertificateStore(\OC::$server, \OC::$server->getConfig());
		$repair->run($this->createMock(IOutput::class));

		$bundle = $this->view->file_get_contents($this->systemBundle);
		$this->assertStringNotContainsString('stale', $bundle);
		$this->assertStringContainsString(
			\file_get_contents(\OC::$SERVERROOT . '/resources/config/ca-bundle.crt'),
			$bundle
		);
	}
}
