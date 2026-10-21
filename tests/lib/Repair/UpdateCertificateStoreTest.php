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

	protected function setUp(): void {
		parent::setUp();

		\OC_Util::tearDownFS();
		\OC_Util::setupFS();

		$this->view = new View();
		$this->systemBundle = \OC::$server->getCertificateManager(null)->getCertificateBundle();
	}

	protected function tearDown(): void {
		$this->view->unlink($this->systemBundle);
		parent::tearDown();
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
