<?php

/**
 * ownCloud
 *
 * @copyright (C) 2015 ownCloud, Inc.
 *
 * @author Bjoern Schiessle <schiessle@owncloud.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */



namespace OCP\Share;

interface IRequestQueue {

	/**
	 * add post request to message queue
	 *
	 * @param string $url
	 * @param array $data
	 * @param string $uid
	 * @return boolean
	 */
	public function addToRequestQueue($url, array $data, $uid);

	/**
	 * update request in mq, either increase the number of 'tries' or remove it
	 * if the max. number of 'tries' is reached
	 *
	 * @param array $request
	 */
	public function updateRequest(array $request);

	/**
	 * remove request from queue
	 *
	 * @param array $request
	 */
	public function removeRequest(array $request);

	/**
	 * select request we want to execute
	 *
	 * @param int $limit
	 * @return array
	 */
	public function getRequests($limit = 0);
}

