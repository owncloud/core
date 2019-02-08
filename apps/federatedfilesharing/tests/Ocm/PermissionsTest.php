<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\FederatedFileSharing\Tests\Ocm;

use OCA\FederatedFileSharing\Ocm\Permissions;
use OCA\FederatedFileSharing\Tests\TestCase;
use OCP\Constants;

/**
 * Class PermissionsTest
 *
 * @package OCA\FederatedFileSharing\Tests\Ocm
 * @group DB
 */
class PermissionsTest extends TestCase {
	/**
	 * @var Permissions
	 */
	private $permissions;

	protected function setUp() {
		parent::setUp();
		$this->permissions = new Permissions();
	}

	/**
	 * @dataProvider dataTestToOcPermissions
	 *
	 * @param string[] $ocmPermissions
	 * @param int $expectedOcPermissions
	 */
	public function testToOcPermissions($ocmPermissions, $expectedOcPermissions) {
		$ocPermissions = $this->permissions->toOcPermissions($ocmPermissions);
		$this->assertEquals($expectedOcPermissions, $ocPermissions);
	}

	public function dataTestToOcPermissions() {
		return [
			[
				[
					Permissions::OCM_PERMISSION_READ,
					Permissions::OCM_PERMISSION_WRITE,
					Permissions::OCM_PERMISSION_SHARE
				],
				Constants::PERMISSION_READ | Constants::PERMISSION_CREATE
				| Constants::PERMISSION_UPDATE | Constants::PERMISSION_SHARE
			],
			[
				[
					Permissions::OCM_PERMISSION_READ,
				],
				Constants::PERMISSION_READ
			],
			[
				[
					Permissions::OCM_PERMISSION_WRITE,
				],
				Constants::PERMISSION_CREATE | Constants::PERMISSION_UPDATE
			],
			[
				[
					Permissions::OCM_PERMISSION_SHARE,
				],
				Constants::PERMISSION_SHARE
			],
		];
	}

	/**
	 * @dataProvider dataTestToOcmPermissions
	 *
	 * @param int $ocPermissions
	 * @param string[] $expectedOcmPermissions
	 */
	public function testToOcmPermissions($ocPermissions, $expectedOcmPermissions) {
		$ocmPermissions = $this->permissions->toOcmPermissions($ocPermissions);
		$this->assertEquals($expectedOcmPermissions, $ocmPermissions);
	}

	public function dataTestToOcmPermissions() {
		return [
			[
				Constants::PERMISSION_ALL,
				[
					Permissions::OCM_PERMISSION_READ,
					Permissions::OCM_PERMISSION_WRITE,
					Permissions::OCM_PERMISSION_SHARE
				]
			],
			[
				Constants::PERMISSION_READ,
				[
					Permissions::OCM_PERMISSION_READ,
				]
			],
			[
				Constants::PERMISSION_UPDATE,
				[
					Permissions::OCM_PERMISSION_WRITE,
				]
			],
			[
				Constants::PERMISSION_CREATE,
				[
					Permissions::OCM_PERMISSION_WRITE,
				]
			],
			[
				Constants::PERMISSION_SHARE,
				[
					Permissions::OCM_PERMISSION_SHARE,
				]
			],
		];
	}
}
