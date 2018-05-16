<?php
/**
 * @author Lukas Reschke
 * @copyright Copyright (c) 2014 Lukas Reschke lukas@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Tests\Settings\Controller;

use OC\Group\MetaData;
use OC\Settings\Application;
use OC\Settings\Controller\GroupsController;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;

/**
 * @package Tests\Settings\Controller
 */
class GroupsControllerTest extends \Test\TestCase {

	/** @var \OCP\AppFramework\IAppContainer */
	private $container;

	/** @var GroupsController */
	private $groupsController;

	protected function setUp() {
		$app = new Application();
		$this->container = $app->getContainer();
		$this->container['AppName'] = 'settings';
		$this->container['GroupManager'] = $this->getMockBuilder('\OCP\IGroupManager')
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession'] = $this->getMockBuilder('\OC\User\Session')
			->disableOriginalConstructor()->getMock();
		$this->container['L10N'] = $this->getMockBuilder('\OCP\IL10N')
			->disableOriginalConstructor()->getMock();
		$this->container['IsAdmin'] = true;
		$this->container['L10N']
			->expects($this->any())
					->method('t')
					->will($this->returnCallback(function ($text, $parameters = []) {
						return \vsprintf($text, $parameters);
					}));
		$this->groupsController = $this->container['GroupsController'];
	}

	/**
	 * TODO: Since GroupManager uses the static OC_Subadmin class it can't be mocked
	 * to test for subadmins. Thus the test always assumes you have admin permissions...
	 */
	public function testIndexSortByName() {
		$firstGroup = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()->getMock();
		$firstGroup
			->method('getGID')
			->will($this->returnValue('firstGroup'));
		$firstGroup
			->method('count')
			->will($this->returnValue(12));
		$secondGroup = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()->getMock();
		$secondGroup
			->method('getGID')
			->will($this->returnValue('secondGroup'));
		$secondGroup
			->method('count')
			->will($this->returnValue(25));
		$thirdGroup = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()->getMock();
		$thirdGroup
			->method('getGID')
			->will($this->returnValue('thirdGroup'));
		$thirdGroup
			->method('count')
			->will($this->returnValue(14));
		$fourthGroup = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()->getMock();
		$fourthGroup
			->method('getGID')
			->will($this->returnValue('admin'));
		$fourthGroup
			->method('count')
			->will($this->returnValue(18));
		/** @var \OC\Group\Group[] $groups */
		$groups = [];
		$groups[] = $firstGroup;
		$groups[] = $secondGroup;
		$groups[] = $thirdGroup;
		$groups[] = $fourthGroup;

		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('MyAdminUser'));
		$this->container['GroupManager']
			->method('search')
			->will($this->returnValue($groups));

