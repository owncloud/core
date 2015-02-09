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

class RequestQueueTest extends \Test\TestCase {

	/** @var \OCP\Share\IRequestQueue */
	protected $requestQueue;

	protected function setUp() {
		parent::setUp();
		$this->requestQueue = new \OC\Share\RequestQueue(\OC::$server->getDatabaseConnection());
		for ($i = 0; $i < 10; $i++) {
			$this->assertTrue(
				$this->populateShareQueue('www.owncloud.org', array('token' => $i), 'user1', 'https://', $i % 6)
			);
		}
	}

	protected function tearDown() {
		$query = \OCP\DB::prepare('DELETE FROM `*PREFIX*share_mq`');
		$query->execute();
		parent::tearDown();
	}

	public function testGetRequests() {
		$all = $this->requestQueue->getRequests();
		$this->assertSame(10, count($all));

		// We expect the 5 open request with the lowest number of tries
		// in this case 2x 0tries; 2*1tries; 1*2tries
		$first5 = $this->requestQueue->getRequests(5);
		$this->assertSame(5, count($first5));
		foreach ($first5 as $r) {
			$this->assertTrue((int) $r['tries'] <= 2);
		}
	}

	public function testAddToRequestQueue() {
		$this->assertTrue(
			$this->requestQueue->addToRequestQueue('www.owncloud.org', array('foo' => 'bar'), 'user')
		);
	}

	public function testUpdateRequest() {
		$allBeforeUpdate = $this->requestQueue->getRequests();

		// each try should increase 'tries' by one
		$triesBeforeUpdate = (int) $allBeforeUpdate[0]['tries'];
		$updatedId = $allBeforeUpdate[0]['id'];
		$this->assertSame(0, $triesBeforeUpdate);
		$this->requestQueue->updateRequest($allBeforeUpdate[0]);

		$allAfterUpdate = $this->requestQueue->getRequests();
		$this->assertSame(10, count($allAfterUpdate));

		// verify the updated request
		$updatedRequest = $this->getRequestWithId($allAfterUpdate, $updatedId);
		$this->assertSame($triesBeforeUpdate + 1, (int) $updatedRequest['tries']);

	}

	public function testRemoveRequest() {
		$allBeforeDelete = $this->requestQueue->getRequests();

		// after 5 tries the request should be removed from the queue
		$triesBeforeRemove = (int) $allBeforeDelete[9]['tries'];
		$deletedId = $allBeforeDelete[9]['id'];
		$this->assertSame(5, $triesBeforeRemove);
		$this->requestQueue->removeRequest($allBeforeDelete[9]);

		$allAfterDelete = $this->requestQueue->getRequests();
		$this->assertSame(9, count($allAfterDelete));

		// verify that the right request was deleted
		$deletedRequest = $this->getRequestWithId($allAfterDelete, $deletedId);
		$this->assertNull($deletedRequest);
	}

	/**
	 *
	 * @dataProvider URLDataProvider
	 */
	public function testSplitProtocol($url, $expectedProtocol, $expectedUrl) {
		list($actualProtocol, $actualUrl) = \Test_Helper::invokePrivate($this->requestQueue, 'splitProtocol', array($url));
		$this->assertSame($expectedProtocol, $actualProtocol);
		$this->assertSame($expectedUrl, $actualUrl);
	}

	public function URLDataProvider() {
		return array(
			array('http://www.owncloud.org', 'http://', 'www.owncloud.org'),
			array('https://www.owncloud.org', 'https://', 'www.owncloud.org'),
			array('www.owncloud.org', '', 'www.owncloud.org'),
		);
	}

	protected function getRequestWithId($requests, $id) {
		$result = null;
		foreach ($requests as $r) {
			if ($r['id'] === $id) {
				$result = $r;
				break;
			}
		}
		return $result;
	}

	protected function populateShareQueue($url, $data, $uid, $protocol, $tries) {
		$statement = 'INSERT INTO `*PREFIX*share_mq` (`url`, `data`, `protocol`, `uid`, `tries`) VALUES(?, ?, ?, ?, ?)';
		$query = \OCP\DB::prepare($statement);
		$result = $query->execute(array($url, json_encode($data), $protocol, $uid, $tries));
		return $result === 1 ? true : false;
	}

}
