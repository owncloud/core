<?php

/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Memcache;

use OCP\IMemcache;
use Test\Cache\TestCache;

abstract class Cache extends TestCache {
	/**
	 * @var IMemcache cache;
	 */
	protected $instance;

	public function testExistsAfterSet(): void {
		$this->assertFalse($this->instance->hasKey('foo'));
		$this->instance->set('foo', 'bar');
		$this->assertTrue($this->instance->hasKey('foo'));
	}

	public function testGetAfterSet(): void {
		$this->assertNull($this->instance->get('foo'));
		$this->instance->set('foo', 'bar');
		$this->assertEquals('bar', $this->instance->get('foo'));
	}

	public function testGetArrayAfterSet(): void {
		$this->assertNull($this->instance->get('foo'));
		$this->instance->set('foo', ['bar']);
		$this->assertEquals(['bar'], $this->instance->get('foo'));
	}

	public function testDoesNotExistAfterRemove(): void {
		$this->instance->set('foo', 'bar');
		$this->instance->remove('foo');
		$this->assertFalse($this->instance->hasKey('foo'));
	}

	public function testRemoveNonExisting(): void {
		$this->instance->remove('foo');
		$this->assertFalse($this->instance->hasKey('foo'));
	}

	public function testArrayAccessSet(): void {
		$this->instance['foo'] = 'bar';
		$this->assertEquals('bar', $this->instance->get('foo'));
	}

	public function testArrayAccessGet(): void {
		$this->instance->set('foo', 'bar');
		$this->assertEquals('bar', $this->instance['foo']);
	}

	public function testArrayAccessExists(): void {
		$this->assertArrayNotHasKey('foo', $this->instance);
		$this->instance->set('foo', 'bar');
		$this->assertArrayHasKey('foo', $this->instance);
	}

	public function testArrayAccessUnset(): void {
		$this->instance->set('foo', 'bar');
		unset($this->instance['foo']);
		$this->assertFalse($this->instance->hasKey('foo'));
	}

	public function testAdd(): void {
		$this->assertTrue($this->instance->add('foo', 'bar'));
		$this->assertEquals('bar', $this->instance->get('foo'));
		$this->assertFalse($this->instance->add('foo', 'asd'));
		$this->assertEquals('bar', $this->instance->get('foo'));
	}

	public function testInc(): void {
		$this->assertEquals(1, $this->instance->inc('foo'));
		$this->assertEquals(1, $this->instance->get('foo'));
		$this->assertEquals(2, $this->instance->inc('foo'));
		$this->assertEquals(2, $this->instance->get('foo'));
		$this->assertEquals(12, $this->instance->inc('foo', 10));
		$this->assertEquals(12, $this->instance->get('foo'));

		$this->instance->set('foo', 'bar');
		$this->assertFalse($this->instance->inc('foo'));
		$this->assertEquals('bar', $this->instance->get('foo'));
	}

	public function testDec(): void {
		$this->assertFalse($this->instance->dec('foo'));
		$this->instance->set('foo', 20);
		$this->assertEquals(19, $this->instance->dec('foo'));
		$this->assertEquals(19, $this->instance->get('foo'));
		$this->assertEquals(9, $this->instance->dec('foo', 10));

		$this->instance->set('foo', 'bar');
		$this->assertFalse($this->instance->dec('foo'));
		$this->assertEquals('bar', $this->instance->get('foo'));
	}

	public function testCasNotChanged(): void {
		$this->instance->set('foo', 'bar');
		$this->assertTrue($this->instance->cas('foo', 'bar', 'asd'));
		$this->assertEquals('asd', $this->instance->get('foo'));
	}

	public function testCasChanged(): void {
		$this->instance->set('foo', 'bar1');
		$this->assertFalse($this->instance->cas('foo', 'bar', 'asd'));
		$this->assertEquals('bar1', $this->instance->get('foo'));
	}

	public function testCadNotChanged(): void {
		$this->instance->set('foo', 'bar');
		$this->assertTrue($this->instance->cad('foo', 'bar'));
		$this->assertFalse($this->instance->hasKey('foo'));
	}

	public function testCadChanged(): void {
		$this->instance->set('foo', 'bar1');
		$this->assertFalse($this->instance->cad('foo', 'bar'));
		$this->assertTrue($this->instance->hasKey('foo'));
	}

	protected function tearDown(): void {
		$this->instance?->clear();

		parent::tearDown();
	}
}
