<?php
/**
 * Copyright (c) 2012 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

$this->create('download', 'download')
	->requirements(array('dir' => '.*','files' => '.*'))
	->actionInclude('files/ajax/download.php');

$this->create('files_browse', 'browse')
	->requirements(array('dir' => '.*'))
	->actionInclude('files/index.php');
