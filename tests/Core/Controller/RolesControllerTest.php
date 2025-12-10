<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace Tests\Core\Controller;

use OC\Core\Controller\RolesController;
use OCP\IL10N;
use OCP\IRequest;
use OCP\Roles\AddRolesEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Test\TestCase;

/**
 * Class RolesControllerTest
 *
 * @package OC\Core\Controller
 */
class RolesControllerTest extends TestCase {
	public function testGetAvatarNoAvatar() {
		$request = $this->createMock(IRequest::class);
		$l10n = $this->createMock(IL10N::class);
		$eventDispatcher = $this->createMock(EventDispatcherInterface::class);
		$controller = new RolesController('core', $request, $l10n, $eventDispatcher);

		$l10n->method('t')->willReturnArgument(0);
		$eventDispatcher->method('dispatch')->willReturnCallback(function ($event) {
			$this->assertInstanceOf(AddRolesEvent::class, $event);
			$event->addRole([
				'id' => 'test.tester',
				'displayName' => 'A tester which tests ....'
			]);
			return $event;
		});

		$result = $controller->getRoles();
		$data = $result['data'];
		$this->assertCount(5, $data);
		$this->assertEquals('test.tester', $data[4]['id']);
	}
}
