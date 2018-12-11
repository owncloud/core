<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

namespace OCA\SystemTags\Tests;

use OC\SystemTag\SystemTag;
use OCA\SystemTags\Activity\Listener;
use OCP\Activity\IManager;
use OCP\App\IAppManager;
use OCP\Files\Config\IMountProviderCollection;
use OCP\Files\IRootFolder;
use OCP\IGroupManager;
use OCP\IUserSession;
use OCP\SystemTag\ISystemTagManager;
use Test\TestCase;

class ListenerTest extends TestCase {
	/** @var IGroupManager | \PHPUnit_Framework_MockObject_MockObject */
	private $groupManager;
	/** @var IManager | \PHPUnit_Framework_MockObject_MockObject */
	private $activityManager;
	/** @var IUserSession | \PHPUnit_Framework_MockObject_MockObject */
	private $userSession;
	/** @var ISystemTagManager | \PHPUnit_Framework_MockObject_MockObject */
	private $tagManager;
	/** @var IAppManager | \PHPUnit_Framework_MockObject_MockObject */
	private $appManager;
	/** @var IMountProviderCollection | \PHPUnit_Framework_MockObject_MockObject */
	private $mountCollection;
	/** @var IRootFolder | \PHPUnit_Framework_MockObject_MockObject */
	private $rootFolder;
	/** @var Listener */
	private $listener;

	public function setUp() {
		parent::setUp();

		$this->groupManager = $this->createMock(IGroupManager::class);
		$this->activityManager = $this->createMock(IManager::class);
		$this->userSession = $this->createMock(IUserSession::class);
		$this->tagManager = $this->createMock(ISystemTagManager::class);
		$this->appManager = $this->createMock(IAppManager::class);
		$this->mountCollection = $this->createMock(IMountProviderCollection::class);
		$this->rootFolder = $this->createMock(IRootFolder::class);
		$this->listener = new Listener($this->groupManager, $this->activityManager,
			$this->userSession, $this->tagManager, $this->appManager,
			$this->mountCollection, $this->rootFolder);
	}

	public function prepareTagAsParameterProvider() {
		return [
			[new SystemTag('1', 'visibleTag', true, true, true), "{{{visibleTag|||assignable}}}"],
			[new SystemTag('2', 'invisibleTag', false, false, false), "{{{invisibleTag|||invisible}}}"],
			[new SystemTag('3', 'restrictTag', true, false, false), "{{{restrictTag|||not-assignable}}}"],
			[new SystemTag('3', 'staticTag', true, true, false), "{{{staticTag|||not-editable}}}"],
		];
	}

	/**
	 * @dataProvider prepareTagAsParameterProvider
	 */
	public function testPrepareTagAsParameter(SystemTag $tag, $expectedResult) {
		$result = $this->invokePrivate($this->listener, 'prepareTagAsParameter', [$tag]);
		$this->assertEquals($expectedResult, $result);
	}
}
