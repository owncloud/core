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

namespace OC\Share;

class RequestQueue implements \OCP\Share\IRequestQueue {

	/** @var \OC\DB\Connection */
	protected $connection;

	/**
	 *
	 * @param \OCP\IDBConnection $connection
	 */
	public function __construct(\OCP\IDBConnection $connection) {
		$this->connection = $connection;
	}

	/**
	 * add post request to message queue
	 *
	 * @param string $url
	 * @param array $data
	 * @param string $uid
	 * @return boolean
	 */
	public function addToRequestQueue($url, array $data, $uid) {
		list($protocol, $url) = $this->splitProtocol($url);
		$query = $this->connection->createQueryBuilder();
		$query->insert('`*PREFIX*share_mq`')
			->values(array(
				'`url`' => $query->expr()->literal($url),
				'`data`' => $query->expr()->literal(json_encode($data)),
				'`protocol`' => $query->expr()->literal($protocol),
				'`uid`' => $query->expr()->literal($uid)));

		$result = $query->execute();
		return $result === 1 ? true : false;
	}

	/**
	 * update numnber of tries for the request
	 *
	 * @param array $request
	 */
	public function updateRequest(array $request) {
		$tries = (int) $request['tries'] + 1;
		$query = $this->connection->createQueryBuilder();
		$query->update('`*PREFIX*share_mq`')
			->set('`tries`', $tries)
			->where($query->expr()->eq('`id`', $request['id']));
		$query->execute();
	}

	/**
	 * remove request from queue
	 *
	 * @param array $request
	 */
	public function removeRequest(array $request) {
		$query = $this->connection->createQueryBuilder();
		$query->delete('`*PREFIX*share_mq`')
			->where($query->expr()->eq('`id`', $request['id']));
		$query->execute();
	}

	/**
	 * select request we want to execute
	 *
	 * @param int $limit
	 * @return array
	 */
	public function getRequests($limit = 0) {
		$query = $this->connection->createQueryBuilder();
		$query->select('*')
			->from('`*PREFIX*share_mq`')
			->orderBy('`tries`', 'ASC');

		if ($limit !== 0) {
			$query->setMaxResults($limit);
		}

		$result = $query->execute();
		return $result->fetchAll();
	}

	/**
	 * split protocol from URL
	 *
	 * @param string $url
	 * @return array with protcol, and rest of the URL
	 */
	protected function splitProtocol($url) {
		if (strpos($url, 'https://') === 0) {
			$protocol = 'https://';
		} elseif (strpos($url, 'http://') === 0) {
			$protocol = 'http://';
		} else {
			$protocol = '';
		}

		$url = substr($url, strlen($protocol));

		return array($protocol, $url);
	}

}
