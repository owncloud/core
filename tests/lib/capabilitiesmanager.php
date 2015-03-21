<?php
/**
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

use OC\CapabilitiesManager;

class CapabilitiesManagerTest extends TestCase {

	/**
	 * Test no capabilities
	 */
	public function testNoCapabilities() {
		$manager = new \OC\CapabilitiesManager();
		$res = $manager->getCapabilities();
		$this->assertEmpty($res);
	}

	/**
	 * Test a valid capabilitie
	 */
	public function testValidCapability() {
		$manager = new \OC\CapabilitiesManager();
		$simple = new SimpleCapability();

		$manager->registerCapability(function() use ($simple) {
			return $simple;
		});

		$res = $manager->getCapabilities();
		$this->assertEquals($simple->getCapabilities(), $res);
	}

	/**
	 * Test that we need something that implents ICapability
	 */
	public function testNoICapability() {
		$manager = new \OC\CapabilitiesManager();
		$noCap = new NoCapability;

		$manager->registerCapability(function() use ($noCap)  {
			return $noCap;
		});

		$res = $manager->getCapabilities();
		$this->assertEquals([], $res);
	}

	/**
	 * Test a bunch of merged Capabilities
	 */
	public function testMergedCapabilities() {
		$manager = new \OC\CapabilitiesManager();

		$simple1 = new SimpleCapability();
		$simple2 = new SimpleCapability2();
		$simple3 = new SimpleCapability3();

		$manager->registerCapability(function() use ($simple1)  {
			return $simple1;
		});
		$manager->registerCapability(function() use ($simple2)  {
			return $simple2;
		});
		$manager->registerCapability(function() use ($simple3)  {
			return $simple3;
		});

		$res = $manager->getCapabilities();
		$expected = array_merge_recursive($simple1->getCapabilities(),
		                                  $simple2->getCapabilities(),
										  $simple3->getCapabilities());
		$this->assertEquals($expected, $res);
	}
}

class SimpleCapability implements \OCP\Capabilities\ICapability {
	public function getCapabilities() {
		return [
			'foo' => 1
		];
	}
}

class SimpleCapability2 implements \OCP\Capabilities\ICapability {
	public function getCapabilities() {
		return [
			'bar' => ['x' => 1]
		];
	}
}

class SimpleCapability3 implements \OCP\Capabilities\ICapability {
	public function getCapabilities() {
		return [
			'bar' => ['y' => 2]
		];
	}
}

class NoCapability {
	public function getCapabilities() {
		return [
			'baz' => 'z'
		];
	}
}
