<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

namespace OCP;

/**
 * Class UserTokenException
 *
 * @package OCP
 * @since 10.0.10
 */
class UserTokenException extends \Exception {
	/**
	 * UserTokenException constructor.
	 *
	 * @param string $message
	 * @param $code
	 * @param \Exception|null $previous
	 * @since 10.0.10
	 */
	public function __construct($message = "", $code, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}
}
