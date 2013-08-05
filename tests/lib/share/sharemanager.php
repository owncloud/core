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

namespace Test\Share;

use OC\Share\Share;
use OC\Share\Exception\ShareTypeDoesNotExistException;

class TestShareManager extends \OC\Share\ShareManager {

	public function pAreValidPermissionsForParents(Share $share) {
		return parent::areValidPermissionsForParents($share);
	}

	public function pIsValidExpirationTimeForParents(Share $share) {
		return parent::isValidExpirationTimeForParents($share);
	}

}

abstract class CollectionShareBackend extends \OC\Share\ShareBackend
	implements \OC\Share\ICollectionShareBackend {

}

class ShareManager extends \PHPUnit_Framework_TestCase {

	private $shareBackend;
	private $collectionShareBackend;
	private $shareManager;
	private $areCollectionsEnabled;

	/**
	 * In some of the tests we need to clone shares to mock the share stored in the database and to
	 * confirm that the property was updated correctly
	 */

	protected function setUp() {
		// Found workaround for mocks of abstract classes with concrete functions here:
		// https://github.com/sebastianbergmann/phpunit-mock-objects/issues/95
		$this->shareBackend = $this->getMockBuilder('\OC\Share\ShareBackend')
			->disableOriginalConstructor()
			->setMethods(get_class_methods('\OC\Share\ShareBackend'))
			->getMockForAbstractClass();
		$this->shareBackend->expects($this->any())
			->method('getItemType')
			->will($this->returnValue('test'));
		$this->shareBackend->expects($this->any())
			->method('getItemTypePlural')
			->will($this->returnValue('tests'));
		$this->shareBackend->expects($this->any())
			->method('isValidItem')
			->will($this->returnValue(true));
		$this->areCollectionsEnabled = false;
		$this->collectionShareBackend = $this->getMockBuilder('\Test\Share\CollectionShareBackend')
			->disableOriginalConstructor()
			->setMethods(get_class_methods('\Test\Share\CollectionShareBackend'))
			->getMockForAbstractClass();
		$this->collectionShareBackend->expects($this->any())
			->method('getItemType')
			->will($this->returnValue('testCollection'));
		$this->collectionShareBackend->expects($this->any())
			->method('getItemTypePlural')
			->will($this->returnValue('testCollections'));
		$this->collectionShareBackend->expects($this->any())
			->method('isValidItem')
			->will($this->returnValue(true));
		$this->collectionShareBackend->expects($this->any())
			->method('getChildrenItemTypes')
			->will($this->returnCallback(array($this, 'getChildrenItemTypesMock')));
		$this->shareManager = new TestShareManager();
		$this->shareManager->registerShareBackend($this->shareBackend);
		$this->shareManager->registerShareBackend($this->collectionShareBackend);
	}

	public function getChildrenItemTypesMock() {
		if ($this->areCollectionsEnabled) {
			return array('test');
		} else {
			return array();
		}
	}

	public function testGetShareBackends() {
		$backends = $this->shareManager->getShareBackends();
		$this->assertCount(2, $backends);
		$this->assertArrayHasKey('test', $backends);
		$this->assertEquals($this->shareBackend, $backends['test']);
		$this->assertArrayHasKey('testCollection', $backends);
		$this->assertEquals($this->collectionShareBackend, $backends['testCollection']);
	}

	public function testGetShareBackend() {
		$this->setExpectedException('\OC\Share\Exception\ShareBackendDoesNotExistException',
			'A share backend does not exist for the item type foo'
		);
		$this->shareManager->getShareBackend('foo');
	}

	public function testShareWithOneParent() {
		$resharing = \OC_Appconfig::getValue('core', 'shareapi_allow_resharing', 'yes');
		\OC_Appconfig::setValue('core', 'shareapi_allow_resharing', 'yes');

		$jancborchardt = 'jancborchardt';
		$danimo = 'danimo';
		$dragotin = 'dragotin';
		$item = 1;
		$share = new Share();
		$share->setShareTypeId('user');
		$share->setShareOwner($danimo);
		$share->setShareWith($dragotin);
		$share->setItemType('test');
		$share->setItemSource($item);
		$share->setPermissions(31);
		$share->resetUpdatedProperties();
		$sharedShare = clone $share;
		$sharedShare->setItemOwner($jancborchardt);
		$sharedShare->addParentId(1);
		$parent = new Share();
		$parent->setId(1);
		$parent->setShareTypeId('user');
		$parent->setShareOwner($jancborchardt);
		$parent->setShareWith($danimo);
		$parent->setItemOwner($jancborchardt);
		$parent->setItemType('test');
		$parent->setItemSource($item);
		$parent->setPermissions(31);
		$map = array(
			array(array('shareWith' => $danimo, 'itemSource' => $item), null, null,
				array($parent)
			),
			array(array('id' => 1), 1, null, array($parent)),
			array(array('shareOwner' => $danimo, 'itemSource' => $item), null, null,
				array($share)
			),
		);
		$this->shareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareBackend->expects($this->once())
			->method('share')
			->with($this->equalTo($share))
			->will($this->returnValue($share));
		$share = $this->shareManager->share($share);
		$this->assertEquals($sharedShare, $share);
		\OC_Appconfig::setValue('core', 'shareapi_allow_resharing', $resharing);
	}

	public function testShareWithOneParentAndResharingDisabled() {
		$resharing = \OC_Appconfig::getValue('core', 'shareapi_allow_resharing', 'yes');
		\OC_Appconfig::setValue('core', 'shareapi_allow_resharing', 'no');

		$mtgap = 'MTGap';
		$blizzz = 'Blizzz';
		$schiesbn = 'schiesbn';
		$item = 1;
		$share = new Share();
		$share->setShareTypeId('user');
		$share->setShareOwner($blizzz);
		$share->setShareWith($schiesbn);
		$share->setItemType('test');
		$share->setItemSource($item);
		$share->setPermissions(31);
		$parent = new Share();
		$parent->setId(1);
		$parent->setShareTypeId('user');
		$parent->setShareOwner($mtgap);
		$parent->setShareWith($blizzz);
		$parent->setItemOwner($mtgap);
		$parent->setItemType('test');
		$parent->setItemSource($item);
		$parent->setPermissions(31);
		$map = array(
			array(array('shareWith' => $blizzz, 'itemSource' => $item), null, null,
				array($parent)
			),
		);
		$this->shareBackend->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareBackend->expects($this->never())
			->method('share');
		$this->setExpectedException('\OC\Share\Exception\InvalidShareException',
			'The admin has disabled resharing'
		);
		$this->shareManager->share($share);
		\OC_Appconfig::setValue('core', 'shareapi_allow_resharing', $resharing);
	}

	public function testShareWithOneParentWithoutSharePermission() {
		$resharing = \OC_Appconfig::getValue('core', 'shareapi_allow_resharing', 'yes');
		\OC_Appconfig::setValue('core', 'shareapi_allow_resharing', 'yes');

		$mtgap = 'MTGap';
		$blizzz = 'Blizzz';
		$schiesbn = 'schiesbn';
		$item = 1;
		$share = new Share();
		$share->setShareTypeId('user');
		$share->setShareOwner($blizzz);
		$share->setShareWith($schiesbn);
		$share->setItemType('test');
		$share->setItemSource($item);
		$share->setPermissions(31);
		$parent = new Share();
		$parent->setId(1);
		$parent->setShareTypeId('user');
		$parent->setShareOwner($mtgap);
		$parent->setShareWith($blizzz);
		$parent->setItemOwner($mtgap);
		$parent->setItemType('test');
		$parent->setItemSource($item);
		$parent->setPermissions(15);
		$map = array(
			array(array('shareWith' => $blizzz, 'itemSource' => $item), null, null,
				array($parent)
			),
		);
		$this->shareBackend->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareBackend->expects($this->never())
			->method('share');
		$this->setExpectedException('\OC\Share\Exception\InvalidShareException',
			'The parent shares don\'t allow resharing'
		);
		$this->shareManager->share($share);
		\OC_Appconfig::setValue('core', 'shareapi_allow_resharing', $resharing);
	}

	public function testShareWithOneParentAndReshareBackToOwner() {
		$resharing = \OC_Appconfig::getValue('core', 'shareapi_allow_resharing', 'yes');
		\OC_Appconfig::setValue('core', 'shareapi_allow_resharing', 'yes');

		$danimo = 'danimo';
		$dragotin = 'dragotin';
		$item = 1;
		$share = new Share();
		$share->setShareTypeId('user');
		$share->setShareOwner($danimo);
		$share->setShareWith($dragotin);
		$share->setItemType('test');
		$share->setItemSource($item);
		$share->setPermissions(31);
		$parent = new Share();
		$parent->setId(1);
		$parent->setShareTypeId('user');
		$parent->setShareOwner($dragotin);
		$parent->setShareWith($danimo);
		$parent->setItemOwner($dragotin);
		$parent->setItemType('test');
		$parent->setItemSource($item);
		$parent->setPermissions(31);
		$map = array(
			array(array('shareWith' => $danimo, 'itemSource' => $item), null, null,
				array($parent)
			),
		);
		$this->shareBackend->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->setExpectedException('\OC\Share\Exception\InvalidShareException',
			'The share can\'t reshare back to the share owner'
		);
		$this->shareManager->share($share);
		\OC_Appconfig::setValue('core', 'shareapi_allow_resharing', $resharing);
	}

