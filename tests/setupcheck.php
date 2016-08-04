#!/usr/bin/env php
<?php
/**
 * Copyright (c) 2015 Lukas Reschke <lukas@ownclod.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

if(version_compare(phpversion(), '5.6.0', '>=') &&
	ini_get('always_populate_raw_post_data') !== '-1') {
	echo("ERROR: 'always_populate_raw_post_data' has to be set to '-1' in your php.ini\n");
}