		$expectedResponse = new DataResponse(
			[
				'data' => [
				'adminGroups' => [
					0 => [
						'id' => 'admin',
						'name' => 'admin',
						'usercount' => 0,//User count disabled 18,
					]
				],
				'groups' =>
					[
						0 => [
							'id' => 'firstGroup',
							'name' => 'firstGroup',
							'usercount' => 0,//User count disabled 12,
						],
						1 => [
							'id' => 'secondGroup',
							'name' => 'secondGroup',
							'usercount' => 0,//User count disabled 25,
						],
						2 => [
							'id' => 'thirdGroup',
							'name' => 'thirdGroup',
							'usercount' => 0,//User count disabled 14,
						],
					]
				]
			]
		);
		$response = $this->groupsController->index('', false, MetaData::SORT_GROUPNAME);
		$this->assertEquals($expectedResponse, $response);
	}

	/**
	 * TODO: Since GroupManager uses the static OC_Subadmin class it can't be mocked
	 * to test for subadmins. Thus the test always assumes you have admin permissions...
	 */
	public function testIndexSortbyCount() {
		$firstGroup = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()->getMock();
		$firstGroup
			->method('getGID')
			->will($this->returnValue('firstGroup'));
		$firstGroup
			->method('count')
			->will($this->returnValue(12));
		$secondGroup = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()->getMock();
		$secondGroup
			->method('getGID')
			->will($this->returnValue('secondGroup'));
		$secondGroup
			->method('count')
			->will($this->returnValue(25));
		$thirdGroup = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()->getMock();
		$thirdGroup
			->method('getGID')
			->will($this->returnValue('thirdGroup'));
		$thirdGroup
			->method('count')
			->will($this->returnValue(14));
		$fourthGroup = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()->getMock();
		$fourthGroup
			->method('getGID')
			->will($this->returnValue('admin'));
		$fourthGroup
			->method('count')
			->will($this->returnValue(18));
		/** @var \OC\Group\Group[] $groups */
		$groups = [];
		$groups[] = $firstGroup;
		$groups[] = $secondGroup;
		$groups[] = $thirdGroup;
		$groups[] = $fourthGroup;

		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('MyAdminUser'));
		$this->container['GroupManager']
			->method('search')
			->will($this->returnValue($groups));

		$expectedResponse = new DataResponse(
			[
				'data' => [
				'adminGroups' => [
					0 => [
						'id' => 'admin',
						'name' => 'admin',
						'usercount' => 18,
					]
				],
				'groups' =>
					[
						0 => [
							'id' => 'secondGroup',
							'name' => 'secondGroup',
							'usercount' => 25,
						],
						1 => [
							'id' => 'thirdGroup',
							'name' => 'thirdGroup',
							'usercount' => 14,
						],
						2 => [
							'id' => 'firstGroup',
							'name' => 'firstGroup',
							'usercount' => 12,
						],
					]
				]
			]
		);
		$response = $this->groupsController->index();
		$this->assertEquals($expectedResponse, $response);
	}

	public function testCreateWithExistingGroup() {
		$this->container['GroupManager']
			->expects($this->once())
			->method('groupExists')
			->with('ExistingGroup')
			->will($this->returnValue(true));

		$expectedResponse = new DataResponse(
			[
				'message' => 'Group already exists.'
			],
			Http::STATUS_CONFLICT
		);
		$response = $this->groupsController->create('ExistingGroup');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testCreateSuccessful() {
		$this->container['GroupManager']
			->expects($this->once())
			->method('groupExists')
			->with('NewGroup')
			->will($this->returnValue(false));
		$this->container['GroupManager']
			->expects($this->once())
			->method('createGroup')
			->with('NewGroup')
			->will($this->returnValue(true));

		$expectedResponse = new DataResponse(
			[
				'groupname' => 'NewGroup'
			],
			Http::STATUS_CREATED
		);
		$response = $this->groupsController->create('NewGroup');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testCreateUnsuccessful() {
		$this->container['GroupManager']
			->expects($this->once())
			->method('groupExists')
			->with('NewGroup')
			->will($this->returnValue(false));
		$this->container['GroupManager']
			->expects($this->once())
			->method('createGroup')
			->with('NewGroup')
			->will($this->returnValue(false));

		$expectedResponse = new DataResponse(
			[
				'status' => 'error',
				'data' => ['message' => 'Unable to add group.']
			],
			Http::STATUS_FORBIDDEN
		);
		$response = $this->groupsController->create('NewGroup');
		$this->assertEquals($expectedResponse, $response);
	}

	public function destroyData() {
		return [
			['ExistingGroup'],
			['a/b'],
			['a*2&&bc//f!!'],
			['!c@\\$%^&*()|2']
		];
	}

	/**
	 * Test destroy works with special characters also
	 * @dataProvider destroyData
	 */
	public function testDestroySuccessful($groupName) {
		$group = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()->getMock();
		$this->container['GroupManager']
			->expects($this->once())
			->method('get')
			->with($groupName)
			->will($this->returnValue($group));
		$group
			->expects($this->once())
			->method('delete')
			->will($this->returnValue(true));

		$expectedResponse = new DataResponse(
			[
				'status' => 'success',
				'data' => ['groupname' => $groupName]
			],
			Http::STATUS_NO_CONTENT
		);
		$response = $this->groupsController->destroy($groupName);
		$this->assertEquals($expectedResponse, $response);
	}

	public function testDestroyUnsuccessful() {
		$this->container['GroupManager']
			->expects($this->once())
			->method('get')
			->with('ExistingGroup')
			->will($this->returnValue(null));

		$expectedResponse = new DataResponse(
			[
				'status' => 'error',
				'data' => ['message' => 'Unable to delete group.']
			],
			Http::STATUS_FORBIDDEN
		);
		$response = $this->groupsController->destroy('ExistingGroup');
		$this->assertEquals($expectedResponse, $response);
	}
}