	public function testShareWithOneParentAndReshareWithSamePeople() {
		$resharing = \OC_Appconfig::getValue('core', 'shareapi_allow_resharing', 'yes');
		\OC_Appconfig::setValue('core', 'shareapi_allow_resharing', 'yes');

		$jancborchardt = 'jancborchardt';
		$danimo = 'danimo';
		$group = 'group';
		$item = 1;
		$share = new Share();
		$share->setShareTypeId('group');
		$share->setShareOwner($danimo);
		$share->setShareWith($group);
		$share->setItemType('test');
		$share->setItemSource($item);
		$share->setPermissions(31);
		$parent = new Share();
		$parent->setId(1);
		$parent->setShareTypeId('group');
		$parent->setShareOwner($jancborchardt);
		$parent->setShareWith($group);
		$parent->setItemOwner($jancborchardt);
		$parent->setItemType('test');
		$parent->setItemSource($item);
		$parent->setPermissions(31);
		$map = array(
			array(array('shareWith' => $danimo, 'itemSource' => $item), null, null,
				array($parent)
			),
		);
		$this->shareBackend->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->setExpectedException('\OC\Share\Exception\InvalidShareException',
			'The parent share has the same share with'
		);
		$this->shareManager->share($share);
		\OC_Appconfig::setValue('core', 'shareapi_allow_resharing', $resharing);
	}

	public function testShareWithTwoParents() {
		$resharing = \OC_Appconfig::getValue('core', 'shareapi_allow_resharing', 'yes');
		\OC_Appconfig::setValue('core', 'shareapi_allow_resharing', 'yes');

		$mtgap = 'MTGap';
		$group = 'group';
		$anybodyelse = 'AnybodyElse';
		$georgehrke = 'georgehrke';
		$item = 1;
		$share = new Share();
		$share->setShareTypeId('user');
		$share->setShareOwner($anybodyelse);
		$share->setShareWith($georgehrke);
		$share->setItemType('test');
		$share->setItemSource($item);
		$share->setPermissions(31);
		$share->resetUpdatedProperties();
		$sharedShare = clone $share;
		$sharedShare->setItemOwner($mtgap);
		$sharedShare->setParentIds(array(1, 2));
		$parent1 = new Share();
		$parent1->setId(1);
		$parent1->setShareTypeId('user');
		$parent1->setShareOwner($mtgap);
		$parent1->setShareWith($anybodyelse);
		$parent1->setItemOwner($mtgap);
		$parent1->setItemType('test');
		$parent1->setItemSource($item);
		$parent1->setPermissions(31);
		$parent2 = new Share();
		$parent2->setId(2);
		$parent2->setShareTypeId('group');
		$parent2->setShareOwner($mtgap);
		$parent2->setShareWith($group);
		$parent2->setItemOwner($mtgap);
		$parent2->setItemType('test');
		$parent2->setItemSource($item);
		$parent2->setPermissions(31);
		$map = array(
			array(array('shareWith' => $anybodyelse, 'itemSource' => $item), null, null,
				array($parent1, $parent2)
			),
			array(array('id' => 1), 1, null, array($parent1)),
			array(array('id' => 2), 1, null, array($parent2)),
			array(array('shareOwner' => $anybodyelse, 'itemSource' => $item), null, null,
				array($share)
			),
		);
		$this->shareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareBackend->expects($this->once())
			->method('share')
			->with($this->equalTo($share))
			->will($this->returnValue($share));
		$this->shareBackend->expects($this->never())
			->method('update');
		$share->resetUpdatedProperties();
		$share = $this->shareManager->share($share);
		$this->assertEquals($sharedShare, $share);
		\OC_Appconfig::setValue('core', 'shareapi_allow_resharing', $resharing);
	}

	public function testShareWithExistingReshares() {
		$resharing = \OC_Appconfig::getValue('core', 'shareapi_allow_resharing', 'yes');
		\OC_Appconfig::setValue('core', 'shareapi_allow_resharing', 'yes');

		$mtgap = 'MTGap';
		$group = 'group';
		$anybodyelse = 'AnybodyElse';
		$georgehrke = 'georgehrke';
		$item = 1;
		$share = new Share();
		$share->setId(3);
		$share->setShareTypeId('user');
		$share->setShareOwner($mtgap);
		$share->setShareWith($anybodyelse);
		$share->setItemType('test');
		$share->setItemSource($item);
		$share->setPermissions(31);
		$share->setExpirationTime(1370884027);
		$share->resetUpdatedProperties();
		$sharedShare = clone $share;
		$sharedShare->setItemOwner($mtgap);
		$duplicate = new Share();
		$duplicate->setId(1);
		$duplicate->setShareTypeId('group');
		$duplicate->setShareOwner($mtgap);
		$duplicate->setShareWith($group);
		$duplicate->setItemOwner($mtgap);
		$duplicate->setItemType('test');
		$duplicate->setItemSource($item);
		$duplicate->setPermissions(31);
		$duplicate->setExpirationTime(1370884026);
		$reshare = new Share();
		$reshare->setId(2);
		$reshare->setShareTypeId('user');
		$reshare->setShareOwner($anybodyelse);
		$reshare->setShareWith($georgehrke);
		$reshare->setItemType('test');
		$reshare->setItemSource($item);
		$reshare->setPermissions(31);
		$reshare->setExpirationTime(1370884026);
		$reshare->addParentId(1);
		$reshare->resetUpdatedProperties();
		$updatedReshare = clone $reshare;
		$updatedReshare->addParentId(3);
		$map = array(
			array(array('shareWith' => $mtgap, 'itemSource' => $item), null, null, array()),
			array(array('shareOwner' => $mtgap, 'itemSource' => $item), null, null,
				array($share, $duplicate)
			),
			array(array('parentId' => 1), null, null, array($reshare)),
			array(array('shareWith' => $anybodyelse, 'itemSource' => $item), null, null,
				array($duplicate, $share)
			),
			array(array('id' => 2, 'shareTypeId' => 'user'), 1, null, array($reshare)),
		);
		$this->shareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareBackend->expects($this->once())
			->method('share')
			->with($this->equalTo($share))
			->will($this->returnValue($share));
		$this->shareBackend->expects($this->once())
			->method('update')
			->with($this->equalTo($reshare));
		$share->resetUpdatedProperties();
		$share = $this->shareManager->share($share);
		$this->assertEquals($sharedShare, $share);
		$this->assertEquals($updatedReshare, $reshare);
		\OC_Appconfig::setValue('core', 'shareapi_allow_resharing', $resharing);
	}

