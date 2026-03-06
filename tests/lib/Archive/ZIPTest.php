<?php
/**
 * Copyright (c) 2012 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Archive;

use OC\Archive\ZIP;

class ZIPTest extends TestBase {
	protected function getExisting() {
		return new ZIP($this->getArchiveTestDataDir() . '/data.zip');
	}

	protected function getNew() {
		return new ZIP(\OCP\Files::tmpFile('.zip'));
	}
}
