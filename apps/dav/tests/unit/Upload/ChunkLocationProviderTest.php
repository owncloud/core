<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
namespace OCA\DAV\Tests\unit\Upload;

use OC\Files\Mount\MountPoint;
use OC\Files\Storage\Local;
use OCA\DAV\Upload\ChunkLocationProvider;
use OCP\Files\Storage\IStorageFactory;
use OCP\IConfig;
use OCP\IUser;
use org\bovigo\vfs\vfsStream;
use Test\TestCase;

class ChunkLocationProviderTest extends TestCase {
	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private $config;
	/** @var ChunkLocationProvider | \PHPUnit\Framework\MockObject\MockObject */
	private $provider;
	/** @var IUser | \PHPUnit\Framework\MockObject\MockObject */
	private $user;
	/** @var IStorageFactory | \PHPUnit\Framework\MockObject\MockObject */
	private $factory;

	protected function setUp(): void {
		parent::setUp();
		$this->config = $this->createMock(IConfig::class);
		$this->provider = new ChunkLocationProvider($this->config);
		$this->user = $this->createMock(IUser::class);
		$this->factory = $this->createMock(IStorageFactory::class);
	}

	public function testProviderIfNotConfigured() {
		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('dav.chunk_base_dir')
			->willReturn('');
		$this->assertEquals([], $this->provider->getMountsForUser($this->user, $this->factory));
	}

	public function testProviderIfConfigured() {
		$root = vfsStream::setup('chunk-dir-root');

		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('dav.chunk_base_dir')
			->willReturn(vfsStream::url('chunk-dir-root'));
		$this->user->expects($this->any())
			->method('getUID')
			->willReturn('user');

		$mounts = $this->provider->getMountsForUser($this->user, $this->factory);
		$this->assertTrue($root->hasChild('user'));
		$this->assertCount(1, $mounts);
		$mount = $mounts[0];
		$this->assertInstanceOf(MountPoint::class, $mount);
		$this->assertEquals(Local::class, $this->invokePrivate($mount, 'class'));
		$this->assertEquals('/user/uploads/', $this->invokePrivate($mount, 'mountPoint'));
	}
}
