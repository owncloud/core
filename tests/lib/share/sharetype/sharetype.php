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
	 * Get a share with fake data
	 * @return Share
	 */
	abstract protected function getTestShare();

	/**
	 * Get the same share as getTestShare, but as expected after being shared
	 * @return Share
	 */
	abstract protected function getSharedTestShare();

	/**
	 * Setup four shares with fake data assigned to their respective class property
	 * The fourth share has the third share as a parent (even if it doesn't make sense)
	 */
	abstract protected function setupTestShares();

	protected function tearDown() {
		$this->instance->clear();
	}

	public function testShare() {
		$share = $this->getTestShare();
		$sharedShare = $this->getSharedTestShare();
		$share = $this->instance->share($share);
		$this->assertNotNull($share->getId());
		$this->assertEquals(array(), $share->getUpdatedProperties());
		$sharedShare->setId($share->getId());
		$sharedShare->resetUpdatedProperties();
		$this->assertEquals($sharedShare, $share);
		$this->assertEquals($sharedShare, $this->getShareById($share->getId()));
	}

	public function testShareWithParents() {
		$share = $this->getTestShare();
		$share->setParentIds(array(1, 3));
		$sharedShare = $this->getSharedTestShare();
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
		$share = $this->getTestShare();
		$share = $this->instance->share($share);
		$this->assertEquals($share, $this->getShareById($share->getId()));
		$this->instance->unshare($share);
		$this->assertFalse($this->getShareById($share->getId()));
	}

	public function testUpdate() {
		$share = $this->getTestShare();
		$share = $this->instance->share($share);
		$share->setPermissions(1);
		$this->instance->update($share);
		$share->resetUpdatedProperties();
		$this->assertEquals($share, $this->getShareById($share->getId()));
	}

	public function testUpdateTwoProperties() {
		$share = $this->getTestShare();
		$share = $this->instance->share($share);
		$share->setPermissions(21);
		$share->setExpirationTime(1370884027);
		$this->instance->update($share);
		$share->resetUpdatedProperties();
		$this->assertEquals($share, $this->getShareById($share->getId()));
	}

	public function testSetParentIds() {
		$share = $this->getTestShare();
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
	 * @return Share|bool
	 */
	protected function getShareById($id) {
		$share = $this->instance->getShares(array('id' => $id), 1, null);
		if (is_array($share) && count($share) === 1) {
			return reset($share);
		}
		return false;
	}

}