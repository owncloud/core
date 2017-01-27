<?php
/**
 * @author Ilja Neumann <ineumann@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH.
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
namespace OC\Files\Stream\Filter;

class Sha1 extends \php_user_filter {

	/** @var  resource */
	private $ctx;

	/**
	 * @return bool
	 */
	function onCreate () {
		$this->ctx = hash_init('sha1');
		return true;
	}

	/**
	 * @return bool
	 */
	function onClose () {
		$hash = hash_final($this->ctx);
		// Debug
		file_put_contents(
			'/tmp/hashtest.txt', $this->params['path'] . ' --> ' . $hash . PHP_EOL,
			FILE_APPEND
		);

		call_user_func_array(
			$this->params['callback'],
			[$this->params['path'], $hash]
		);

		return true;
	}

	/**
	 * @param resource $in
	 * @param resource $out
	 * @param int $consumed
	 * @param bool $closing
	 * @return int
	 */
	function filter ($in, $out, &$consumed, $closing) {
		while ($bucket = stream_bucket_make_writeable($in)) {
			hash_update($this->ctx, $bucket->data);
			$consumed += $bucket->datalen;
			stream_bucket_append($out, $bucket);
		}

		return PSFS_PASS_ON;
	}
}