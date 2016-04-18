<?php

/**
 * Copyright (c) 2016 Robin McCorkell <robin@mccorkell.me.uk>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Memcache;

class RedisCluster extends Cache {
	static public function setUpBeforeClass() {
		parent::setUpBeforeClass();

		if (!\OC\Memcache\RedisCluster::isAvailable()) {
			self::markTestSkipped('The redis extension is not available.');
		}

		set_error_handler(
			function($errno, $errstr) {
				restore_error_handler();
				self::markTestSkipped($errstr);
			},
			E_WARNING
		);
		try {
			$instance = new \OC\Memcache\RedisCluster(self::getUniqueID());
		} catch (\OC\HintException $e) {
			self::markTestSkipped('Cluster definition not available in config.php');
		}
		restore_error_handler();

		if ($instance->set(self::getUniqueID(), self::getUniqueID()) === false) {
			self::markTestSkipped('redis server seems to be down.');
		}
	}

	protected function setUp() {
		parent::setUp();
		$this->instance = new \OC\Memcache\RedisCluster($this->getUniqueID());
	}
}
