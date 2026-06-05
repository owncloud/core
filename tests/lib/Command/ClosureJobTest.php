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

use Laravel\SerializableClosure\SerializableClosure;
use OC\Command\ClosureJob;
use Test\TestCase;

/**
 * Exposes the protected run() method for white-box testing.
 */
class TestableClosureJob extends ClosureJob {
	public function runPublic($argument) {
		return $this->run($argument);
	}
}

/**
 * A class that must NOT be instantiated during unserialize() of a
 * ClosureJob argument.  Its __wakeup() sets a static flag so tests can
 * detect whether the gadget was triggered.
 */
class MaliciousGadget {
	public static $triggered = false;

	public function __wakeup() {
		self::$triggered = true;
	}

	public function __destruct() {
		self::$triggered = true;
	}
}

class ClosureJobTest extends TestCase {
	protected function setUp(): void {
		parent::setUp();
		MaliciousGadget::$triggered = false;
	}

	/**
	 * A legitimately serialized SerializableClosure must still execute
	 * correctly after the fix.
	 */
	public function testLegitimateClosureIsExecuted() {
		$executed = false;
		$closure = function () use (&$executed) {
			$executed = true;
		};
		$serialized = \serialize(new SerializableClosure($closure));

		$job = new TestableClosureJob();
		$job->runPublic($serialized);

		$this->assertTrue($executed, 'The legitimate closure was not executed');
	}

	/**
	 * Security regression test: a serialized payload containing an arbitrary
	 * object (gadget chain) must NOT trigger __wakeup() or __destruct() of
	 * classes that are not on the allowed list.
	 *
	 * Without the fix (bare unserialize()) the gadget's __wakeup() fires and
	 * MaliciousGadget::$triggered becomes true.  With the fix (allowed_classes
	 * restriction) the gadget is deflected to __PHP_Incomplete_Class and
	 * MaliciousGadget::$triggered stays false.
	 */
	public function testMaliciousPayloadDoesNotTriggerGadget() {
		// Build a payload that looks like a serialized ClosureJob argument but
		// actually embeds an arbitrary object.  This mimics the PHPGGC attack
		// vector described in the vulnerability report.
		$gadget = new MaliciousGadget();
		$maliciousPayload = \serialize($gadget);

		$job = new TestableClosureJob();

		// The run() method will throw InvalidArgumentException because the
		// deserialized value is not a valid SerializableClosure; what matters
		// for this test is that the gadget was NOT triggered during unserialize.
		try {
			$job->runPublic($maliciousPayload);
		} catch (\InvalidArgumentException $e) {
			// Expected: the payload does not contain a valid callable.
		} catch (\Error $e) {
			// Also acceptable: method_exists() on __PHP_Incomplete_Class throws
			// an Error in PHP, indicating the object was blocked.
		}

		$this->assertFalse(
			MaliciousGadget::$triggered,
			'Gadget __wakeup()/__destruct() was triggered during unserialize() — ' .
			'the allowed_classes restriction is not working'
		);
	}
}
