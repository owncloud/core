<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

namespace OCA\FederatedFileSharing\Tests\AppInfo;

use OCA\FederatedFileSharing\AppInfo\Application;
use OCA\FederatedFileSharing\FederatedShareProvider;
use OCA\FederatedFileSharing\Tests\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * @group DB
 */
class ApplicationTest extends TestCase {
	public function publicPageDataProvider() {
		return [
			[true, true],
			[false, false],
		];
	}

	/**
	 * @dataProvider publicPageDataProvider
	 *
	 * @param bool $isOutgoingSharingEnabled
	 * @param bool $isHandlerRegistered
	 */
	public function testPublicPage($isOutgoingSharingEnabled, $isHandlerRegistered) {
		$application = $this->getMockBuilder(Application::class)
			->setMethods(['getContainer', 'getServer', 'getEventDispatcher', 'getFederatedShareProvider', 'loadPublicJS'])
			->disableOriginalConstructor()
			->getMock();

		$application->method('getContainer')->willReturnSelf();
		$application->method('getServer')->willReturnSelf();
		$eventDispatcher = $this->createMock(EventDispatcherInterface::class);
		$application->method('getEventDispatcher')->willReturn($eventDispatcher);
		$fedShareProvider = $this->createMock(FederatedShareProvider::class);
		$fedShareProvider->expects($this->once())
			->method('isOutgoingServer2serverShareEnabled')
			->willReturn($isOutgoingSharingEnabled);
		$application->method('getFederatedShareProvider')->willReturn($fedShareProvider);

		if ($isHandlerRegistered === true) {
			$eventDispatcher->method('addListener')
				->withConsecutive(
					['OCP\Share\Events\AcceptShare', $this->anything()],
					['OCP\Share\Events\DeclineShare', $this->anything()],
					['OCA\Files_Sharing::loadAdditionalScripts', $this->anything()]
				);
		} else {
			$eventDispatcher->method('addListener')
				->withConsecutive(
					['OCP\Share\Events\AcceptShare', $this->anything()],
					['OCP\Share\Events\DeclineShare', $this->anything()]
				);
		}
		$application->registerListeners();
	}
}
