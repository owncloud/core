<?php

/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Memcache;

use OC\Memcache\Redis;

class RedisTest extends Cache {
	public static function setUpBeforeClass(): void {
		parent::setUpBeforeClass();

		if (!Redis::isAvailable()) {
			self::markTestSkipped('The redis extension is not available.');
		}
		
		try {
			$instance = new Redis(self::getUniqueID());
			$instance->set(self::getUniqueID(), self::getUniqueID());
		} catch (\RedisException $ex) {
			self::markTestSkipped('redis server seems to be down.');
		}
	}

	protected function setUp(): void {
		parent::setUp();
		$this->instance = new Redis(self::getUniqueID());
	}
}
