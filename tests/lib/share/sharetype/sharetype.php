<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @copyright 2013 Michael Gapczynski mtgap@owncloud.com
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

namespace Test\Share\ShareType;

abstract class ShareType extends \PHPUnit_Framework_TestCase {

	protected $instance;
	protected $share1;
	protected $share2;
	protected $share3;
	protected $share4;

	/**
	 * Get a share with fake data, it will be passed into the share method
	 * @param int $version 1-4 Return a unique share for each version number
	 * @return \OC\Share\Share
	 */
	abstract protected function getTestShare($version);

	/**
	 * Get the same share as getTestShare, but as expected after being shared
	 * @param int $version 1-4 Return a unique share for each version number
	 * @return \OC\Share\Share
	 */
	abstract protected function getSharedTestShare($version);

	/**
	 * Setup four shares with fake data
	 */
	protected function setupTestShares() {
		$shares = array();
		for ($i = 1; $i < 5; $i++) {
			$share = $this->getTestShare($i);
			$share = $this->instance->share($share);
			$sharedShare = $this->getSharedTestShare($i);
			$sharedShare->setId($share->getId());
			$sharedShare->resetUpdatedProperties();
			$this->assertEquals($sharedShare, $share);
			$shares[] = $share;
		}
		list($this->share1, $this->share2, $this->share3, $this->share4) = $shares;
	}

	protected function tearDown() {
		$this->instance->clear();
	}

	public function testShare() {
		$share = $this->getTestShare(1);
		$sharedShare = $this->getSharedTestShare(1);
		$share = $this->instance->share($share);
		$this->assertNotNull($share->getId());
		$this->assertEquals(array(), $share->getUpdatedProperties());
		$sharedShare->setId($share->getId());
		$sharedShare->resetUpdatedProperties();
		$this->assertEquals($sharedShare, $share);
		$this->assertEquals($sharedShare, $this->getShareById($share->getId()));
	}

	public function testShareWithParents() {
		$share = $this->getTestShare(2);
		$share->setParentIds(array(1, 3));
		$sharedShare = $this->getSharedTestShare(2);
		$share = $this->instance->share($share);
		$this->assertNotNull($share->getId());
		$this->assertEquals(array(), $share->getUpdatedProperties());
		$sharedShare->setId($share->getId());
		$sharedShare->setParentIds(array(1, 3));
		$sharedShare->resetUpdatedProperties();
		$this->assertEquals($sharedShare, $share);
		$this->assertEquals($sharedShare, $this->getShareById($share->getId()));
	}

	public function testUnshare() {
		$share = $this->getTestShare(3);
		$share = $this->instance->share($share);
		$this->assertEquals($share, $this->getShareById($share->getId()));
		$this->instance->unshare($share);
		$this->assertFalse($this->getShareById($share->getId()));
	}

	public function testUpdate() {
		$share = $this->getTestShare(4);
		$share = $this->instance->share($share);
		$share->setPermissions(1);
		$this->instance->update($share);
		$share->resetUpdatedProperties();
		$this->assertEquals($share, $this->getShareById($share->getId()));
	}

	public function testUpdateTwoProperties() {
		$share = $this->getTestShare(2);
		$share = $this->instance->share($share);
		$share->setPermissions(21);
		$share->setExpirationTime(1370884027);
		$this->instance->update($share);
		$share->resetUpdatedProperties();
		$this->assertEquals($share, $this->getShareById($share->getId()));
	}

	public function testSetParentIds() {
		$share = $this->getTestShare(1);
		$share->setParentIds(array(1, 2));
		$share = $this->instance->share($share);
		$share->setParentIds(array(2, 3, 4));
		$this->instance->setParentIds($share);
		$share->resetUpdatedProperties();
		$this->assertEquals($share, $this->getShareById($share->getId()));
	}

	public function testGetShares() {
		$this->setupTestShares();
		$shares = $this->instance->getShares(array(), null, null);
		$this->assertCount(4, $shares);
		$this->assertContains($this->share1, $shares, '', false, false);
		$this->assertContains($this->share2, $shares, '', false, false);
		$this->assertContains($this->share3, $shares, '', false, false);
		$this->assertContains($this->share4, $shares, '', false, false);
	}

	public function testGetSharesWithLimitOffset() {
		$this->setupTestShares();
		$shares = $this->instance->getShares(array(), 3, 1);
		$this->assertCount(3, $shares);
		$this->assertContains($this->share2, $shares, '', false, false);
		$this->assertContains($this->share3, $shares, '', false, false);
		$this->assertContains($this->share4, $shares, '', false, false);
	}

	public function testGetSharesWithParentId() {
		$this->setupTestShares();
		$this->share4->addParentId($this->share3->getId());
		$this->instance->setParentIds($this->share4);
		$this->share4->resetUpdatedProperties();
		$filter = array(
			'parentId' => $this->share3->getId(),
		);
		$shares = $this->instance->getShares($filter, null, null);
		$this->assertCount(1, $shares);
		$this->assertContains($this->share4, $shares, '', false, false);
	}

	/**
	 * Get a share from the share type based on id
	 * @param int $id
	 * @return \OC\Share\Share | bool
	 */
	protected function getShareById($id) {
		$share = $this->instance->getShares(array('id' => $id), 1, null);
		if (is_array($share) && count($share) === 1) {
			return reset($share);
		}
		return false;
	}

}