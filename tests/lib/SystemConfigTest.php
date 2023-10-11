<?php
/**
 * ownCloud
 *
 * @author Phil Davis <phil@jankaritech.com>
 * @copyright Copyright (c) 2018 Phil Davis phil@jankaritech.com
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License,
 * as published by the Free Software Foundation;
 * either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace Test;

use OC\Config;
use OC\SystemConfig;

/**
 * Class SystemConfigTest
 *
 * @group DB
 *
 * @package Test
 */
class SystemConfigTest extends TestCase {
	/** @var \OC\Config */
	private \PHPUnit\Framework\MockObject\MockObject $config;
	private \OC\SystemConfig $systemConfig;

	protected function setUp(): void {
		parent::setUp();
		$this->config = $this->createMock(Config::class);

		$this->systemConfig = new SystemConfig($this->config);
	}

	public function testGetKeys() {
		$keyList = ['key1', random_int(0, 40), 45, 'another'];
		$this->config->expects($this->once())
			->method('getKeys')
			->willReturn($keyList);

		$this->assertSame($keyList, $this->systemConfig->getKeys());
	}

	public function testSetValue() {
		$key = \str_shuffle('abcdefghijk');
		$value = random_int(0, mt_getrandmax());

		$this->config->expects($this->once())
			->method('setValue')
			->with($key, $value);

		$this->systemConfig->setValue($key, $value);
	}

	public function testSetValues() {
		$values = ['key1' => 'value1', 'key2' => 42, 'key3' => false];

		$this->config->expects($this->once())
			->method('setValues')
			->with($values);

		$this->systemConfig->setValues($values);
	}

	public function dataGetValue() {
		return [
			['dbtype', null, 'mysql'],
			['non_existent_key', null, ''],
			['installed', 'someBogusValue', true],
			['trusted_domains', 'someBogusValue', [0 => 'localhost', 1 => 'example.com']],
			['trusted_domains', null, [0 => 'localhost', 1 => 'example.com']],
			['redis', null, ['password' => 'theRedisPassphrase', 'other' => 'another setting']],
			['dbpassword', null, 'dev123pwd'],
			['license-key', null, 'Company-license-key-string'],
			['log.conditions', null, [
				[
					'shared_secret' => 'randomString1',
					'users' => ['user1'],
					'apps' => ['files_texteditor'],
					'logfile' => '/tmp/texteditor.log'
				],
				[
					'shared_secret' => 'randomString2',
					'users' => ['user2'],
					'apps' => ['gallery'],
					'logfile' => '/tmp/gallery.log'
				],
				[
					'shared_secret' => 'randomString3',
					'users' => ['user3'],
					'apps' => ['comments'],
					'logfile' => '/tmp/comments.log'
				],
			]],
			['objectstore', null, [
				'arguments' => [
					'password' => 'theObjectStorePassword',
					'options' => [
						'other' => 'stuff',
						'credentials' => [
							'key' => 'specialKeyValue',
							'secret' => 'secretCredential',
						],
					],
				],
			]],
		];
	}

	/**
	 * @dataProvider dataGetValue
	 * @param string $key
	 * @param mixed $default
	 * @param mixed $expectedValue
	 */
	public function testGetValue($key, $default, $expectedValue) {
		if ($default === null) {
			$this->config->expects($this->once())
			->method('getValue')
			->with($key, '')
			->willReturn($expectedValue);

			$this->assertSame($expectedValue, $this->systemConfig->getValue($key));
		} else {
			$this->config->expects($this->once())
				->method('getValue')
				->with($key, $default)
				->willReturn($expectedValue);

			$this->assertSame($expectedValue, $this->systemConfig->getValue($key, $default));
		}
	}

