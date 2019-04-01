<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Tom Needham <tom@owncloud.com>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\Files_Sharing\Tests\API;

use OCA\Files_Sharing\Controller\ShareesController;
use OCA\Files_Sharing\SharingBlacklist;
use OCA\Files_Sharing\Tests\TestCase;
use OCP\AppFramework\Http;
use OCP\Contacts\IManager;
use OCP\IConfig;
use OCP\IGroup;
use OCP\IGroupManager;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IUserManager;
use OCP\IUserSession;
use OCP\Share;
use OCA\FederatedFileSharing\FederatedShareProvider;

/**
 * Class ShareesTest
 *
 * @group DB
 *
 * @package OCA\Files_Sharing\Tests\API
 */
class ShareesTest extends TestCase {
	/** @var ShareesController */
	protected $sharees;

	/** @var \OCP\IUserManager|\PHPUnit\Framework\MockObject\MockObject */
	protected $userManager;

	/** @var \OCP\IGroupManager|\PHPUnit\Framework\MockObject\MockObject */
	protected $groupManager;

	/** @var \OCP\Contacts\IManager|\PHPUnit\Framework\MockObject\MockObject */
	protected $contactsManager;

	/** @var \OCP\IUserSession|\PHPUnit\Framework\MockObject\MockObject */
	protected $session;

	/** @var \OCP\IConfig|\PHPUnit\Framework\MockObject\MockObject */
	protected $config;

	/** @var \OCP\IRequest|\PHPUnit\Framework\MockObject\MockObject */
	protected $request;

	/** @var \OCP\Share\IManager|\PHPUnit\Framework\MockObject\MockObject */
	protected $shareManager;

	/** @var SharingBlacklist|\PHPUnit\Framework\MockObject\MockObject */
	protected $sharingBlacklist;

	protected function setUp() {
		parent::setUp();

		$this->userManager = $this->getMockBuilder(IUserManager::class)
			->disableOriginalConstructor()
			->getMock();

		$this->groupManager = $this->getMockBuilder(IGroupManager::class)
			->disableOriginalConstructor()
			->getMock();

		$this->contactsManager = $this->getMockBuilder(IManager::class)
			->disableOriginalConstructor()
			->getMock();

		$this->session = $this->getMockBuilder(IUserSession::class)
			->disableOriginalConstructor()
			->getMock();

		$this->request = $this->getMockBuilder(IRequest::class)
			->disableOriginalConstructor()
			->getMock();

		$this->shareManager = $this->getMockBuilder(\OCP\Share\IManager::class)
			->disableOriginalConstructor()
			->getMock();

		$this->config = $this->getMockBuilder(IConfig::class)
			->disableOriginalConstructor()
			->getMock();
		$federatedShareProviderMock = $this->getMockBuilder(FederatedShareProvider::class)->disableOriginalConstructor()->getMock();
		$federatedShareProviderMock->expects($this->any())
			->method('isOutgoingServer2serverShareEnabled')
			->willReturn(true);

		$this->sharingBlacklist = $this->getMockBuilder(SharingBlacklist::class)
			->disableOriginalConstructor()
			->getMock();

		$this->sharees = new ShareesController(
			'files_sharing',
			$this->request,
			$this->groupManager,
			$this->userManager,
			$this->contactsManager,
			$this->config,
			$this->session,
			$this->getMockBuilder(IURLGenerator::class)->disableOriginalConstructor()->getMock(),
			$this->getMockBuilder(ILogger::class)->disableOriginalConstructor()->getMock(),
			$this->shareManager,
			$this->sharingBlacklist,
			$federatedShareProviderMock
		);
	}

	/**
	 * @param string $uid
	 * @param string $displayName
	 * @param string $email
	 * @param array $terms Search terms for the user
	 * @return \OCP\IUser|\PHPUnit\Framework\MockObject\MockObject
	 */
	protected function getUserMock($uid, $displayName, $email = null, $terms = []) {
		$user = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()
			->getMock();

		$user->expects($this->any())
			->method('getUID')
			->willReturn($uid);

		$user->expects($this->any())
			->method('getDisplayName')
			->willReturn($displayName);

		$user->expects($this->any())
			->method('getEMailAddress')
			->willReturn($email);

		$user->expects($this->any())
			->method('getSearchTerms')
			->willReturn($terms);

		return $user;
	}

	/**
	 * @param string $gid
	 * @return \OCP\IGroup|\PHPUnit\Framework\MockObject\MockObject
	 */
	protected function getGroupMock($gid, $displayName = null) {
		$group = $this->getMockBuilder(IGroup::class)
			->disableOriginalConstructor()
			->getMock();

		$group->expects($this->any())
			->method('getGID')
			->willReturn($gid);

		if ($displayName === null) {
			// note: this is how the Group class behaves
			$displayName = $gid;
		}

		$group->expects($this->any())
			->method('getDisplayName')
			->willReturn($displayName);

		return $group;
	}

