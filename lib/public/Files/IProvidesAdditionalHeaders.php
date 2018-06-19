<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace OCP\Files;

/**
 * Interface IProvidesAdditionalHeaders
 * This interface allows to add additional headers to the response
 *
 * @package OCP\Files
 * @since 10.0.9
 */
interface IProvidesAdditionalHeaders {

	/**
	 * Returns an array of headers.
	 *
	 * @return array
	 * @since 10.0.9
	 */
	public function getHeaders();

	/**
	 * Returns the file name which is to be used for the content disposition
	 * @return string
	 * @since 10.0.9
	 */
	public function getContentDispositionFileName();
}
