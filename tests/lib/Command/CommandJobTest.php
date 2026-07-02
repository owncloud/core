<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2024, ownCloud GmbH
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

namespace Test\Command;

use OC\Command\CommandJob;
use OCP\Command\ICommand;
use PHPUnit\Framework\TestCase;

/**
 * A legitimate ICommand used to verify the happy path still works.
 */
class DummyICommand implements ICommand {
	/** @var bool */
	public static $handled = false;

	public function handle() {
		self::$handled = true;
	}
}

/**
 * A class that does NOT implement ICommand – used to prove the gadget-chain
 * scenario is blocked: if an attacker serializes an arbitrary object and
 * stores it in oc_jobs.argument, CommandJob::run() must refuse it.
 *
 * The __wakeup() method sets a flag so we can assert it was never called.
 */
class MaliciousGadget {
	/** @var bool */
	public static $wakeupCalled = false;

	public function __wakeup() {
		self::$wakeupCalled = true;
	}
}

/**
 * Thin subclass that exposes the protected run() method for unit testing
 * without needing a full background-job infrastructure.
 */
class TestableCommandJob extends CommandJob {
	public function runPublic(string $serialized): void {
		$this->run($serialized);
	}
}

/**
 * @package Test\Command
 */
class CommandJobTest extends TestCase {
	protected function setUp(): void {
		parent::setUp();
		DummyICommand::$handled = false;
		MaliciousGadget::$wakeupCalled = false;
	}

	// ------------------------------------------------------------------
	// Happy-path: a properly serialized ICommand must be executed
	// ------------------------------------------------------------------

	public function testRunExecutesLegitimateICommand(): void {
		$serialized = \serialize(new DummyICommand());
		$job = new TestableCommandJob();
		$job->runPublic($serialized);
		$this->assertTrue(DummyICommand::$handled, 'ICommand::handle() should have been called');
	}

	// ------------------------------------------------------------------
	// Security: a serialized non-ICommand object must be rejected AND
	// no magic methods (__wakeup / __destruct) may be triggered on it.
	//
	// BEFORE the fix: unserialize() was called unconditionally, so
	// __wakeup() on the gadget fires → $wakeupCalled becomes true → test
	// fails on assertFalse below.
	//
	// AFTER  the fix: the first-pass unserialize uses allowed_classes=>false
	// (no magic methods triggered), the class-name check throws before any
	// real instantiation, so $wakeupCalled stays false.
	// ------------------------------------------------------------------

	public function testMagicMethodsNotTriggeredOnUntrustedPayload(): void {
		$serialized = \serialize(new MaliciousGadget());
		$job = new TestableCommandJob();

		try {
			$job->runPublic($serialized);
			$this->fail('An InvalidArgumentException must be thrown for non-ICommand payloads');
		} catch (\InvalidArgumentException $e) {
			// expected – fall through to the critical assertion below
		}

		// The key security assertion: __wakeup() must NOT have fired, proving
		// that no PHP object injection gadget chain could be triggered.
		$this->assertFalse(
			MaliciousGadget::$wakeupCalled,
			'__wakeup() must not be called on untrusted serialized objects (PHP Object Injection guard)'
		);
	}

	// ------------------------------------------------------------------
	// Security: a plain scalar stored in the argument column must be
	// rejected (not an object at all).
	// ------------------------------------------------------------------

	public function testRunRejectsNonObjectPayload(): void {
		$job = new TestableCommandJob();

		$this->expectException(\InvalidArgumentException::class);
		$job->runPublic(\serialize('just a string'));
	}
}
