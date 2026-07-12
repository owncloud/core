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
 */

namespace Test\IntegrityCheck;

use OC\IntegrityCheck\Helpers\EnvironmentHelper;
use OC\IntegrityCheck\Helpers\FileAccessHelper;
use OC\IntegrityCheck\Verifier\TrustStore;
use Test\TestCase;

/**
 * Conformance test for the trust-store migration to the new
 * resources/codesigning/ layout (roots/, intermediates/, crl/).
 *
 * Task 13: Verifies that:
 * - The legacy G1 anchor is relocated to roots/root-g1.crt
 * - CRLs are in crl/legacy.crl
 * - Old flat files are gone
 * - TrustStore correctly loads the migrated layout
 * - DI smoke test: \OC::$server->getIntegrityCodeChecker() constructs without error
 */
class TrustStoreMigrationTest extends TestCase {
	/** @var string */
	private $codesigningDir;

	protected function setUp(): void {
		parent::setUp();
		$this->codesigningDir = \OC::$SERVERROOT . '/resources/codesigning';
	}

	/**
	 * Assert the new directory structure exists: roots/, intermediates/, crl/
	 */
	public function testNewDirectoryStructureExists() {
		$this->assertDirectoryExists($this->codesigningDir . '/roots');
		$this->assertDirectoryExists($this->codesigningDir . '/intermediates');
		$this->assertDirectoryExists($this->codesigningDir . '/crl');
	}

	/**
	 * Assert the legacy G1 anchor is relocated to roots/root-g1.crt
	 */
	public function testLegacyG1AnchorRelocated() {
		$g1Root = $this->codesigningDir . '/roots/root-g1.crt';
		$this->assertFileExists($g1Root);
	}

	/**
	 * Assert the legacy CRL is relocated to crl/legacy.crl
	 */
	public function testLegacyCrlRelocated() {
		$legacyCrl = $this->codesigningDir . '/crl/legacy.crl';
		$this->assertFileExists($legacyCrl);
	}

	/**
	 * Assert old flat files are gone (proves migration moved, not duplicated)
	 */
	public function testOldFlatFilesGone() {
		$this->assertFalse(
			\file_exists($this->codesigningDir . '/root.crt'),
			'Old root.crt should be gone (migrated to roots/root-g1.crt)'
		);
		$this->assertFalse(
			\file_exists($this->codesigningDir . '/intermediate.crl.pem'),
			'Old intermediate.crl.pem should be gone (migrated to crl/legacy.crl)'
		);
	}

	/**
	 * Assert TrustStore loads the migrated layout and finds at least one G1 root
	 */
	public function testTrustStoreLoadsG1Root() {
		$env = new EnvironmentHelper();
		$fileAccess = new FileAccessHelper();
		$trustStore = new TrustStore($fileAccess, $env);

		$roots = $trustStore->getRoots();
		$this->assertNotEmpty($roots, 'TrustStore should load at least the G1 root');

		// Verify at least one root is tagged 'g1'
		$g1Found = false;
		foreach ($roots as $root) {
			if (\is_array($root) && $root['generation'] === 'g1') {
				$g1Found = true;
				break;
			}
		}
		$this->assertTrue($g1Found, 'At least one root should be tagged generation g1');
	}

	/**
	 * DI smoke test: \OC::$server->getIntegrityCodeChecker() constructs without error
	 *
	 * This proves the Server.php wiring (Task 13 Part A) constructs the Checker
	 * with the Verifier graph (via lazy builder + injected clientService) without error.
	 */
	public function testDISmokeTestCheckerConstructs() {
		$checker = \OC::$server->getIntegrityCodeChecker();
		$this->assertNotNull($checker);
		$this->assertTrue(\method_exists($checker, 'isCodeCheckEnforced'));
	}
}