	public function dataGetFilteredValue() {
		return [
			['dbtype', null, 'mysql', 'mysql'],
			['non_existent_key', null, '', ''],
			['installed', 'someBogusValue', true, true],
			['trusted_domains', 'someBogusValue', [0 => 'localhost', 1 => 'example.com'], [0 => 'localhost', 1 => 'example.com']],
			['trusted_domains', null, [0 => 'localhost', 1 => 'example.com'], [0 => 'localhost', 1 => 'example.com']],
			['redis', null, ['password' => 'mahpass', 'other' => 'another setting'], ['password' => '***REMOVED SENSITIVE VALUE***', 'other' => 'another setting']],
			['dbpassword', null, 'yadayada', '***REMOVED SENSITIVE VALUE***'],
			['license-key', null, 'license-aabbcc-8734', '***REMOVED SENSITIVE VALUE***'],
			['log.conditions', null,
				[
					[
						'shared_secret' => 'secretShared',
						'users' => ['user1'],
						'apps' => ['files_texteditor'],
						'logfile' => '/tmp/texteditor.log'
					],
					[
						'shared_secret' => 'valueSecret',
						'users' => ['user2'],
						'apps' => ['gallery'],
						'logfile' => '/tmp/gallery.log'
					],
					[
						'shared_secret' => 'incognito007',
						'users' => ['user3'],
						'apps' => ['comments'],
						'logfile' => '/tmp/comments.log'
					],
				],
				[
					[
						'shared_secret' => '***REMOVED SENSITIVE VALUE***',
						'users' => ['user1'],
						'apps' => ['files_texteditor'],
						'logfile' => '/tmp/texteditor.log'
					],
					[
						'shared_secret' => '***REMOVED SENSITIVE VALUE***',
						'users' => ['user2'],
						'apps' => ['gallery'],
						'logfile' => '/tmp/gallery.log'
					],
					[
						'shared_secret' => '***REMOVED SENSITIVE VALUE***',
						'users' => ['user3'],
						'apps' => ['comments'],
						'logfile' => '/tmp/comments.log'
					],
				]
			],
			['objectstore', null,
				[
					'arguments' => [
						'password' => 'boooooo',
						'options' => [
							'other' => 'stuff',
							'credentials' => [
								'key' => 'sdfjkh98798723hjkwr',
								'secret' => 'sfmsfbn89787324$/_n$0',
							],
						],
					],
				],
				[
					'arguments' => [
						'password' => '***REMOVED SENSITIVE VALUE***',
						'options' => [
							'other' => 'stuff',
							'credentials' => [
								'key' => '***REMOVED SENSITIVE VALUE***',
								'secret' => '***REMOVED SENSITIVE VALUE***',
							],
						],
					],
				],
			],
		];
	}

	/**
	 * @dataProvider dataGetFilteredValue
	 * @param string $key
	 * @param mixed $default
	 * @param mixed $expectedValue
	 */
	public function testGetFilteredValue($key, $default, $returnedValue, $expectedValue) {
		if ($default === null) {
			$this->config->expects($this->once())
			->method('getValue')
			->with($key, '')
			->willReturn($returnedValue);

			$this->assertSame($expectedValue, $this->systemConfig->getFilteredValue($key));
		} else {
			$this->config->expects($this->once())
				->method('getValue')
				->with($key, $default)
				->willReturn($returnedValue);

			$this->assertSame($expectedValue, $this->systemConfig->getFilteredValue($key, $default));
		}
	}

	public function testDeleteValue() {
		$key = 'mahkey';
		$this->config->expects($this->once())
			->method('deleteKey')
			->with($key);

		$this->systemConfig->deleteValue($key);
	}

	public function isReadOnlyProvider() {
		return [
			[true],
			[false],
		];
	}

	/**
	 * @dataProvider isReadOnlyProvider
	 */
	public function testIsReadOnly($returnedValue) {
		$this->config->expects($this->once())
			->method('isReadOnly')
			->willReturn($returnedValue);

		$this->assertSame($returnedValue, $this->systemConfig->isReadOnly());
	}
}
