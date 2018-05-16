<?php
/**
 * Copyright (c) 2017 Sujith Haridasan <sharidasan@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file. */

namespace Test\Events;

use OCP\Events\EventEmitterTrait;
use Symfony\Component\EventDispatcher\GenericEvent;
use Test\TestCase;

/**
 * Class EventEmitterTraitTest
 *
 * @group DB
 *
 * @package Test\Events
 */
class EventEmitterTraitTest extends TestCase {
	use EventEmitterTrait;
	protected function setUp() {
		return parent::setUp();
	}

	public function dummyFunction() {
		return [
			['dummy', 'test', ['before' => ['item1' => 1, 'item2' => 2], 'after' => []]],
			['dummy', 'test', ['before' => [], 'after' => ['item1' => 1, 'item2' => 2]]],
			['dummy', 'test', ['before' => ['item1' => 1, 'item2' => 2], 'after' => ['item1' => 3, 'item2' => 4]]],
			['dummy', 'test', ['before' => [], 'after' => []]],
		];
	}

	/**
	 * @dataProvider dummyFunction
	 */
	public function testEmittingCall($className, $eventName, $data) {
		$calledAfterEvent = [];
		\OC::$server->getEventDispatcher()->addListener("$className.after$eventName", function ($event) use (&$calledAfterEvent, &$className, &$eventName) {
			$calledAfterEvent[] = "$className.after$eventName";
			$calledAfterEvent[] = $event;
		});
		$calledBeforeEvent = [];
		\OC::$server->getEventDispatcher()->addListener("$className.before$eventName", function ($event) use (&$calledBeforeEvent, &$className, &$eventName) {
			$calledBeforeEvent[] = "$className.before$eventName";
			$calledBeforeEvent[] = $event;
		});

		$this->emittingCall(function () {
			return true;
		}, ['before' => $data['before'], 'after' => $data['after']], $className, $eventName);

		if (isset($data['before']) and (\count($data['before']) > 0)) {
			$this->assertEquals($calledBeforeEvent[0], "$className.before$eventName");
			$this->assertArrayHasKey('item1', $calledBeforeEvent[1]);
			$this->assertInstanceOf(GenericEvent::class, $calledBeforeEvent[1]);
		} else {
			$this->assertEquals([], $calledBeforeEvent);
		}

		if (isset($data['after']) and (\count($data['after']))) {
			$this->assertEquals($calledAfterEvent[0], "$className.after$eventName");
			$this->assertArrayHasKey('item1', $calledAfterEvent[1]);
			$this->assertInstanceOf(GenericEvent::class, $calledAfterEvent[1]);
		} else {
			$this->assertEquals([], $calledAfterEvent);
		}
	}

	/**
	 * The test to verify modification in the after array
	 * @dataProvider dummyFunction
	 */
	public function testEmittingCallWithAdditionalArgument($className, $eventName, $data) {
		$calledAfterEvent = [];
		\OC::$server->getEventDispatcher()->addListener("$className.after$eventName", function ($event) use (&$calledAfterEvent, &$className, &$eventName) {
			$calledAfterEvent[] = "$className.after$eventName";
			$calledAfterEvent[] = $event;
		});
		$calledBeforeEvent = [];
		\OC::$server->getEventDispatcher()->addListener("$className.before$eventName", function ($event) use (&$calledBeforeEvent, &$className, &$eventName) {
			$calledBeforeEvent[] = "$className.before$eventName";
			$calledBeforeEvent[] = $event;
		});

		$this->emittingCall(function (&$afterArray) {
			//Update array by creating new key item
			$afterArray['item'] = "testing";
			return true;
		}, ['before' => $data['before'], 'after' => $data['after']], $className, $eventName);

		if (isset($data['after']) and (\count($data['after']))) {
			$this->assertEquals($calledAfterEvent[0], "$className.after$eventName");
			$this->assertArrayHasKey('item1', $calledAfterEvent[1]);
			$this->assertInstanceOf(GenericEvent::class, $calledAfterEvent[1]);
			$this->assertArrayHasKey('item', $calledAfterEvent[1]);
			$this->assertEquals('testing', $calledAfterEvent[1]->getArgument('item'));
		}
	}
}
