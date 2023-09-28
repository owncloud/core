<?php

/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Memcache;

use OC\Memcache\APCu;

class APCuTest extends Cache {
	protected function setUp(): void {
		parent::setUp();

		if (!APCu::isAvailable()) {
			$this->markTestSkipped('The APCu extension is not available.');
		}
		$this->instance=new APCu(self::getUniqueID());
	}
}