	public function dataGetUsers() {
		return [
			['test', false, true, [], [], [], [], true, false],
			['test', false, false, [], [], [], [], true, false],
			['test', true, true, [], [], [], [], true, false],
			['test', true, false, [], [], [], [], true, false],
			[
				'test', false, true, [], [],
				[
					['label' => 'Test', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test']],
				], [], true, $this->getUserMock('test', 'Test')
			],
			[
				'test', false, false, [], [],
				[
					['label' => 'Test', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test']],
				], [], true, $this->getUserMock('test', 'Test')
			],
			[
				'test', true, true, [], [],
				[], [], true, $this->getUserMock('test', 'Test')
			],
			[
				'test', true, false, [], [],
				[], [], true, $this->getUserMock('test', 'Test')
			],
			[
				'test', true, true, ['test-group'], [['test-group', 'test', 2, 0, []]],
				[
					['label' => 'Test', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test']],
				], [], true, $this->getUserMock('test', 'Test')
			],
			[
				'test', true, false, ['test-group'], [['test-group', 'test', 2, 0, []]],
				[
					['label' => 'Test', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test']],
				], [], true, $this->getUserMock('test', 'Test')
			],
			[
				'test',
				false,
				true,
				[],
				[
					$this->getUserMock('test1', 'Test One'),
				],
				[],
				[
					['label' => 'Test One', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test1']],
				],
				true,
				false,
			],
			[
				'test',
				false,
				false,
				[],
				[
					$this->getUserMock('test1', 'Test One'),
				],
				[],
				[],
				true,
				false,
			],
			[
				'test',
				false,
				true,
				[],
				[
					$this->getUserMock('test1', 'Test One'),
					$this->getUserMock('test2', 'Test Two'),
				],
				[],
				[
					['label' => 'Test One', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test1']],
					['label' => 'Test Two', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test2']],
				],
				false,
				false,
			],
			[
				'test',
				false,
				false,
				[],
				[
					$this->getUserMock('test1', 'Test One'),
					$this->getUserMock('test2', 'Test Two'),
				],
				[],
				[],
				true,
				false,
			],
			[
				'test',
				false,
				true,
				[],
				[
					$this->getUserMock('test0', 'Test'),
					$this->getUserMock('test1', 'Test One'),
					$this->getUserMock('test2', 'Test Two'),
				],
				[
					['label' => 'Test', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test0']],
				],
				[
					['label' => 'Test One', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test1']],
					['label' => 'Test Two', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test2']],
				],
				false,
				false,
			],
			[
				'test',
				false,
				false,
				[],
				[
					$this->getUserMock('test0', 'Test'),
					$this->getUserMock('test1', 'Test One'),
					$this->getUserMock('test2', 'Test Two'),
				],
				[
					['label' => 'Test', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test0']],
				],
				[],
				true,
				false,
			],
			[
				'test',
				true,
				true,
				['abc', 'xyz'],
				[
					['abc', 'test', 2, 0, ['test1' => $this->getUserMock('test1', 'Test One')]],
					['xyz', 'test', 2, 0, []],
				],
				[],
				[
					['label' => 'Test One', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test1']],
				],
				true,
				false,
			],
			[
				'test',
				true,
				false,
				['abc', 'xyz'],
				[
					['abc', 'test', 2, 0, ['test1' => $this->getUserMock('test1', 'Test One')]],
					['xyz', 'test', 2, 0, []],
				],
				[],
				[],
				true,
				false,
			],
			[
				'test',
				true,
				true,
				['abc', 'xyz'],
				[
					['abc', 'test', 2, 0, [
						'test1' => $this->getUserMock('test1', 'Test One'),
						'test2' => $this->getUserMock('test2', 'Test Two'),
					]],
					['xyz', 'test', 2, 0, [
						'test1' => $this->getUserMock('test1', 'Test One'),
						'test2' => $this->getUserMock('test2', 'Test Two'),
					]],
				],
				[],
				[
					['label' => 'Test One', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test1']],
					['label' => 'Test Two', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test2']],
				],
				false,
				false,
			],
			[
				'test',
				true,
				false,
				['abc', 'xyz'],
				[
					['abc', 'test', 2, 0, [
						'test1' => $this->getUserMock('test1', 'Test One'),
						'test2' => $this->getUserMock('test2', 'Test Two'),
					]],
					['xyz', 'test', 2, 0, [
						'test1' => $this->getUserMock('test1', 'Test One'),
						'test2' => $this->getUserMock('test2', 'Test Two'),
					]],
				],
				[],
				[],
				true,
				false,
			],
			[
				'test',
				true,
				true,
				['abc', 'xyz'],
				[
					['abc', 'test', 2, 0, [
						'test' => $this->getUserMock('test1', 'Test One'),
					]],
					['xyz', 'test', 2, 0, [
						'test2' => $this->getUserMock('test2', 'Test Two'),
					]],
				],
				[
					['label' => 'Test One', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test']],
				],
				[
					['label' => 'Test Two', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test2']],
				],
				false,
				false,
			],
			[
				'test',
				true,
				false,
				['abc', 'xyz'],
				[
					['abc', 'test', 2, 0, [
						'test' => $this->getUserMock('test1', 'Test One'),
					]],
					['xyz', 'test', 2, 0, [
						'test2' => $this->getUserMock('test2', 'Test Two'),
					]],
				],
				[
					['label' => 'Test One', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test']],
				],
				[],
				true,
				false,
			],
			// share enumeration limited to group memberships
			[
				// search for user in same group
				'ano',
				false,
				true,
				// memberships
				['group1', 'group2'],
				// args and user response for "displayNamesInGroup" call
				[
					['group1', 'ano', 2, 0, [
						'another1' => $this->getUserMock('another1', 'Another One'),
					]],
					['group2', 'ano', 2, 0, [
					]],
				],
				// exact expected
				[],
				// fuzzy match expected
				[
					[
						'label' => 'Another One',
						'value' => [
							'shareType' => Share::SHARE_TYPE_USER,
							'shareWith' => 'another1',
							'shareWithAdditionalInfo' => 'another1'
						]
					],
				],
				true,
				false,
				true,
				'id'
			],
			[
				// pick user directly by name
				'another1',
				false,
				true,
				// memberships
				['group1', 'group2'],
				// args and user response for "displayNamesInGroup" call
				[
					// no such user in member groups
					['group1', 'another1', 2, 0, []],
					['group2', 'another1', 2, 0, []],
				],
				// exact expected
				[
					[
						'label' => 'Another One',
						'value' => [
							'shareType' => Share::SHARE_TYPE_USER,
							'shareWith' => 'another1',
							'shareWithAdditionalInfo' => 'email@example.com'
						]
					],
				],
				// fuzzy match expected
				[],
				true,
				$this->getUserMock('another1', 'Another One', 'email@example.com'),
				true,
				'email'
			],
		];
	}

	/**
	 * @dataProvider dataGetUsers
	 *
	 * @param string $searchTerm
	 * @param bool $shareWithGroupOnly
	 * @param bool $shareeEnumeration
	 * @param array $groupResponse user's group memberships
	 * @param array $userResponse user manager's search response
	 * @param array $exactExpected exact expected result
	 * @param array $expected non-exact expected result
	 * @param bool $reachedEnd
	 * @param mixed $singleUser false for testing search or user mock when we are testing a direct match
	 * @param mixed $shareeEnumerationGroupMembers restrict enumeration to group members
	 * @param mixed $additionalUserInfoField
	 */
	public function testGetUsers(
		$searchTerm,
		$shareWithGroupOnly,
		$shareeEnumeration,
		$groupResponse,
		$userResponse,
		$exactExpected,
		$expected,
		$reachedEnd,
		$singleUser,
		$shareeEnumerationGroupMembers = false,
		$additionalUserInfoField = null
	) {
		$this->config->expects($this->once())
			->method('getAppValue')
			->with('core', 'user_additional_info_field', '')
			->willReturn($additionalUserInfoField);

		$this->sharees = new ShareesController(
			'files_sharing',
			$this->request,
			$this->groupManager,
			$this->userManager,
			$this->contactsManager,
			$this->config,
			$this->session,
			$this->getMockBuilder(IURLGenerator::class)->disableOriginalConstructor()->getMock(),
			$this->getMockBuilder(ILogger::class)->disableOriginalConstructor()->getMock(),
			$this->shareManager,
			$this->sharingBlacklist,
			$this->getMockBuilder(FederatedShareProvider::class)->disableOriginalConstructor()->getMock()
		);
		$this->invokePrivate($this->sharees, 'limit', [2]);
		$this->invokePrivate($this->sharees, 'offset', [0]);
		$this->invokePrivate($this->sharees, 'shareWithGroupOnly', [$shareWithGroupOnly]);
		$this->invokePrivate($this->sharees, 'shareeEnumeration', [$shareeEnumeration]);
		$this->invokePrivate($this->sharees, 'shareeEnumerationGroupMembers', [$shareeEnumerationGroupMembers]);

		$user = $this->getUserMock('admin', 'Administrator');
		$this->session->expects($this->any())
			->method('getUser')
			->willReturn($user);

		if (!$shareWithGroupOnly && !$shareeEnumerationGroupMembers) {
			$this->userManager->expects($this->once())
				->method('find')
				->with($searchTerm, $this->invokePrivate($this->sharees, 'limit'), $this->invokePrivate($this->sharees, 'offset'))
				->willReturn($userResponse);
		} else {
			if ($singleUser !== false && !$shareeEnumerationGroupMembers) {
				// first call is for the current user's group memberships
				// second call happens later for an exact match to check whether
				// that match also is member of the same groups
				$this->groupManager->expects($this->exactly(2))
					->method('getUserGroupIds')
					->withConsecutive(
						$user,
						$singleUser
					)
					->willReturn($groupResponse);
			} else {
				$this->groupManager->expects($this->once())
					->method('getUserGroupIds')
					->with($user)
					->willReturn($groupResponse);
			}

			$this->groupManager->expects($this->exactly(\sizeof($groupResponse)))
				->method('findUsersInGroup')
				->with($this->anything(), $searchTerm, $this->invokePrivate($this->sharees, 'limit'), $this->invokePrivate($this->sharees, 'offset'))
				->willReturnMap($userResponse);
		}

		if ($singleUser !== false) {
			$this->userManager->expects($this->once())
				->method('get')
				->with($searchTerm)
				->willReturn($singleUser);
		}

		$this->invokePrivate($this->sharees, 'getUsers', [$searchTerm]);
		$result = $this->invokePrivate($this->sharees, 'result');

		$this->assertEquals($exactExpected, $result['exact']['users']);
		$this->assertEquals($expected, $result['users']);
		$this->assertCount((int) $reachedEnd, $this->invokePrivate($this->sharees, 'reachedEndFor'));
	}

	public function dataGetGroups() {
		return [
			['test', false, true, [], [], [], [], true],
			['test', false, false, [], [], [], [], true],
			// group without display name
			[
				'test', false, true,
				[$this->getGroupMock('test1')],
				[],
				[],
				[['label' => 'test1', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test1']]],
				true,
			],
			// group with display name, search by id
			[
				'test', false, true,
				[$this->getGroupMock('test1', 'Test One')],
				[],
				[],
				[['label' => 'Test One', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test1']]],
				true,
			],
			// group with display name, search by display name
			[
				'one', false, true,
				[$this->getGroupMock('test1', 'Test One')],
				[],
				[],
				[['label' => 'Test One', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test1']]],
				true,
			],
			// group with display name, search by display name, exact expected
			[
				'Test One', false, true,
				[$this->getGroupMock('test1', 'Test One')],
				[],
				[['label' => 'Test One', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test1']]],
				[],
				true,
			],
			[
				'test', false, false,
				[$this->getGroupMock('test1')],
				[],
				[],
				[],
				true,
			],
			[
				'test', false, true,
				[
					$this->getGroupMock('test'),
					$this->getGroupMock('test1'),
				],
				[],
				[['label' => 'test', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test']]],
				[['label' => 'test1', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test1']]],
				false,
			],
			[
				'test', false, false,
				[
					$this->getGroupMock('test'),
					$this->getGroupMock('test1'),
				],
				[],
				[['label' => 'test', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test']]],
				[],
				true,
			],
			[
				'test', false, true,
				[
					$this->getGroupMock('test0'),
					$this->getGroupMock('test1'),
				],
				[],
				[],
				[
					['label' => 'test0', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test0']],
					['label' => 'test1', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test1']],
				],
				false,
			],
			[
				'test', false, false,
				[
					$this->getGroupMock('test0'),
					$this->getGroupMock('test1'),
				],
				[],
				[],
				[],
				true,
			],
			[
				'test', false, true,
				[
					$this->getGroupMock('test0'),
					$this->getGroupMock('test1'),
				],
				[],
				[],
				[
					['label' => 'test0', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test0']],
					['label' => 'test1', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test1']],
				],
				false,
			],
			[
				'test', false, false,
				[
					$this->getGroupMock('test0'),
					$this->getGroupMock('test1'),
				],
				[],
				[],
				[],
				true,
			],
			['test', true, true, [], [], [], [], true],
			['test', true, false, [], [], [], [], true],
			[
				'test', true, true,
				[
					$this->getGroupMock('test1'),
					$this->getGroupMock('test2'),
				],
				[$this->getGroupMock('test1')],
				[],
				[['label' => 'test1', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test1']]],
				false,
			],
			[
				'test', true, false,
				[
					$this->getGroupMock('test1'),
					$this->getGroupMock('test2'),
				],
				[$this->getGroupMock('test1')],
				[],
				[],
				true,
			],
			[
				'test', true, true,
				[
					$this->getGroupMock('test'),
					$this->getGroupMock('test1'),
				],
				[$this->getGroupMock('test')],
				[['label' => 'test', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test']]],
				[],
				false,
			],
			[
				'test', true, false,
				[
					$this->getGroupMock('test'),
					$this->getGroupMock('test1'),
				],
				[$this->getGroupMock('test')],
				[['label' => 'test', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test']]],
				[],
				true,
			],
			[
				'test', true, true,
				[
					$this->getGroupMock('test'),
					$this->getGroupMock('test1'),
				],
				[$this->getGroupMock('test1')],
				[],
				[['label' => 'test1', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test1']]],
				false,
			],
			[
				'test', true, false,
				[
					$this->getGroupMock('test'),
					$this->getGroupMock('test1'),
				],
				[$this->getGroupMock('test1')],
				[],
				[],
				true,
			],
			[
				'test', true, true,
				[
					$this->getGroupMock('test'),
					$this->getGroupMock('test1'),
				],
				[$this->getGroupMock('test'), $this->getGroupMock('test0'), $this->getGroupMock('test1')],
				[['label' => 'test', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test']]],
				[['label' => 'test1', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test1']]],
				false,
			],
			[
				'test', true, false,
				[
					$this->getGroupMock('test'),
					$this->getGroupMock('test1'),
				],
				[$this->getGroupMock('test'), $this->getGroupMock('test0'), $this->getGroupMock('test1')],
				[['label' => 'test', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test']]],
				[],
				true,
			],
			[
				'test', true, true,
				[
					$this->getGroupMock('test0'),
					$this->getGroupMock('test1'),
				],
				[$this->getGroupMock('test'), $this->getGroupMock('test0'), $this->getGroupMock('test1')],
				[],
				[
					['label' => 'test0', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test0']],
					['label' => 'test1', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test1']],
				],
				false,
			],
			[
				'test', true, false,
				[
					$this->getGroupMock('test0'),
					$this->getGroupMock('test1'),
				],
				[$this->getGroupMock('test'), $this->getGroupMock('test0'), $this->getGroupMock('test1')],
				[],
				[],
				true,
			],
			[
				'test', true, true,
				[
					$this->getGroupMock('test0'),
					$this->getGroupMock('test1'),
				],
				[$this->getGroupMock('test'), $this->getGroupMock('test0'), $this->getGroupMock('test1')],
				[],
				[
					['label' => 'test0', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test0']],
					['label' => 'test1', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test1']],
				],
				false,
			],
			[
				'test', true, false,
				[
					$this->getGroupMock('test0'),
					$this->getGroupMock('test1'),
				],
				[$this->getGroupMock('test'), $this->getGroupMock('test0'), $this->getGroupMock('test1')],
				[],
				[],
				true,
			],
			// group enumeration restricted to group memberships
			[
				// partial search
				'test', false, true,
				// group results
				[
					$this->getGroupMock('test0'),
				],
				// user group memberships
				[$this->getGroupMock('test0'), $this->getGroupMock('anothergroup')],
				// exact expected
				[],
				// non-exact expected
				[
					['label' => 'test0', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test0']],
				],
				true,
				true
			],
			[
				// exact match
				'test0', false, true,
				// group results
				[$this->getGroupMock('test0')],
				// user group memberships
				[$this->getGroupMock('test')],
				// exact expected
				[
					['label' => 'test0', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test0']],
				],
				// non-exact expected
				[],
				true,
				true
			],
			[
				// check with group blacklist (not exact match)
				'test', false, true,
				[
					$this->getGroupMock('test'),
					$this->getGroupMock('test0'),
					$this->getGroupMock('test1'),
				],
				[$this->getGroupMock('test'), $this->getGroupMock('test0'), $this->getGroupMock('test1')],
				[
					['label' => 'test', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test']],
				],
				[
					['label' => 'test0', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test0']],
				],
				false,
				false,
				['test1']
			],
			[
				// check with group blacklist (exact match)
				'test', false, true,
				[
					$this->getGroupMock('test'),
					$this->getGroupMock('test0'),
					$this->getGroupMock('test1'),
				],
				[$this->getGroupMock('test'), $this->getGroupMock('test0'), $this->getGroupMock('test1')],
				[],
				[
					['label' => 'test0', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test0']],
					['label' => 'test1', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test1']],
				],
				false,
				false,
				['test']
			],
			[
				// check with group blacklist (both exact and not)
				'test', false, true,
				[
					$this->getGroupMock('test'),
					$this->getGroupMock('test0'),
					$this->getGroupMock('test1'),
				],
				[$this->getGroupMock('test'), $this->getGroupMock('test0'), $this->getGroupMock('test1')],
				[],
				[
					['label' => 'test0', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'test0']],
				],
				false,
				false,
				['test', 'test1']
			],
		];
	}

	/**
	 * @dataProvider dataGetGroups
	 *
	 * @param string $searchTerm
	 * @param bool $shareWithGroupOnly
	 * @param bool $shareeEnumeration
	 * @param array $groupResponse group manager search response
	 * @param array $userGroupsResponse user's group memberships
	 * @param array $exactExpected
	 * @param array $expected
	 * @param bool $reachedEnd
	 * @param bool $shareeEnumerationGroupMembers
	 * @param array $blacklistedGroupNames list with the names of the blacklisted groups
	 */
	public function testGetGroups(
		$searchTerm,
		$shareWithMembershipGroupOnly,
		$shareeEnumeration,
		$groupResponse,
		$userGroupsResponse,
		$exactExpected,
		$expected,
		$reachedEnd,
		$shareeEnumerationGroupMembers = false,
		$blacklistedGroupNames = []
	) {
		$this->invokePrivate($this->sharees, 'limit', [2]);
		$this->invokePrivate($this->sharees, 'offset', [0]);
		$this->invokePrivate($this->sharees, 'shareWithMembershipGroupOnly', [$shareWithMembershipGroupOnly]);
		$this->invokePrivate($this->sharees, 'shareeEnumeration', [$shareeEnumeration]);
		$this->invokePrivate($this->sharees, 'shareeEnumerationGroupMembers', [$shareeEnumerationGroupMembers]);

		$this->groupManager->expects($this->once())
			->method('search')
			->with($searchTerm, $this->invokePrivate($this->sharees, 'limit'), $this->invokePrivate($this->sharees, 'offset'))
			->willReturn($groupResponse);

		$getGroupValueMap = \array_map(function ($group) {
			return [$group->getGID(), $group];
		}, $groupResponse);

		$this->groupManager->method('get')
			->will($this->returnValueMap($getGroupValueMap));

		if ($shareWithMembershipGroupOnly || $shareeEnumerationGroupMembers) {
			$user = $this->getUserMock('admin', 'Administrator');
			$this->session->expects($this->any())
				->method('getUser')
				->willReturn($user);

			$numGetUserGroupsCalls = empty($groupResponse) ? 0 : 1;
			$this->groupManager->expects($this->exactly($numGetUserGroupsCalls))
				->method('getUserGroups')
				->with($user)
				->willReturn($userGroupsResponse);
		}

		// don't care about the particular implementation of the method
		// just mark the group as blacklisted based on the displayname
		$this->sharingBlacklist->method('isGroupBlacklisted')
			->will($this->returnCallback(function (IGroup $group) use ($blacklistedGroupNames) {
				return \in_array($group->getDisplayName(), $blacklistedGroupNames, true);
			}));

		$this->invokePrivate($this->sharees, 'getGroups', [$searchTerm]);
		$result = $this->invokePrivate($this->sharees, 'result');

		$this->assertEquals($exactExpected, $result['exact']['groups']);
		$this->assertEquals($expected, $result['groups']);
		$this->assertCount((int) $reachedEnd, $this->invokePrivate($this->sharees, 'reachedEndFor'));
	}

	public function dataGetRemote() {
		return [
			// #0
			['test', [], true, [], [], true],
			// #1
			['test', [], false, [], [], true],
			// #2
			[
				'test@remote',
				[],
				true,
				[
					['label' => 'test@remote', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'test@remote']],
				],
				[],
				true,
			],
			// #3
			[
				'test@remote',
				[],
				false,
				[
					['label' => 'test@remote', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'test@remote']],
				],
				[],
				true,
			],
			// #4
			[
				'test',
				[
					[
						'FN' => 'User3 @ Localhost',
					],
					[
						'FN' => 'User2 @ Localhost',
						'CLOUD' => [
						],
					],
					[
						'FN' => 'User @ Localhost',
						'CLOUD' => [
							'username@localhost',
						],
					],
				],
				true,
				[],
				[
					['label' => 'User @ Localhost', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'username@localhost', 'server' => 'localhost']],
				],
				true,
			],
			// #5
			[
				'test',
				[
					[
						'FN' => 'User3 @ Localhost',
					],
					[
						'FN' => 'User2 @ Localhost',
						'CLOUD' => [
						],
					],
					[
						'FN' => 'User @ Localhost',
						'CLOUD' => [
							'username@localhost',
						],
					],
				],
				false,
				[],
				[],
				true,
			],
			// #6
			[
				'test@remote',
				[
					[
						'FN' => 'User3 @ Localhost',
					],
					[
						'FN' => 'User2 @ Localhost',
						'CLOUD' => [
						],
					],
					[
						'FN' => 'User @ Localhost',
						'CLOUD' => [
							'username@localhost',
						],
					],
				],
				true,
				[
					['label' => 'test@remote', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'test@remote']],
				],
				[
					['label' => 'User @ Localhost', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'username@localhost', 'server' => 'localhost']],
				],
				true,
			],
			// #7
			[
				'test@remote',
				[
					[
						'FN' => 'User3 @ Localhost',
					],
					[
						'FN' => 'User2 @ Localhost',
						'CLOUD' => [
						],
					],
					[
						'FN' => 'User @ Localhost',
						'CLOUD' => [
							'username@localhost',
						],
					],
				],
				false,
				[
					['label' => 'test@remote', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'test@remote']],
				],
				[],
				true,
			],
			// #8
			[
				'username@localhost',
				[
					[
						'FN' => 'User3 @ Localhost',
					],
					[
						'FN' => 'User2 @ Localhost',
						'CLOUD' => [
						],
					],
					[
						'FN' => 'User @ Localhost',
						'CLOUD' => [
							'username@localhost',
						],
					],
				],
				true,
				[
					['label' => 'User @ Localhost', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'username@localhost', 'server' => 'localhost']],
				],
				[],
				true,
			],
			// #9
			[
				'username@localhost',
				[
					[
						'FN' => 'User3 @ Localhost',
					],
					[
						'FN' => 'User2 @ Localhost',
						'CLOUD' => [
						],
					],
					[
						'FN' => 'User @ Localhost',
						'CLOUD' => [
							'username@localhost',
						],
					],
				],
				false,
				[
					['label' => 'User @ Localhost', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'username@localhost', 'server' => 'localhost']],
				],
				[],
				true,
			],
			// #10: contact with space
			[
				'user name@localhost',
				[
					[
						'FN' => 'User3 @ Localhost',
					],
					[
						'FN' => 'User2 @ Localhost',
						'CLOUD' => [
						],
					],
					[
						'FN' => 'User Name @ Localhost',
						'CLOUD' => [
							'user name@localhost',
						],
					],
				],
				false,
				[
					['label' => 'User Name @ Localhost', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'user name@localhost', 'server' => 'localhost']],
				],
				[],
				true,
			],
			// #11: remote with space, no contact
			[
				'user space@remote',
				[
					[
						'FN' => 'User3 @ Localhost',
					],
					[
						'FN' => 'User2 @ Localhost',
						'CLOUD' => [
						],
					],
					[
						'FN' => 'User @ Localhost',
						'CLOUD' => [
							'username@localhost',
						],
					],
				],
				false,
				[
					['label' => 'user space@remote', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'user space@remote']],
				],
				[],
				true,
			],
			// #12: if no user found and domain name matches local domain, keep remote entry
			[
				'test@trusted.domain.tld',
				[],
				true,
				[
					['label' => 'test@trusted.domain.tld', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'test@trusted.domain.tld']],
				],
				[],
				true,
				[]
			],
			// #13: if no user found and domain name does not match local domain, keep remote entry
			[
				'test@domain.tld',
				[],
				true,
				[
					['label' => 'test@domain.tld', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'test@domain.tld']],
				],
				[],
				true,
				[]
			],
			// #14: if exact user found and domain name matches local domain, skip generated remote entry
			[
				'test@trusted.domain.tld',
				[],
				true,
				[],
				[],
				true,
				[
					'users' => [
						['label' => 'test@domain.tld', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test@domain.tld']],
					]
				]
			],
			// #15: if exact user found but with a non-local domain, keep the remote entry
			[
				'test@domain.tld',
				[],
				true,
				[
					['label' => 'test@domain.tld', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'test@domain.tld']],
				],
				[],
				true,
				[
					'users' => [
						['label' => 'test@domain.tld', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test@domain.tld']],
					]
				]
			],
			// #16 check email property is matched for remote users
			[
				'user@example.com',
				[
					[
						'FN' => 'User3 @ Localhost',
					],
					[
						'FN' => 'User2 @ Localhost',
						'CLOUD' => [
						],
					],
					[
						'FN' => 'User @ Localhost',
						'CLOUD' => [
							'username@localhost',
						],
						'EMAIL' => 'user@example.com'
					],
				],
				true,
				[
					['label' => 'User @ Localhost', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'username@localhost', 'server' => 'localhost']],
					['label' => 'user@example.com', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'user@example.com']]
				],
				[],
				true,
			],
		];
	}

	/**
	 * @dataProvider dataGetRemote
	 *
	 * @param string $searchTerm
	 * @param array $contacts
	 * @param bool $shareeEnumeration
	 * @param array $exactExpected
	 * @param array $expected
	 * @param bool $reachedEnd
	 * @param array $previousExact
	 */
	public function testGetRemote($searchTerm, $contacts, $shareeEnumeration, $exactExpected, $expected, $reachedEnd, $previousExact = []) {

		// Set the limit and offset for remote user searching
		$this->invokePrivate($this->sharees, 'limit', [2]);
		$this->invokePrivate($this->sharees, 'offset', [0]);

		$this->config->expects($this->any())
			->method('getSystemValue')
			->with('trusted_domains')
			->willReturn(['trusted.domain.tld', 'trusted2.domain.tld']);
		// inject previous results if needed
		if (!empty($previousExact)) {
			$result = $this->invokePrivate($this->sharees, 'result');
			$result['exact'] = \array_merge($result['exact'], $previousExact);
			$this->invokePrivate($this->sharees, 'result', [$result]);
		}

		$this->config->expects($this->once())
			->method('getAppValue')
			->with('dav', 'remote_search_properties')
			->willReturn('EMAIL,CLOUD,FN');

		$this->invokePrivate($this->sharees, 'shareeEnumeration', [$shareeEnumeration]);
		$this->contactsManager->expects($this->any())
			->method('search')
			->with($searchTerm, ['EMAIL', 'CLOUD', 'FN'], [], 2, 0)
			->willReturn($contacts);

		$this->invokePrivate($this->sharees, 'getRemote', [$searchTerm]);
		$result = $this->invokePrivate($this->sharees, 'result');

		$this->assertEquals($exactExpected, $result['exact']['remotes']);
		$this->assertEquals($expected, $result['remotes']);
		$this->assertCount((int) $reachedEnd, $this->invokePrivate($this->sharees, 'reachedEndFor'));
	}

	public function dataSearch() {
		$allTypes = [Share::SHARE_TYPE_USER, Share::SHARE_TYPE_GROUP, Share::SHARE_TYPE_REMOTE];

		return [
			[[], '', 'yes', true, '', null, $allTypes, 1, 200, false, true, true],

			// Test itemType
			[[
				'search' => '',
			], '', 'yes', true, '', null, $allTypes, 1, 200, false, true, true],
			[[
				'search' => 'foobar',
			], '', 'yes', true, 'foobar', null, $allTypes, 1, 200, false, true, true],
			[[
				'search' => 0,
			], '', 'yes', true, '0', null, $allTypes, 1, 200, false, true, true],

			// Test itemType
			[[
				'itemType' => '',
			], '', 'yes', true, '', '', $allTypes, 1, 200, false, true, true],
			[[
				'itemType' => 'folder',
			], '', 'yes', true, '', 'folder', $allTypes, 1, 200, false, true, true],
			[[
				'itemType' => 0,
			], '', 'yes', true, '', '0', $allTypes, 1, 200, false, true, true],

			// Test shareType
			[[
			], '', 'yes', true, '', null, $allTypes, 1, 200, false, true, true],
			[[
				'shareType' => 0,
			], '', 'yes', true, '', null, [0], 1, 200, false, true, true],
			[[
				'shareType' => '0',
			], '', 'yes', true, '', null, [0], 1, 200, false, true, true],
			[[
				'shareType' => 1,
			], '', 'yes', true, '', null, [1], 1, 200, false, true, true],
			[[
				'shareType' => 12,
			], '', 'yes', true, '', null, [], 1, 200, false, true, true],
			[[
				'shareType' => 'foobar',
			], '', 'yes', true, '', null, $allTypes, 1, 200, false, true, true],
			[[
				'shareType' => [0, 1, 2],
			], '', 'yes', true, '', null, [0, 1], 1, 200, false, true, true],
			[[
				'shareType' => [0, 1],
			], '', 'yes', true, '', null, [0, 1], 1, 200, false, true, true],
			[[
				'shareType' => $allTypes,
			], '', 'yes', true, '', null, $allTypes, 1, 200, false, true, true],
			[[
				'shareType' => $allTypes,
			], '', 'yes', false, '', null, [0, 1], 1, 200, false, true, true],
			[[
				'shareType' => $allTypes,
			], '', 'yes', true, '', null, [0, 6], 1, 200, false, true, false],
			[[
				'shareType' => $allTypes,
			], '', 'yes', false, '', null, [0], 1, 200, false, true, false],

			// Test pagination
			[[
				'page' => 1,
			], '', 'yes', true, '', null, $allTypes, 1, 200, false, true, true],
			[[
				'page' => 10,
			], '', 'yes', true, '', null, $allTypes, 10, 200, false, true, true],

			// Test perPage
			[[
				'perPage' => 1,
			], '', 'yes', true, '', null, $allTypes, 1, 1, false, true, true],
			[[
				'perPage' => 10,
			], '', 'yes', true, '', null, $allTypes, 1, 10, false, true, true],

			// Test $shareWithGroupOnly setting
			[[], 'no', 'yes',  true, '', null, $allTypes, 1, 200, false, true, true],
			[[], 'yes', 'yes', true, '', null, $allTypes, 1, 200, true, true, true],

			// Test $shareeEnumeration setting
			[[], 'no', 'yes',  true, '', null, $allTypes, 1, 200, false, true, true],
			[[], 'no', 'no', true, '', null, $allTypes, 1, 200, false, false, true],

			// Test keep case for search
			[[
				'search' => 'foo@example.com/ownCloud',
			], '', 'yes', true, 'foo@example.com/ownCloud', null, $allTypes, 1, 200, false, true, true],
		];
	}

	public function dataSearchInvalid() {
		//$message, $search = '', $itemType = null, $page = 1, $perPage = 200
		return [
			// Test invalid pagination
			['Invalid page', '', null, 0],
			['Invalid page', '', null, -1],

			// Test invalid perPage
			['Invalid perPage argument', '', null, 1, 0],
			['Invalid perPage argument', '', null, 1, -1],
		];
	}

	/**
	 * @dataProvider dataSearchInvalid
	 *
	 * @param array $getData
	 * @param string $message
	 */
	public function testSearchInvalid($message, $search = '', $itemType = null, $page = 1, $perPage = 200) {
		/** @var ShareesController | \PHPUnit\Framework\MockObject\MockObject $sharees */
		$sharees = $this->getMockBuilder(ShareesController::class)
			->setConstructorArgs([
				'files_sharing',
				$this->getMockBuilder('OCP\IRequest')->disableOriginalConstructor()->getMock(),
				$this->groupManager,
				$this->userManager,
				$this->contactsManager,
				$this->config,
				$this->session,
				$this->getMockBuilder('OCP\IURLGenerator')->disableOriginalConstructor()->getMock(),
				$this->getMockBuilder('OCP\ILogger')->disableOriginalConstructor()->getMock(),
				$this->shareManager,
				$this->sharingBlacklist,
				$this->getMockBuilder(FederatedShareProvider::class)->disableOriginalConstructor()->getMock()
			])
			->setMethods(['searchSharees', 'isRemoteSharingAllowed'])
			->getMock();
		$sharees->expects($this->never())
			->method('searchSharees');
		$sharees->expects($this->never())
			->method('isRemoteSharingAllowed');

		$ocs = $sharees->search($search, $itemType, $page, $perPage);
		$this->assertOCSError($ocs, $message);
	}

	public function dataIsRemoteSharingAllowed() {
		return [
			['file', true],
			['folder', true],
			['', false],
			['contacts', false],
		];
	}

	/**
	 * @dataProvider dataIsRemoteSharingAllowed
	 *
	 * @param string $itemType
	 * @param bool $expected
	 */
	public function testIsRemoteSharingAllowed($itemType, $expected) {
		$this->assertSame($expected, $this->invokePrivate($this->sharees, 'isRemoteSharingAllowed', [$itemType]));
	}

	public function dataSearchSharees() {
		return [
			['test', 'folder', [Share::SHARE_TYPE_USER, Share::SHARE_TYPE_GROUP, Share::SHARE_TYPE_REMOTE], 1, 2, false, [], [], [],
				[
					'exact' => ['users' => [], 'groups' => [], 'remotes' => []],
					'users' => [],
					'groups' => [],
					'remotes' => [],
				], false],
			['test', 'folder', [Share::SHARE_TYPE_USER, Share::SHARE_TYPE_GROUP, Share::SHARE_TYPE_REMOTE], 1, 2, false, [], [], [],
				[
					'exact' => ['users' => [], 'groups' => [], 'remotes' => []],
					'users' => [],
					'groups' => [],
					'remotes' => [],
				], false],
			[
				'test', 'folder', [Share::SHARE_TYPE_USER, Share::SHARE_TYPE_GROUP, Share::SHARE_TYPE_REMOTE], 1, 2, false, [
					['label' => 'test One', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test1']],
				], [
					['label' => 'testgroup1', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'testgroup1']],
				], [
					['label' => 'testz@remote', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'testz@remote']],
				],
				[
					'exact' => ['users' => [], 'groups' => [], 'remotes' => []],
					'users' => [
						['label' => 'test One', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test1']],
					],
					'groups' => [
						['label' => 'testgroup1', 'value' => ['shareType' => Share::SHARE_TYPE_GROUP, 'shareWith' => 'testgroup1']],
					],
					'remotes' => [
						['label' => 'testz@remote', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'testz@remote']],
					],
				], true,
			],
			// No groups requested
			[
				'test', 'folder', [Share::SHARE_TYPE_USER, Share::SHARE_TYPE_REMOTE], 1, 2, false, [
					['label' => 'test One', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test1']],
				], null, [
					['label' => 'testz@remote', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'testz@remote']],
				],
				[
					'exact' => ['users' => [], 'groups' => [], 'remotes' => []],
					'users' => [
						['label' => 'test One', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test1']],
					],
					'groups' => [],
					'remotes' => [
						['label' => 'testz@remote', 'value' => ['shareType' => Share::SHARE_TYPE_REMOTE, 'shareWith' => 'testz@remote']],
					],
				], false,
			],
			// Share type restricted to user - Only one user
			[
				'test', 'folder', [Share::SHARE_TYPE_USER], 1, 2, false, [
					['label' => 'test One', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test1']],
				], null, null,
				[
					'exact' => ['users' => [], 'groups' => [], 'remotes' => []],
					'users' => [
						['label' => 'test One', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test1']],
					],
					'groups' => [],
					'remotes' => [],
				], false,
			],
			// Share type restricted to user - Multipage result
			[
				'test', 'folder', [Share::SHARE_TYPE_USER], 1, 2, false, [
					['label' => 'test 1', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test1']],
					['label' => 'test 2', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test2']],
				], null, null,
				[
					'exact' => ['users' => [], 'groups' => [], 'remotes' => []],
					'users' => [
						['label' => 'test 1', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test1']],
						['label' => 'test 2', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'test2']],
					],
					'groups' => [],
					'remotes' => [],
				], true,
			],
		];
	}

	/**
	 * @dataProvider dataSearchSharees
	 *
	 * @param string $searchTerm
	 * @param string $itemType
	 * @param array $shareTypes
	 * @param int $page
	 * @param int $perPage
	 * @param bool $shareWithGroupOnly
	 * @param array $mockedUserResult
	 * @param array $mockedGroupsResult
	 * @param array $mockedRemotesResult
	 * @param array $expected
	 * @param bool $nextLink
	 */
	public function testSearchSharees($searchTerm, $itemType, array $shareTypes, $page, $perPage, $shareWithGroupOnly,
									  $mockedUserResult, $mockedGroupsResult, $mockedRemotesResult, $expected, $nextLink) {
		/** @var \PHPUnit\Framework\MockObject\MockObject | ShareesController $sharees */
		$sharees = $this->getMockBuilder(ShareesController::class)
			->setConstructorArgs([
				'files_sharing',
				$this->getMockBuilder(IRequest::class)->disableOriginalConstructor()->getMock(),
				$this->groupManager,
				$this->userManager,
				$this->contactsManager,
				$this->config,
				$this->session,
				$this->getMockBuilder(IURLGenerator::class)->disableOriginalConstructor()->getMock(),
				$this->getMockBuilder(ILogger::class)->disableOriginalConstructor()->getMock(),
				$this->shareManager,
				$this->sharingBlacklist,
				$this->getMockBuilder(FederatedShareProvider::class)->disableOriginalConstructor()->getMock()
			])
			->setMethods(['getShareesForShareIds', 'getUsers', 'getGroups', 'getRemote'])
			->getMock();
		$sharees->expects(($mockedUserResult === null) ? $this->never() : $this->once())
			->method('getUsers')
			->with($searchTerm)
			->willReturnCallback(function () use ($sharees, $mockedUserResult) {
				$result = $this->invokePrivate($sharees, 'result');
				$result['users'] = $mockedUserResult;
				$this->invokePrivate($sharees, 'result', [$result]);
			});
		$sharees->expects(($mockedGroupsResult === null) ? $this->never() : $this->once())
			->method('getGroups')
			->with($searchTerm)
			->willReturnCallback(function () use ($sharees, $mockedGroupsResult) {
				$result = $this->invokePrivate($sharees, 'result');
				$result['groups'] = $mockedGroupsResult;
				$this->invokePrivate($sharees, 'result', [$result]);
			});
		$sharees->expects(($mockedRemotesResult === null) ? $this->never() : $this->once())
			->method('getRemote')
			->with($searchTerm)
			->willReturnCallback(function () use ($sharees, $mockedRemotesResult) {
				$result = $this->invokePrivate($sharees, 'result');
				$result['remotes'] = $mockedRemotesResult;
				$this->invokePrivate($sharees, 'result', [$result]);
			});

		$ocs = $this->invokePrivate($sharees, 'searchSharees', [$searchTerm, $itemType, $shareTypes, $page, $perPage, $shareWithGroupOnly]);
		$this->assertEquals($expected, $ocs->getData()['data']);

		// Check if next link is set
		if ($nextLink) {
			$headers = $ocs->getHeaders();
			$this->assertArrayHasKey('Link', $headers);
			$this->assertStringStartsWith('<', $headers['Link']);
			$this->assertStringEndsWith('>; rel="next"', $headers['Link']);
		}
	}

	public function testSearchShareesNoItemType() {
		$ocs = $this->invokePrivate($this->sharees, 'searchSharees', ['', null, [], [], 0, 0, false]);
		$this->assertOCSError($ocs, 'Missing itemType');
	}

	public function dataGetPaginationLink() {
		return [
			[1, '/ocs/v1.php', ['perPage' => 2], '<?perPage=2&page=2>; rel="next"'],
			[10, '/ocs/v2.php', ['perPage' => 2], '<?perPage=2&page=11>; rel="next"'],
		];
	}

	/**
	 * @dataProvider dataGetPaginationLink
	 *
	 * @param int $page
	 * @param string $scriptName
	 * @param array $params
	 * @param array $expected
	 */
	public function testGetPaginationLink($page, $scriptName, $params, $expected) {
		$this->request->expects($this->once())
			->method('getScriptName')
			->willReturn($scriptName);

		$this->assertEquals($expected, $this->invokePrivate($this->sharees, 'getPaginationLink', [$page, $params]));
	}

	public function dataIsV2() {
		return [
			['/ocs/v1.php', false],
			['/ocs/v2.php', true],
		];
	}

	/**
	 * @dataProvider dataIsV2
	 *
	 * @param string $scriptName
	 * @param bool $expected
	 */
	public function testIsV2($scriptName, $expected) {
		$this->request->expects($this->once())
			->method('getScriptName')
			->willReturn($scriptName);

		$this->assertEquals($expected, $this->invokePrivate($this->sharees, 'isV2'));
	}

	/**
	 * @param array $ocs
	 * @param string $message
	 */
	protected function assertOCSError(array $ocs, $message) {
		$this->assertSame(Http::STATUS_BAD_REQUEST, $ocs['statuscode'], 'Expected status code 400');
		$this->assertArrayNotHasKey('data', $ocs, 'Expected that no data is send');

		$this->assertArrayHasKey('message', $ocs);
		$this->assertSame($message, $ocs['message']);
	}

	/**
	 * @dataProvider dataTestSplitUserRemote
	 *
	 * @param string $remote
	 * @param string $expectedUser
	 * @param string $expectedUrl
	 */
	public function testSplitUserRemote($remote, $expectedUser, $expectedUrl) {
		list($remoteUser, $remoteUrl) = $this->sharees->splitUserRemote($remote);
		$this->assertSame($expectedUser, $remoteUser);
		$this->assertSame($expectedUrl, $remoteUrl);
	}

	public function dataTestSplitUserRemote() {
		$userPrefix = ['user@name', 'username'];
		$protocols = ['', 'http://', 'https://'];
		$remotes = [
			'localhost',
			'local.host',
			'dev.local.host',
			'dev.local.host/path',
			'dev.local.host/at@inpath',
			'127.0.0.1',
			'::1',
			'::192.0.2.128',
			'::192.0.2.128/at@inpath',
		];

		$testCases = [];
		foreach ($userPrefix as $user) {
			foreach ($remotes as $remote) {
				foreach ($protocols as $protocol) {
					$baseUrl = $user . '@' . $protocol . $remote;

					$testCases[] = [$baseUrl, $user, $protocol . $remote];
					$testCases[] = [$baseUrl . '/', $user, $protocol . $remote];
					$testCases[] = [$baseUrl . '/index.php', $user, $protocol . $remote];
					$testCases[] = [$baseUrl . '/index.php/s/token', $user, $protocol . $remote];
				}
			}
		}
		return $testCases;
	}

	public function dataTestSplitUserRemoteError() {
		return [
			// Invalid path
			['user@'],

			// Invalid user
			['@server'],
			['us/er@server'],
			['us:er@server'],

			// Invalid splitting
			['user'],
			[''],
			['us/erserver'],
			['us:erserver'],
		];
	}

	/**
	 * @dataProvider dataTestSplitUserRemoteError
	 *
	 * @param string $id
	 * @expectedException \Exception
	 */
	public function testSplitUserRemoteError($id) {
		$this->sharees->splitUserRemote($id);
	}

	/**
	 * @dataProvider dataTestFixRemoteUrl
	 *
	 * @param string $url
	 * @param string $expected
	 */
	public function testFixRemoteUrl($url, $expected) {
		$this->assertSame($expected,
			$this->invokePrivate($this->sharees, 'fixRemoteURL', [$url])
		);
	}

	public function dataTestFixRemoteUrl() {
		return [
			['http://localhost', 'http://localhost'],
			['http://localhost/', 'http://localhost'],
			['http://localhost/index.php', 'http://localhost'],
			['http://localhost/index.php/s/AShareToken', 'http://localhost'],
		];
	}

	public function testGetUserWithSearchAttributes() {
		$this->invokePrivate($this->sharees, 'limit', [2]);
		$this->invokePrivate($this->sharees, 'offset', [0]);
		$this->invokePrivate($this->sharees, 'shareWithGroupOnly', [false]);
		$this->invokePrivate($this->sharees, 'shareeEnumeration', [false]);
		$this->invokePrivate($this->sharees, 'shareeEnumerationGroupMembers', [false]);

		// User with more search term
		$user = $this->getUserMock('testBob', 'Bob', 'bob@example.com', ['alt@example.com']);
		$this->session->expects($this->any())
			->method('getUser')
			->willReturn($user);

		// Do an exact search for a search term
		$searchTerm = 'alt@example.com';

		$this->userManager->expects($this->once())
			->method('find')
			->with(
				$searchTerm,
					$this->invokePrivate($this->sharees, 'limit'),
					$this->invokePrivate($this->sharees, 'offset'))
			->willReturn([$user]);

		$exactExpected = [['label' => 'Bob', 'value' => ['shareType' => Share::SHARE_TYPE_USER, 'shareWith' => 'testBob']]];
		$expected = [];
		
		$this->invokePrivate($this->sharees, 'getUsers', [$searchTerm]);
		$result = $this->invokePrivate($this->sharees, 'result');
		$this->assertEquals($exactExpected, $result['exact']['users']);
		$this->assertEquals($expected, $result['users']);
		$this->assertCount((int) 1, $this->invokePrivate($this->sharees, 'reachedEndFor'));
	}

	/**
	 * Test with User from an excluded group
	 *
	 */
	public function testExcludedGroups() {
		$user = $this->getUserMock(self::getUniqueID(), 'test');
		$this->session
			->expects($this->once())
			->method('getUser')
			->willReturn($user);

		$this->shareManager
			->expects($this->once())
			->method('sharingDisabledForUser')
			->with($user->getUID())
			->willReturn(true);

		/** @var ShareesController | \PHPUnit\Framework\MockObject\MockObject $sharees */
		$sharees = $this->getMockBuilder(ShareesController::class)
			->setConstructorArgs([
				'files_sharing',
				$this->getMockBuilder(IRequest::class)->disableOriginalConstructor()->getMock(),
				$this->groupManager,
				$this->userManager,
				$this->contactsManager,
				$this->config,
				$this->session,
				$this->getMockBuilder(IURLGenerator::class)->disableOriginalConstructor()->getMock(),
				$this->getMockBuilder(ILogger::class)->disableOriginalConstructor()->getMock(),
				$this->shareManager,
				$this->sharingBlacklist,
				$this->getMockBuilder(FederatedShareProvider::class)->disableOriginalConstructor()->getMock()
			])
			->setMethods(['getUsers', 'getGroups', 'getRemote'])
			->getMock();

		$sharees
			->expects($this->never())
			->method('getUsers');
		$sharees
			->expects($this->never())
			->method('getGroups');
		$sharees
			->expects($this->never())
			->method('getRemote');

		$result = $sharees->search($user->getUID(), 'file');
		$data = $result->getData();
		self::assertEmpty($data['data']['exact']['users']);
		self::assertEmpty($data['data']['exact']['groups']);
		self::assertEmpty($data['data']['exact']['remotes']);
		self::assertEmpty($data['data']['users']);
		self::assertEmpty($data['data']['groups']);
		self::assertEmpty($data['data']['remotes']);
	}
}
