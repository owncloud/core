<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

namespace Test\User\Service;

use OC\User\Service\PasswordGeneratorService;
use OCP\Security\ISecureRandom;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Test\TestCase;

class PasswordGeneratorServiceTest extends TestCase {
	/** @var EventDispatcherInterface */
	private $eventDispatcher;

	/** @var ISecureRandom | \PHPUnit_Framework_MockObject_MockObject */
	private $secureRandom;

	/** @var PasswordGeneratorService */
	private $passwordGeneratorService;

	protected function setUp() {
		parent::setUp();
		$this->eventDispatcher = new EventDispatcher();
		$this->secureRandom = $this->createMock(ISecureRandom::class);
		$this->passwordGeneratorService = new PasswordGeneratorService($this->eventDispatcher, $this->secureRandom);
	}

	public function testCreatePasswordWithoutListener() {
		$this->secureRandom->method('generate')
			->willReturn('123456');
		$this->assertEquals('123456', $this->passwordGeneratorService->createPassword());
	}

	public function testCreatePasswordWithListener() {
		$passwordTobeSet = "foobar123";
		$this->eventDispatcher->addListener('OCP\User::createPassword', function (GenericEvent $event) use ($passwordTobeSet) {
			$event->setArgument('password', $passwordTobeSet);
		});

		$this->assertEquals($passwordTobeSet, $this->passwordGeneratorService->createPassword());
	}
}
