<?php
/**
 * @copyright Copyright (c) 2023, ownCloud GmbH
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
namespace OCA\Files_External\Tests\Controller;

use OCA\Files_External\Controller\ApplicableController;
use OCP\AppFramework\Http;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\JSONResponse;
use OCP\IRequest;
use OCP\IUserManager;
use OCP\IGroupManager;
use OCP\IGroup;
use OCP\IUser;
use PHPUnit\Framework\MockObject\MockObject;

class ApplicableControllerTest extends \Test\TestCase {
	/** @var IRequest */
	private $request;
	/** @var IUserManager */
	private $userManager;
	/** @var IGroupManager */
	private $groupManager;
	/** @var ApplicableController */
	private $controller;

	protected function setUp(): void {
		$this->request = $this->createMock(IRequest::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->groupManager = $this->createMock(IGroupManager::class);

		$this->controller = new ApplicableController('applicableController', $this->request, $this->userManager, $this->groupManager);
	}

	/**
	 * @param string $uid the uid the mock will return
	 * @param string $displayname the displayname the mock will return
	 */
	private function createMockUser($uid, $displayname): MockObject {
		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn($uid);
		$user1->method('getDisplayName')->willReturn($displayname);
		return $user1;
	}

	/**
	 * @param string $gid the gid the mock will return
	 * @param string $displayname the displayname the mock will return
	 */
	private function createMockGroup($gid, $displayname): MockObject {
		$group1 = $this->createMock(IGroup::class);
		$group1->method('getGID')->willReturn($gid);
		$group1->method('getDisplayName')->willReturn($displayname);
		return $group1;
	}

	public function patternSearchProvider(): array {
		return [
			['', null, null],
			['', null, 44],
			['', 17, null],
			['', 17, 3],
			['pa', null, null],
			['pa', null, 44],
			['pa', 17, null],
			['pa', 17, 3],
		];
	}

	/**
	 * @dataProvider patternSearchProvider
	 */
	public function testPatternSearch($pattern, $limit, $offset): void {
		$group1 = $this->createMockGroup('S312', 'Salesmen from 2000');
		$group2 = $this->createMockGroup('S987', 'Salesmen from 2010');

		$user1 = $this->createMockUser('U1122', 'Joe Joe Jones');
		$user2 = $this->createMockUser('U1322', 'Mary Sue');

		// the patternSearch method will forward whatever results the managers send
		// so we won't test if the results match the pattern or not
		$this->groupManager->expects($this->once())
			->method('search')
			->with($pattern, $limit, $offset)
			->willReturn([$group1, $group2]);

		$this->userManager->expects($this->once())
			->method('searchDisplayName')
			->with($pattern, $limit, $offset)
			->willReturn([$user1, $user2]);

		$expected = [
			'groups' => ['S312' => 'Salesmen from 2000', 'S987' => 'Salesmen from 2010'],
			'users' => ['U1122' => 'Joe Joe Jones', 'U1322' => 'Mary Sue'],
			'status' => 'success',
		];

		$response = $this->controller->patternSearch($pattern, $limit, $offset);
		$this->assertSame(Http::STATUS_OK, $response->getStatus());
		$this->assertEquals($expected, $response->getData());
	}

	public function testUserDisplayName(): void {
		$user1 = $this->createMockUser('U1122', 'Joe Joe Jones');
		$user2 = $this->createMockUser('U1322', 'Mary Sue');
		$user3 = $this->createMockUser('U3322', 'Carl Winston');

		$this->userManager->expects($this->exactly(3))
			->method('get')
			->will($this->onConsecutiveCalls($user1, $user2, null));

		$expected = [
			'users' => ['U1122' => 'Joe Joe Jones', 'U1322' => 'Mary Sue'],
			'status' => 'success',
		];

		$response = $this->controller->userDisplayNames(['U1122', 'U1322', 'U3322']);
		$this->assertSame(Http::STATUS_OK, $response->getStatus());
		$this->assertEquals($expected, $response->getData());
	}

	public function testGroupDisplayName(): void {
		$group1 = $this->createMockGroup('S122', 'Sales');
		$group2 = $this->createMockGroup('S222', 'Marketing');
		$group3 = $this->createMockGroup('S322', 'Kitchen');

		$this->groupManager->expects($this->exactly(3))
			->method('get')
			->will($this->onConsecutiveCalls($group1, $group2, null));

		$expected = [
			'groups' => ['S122' => 'Sales', 'S222' => 'Marketing'],
			'status' => 'success',
		];

		$response = $this->controller->groupDisplayNames(['S122', 'S222', 'S322']);
		$this->assertSame(Http::STATUS_OK, $response->getStatus());
		$this->assertEquals($expected, $response->getData());
	}
}
