<?php
/**
 * @author Joas Schilling <nickvergessen@owncloud.com>
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

namespace Tests\Core\Command\Config\System;

use OC\Core\Command\Config\System\SetConfig;
use Test\TestCase;

class SetConfigTest extends TestCase {
	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $systemConfig;

	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $consoleInput;
	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $consoleOutput;

	/** @var \Symfony\Component\Console\Command\Command */
	protected $command;

	protected function setUp(): void {
		parent::setUp();

		$systemConfig = $this->systemConfig = $this->getMockBuilder('OC\SystemConfig')
			->disableOriginalConstructor()
			->getMock();
		$this->consoleInput = $this->createMock('Symfony\Component\Console\Input\InputInterface');
		$this->consoleOutput = $this->createMock('Symfony\Component\Console\Output\OutputInterface');

		/** @var \OC\SystemConfig $systemConfig */
		$this->command = new SetConfig($systemConfig);
	}

	public function setData() {
		return [
			[['name'], 'newvalue', null, 'newvalue'],
			[['a', 'b', 'c'], 'foobar', null, ['b' => ['c' => 'foobar']]],
			[['a', 'b', 'c'], 'foobar', ['b' => ['d' => 'barfoo']], ['b' => ['d' => 'barfoo', 'c' => 'foobar']]],
		];
	}

	/**
	 * @dataProvider setData
	 *
	 * @param array $configNames
	 * @param string $newValue
	 * @param mixed $existingData
	 * @param mixed $expectedValue
	 */
	public function testSet($configNames, $newValue, $existingData, $expectedValue) {
		$this->systemConfig->expects($this->once())
			->method('setValue')
			->with($configNames[0], $expectedValue);
		$this->systemConfig->method('getValue')
			->with($configNames[0])
			->willReturn($existingData);

		$this->consoleInput->expects($this->once())
			->method('getArgument')
			->with('name')
			->willReturn($configNames);
		$this->consoleInput->method('getOption')
			->will($this->returnValueMap([
				['value', $newValue],
				['type', 'string'],
			]));

		self::invokePrivate($this->command, 'execute', [$this->consoleInput, $this->consoleOutput]);
	}

	public function setUpdateOnlyProvider() {
		return [
			[['name'], null],
			[['a', 'b', 'c'], null],
			[['a', 'b', 'c'], ['b' => 'foobar']],
			[['a', 'b', 'c'], ['b' => ['d' => 'foobar']]],
		];
	}

	/**
	 * @dataProvider setUpdateOnlyProvider
	 */
	public function testSetUpdateOnly($configNames, $existingData) {
		$this->expectException(\UnexpectedValueException::class);

		$this->systemConfig->expects($this->never())
			->method('setValue');
		$this->systemConfig->method('getValue')
			->with($configNames[0])
			->willReturn($existingData);
		$this->systemConfig->method('getKeys')
			->willReturn($existingData ? $configNames[0] : []);

		$this->consoleInput->expects($this->once())
			->method('getArgument')
			->with('name')
			->willReturn($configNames);
		$this->consoleInput->method('getOption')
			->will($this->returnValueMap([
				['value', 'foobar'],
				['type', 'string'],
				['update-only', true],
			]));

		self::invokePrivate($this->command, 'execute', [$this->consoleInput, $this->consoleOutput]);
	}

	public function setJsonData() {
		return [
			[['name'], '{"sub-key":"value"}', null, ['sub-key' => 'value']],
			[['name'], '{"sub-key":"value"}', 'something', ['sub-key' => 'value']],
			[['name'], '{"sub-key":"value"}', ['sub-key' => 'old-value', 'other-key' => 'will disappear'], ['sub-key' => 'value']],
			[['name'], '[{"key1":"value1","key2":"value2"}]', null, [['key1' => 'value1', 'key2' => 'value2']]],
		];
	}

	/**
	 * @dataProvider setJsonData
	 *
	 * @param array $configNames
	 * @param string $newValue
	 * @param mixed $existingData
	 * @param mixed $expectedValue
	 */
	public function testSetJson($configNames, $newValue, $existingData, $expectedValue) {
		$this->systemConfig->expects($this->once())
			->method('setValue')
			->with($configNames[0], $expectedValue);
		$this->systemConfig->method('getValue')
			->with($configNames[0])
			->willReturn($existingData);

		$this->consoleInput->expects($this->once())
			->method('getArgument')
			->with('name')
			->willReturn($configNames);
		$this->consoleInput->method('getOption')
			->will($this->returnValueMap([
				['value', $newValue],
				['type', 'json'],
			]));

		self::invokePrivate($this->command, 'execute', [$this->consoleInput, $this->consoleOutput]);
	}

	public function castValueProvider() {
		return [
			[null, 'string', ['value' => '', 'readable-value' => 'empty string']],

			['abc', 'string', ['value' => 'abc', 'readable-value' => 'string abc']],

			['123', 'integer', ['value' => 123, 'readable-value' => 'integer 123']],
			['456', 'int', ['value' => 456, 'readable-value' => 'integer 456']],

			['2.25', 'double', ['value' => 2.25, 'readable-value' => 'double 2.25']],
			['0.5', 'float', ['value' => 0.5, 'readable-value' => 'double 0.5']],

			['', 'null', ['value' => null, 'readable-value' => 'null']],

			['true', 'boolean', ['value' => true, 'readable-value' => 'boolean true']],
			['false', 'bool', ['value' => false, 'readable-value' => 'boolean false']],

			['{"config_key":"the-value"}', 'json', ['value' => ['config_key' => 'the-value'], 'readable-value' => 'json {"config_key":"the-value"}']],
			['[{"key1":"value1","key2":"value2"}]', 'json', ['value' => [['key1' => 'value1', 'key2' => 'value2']], 'readable-value' => 'json [{"key1":"value1","key2":"value2"}]']],
		];
	}

	/**
	 * @dataProvider castValueProvider
	 */
	public function testCastValue($value, $type, $expectedValue) {
		$this->assertSame(
			$expectedValue,
			self::invokePrivate($this->command, 'castValue', [$value, $type])
		);
	}

	public function castValueInvalidProvider() {
		return [
			['123', 'foobar'],

			[null, 'integer'],
			['abc', 'integer'],
			['76ggg', 'double'],
			['true', 'float'],
			['foobar', 'boolean'],
			['invalid-json', 'json'],
			['', 'json'],
		];
	}

	/**
	 * @dataProvider castValueInvalidProvider
	 */
	public function testCastValueInvalid($value, $type) {
		$this->expectException(\InvalidArgumentException::class);

		self::invokePrivate($this->command, 'castValue', [$value, $type]);
	}
}
