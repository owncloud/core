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

/**
 * Class SystemConfigTest
 *
 * @group DB
 *
 * @package Test
 */
class SystemConfigTest extends TestCase {
	const TESTCONTENT =
		'<?php $CONFIG=array("instanceid"=>"random123", ' .
		'"passwordsalt"=>"saltstring111", ' .
		'"secret"=>"abiglongsecretstring222", ' .
		'"trusted_domains" => array("localhost", "example.com"), ' .
		'"redis" => array("password" => "theRedisPassphrase", "other" => "another setting"), ' .
		'"dbtype"=>"mysql", ' .
		'"dbname"=>"owncloud", ' .
		'"dbhost"=>"localhost", ' .
		'"dbuser"=>"owncloud", ' .
		'"dbpassword"=>"dev123pwd", ' .
		'"license-key"=>"Company-license-key-string", ' .
		'"installed" => true, ' .
		'"log.conditions" => [' .
		'["shared_secret" => "randomString1", "users" => ["user1"], "apps" => ["files_texteditor"], "logfile" => "/tmp/texteditor.log"], ' .
		'["shared_secret" => "randomString2", "users" => ["user2"], "apps" => ["gallery"], "logfile" => "/tmp/gallery.log"], ' .
		'["shared_secret" => "randomString3", "users" => ["user3"], "apps" => ["comments"], "logfile" => "/tmp/comments.log"], ' .
		'],' .
		'"objectstore" => ["arguments" => [' .
		'"password" => "theObjectStorePassword", ' .
		'"options" => ["other" => "stuff", "credentials" => ["key" => "specialKeyValue", "secret" => "secretCredential"]]' .
		']]' .
		');';

	/** @var array */
	private $initialConfig = [
		'instanceid' => 'random123',
		'passwordsalt' => 'saltstring111',
		'secret' => 'abiglongsecretstring222',
		'trusted_domains' => [
				0 => 'localhost',
				1 => 'example.com',
			],
		'redis' => [
			'password' => 'theRedisPassphrase',
			'other' => 'another setting'
		],
		'dbtype' => 'mysql',
		'dbname' => 'owncloud',
		'dbhost' => 'localhost',
		'dbuser' => 'owncloud',
		'dbpassword' => 'dev123pwd',
		'license-key' => 'Company-license-key-string',
		'installed' => true,
		'log.conditions' => [
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
		],
		'objectstore' => [
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
		],
	];

	/** @var string */
	private $configFile;
	/** @var \OC\Config */
	private $config;
	/** @var string */
	private $randomTmpDir;

	protected function setUp(): void {
		parent::setUp();

		$this->randomTmpDir = \OC::$server->getTempManager()->getTemporaryFolder();
		$this->configFile = $this->randomTmpDir.'testconfig.php';
		\file_put_contents($this->configFile, self::TESTCONTENT);
		$this->config = new \OC\Config($this->randomTmpDir, 'testconfig.php');
	}

	protected function tearDown(): void {
		\unlink($this->configFile);
		parent::tearDown();
	}

	public function testSetValue() {
		$systemConfig = new \OC\SystemConfig($this->config);
		$systemConfig->setValue('dbtype', 'otherDb');
		$expectedConfig = $this->initialConfig;
		$expectedConfig['dbtype'] = 'otherDb';
		$this->assertAttributeEquals($expectedConfig, 'cache', $this->config);
	}

	public function testSetValues() {
		$systemConfig = new \OC\SystemConfig($this->config);
		$this->assertStringEqualsFile($this->configFile, self::TESTCONTENT);

		// Changing configs to existing values and deleting non-existing ones
		// should not rewrite the config.php
		$systemConfig->setValues([
			'dbtype'		=> 'mysql',
			'not_exists'	=> null,
		]);

		$this->assertAttributeEquals($this->initialConfig, 'cache', $this->config);
		$this->assertStringEqualsFile($this->configFile, self::TESTCONTENT);

		$systemConfig->setValues([
			'dbtype'		=> 'otherDb',
			'license-key'	=> null,
		]);
		$expectedConfig = $this->initialConfig;
		$expectedConfig['dbtype'] = 'otherDb';
		unset($expectedConfig['license-key']);
		$this->assertAttributeEquals($expectedConfig, 'cache', $this->config);
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
		$systemConfig = new \OC\SystemConfig($this->config);
		if ($default === null) {
			$actualValue = $systemConfig->getValue($key);
		} else {
			$actualValue = $systemConfig->getValue($key, $default);
		}
		$this->assertSame(
			$expectedValue,
			$actualValue
		);
	}

	public function dataGetFilteredValue() {
		return [
			['dbtype', null, 'mysql'],
			['non_existent_key', null, ''],
			['installed', 'someBogusValue', true],
			['trusted_domains', 'someBogusValue', [0 => 'localhost', 1 => 'example.com']],
			['trusted_domains', null, [0 => 'localhost', 1 => 'example.com']],
			['redis', null, ['password' => '***REMOVED SENSITIVE VALUE***', 'other' => 'another setting']],
			['dbpassword', null, '***REMOVED SENSITIVE VALUE***'],
			['license-key', null, '***REMOVED SENSITIVE VALUE***'],
			['log.conditions', null, [
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
			]],
			['objectstore', null, [
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
			]],
		];
	}

	/**
	 * @dataProvider dataGetFilteredValue
	 * @param string $key
	 * @param mixed $default
	 * @param mixed $expectedValue
	 */
	public function testGetFilteredValue($key, $default, $expectedValue) {
		$systemConfig = new \OC\SystemConfig($this->config);
		if ($default === null) {
			$actualValue = $systemConfig->getFilteredValue($key);
		} else {
			$actualValue = $systemConfig->getFilteredValue($key, $default);
		}
		$this->assertSame(
			$expectedValue,
			$actualValue
		);
	}

	public function testDeleteValue() {
		$systemConfig = new \OC\SystemConfig($this->config);
		$systemConfig->deleteValue('dbtype');
		$expectedConfig = $this->initialConfig;
		unset($expectedConfig['dbtype']);
		$this->assertAttributeEquals($expectedConfig, 'cache', $this->config);
	}

	public function testIsReadOnly() {
		$systemConfig = new \OC\SystemConfig($this->config);
		$this->assertFalse($systemConfig->isReadOnly(), 'Config is read-only but should not be');
	}
}
