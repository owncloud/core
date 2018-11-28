<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\Files_External\Tests\Command;

use OC\Files\External\Auth\NullMechanism;
use OC\Files\External\Auth\Password\Password;
use OC\Files\External\Auth\Password\SessionCredentials;
use OC\Files\External\StorageConfig;
use OCA\Files_External\Command\ListCommand;
use OCA\Files_External\Lib\Backend\Local;
use OCP\Files\External\Backend\InvalidBackend;
use Symfony\Component\Console\Output\BufferedOutput;

class ListCommandTest extends CommandTest {
	/**
	 * @return \OCA\Files_External\Command\ListCommand|\PHPUnit_Framework_MockObject_MockObject
	 */
	private function getInstance() {
		/** @var \OCP\Files\External\Service\IGlobalStoragesService|\PHPUnit_Framework_MockObject_MockObject $globalService */
		$globalService = $this->createMock('\OCP\Files\External\Service\IGlobalStoragesService');
		/** @var \OC\Files\External\Service\IUserStoragesService|\PHPUnit_Framework_MockObject_MockObject $userService */
		$userService = $this->createMock('\OCP\Files\External\Service\IUserStoragesService');
		/** @var \OCP\IUserManager|\PHPUnit_Framework_MockObject_MockObject $userManager */
		$userManager = $this->createMock('\OCP\IUserManager');
		/** @var \OCP\IUserSession|\PHPUnit_Framework_MockObject_MockObject $userSession */
		$userSession = $this->createMock('\OCP\IUserSession');

		return new ListCommand($globalService, $userService, $userSession, $userManager);
	}

	public function testListAuthIdentifier() {
		$l10n = $this->createMock('\OCP\IL10N', null, [], '', false);
		$session = $this->createMock('\OCP\ISession');
		$crypto = $this->createMock('\OCP\Security\ICrypto');
		$instance = $this->getInstance();
		// FIXME: use mock of IStorageConfig
		$mount1 = new StorageConfig();
		$mount1->setAuthMechanism(new Password());
		$mount1->setBackend(new Local($l10n, new NullMechanism()));
		$mount2 = new StorageConfig();
		$mount2->setAuthMechanism(new SessionCredentials($session, $crypto));
		$mount2->setBackend(new Local($l10n, new NullMechanism()));
		$input = $this->getInput($instance, [], [
			'output' => 'json'
		]);
		$output = new BufferedOutput();

		$instance->listMounts('', [$mount1, $mount2], $input, $output);
		$output = \json_decode($output->fetch(), true);

		$this->assertNotEquals($output[0]['authentication_type'], $output[1]['authentication_type']);
	}

	public function testDisplayWarningForIncomplete() {
		$l10n = $this->createMock('\OCP\IL10N', null, [], '', false);
		$session = $this->createMock('\OCP\ISession');
		$crypto = $this->createMock('\OCP\Security\ICrypto');
		$instance = $this->getInstance();
		// FIXME: use mock of IStorageConfig
		$mount1 = new StorageConfig();
		$mount1->setAuthMechanism(new Password());
		$mount1->setBackend(new InvalidBackend('InvalidId'));
		$mount2 = new StorageConfig();
		$mount2->setAuthMechanism(new SessionCredentials($session, $crypto));
		$mount2->setBackend(new Local($l10n, new NullMechanism()));
		$input = $this->getInput($instance);
		$output = new BufferedOutput();

		$instance->listMounts('', [$mount1, $mount2], $input, $output);
		$output = $output->fetch();

		$this->assertRegexp('/Number of invalid storages found/', $output);
	}

	public function providesShortView() {
		return [
			[
				['short' => true, 'output' => 'json'],
				[
					['mount_id' => 1, 'mount_point' => '/ownCloud', 'type' => 'admin'],
					['mount_id' => 2, 'mount_point' => '/SFTP', 'type' => 'personal'],
				],
				[
					['mount_id' => 1, 'mount_point' => '/ownCloud', 'type' => StorageConfig::MOUNT_TYPE_ADMIN],
					['mount_id' => 2, 'mount_point' => '/SFTP', 'type' => StorageConfig::MOUNT_TYPE_PERSONAl],
				]
			],
			[
				['short' => true],
				<<<EOS
+----------+-------------+----------+
| Mount ID | Mount Point | Type     |
+----------+-------------+----------+
| 1        | /ownCloud   | Admin    |
| 2        | /SFTP       | Personal |
+----------+-------------+----------+

EOS
				,
				[
					['mount_id' => 1, 'mount_point' => '/ownCloud', 'type' => StorageConfig::MOUNT_TYPE_ADMIN],
					['mount_id' => 2, 'mount_point' => '/SFTP', 'type' => StorageConfig::MOUNT_TYPE_PERSONAl],
				]
			],
		];
	}

	/**
	 * @dataProvider providesShortView
	 * @param $options
	 * @param $expectedResult
	 * @param $mountOptions
	 */
	public function testShortView($options, $expectedResult, $mountOptions) {
		$l10n = $this->createMock('\OCP\IL10N', null, [], '', false);
		$session = $this->createMock('\OCP\ISession');
		$crypto = $this->createMock('\OCP\Security\ICrypto');
		$instance = $this->getInstance();
		// FIXME: use mock of IStorageConfig
		$mount1 = new StorageConfig();
		$mount1->setId($mountOptions[0]['mount_id']);
		$mount1->setMountPoint($mountOptions[0]['mount_point']);
		$mount1->setType($mountOptions[0]['type']);
		$mount1->setAuthMechanism(new Password());
		$mount1->setBackend(new Local($l10n, new NullMechanism()));
		$mount2 = new StorageConfig();
		$mount2->setId($mountOptions[1]['mount_id']);
		$mount2->setMountPoint($mountOptions[1]['mount_point']);
		$mount2->setType($mountOptions[1]['type']);
		$mount2->setAuthMechanism(new SessionCredentials($session, $crypto));
		$mount2->setBackend(new Local($l10n, new NullMechanism()));
		$input = $this->getInput($instance, ['user_id' => 'user1'], $options);
		$output = new BufferedOutput();

		$instance->listMounts('user1', [$mount1, $mount2], $input, $output);
		$output = $output->fetch();
		if (isset($options['output']) && ($options['output'] === 'json')) {
			$results = \json_decode($output, true);
			$countResults = \count($results);

			for ($i = 0; $i < $countResults; $i++) {
				$this->assertEquals($expectedResult[$i]['mount_id'], $results[$i]['mount_id']);
				$this->assertEquals($expectedResult[$i]['mount_point'], $results[$i]['mount_point']);
				$this->assertEquals($expectedResult[$i]['type'], $results[$i]['type']);
			}
		} else {
			$this->assertEquals($expectedResult, $output);
		}
	}
}
