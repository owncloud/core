<?php
/**
 * Copyright (c) 2014 Thomas Müller <deepdiver@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 *
 */

namespace OC\Connector\Sabre\Exception;

/**
 * Unsupported Media Type
 *
 * This exception is thrown whenever a user tries to upload a file which holds content which is not allowed
 *
 */
class UnsupportedMediaType extends \Sabre\DAV\Exception {

	/**
	 * Returns the HTTP status code for this exception
	 *
	 * @return int
	 */
	public function getHTTPCode() {

		return 415;

	}

}