	public function testShareWithOneParentInCollection() {
		$resharing = \OC_Appconfig::getValue('core', 'shareapi_allow_resharing', 'yes');
		\OC_Appconfig::setValue('core', 'shareapi_allow_resharing', 'yes');
		$this->areCollectionsEnabled = true;

		$jancborchardt = 'jancborchardt';
		$danimo = 'danimo';
		$dragotin = 'dragotin';
		$item = 1;
		$collectionItem = 2;
		$share = new Share();
		$share->setShareTypeId('user');
		$share->setShareOwner($danimo);
		$share->setShareWith($dragotin);
		$share->setItemType('test');
		$share->setItemSource($item);
		$share->setPermissions(31);
		$share->resetUpdatedProperties();
		$sharedShare = clone $share;
		$sharedShare->setItemOwner($jancborchardt);
		$sharedShare->addParentId(1);
		$parent = new Share();
		$parent->setId(1);
		$parent->setShareTypeId('user');
		$parent->setShareOwner($jancborchardt);
		$parent->setShareWith($danimo);
		$parent->setItemOwner($jancborchardt);
		$parent->setItemType('testCollection');
		$parent->setItemSource($collectionItem);
		$parent->setPermissions(31);
		$sharesMap = array(
			array(array('shareWith' => $danimo, 'itemSource' => $item), null, null, array()),
			array(array('id' => 1), 1, null, array()),
			array(array('shareOwner' => $danimo, 'itemSource' => $item), null, null,
				array($share)
			),
		);
		$childMap = array(
			array($danimo, $item, array($parent)),
		);
		$collectionMap = array(
			array(array('id' => 1), 1, null, array($parent)),
		);
		$this->shareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($sharesMap));
		$this->collectionShareBackend->expects($this->atLeastOnce())
			->method('searchForChildren')
			->will($this->returnValueMap($childMap));
		$this->collectionShareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($collectionMap));
		$this->shareBackend->expects($this->once())
			->method('share')
			->with($this->equalTo($share))
			->will($this->returnValue($share));
		$share = $this->shareManager->share($share);
		$this->assertEquals($sharedShare, $share);
		\OC_Appconfig::setValue('core', 'shareapi_allow_resharing', $resharing);
	}

	public function testShareCollectionWithExistingReshares() {
		$resharing = \OC_Appconfig::getValue('core', 'shareapi_allow_resharing', 'yes');
		\OC_Appconfig::setValue('core', 'shareapi_allow_resharing', 'yes');
		$this->areCollectionsEnabled = true;

		$mtgap = 'MTGap';
		$group = 'group';
		$anybodyelse = 'AnybodyElse';
		$georgehrke = 'georgehrke';
		$dragotin = 'dragotin';
		$item = 1;
		$collectionItem = 2;
		$share = new Share();
		$share->setId(5);
		$share->setShareTypeId('user');
		$share->setShareOwner($mtgap);
		$share->setShareWith($anybodyelse);
		$share->setItemType('testCollection');
		$share->setItemSource($collectionItem);
		$share->setPermissions(31);
		$share->setExpirationTime(1370884027);
		$share->resetUpdatedProperties();
		$sharedShare = clone $share;
		$sharedShare->setItemOwner($mtgap);
		$duplicate = new Share();
		$duplicate->setId(1);
		$duplicate->setShareTypeId('group');
		$duplicate->setShareOwner($mtgap);
		$duplicate->setShareWith($group);
		$duplicate->setItemOwner($mtgap);
		$duplicate->setItemType('testCollection');
		$duplicate->setItemSource($collectionItem);
		$duplicate->setPermissions(31);
		$duplicate->setExpirationTime(1370884026);
		$reshare1 = new Share();
		$reshare1->setId(2);
		$reshare1->setShareTypeId('user');
		$reshare1->setShareOwner($anybodyelse);
		$reshare1->setShareWith($georgehrke);
		$reshare1->setItemType('test');
		$reshare1->setItemSource($item);
		$reshare1->setPermissions(31);
		$reshare1->setExpirationTime(1370884026);
		$reshare1->addParentId(1);
		$reshare1->resetUpdatedProperties();
		$updatedReshare1 = clone $reshare1;
		$updatedReshare1->addParentId(5);
		$reshare2 = new Share();
		$reshare2->setId(3);
		$reshare2->setShareTypeId('link');
		$reshare2->setShareOwner($anybodyelse);
		$reshare2->setItemType('testCollection');
		$reshare2->setItemSource($collectionItem);
		$reshare2->setPermissions(31);
		$reshare2->setExpirationTime(1370884020);
		$reshare2->addParentId(1);
		$reshare2->resetUpdatedProperties();
		$updatedReshare2 = clone $reshare2;
		$updatedReshare2->addParentId(5);
		$reshare3 = new Share();
		$reshare3->setId(4);
		$reshare3->setShareTypeId('link');
		$reshare3->setShareOwner($dragotin);
		$reshare3->setItemType('testCollection');
		$reshare3->setItemSource($collectionItem);
		$reshare3->setPermissions(31);
		$reshare3->setExpirationTime(1370884020);
		$reshare3->addParentId(1);
		$reshare3->resetUpdatedProperties();
		$updatedReshare3 = clone $reshare3;
		$collectionMap = array(
			array(array('shareWith' => $mtgap, 'itemSource' => $collectionItem), null, null,
				array()
			),
			array(array('shareOwner' => $mtgap, 'itemSource' => $collectionItem), null, null,
				array($share, $duplicate)
			),
			array(array('parentId' => 1), null, null, array($reshare2, $reshare3)),
			array(array('shareWith' => $anybodyelse, 'itemSource' => $collectionItem), null, null,
				array($duplicate, $share)
			),
			array(array('shareWith' => $dragotin, 'itemSource' => $collectionItem), null, null,
				array($duplicate)
			),
			array(array('id' => 3, 'shareTypeId' => 'link'), 1, null, array($reshare2)),
		);
		$sharesMap = array(
			array(array('parentId' => 1), null, null, array($reshare1)),
			array(array('shareWith' => $anybodyelse, 'itemSource' => $item), null, null,
				array()
			),
			array(array('id' => 2, 'shareTypeId' => 'user'), 1, null, array($reshare1)),
		);
		$childMap = array(
			array($anybodyelse, $item, array($duplicate, $share)),
		);
		$this->collectionShareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($collectionMap));
		$this->collectionShareBackend->expects($this->once())
			->method('share')
			->with($this->equalTo($share))
			->will($this->returnValue($share));
		$this->collectionShareBackend->expects($this->atLeastOnce())
			->method('searchForChildren')
			->will($this->returnValueMap($childMap));
		$this->collectionShareBackend->expects($this->once())
			->method('update')
			->with($this->equalTo($reshare2));
		$this->shareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($sharesMap));
		$this->shareBackend->expects($this->once())
			->method('update')
			->with($this->equalTo($reshare1));
		$share = $this->shareManager->share($share);
		$this->assertEquals($sharedShare, $share);
		$this->assertEquals($updatedReshare1, $reshare1);
		$this->assertEquals($updatedReshare2, $reshare2);
		$this->assertEquals($updatedReshare3, $reshare3);
		\OC_Appconfig::setValue('core', 'shareapi_allow_resharing', $resharing);
	}

	public function testUnshareWithReshares() {
		$parent = new Share();
		$parent->setId(1);
		$parent->setShareTypeId('group');
		$parent->setItemType('test');
		$parent->setPermissions(31);
		$reshare1 = new Share();
		$reshare1->setId(2);
		$reshare1->setShareTypeId('user');
		$reshare1->setItemType('test');
		$reshare1->addParentId(1);
		$reshare2 = new Share();
		$reshare2->setId(3);
		$reshare2->setShareTypeId('link');
		$reshare2->setItemType('test');
		$reshare2->addParentId(1);
		$map = array(
			array(array('parentId' => 1), null, null, array($reshare1, $reshare2)),
			array(array('parentId' => 2), null, null, array()),
			array(array('parentId' => 3), null, null, array()),
		);
		$this->shareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareBackend->expects($this->exactly(3))
			->method('unshare');
		$this->shareBackend->expects($this->never())
			->method('update');
		$this->shareManager->unshare($parent);
	}

	public function testUnshareWithResharesAndTwoParents() {
		$parent1 = new Share();
		$parent1->setId(1);
		$parent1->setShareTypeId('user');
		$parent1->setItemType('test');
		$parent1->setPermissions(31);
		$parent1->setExpirationTime(1370884027);
		$parent1->resetUpdatedProperties();
		$parent2 = new Share();
		$parent2->setId(5);
		$parent2->setShareTypeId('group');
		$parent2->setItemType('test');
		$parent2->setPermissions(21);
		$parent2->setExpirationTime(1370884026);
		$parent2->resetUpdatedProperties();
		$updatedParent2 = clone $parent2;
		$reshare1 = new Share();
		$reshare1->setId(2);
		$reshare1->setShareTypeId('link');
		$reshare1->setItemType('test');
		$reshare1->setParentIds(array(1, 5));
		$reshare1->setPermissions(19);
		$reshare1->setExpirationTime(1370884024);
		$reshare1->resetUpdatedProperties();
		$oldReshare1 = clone $reshare1;
		$updatedReshare1 = clone $reshare1;
		$updatedReshare1->setPermissions(17);
		$updatedReshare1->removeParentId(1);
		$reshare2 = new Share();
		$reshare2->setId(3);
		$reshare2->setShareTypeId('group');
		$reshare2->setItemType('test');
		$reshare2->setParentIds(array(1, 5));
		$reshare2->setPermissions(31);
		$reshare2->setExpirationTime(1370884027);
		$reshare2->resetUpdatedProperties();
		$oldReshare2 = clone $reshare2;
		$updatedReshare2 = clone $reshare2;
		$updatedReshare2->setPermissions(21);
		$updatedReshare2->setExpirationTime(1370884026);
		$updatedReshare2->removeParentId(1);
		$map = array(
			array(array('parentId' => 1), null, null, array($reshare1, $reshare2)),
			array(array('id' => 5), 1, null, array($parent2)),
			array(array('id' => 2, 'shareTypeId' => 'link'), 1, null, array($oldReshare1)),
			array(array('id' => 3, 'shareTypeId' => 'group'), 1, null, array($oldReshare2)),
			array(array('parentId' => 2), null, null, array()),
			array(array('parentId' => 3), null, null, array()),
		);
		$this->shareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareBackend->expects($this->exactly(2))
			->method('update');
		$this->shareBackend->expects($this->once())
			->method('unshare')
			->with($this->equalTo($parent1));
		$this->shareManager->unshare($parent1);
		$this->assertEquals($updatedParent2, $parent2);
		$this->assertEquals($updatedReshare1, $reshare1);
		$this->assertEquals($updatedReshare2, $reshare2);
	}

	public function testUnshareWithResharesAndTwoParentsAndOneParentDoesNotExpire() {
		$parent1 = new Share();
		$parent1->setId(1);
		$parent1->setShareTypeId('user');
		$parent1->setItemType('test');
		$parent1->setPermissions(31);
		$parent1->setExpirationTime(null);
		$parent1->resetUpdatedProperties();
		$parent2 = new Share();
		$parent2->setId(5);
		$parent2->setShareTypeId('group');
		$parent2->setItemType('test');
		$parent2->setPermissions(21);
		$parent2->resetUpdatedProperties();
		$parent2->setExpirationTime(1370884027);
		$updatedParent2 = clone $parent2;
		$reshare1 = new Share();
		$reshare1->setId(2);
		$reshare1->setShareTypeId('link');
		$reshare1->setItemType('test');
		$reshare1->setParentIds(array(1, 5));
		$reshare1->setPermissions(19);
		$reshare1->setExpirationTime(1370884024);
		$reshare1->resetUpdatedProperties();
		$oldReshare1 = clone $reshare1;
		$updatedReshare1 = clone $reshare1;
		$updatedReshare1->setPermissions(17);
		$updatedReshare1->removeParentId(1);
		$reshare2 = new Share();
		$reshare2->setId(3);
		$reshare2->setShareTypeId('group');
		$reshare2->setItemType('test');
		$reshare2->setParentIds(array(1, 5));
		$reshare2->setPermissions(31);
		$reshare2->setExpirationTime(null);
		$reshare2->resetUpdatedProperties();
		$oldReshare2 = clone $reshare2;
		$updatedReshare2 = clone $reshare2;
		$updatedReshare2->setPermissions(21);
		$updatedReshare2->setExpirationTime(1370884027);
		$updatedReshare2->removeParentId(1);
		$map = array(
			array(array('parentId' => 1), null, null, array($reshare1, $reshare2)),
			array(array('id' => 5), 1, null, array($parent2)),
			array(array('id' => 2, 'shareTypeId' => 'link'), 1, null, array($oldReshare1)),
			array(array('id' => 3, 'shareTypeId' => 'group'), 1, null, array($oldReshare2)),
			array(array('parentId' => 2), null, null, array()),
			array(array('parentId' => 3), null, null, array()),
		);
		$this->shareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareBackend->expects($this->exactly(2))
			->method('update');
		$this->shareBackend->expects($this->once())
			->method('unshare')
			->with($this->equalTo($parent1));
		$this->shareManager->unshare($parent1);
		$this->assertEquals($updatedParent2, $parent2);
		$this->assertEquals($updatedReshare1, $reshare1);
		$this->assertEquals($updatedReshare2, $reshare2);
	}

	public function testUnshareCollectionWithResharesAndDifferentParents() {
		$this->areCollectionsEnabled = true;
		$item = 1;
		$collectionItem = 2;

		$parent1 = new Share();
		$parent1->setId(1);
		$parent1->setShareTypeId('user');
		$parent1->setItemType('testCollection');
		$parent1->setItemSource($collectionItem);
		$parent1->setPermissions(31);
		$parent1->setExpirationTime(1370884027);
		$parent1->resetUpdatedProperties();
		$parent2 = new Share();
		$parent2->setId(5);
		$parent2->setShareTypeId('group');
		$parent2->setItemType('testCollection');
		$parent2->setItemSource($collectionItem);
		$parent2->setPermissions(21);
		$parent2->setExpirationTime(1370884026);
		$parent2->resetUpdatedProperties();
		$updatedParent2 = clone $parent2;
		$reshare1 = new Share();
		$reshare1->setId(2);
		$reshare1->setShareTypeId('user');
		$reshare1->setItemType('test');
		$reshare1->setItemSource($item);
		$reshare1->setParentIds(array(1, 5));
		$reshare1->setPermissions(19);
		$reshare1->setExpirationTime(1370884024);
		$reshare1->resetUpdatedProperties();
		$oldReshare1 = clone $reshare1;
		$updatedReshare1 = clone $reshare1;
		$updatedReshare1->setPermissions(17);
		$updatedReshare1->removeParentId(1);
		$reshare2 = new Share();
		$reshare2->setId(3);
		$reshare2->setShareTypeId('link');
		$reshare2->setItemType('testCollection');
		$reshare2->setItemSource($collectionItem);
		$reshare2->setParentIds(array(1, 5));
		$reshare2->setPermissions(31);
		$reshare2->setExpirationTime(1370884027);
		$reshare2->resetUpdatedProperties();
		$oldReshare2 = clone $reshare2;
		$updatedReshare2 = clone $reshare2;
		$updatedReshare2->setPermissions(21);
		$updatedReshare2->setExpirationTime(1370884026);
		$updatedReshare2->removeParentId(1);
		$reshare3 = new Share();
		$reshare3->setId(4);
		$reshare3->setShareTypeId('link');
		$reshare3->setItemType('testCollection');
		$reshare3->setItemSource($collectionItem);
		$reshare3->setPermissions(31);
		$reshare3->setExpirationTime(1370884020);
		$reshare3->addParentId(1);
		$reshare3->resetUpdatedProperties();
		$sharesMap = array(
			array(array('parentId' => 1), null, null, array($reshare1)),
			array(array('id' => 5), 1, null, array()),
			array(array('id' => 2, 'shareTypeId' => 'user'), 1, null, array($oldReshare1)),
			array(array('parentId' => 2), null, null, array()),
			array(array('parentId' => 3), null, null, array()),
			array(array('parentId' => 4), null, null, array()),
		);
		$collectionMap = array(
			array(array('parentId' => 1), null, null, array($reshare2, $reshare3)),
			array(array('id' => 5), 1, null, array($parent2)),
			array(array('id' => 3, 'shareTypeId' => 'link'), 1, null, array($oldReshare2)),
			array(array('id' => 4, 'shareTypeId' => 'link'), 1, null, array($reshare3)),
			array(array('parentId' => 3), null, null, array()),
			array(array('parentId' => 4), null, null, array()),
		);
		$this->shareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($sharesMap));
		$this->shareBackend->expects($this->once())
			->method('update');
		$this->collectionShareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($collectionMap));
		$this->collectionShareBackend->expects($this->once())
			->method('update');
		$this->collectionShareBackend->expects($this->exactly(2))
			->method('unshare');
		$this->shareManager->unshare($parent1);
		$this->assertEquals($updatedParent2, $parent2);
		$this->assertEquals($updatedReshare1, $reshare1);
		$this->assertEquals($updatedReshare2, $reshare2);
	}

	public function testUpdateWithShareDoesNotExist() {
		$share = new Share();
		$share->setId(1);
		$share->setShareTypeId('group');
		$share->setItemType('test');
		$share->resetUpdatedProperties();
		$share->setExpirationTime(1370884024);
		$map = array(
			array(array('id' => 1, 'shareTypeId' => 'group'), 1, null, array()),
		);
		$this->shareBackend->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->setExpectedException('\OC\Share\Exception\ShareDoesNotExistException',
			'A share does not exist with the id 1'
		);
		$this->shareManager->update($share);
	}

	public function testUpdateResharesWithOneParent() {
		$parent = new Share();
		$parent->setId(1);
		$parent->setShareTypeId('user');
		$parent->setItemType('test');
		$parent->setPermissions(31);
		$parent->setExpirationTime(null);
		$parent->resetUpdatedProperties();
		$updatedParent = clone $parent;
		$updatedParent->setPermissions(19);
		$updatedParent->setExpirationTime(1370884025);
		$reshare1 = new Share();
		$reshare1->setId(2);
		$reshare1->setShareTypeId('link');
		$reshare1->setItemType('test');
		$reshare1->addParentId(1);
		$reshare1->setPermissions(19);
		$reshare1->setExpirationTime(1370884024);
		$reshare1->resetUpdatedProperties();
		$oldReshare1 = clone $reshare1;
		$updatedReshare1 = clone $reshare1;
		$reshare2 = new Share();
		$reshare2->setId(3);
		$reshare2->setShareTypeId('group');
		$reshare2->setItemType('test');
		$reshare2->addParentId(1);
		$reshare2->setPermissions(31);
		$reshare2->setExpirationTime(null);
		$reshare2->resetUpdatedProperties();
		$oldReshare2 = clone $reshare2;
		$updatedReshare2 = clone $reshare2;
		$updatedReshare2->setPermissions(19);
		$updatedReshare2->setExpirationTime(1370884025);
		$reshare3 = new Share();
		$reshare3->setId(4);
		$reshare3->setShareTypeId('user');
		$reshare3->setItemType('test');
		$reshare3->addParentId(3);
		$reshare3->setPermissions(15);
		$reshare3->setExpirationTime(1370884026);
		$reshare3->resetUpdatedProperties();
		$oldReshare3 = clone $reshare3;
		$updatedReshare3 = clone $reshare3;
		$updatedReshare3->setPermissions(3);
		$updatedReshare3->setExpirationTime(1370884025);
		$map = array(
			array(array('id' => 1, 'shareTypeId' => 'user'), 1, null, array($parent)),
			array(array('parentId' => 1), null, null, array($reshare1, $reshare2)),
			array(array('id' => 1), 1, null, array($parent)),
			array(array('id' => 2, 'shareTypeId' => 'link'), 1, null, array($oldReshare1)),
			array(array('parentId' => 2), null, null, array()),
			array(array('id' => 3, 'shareTypeId' => 'group'), 1, null, array($oldReshare2)),
			array(array('parentId' => 3), null, null, array($reshare3)),
			array(array('id' => 3), 1, null, array($reshare2)),
			array(array('id' => 4, 'shareTypeId' => 'user'), 1, null, array($oldReshare3)),
			array(array('parentId' => 4), null, null, array()),
		);
		$this->shareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareBackend->expects($this->exactly(3))
			->method('update');
		$this->shareManager->update($updatedParent);
		$this->assertEquals($updatedReshare1, $reshare1);
		$this->assertEquals($updatedReshare2, $reshare2);
		$this->assertEquals($updatedReshare3, $reshare3);
	}

	public function testUpdateResharesWithOneParentAndSharePermissionRemoved() {
		$parent = new Share();
		$parent->setId(1);
		$parent->setShareTypeId('user');
		$parent->setItemType('test');
		$parent->setPermissions(31);
		$parent->resetUpdatedProperties();
		$updatedParent = clone $parent;
		$updatedParent->setPermissions(15);
		$reshare1 = new Share();
		$reshare1->setId(2);
		$reshare1->setShareTypeId('link');
		$reshare1->setItemType('test');
		$reshare1->addParentId(1);
		$reshare1->setPermissions(19);
		$reshare1->resetUpdatedProperties();
		$reshare2 = new Share();
		$reshare2->setId(3);
		$reshare2->setShareTypeId('group');
		$reshare2->setItemType('test');
		$reshare2->addParentId(1);
		$reshare2->setPermissions(31);
		$reshare2->resetUpdatedProperties();
		$reshare3 = new Share();
		$reshare3->setId(4);
		$reshare3->setShareTypeId('user');
		$reshare3->setItemType('test');
		$reshare3->addParentId(3);
		$reshare3->setPermissions(15);
		$reshare3->resetUpdatedProperties();
		$map = array(
			array(array('id' => 1, 'shareTypeId' => 'user'), 1, null, array($parent)),
			array(array('parentId' => 1), null, null, array($reshare1, $reshare2)),
			array(array('id' => 1), 1, null, array($parent)),
			array(array('id' => 2, 'shareTypeId' => 'link'), 1, null, array($reshare1)),
			array(array('parentId' => 2), null, null, array()),
			array(array('id' => 3, 'shareTypeId' => 'group'), 1, null, array($reshare2)),
			array(array('parentId' => 3), null, null, array($reshare3)),
			array(array('id' => 3), 1, null, array($reshare2)),
			array(array('id' => 4, 'shareTypeId' => 'user'), 1, null, array($reshare3)),
			array(array('parentId' => 4), null, null, array()),
		);
		$this->shareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareBackend->expects($this->once())
			->method('update');
		$this->shareBackend->expects($this->exactly(3))
			->method('unshare');
		$this->shareManager->update($updatedParent);
	}

	public function testUpdateResharesWithTwoParents() {
		$parent1 = new Share();
		$parent1->setId(1);
		$parent1->setShareTypeId('user');
		$parent1->setItemType('test');
		$parent1->setPermissions(31);
		$parent1->setExpirationTime(1370884027);
		$parent1->resetUpdatedProperties();
		$updatedParent1 = clone $parent1;
		$updatedParent1->setPermissions(19);
		$updatedParent1->setExpirationTime(1370884025);
		$parent2 = new Share();
		$parent2->setId(5);
		$parent2->setShareTypeId('group');
		$parent2->setItemType('test');
		$parent2->setPermissions(21);
		$parent2->setExpirationTime(1370884026);
		$parent2->resetUpdatedProperties();
		$updatedParent2 = clone $parent2;
		$reshare1 = new Share();
		$reshare1->setId(2);
		$reshare1->setShareTypeId('link');
		$reshare1->setItemType('test');
		$reshare1->setParentIds(array(1, 5));
		$reshare1->setPermissions(19);
		$reshare1->setExpirationTime(1370884024);
		$reshare1->resetUpdatedProperties();
		$oldReshare1 = clone $reshare1;
		$updatedReshare1 = clone $reshare1;
		$reshare2 = new Share();
		$reshare2->setId(3);
		$reshare2->setShareTypeId('group');
		$reshare2->setItemType('test');
		$reshare2->setParentIds(array(1, 5));
		$reshare2->setPermissions(31);
		$reshare2->setExpirationTime(1370884027);
		$reshare2->resetUpdatedProperties();
		$oldReshare2 = clone $reshare2;
		$updatedReshare2 = clone $reshare2;
		$updatedReshare2->setPermissions(23);
		$updatedReshare2->setExpirationTime(1370884026);
		$reshare3 = new Share();
		$reshare3->setId(4);
		$reshare3->setShareTypeId('user');
		$reshare3->setItemType('test');
		$reshare3->addParentId(3);
		$reshare3->setPermissions(15);
		$reshare3->setExpirationTime(1370884026);
		$reshare3->resetUpdatedProperties();
		$oldReshare3 = clone $reshare3;
		$updatedReshare3 = clone $reshare3;
		$updatedReshare3->setPermissions(7);
		$map = array(
			array(array('id' => 1, 'shareTypeId' => 'user'), 1, null, array($parent1)),
			array(array('parentId' => 1), null, null, array($reshare1, $reshare2)),
			array(array('id' => 1), 1, null, array($updatedParent1)),
			array(array('id' => 5), 1, null, array($parent2)),
			array(array('id' => 2, 'shareTypeId' => 'link'), 1, null, array($oldReshare1)),
			array(array('parentId' => 2), null, null, array()),
			array(array('id' => 3, 'shareTypeId' => 'group'), 1, null, array($oldReshare2)),
			array(array('parentId' => 3), null, null, array($reshare3)),
			array(array('id' => 3), 1, null, array($reshare2)),
			array(array('id' => 4, 'shareTypeId' => 'user'), 1, null, array($oldReshare3)),
			array(array('parentId' => 4), null, null, array()),
		);
		$this->shareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareBackend->expects($this->exactly(3))
			->method('update');
		$this->shareManager->update($updatedParent1);
		$this->assertEquals($updatedParent2, $parent2);
		$this->assertEquals($updatedReshare1, $reshare1);
		$this->assertEquals($updatedReshare2, $reshare2);
		$this->assertEquals($updatedReshare3, $reshare3);
	}

	public function testUpdateResharesWithTwoParentsAndSharePermissionRemoved() {
		$parent1 = new Share();
		$parent1->setId(1);
		$parent1->setShareTypeId('user');
		$parent1->setItemType('test');
		$parent1->setPermissions(31);
		$parent1->setExpirationTime(1370884027);
		$parent1->resetUpdatedProperties();
		$updatedParent1 = clone $parent1;
		$updatedParent1->setPermissions(3);
		$parent2 = new Share();
		$parent2->setId(5);
		$parent2->setShareTypeId('group');
		$parent2->setItemType('test');
		$parent2->setPermissions(21);
		$parent2->setExpirationTime(1370884026);
		$parent2->resetUpdatedProperties();
		$updatedParent2 = clone $parent2;
		$reshare1 = new Share();
		$reshare1->setId(2);
		$reshare1->setShareTypeId('link');
		$reshare1->setItemType('test');
		$reshare1->setParentIds(array(1, 5));
		$reshare1->setPermissions(19);
		$reshare1->setExpirationTime(1370884024);
		$reshare1->resetUpdatedProperties();
		$oldReshare1 = clone $reshare1;
		$updatedReshare1 = clone $reshare1;
		$updatedReshare1->setPermissions(17);
		$updatedReshare1->removeParentId(1);
		$reshare2 = new Share();
		$reshare2->setId(3);
		$reshare2->setShareTypeId('group');
		$reshare2->setItemType('test');
		$reshare2->setParentIds(array(1, 5));
		$reshare2->setPermissions(31);
		$reshare2->setExpirationTime(1370884027);
		$reshare2->resetUpdatedProperties();
		$oldReshare2 = clone $reshare2;
		$updatedReshare2 = clone $reshare2;
		$updatedReshare2->setPermissions(21);
		$updatedReshare2->setExpirationTime(1370884026);
		$updatedReshare2->removeParentId(1);
		$reshare3 = new Share();
		$reshare3->setId(4);
		$reshare3->setShareTypeId('user');
		$reshare3->setItemType('test');
		$reshare3->addParentId(3);
		$reshare3->setPermissions(15);
		$reshare3->setExpirationTime(1370884027);
		$reshare3->resetUpdatedProperties();
		$oldReshare3 = clone $reshare3;
		$updatedReshare3 = clone $reshare3;
		$updatedReshare3->setPermissions(5);
		$updatedReshare3->setExpirationTime(1370884026);
		$map = array(
			array(array('id' => 1, 'shareTypeId' => 'user'), 1, null, array($parent1)),
			array(array('parentId' => 1), null, null, array($reshare1, $reshare2)),
			array(array('id' => 1), 1, null, array($updatedParent1)),
			array(array('id' => 5), 1, null, array($updatedParent2)),
			array(array('id' => 2, 'shareTypeId' => 'link'), 1, null, array($oldReshare1)),
			array(array('parentId' => 2), null, null, array()),
			array(array('id' => 3, 'shareTypeId' => 'group'), 1, null, array($oldReshare2)),
			array(array('parentId' => 3), null, null, array($reshare3)),
			array(array('id' => 3), 1, null, array($updatedReshare2)),
			array(array('id' => 4, 'shareTypeId' => 'user'), 1, null, array($oldReshare3)),
			array(array('parentId' => 4), null, null, array()),
		);
		$this->shareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareBackend->expects($this->exactly(4))
			->method('update');
		$this->shareManager->update($updatedParent1);
		$this->assertEquals($updatedParent2, $parent2);
		$this->assertEquals($updatedReshare1, $reshare1);
		$this->assertEquals($updatedReshare2, $reshare2);
		$this->assertEquals($updatedReshare3, $reshare3);
	}

	public function testUpdateResharesWithSharePermissionAdded() {
		$tanghus = 'tanghus';
		$DeepDiver = 'DeepDiver';
		$tpn = 'tpn';
		$zimba12 = 'zimba12';
		$group1 = 'group1';
		$group2 = 'group2';
		$item = 1;
		$parent1 = new Share();
		$parent1->setId(1);
		$parent1->setShareTypeId('user');
		$parent1->setShareOwner($tanghus);
		$parent1->setShareWith($DeepDiver);
		$parent1->setItemType('test');
		$parent1->setItemSource($item);
		$parent1->setPermissions(15);
		$parent1->setExpirationTime(null);
		$parent1->resetUpdatedProperties();
		$updatedParent1 = clone $parent1;
		$updatedParent1->setPermissions(31);
		$parent2 = new Share();
		$parent2->setId(5);
		$parent2->setShareTypeId('group');
		$parent2->setShareOwner($tanghus);
		$parent2->setShareWith($group1);
		$parent2->setItemType('test');
		$parent2->setItemSource($item);
		$parent2->setPermissions(21);
		$parent2->setExpirationTime(1370884020);
		$parent2->resetUpdatedProperties();
		$updatedParent2 = clone $parent2;
		$reshare1 = new Share();
		$reshare1->setId(2);
		$reshare1->setShareTypeId('link');
		$reshare1->setShareOwner($DeepDiver);
		$reshare1->setItemType('test');
		$reshare1->setItemSource($item);
		$reshare1->addParentId(5);
		$reshare1->setPermissions(17);
		$reshare1->setExpirationTime(1370884019);
		$reshare1->resetUpdatedProperties();
		$updatedReshare1 = clone $reshare1;
		$updatedReshare1->addParentId(1);
		$reshare2 = new Share();
		$reshare2->setId(3);
		$reshare2->setShareTypeId('group');
		$reshare2->setShareOwner($DeepDiver);
		$reshare2->setShareWith($group2);
		$reshare2->setItemType('test');
		$reshare2->setItemSource($item);
		$reshare2->addParentId(5);
		$reshare2->setPermissions(21);
		$reshare2->setExpirationTime(1370884020);
		$reshare2->resetUpdatedProperties();
		$updatedReshare2 = clone $reshare2;
		$updatedReshare2->addParentId(1);
		$reshare3 = new Share();
		$reshare3->setId(4);
		$reshare3->setShareTypeId('user');
		$reshare3->setShareOwner($tpn);
		$reshare3->setShareWith($zimba12);
		$reshare3->setItemType('test');
		$reshare3->setItemSource($item);
		$reshare3->addParentId(3);
		$reshare3->setPermissions(5);
		$reshare3->setExpirationTime(1370884020);
		$reshare3->resetUpdatedProperties();
		$updatedReshare3 = clone $reshare3;
		$map = array(
			array(array('id' => 1, 'shareTypeId' => 'user'), 1, null, array($parent1)),
			array(array('shareOwner' => $tanghus, 'itemSource' => $item), null, null, 
				array($parent1, $parent2)
			),
			array(array('parentId' => 5), null, null, array($reshare1, $reshare2)),
			array(array('shareWith' => $DeepDiver, 'itemSource' => $item), null, null,
				array($parent1, $parent2)
			),
			array(array('id' => 2, 'shareTypeId' => 'link'), 1, null, array($reshare1)),
			array(array('id' => 3, 'shareTypeId' => 'group'), 1, null, array($reshare2)),
		);
		$this->shareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareBackend->expects($this->exactly(3))
			->method('update');
		$this->shareManager->update($updatedParent1);
		$this->assertEquals($updatedParent2, $parent2);
		$this->assertEquals($updatedReshare1, $reshare1);
		$this->assertEquals($updatedReshare2, $reshare2);
		$this->assertEquals($updatedReshare3, $reshare3);
	}

	public function testUpdateResharesTwoParentsAndOneParentDoesNotExpire() {
		$parent1 = new Share();
		$parent1->setId(1);
		$parent1->setShareTypeId('user');
		$parent1->setItemType('test');
		$parent1->setPermissions(31);
		$parent1->setExpirationTime(1370884027);
		$parent1->resetUpdatedProperties();
		$updatedParent1 = clone $parent1;
		$updatedParent1->setExpirationTime(1370884025);
		$parent2 = new Share();
		$parent2->setId(5);
		$parent2->setShareTypeId('group');
		$parent2->setItemType('test');
		$parent2->setPermissions(21);
		$parent2->setExpirationTime(null);
		$updatedParent2 = clone $parent2;
		$reshare1 = new Share();
		$reshare1->setId(2);
		$reshare1->setShareTypeId('link');
		$reshare1->setItemType('test');
		$reshare1->setParentIds(array(1, 5));
		$reshare1->setPermissions(19);
		$reshare1->setExpirationTime(1370884024);
		$reshare1->resetUpdatedProperties();
		$updatedReshare1 = clone $reshare1;
		$reshare2 = new Share();
		$reshare2->setId(3);
		$reshare2->setShareTypeId('group');
		$reshare2->setItemType('test');
		$reshare2->setParentIds(array(1, 5));
		$reshare2->setPermissions(31);
		$reshare2->setExpirationTime(null);
		$reshare2->resetUpdatedProperties();
		$updatedReshare2 = clone $reshare2;
		$reshare3 = new Share();
		$reshare3->setId(4);
		$reshare3->setShareTypeId('user');
		$reshare3->setItemType('test');
		$reshare3->addParentId(3);
		$reshare3->setPermissions(15);
		$reshare3->setExpirationTime(1370884028);
		$reshare3->resetUpdatedProperties();
		$updatedReshare3 = clone $reshare3;
		$map = array(
			array(array('id' => 1, 'shareTypeId' => 'user'), 1, null, array($parent1)),
			array(array('parentId' => 1), null, null, array($reshare1, $reshare2)),
			array(array('id' => 1), 1, null, array($parent1)),
			array(array('id' => 5), 1, null, array($parent2)),
		);
		$this->shareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareBackend->expects($this->once())
			->method('update');
		$this->shareManager->update($updatedParent1);
		$this->assertEquals($updatedParent2, $parent2);
		$this->assertEquals($updatedReshare1, $reshare1);
		$this->assertEquals($updatedReshare2, $reshare2);
		$this->assertEquals($updatedReshare3, $reshare3);
	}

	public function testGetSharesWithExpiredShare() {
		$share1 = new Share();
		$share1->setId(1);
		$share1->setItemType('test');
		$share2 = new Share();
		$share2->setId(2);
		$share2->setItemType('test');
		$share3 = new Share();
		$share3->setId(3);
		$share3->setItemType('test');
		$map = array(
			array(array(), null, null, array($share1, $share2, $share3)),
			array(array('parentId' => 2), null, null, array()),
		);
		$this->shareBackend->expects($this->any())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareBackend->expects($this->at(2))
			->method('isExpired')
			->will($this->returnValue(true));
		$this->shareBackend->expects($this->once())
			->method('unshare')
			->with($this->equalTo($share2));
		$shares = $this->shareManager->getShares('test');
		$this->assertEquals(2, count($shares));
		$this->assertContains($share1, $shares);
		$this->assertContains($share3, $shares);
	}

	public function testGetSharesWithExpiredSharesAndLimit() {
		$share1 = new Share();
		$share1->setId(1);
		$share1->setItemType('test');
		$share2 = new Share();
		$share2->setId(2);
		$share2->setItemType('test');
		$share3 = new Share();
		$share3->setId(3);
		$share3->setItemType('test');
		$share4 = new Share();
		$share4->setId(4);
		$share4->setItemType('test');
		$map = array(
			array(array(), 3, null, array($share1, $share2, $share3)),
			array(array('parentId' => 2), null, null, array()),
			array(array(), 1, 2, array($share4)),
		);
		$this->shareBackend->expects($this->any())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareBackend->expects($this->at(2))
			->method('isExpired')
			->will($this->returnValue(true));
		$this->shareBackend->expects($this->once())
			->method('unshare')
			->with($this->equalTo($share2));
		$shares = $this->shareManager->getShares('test', array(), 3);
		$this->assertCount(3, $shares);
		$this->assertContains($share1, $shares);
		$this->assertContains($share3, $shares);
		$this->assertContains($share4, $shares);
	}

	public function testGetSharesWithExpiredSharesAndLimitOffset() {
		$share2 = new Share();
		$share2->setId(2);
		$share2->setItemType('test');
		$share3 = new Share();
		$share3->setId(3);
		$share3->setItemType('test');
		$share4 = new Share();
		$share4->setId(4);
		$share4->setItemType('test');
		$share5 = new Share();
		$share5->setId(5);
		$share5->setItemType('test');
		$map = array(
			array(array(), 3, 1, array($share2, $share3, $share4)),
			array(array('parentId' => 2), null, null, array()),
			array(array(), 1, 3, array($share5)),
		);
		$this->shareBackend->expects($this->any())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareBackend->expects($this->at(1))
			->method('isExpired')
			->will($this->returnValue(true));
		$this->shareBackend->expects($this->once())
			->method('unshare')
			->with($this->equalTo($share2));
		$shares = $this->shareManager->getShares('test', array(), 3, 1);
		$this->assertCount(3, $shares);
		$this->assertContains($share3, $shares);
		$this->assertContains($share4, $shares);
		$this->assertContains($share5, $shares);
	}

	public function testGetShareById() {
		$share = new Share();
		$share->setId(1);
		$share->setItemType('testCollection');
		$share->setShareTypeId('link');
		$collectionMap = array(
			array(array('id' => 1, 'shareTypeId' => 'link'), 1, null, array($share)),
		);
		$this->shareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->throwException(new ShareTypeDoesNotExistException(
				'No share type found matching id'
			)));
		$this->collectionShareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($collectionMap));
		$this->assertEquals($share, $this->shareManager->getShareById(1, null, 'link'));
	}

	public function testGetShareByIdWithMultipleSharesReturned() {
		$share1 = new Share();
		$share1->setId(1);
		$share1->setItemType('test');
		$share2 = new Share();
		$share2->setId(1);
		$share2->setItemType('test');
		$map = array(
			array(array('id' => 1), 1, null, array($share1, $share2)),
		);
		$this->shareBackend->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->setExpectedException('\OC\Share\Exception\MultipleSharesReturnedException',
			'Multiple shares were returned for the id 1'
		);
		$this->shareManager->getShareById(1, 'test');
	}

	public function testUnshareItem() {
		$item = 1;
		$parent1 = new Share();
		$parent1->setId(1);
		$parent1->setItemType('test');
		$parent1->setShareTypeId('user');
		$parent1->setItemSource($item);
		$parent1->setPermissions(31);
		$parent1->resetUpdatedProperties();
		$parent2 = new Share();
		$parent2->setId(5);
		$parent2->setShareTypeId('group');
		$parent2->setItemType('test');
		$parent2->setItemSource($item);
		$parent2->setPermissions(21);
		$reshare1 = new Share();
		$reshare1->setId(2);
		$reshare1->setShareTypeId('link');
		$reshare1->setItemType('test');
		$reshare1->setItemSource($item);
		$reshare1->setParentIds(array(1, 5));
		$reshare1->setPermissions(17);
		$reshare1->resetUpdatedProperties();
		$reshare2 = new Share();
		$reshare2->setId(3);
		$reshare2->setShareTypeId('group');
		$reshare2->setItemType('test');
		$reshare2->setItemSource($item);
		$reshare2->setParentIds(array(1, 5));
		$reshare2->setPermissions(21);
		$reshare2->resetUpdatedProperties();
		$reshare3 = new Share();
		$reshare3->setId(4);
		$reshare3->setShareTypeId('user');
		$reshare3->setItemType('test');
		$reshare3->setItemSource($item);
		$reshare3->addParentId(3);
		$reshare3->setPermissions(5);
		$reshare3->resetUpdatedProperties();
		$map = array(
			array(array('itemSource' => $item), null, null, 
				array($parent1, $parent2, $reshare1, $reshare2, $reshare3)
			),
			array(array('parentId' => 1), null, null, array($reshare1, $reshare2)),
			array(array('id' => 1), 1, null, array($parent1)),
			array(array('id' => 5), 1, null, array($parent2)),
			array(array('id' => 2, 'shareTypeId' => 'link'), 1, null, array($reshare1)),
			array(array('id' => 3, 'shareTypeId' => 'group'), 1, null, array($reshare2)),
			array(array('parentId' => 5), null, null, array($reshare1, $reshare2)),
			array(array('parentId' => 2), null, null, array()),
			array(array('parentId' => 3), null, null, array($reshare3)),
			array(array('id' => 5), 1, null, array($reshare2)),
			array(array('id' => 4, 'shareTypeId' => 'user'), 1, null, array($reshare3)),
		);
		$this->shareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareBackend->expects($this->any())
			->method('unshare');
		$this->shareManager->unshareItem('test', $item);
	}

	public function testGetReshares() {
		$share1 = new Share();
		$share1->setItemType('test');
		$share2 = new Share();
		$share2->setItemType('test');
		$share3 = new Share();
		$share3->setItemType('test');
		$parent = new Share();
		$parent->setId(1);
		$parent->setItemType('test');
		$share1->addParentId(1);
		$share2->addParentId(1);
		$share3->addParentId(1);	
		$map = array(
			array(array('parentId' => 1), null, null, array($share1, $share2, $share3)),
		);
		$this->shareBackend->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($map));
		$reshares = $this->shareManager->getReshares($parent);
		$this->assertCount(3, $reshares);
		$this->assertContains($share1, $reshares);
		$this->assertContains($share2, $reshares);
		$this->assertContains($share3, $reshares);
	}

	public function testGetResharesWithNoReshares() {
		$parent = new Share();
		$parent->setId(1);
		$parent->setItemType('test');
		$map = array(
			array(array('parentId' => 1), null, null, array()),
		);
		$this->shareBackend->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->assertEmpty($this->shareManager->getReshares($parent));
	}

	public function testGetResharesInCollection() {
		$this->areCollectionsEnabled = true;

		$share1 = new Share();
		$share1->setItemType('test');
		$share2 = new Share();
		$share2->setItemType('testCollection');
		$share3 = new Share();
		$share3->setItemType('test');
		$parent = new Share();
		$parent->setId(1);
		$parent->setItemType('testCollection');
		$share1->addParentId(1);
		$share2->addParentId(1);
		$share3->addParentId(1);	
		$shareMap = array(
			array(array('parentId' => 1), null, null, array($share1, $share3)),
		);
		$collectionMap = array(
			array(array('parentId' => 1), null, null, array($share2)),
		);
		$this->shareBackend->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($shareMap));
		$this->collectionShareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($collectionMap));
		$reshares = $this->shareManager->getReshares($parent);
		$this->assertCount(3, $reshares);
		$this->assertContains($share1, $reshares);
		$this->assertContains($share2, $reshares);
		$this->assertContains($share3, $reshares);
	}	

	public function testGetParents() {
		$share = new Share();
		$share->setItemType('test');
		$parent1 = new Share();
		$parent1->setId(1);
		$parent1->setItemType('test');
		$parent2 = new Share();
		$parent2->setId(2);
		$parent2->setItemType('test');
		$parent3 = new Share();
		$parent3->setId(3);
		$parent3->setItemType('test');
		$share->setParentIds(array(1, 2, 3));
		$map = array(
			array(array('id' => 1), 1, null, array($parent1)),
			array(array('id' => 2), 1, null, array($parent2)),
			array(array('id' => 3), 1, null, array($parent3)),
		);
		$this->shareBackend->expects($this->exactly(3))
			->method('getShares')
			->will($this->returnValueMap($map));
		$parents = $this->shareManager->getParents($share);
		$this->assertCount(3, $parents);
		$this->assertContains($parent1, $parents);
		$this->assertContains($parent2, $parents);
		$this->assertContains($parent3, $parents);
	}

	public function testGetParentsInCollection() {
		$this->areCollectionsEnabled = true;

		$share = new Share();
		$share->setItemType('test');
		$parent1 = new Share();
		$parent1->setId(1);
		$parent1->setItemType('test');
		$parent2 = new Share();
		$parent2->setId(2);
		$parent2->setItemType('testCollection');
		$share->setParentIds(array(1, 2));
		$sharesMap = array(
			array(array('id' => 1), 1, null, array($parent1)),
			array(array('id' => 2), 1, null, array()),
		);
		$collectionMap = array(
			array(array('id' => 1), 1, null, array()),
			array(array('id' => 2), 1, null, array($parent2)),
		);
		$this->shareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($sharesMap));
		$this->collectionShareBackend->expects($this->atLeastOnce())
			->method('getShares')
			->will($this->returnValueMap($collectionMap));
		$parents = $this->shareManager->getParents($share);
		$this->assertCount(2, $parents);
		$this->assertContains($parent1, $parents);
		$this->assertContains($parent2, $parents);
	}

	public function testGetParentsWithNoParents() {
		$share = new Share();
		$this->shareBackend->expects($this->never())
			->method('getShares');
		$this->collectionShareBackend->expects($this->never())
			->method('getShares');
		$this->assertEmpty($this->shareManager->getParents($share));
	}

	public function testGetParentsWithNotExistingParent() {
		$share = new Share();
		$share->setItemType('test');
		$share->addParentId(1);
		$map = array(
			array(array('id' => 1), 1, null, array()),
		);
		$this->shareBackend->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->setExpectedException('\OC\Share\Exception\ShareDoesNotExistException',
			'A share does not exist with the id 1'
		);
		$this->shareManager->getParents($share);
	}

	public function testAreValidPermissionsWithOneParent() {
		// Share and parent have all permissions
		$share = new Share();
		$share->setItemType('test');
		$share->setPermissions(31);
		$parent = new Share();
		$parent->setId(1);
		$parent->setItemType('test');
		$parent->setPermissions(31);
		$share->addParentId(1);
		$map = array(
			array(array('id' => 1), 1, null, array($parent)),
		);
		$this->shareBackend->expects($this->any())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->assertTrue($this->shareManager->pAreValidPermissionsForParents($share));

		// Share permissions are only Read and parent permissions are only Read, Update, and Share
		$share->setPermissions(1);
		$parent->setPermissions(19);
		$this->assertTrue($this->shareManager->pAreValidPermissionsForParents($share));
	}

	public function testAreValidPermissionsWithOneParentAndShareExceedsPermissions() {
		// Share has all permissions and parent permissions are only Read, Update, and Share
		$share = new Share();
		$share->setItemType('test');
		$share->setPermissions(31);
		$parent = new Share();
		$parent->setId(1);
		$parent->setItemType('test');
		$parent->setPermissions(19);
		$share->addParentId(1);
		$map = array(
			array(array('id' => 1), 1, null, array($parent)),
		);
		$this->shareBackend->expects($this->any())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->setExpectedException('\OC\Share\Exception\InvalidPermissionsException',
			'The permissions exceeds the parent shares\' permissions'
		);
		$this->shareManager->pAreValidPermissionsForParents($share);
	}

	public function testAreValidPermissionsWithTwoParents() {
		// Share has all permissions, 1 parent has only Read, Update, and Share
		// The other parent has only Read, Create, Delete, and Share
		$share = new Share();
		$share->setItemType('test');
		$share->setPermissions(31);
		$parent1 = new Share();
		$parent1->setId(1);
		$parent1->setItemType('test');
		$parent1->setPermissions(19);
		$parent2 = new Share();
		$parent2->setId(2);
		$parent2->setItemType('test');
		$parent2->setPermissions(29);
		$share->setParentIds(array(1, 2));
		$map = array(
			array(array('id' => 1), 1, null, array($parent1)),
			array(array('id' => 2), 1, null, array($parent2)),
		);
		$this->shareBackend->expects($this->any())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->assertTrue($this->shareManager->pAreValidPermissionsForParents($share));

		// Share and parent remove Create permission
		$share->setPermissions(27);
		$parent2->setPermissions(25);
		$this->assertTrue($this->shareManager->pAreValidPermissionsForParents($share));
	}

	public function testAreValidPermissionsWithTwoParentsAndShareExceedsPermissions() {
		// Share has all permissions, 1 parent has only Read, Update, and Share
		// The other parent has only Read, Delete, and Share
		$share = new Share();
		$share->setItemType('test');
		$share->setPermissions(31);
		$parent1 = new Share();
		$parent1->setId(1);
		$parent1->setItemType('test');
		$parent1->setPermissions(19);
		$parent2 = new Share();
		$parent2->setId(2);
		$parent2->setItemType('test');
		$parent2->setPermissions(25);
		$share->setParentIds(array(1, 2));
		$map = array(
			array(array('id' => 1), 1, null, array($parent1)),
			array(array('id' => 2), 1, null, array($parent2)),
		);
		$this->shareBackend->expects($this->any())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->setExpectedException('\OC\Share\Exception\InvalidPermissionsException',
			'The permissions exceeds the parent shares\' permissions'
		);
		$this->shareManager->pAreValidPermissionsForParents($share);
	}

	public function testIsValidExpirationTimeWithOneParent() {
		// Share and parent have no expiration time
		$share = new Share();
		$share->setItemType('test');
		$parent = new Share();
		$parent->setId(1);
		$parent->setItemType('test');
		$share->addParentId(1);
		$map = array(
			array(array('id' => 1), 1, null, array($parent)),
		);
		$this->shareBackend->expects($this->any())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->assertTrue($this->shareManager->pIsValidExpirationTimeForParents($share));

		// Share expires 1 second before parent
		$share->setExpirationTime(1370884024);
		$parent->setExpirationTime(1370884025);
		$this->assertTrue($this->shareManager->pIsValidExpirationTimeForParents($share));
	}

	public function testIsValidExpirationTimeWithOneParentExpiresAndShareDoesNotExpire() {
		// Parent expires, share has no expiration time
		$share = new Share();
		$share->setItemType('test');
		$parent = new Share();
		$parent->setId(1);
		$parent->setItemType('test');
		$parent->setExpirationTime(1370884025);
		$share->addParentId(1);
		$map = array(
			array(array('id' => 1), 1, null, array($parent)),
		);
		$this->shareBackend->expects($this->any())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->setExpectedException('\OC\Share\Exception\InvalidExpirationTimeException',
			'The expiration time exceeds the parent shares\' expiration times'
		);
		$this->shareManager->pIsValidExpirationTimeForParents($share);
	}

	public function testIsValidExpirationTimeWithOneParentExpiresAndShareExpiresAfter() {
		// Share expires 1 second after parent
		$share = new Share();
		$share->setItemType('test');
		$share->setExpirationTime(1370884026);
		$parent = new Share();
		$parent->setId(1);
		$parent->setItemType('test');
		$parent->setExpirationTime(1370884025);
		$share->addParentId(1);
		$map = array(
			array(array('id' => 1), 1, null, array($parent)),
		);
		$this->shareBackend->expects($this->any())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->setExpectedException('\OC\Share\Exception\InvalidExpirationTimeException',
			'The expiration time exceeds the parent shares\' expiration times'
		);
		$this->shareManager->pIsValidExpirationTimeForParents($share);
	}

	public function testIsValidExpirationTimeWithTwoParents() {
		// Share and parents have no expiration time
		$share = new Share();
		$share->setItemType('test');
		$parent1 = new Share();
		$parent1->setId(1);
		$parent1->setItemType('test');
		$parent2 = new Share();
		$parent2->setId(2);
		$parent2->setItemType('test');
		$share->setParentIds(array(1, 2));
		$map = array(
			array(array('id' => 1), 1, null, array($parent1)),
			array(array('id' => 2), 1, null, array($parent2)),
		);
		$this->shareBackend->expects($this->any())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->assertTrue($this->shareManager->pIsValidExpirationTimeForParents($share));

		// 1 parent expires, the other parent and share have no expiration time
		$parent1->setExpirationTime(1370884025);
		$this->assertTrue($this->shareManager->pIsValidExpirationTimeForParents($share));

		// Share expires 1 second after 1 parent, the other parent has no expiration time
		$share->setExpirationTime(1370884026);
		$this->assertTrue($this->shareManager->pIsValidExpirationTimeForParents($share));

		// 1 parent expires 1 second before share, the other parent expires 1 second after share
		$parent2->setExpirationTime(1370884027);
		$this->assertTrue($this->shareManager->pIsValidExpirationTimeForParents($share));

		// Share expires 1 second before both parents
		$share->setExpirationTime(1370884024);
		$parent2->setExpirationTime(1370884025);
		$this->assertTrue($this->shareManager->pIsValidExpirationTimeForParents($share));
	}

	public function testIsValidExpirationTimeWithTwoParentsExpireAndShareDoesNotExpire() {
		// Both parents expire, and share has no expiration time
		$share = new Share();
		$share->setItemType('test');
		$parent1 = new Share();
		$parent1->setId(1);
		$parent1->setItemType('test');
		$parent1->setExpirationTime(1370884025);
		$parent2 = new Share();
		$parent2->setId(2);
		$parent2->setItemType('test');
		$parent2->setExpirationTime(1370884026);
		$share->setParentIds(array(1, 2));
		$map = array(
			array(array('id' => 1), 1, null, array($parent1)),
			array(array('id' => 2), 1, null, array($parent2)),
		);
		$this->shareBackend->expects($this->any())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->setExpectedException('\OC\Share\Exception\InvalidExpirationTimeException',
			'The expiration time exceeds the parent shares\' expiration times'
		);
		$this->shareManager->pIsValidExpirationTimeForParents($share);
	}

	public function testIsValidExpirationTimeWithTwoParentsExpireAndShareExpiresAfter() {
		// Both parents expire before share
		$share = new Share();
		$share->setItemType('test');
		$share->setExpirationTime(1370884026);
		$parent1 = new Share();
		$parent1->setId(1);
		$parent1->setItemType('test');
		$parent1->setExpirationTime(1370884024);
		$parent2 = new Share();
		$parent2->setId(2);
		$parent2->setItemType('test');
		$parent2->setExpirationTime(1370884025);
		$share->setParentIds(array(1, 2));
		$map = array(
			array(array('id' => 1), 1, null, array($parent1)),
			array(array('id' => 2), 1, null, array($parent2)),
		);
		$this->shareBackend->expects($this->any())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->setExpectedException('\OC\Share\Exception\InvalidExpirationTimeException',
			'The expiration time exceeds the parent shares\' expiration times'
		);
		$this->shareManager->pIsValidExpirationTimeForParents($share);
	}

}