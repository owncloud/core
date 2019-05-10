<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace Test\Files\Mount;

use OC\Files\Mount\PreviewsMountProvider;
use OCP\Files\Storage\IStorageFactory;
use OCP\IConfig;
use OCP\IUser;
use OC\Files\Mount\MountPoint;

class PreviewsMountProviderTest extends \Test\TestCase {

	/** @var PreviewsMountPorivder */
	protected $provider;

	/** @var IConfig|\PHPUnit\Framework\MockObject\MockObject */
	protected $config;

	/** @var IUser|\PHPUnit\Framework\MockObject\MockObject */
	protected $user;

	/** @var IStorageFactory|\PHPUnit\Framework\MockObject\MockObject */
	protected $loader;

	public function setUp() {
		parent::setUp();

		$this->config = $this->createMock(IConfig::class);
		$this->user = $this->createMock(IUser::class);
		$this->loader = $this->createMock(IStorageFactory::class);

		$this->provider = new PreviewsMountProvider($this->config);
	}

	public function testConfiguredPreviewsPath() {
		$tempFolder = \OC::$server->getTempManager()->getTemporaryFolder();
		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('previews_path', '')
			->willReturn($tempFolder . '/thumbnails');

		$this->user->expects($this->any())->method('getUID')->willReturn('someuser');

		$mounts = $this->provider->getMountsForUser($this->user, $this->loader);

		$this->assertCount(1, $mounts);
		$mount = $mounts[0];

		$this->assertInstanceOf(MountPoint::class, $mount);
		$this->assertEquals('/someuser/thumbnails/', $mount->getMountPoint());

		$this->assertTrue(\is_dir($tempFolder . '/thumbnails/someuser'));

		$storageArgs = ['datadir' => $tempFolder . '/thumbnails/someuser'];

		$this->loader->expects($this->once())
			->method('getInstance')
			->with($mount, '\OC\Files\Storage\Local', $storageArgs);

		// trigger storage creation which will pass config args above
		$mount->getStorage();

		\rmdir($tempFolder . '/thumbnails/someuser');
		\rmdir($tempFolder . '/thumbnails');
	}
}
